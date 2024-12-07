<?php
	include_once 'dbConnection.php';
	session_start();
	$email = $_POST["email"];
	$phone = $_POST["mobile"];
	
	$email='tejas.khadke@dexpertsystems.com';
	$phone= '8698871263';
	$otp=rand(111111,999999);
	if(empty($_POST["submit"])) {
		$sql = "SELECT * from transactions WHERE  Email = '".$email."' AND Mobile = '".$phone."' AND Status = 'Success' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {

				 $msg = "Your OTP is : $otp";
				 $msg = wordwrap($msg,70);
				 $email = $row["Email"];
				 $emailCurl = curl_init();
				 $to = $email;
				 $cc = "rahul@dexpertsystems.com";
				 $subject = "Sahaja Yoga Donor Login OTP";
				 $htmlContent = "
				 <p>Hello,</p>
				 <p>You have received the option to log in to the Sahaja Yoga dashboard.</p>
				 <p>$msg</p>
				 <p>Regards,<br>Support</p>
			 ";
 
				 curl_setopt_array($emailCurl, array(
					 CURLOPT_URL => 'https://api.mailgun.net/v3/app.payplatter.in/messages',
					 CURLOPT_RETURNTRANSFER => true,
					 CURLOPT_ENCODING => '',
					 CURLOPT_MAXREDIRS => 10,
					 CURLOPT_TIMEOUT => 0,
					 CURLOPT_FOLLOWLOCATION => true,
					 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					 CURLOPT_CUSTOMREQUEST => 'POST',
					 CURLOPT_POSTFIELDS => array(
						 'from' => 'support@dexpertsystems.com',
						 'to' => $to,
						 'cc' => $cc,
						 'subject' => $subject,
						 'html' => $htmlContent // Use 'html' instead of 'text' for HTML content
					 ),
					 CURLOPT_HTTPHEADER => array(
						 'Authorization: Basic YXBpOmtleS00NzNlODlhODBiNWNiOGFjZGUzYTgxMGM5YTE4MDIyYQ==' // Mailgun API Key
					 ),
				 ));
 
				 $emailResponse = curl_exec($emailCurl);
				 curl_close($emailCurl);
 
				 // 2. Send SMS using cURL (bhashsms)
				 $smsCurl = curl_init();
				 $user = "anupamjeevan";
				 $password = "654789";
				 $senderId = "DESKTC";
				 $sms_url = "https://bhashsms.com/api/sendmsg.php?user=anupamjeevan&pass=654789&sender=DESKTC&phone=" . $phone . "&text=" . urlencode("Your 4 digit OTP to validate login is " . $otp . " - DEXPERT SYSTEMS PRIVATE LIMITED") . "&priority=ndnd&stype=normal";
				 curl_setopt_array($smsCurl, array(
					 CURLOPT_URL => $sms_url,
					 CURLOPT_RETURNTRANSFER => true,
					 CURLOPT_TIMEOUT => 0,
					 CURLOPT_FOLLOWLOCATION => true,
					 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					 CURLOPT_CUSTOMREQUEST => 'GET',
				 ));
 
				 $smsResponse = curl_exec($smsCurl);
				 curl_close($smsCurl);
 
				 // Check if both email and SMS were sent successfully
				 if ($emailResponse && $smsResponse) {
					 echo '<script type="text/javascript">';
					 echo 'alert("OTP has been sent to your Email-Id and Mobile Number.");';
					 echo 'window.location.href = "otp.php";';
					 echo '</script>';
					 // Store the OTP, email, and phone in the session
					 $_SESSION["email"] = $email;
					 $_SESSION["mobile"] = $phone;
					 $_SESSION["otp"] = $otp;
				 } else {
					 echo '<script type="text/javascript">';
					 echo 'alert("Failed to send OTP via email or SMS. Please try again later.");';
					 echo '</script>';
				 }
			 }
			
		}else {
			echo "<script> alert('Record not found for this Email id and Mobile Number.'); </script>";
		}
	}
	mysqli_close($conn);
?>	
