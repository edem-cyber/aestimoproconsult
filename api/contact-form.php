<?php
if (!empty($_POST['email'])) {

	// Honeypot protection - if the 'website' field is filled, it's likely a bot
	if (!empty($_POST['website'])) {
		// Silently reject bot submissions without error message
		echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your message has been sent successfully!" }';
		exit();
	}

	// Basic rate limiting - check if IP has submitted in the last 60 seconds
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$rate_limit_file = sys_get_temp_dir() . '/contact_form_' . md5($user_ip) . '.tmp';

	if (file_exists($rate_limit_file)) {
		$last_submission = file_get_contents($rate_limit_file);
		if (time() - $last_submission < 60) {
			echo '{ "alert": "alert alert-warning alert-dismissable", "message": "Please wait a moment before submitting another message." }';
			exit();
		}
	}

	// Enable / Disable SMTP
	$enable_smtp = 'no'; // yes OR no - Change to 'yes' to use Gmail SMTP

	// Email Receiver Addresses - Both Prince and Nathaniel
	$receiver_emails = array(
		'edem.agbakpe@gmail.com',
		'nathaniel.yankah@gmail.com'
	);

	// Email Receiver Name for SMTP Email
	$receiver_name = 'Aestimo Pro Consult';

	// Email Subject
	$subject = 'New Contact Form Inquiry - Aestimo Pro Consult';

	// Google reCaptcha secret Key
	$grecaptcha_secret_key = 'YOUR_SECRET_KEY';

	$from = $_POST['email'];
	$name = isset($_POST['name']) ? $_POST['name'] : '';

	if (!empty($grecaptcha_secret_key) && !empty($_POST['g-recaptcha-response'])) {

		$token = $_POST['g-recaptcha-response'];

		// call curl to POST request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $grecaptcha_secret_key, 'response' => $token)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$arrResponse = json_decode($response, true);

		// verify the response
		if (isset($_POST['action']) && !(isset($arrResponse['success']) && $arrResponse['success'] == '1' && $arrResponse['action'] == $_POST['action'] && $arrResponse['score'] = 0.5)) {

			echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
			die;

		} else if (!isset($_POST['action']) && !(isset($arrResponse['success']) && $arrResponse['success'] == '1')) {

			echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
			die;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$prefix = !empty($_POST['prefix']) ? $_POST['prefix'] : '';
		$submits = $_POST;

		// Remove honeypot field from processing
		unset($submits['website']);

		$fields = array();
		foreach ($submits as $name => $value) {
			if (empty($value) || $name == 'redirect') {
				continue;
			}

			$name = str_replace($prefix, '', $name);
			$name = function_exists('mb_convert_case') ? mb_convert_case($name, MB_CASE_TITLE, "UTF-8") : ucwords($name);

			if (is_array($value)) {
				$value = implode(', ', $value);
			}

			$fields[$name] = nl2br(filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
		}

		$response = array();
		foreach ($fields as $fieldname => $fieldvalue) {

			$fieldname = '<tr>
                                <td align="right" valign="top" style="border-top:1px solid #e5e5e5; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333; padding:12px 15px 12px 0; font-weight: 600;">' . $fieldname . ': </td>';
			$fieldvalue = '<td align="left" valign="top" style="border-top:1px solid #e5e5e5; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#555; padding:12px 0 12px 15px;">' . $fieldvalue . '</td>
                                </tr>';
			$response[] = $fieldname . $fieldvalue;

		}

		$current_date = date('F j, Y \a\t g:i A');

		$message = '<!DOCTYPE html>
		<html>
			<head>
				<title>New Contact Form Inquiry</title>
				<style>
					body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f5f5f5; }
					.container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
					.header { background: linear-gradient(135deg, #dd6531 0%, #c55a42 100%); color: white; padding: 30px; text-align: center; }
					.content { padding: 30px; }
					.footer { background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #666; }
					table { width: 100%; border-collapse: collapse; }
					.label { font-weight: 600; color: #333; }
				</style>
			</head>
			<body>
				<div class="container">
					<div class="header">
						<h2 style="margin: 0; font-size: 24px;">New Contact Form Inquiry</h2>
						<p style="margin: 10px 0 0 0; opacity: 0.9;">Aestimo Pro Consult</p>
					</div>
					<div class="content">
						<p style="margin-bottom: 25px; color: #555; font-size: 16px;">You have received a new inquiry through your website contact form from <strong>' . (isset($fields['Name']) ? $fields['Name'] : 'Unknown') . '</strong> (' . (isset($fields['Email']) ? $fields['Email'] : 'No email provided') . ').</p>
						<table>
							' . implode('', $response) . '
						</table>
						<p style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #e5e5e5; color: #777; font-size: 13px;">
							<strong>Received:</strong> ' . $current_date . '<br>
							<strong>IP Address:</strong> ' . $_SERVER['REMOTE_ADDR'] . '
						</p>
					</div>
					<div class="footer">
						<p>This message was sent from the Aestimo Pro Consult website contact form.<br>
						CITG Licensed (CTPF D/00013) | Dzorwulu, Accra, Ghana</p>
					</div>
				</div>
			</body>
			</html>';

		if ($enable_smtp == 'no') { // Simple Email

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers - Use Prince's email as sender, customer email as reply-to
			$headers .= 'From: Aestimo Pro Consult <avonomanprince@gmail.com>' . "\r\n";
			$headers .= 'Reply-To: ' . $fields['Name'] . ' <' . $fields['Email'] . '>' . "\r\n";

			$success_count = 0;
			$total_emails = count($receiver_emails);

			// Send to both email addresses
			foreach ($receiver_emails as $receiver_email) {
				if (mail($receiver_email, $subject, $message, $headers)) {
					$success_count++;
				}
			}

			if ($success_count > 0) {
				// Record successful submission timestamp for rate limiting
				file_put_contents($rate_limit_file, time());

				// Redirect to success page
				$redirect_page_url = !empty($_POST['redirect']) ? $_POST['redirect'] : '';
				if (!empty($redirect_page_url)) {
					header("Location: " . $redirect_page_url);
					exit();
				}

				//Success Message
				if ($success_count == $total_emails) {
					echo '{ "alert": "alert alert-success alert-dismissable", "message": "Thank you! Your message has been sent successfully to our team." }';
				} else {
					echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your message has been sent, but there may have been an issue reaching all recipients." }';
				}
			} else {
				//Fail Message
				echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Sorry, your message could not be sent. Please try again or contact us directly." }';
			}

		} else { // SMTP
			// Email Receiver Addresses
			$toemailaddresses = array();
			foreach ($receiver_emails as $email) {
				$toemailaddresses[] = array(
					'email' => $email,
					'name' => $receiver_name
				);
			}

			require 'phpmailer/Exception.php';
			require 'phpmailer/PHPMailer.php';
			require 'phpmailer/SMTP.php';

			$mail = new PHPMailer\PHPMailer\PHPMailer();

			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; // Gmail SMTP Host
			$mail->SMTPAuth = true;
			$mail->Username = 'avonomanprince@gmail.com'; // Prince's Gmail
			$mail->Password = 'YOUR_APP_PASSWORD'; // Gmail App Password (not regular password)
			$mail->SMTPSecure = 'tls'; // Gmail uses TLS
			$mail->Port = 587; // Gmail TLS Port
			$mail->setFrom('avonomanprince@gmail.com', 'Aestimo Pro Consult');
			$mail->addReplyTo($fields['Email'], $fields['Name']);

			foreach ($toemailaddresses as $toemailaddress) {
				$mail->AddAddress($toemailaddress['email'], $toemailaddress['name']);
			}

			$mail->Subject = $subject;
			$mail->isHTML(true);

			$mail->Body = $message;

			if ($mail->send()) {
				// Record successful submission timestamp for rate limiting
				file_put_contents($rate_limit_file, time());

				// Redirect to success page
				$redirect_page_url = !empty($_POST['redirect']) ? $_POST['redirect'] : '';
				if (!empty($redirect_page_url)) {
					header("Location: " . $redirect_page_url);
					exit();
				}

				//Success Message
				echo '{ "alert": "alert alert-success alert-dismissable", "message": "Thank you! Your message has been sent successfully to our team." }';
			} else {
				//Fail Message
				echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Sorry, your message could not be sent. Please try again or contact us directly." }';
			}
		}
	}
} else {
	//Empty Email Message
	echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Please provide your email address!" }';
}