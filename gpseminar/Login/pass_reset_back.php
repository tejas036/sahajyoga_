<?php
error_reporting(0);
include_once '../dbConnection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
	echo "<script>window.location.href='index.php'</script>";
}
?>
<?php

if (isset($_POST['submit'])) {
    

    $stmt=$conn->prepare("select * from tbl_admin_login where emails=?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$result=$stmt->get_result();
		$count=$result->num_rows;
      
        if($count==1)
		{

            $fourdigitrandom = rand(1000,9999);
			$otp = $fourdigitrandom;
            session_start();
            $_SESSION['email']=$email;
			$_SESSION['otp']=$otp;


            $from = "noreply@thelifeeternaltrustmumbai.org";
            $to = $email;
                    
            //$bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';
            //$ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';

            $subject = "International Sahaja Yoga Admin / Staff Login Forgot Password"; 
            //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

            // a random hash will be necessary to send mixed content
            $separator = md5(time());

            // carriage return type (we use a PHP end of line constant)
            $eol = PHP_EOL;


            $headers  = 'From: '.$from.$eol;
            //$headers .= 'Cc: '.$ccc.$eol;
            // $headers .= 'Cc: '.$cc1.$eol;
            //$headers .= 'Bcc: '.$bcc.$eol;  
            $headers .= "MIME-Version: 1.0".$eol; 
            $headers .= "Content-type:text/html;charset=UTF-8".$eol; 
            $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            // no more headers after this, we start the body! // 
            $cop = "";
            foreach($coupon_number as $index=> $value) 
            { 
            $cop .= "<tr><td>".$participant_name[$index]."</td><td>".$coupon_number[$index]."</td></tr>";
            }

            $tdate=date_create($transactionDate,timezone_open("Asia/Kolkata"));
            $tjDate =  date_format($tdate,"jS F Y");


            $body .= 'International Sahaja Yoga Admin / Staff Login Forgot Password , OTP: '.$otp.'';

            mail($to, $subject, $body, $headers);
           
            echo "<SCRIPT> 
            alert('Email Id Verification Done successfully OTP Send our Email Id')
            window.location.replace('pass_resetotp.php');
        </SCRIPT>";
    } else {
        echo "<SCRIPT> 
        alert('sorry Email Id Verification failed, try again.')
        window.location.replace('pass_reset.php');
        </SCRIPT>";
    }
       
   
}
?>
