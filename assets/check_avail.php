<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_booking ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_booking ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name_booking   = $_POST['name_booking'];
$email_booking   = $_POST['email_booking'];
$phone_booking   = $_POST['phone_booking'];
$message_booking   = $_POST['message_booking'];

if(trim($name_booking ) == '') {
	echo '<div class="error_message">Enter your Name and Last name.</div>';
	exit();
} else if(trim($email_booking) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email_booking)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
} else if(trim($phone_booking) == '') {
	echo '<div class="error_message">Please enter a valid phone number.</div>';
	exit();
} else if(!is_numeric($phone_booking)) {
	echo '<div class="error_message">Phone number can only contain numbers.</div>';
	exit();
} else if(trim($message_booking) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
}

//$address = "HERE your email address";
$address = "info@domain.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $name_booking . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $name_booking with additional request." . PHP_EOL . PHP_EOL;
$e_content = "$message_booking" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $name_booking via email: $email_booking or telephone: $phone_booking .";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_booking" . PHP_EOL;
$headers .= "Reply-To: $email_booking" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_booking";
$usersubject = "Thank You";
$userheaders = "From: info@domain.com\n";
$userheaders .= "MIME-Version: 1.0" . PHP_EOL;
$userheaders .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$userheaders .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
$usermessage = "Thank you for contact Electrician. We will reply shortly with more details. Here a summary of your request: \n\n$e_content.  \n\n Call 0034 434324  for further information.";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:20px 0 40px 0; text-align:center; '>";
	echo "<div style='font-size:90px; font-weight:normal; margin-bottom:20px;'><i class='icon_set_1_icon-76'></i></div>";
	echo "<strong >Email Sent.</strong><br>";
	echo "Thank you <strong>$name_booking</strong>,<br> your message has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
