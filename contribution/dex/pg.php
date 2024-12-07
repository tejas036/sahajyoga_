<?php
/**
 * Created by PhpStorm.
 * User: Nitin Pandey
 * Date: 6/16/2020
 * Time: 10:54 PM
 */
session_start();
require_once('function.php');
require_once('file.php');

$EncryptDecrypt = new EncryptDecrypt();
$amount = $_POST['amount'];
$trans_id=rand(111111,999999);
$mtxnId = $trans_id;
$payerFirstName = $_POST['fname'];
$payerLastName = $_POST['lname'];
$payerContact = $_POST['mobile'];
$payerEmail = $_POST['email'];
$payerAddress = $_POST['city'].' '.$_POST['pincode'];
$city = $_POST['city'];
$pin = $_POST['pincode'];
$PANNo = $_POST['pan'];
$aadhar = $_POST['aadhaar'];
$towards = $_POST['payment_towards'];

include_once 'dbConnection.php';

$Date =  date("Y-m-d");
$Status = "Pending";
	$sql = "INSERT INTO `transactions` ( `id`, `Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Transaction_id`, `Amount`, `Status`, `Transaction_start_time`, `Towards` )
	VALUES (null, '$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin', '$trans_id', '$amount', '$Status','$Date','$towards')";
	  if ($conn->query($sql) === true) {
			echo "<script> alert('Record Inserted.'); </script>";
		} else {
			echo "<script> alert('Failed To Insert Record.'); </script>";
		}


$_SESSION['fname']=$payerFirstName;
$_SESSION['lname']=$payerLastName;
$_SESSION['mobile']=$payerContact;
$_SESSION['email']=$payerEmail;
$_SESSION['address']=$payerAddress;
$_SESSION['pan']=$PANNo;
$_SESSION['trans_id']=$trans_id;
$_SESSION['amount']=$amount;

$RouterUrl = "?mcode=".$mcode."&uname=".$uname."&psw=".$pws."&amount=".$amount."&mtxnId=".$mtxnId."&pfname=".$payerFirstName."&plname=" .$payerLastName."&pmno=".$payerContact."&pemail=".$payerEmail."&padd=".$payerAddress. "&surl=".$URLsuccess."&furl=".$URLfailure."&udf5=".trim($PANNo)."&udf7=".$towards."&udf8=".$city;
$RouterUrl = $EncryptDecrypt -> encrypt($RouterUrl,$privateValue,$privateKey);
$RouterUrl = str_replace("+", "%2B",$RouterUrl);
$RouterUrl="?query=".$RouterUrl."&mcode=".$mcode;
$RouterUrl = $RouterDomain.$RouterUrl;

//echo $RouterUrl;
header("Location: $RouterUrl");
?>