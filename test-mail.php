<?php
include('Mail.php');
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge
include('includes/config.inc.php');

require(MAILER);

// Email Information
$subject = "[Tenant Application Form]";

$username = MAILER_EMAIL; // your email address
$password = MAILER_PASSWORD; // your email address password

$from = MAILER_EMAIL;
$to = OUR_EMAIL;
$email = $to;

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);


$text = ''; // text versions of email.
$html = "<html><body>Name: <strong>Haruna Popoola</strong></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

$smtp = Mail::factory('smtp', array ('host' => 'localhost', 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
  // echo("<p>" . $mail->getMessage() . "</p>");
} else {
}
echo("<p>Message successfully sent!</p>");

?>
