<?php


//local

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "symumbai";



//for Live
// $servername = "localhost";
// $username = "sahajayoga_root";
// $password = "Sahajayoga@all123";
// $dbname = "sahajayoga";

$servername = "localhost";
$username = "root";
$password = "Tejas@123";
$dbname = "sahyoga";




// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
} 

