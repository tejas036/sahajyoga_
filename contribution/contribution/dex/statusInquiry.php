<!DOCTYPE html>
<html>
<head>
	<title></title>
	
    <!-- <meta http-equiv="refresh" content="30"> -->

</head>
<body>

<?php

include_once 'dbConnection.php';
$q2 = "select * from transactions where Status not in ('Success','Failed') ORDER BY RAND()  limit 10";
$rs2 = mysqli_query($conn,$q2);

while ($row2 = mysqli_fetch_row($rs2)) 
{

	$mid = "155"; //enter mid
  $mcode = "THE265";  //enter mcode
	
	//for QA 
	$txnId =  $row2[9];
	
	//for live
	//$txnId = $row2[9];

    
  $txnDate = $row2[12]; // enter date
   

	

$json_url = "https://dexpertsystems.com/TransactionStatusInquiry/InquiryServlet?mtxnId=".$txnId."&txnDate=".$txnDate."&mid=".$mid."&mcode=".$mcode."&routeMid=271091&pgFlag=Y";
$crl = curl_init();
curl_setopt($crl, CURLOPT_URL, $json_url);
curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE); 
$json = curl_exec($crl);
curl_close($crl);
$emp = json_decode($json, TRUE);
//print_r($emp);

$json1 = json_encode($emp)."\n";
//echo $json1;

$book = json_decode($json1);
$status11 = $book->status; 
$status1=ucfirst($status11);
echo $status1."<br>";

$respCode1 = $book->respCode; 
echo $respCode1."<br>";

$amount1 = $book->amount; 
echo $amount1."<br>";

$transId1 = $book->transId; 
echo $transId1."<br>";

$receiptNumber1 = $book->receiptNumber; 
echo $receiptNumber1."<br>";
echo $book->merchantTransId."<br>";
$merchantTransId1 = str_replace($mcode,"",$book->merchantTransId); //trim($book->merchantTransId,$mcode); 
echo $merchantTransId1."<br>";

if($respCode1 == '0000' || $respCode1 == '0300')
{

$query = "update transactions set Status='$status1' , Is_Sync_With_PG = 'Y', receiptNumber = '$receiptNumber1'
where Transaction_id='$merchantTransId1'";
echo $query."<br><br>";

if ($conn->query($query) === true) {
			echo "Record Update";
		} else {
			echo "Failed To Update Record.";
		}
}

}

?>

</body>
</html>