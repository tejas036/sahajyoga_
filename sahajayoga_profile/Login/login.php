<?php
session_start();
include_once '../dbConnection.php';
$email = $_POST['email'];
$password = $_POST['pass'];
if (isset($_POST['submit'])) {
    if (isset($email) && isset($password)) {
       echo $sql = "Select * From profile_admin where email='$email' and Password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["userid"] = $row["id"];  
                $_SESSION["username"] = $row["email"];  
	            header("Location: ../admin/admin.php");
            }
        }
        else
        {
            echo "<SCRIPT> 
                alert('Invalid UserName & Password')
                 window.location.replace('index.php');
            </SCRIPT>";
            

            // echo "<script>alert('Invalid UserName & Password.');</script>";
        }
    }
}
?>
