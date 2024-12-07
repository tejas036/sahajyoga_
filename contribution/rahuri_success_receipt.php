<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);
require_once('function.php');


$id = $_SESSION["ReferenceNo"];
$paymentMode = $_SESSION["Payment_Mode"]; 
$Unique_Ref_Number = $_SESSION["Unique_Ref_Number"];

date_default_timezone_set("Asia/Kolkata");
$Date =  date("Y-m-d");
$time = date('h:i a');


$sql = "update event_registration_rahuri set time='$time', Status='Success',Payment_mode = '" . $paymentMode . "',Transaction_end_time = '" . $Date . "', Transaction_Number = '" . $Unique_Ref_Number . "' where Transaction_id='" . $id . "'";

if ($conn->query($sql) === true) {
    //echo "<script> alert('Record Update.'); </script>";
} else {
    //echo "<script> alert('Failed To Update Record.'); </script>";
}


$sql1 = "SELECT * FROM event_registration_rahuri where Transaction_id='" . $id . "'";
$result = $conn->query($sql1);

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
    $payment_for='';

  }
} else {
  echo "0 results";
}


$from = "noreply@thelifeeternaltrustmumbai.org";
$to = $email;
        
$bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';
$ccc = 'nirmaldhamrahuri@sahajayogamumbai.org';

$subject = "[Success Payment Receipt for] Shree Ekadash Rudra Puja - 2024"; 
//$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

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
$headers .= 'Reply-To: nirmaldhamrahuri@sahajayogamumbai.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

// no more headers after this, we start the body! // 
$cop = "";
foreach($coupon_number as $index=> $value) 
{ 
  $cop .= "<tr><td>".$participant_name[$index]."</td><td>".$coupon_number[$index]."</td></tr>";
}

$tdate=date_create($transactionDate,timezone_open("Asia/Kolkata"));
$tjDate =  date_format($tdate,"jS F Y");


$body .= 

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
      <h6><b>Your payment for Shree Ekadash Rudra Puja - 2024 Aradgaon (Rahuri), Ahmednagar' . $payment_for . ' is SUCCESSFUL as per below details</b></h6>
  
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
  <th style="text-align:left">Towards </th>
  <td>'.$towards.'</td>
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
          href="https://www.sahajayogabharat.org/nirmaldhamaradgaon/reprint-badges.php?trans_id='.$Transaction_id.'"
          >Please Click Here To Download your Payment Receipt</a
        >
<br>
Thanks & Regards,<br>
Shree Ekadash Rudra Puja, Aradgaon (Rahuri), Ahmednagar<br>
The Life Eternal Trust<br><br>
<b>Note:
        <br> 1. This is system generated mail. Please don\'t reply.
        <br> 2. Please bring valid ID (i.e. Aadhaar/PAN/Passport) card for verification.
        <br> 3. Please display this receipt for issuing Seminar/Puja Badges.
        <br> 4. Seminar Badges will be issued at Seminar Site/ Trust office.
        <br> 5. Only Puja Day Badges will be given at the seminar site only after February 03, 2024.
        <br> 6. For any registration queries, please write to seminar


        <a
          style="
            font-weight: bold;
            color: blue;
            word-wrap: break-word;
          "
          href="mailto:nirmaldhamrahuri@sahajayogamumbai.org"
          >nirmaldhamrahuri@sahajayogamumbai.org</a
        >
        
        with transaction Id, transaction number, transaction date, mode
        of payment and payer\'s Name.</b>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>';

mail($to, $subject, $body, $headers);

?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <center>
<div><button id="download-button" class="btn btn-info">Download Receipt</button></div>
 </center>
<br>
<div id="invoice">
    <center>
            
            <h6 style="text-align: center;">The Life Eternal Trust, Mumbai</h6>
            <h6 style="text-align: center;">Shree Ekadash Rudra Puja-2014</h2>
            <h6 style="text-align: center;">Nirmaldham Ashram, Aradgaon (Rahuri), Ahmednagar, Maharashtra</h6>
            <h6 style="text-align: center;">February 03 & 04, 2024</h6>
            <h4 style="text-align: center;">Payment Receipt</h4>
            
            
            
    <?php
    echo $body;
    ?>
    </center>
</div>

<script>
			const button = document.getElementById('download-button');

			function generatePDF() {
			    //alert('test');
				// Choose the element that your content will be rendered to.
				const element = document.getElementById('invoice');
				// Choose the element and save the PDF for your user.
				html2pdf().from(element).save();
			}

			button.addEventListener('click', generatePDF);
		</script>
		

  <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
      integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>