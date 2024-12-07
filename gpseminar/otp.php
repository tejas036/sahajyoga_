<!DOCTYPE html>
<html>

<head>


	<?php include 'header.php' ?>
</head>

<body style="max-height: 100%;">
	<div class="container my-5">
	<h3 style="text-align: center;"> <strong>THE LIFE ETERNAL TRUST, MUMBAI</strong> </h3>
		<h2 style="text-align: center;">International Sahaja Yoga Seminar, Nirmala Nagari, Ganapatipule</h2>

		<h3 style="text-align: center;" class="mb-5">December 22-25, 2024</h3>
		<div class="row justify-content-center">
			<div class="col-md-6" align="center">
				<div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
					<div class="card-header"style="background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0 ;">
						<h3 class="text-center text-white">Please enter the OTP received on your email
						<?php
						session_start();
						  //echo $sendotp = $_SESSION['otp'];
						

						?>
						</h3>
					</div>
					<form method="post" action="#">
						<div class="card-body" align="center">
							<div class="form-row" align="center">
								<div class="form-group col-md-2"></div>
								<div class="form-group col-md-8" align="center">
									<input type="tel" class="form-control " align="center id=" otp" pattern="[0-9]{6}" required name="otp" placeholder="OTP">
								</div>
							</div>
							<div class="form-row" align="center">
								<div class="form-group col-md-12">
									<input type="submit" name="submit" class="btn btn-primary" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>
<div style="margin-top: 270px;">
	<?php include_once 'footer.php' ?>
</div>

<?php
include_once 'dbConnection.php';
// session_start();
if (isset($_POST["otp"])) {
	$otp = $_POST["otp"];
}

$sendotp = $_SESSION['otp'];
//  echo "<script> alert('$sendotp'); </script>";
if (!empty($_POST["submit"])) {
	if ($otp == $sendotp) {
		echo '<script type="text/javascript">';
		echo 'alert("OTP Match.");';
		echo 'window.location.href = "eventform.php";';
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