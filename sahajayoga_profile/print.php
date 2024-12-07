<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga Login Page</title>
	
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="assets/dynamicAction.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
	<header>
	<div align="center">
       <img align="left" src="assets/logo3.png" height="70" width="70"/>
	   <a href="index.php">Go To Home</a> 
	   </div>
    </header> 
</head>
<body>

<div class="container">
	<h1 class="text-center my-5" >Login Page</h1>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card card-default">
					<div class="card-header">
					</div>
					<form  method="post" action="#">
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label for="inputEmail4">Email:-</label>
							  <input type="email" class="form-control" name="email" required id="inputEmail4" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
							  <label for="inputPassword4">Mobile:-</label>
							  <input type="tel" class="form-control" id="mobile" required name="mobile" pattern="[0-9]{10}" placeholder="Mobile">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<input type="submit" name="submit" class="btn btn-primary float-right" value="Submit">
							</div>
						</div>
					</div>
					</form>

					
				</div>
			</div>

			       <div class="form-group col-md-6">
					<a href="#" class="float-right">Change Password</a>
					</div>

					<div class="form-group col-md-6">
					<a href="registration.php" class="float-left">New Registration</a>
					</div>
					<br>
		</div>
	</div>
</div>
</body>
</html>
  
<?php
	include_once 'dbConnection.php';
	session_start();
	$email = '';
	$phone = '';
	if(isset($_POST["email"]) && isset($_POST["mobile"])) {
		$email = $_POST["email"];
		$phone = $_POST["mobile"];
	}

	$otp=rand(111111,999999);
	if(!empty($_POST["submit"])) {
		$sql = "SELECT * from event_registration  WHERE  Email = '".$email."' AND Mobile = '".$phone."'  order by event_registration_id DESC limit 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {

				 echo $msg = "Your OTP is : $otp";
				 echo '<br>';
				 $msg = wordwrap($msg,70);
				 echo '<br>';
				//  echo $email = $row["Email"];
				//  echo '<br>';
				
				
					 $_SESSION["email"] = $email;  
					 $_SESSION["mobile"] = $phone;  
					 $_SESSION["otp"] = $otp;  
					echo '<script type="text/javascript">'; 
					echo 'alert("OTP has been sent to your Email-Id.");'; 
					echo 'window.location.href = "otp.php";';
					echo '</script>';
				
			}
		}else {
			echo "<script> alert('Record not found for this Email id and Mobile Number.'); </script>";
			echo '<script> window.location.href = "registration.php"';
			echo '</script>';
		}
	}
	mysqli_close($conn);
?>	
