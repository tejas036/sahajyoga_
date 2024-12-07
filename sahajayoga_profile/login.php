<?php
include_once 'dbConnection.php';
session_start();


// Update session values based on GET parameters, if provided
if (isset($_GET['event']) && isset($_GET['type'])) {
    $_SESSION['event'] = htmlspecialchars($_GET['event']);
    $_SESSION['type'] = htmlspecialchars($_GET['type']);
}


// Check if the user is already logged in
if (isset($_SESSION["userId"])) {
    // User is logged in, redirect to contribution_from.php
    // Redirect with query parameters
    header('Location: contribution_from.php');
    exit();
}

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

    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/dynamicAction.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <header>
        <div align="center">
            <img align="left" src="assets/logo3.png" height="70" width="70"/>
            <!-- <a href="index.php">Go To Home</a> -->
        </div>
    </header>
</head>
<body>

<div class="container">
    <h1 class="text-center my-5">Login Page</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                </div>
                <form method="post" action="">
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
    </div>
</div>

</body>
</html>

