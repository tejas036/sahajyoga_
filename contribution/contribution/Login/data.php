<?php
session_start();
include_once '../dbConnection.php';
$email = $_POST['email'];
$password = $_POST['pass'];
$password1 = $_POST['pass1'];

$sql = "Select * From tbl_admin_login ";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<br>id :". $row["id"];  
        echo "<br>name :".  $row["UserName"];  
        echo "<br>pass :".  $row["Password"];  
        echo "<br>status :".  $row["Status"];  
    }

die('vinit');
?>