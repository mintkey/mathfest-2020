<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))){
  if (isset($_POST['nameFirst'])) { $firstName = $_POST['nameFirst']; }
	if (isset($_POST['nameLast'])) { $lastName = $_POST['nameLast']; }
	if (isset($_POST['school'])) { $school = $_POST['school']; }
	if (isset($_POST['major'])) { $major = $_POST['major']; }
	if (isset($_POST['gradYear'])) { $gradYear = $_POST['gradYear']; }
	if (isset($_POST['emailAddress'])) { $emailAddress = $_POST['emailAddress']; }
	if (isset($_POST['confirmation'])) { $confirmation = 'attendance confirmed'; }
	else { $confirmation = 'attendance NOT confirmed'; }

	$formdata = [
    'first name' => $firstName,
    'last name' => $lastName,
    'school' => $school,
    'major' => $major,
    'grad year' => $gradYear,
    'email address' => $emailAddress,
    'confirmation status' => $confirmation,
  ];

$emailTo = $emailAddress;
$emailToName = $firstName;
$emailFrom = 'cbreiner@fordham.edu';
$emailFromName = 'Fordham MathFest 2019';

$mail = new PHPMailer;
//$mail->isSMTP();
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 465; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'cbreiner@fordham.edu';
$mail->Password = 'TYPE PASSWORD HERE';
$mail->setFrom($emailFrom, $emailFromName);
$mail->addAddress($emailTo, $emailToName);
$mail->Subject = "Thank you, $firstName for signing up for MathFest 2019!";
$mail->Body = "Testing 123";

$mail->send();
/*
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
} */

/*
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: cwestby1@gmail.com" . "\r\n" .
    "Reply-To: cwestby1@gmail.com" . "\r\n" .
    "X-MSMail-Priority: High" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
    $drBriener = "cwestby1@fordham.edu";
    $emailAddress = 'cwestby1@fordham.edu';
	$subject = "$firstName $lastName signed up for MathFest 2019!";
    $regInfo = json_encode($formdata);
    $thankYou = "Thank you, $firstName for signing up for MathFest 2019!";
    $confMessage = '<html><body>';
    $confMessage .= '<header class="masthead" style="background-image: url(\'img/dreamstime_xxl_64717876.jpg\')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>You\'re registered for MathFest 2019!</h2>
              <h4><b>Saturday, April 6th</b></h4>
              <p id="timer"></p>
            </div>
          </div>
        </div>
      </div>
    </header>';
    $confMessage .= '<h3>We look forward to seeing you on April 6th! Further information on the event and how to get there can be found at faculty.fordham.edu/cbreiner/mathfest2019</h3>';
    $confMessage .= '</body></html>';
    if (mail($drBriener, $subject, $regInfo, $headers) && mail($emailAddress, $thankYou, $confMessage, $headers)){
		$msg = "Thanks for filling out our form";
    }
	else{
		$msg = "Problem sending the message";
	} */
}

?>
