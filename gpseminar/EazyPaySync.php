<?php

include_once 'dbConnection.php';
$q2 = "select * from event_registration where Status not in ('Success','Failed') ORDER BY event_registration_id DESC Limit 10";
// $q2 = "select * from event_registration where event_registration_id  = '3300'";
$rs2 = mysqli_query($conn,$q2);
while ($row2 = mysqli_fetch_array($rs2)) {

	echo $txnId = $row2['Transaction_id'];
	echo '<br>';
	echo $Tdate = $row2['Transaction_start_time'];
	echo '<br>';

	//echo $Tdate.'<br/>' ;
	$json_url = "https://eazypay.icicibank.com/EazyPGVerify?ezpaytranid=&amount=&paymentmode=&merchantid=330587&trandate=&pgreferenceno=" . $txnId;
	//$json_url = "https://sandbox.dexpertsystems.com/TransactionStatusInquiry/InquiryServlet?mtxnId=".$txnId."&txnDate=".$txnDate."&mid=".$mid."&mcode=".$mcode;
	$crl = curl_init();
	curl_setopt($crl, CURLOPT_URL, $json_url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$json = curl_exec($crl);
	"output : " . $json;
	curl_close($crl);
	$array = explode("&", $json);
	if (count($array) != 0) {
		foreach ($array as $value) {
			$data = explode("=", $value);
			$data[0] . "=" . $data[1];
			if ("ezpaytranid" == $data[0]) {
				echo 'ezpaytranid : ';
				echo $ezpaytranid = $data[1];
				echo '<br>';
			} else if ("BA" == $data[0]) {
				echo 'amount : ';
				echo $amount = $data[1];
				echo '<br>';
			} else if ("PaymentMode" == $data[0]) {
				echo 'PaymentMode : ';
				echo $PaymentMode = $data[1];
				echo '<br>';
			} else if ("pgreferenceno" == $data[0]) {
				echo 'pgreferenceno : ';
				echo $pgreferenceno = $data[1];
				echo '<br>';
			} else if ("status" == $data[0]) {
				echo 'status :';
				echo $status = $data[1];
				echo '<br>';
			}
		}

	}
	$date = date("Y-m-d");
	$datep = strtotime("-5 day");
	$datel = date('Y-m-d', $datep);

	if ($status == 'RIP' || $status == 'Success' || $status == 'SIP') {



	$query = "update event_registration set Status='Success', Is_Sync_With_PG = 'Y', Payment_mode = '$PaymentMode', Transaction_Number = '$ezpaytranid', Transaction_end_time = '$date'
	where Transaction_id='$pgreferenceno'";
		if ($conn->query($query) === true) {

			$id = $pgreferenceno;
			$paymentMode = $PaymentMode;
			$Unique_Ref_Number = $ezpaytranid;

			$coupon_number = array();
			$participant_name = array();

			include_once 'dbConnection.php';
			$backToForm = 'https://www.sahajayogabharat.org/gpseminar/index.php';
			//echo $id;
			$Date = date("Y-m-d");
			date_default_timezone_set("Asia/Kolkata");
			$time = date('h:i a');



			$sql = "SELECT * FROM event_registration where Transaction_id='" . $pgreferenceno . "'";
			$result = $conn->query($sql);

			// print_r($result);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$trans_id = $row["Transaction_id"];
					$amount = $row["Amount"];
					$firstName = $row["Fname"];
					$lastName = $row["Lname"];
					$contact = $row["Mobile"];
					$email = $row["Email"];
					$pan = $row["PAN"];
					$towards = $row["Towards"];
					$address = $row["Address"];
					$receiptNumber = $row["receiptNumber"];
					$bankTransId = $row["Transaction_Number"];
					$Transaction_id = $row["Transaction_id"];
					$payMode = $row["Payment_mode"];
					$transactionDate = $row["Transaction_start_time"];
					$transactionEndDate = $row["Transaction_end_time"];
					$transactionTime = $row["time"];
					$Status = $row["Status"];
					$count_adult = $row["count_adult"];
					$count_yuva = $row["count_yuva"];
					$count_child = $row["count_child"];
					$pass = $row["Passport"];
					$eventRegId = $row["event_registration_id"];
				
					//$receiptNumber = 123;
					$country = $row["Country"];

					$payment_for ='';
				}


		// Email Code id here
		$from = "noreply@thelifeeternaltrustmumbai.org";
		$to = $email;
	

		$bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';
		$ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';

		$subject = "[Success Payment Receipt for] International Sahaja Yoga Seminar – 2023, Ganapatipule"; 
		// a random hash will be necessary to send mixed content
		$separator = md5(time());

		// carriage return type (we use a PHP end of line constant)
		$eol = PHP_EOL;


		$headers  = 'From: '.$from.$eol;
		$headers .= 'Cc: '.$ccc.$eol;
		// $headers .= 'Cc: '.$cc1.$eol;
		$headers .= 'Bcc: '.$bcc.$eol;  
		$headers .= "MIME-Version: 1.0".$eol; 
		$headers .= "Content-type:text/html;charset=UTF-8".$eol; 
		$headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		// no more headers after this, we start the body! // 
		$cop = "";
		foreach ($coupon_number as $index => $value) {
			$cop .= "<tr><td>" . $participant_name[$index] . "</td><td>" . $coupon_number[$index] . "</td></tr>";
		}

		$tdate = date_create($transactionDate, timezone_open("Asia/Kolkata"));
		$tjDate = date_format($tdate, "jS F Y");
		

		$body = 

'<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>

<style>
.heading{
margin-top: 0px;
margin-left: 0px;
background: #72448d;
color: white;
padding: 15px;
border-radius: 1rem 0;
}
table, th, td {
border: 1px solid black;
border-radius: 5px;
background-color:#fff8dc4a;
}
td,th{
padding:5px;
}
table {
width:600px;
}
.table-bg-color {
background-color:#fff8dc4a;
}
</style>
</head>
<body style="background-color:whitesmoke; width=700px">

Dear <b> '.$firstName.' '.$lastName.'</b>, <br><br>
<b>Jai Shree Mataji</b><br><br>

<div class="container-fluid col-md-8 card ">
<div class="contain bg-color" style="border: 1px solid #ffc10721; background-color: #ffc1070d; border-radius: 1rem 0;">
<div class="heading">
   <div class="row">
      <div class="col-md-12 print-margin" style="margin-top: ;margin-left: 10px;
  font-size: 17px;">
      <h6><b>Your payment for International Sahaja Yoga Seminar – 2023, Ganapatipule is SUCCESSFUL as per below details</b></h6>
  
      </div>
</div>
</div>


<center>
<div class="table-responsive">
<table class="table table-bordered table-bg-color" style="width:600px;">
 <thead>
  <th colspan="2" style="text-align: center;">Payer\'s Details </th>
 </thead>
  <tbody>

  <tr>
  <th style="text-align:left; width: 290px;">Payer\'s Name  </th>
  <td> '.$firstName.' '.$lastName.'</td>
  </tr>
  
  <tr>
  <th style="width: 290px; text-align:left;">Payer\'s Mobile </th>
  <td> '.$contact.'</td>
  </tr>
  
  
  <tr>
  <th style="width: 290px; text-align:left;">Payer\'s Email</th>
  <td> '.$email.'</td>
  </tr>
  
  <tr>
  <th style="width: 290px; text-align:left;">Amount (Rs)  </th>
  <td> '.$amount.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Status  </th>
  <td> '.$Status .'</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Number  </th>
  <td> '.$bankTransId.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Date  </th>
  <td> '.$tjDate.' '.$transactionTime.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Mode of Payment </th>
  <td>'.$payMode.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Adult Participant Count </th>
  <td>'.$count_adult.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Yuva Participant Count </th>
  <td>'.$count_yuva.'</td>
  </tr>
  <tr>
  <th style="text-align:left">Child Participant Count </th>
  <td>'.$count_child.'</td>
  </tr>
  </tbody>
</table>
</div>

</center>
</div>
<br>

</p>
<a
          style="
            font-weight: bold;
            color: blue;
            word-wrap: break-word;
          "
          href="https://www.sahajayogabharat.org/gpseminar/reprint-badges.php?trans_id='.$Transaction_id.'"
          >Please Click Here To Download your Payment Receipt</a
        >
<br>
Thanks & Regards,<br>
International Sahaja Yoga Seminar – 2023, Ganapatipule<br>
The Life Eternal Trust<br><br>
<b>Note:
        <br> 1. This is system generated mail. Please don\'t reply.
        <br> 2. For any registration queries, please write to seminar

        <a
          style="
            font-weight: bold;
            color: blue;
            word-wrap: break-word;
          "
          href="mailto:seminar.payments@thelifeeternaltrustmumbai.org"
          >seminar.payments@thelifeeternaltrustmumbai.org</a
        >
        
        with transaction Id, transaction number, transaction date, mode
        of payment and payer\'s Name.</b>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>';

		// Your payment for international Sahaja Yoga Seminar - 2022 $payment_for is successful and below are the registration details<br><br>

		// <br>3. Please do not reply to this email, since has been sent from an unattended email.

		mail($to, $subject, $body, $headers);

		echo '<br>';
			} else {
				echo "Success Record not Update";

			}
		} else if ($status == 'failure' || $status == 'FAILED') {

			$query = "update event_registration set Status='Failed', Is_Sync_With_PG = 'Y',  Payment_mode = '$PaymentMode', Transaction_Number = '$ezpaytranid', Transaction_end_time = '$date'
	where Transaction_id='$pgreferenceno'";
			if ($conn->query($query) === true) {
				echo "FAILED Record Update";
				echo '<br>';
			} else {
				echo "FAILED Record not Update";
				echo '<br>';
			}
		} else if ($status == 'NotInitiated' && $Tdate < $datel) {
			// echo  $txnId;
			$query = "update event_registration set Status='Failed', Is_Sync_With_PG = 'Y', Payment_mode = 'NA', Transaction_Number = 'NA', Transaction_end_time = '$Tdate'
	where Transaction_id='$txnId'";
			if ($conn->query($query) === true) {
				echo "NotInitiated Record Update";
				echo '<br>';
			} else {
				echo "NotInitiated Record not Update";
				echo '<br>';
			}
		}

	}
}
?>