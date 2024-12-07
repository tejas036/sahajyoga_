<?php include_once 'dbConnection.php';
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga Donation</title>

	<?php include_once 'header1.php' ?>
</head>

<body>
	<div class="container">
		<h1 class="text-center my-5">The Life Eternal Trust, Mumbai</h1>

		<div class="row justify-content-center">
			<div class="col-md-6" align="center">
				<div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
					<div class="card-header" style="background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0 ;">
						<h3 class="text-center text-white">Please enter the OTP received on your email
							<?php
							//session_start();
							//echo $sendotp = $_SESSION['otp'];


							?>
						</h3>
					</div>
					<form method="post" action="#">
						<div class="card-body" align="center">
							<div class="form-row" align="center">
								
								<div class="form-group col-md-8" align="center">
									<input type="tel" class="form-control " align="center id=" otp" pattern="[0-9]{6}" required name="otp" placeholder="OTP">
								</div>
							</div>
							<div class="form-row" align="center">
								<div class="form-group col-md-12 mt-4">
									<input type="submit" name="submit" class="btn btn-primary" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
// session_start();


 echo $otp = $_POST["otp"];
 $sendotp = $_SESSION['otp'];
//  echo "<script> alert('$sendotp'); </script>";
if (!empty($_POST["submit"])) {
	if ($otp == $sendotp) {
		echo '<script type="text/javascript">';
		echo 'alert("OTP Match.");';
		echo 'window.location.href = "contribution_from.php";';
		echo '</script>';
	} else {
		session_unset();
		session_destroy();
		echo '<script type="text/javascript">';
		echo 'alert("OTP Not Match.");';
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}
}
mysqli_close($conn);

?>