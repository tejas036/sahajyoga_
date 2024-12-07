<?php
error_reporting(0);
include_once '../dbConnection.php';
$email = $_POST['email'];
$password = $_POST['pass'];
$password1 = $_POST['pass1'];

if (isset($_POST['submit'])) {
    if (isset($email) && isset($password)) {
        if ($password == $password1) {
            $sql = "UPDATE tbl_admin_logincont SET Password='$password' where UserName='$email' and Status=1";
            if ($conn->query($sql) === TRUE) {
                echo "<SCRIPT> 
                    alert('password reset successfully')
                    window.location.replace('index.php');
                </SCRIPT>";
            } else {
                echo "<SCRIPT> 
                alert('Password not set, try again.')
                window.location.replace('pass_reset.php');
                </SCRIPT>";
            }
            $conn->close();

            // $sql = "UPDATE tbl_admin_login SET Password='$password' where UserName='$email' and Status=1";
            // $result = $conn->query($sql);
        }else{
            echo "<SCRIPT> 
            alert('confirm password not match')
            window.location.replace('pass_reset.php');
            </SCRIPT>";
        }
    }
}
?>
