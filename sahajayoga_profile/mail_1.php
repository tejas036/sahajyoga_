<?php

$to      = 'synilesh@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: noreply@sahajayogabharat.org'       . "\r\n" .
             'Reply-To: webmaster@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

$mail = mail($to, $subject, $message, $headers);

if ($mail) {
echo "Message sent successfully";
}
else {
echo "Message didn't send";
}

//require_once './vendor/autoload.php';
/*
//echo "mm"; exit;
$from = 'Your Hotel <synilesh@gmail.com>';
$to = 'Me <nileshvmahajan@gmail.com>';
$subject = 'Thanks for choosing Our Hotel!';

//echo "mm"; exit;
$headers = ['From' => $from,'To' => $to, 'Subject' => $subject];

// include text and HTML versions
$text = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
$html = 'Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.';

//add  attachment
//$file = '/confirmations/yourbooking.pdf';
//$mime = new Mail_mime();
//$mime->setTXTBody($text);
//$mime->setHTMLBody($html);
//$mime->addAttachment($file, 'text/plain');


//$body = $mime->get();
//$headers = $mime->headers($headers);
$subject = 'the subject';
$message = 'hello';
$headers = 'From: synilesh@gmail.com'       . "\r\n" .
             'Reply-To: webmaster@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
//echo "mm"; exit;

$host = 'smtp.gmail.com';
$username = 'synilesh@gmail.com'; // generated by Mailtrap
$password = ''; // generated by Mailtrap
$port = '993';
//echo "mm"; exit;
$smtp = Mail::factory('smtp', [
  'host' => $host,
  'auth' => true,
  'username' => $username,
  'password' => $password,
  'port' => $port
]);

$mail = $smtp->mail($to, $subject, $message, $headers);
//$mail = $smtp->send($to, $headers, $body);

//echo "mm"; exit;
if ($mail) {
echo "Message sent successfully";
}
else {
echo "Message didn't send";
}
*/
// Pear Mail Library
/*require_once "Mail.php";

$from = '<noreplay@sahajayogamumbai.org>';
$to = '<synilesh@gmail.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => '166.62.28.133',
        'port' => '465',
        'auth' => true,
        'username' => 'noreplay@sahajayogamumbai.com',
        'password' => 'TEST#321'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
*/
?>