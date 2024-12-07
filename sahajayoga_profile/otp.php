<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

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
					<h4 class="mb-0 text-white" >Sahajayoga, Mumbai</h4>
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
		<?php
		include_once 'dbConnection.php';
		error_reporting(0);
		session_start();
		//  print_r($_SESSION['donation']);
		$sendotp = $_SESSION['otp'];

		?>
		<!-- <h1 class="text-center my-5">OTP Page</h1> -->
		<div class="form-title-row my-4 mx-4">

		<h3 style="text-align: center;"> <strong>THE LIFE ETERNAL TRUST, MUMBAI</strong> </h3>

		
			
			<!-- <hr> -->

			<!-- <h4>Online Contribution for Indians Only.</h4> -->

			<!-- <p style="font-size:12px">All * Fields are mandatory to fill.</p> -->

		</div>
		<!-- <hr> -->
		<div class="row justify-content-center">

			<div class="col-md-6" align="center">
				<div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
					<div class="card-header " style="background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0 ;">
					<h3 class="text-center text-white">	Please enter the OTP received on your email 
						<?php //echo $sendotp ?></h3>
					</div>
					<form method="post" action="#">
						<div class="card-body" align="center">
							<div class="form-row" align="center">
								<div class="form-group col-md-2"></div>
								<div class="form-group col-md-8" align="center">
									<input type="tel" class="form-control " align="center" id="otp" pattern="[0-9]{6}" name="otp" placeholder="OTP" required>
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
<div style="margin-top: 410px;">
	<?php include_once 'footer.php' ?>
</div>

<?php
include_once 'dbConnection.php';
session_start();
if (isset($_POST["otp"])) {
	$otp = $_POST["otp"];
}

$sendotp = $_SESSION['otp'];
//  echo "<script> alert('$sendotp'); </script>";
if (!empty($_POST["submit"])) {
	if ($otp == $sendotp) {
		echo '<script type="text/javascript">';
		echo 'alert("OTP Match.");';
		echo 'window.location.href = "result.php";';
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