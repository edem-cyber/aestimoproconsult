<?php
$errors = array();

function print_d($str)
{
  echo '<pre>';
  print_r($str);
  echo '</pre>';
  die();
}

function print_p($str)
{
  echo '<pre>';
  print_r($str);
  echo '</pre>';
}
/*--------------------------------------------------------------*/
/* Function for Remove escapes special
/* characters in a string for use in an SQL statement
/*--------------------------------------------------------------*/
function real_escape($str)
{
  global $con;
  $escape = mysqli_real_escape_string($con, $str);
  return $escape;
}
/*--------------------------------------------------------------*/
/* Function for Remove html characters
/*--------------------------------------------------------------*/
function remove_junk($str)
{
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}
/*--------------------------------------------------------------*/
/* Function for Uppercase first character
/*--------------------------------------------------------------*/
function first_character($str)
{
  $val = str_replace('-', " ", $str);
  $val = ucfirst($val);
  return $val;
}
/*--------------------------------------------------------------*/
/* Function for Checking input fields not empty
/*--------------------------------------------------------------*/
function validate_fields($var)
{
  global $errors;
  // print_r($var);die();
  foreach ($var as $field) {
    //   echo '<pre>';
    // print_r($var);
    // echo '</pre>';
    $val = remove_junk($_POST[$field]);
    if (isset($val) && $val == '') {
      $errors = $field . " can't be blank.";
      return $errors;
    }
  }
}
/*--------------------------------------------------------------*/
/* Function for Display Session Message
   Ex echo displayt_msg($message);
/*--------------------------------------------------------------*/
function display_msg($msg = '')
{
  $output = array();
  if (!empty($msg)) {
    foreach ($msg as $key => $value) {
      $output = "<div class=\"alert alert-{$key}\">";
      $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
      $output .= remove_junk(first_character($value));
      $output .= "</div>";
    }
    return $output;
  } else {
    return "";
  }
}
/*--------------------------------------------------------------*/
/* Function for redirect
/*--------------------------------------------------------------*/
function redirect($url, $permanent = false)
{
  if (headers_sent() === false) {
    header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  }

  exit();
}
/*--------------------------------------------------------------*/
/* Function for find out total saleing price, buying price and profit
/*--------------------------------------------------------------*/
function total_price($totals)
{
  $sum = 0;
  $sub = 0;
  foreach ($totals as $total) {
    $sum += $total['total_saleing_price'];
    $sub += $total['total_buying_price'];
    $profit = $sum - $sub;
  }
  return array($sum, $profit);
}
/*--------------------------------------------------------------*/
/* Function for Readable date time
/*--------------------------------------------------------------*/
function read_date($str)
{
  if ($str) {

    if ($str != "0000-00-00 00:00:00") {

      return date('F j, Y, g:i:s a', strtotime($str));

    }
  } else
    return null;
}
/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function make_date()
{
  return strftime("%Y-%m-%d %H:%M:%S", time());
}
/*--------------------------------------------------------------*/
/* Function for  Readable date time
/*--------------------------------------------------------------*/
function count_id()
{
  static $count = 1;
  return $count++;
}
/*--------------------------------------------------------------*/
/* Function for Creting random string
/*--------------------------------------------------------------*/
function randString($length = 5)
{
  $str = '';
  $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

  for ($x = 0; $x < $length; $x++)
    $str .= $cha[mt_rand(0, strlen($cha))];
  return $str;
}

function formatPhoneNumber($phoneNumber)
{

  $length = strlen($phoneNumber);
  $firstcharacter = substr($phoneNumber, 0, 1);
  if ($length == 10 && $firstcharacter == "0") {

    // $phoneNumber = str_replace('0',"233",$phoneNumber);
    $phoneNumber = substr($phoneNumber, 1, 10);
    $phoneNumber = '233' . $phoneNumber;

  }

  return $phoneNumber;
}

function sendSms($to, $msg)
{

  $key = "E0aTqzsMJytGsO4lw3Q4GKbYX";
  $sender_id = "RESTO";
  $curl = curl_init();
  $url = 'https://apps.mnotify.net/smsapi?key=' . $key . '&to=' . $to . '&msg=' . $msg . '&sender_id=' . $sender_id . '';
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}

function sendSms1($to, $msg)
{

  $key = "E0aTqzsMJytGsO4lw3Q4GKbYX";
  $sender_id = "QuickServe";
  $curl = curl_init();
  $apicalllink = 'https://apps.mnotify.net/smsapi?key=' . $key . '&to=' . $to . '&msg=' . $msg . '&sender_id=' . $sender_id . '';
  $response = file_get_contents($apicalllink);
  echo $response;
  return $response;
}

?>