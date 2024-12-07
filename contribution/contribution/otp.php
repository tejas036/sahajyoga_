<!DOCTYPE html>
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
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
	<header>
	<div align="center">
       <img align="left" src="assets/logo3.png" height="70" width="70"/>
	   <a href="index.html">Go To Home</a> 
	   </div>
    </header> 
</head>
<body>
<div class="container">
	<h1 class="text-center my-5" >The Life Eternal Trust, Mumbai</h1>
		<div class="row justify-content-center">
			<div class="col-md-6" align = "center">
				<div class="card card-default">
					<div class="card-header">
						 Please enter the OTP received on your email
					</div>
					<form  method="post" action="#">
					<div class="card-body"  align="center">
						<div class="form-row" align="center">
							<div class="form-group col-md-2"></div>
							<div class="form-group col-md-8"  align="center">
							  <input type="tel" class="form-control " align="center id="otp" pattern="[0-9]{6}" required name="otp" placeholder="OTP">
							</div>
						</div>
						<div class="form-row" align = "center">
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

  <?php
	include_once 'dbConnection.php';
	session_start();
	
	 $otp = $_POST["otp"];
	 $sendotp = $_SESSION['otp'];
	//  echo "<script> alert('$sendotp'); </script>";
	if(!empty($_POST["submit"])) {
		if($otp == $sendotp){
			echo '<script type="text/javascript">'; 
			echo 'alert("OTP Match.");'; 
			echo 'window.location.href = "result.php";';
			echo '</script>';
		}
		else {
			session_unset();
			session_destroy();
			echo '<script type="text/javascript">'; 
			echo 'alert("OTP Not Match.");'; 
			echo 'window.location.href = "print.php";';
			echo '</script>';
		}
	}
	mysqli_close($conn);
	
?>
  