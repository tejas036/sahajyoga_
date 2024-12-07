<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "nexo";

$dbname="pp_platterpay";
$port="3306";
$username="dexpertadmin";
$password="Dspl_2015";
$servername="payplatterdbnew.ccjji9el8hsw.ap-south-1.rds.amazonaws.com";


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
} 

