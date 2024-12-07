<?php
session_start();
include_once '../dbConnection.php';
$email = $_POST['email'];
$password = $_POST['pass'];
if (isset($_POST['submit'])) {
    if (isset($email) && isset($password)) {
        $sql = "Select * From tbl_admin_login where UserName='$email' and Password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["userid"] = $row["id"];  
                $_SESSION["usermail"] = $row["UserName"];
                $_SESSION["username"] = 'ADMIN';
                $_SESSION["roles"] = 'admin';
                $_SESSION["Status"] = $row["Status"];

                if($_SESSION["Status"] == 1)
                {
	            header("Location: ../admin/admin.php");
                }
                else
                {
                 header("Location: ../admin/staff.php"); 
                }
            }
        }

        else
        {
            echo "<SCRIPT> 
                alert('Invalid UserName & Password')
                window.location.replace('index.php');
            </SCRIPT>";
            echo "<script>alert('Invalid UserName & Password.');</script>";
        }
    }
}
?>