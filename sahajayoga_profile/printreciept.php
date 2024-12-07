<?php
	include_once 'dbConnection.php';
	session_start();
	$email = $_POST["email"];
	$phone = $_POST["mobile"];
	$otp=rand(111111,999999);
	if(!empty($_POST["submit"])) {
		$sql = "SELECT * from transactions WHERE  Email = '".$email."' AND Mobile = '".$phone."' AND Status = 'Success' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {

				 $msg = "Your OTP is : $otp";
				 $msg = wordwrap($msg,70);
				 $email = $row["Email"];
				if(@mail($email,"OTP",$msg))
				{
					 $_SESSION["email"] = $email;  
					 $_SESSION["mobile"] = $phone;  
					 $_SESSION["otp"] = $otp;  
					echo '<script type="text/javascript">'; 
					echo 'alert("OTP has been sent to your Email-Id.");'; 
					echo 'window.location.href = "otp.php";';
					echo '</script>';
				}else{
				  echo "Mail Not Sent";
				}
			}
		}else {
			echo "<script> alert('Record not found for this Email id and Mobile Number.'); </script>";
		}
	}
	mysqli_close($conn);
?>	
