<?php
$our_email = "noreply@sahajayogamumbai.org";
$to = "donations@sahajayogamumbai.org";
$from = $our_email;
$subject = "yoursubject";
$mailid = 25;
$URL = "https://www.sahajayogamumbai.org/contribution/receipt.php?id=".$mailid;
$ccc = "donations@sahajayogamumbai.org";
$message = <<<EOF
<html>
<body>
<p>Thanks for the Donation.</p>
<p>Please find receipt.</p>
<a href="$URL">Click Here</a>
</body>
</html>
EOF;
// $message .=$URL;

$headers  = "From: $from\r\n";
$headers .= "Cc: $ccc\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


$mail = mail($to, $subject, $message, $headers);

if ($mail) {
echo "Message sent successfully";
}
else {
echo "Message didn't send";
}
?>