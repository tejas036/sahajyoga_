<?php
session_start();
if (isset($_POST['submit'])) {
    include '../dbConnection.php';
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$mobile = $_POST["mobile"];
	$name = $_POST["name"];

     // Prepare the SQL insert query
     $sql = "INSERT INTO admin (email, password, mobile, name) VALUES (?, ?, ?, ?)";

     // Prepare and bind the statement
     if ($stmt = $conn->prepare($sql)) {
         // Hash the password before storing it (recommended)
         $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
 
         // Bind the parameters (s for string, i for integer)
         $stmt->bind_param("ssss", $email, $pass, $mobile, $name);
 
         // Execute the statement
         if ($stmt->execute()) {
             // If the insertion is successful, store the email in the session
             $_SESSION['userId'] = $email;
             echo "<script>alert('Registration successful!'); window.location.href = '../admin/admin.php';</script>";
         } else {
            echo "Error: " . $stmt->error;
             echo "<script>alert('Registration failed. Please try again.');</script>";
         }
 
         // Close the statement
         $stmt->close();
     } else {
         echo "Error preparing the statement: " . $conn->error;
     }
 
     // Close the connection
     $conn->close();


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>sahajayoga</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
<style>
        .signup-link {
			float:right;
            color: green; 
            text-decoration: none; /* Remove underline */
            transition: transform 0.2s ease, text-decoration 0.2s ease; /* Smooth transition for zoom and underline */
        }

        .signup-link:hover {
            text-decoration: underline; /* Underline on hover */
            transform: scale(1.1); /* Slight zoom on hover */
        }
    </style>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img height="300" width="300" src="images/logo3.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Admin Registration
					</span>
                    
                    <div class="wrap-input100 validate-input" data-validate="Valid Name is required: ">
                        <input class="input100" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Valid number is required: ">
                        <input class="input100" type="number" name="mobile" placeholder="7894561245">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit" id="submit">
							Sign up
						</button>
					</div>

					<div class="container" style="padding-top:10px; " ; >
						<a href="index.php" class="signup-link">
							Login
						</a>
					</div>

					<!-- <div class="text-center p-t-12"> -->
					<!-- <span class="txt1"> -->
					<!-- Forgot -->
					<!-- </span> -->
					<!-- <a class="txt2" href="#"> -->
					<!-- Username / Password? -->
					<!-- </a> -->
					<!-- </div> -->

					<div class="text-center p-t-136">
						<!-- <a class="txt2" href="pass_reset.php">
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true">Reset Pass</i>
						</a> -->
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
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>