<?php
$our_email = "noreply@sahajayogabharat.org";
$to = "rahul@dexpertsystems.com";
$from = $our_email;
$subject = "yoursubject";
$mailid = 25;
$URL = "https://www.sahajayogabharat.org/gpseminar/receipt.php?id=".$mailid;
$ccc = "rahul@dexpertsystems.com";
$cc1 = "rahul@dexpertsystems.com";
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
$headers .= "Cc: $cc1\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


$mail = mail($to, $subject, $message, $headers);

if ($mail) {
echo "Message sent successfully";
}
else {
echo "Message didn't send";
}
?>