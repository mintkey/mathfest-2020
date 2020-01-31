<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))){
  if (isset($_POST['nameFirst'])) { $firstName = $_POST['nameFirst']; }
	if (isset($_POST['nameLast'])) { $lastName = $_POST['nameLast']; }
  if (isset($_POST['emailAddress'])) { $emailAddress = $_POST['emailAddress']; }
	if (isset($_POST['school'])) { $school = $_POST['school']; }
	if (isset($_POST['major'])) { $major = $_POST['major']; }
	if (isset($_POST['gradYear'])) { $gradYear = $_POST['gradYear']; }
  if (isset($_POST['foodPref'])) { $emailAddress = $_POST['foodPref']; }
	if (isset($_POST['confirmation'])) { $confirmation = 'attendance confirmed'; }
	else { $confirmation = 'attendance NOT confirmed'; }

	$formdata = [
    'first name' => $firstName,
    'last name' => $lastName,
    'email address' => $emailAddress,
    'school' => $school,
    'major' => $major,
    'grad year' => $gradYear,
    'food preference' => $foodPref,
    'confirmation status' => $confirmation,
  ];

$emailTo = $emailAddress;
$emailToName = $firstName;
$emailFrom = 'cbreiner@fordham.edu';
$emailFromName = 'Fordham MathFest 2020';

$mail = new PHPMailer;
//$mail->isSMTP();
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 465; // TLS only
$mail->SMTPSecure = 'TLS'; // SSL is depracated
$mail->SMTPAuth = true;
$mail->Username = 'cbreiner@fordham.edu';
$mail->Password = 'TYPE PASSWORD HERE'; // Password needed
$mail->setFrom($emailFrom, $emailFromName);
$mail->addAddress($emailTo, $emailToName);
$mail->Subject = "You're registered for MathFest 2020!";
// Body needed

$mail->send();
}

?>
