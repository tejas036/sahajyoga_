<?php
// error_reporting(0);
include_once 'dbConnection.php';


if (isset($_POST['submit'])) {
    // print_r($_POST);
    // die();
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password1 = $_POST['pass1'];


    if (isset($email) && isset($password)) {
        if ($password == $password1) {
            $sql = "UPDATE sahajyoga_user_registration SET Password='$password' where email='$email' ";
            if ($conn->query($sql) === TRUE) {
                // echo "<SCRIPT> 
                //     alert('password reset successfully')
                //     window.location.replace('index.php');
                // </SCRIPT>";
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'password reset successfully !',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'forgotPass.php';
                        }
                    });
                });
                </script>";
            } else {
                // echo "<SCRIPT> 
                // alert('Password not set, try again.')
                // window.location.replace('forgotPass.php');
                // </SCRIPT>";

                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops !',
                        text: 'Password not set, try again.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'forgotPass.php';
                        }
                    });
                });
                </script>";
            }
            $conn->close();

            // $sql = "UPDATE tbl_admin_login SET Password='$password' where UserName='$email' and Status=1";
            // $result = $conn->query($sql);
        } else {
            // echo "<SCRIPT> 
            // alert('confirm password not match')
            // window.location.replace('forgotPass.php');
            // </SCRIPT>";

            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops !',
                    text: 'confirm password not match',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'forgotPass.php';
                    }
                });
            });
            </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>sahajayoga</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/> -->
    <link rel="icon" type="image/png" href="../sahajoga_Profile/Login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../sahajoga_Profile/Login/css/main.css">
    <!--===============================================================================================-->
    <!-- sweetaler library  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img height="300" width="300" src="../sahajoga_Profile/Login/images/logo3.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-title">
                        User Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass1" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit" id="submit">
                            Reset
                        </button>
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
    <script src="../sahajoga_Profile/Login/vendor/bootstrap/js/popper.js"></script>
    <script src="../sahajoga_Profile/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../sahajoga_Profile/Login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../sahajoga_Profile/Login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../sahajoga_Profile/Login/js/main.js"></script>

</body>

</html>