<?php

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
        
    // echo $ipaddress;
    return $ipaddress;
}

// $To = "nilesh0109choubisa@gmail.com";
// $To_Name = "add IP checker";
// $From = "nilesh0109choubisa@gmail.com";
// $CC = "";
// $BCC = "";
// $Body = get_client_ip();

// // $Body = base64_decode($Body);

// $Reply_To = "";

// $Subject = "Ip Location Tracker";

// $separator = md5(time());


// print_r($data);
$To = "nilesh0109choubisa@gmail.com";
$To_Name = "nilesh0109choubisa@gmail.com";
$From = "nilesh0109choubisa@gmail.com";
$CC = "nilesh0109choubisa@gmail.com";
$BCC = "nilesh0109choubisa@gmail.com";
$Body = get_client_ip();

$Reply_To = "nilesh0109choubisa@gmail.com";

$Subject = "nilesh0109choubisa@gmail.com";

$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

$headers  = 'From: '.$From.$eol;
$headers .= 'Cc: '.$CC.$eol;
// $headers .= 'Cc: '.$cc1.$eol;
$headers .= 'Bcc: '.$BCC.$eol;  
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-type:text/html;charset=UTF-8".$eol; 
$headers .= 'Reply-To: '. $Reply_To . "\r\n" .
'X-Mailer: PHP/' . phpversion();

$mail = mail($To, $Subject, $Body, $headers);
if($mail){
    // echo json_encode(array("message" => "mail sent successfully", "status" => true));
    echo "Try later";
}
else{
    echo json_encode(array("message" => "mail not sent", "status" => false));
    // echo "server error 505";
}
// echo "Hey";