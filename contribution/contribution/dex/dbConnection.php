<?php
//For Local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "nexo";


//for QA
//$servername = "103.35.165.198";
//$username = "sagar";
//$password = "Pspl_2019";
//$dbname = "sahajayoga";

//for UAT
//$servername = "103.35.165.198";
//$username = "sagar";
//$password = "";
//$dbname = "sahajayoga";



//for Live
$servername = "sahajayogamumbai.org";
$username = "payplatter";
$password = "Dexpert@2020";
$dbname = "symumbai";


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
} 

