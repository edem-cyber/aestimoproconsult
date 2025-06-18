<?php
/*
|--------------------------------------------------------------------------
| OWSA-INV V2
|--------------------------------------------------------------------------
| Author: Siamon Hasan
| Project Name: OSWA-INV
| Version: v2
| Offcial page: http://oswapp.com/
| facebook Page: https://www.facebook.com/oswapp
|
|
|
*/
define('DB_HOST', 'localhost');          // Set database host
define('DB_USER', 'root');             // Set database user
define('DB_PASS', '');             // Set database password
define('DB_NAME', 'restodb');        // Set database name

date_default_timezone_set("Africa/Accra");
$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('Y-m-d\TH:i');
?>