<?php
// session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting (E_ALL);
error_reporting(0);

$id = $_REQUEST['trans_id'];

include_once '../dbConnection.php';

$query = "update event_registration set Status='Pending' where Transaction_id='$id' and paymenttype IS NOT NULL";

    if ($conn->query($query) === true) 
    {
       echo "<script> alert('Booking Cancelled Successfully Upadte.'); </script>";
     
       header("Location: https://sahajayogamumbai.org/gpseminar/admin/contributforeign.php");
    }
    else
    {
       echo "<script> alert('Not Update Please Try Agin.'); </script>";
       header("Location: https://sahajayogamumbai.org/gpseminar/admin/contributforeign.php");
    }
?>
