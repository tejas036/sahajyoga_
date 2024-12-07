<?php
error_reporting(0);
session_start();
if (isset($_SESSION["email"])) {
	// User is logged in, redirect to contribution_from.php
	// Redirect with query parameters
	print_r($_SESSION);
	// die();
	header('Location: result.php');
	exit();
} ?>
<!DOCTYPE html>
<html>

<head>
	<title>Sahaja Yoga User Verification Page</title>

	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sahaja Yoga Donation</title>

		<link rel="stylesheet" href="assets/demo.css">
		<link rel="stylesheet" href="assets/form-basic.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="assets/dynamicAction.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

		<!-- Bootstrap Icons -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

		<header>
			<div class="row align-items-center">
				<!-- Left: Logo and Title -->
				<div class="col-pl-1   d-flex align-items-center">
					<img src="assets/logo3.png" height="70" width="70" alt="Logo" class="mr-2">
					<h4 class="mb-0" style="color: #fff;">Sahaj Yoga Mumbai</h4>
				</div>

				<!-- Center: Search Bar -->
				<!-- <div class="col text-center">
                    <div class="input-group" style="max-width: 250px; margin: auto;">
                        <input type="text" id="search" class="form-control" placeholder="Search..." style="border-radius: 20px;">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div>  -->

				<!-- Right: Profile Icon -->
				<!-- <div class="col text-right">
                 <a href="../sahajoga_Profile/"  >  <i class="bi bi-person-circle" style="font-size: 40px; cursor: pointer; color: #212529;"></i></a> 
                </div> -->
			</div>
		</header>
	</head>
	<style>
		header {
			box-sizing: border-box;
			text-align: center;
			width: 100%;
			padding: 25px 40px;
			background: linear-gradient(90deg,
					rgba(131, 58, 180, 1) 0%,
					rgba(253, 29, 29, 1) 50%,
					rgba(252, 176, 69, 1) 100%);
			overflow: hidden;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			border-radius: 0 0 20px 20px;
		}
	</style>

<body>

	<div class="container">

		<div class="form-title-row my-4 mx-4">

			<h3 style="text-align: center;">The Life Eternal Trust, Mumbai</h3>
<!-- 
			<h2 style="text-align: center;">International Sahaja Yoga Seminar, Nirmal Nagari, Ganapatipule</h2>

			<h3 style="text-align: center;">December 22-25, 2024</h3> -->
			<!-- <hr> -->

			<!-- <h4>Online Contribution for Indians Only.</h4> -->

			<!-- <p style="font-size:12px">All * Fields are mandatory to fill.</p> -->

		</div>
		<div class="row justify-content-center">
			<div class="col-md-6" >
				<div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
					<div class="card-header" style="background: linear-gradient(90deg,
					rgba(131, 58, 180, 1) 0%,
					rgba(253, 29, 29, 1) 50%,
					rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0;">
						<h3 class="text-center text-white">Login Page</h3>
					</div>
					<form method="post" action="#">
						<div class="card-body" style="padding: 50px;">
							<div class="form-group ">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" name="email" required id="inputEmail4" placeholder="Enter your email">
							</div>
							<div class="form-group mt-4">
								<label for="inputPassword4">Mobile</label>
								<input type="tel" class="form-control" id="mobile" required name="mobile" pattern="[0-9]{10}" placeholder="Enter your mobile number">
							</div>
							<div class="text-center  mt-5 d-flex justify-content-center align-items-center" style="height: 100%;">
								<input type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius: 5px; width: 20%;" value="Submit">
							</div>

						</div>
					</form>
					<div class="form-group col-md-12 d-flex justify-content-center mt-1">
				<span>Don't have any Account yet? </span>
				<a href="registration.php" class="ml-2"> <strong>  Register here</strong></a>
			</div>

				</div>
			</div>

			<!-- <div class="form-group col-md-6">
					<a href="ForgotPass.php" class="float-right">Forgot Password</a>
					</div> -->

			
			<br>
		</div>
	</div>
	</div>
</body>
<div class="" style="margin-top: 130px;">

	<?php include 'footer.php' ?>
</div>

</html>


<?php
ob_start(); // Start output buffering
include_once 'dbConnection.php';
session_start();


$email = '';
$phone = '';
if (isset($_POST["email"]) && isset($_POST["mobile"])) {
	$email = $_POST["email"];
	$phone = $_POST["mobile"];
}



$otp = rand(111111, 999999);
if (!empty($_POST["submit"])) {
	$sql = "SELECT * from sahajyoga_user_registration  WHERE  email = '" . $email . "' AND mobile = '" . $phone . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {

			$msg = "Your OTP is : $otp";
			$msg = wordwrap($msg, 70);
			$email = $row["Email"];
			//  echo '<br>';


			$_SESSION["email"] = $email;
			$_SESSION["mobile"] = $phone;
			$_SESSION["otp"] = $otp;
			echo '<script type="text/javascript">';
			echo 'alert("OTP has been sent to your Email-Id.");';
			echo 'window.location.href = "otp.php";';
			echo '</script>';
			
		}
	} else {
		echo "<script> alert('Record not found for this Email id and Mobile Number.'); </script>";
		echo '<script> window.location.href = "registration.php"';
		echo '</script>';
	}
}
mysqli_close($conn);
ob_end_flush(); // Flush the output buffer
?>