<?php

// session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting (E_ALL);
require_once('function.php');
include_once 'dbConnection.php';

// $id = $_SESSION["ReferenceNo"];
// $paymentMode = $_SESSION["Payment_Mode"];
// $Unique_Ref_Number = $_SESSION["Unique_Ref_Number"];

date_default_timezone_set("Asia/Kolkata");
$Date =  date("Y-m-d");
$time = date('h:i a');


//  $sql = "update event_registration set time='$time', Status='Success',Payment_mode = '" . $paymentMode . "',Transaction_end_time = '" . $Date . "', Transaction_Number = '" . $Unique_Ref_Number . "' where Transaction_id='" . $id . "'";

// if ($conn->query($sql) === true) {
//   //echo "<script> alert('Record Update.'); </script>";
// } else {
//   //echo "<script> alert('Failed To Update Record.'); </script>";
// }


// $sql1 = "SELECT * FROM event_registration where Transaction_id='" . $id . "'";
$sql1 = "select * from event_registration where Transaction_id='43420915'";
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
  }
} else {
  echo "0 results";
}


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

Dear <b> ' . $firstName . ' ' . $lastName . '</b>, <br><br>
<b>Jai Shree Mataji</b><br><br>

<div class="container-fluid col-md-8 card ">
<div class="contain bg-color" style="border: 1px solid #ffc10721; background-color: #ffc1070d; border-radius: 1rem 0;">
<div class="heading">
   <div class="row">
      <div class="col-md-12 print-margin" style="margin-top: ;margin-left: 10px;
  font-size: 17px;">
      <h6><b>Your payment for International Sahaja Yoga Seminar Nirmala Nagari – 2024, Ganapatipule is SUCCESSFUL as per below details</b></h6>
  
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
  <td> ' . $firstName . ' ' . $lastName . '</td>
  </tr>
  
  <tr>
  <th style="width: 290px; text-align:left;">Payer\'s Mobile </th>
  <td> ' . $contact . '</td>
  </tr>
  
  
  <tr>
  <th style="width: 290px; text-align:left;">Payer\'s Email</th>
  <td> ' . $email . '</td>
  </tr>
  
  <tr>
  <th style="width: 290px; text-align:left;">Amount (Rs)  </th>
  <td> ' . $amount . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Status  </th>
  <td> ' . $Status . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Number  </th>
  <td> ' . $bankTransId . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Transaction Date  </th>
  <td> ' . $tjDate . ' ' . $transactionTime . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Mode of Payment </th>
  <td>' . $payMode . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Adult Participant Count </th>
  <td>' . $count_adult . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Yuva Participant Count </th>
  <td>' . $count_yuva . '</td>
  </tr>
  <tr>
  <th style="text-align:left">Child Participant Count </th>
  <td>' . $count_child . '</td>
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
          href="https://www.sahajayogabharat.org/gpseminar/reprint-badges.php?trans_id=' . $Transaction_id . '"
          >Please Click Here To Download your Payment Receipt</a
        >
<br>
Thanks & Regards,<br>
International Sahaja Yoga Seminar Nirmala Nagari – 2024, Ganapatipule<br>
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
        of payment and payer\'s Name.
        
        <br> 3. Food charges are separately payable for December 21 and
		 December 26, 2024. Accommodation will be provided free for
		 these two days only based on availability. For stay and food
		 other than seminar dates, please submit details on the link
		 <a href="https://www.sahajayogamumbai.org/gpseminar/food_charges.php" style="color: rgb(2, 117, 216);"> Click Here </a> at the latest by December 15, 2024.
		
        </b>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>';

// mail($to, $subject, $body, $headers);
$curl = curl_init();

$to = $email;
$cc = "rahul@dexpertsystems.com";
$name = $firstName;
$subject = "[Success Payment Receipt for] International Sahaja Yoga Seminar Nirmal Nagari – 2024, Ganapatipule";


$postData = json_encode([
  "mail_template_key" => "2518b.638e51fdc353256d.k1.3a4874a1-770a-11ef-afbc-52540038fbba.1920db9b8df",
  "from" => [
    "address" => "noreply@sahajayogamumbai.org",
    "name" => "noreply"
  ],
  "to" => [
    [
      "email_address" => [
        "address" => $to,
        "name" => $name
      ]
    ]
  ],
  "cc" => [
    [
      "email_address" => [
        "address" => $cc,
        "name" => "SahajaYoga"
      ]
    ]
  ],
  // "bcc" => [
  //   "email_address" => [
  //     "address" => "seminar.payments@sahajayogamumbai.org",
  //     "name" => "Seminar1"
  //   ],
  //   "email_address" => [
  //     "address" => "seminar.registrations@outlook.com",
  //     "name" => "Seminar2"
  //   ],
  //   "email_address" => [
  //     "address" => "rahul@dexpertsystems.com",
  //     "name" => "DevRahul"
  //   ]
  // ],

  "merge_info" => [
    "transaction_date" => $transactionDate,
    "view_receipt_link" => 'https://www.sahajayogabharat.org/gpseminar/reprint-badges.php?trans_id=' . $Transaction_id,
    "transaction_status" => $Status,
    "amount" => $amount,
    "payment_mode" => $payMode,
    "child_count" => $count_child,
    "payers_mobile" =>  $contact,
    "product_name" => "International Sahaja Yoga Seminar 2024, Nirmala Nagari, Ganapatipule",
    "payers_name" => $firstName . ' ' . $lastName,
    "transaction_number" => $bankTransId,
    "payer_name" => $firstName . ' ' . $lastName,
    "payers_email" => $email,
    "adult_count" => $count_adult,
    "yuva_count" => $count_yuva
  ]


]);


//print_r($postData);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.zeptomail.in/v1.1/email/template",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postData,
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Zoho-enczapikey PHtE6r1YQLjjjWcr8RlWsPftEcStM9suq+lifVNEsYoUX/cGTU0ArI14wTG//00tA/NGF6SSmo5vubjItLiFI2vpZGtEXWqyqK3sx/VYSPOZsbq6x00ftFgcd0zdUYLpdtJo1ibVutjfNA==",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);


// Error handling
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<center>
  <div><button id="download-button" class="btn btn-info">Download Receipt</button></div>
</center>
<br>
<div id="invoice">
  <center>
    <h3 style="text-align: center;">The Life Eternal Trust, Mumbai</h3>
    <h2 style="text-align: center;">International Sahaja Yoga Seminar Nirmala Nagari, Ganapatipule</h2>
    <h3 style="text-align: center;">December 22-25, 2024</h3>
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
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
  integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>