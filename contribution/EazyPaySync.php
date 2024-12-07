<?php
include_once 'dbConnection.php';
$q2 = "select * from transactions where Status not in ('Success','Failed') ORDER BY id DESC ";
$rs2 = mysqli_query($conn,$q2);
while ($row2 = mysqli_fetch_row($rs2)) 
{	
	 $txnId =  $mcode.$row2[9];
	 $Tdate =  $row2[12];
	//echo $Tdate.'<br/>' ;
	$json_url = "https://eazypay.icicibank.com/EazyPGVerify?ezpaytranid=&amount=&paymentmode=&merchantid=271091&trandate=&pgreferenceno=".$txnId;
	//$json_url = "https://sandbox.dexpertsystems.com/TransactionStatusInquiry/InquiryServlet?mtxnId=".$txnId."&txnDate=".$txnDate."&mid=".$mid."&mcode=".$mcode;
	$crl = curl_init();
	curl_setopt($crl, CURLOPT_URL, $json_url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE); 
	$json = curl_exec($crl);
	"output : ".$json;
	curl_close($crl);
	$array=explode("&",$json);
	if(count($array)!=0)
	{
		foreach($array as $value)
		{
			$data=explode("=",$value);
			$data[0]."=".$data[1] ;
			if("ezpaytranid" == $data[0]){
				$ezpaytranid = $data[1];
			}
			else if("BA" == $data[0]){
				$amount = $data[1];
			}
			else if("PaymentMode" == $data[0]){
				$PaymentMode = $data[1];
			}
			else if("pgreferenceno" == $data[0]){
				$pgreferenceno = $data[1];
			}
			else if("status" == $data[0]){
				$status = $data[1];
			}
		}
	}
	$date = date("Y-m-d");
	$datep = strtotime("-5 day");
	$datel = date('Y-m-d', $datep);
	
	if($status == 'RIP' || $status == 'Success' || $status == 'SIP')
	{
	$query = "update transactions set Status='Success', Is_Sync_With_PG = 'Y', 	Payment_mode = '$PaymentMode', Transaction_Number = '$ezpaytranid', Transaction_end_time = '$date'
	where Transaction_id='$pgreferenceno'";
	if ($conn->query($query) === true) {
				 echo "Success Record Update";
			} else {
				 echo "Success Record not Update";
			}
	}
	else if($status == 'failure' || $status == 'FAILED'  )
	{

	$query = "update transactions set Status='Failed', Is_Sync_With_PG = 'Y', 	Payment_mode = '$PaymentMode', Transaction_Number = '$ezpaytranid', Transaction_end_time = '$date'
	where Transaction_id='$pgreferenceno'";
	if ($conn->query($query) === true) {
				 echo "FAILED Record Update";
			} else {
				 echo "FAILED Record not Update";
			}
	}
	
	else if($status == 'NotInitiated' && $Tdate < $datel)
	{
// echo  $txnId;
	$query = "update transactions set Status='Failed', Is_Sync_With_PG = 'Y', 	Payment_mode = 'NA', Transaction_Number = 'NA', Transaction_end_time = '$Tdate'
	where Transaction_id='$txnId'";
	if ($conn->query($query) === true) {
			 echo "NotInitiated Record Update";
		} else {
			 echo "NotInitiated Record not Update";
		}
	}

}
?>