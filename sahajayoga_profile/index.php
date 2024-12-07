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
					<h4 class="mb-0" style="color: #fff;">Sahajayoga, Mumbai</h4>
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

			<h3 style="text-align: center;"> <strong>THE LIFE ETERNAL TRUST, MUMBAI</strong> </h3>
			<!-- 
			<h2 style="text-align: center;">International Sahaja Yoga Seminar, Nirmal Nagari, Ganapatipule</h2>

			<h3 style="text-align: center;">December 22-25, 2024</h3> -->
			<!-- <hr> -->

			<!-- <h4>Online Contribution for Indians Only.</h4> -->

			<!-- <p style="font-size:12px">All * Fields are mandatory to fill.</p> -->

		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
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
							<div class="form-group mt-2  mb-0 mt-4 d-flex justify-content-center align-items-center">
								<div class="text-center  mt-2 d-flex justify-content-center align-items-center" style="height: 100%;">
									<input type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius: 5px;" value="Submit">
								</div>
							</div>

						</div>
					</form>
					<div class="form-group col-md-12 d-flex justify-content-center mt-0">
						<span>Don't have any Account yet? </span>
						<a href="registration.php" class="ml-2"> <strong> Register here</strong></a>
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
<div class="" style="margin-top: 218px;">

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

			echo $msg = "Your OTP is : $otp";
			echo '<br>';
			$msg = wordwrap($msg, 70);
			echo '<br>';
			//  echo $email = $row["Email"];
			//  echo '<br>';
		
			$curl = curl_init();
			
			
			$to = $email; 
			$cc = "rahul@dexpertsystems.com";
			$subject = "Sahaja Yoga Donor Login OTP";
			$name = $row['first_name'];
			$otp = $otp; 
			$team = "Sahaja Yoga"; 
			$product_name = "Donor Login"; 
			
			
			$postData = json_encode([
				"mail_template_key" => "2518b.638e51fdc353256d.k1.2a6a2160-6e67-11ef-a26b-52540038fbba.191d51f4e76",
				"from" => [
					"address" => "noreply@sahajayogamumbai.org",
					"name" => "noreply"
				],
				"to" => [
					[
						"email_address" => [
							"address" => $to,
							"name" => $name
						]
					]
				],
				"cc" => [
					[
						"email_address" => [
							"address" => $cc,
							"name" => "Rahul"
						]
					]
				],
				"merge_info" => [
					"name" => $name,
					"OTP" => $otp,
					"team" => $team,
					"product_name" => $product_name
				]
			]);
			
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.zeptomail.in/v1.1/email/template",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $postData,
				CURLOPT_HTTPHEADER => array(
					"accept: application/json",
					"authorization: Zoho-enczapikey PHtE6r1YQLjjjWcr8RlWsPftEcStM9suq+lifVNEsYoUX/cGTU0ArI14wTG//00tA/NGF6SSmo5vubjItLiFI2vpZGtEXWqyqK3sx/VYSPOZsbq6x00ftFgcd0zdUYLpdtJo1ibVutjfNA==",
					"cache-control: no-cache",
					"content-type: application/json"
				),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				//echo $response;
			}
		
			
			
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
			if ($curl && $smsResponse) {
				$_SESSION["email"] = $email;
				$_SESSION["mobile"] = $phone;
				$_SESSION["otp"] = $otp;
				echo '<script type="text/javascript">';
				echo 'alert("OTP has been sent to your Email-Id and Mobile Number.");';
				echo 'window.location.href = "otp.php";';
				echo '</script>';
			} else {
				echo '<script type="text/javascript">';
				echo 'alert("Failed to send OTP via email or SMS. Please try again later.");';
				echo '</script>';
			}
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

<?php
$curl = curl_init();



$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
?>