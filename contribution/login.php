<?php
include_once 'dbConnection.php';
error_reporting(0);
 session_start();


// Update session values based on GET parameters, if provided
if (isset($_GET['event']) && isset($_GET['type'])) {
    $_SESSION['event'] = htmlspecialchars($_GET['event']);
    $_SESSION['type'] = htmlspecialchars($_GET['type']);
}


// // Check if the user is already logged in
// if (isset($_SESSION["userId"])) {
//     // User is logged in, redirect to contribution_from.php
//     // Redirect with query parameters
//     header('Location: contribution_from.php');
//     exit();
// }

$email = '';
$phone = '';

if (isset($_POST["email"]) && isset($_POST["mobile"])) {
    $email = $_POST["email"];
    $phone = $_POST["mobile"];
}

$otp = rand(111111, 999999);

if (!empty($_POST["submit"])) {
    $sql = "SELECT * FROM sahajyoga_user_registration WHERE email = ? AND mobile = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If a matching record is found
        $user = $result->fetch_assoc();
        $_SESSION["userId"] = $user['id']; // Store userId in session
        $_SESSION["email"] = $email;
        $_SESSION["mobile"] = $phone;
        $_SESSION["otp"] = $otp;

        echo '<script type="text/javascript">';
        echo 'alert("User validated successfully. Your OTP is: ' . $otp . '");';
        echo 'window.location.href = "otp.php";';
        echo '</script>';
    } else {
        // If no matching record is found
        echo '<script type="text/javascript">';
        echo 'alert("User not found. Please register.");';
        echo 'window.location.href = "registration.php";';
        echo '</script>';
    }

    $stmt->close();
}

$conn->close();






?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahaja Yoga Login Page</title>

   <?php include_once 'header1.php' ?>
</head>

<body>

    <div class="container" style="">
       
        <div class="row justify-content-center" style="margin-top: 60px;">
            <div class="col-md-6">
                <div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style=" background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%);border-radius: 20px 20px 0 0;">
                        <h3 class="text-center" style="color: #fff;">Login</h3>
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
                            <div class="form-group mt-4  mb-0 mt-4 d-flex justify-content-center align-items-center">
                                <div class="text-center mb-0 mt-4 d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <input type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius: 5px; " value="Submit">
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