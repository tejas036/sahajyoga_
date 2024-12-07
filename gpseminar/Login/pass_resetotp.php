<?php
session_start();
include_once("../dbConnection.php");
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$otp = $_SESSION['otp'];
} else {
	echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>sahajayoga</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img height="300" width="300" src="images/logo3.png" alt="IMG">
				</div>

				<form>
					<span class="login100-form-title">
						Create New Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid OTP is required: ****">
						<input class="input100" type="text" name="otp" id="otp" placeholder="otp">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "New Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					
					
					<div class="container-login100-form-btn">
                    <button type="button" class="btn btn-success" id="loginbtn">Submit</button>
					</div>

					   <center>
							<span id="response" style="font-size:15px; color:red;"></span>
						</center>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true">Home</i>
						</a>
					</div>
				</form>


						
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


    <script>
	$("#otp").blur(function() {
		var otp = document.getElementById('otp').value;
		if (otp == "" || otp == null) {
			$("#otp").attr("placeholder", "Please Enter otp")
			$("#otp").css("border", "1px solid red");
		} else {
			$("#otp").css("border", "1px solid green");
		}
	});


	$("#loginbtn").click(function() {
		var otp = $("#otp").val();
		//alert(otp);
		var logincontrol = "logindata";
		//alert(logincontrol);
		var password = $("#password").val();
		//alert(password);


		if (otp == "" || otp == null) {
			$("#otp").attr("placeholder", "Please Enter otp")
			$("#otp").css("border", "1px solid red");
		} else {
			
			document.getElementById('response').innerHTML = '';
			$.ajax({
				url: "pass_reset_otp_back.php",
				method: "POST",
				data: {
					logincontrol: logincontrol,
					otp: otp,
					password: password
				},
				success: function(data) {
					//alert(data);
					
					if (data == 1) {
						alert("otp verification successful password change");
						window.location.href = 'index.php';
					} else {
						document.getElementById('response').innerHTML = 'Invaid OTP';
					}
				}
			});
		}

	});
</script>

</body>
</html>



