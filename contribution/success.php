<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;

include 'file.php';
//require 'PHPMailer/src/PHPMailer.php';
//echo "sagar  ".$_SESSION["ReferenceNoDB"];
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// die('sahajayoga');

function payment_success_exec()
{

  if (isset($_POST) && isset($_POST['Total_Amount']) && $_POST['Response_Code'] == 'E000') {
    $res = $_POST;
    $res['ReferenceNo'];
    // Same encryption key that we gave for generating the URL
    $aes_key_for_payment_success = "2705550610901002";

    $data = array(
      'Response_Code' => $res['Response_Code'],
      'Unique_Ref_Number' => $res['Unique_Ref_Number'],
      'Service_Tax_Amount' => $res['Service_Tax_Amount'],
      'Processing_Fee_Amount' => $res['Processing_Fee_Amount'],
      'Total_Amount' => $res['Total_Amount'],
      'Transaction_Amount' => $res['Transaction_Amount'],
      'Transaction_Date' => $res['Transaction_Date'],
      'Interchange_Value' => $res['Interchange_Value'],
      'TDR' => $res['TDR'],
      'Payment_Mode' => $res['Payment_Mode'],
      'SubMerchantId' => $res['SubMerchantId'],
      'ReferenceNo' => $res['ReferenceNo'],
      'ID' => $res['ID'],
      'RS' => $res['RS'],
      'TPS' => $res['TPS'],
    );
    // echo json_encode($data );
    $verification_key = $data['ID'] . '|' . $data['Response_Code'] . '|' . $data['Unique_Ref_Number'] . '|' .
      $data['Service_Tax_Amount'] . '|' . $data['Processing_Fee_Amount'] . '|' . $data['Total_Amount'] . '|' .
      $data['Transaction_Amount'] . '|' . $data['Transaction_Date'] . '|' . $data['Interchange_Value'] . '|' .
      $data['TDR'] . '|' . $data['Payment_Mode'] . '|' . $data['SubMerchantId'] . '|' . $data['ReferenceNo'] . '|' .
      $data['TPS'] . '|' . $aes_key_for_payment_success;

    //echo $verification_key;

    $encrypted_message = hash('sha512', $verification_key);

    if ($encrypted_message == $data['RS']) {
      // echo ".........in if.........";
      // echo "<script> alert(' return true. '.$encrypted_message); </script>";
      return true;
    } else {
      // echo ".........in else wala middle.........";
      // echo "<script> alert(' return false. '.$encrypted_message); </script>";
      return false;
    }
  } else {
    // echo ".........in else end.........";
    // echo "<script> alert('return false.'); </script>";


    return false;
  }
}
?>

<?php
function response_code($code)
{
  $rc = array(
    'E000' => '"Payment Successful.',
    'E001' => 'Unauthorized Payment Mode',
    'E002' => 'Unauthorized Key',
    'E003' => 'Unauthorized Packet',
    'E004' => 'Unauthorized Merchant',
    'E005' => 'Unauthorized Return URL',
    'E006' => '"Transaction Already Paid, Received Confirmation from the Bank, Yet to Settle the transaction with the Bank',
    'E007' => 'Transaction Failed',
    'E008' => 'Failure from Third Party due to Technical Error',
    'E009' => 'Bill Already Expired',
    'E0031' => 'Mandatory fields coming from merchant are empty',
    'E0032' => 'Mandatory fields coming from database are empty',
    'E0033' => 'Payment mode coming from merchant is empty',
    'E0034' => 'PG Reference number coming from merchant is empty',
    'E0035' => 'Sub merchant id coming from merchant is empty',
    'E0036' => 'Transaction amount coming from merchant is empty',
    'E0037' => 'Payment mode coming from merchant is other than 0 to 9',
    'E0038' => 'Transaction amount coming from merchant is more than 9 digit length',
    'E0039' => 'Mandatory value Email in wrong format',
    'E00310' => 'Mandatory value mobile number in wrong format',
    'E00311' => 'Mandatory value amount in wrong format',
    'E00312' => 'Mandatory value Pan card in wrong format',
    'E00313' => 'Mandatory value Date in wrong format',
    'E00314' => 'Mandatory value String in wrong format',
    'E00315' => 'Optional value Email in wrong format',
    'E00316' => 'Optional value mobile number in wrong format',
    'E00317' => 'Optional value amount in wrong format',
    'E00318' => 'Optional value pan card number in wrong format',
    'E00319' => 'Optional value date in wrong format',
    'E00320' => 'Optional value string in wrong format',
    'E00321' => 'Request packet mandatory columns is not equal to mandatory columns set in enrolment or optional columns are not equal to optional columns length set in enrolment',
    'E00322' => 'Reference Number Blank',
    'E00323' => 'Mandatory Columns are Blank',
    'E00324' => 'Merchant Reference Number and Mandatory Columns are Blank',
    'E00325' => 'Merchant Reference Number Duplicate',
    'E00326' => 'Sub merchant id coming from merchant is non numeric',
    'E00327' => 'Cash Challan Generated',
    'E00328' => 'Cheque Challan Generated',
    'E00329' => 'NEFT Challan Generated',
    'E00330' => 'Transaction Amount and Mandatory Transaction Amount mismatch in Request URL',
    'E00331' => 'UPI Transaction Initiated Please Accept or Reject the Transaction',
    'E00332' => 'Challan Already Generated, Please re-initiate with unique reference number',
    'E00333' => 'Referer value is null / invalid Referer',
    'E00334' => 'Value of Mandatory parameter Reference No and Request Reference No are not matched',
    'E00335' => 'Payment has been cancelled',
    'E0801' => 'FAIL',
    'E0802' => 'User Dropped',
    'E0803' => 'Canceled by user',
    'E0804' => 'User Request arrived but card brand not supported',
    'E0805' => 'Checkout page rendered Card function not supported',
    'E0806' => 'Forwarded / Exceeds withdrawal amount limit',
    'E0807' => 'PG Fwd Fail / Issuer Authentication Server failure',
    'E0808' => 'Session expiry / Failed Initiate Check, Card BIN not present',
    'E0809' => 'Reversed / Expired Card',
    'E0810' => 'Unable to Authorize',
    'E0811' => 'Invalid Response Code or Guide received from Issuer',
    'E0812' => 'Do not honor',
    'E0813' => 'Invalid transaction',
    'E0814' => 'Not Matched with the entered amount',
    'E0815' => 'Not sufficient funds',
    'E0816' => 'No Match with the card number',
    'E0817' => 'General Error',
    'E0818' => 'Suspected fraud',
    'E0819' => 'User Inactive',
    'E0820' => 'ECI 1 and ECI6 Error for Debit Cards and Credit Cards',
    'E0821' => 'ECI 7 for Debit Cards and Credit Cards',
    'E0822' => 'System error. Could not process transaction',
    'E0823' => 'Invalid 3D Secure values',
    'E0824' => 'Bad Track Data',
    'E0825' => 'Transaction not permitted to cardholder',
    'E0826' => 'Rupay timeout from issuing bank',
    'E0827' => 'OCEAN for Debit Cards and Credit Cards',
    'E0828' => 'E-commerce decline',
    'E0829' => 'This transaction is already in process or already processed',
    'E0830' => 'Issuer or switch is inoperative',
    'E0831' => 'Exceeds withdrawal frequency limit',
    'E0832' => 'Restricted card',
    'E0833' => 'Lost card',
    'E0834' => 'Communication Error with NPCI',
    'E0835' => 'The order already exists in the database',
    'E0836' => 'General Error Rejected by NPCI',
    'E0837' => 'Invalid credit card number',
    'E0838' => 'Invalid amount',
    'E0839' => 'Duplicate Data Posted',
    'E0840' => 'Format error',
    'E0841' => 'SYSTEM ERROR',
    'E0842' => 'Invalid expiration date',
    'E0843' => 'Session expired for this transaction',
    'E0844' => 'FRAUD - Purchase limit exceeded',
    'E0845' => 'Verification decline',
    'E0846' => 'Compliance error code for issuer',
    'E0847' => 'Caught ERROR of type:[ System.Xml.XmlException ] . strXML is not a valid XML string',
    'E0848' => 'Incorrect personal identification number',
    'E0849' => 'Stolen card',
    'E0850' => 'Transaction timed out, please retry',
    'E0851' => 'Failed in Authorize - PE',
    'E0852' => 'Cardholder did not return from Rupay',
    'E0853' => 'Missing Mandatory Field(s)The field card_number has exceeded the maximum length of',
    'E0854' => 'Exception in CheckEnrollmentStatus: Data at the root level is invalid. Line 1, position 1.',
    'E0855' => 'CAF status = 0 or 9',
    'E0856' => '412',
    'E0857' => 'Allowable number of PIN tries exceeded',
    'E0858' => 'No such issuer',
    'E0859' => 'Invalid Data Posted',
    'E0860' => 'PREVIOUSLY AUTHORIZED',
    'E0861' => 'Cardholder did not return from ACS',
    'E0862' => 'Duplicate transmission',
    'E0863' => 'Wrong transaction state',
    'E0864' => 'Card acceptor contact acquirer'
  );
  return $rc[$code];
}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
<body>
  <?php

    // Sagar : Here i'm checking wheather it's Contribution or Event Registration
    include_once 'dbConnection.php';
    $paymentType = "";


    $sql1 = "SELECT * FROM transactions where Transaction_id='" . $_POST['ReferenceNo'] . "'";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
      $paymentType = "CONTRIBUTION";
    }

    $sql_event_food = "SELECT * FROM event_food where transaction_id='" . $_POST['ReferenceNo'] . "'";
    $result_event_food = $conn->query($sql_event_food);
    if ($result_event_food->num_rows > 0) {
      $paymentType = "event_food";
    }

    // if ($paymentType == "") {
    //   $sql1 = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
    //   $result = $conn->query($sql1);

    //   if ($result->num_rows > 0) {
    //     $paymentType = "EVENT_REGISTRATION";
    //   }
    // }

    
   $sqlrahuri = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
    $resultrahuri = $conn->query($sqlrahuri);

    if ($resultrahuri->num_rows > 0) {
      $paymentType = "EVENT_GPSEMINAR";
    }
    
    
    
     $sqlrahurinew = "SELECT * FROM event_registration_rahuri where Transaction_id='" . $_POST['ReferenceNo'] . "'";
    $resultrahurinew = $conn->query($sqlrahurinew);

    if ($resultrahurinew->num_rows > 0) {
      $paymentType = "EVENT_RAHURI";
    }


    // echo    $paymentType;
    
    // if(payment_success_exec()){
    
    if ($paymentType == "CONTRIBUTION") {
      if ($_POST['Response_Code'] == 'E000') {
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];
        include "thank-you.php"; // Insert any content into the file you wish to display to the user when the payment is successful 
    
      } else {

        $sql = "update transactions set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
    Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
      where Transaction_id='" . $_POST['ReferenceNo'] . "' ";

        if ($conn->query($sql) === true) {
          //echo "<script> alert('Record Update.'); </script>";
        } else {
          //echo "<script> alert('Failed To Update Record.'); </script>";
        }

        $sql1 = "SELECT * FROM transactions where Transaction_id='" . $_POST['ReferenceNo'] . "'";
        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $Who_im = $row["Who_im"];

            $towards = $row["Towards"];
            $email = $row["Email"];
            $amount = $row["Amount"];
          }
        } else {
          echo "0 results";
        }
        if ($Who_im == 'Contribution') {
          $backToForm = "http://sahajayogabharat.org/contribution/contribute.php";
        } else {
          $backToForm = "http://sahajayogabharat.org/contribution/index.html";
        }

        if ($towards == "International Sahaja Yoga Research & Health Centre, CBD Belapur") {
          $bcc = "accounts@sahajahealthcentre.com";
        }
        if ($towards == "Shri P.K. Salve Kala Pratishthan, Vaitarna") {
          $bcc = "accounts@pksacademy.com";
        }
        if ($towards == "Nirmal Nagari, Ganapatipule") {
          $bcc = "nirmalnagrigp@sahajayogamumbai.org";
        }
        if ($towards == "Kothrud, Pune Ashram") {
          $bcc = "kothrudashram@sahajayogamumbai.org";
        }
        if ($towards == "Aradgaon, Rahuri Ashram") {
          $bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
        }

        if ($towards == "Guru Puja General Donation") {
          $bcc = "donations@sahajayogamumbai.org";
        }

        if ($towards == "The Life Eternal Trust Corpus Fund" || $towards == "The Life Eternal Trust General Donation" || $towards == "Sahaja Yoga Centre Mumbai Corpus Fund" || $towards == "Sahaja Yoga Centre Mumbai General Donation") {
          $bcc = "accounts.ho@sahajayogamumbai.org";
        }

        if ($towards == "International Sahaja Yoga Research and Health Centre Corpus Fund" || $towards == "International Sahaja Yoga Research and Health Centre General Donation") {
          $bcc = "accounts@sahajahealthcentre.com";
        }

        if ($towards == "Kothrud Pune Ashram Corpus Fund" || $towards == "Kothrud Pune Ashram General Donation") {
          $bcc = "kothrudashram@sahajayogamumbai.org";
        }

        if ($towards == "Vaitarna Academy General Donation") {
          $bcc = "accounts@sahajahealthcentre.com";
        }

        if ($towards == "Nirmal Nagari Ganapatipule Corpus Fund" || $towards == "Nirmal Nagari Ganapatipule General Donation") {
          $bcc = "nirmalnagrigp@sahajayogamumbai.org";
        }

        if ($towards == "Aradgaon Rahuri Ashram Corpus Fund" || $towards == "Aradgaon Rahuri Ashram General Donation") {
          $bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
        }

        $to = $email;
        $from = "noreply@sahajayogamumbai.org";
        $subject = "Contribution Payment Receipts";
        $separator = md5(time());
        $eol = PHP_EOL;
        $ccc = "donations@sahajayogamumbai.org";

        $headers = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $bcc . $eol;
        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"";

        $body = "--" . $separator . $eol;
        $body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;
        $body .= "Thank you for your attempt to donate." . $eol;
        $body .= "We regret to inform you that your payment for Amount $amount has not been successful." . $eol;
        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;

        //mail($to, $subject, $body, $headers);
    
        $response = response_code($_POST['Response_Code']);
        //echo $response;
        echo "<div style='text-align:center; width: 100%;font-size:20px;'>
                <p>Sorry for the inconvenience caused.</p>";
        echo "<p>Your bank has returned the following error message: <b>" . $response . "</b></p><p>Transaction failed due to some reason. Please check with your bank if amount has been deducted.</p> ";
        echo "<p> Click <a href=" . $backToForm . ">here</a> to return to the home page</p>";
        echo "<p> If money was debited from your account,</p>";
        echo "<p> please reach out to donations@sahajayogamumbai.org or download  <a href='https://www.sahajayogamumbai.org/contribution/print.php'>here</a> after two working days.</p>";
        echo "<p>If you don’t get auto system generated contribution receipt due to technical issue then receipt will be email to you within 7 days or please go to‘Donor Login’  after 7 days to download all historical receipts</p>  </div>";
      }

    } else if ($paymentType == 'event_food') {

      if ($_POST['Response_Code'] == 'E000') {
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];
        include "event_food_receipt.php";
        // Insert any content into the file you wish to display to the user when the payment is successful 
    

      } else {

        // UPDATE `event_food` SET `id`=[value-1],`fname`=[value-2],`lname`=[value-3],`mobile`=[value-4],`email`=[value-5],`address`=[value-6],`pan`=[value-7],`aadhar`=[value-8],`pin`=[value-9],`part_name`=[value-10],`part_gender`=[value-11],`part_city`=[value-12],`transaction_id`=[value-13],`amount`=[value-14],`status`=[value-15],`transaction_start_time`=[value-16],`transaction_end_time`=[value-17],`receiptNumber`=[value-18],`payment_mode`=[value-19],`transaction_Number`=[value-20],`towards`=[value-21],`is_sync_with_pg`=[value-22],`country`=[value-23],`passport`=[value-24],`who_im`=[value-25],`fromdate`=[value-26],`todate`=[value-27],`breakfast`=[value-28],`lunch`=[value-29],`dinner`=[value-30],`fullday_meal`=[value-31],`stay`=[value-32],`time`=[value-33] WHERE 1


        $sql_food_update = "update event_food set status='Failed', payment_mode= '" . $_POST['Payment_Mode'] . "', transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        transaction_end_time = '" . $_POST['Transaction_Date'] . "'
        where transaction_id='" . $_POST['ReferenceNo'] . "' ";

        if ($conn->query($sql_food_update) === true) {
        //   echo "<script> alert('Food Record Update.'); </script>";
        } else {
        //   echo "<script> alert('Failed To Update Food Record.'); </script>";
        }

        $sql_food_select = "SELECT * FROM event_food where transaction_id='" . $_POST['ReferenceNo'] . "'";
        $result_sql_food = $conn->query($sql_food_select);

        if ($result_sql_food->num_rows > 0) {
          while ($row_food = $result_sql_food->fetch_assoc()) {
// `id`,`fname`,`lname`,`mobile`,`email`,`address`,
// `pan`,`aadhar`,`pin`,`part_name`,`part_gender`,`part_city`,`transaction_id`,
// `amount`,`status`,`transaction_start_time`,`transaction_end_time`,`receiptNumber`,`payment_mode`,
// `transaction_Number`,`towards`,`is_sync_with_pg`,`country`,`passport`,`who_im`,`fromdate`,
// `todate',`breakfast`,`lunch`,`dinner`,`fullday_meal`,`stay`,`time`

            $trans_id = $row_food["transaction_id"];
             $trans_id;
             $amount = $row_food["amount"];
            
             $firstName = $row_food["fname"];
           
             $lastName = $row_food["lname"];
        
             $contact = $row_food["mobile"];
           
             $email = $row_food["email"];
           
             $pan = $row_food["pan"];
         
             $towards = $row_food["towards"];
        

             $receiptNumber = $row_food["receiptNumber"];
          
             $bankTransId = $row_food["transaction_Number"];
       
             $payMode = $row_food["payment_mode"];
          
             $transactionDate = $row_food["transaction_start_time"];
         
             $transactionEndDate = $row_food["transaction_end_time"];
            
             $transactionTime = $row_food["time"];
            

            $Id = $row_food["id"];



          }
        } else {
          echo "0 results";
        }


        $from = "noreply@thelifeeternaltrustmumbai.org";
        $to = $email;
        //   $to = 'workpreeti6@gmail.com'; 
    
        $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com';

        $ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';



        $subject = "[Failed Payment for Food & Stay] International Sahaja Yoga Seminar - 2022 Ganpatipule";
        //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";
    
        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;


        $headers = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $eol;

        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        // no more headers after this, we start the body! // 
    

        $tdate = date_create($transactionDate, timezone_open("Asia/Kolkata"));
        $tjDate = date_format($tdate, "jS F Y");


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

  <div class="container-fluid col-md-8 card " style="height:1000px">
    <div class="contain bg-color" style="border: 1px solid #ffc10721;
    background-color: #ffc1070d;
    border-radius: 1rem 0;">
  <div class="heading">
    <div class="row">
        <div class="col-md-12 print-margin" style="margin-top: -70px;
margin-left: 10px;
        font-size: 17px;">
            <h6>
            <b>Your payment for International Sahaja Yoga Seminar - 2022, Ganpatipule for Food & Stay is UNSUCCESSFUL.  Please try again.</b>
            </h6>
        
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
        <th style="text-align:left">Transaction ID  </th>
        
        
        <td> ' . $trans_id . '</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Number  </th>
        <td> ' . $bankTransId . '</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Date  </th>
        <td> ' . $tjDate . ' ' . $transactionTime . '</td>
        </tr>

        </tbody>
    </table>
    </div>
    <br>

        <br><br>
        </center>
       </div>
        <br>
     
        </p><br><br>
     Thanks & Regards,<br>
     Seminar Organising Team<br>
     The Life Eternal Trust, Mumbai<br><br>
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

      mail($to, $subject, $body, $headers);



        //Food charges fail code
        $backToEventFood = 'https://www.sahajayogabharat.org/gpseminar/food_charges.php';
        $response = response_code($_POST['Response_Code']);
        //echo $response;
        echo "<div style='text-align:center; width: 100%;font-size:20px;'>
            <p>Sorry for the inconvenience caused.</p>";
        echo "<p>Your bank has returned the following error message: <b>" . $response . "</b></p><p>Transaction failed due to some reason. Please check with your bank if amount has been deducted.</p> ";
        echo "<p> Click <a href=" . $backToEventFood . ">here</a> to return to the home page</p>";
        echo "<p> If you have any queries regarding payments please write to <a
                  style='
                    font-weight: bold;
                    color: blue;
                    word-wrap: break-word;
                  '
                  href='mailto:seminar.payments@thelifeeternaltrustmumbai.org'
                  >seminar.payments@thelifeeternaltrustmumbai.org</a
                > .</p>";

      }



    } 
    
    else if ($paymentType == 'EVENT_GPSEMINAR') 
    {

      if ($_POST['Response_Code'] == 'E000') 
      {
        // echo "<script>alert('" . $_POST['Response_Code'] ."')</script>";
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];
        $_SESSION["Transaction_Date"] =  $_POST['Transaction_Date'];
        include "success_receipt.php";

      }
      else if ($_POST['Response_Code'] == 'E00335' || $_POST['Response_Code'] == 'E0803' ) 
      {
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
          where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


          if ($conn->query($sql) === true) {
          //echo "<script> alert('Record Update.'); </script>";
          } else {
          //echo "<script> alert('Failed To Update Record.'); </script>";
          }

          ?>

            <style>

            .btn{
                font-size: 12px;
            }

            </style>
            <div class="row" style="margin:40px 10px;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center">
                        <img src="cancel_cp.png" style="width:70px;">
                    </div>
                    <div>
                        <p style="font-size: 25px; text-align: center; padding: 20px 0px 0px 0px;">
                            You have cancelled this transaction!
                        </p>
                    
                    </div>

                    <div style="text-align: center; padding: 10px 0px;">
                        <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="https://www.sahajayogabharat.org/gpseminar/" class="btn btn-sm btn-outline-dark">Back to Event Form</a>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

        <?php
      }
      else if ($_POST['Response_Code'] == 'E008' || $_POST['Response_Code'] == 'E0036' || $_POST['Response_Code'] == 'E00331' || $_POST['Response_Code'] == 'E00333' || $_POST['Response_Code'] == 'E0841' || $_POST['Response_Code'] == 'E0842' || $_POST['Response_Code'] == 'E0843' || $_POST['Response_Code'] == 'E0848' || $_POST['Response_Code'] == 'E0850' || $_POST['Response_Code'] == 'E0851' || $_POST['Response_Code'] == 'E0852' || $_POST['Response_Code'] == 'E0853') 
      {        
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
        where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


        if ($conn->query($sql) === true) {
        //echo "<script> alert('Record Update.'); </script>";
        } else {
        //echo "<script> alert('Failed To Update Record.'); </script>";
        }
        ?>
          <style>
            .btn{
                font-size: 12px;
            }
          </style>
          <div class="row" style="margin:40px 10px;">
              <div class="text-center">
                  <img src="caution.png" style="width:70px;">
              </div>

              <p style="font-size: 25px; text-align: center; padding: 10px 0px 0px 0px;">
                  Sorry we could not validate your payment.<br>
                  Please try again.
              </p>

              <div style="text-align: center; padding: 10px 0px;">
                  <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-success">Back to Event Form</a>
              </div>
          </div>
        <?php
      }
      else
      {
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
        where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


        if ($conn->query($sql) === true) {
        //echo "<script> alert('Record Update.'); </script>";
        } else {
        //echo "<script> alert('Failed To Update Record.'); </script>";
        }

        ?>

       <?php
        $sql1 = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
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
            $payMode = $row["Payment_mode"];
            $transactionDate = $row["Transaction_start_time"];
            $transactionEndDate = $row["Transaction_end_time"];
            $transactionTime = $row["time"];
            $Status = "Failed";

            $pass = $row["Passport"];
            $eventRegId = $row["event_registration_id"];

            //$receiptNumber = 123;
            $country = $row["Country"];

          }
        } else {
          echo "0 results";
        }


        $from = "noreply@thelifeeternaltrustmumbai.org";
        $to = $email;
        //   $to = 'workpreeti6@gmail.com'; 
    
        $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';

        $ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';

        $subject = "[Failed Payment Receipt for] International Sahaja Yoga Seminar Nirmal Nagari – 2023, Ganapatipule";
        //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";
    
        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;

        $headers = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $eol;

        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        // no more headers after this, we start the body! // 
        $cop = "";
        foreach ($coupon_number as $index => $value) {
          $cop .= "<tr><td>" . $participant_name[$index] . "</td><td>" . $coupon_number[$index] . "</td></tr>";
        }

        $tdate = date_create($transactionDate, timezone_open("Asia/Kolkata"));
        $tjDate = date_format($tdate, "jS F Y");


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

            <div class="container-fluid col-md-8 card " style="height:1000px">
              <div class="contain bg-color" style="border: 1px solid #ffc10721;
              background-color: #ffc1070d;
              border-radius: 1rem 0;">
            <div class="heading">
              <div class="row">
                  <div class="col-md-12 print-margin" style="margin-top: -70px;
          margin-left: 10px;
                  font-size: 17px;">
                      <h6>
                      <b>Your transaction was unsuccessful.</b>
                      </h6>
                  
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
                  <td> '.$Status .'</td>
                  </tr>
                  <tr>
                  <th style="text-align:left">Transaction ID  </th>
                  <td> ' . $trans_id . '</td>
                  </tr>
                  <tr>
                  <th style="text-align:left">Transaction Number  </th>
                  <td> ' . $bankTransId . '</td>
                  </tr>
                  <tr>
                  <th style="text-align:left">Transaction Date  </th>
                  <td> ' . $tjDate . ' ' . $transactionTime . '</td>
                  </tr>

                  </tbody>
              </table>
              </div>
              <br>

                  <br><br>
                  </center>
                </div>
                  <br>
              
                  </p><br><br>
              Thanks & Regards,<br>
              International Sahaja Yoga Seminar Nirmal Nagari – 2023, Ganapatipule<br>
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

        mail($to, $subject, $body, $headers);


        
        $response = response_code($_POST['Response_Code']);
        //echo $response;
        // echo '<br>';
        // echo "<div style='text-align:center; width: 100%;font-size:20px;'>
        //         <p>Sorry for the inconvenience caused.</p>";
        //     echo "<p>In case your account has been debited, We will send you a receipt and booking confirmation on email.</p> ";
      
      
        // echo "<p> Please wait for 24 hours for us to reconcile your payment with the bank.</p>";
        // // echo '<p>Also you can download your badges from the below URL by using the mobile number and email ID that you used at the time of registration. </p>';
        // // echo '<a href = "https://www.sahajayogamumbai.org/gpseminar/print.php">Download badges</a>';
        // echo "<p> If you've any query, please reach out to us :</p>";
        // echo "<p>Mobile : 7972486996</p>";
        // echo "<p>Email : support@dexpertsystems.com</p>";
        // echo "<p> Click <a href=" . $back . ">here</a> to return to the home page</p>";
          

        ?>
          <style>
            .cpol li{
                padding: 5px 0px;
            }
            a{
                text-decoration: none;
            }
            .btn{
                font-size: 12px;
            }
          </style>

          <div class="row" style="margin:40px 10px;">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="text-center">
                      <img src="caution.png" style="width:70px;">
                  </div>
                  <div>
                      <p style="font-size: 28px; text-align: center; padding: 10px 0px 0px 0px;">
                          Sorry for the inconvenience cause.
                      </p>
                      
                      <ol class="cpol" style="font-size: 14px;">
                          <p style="font-size: 19px; margin:5px 0px;">
                              In case your account has been debited, please try below options :
                          </p>
                          <li>
                              Download receipt from <a href="https://www.sahajayogabharat.org/gpseminar/print.php"><b>Participant login</b></a> available at the main page top right side 
                          </li>

                          <li>
                              Please wait for 72 hours for us to reconcile your payment with Bank 
                          </li>

                          <li>
                              Check payment deduction directly with ICICI Bank Eazy pay on below link with your credentials.<br>
                              <b><a href="https://eazypay.icicibank.com/homePage">https://eazypay.icicibank.com/homePage</a></b>
                          </li>

                          <li>
                              If you don't got receipt after payment deduction then write to service provider 
                              <a href="mailto:support@dexpertsystems.com">(support@dexpertsystems.com)</a>
                          </li>
                      </ol>
                  </div>

                  <div style="text-align: center; padding: 10px 0px;">
                      <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                  </div>
              </div>
              <div class="col-md-3"></div>
          </div>
        <?php

      }

    }
    
    
     else if ($paymentType == 'EVENT_RAHURI') 
    {

      if ($_POST['Response_Code'] == 'E000') {
        // echo "<script>alert('" . $_POST['Response_Code'] ."')</script>";
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];
        $_SESSION["Transaction_Date"] =  $_POST['Transaction_Date'];
        include "rahuri_success_receipt.php";

      }
      else
      {
        $sql = "update event_registration_rahuri set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
        where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


        if ($conn->query($sql) === true) {
        //echo "<script> alert('Record Update.'); </script>";
        } else {
        //echo "<script> alert('Failed To Update Record.'); </script>";
        }

        ?>

      <div>
      <center>
      <h2>You have cancelled this transaction!</h2>

      <a href="https://www.sahajayogabharat.org/nirmaldhamaradgaon/index.html" class="btn btn-info"> go to home</a>
      </center>
      </div>

       <?php
        $sql1 = "SELECT * FROM event_registration_rahuri where Transaction_id='" . $_POST['ReferenceNo'] . "'";
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
            $payMode = $row["Payment_mode"];
            $transactionDate = $row["Transaction_start_time"];
            $transactionEndDate = $row["Transaction_end_time"];
            $transactionTime = $row["time"];
            $Status = "Failed";

            $pass = $row["Passport"];
            $eventRegId = $row["event_registration_id"];

            //$receiptNumber = 123;
            $country = $row["Country"];

          }
        } else {
          echo "0 results";
        }



        $from = "noreply@thelifeeternaltrustmumbai.org";
        $to = $email;
        //   $to = 'workpreeti6@gmail.com'; 
    
        $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';

        $ccc = 'nirmaldhamrahuri@sahajayogamumbai.org';

        $subject = "[Failed Payment Receipt for] Shree Ekadash Rudra Puja - 2024";
        //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";
    
        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;

        $headers = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $eol;

        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= 'Reply-To: nirmaldhamrahuri@sahajayogamumbai.org' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        // no more headers after this, we start the body! // 
        $cop = "";
        foreach ($coupon_number as $index => $value) {
          $cop .= "<tr><td>" . $participant_name[$index] . "</td><td>" . $coupon_number[$index] . "</td></tr>";
        }

        $tdate = date_create($transactionDate, timezone_open("Asia/Kolkata"));
        $tjDate = date_format($tdate, "jS F Y");


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

  <div class="container-fluid col-md-8 card " style="height:1000px">
    <div class="contain bg-color" style="border: 1px solid #ffc10721;
    background-color: #ffc1070d;
    border-radius: 1rem 0;">
  <div class="heading">
    <div class="row">
        <div class="col-md-12 print-margin" style="margin-top: -70px;
margin-left: 10px;
        font-size: 17px;">
            <h6>
            <b>Your payment for Shree Ekadash Rudra Puja - 2024 Aradgaon (Rahuri), Ahmednagar' . $payment_for . ' is UNSUCCESSFUL.  Please try again.</b>
            </h6>
        
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
        <td> '.$Status .'</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction ID  </th>
        <td> ' . $trans_id . '</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Number  </th>
        <td> ' . $bankTransId . '</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Date  </th>
        <td> ' . $tjDate . ' ' . $transactionTime . '</td>
        </tr>

        </tbody>
    </table>
    </div>
    <br>

        <br><br>
        </center>
       </div>
        <br>
     
        </p><br><br>
     Thanks & Regards,<br>
    Shree Ekadash Rudra Puja, Aradgaon (Rahuri), Ahmednagar<br>
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


      }

    }
    
    else { // for event registration purpose receipt
    

      if ($_POST['Response_Code'] == 'E000') {
        // echo "<script>alert('" . $_POST['Response_Code'] ."')</script>";
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];



        //Update badges testing
    

        $sql1 = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {


            $towards = $row["Towards"];

            $eventRegId = $row["event_registration_id"];


          }
        } else {
          echo "0 results";
        }

        $adultSql1 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='International Sahaja Yoga Seminar, Ganapatipule' and part.coupon_number is not null";

        $adultResCount1 = $conn->query($adultSql1);

        while ($row = $adultResCount1->fetch_assoc()) {
          $adult_count_seminar = $row['adult_count'];
          // echo 'adult seminar '.$adult_count_seminar.'<br>';
        }

        $adultSql2 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='Only one day Puja, Ganapatipule' and part.coupon_number is not null";
        $adultResCount2 = $conn->query($adultSql2);

        while ($row = $adultResCount2->fetch_assoc()) {
          $adult_count_puja = $row['adult_count'];
          //  echo 'adult Puja'.$adult_count_puja.'<br>';
        }

        $yuvaSql1 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='International Sahaja Yoga Seminar, Ganapatipule' and part.coupon_number is not null";
        $yuvaResCount1 = $conn->query($yuvaSql1);

        while ($row = $yuvaResCount1->fetch_assoc()) {
          $yuva_count_seminar = $row['yuva_count'];
          //  echo 'yuva seminar'.$yuva_count_seminar.'<br>';
        }
        $yuvaSql2 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='Only one day Puja, Ganapatipule' and part.coupon_number is not null";
        $yuvaResCount2 = $conn->query($yuvaSql2);

        while ($row = $yuvaResCount2->fetch_assoc()) {
          $yuva_count_puja = $row['yuva_count'];
          //  echo 'yuva Puja'.$yuva_count_puja.'<br>';
        }

        $childSql1 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='International Sahaja Yoga Seminar, Ganapatipule' and part.coupon_number is not null";
        $childResCount1 = $conn->query($childSql1);

        while ($row = $childResCount1->fetch_assoc()) {
          $child_count_seminar = $row['child_count'];
          // echo 'child seminar %%'.$child_count_seminar.'<br>';
        }

        $childSql2 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='Only one day Puja, Ganapatipule' and part.coupon_number is not null";
        $childResCount2 = $conn->query($childSql2);

        while ($row = $childResCount2->fetch_assoc()) {
          $child_count_puja = $row['child_count'];
          // echo 'child puja '.$child_count_puja .'<br>';
        }

        // Badges generate for Adult
        // $last_id = mysqli_insert_id($conn);
    
        $Date = date("Y-m-d");


        $sqlGender = "select * from participants WHERE event_registration_id='$eventRegId' and participant_type='Adult'";
        $resultGender = $conn->query($sqlGender);
        while ($row = $resultGender->fetch_assoc()) {
          $partId = $row['id'];
          // echo $partId;
    
          if ($towards == 'International Sahaja Yoga Seminar, Ganapatipule') {
            $adult_count_seminar = $adult_count_seminar + 1;
            $adult_coupon = 'A' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($adult_count_seminar, 5, '0', STR_PAD_LEFT);
            // echo 'Adult seminar '.$adult_coupon.'<br>';
            $updateAdultseminar = "update participants set coupon_number='$adult_coupon' where id='$partId'";

            $conn->query($updateAdultseminar);
          }
          if ($towards == 'Only one day Puja, Ganapatipule') {
            $adult_count_puja = $adult_count_puja + 1;
            $adult_coupon = 'PA' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($adult_count_puja, 5, '0', STR_PAD_LEFT);
            // echo 'Adult puja coupon '.$adult_coupon.'<br>';
            $updateAdultpuja = "update participants set coupon_number='$adult_coupon' where id='$partId'";

            $conn->query($updateAdultpuja);
          }

        }

        $sqlyuvaGender = "select * from participants WHERE event_registration_id='$eventRegId' and participant_type='Yuva'";
        $resultyuvaGender = $conn->query($sqlyuvaGender);
        while ($row = $resultyuvaGender->fetch_assoc()) {
          $partyuvaId = $row['id'];
          // echo $partyuvaId;
    
          if ($towards == 'International Sahaja Yoga Seminar, Ganapatipule') {
            $yuva_count_seminar = $yuva_count_seminar + 1;
            //  echo 'sd  '.$yuva_count_seminar;
            $yuva_coupon = 'Y' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($yuva_count_seminar, 5, '0', STR_PAD_LEFT);
            // echo 'Yuva seminar coupons@@@@'.$yuva_coupon.'<br>';
            $updateYuvaseminar = "update participants set coupon_number='$yuva_coupon' where id='$partyuvaId'";
            $conn->query($updateYuvaseminar);
          }
          if ($towards == 'Only one day Puja, Ganapatipule') {
            $yuva_count_puja = $yuva_count_puja + 1;
            $yuva_coupon = 'PY' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($yuva_count_puja, 5, '0', STR_PAD_LEFT);
            // echo 'Yuva puja coupon @@@@'.$yuva_coupon.'<br>';
            $updateYuvapuja = "update participants set coupon_number='$yuva_coupon' where id='$partyuvaId'";
            $conn->query($updateYuvapuja);
          }

        }


        $sqlChildGender = "select * from participants WHERE event_registration_id='$eventRegId' and participant_type='Child'";
        $resultChildGender = $conn->query($sqlChildGender);
        while ($row = $resultChildGender->fetch_assoc()) {
          $partChildId = $row['id'];
          //  echo $partChildId;
          if ($towards == 'International Sahaja Yoga Seminar, Ganapatipule') {
            $child_count_seminar = $child_count_seminar + 1;
            // echo 'child seminar count gfh'.$child_count_seminar;
            $child_coupon = 'C' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($child_count_seminar, 5, '0', STR_PAD_LEFT);
            // echo 'Child seminar coupons@@@@'.$child_coupon.'<br>';
            $updateChildseminar = "update participants set coupon_number='$child_coupon' where id='$partChildId'";
            $conn->query($updateChildseminar);
          }
          if ($towards == 'Only one day Puja, Ganapatipule') {
            $child_count_puja = $child_count_puja + 1;
            $child_coupon = 'PC' . strtoupper(substr($row['gender'], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($child_count_puja, 5, '0', STR_PAD_LEFT);
            // echo 'Child puja coupon @@@@'.$child_coupon.'<br>';
            $updateChildpuja = "update participants set coupon_number='$child_coupon' where id='$partChildId'";
            $conn->query($updateChildpuja);
          }
        }


        //End badges testing 
        include "badges.php"; // Insert any content into the file you wish to display to the user when the payment is successful 
    
      } 
      else if ($_POST['Response_Code'] == 'E00335' || $_POST['Response_Code'] == 'E0803' ) 
      {
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
          where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


          if ($conn->query($sql) === true) {
          //echo "<script> alert('Record Update.'); </script>";
          } else {
          //echo "<script> alert('Failed To Update Record.'); </script>";
          }

        ?>
          <style>

          .btn{
              font-size: 12px;
          }

          </style>
          <div class="row" style="margin:40px 10px;">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="text-center">
                      <img src="cancel_cp.png" style="width:70px;">
                  </div>
                  <div>
                      <p style="font-size: 25px; text-align: center; padding: 20px 0px 0px 0px;">
                          You have cancelled this transaction!
                      </p>
                  
                  </div>

                  <div style="text-align: center; padding: 10px 0px;">
                      <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="https://www.sahajayogabharat.org/gpseminar/" class="btn btn-sm btn-outline-dark">Back to Event Form</a>
                  </div>
              </div>
              <div class="col-md-3"></div>
          </div>

        <?php
      }
      else if ($_POST['Response_Code'] == 'E008' || $_POST['Response_Code'] == 'E0036' || $_POST['Response_Code'] == 'E00331' || $_POST['Response_Code'] == 'E00333' || $_POST['Response_Code'] == 'E0841' || $_POST['Response_Code'] == 'E0842' || $_POST['Response_Code'] == 'E0843' || $_POST['Response_Code'] == 'E0848' || $_POST['Response_Code'] == 'E0850' || $_POST['Response_Code'] == 'E0851' || $_POST['Response_Code'] == 'E0852' || $_POST['Response_Code'] == 'E0853') 
      {        
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
        Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
        where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


        if ($conn->query($sql) === true) {
        //echo "<script> alert('Record Update.'); </script>";
        } else {
        //echo "<script> alert('Failed To Update Record.'); </script>";
        }

        ?>

          <style>
              .btn{
                  font-size: 12px;
              }
          </style>
          <div class="row" style="margin:40px 10px;">
              <div class="text-center">
                  <img src="caution.png" style="width:70px;">
              </div>

              <p style="font-size: 25px; text-align: center; padding: 10px 0px 0px 0px;">
                  Sorry we could not validate your payment.<br>
                  Please try again.
              </p>

              <div style="text-align: center; padding: 10px 0px;">
                  <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-success">Back to Event Form</a>
              </div>
          </div>

        <?php
      }
      else 
      {
        $back = 'https://www.sahajayogabharat.org/gpseminar/eventform.php';
        $sql = "update event_registration set Status='Failed',Transaction_Number = '" . $_POST['Unique_Ref_Number'] . "',
                    Transaction_end_time = '" . $_POST['Transaction_Date'] . "'
                    where Transaction_id='" . $_POST['ReferenceNo'] . "' ";


        //   print_r($_POST); 
        // die();
    

        if ($conn->query($sql) === true) {
          //echo "<script> alert('Record Update.'); </script>";
        } else {
          //echo "<script> alert('Failed To Update Record.'); </script>";
        }


        $sql1 = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
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
            $payMode = $row["Payment_mode"];
            $transactionDate = $row["Transaction_start_time"];
            $transactionEndDate = $row["Transaction_end_time"];
            $transactionTime = $row["time"];

            $pass = $row["Passport"];
            $eventRegId = $row["event_registration_id"];

            //$receiptNumber = 123;
            $country = $row["Country"];

            if ($towards == "Only one day Puja, Ganapatipule") {
              $payment_for = "(Christmas Puja Only)";
            } else {
              $payment_for = '';
            }


          }
        } else {
          echo "0 results";
        }
        $from = "noreply@thelifeeternaltrustmumbai.org";
        $to = $email;
        //   $to = 'workpreeti6@gmail.com'; 
    
        $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com';

        $ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';



        $subject = "[Failed Payment for seminar] International Sahaja Yoga Seminar - 2022 Ganpatipule";
        //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";
    
        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;


        $headers = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $eol;

        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        // no more headers after this, we start the body! // 
        $cop = "";
        foreach ($coupon_number as $index => $value) {
          $cop .= "<tr><td>" . $participant_name[$index] . "</td><td>" . $coupon_number[$index] . "</td></tr>";
        }

        $tdate = date_create($transactionDate, timezone_open("Asia/Kolkata"));
        $tjDate = date_format($tdate, "jS F Y");


        $body.='
          <!DOCTYPE html>
          <html lang="en">
            <head>
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

                <div class="container-fluid col-md-8 card " style="height:1000px">
                  <div class="contain bg-color" style="border: 1px solid #ffc10721;
                  background-color: #ffc1070d;
                  border-radius: 1rem 0;">
                <div class="heading">
                  <div class="row">
                      <div class="col-md-12 print-margin" style="margin-top: -70px;
              margin-left: 10px;
                      font-size: 17px;">
                          <h6>
                          <b>Your transaction was unsuccessful.</b>
                          </h6>
                      
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
                      <th style="text-align:left">Transaction ID  </th>
                      
                      
                      <td> ' . $trans_id . '</td>
                      </tr>
                      <tr>
                      <th style="text-align:left">Transaction Number  </th>
                      <td> ' . $bankTransId . '</td>
                      </tr>
                      <tr>
                      <th style="text-align:left">Transaction Date  </th>
                      <td> ' . $tjDate . ' ' . $transactionTime . '</td>
                      </tr>

                      </tbody>
                  </table>
                  </div>
                  <br>

                      <br><br>
                      </center>
                    </div>
                      <br>
                  
                      </p><br><br>
                  Thanks & Regards,<br>
                  Seminar Organising Team<br>
                  The Life Eternal Trust, Mumbai<br><br>
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
          </html>
        ';

        
        mail($to, $subject, $body, $headers);


        $response = response_code($_POST['Response_Code']);
        //echo $response;

        ?>
          <style>
            .cpol li{
                padding: 5px 0px;
            }
            a{
                text-decoration: none;
            }
            .btn{
                font-size: 12px;
            }
          </style>

          <div class="row" style="margin:40px 10px;">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="text-center">
                      <img src="caution.png" style="width:70px;">
                  </div>
                  <div>
                      <p style="font-size: 28px; text-align: center; padding: 10px 0px 0px 0px;">
                          Sorry for the inconvenience cause.
                      </p>
                      
                      <ol class="cpol" style="font-size: 14px;">
                          <p style="font-size: 19px; margin:5px 0px;">
                              In case your account has been debited, please try below options :
                          </p>
                          <li>
                              Download receipt from <a href="https://www.sahajayogabharat.org/gpseminar/print.php"><b>Participant login</b></a> available at the main page top right side 
                          </li>

                          <li>
                              Please wait for 72 hours for us to reconcile your payment with Bank 
                          </li>

                          <li>
                              Check payment deduction directly with ICICI Bank Eazy pay on below link with your credentials.<br>
                              <b><a href="https://eazypay.icicibank.com/homePage">https://eazypay.icicibank.com/homePage</a></b>
                          </li>

                          <li>
                              If you don't got receipt after payment deduction then write to service provider 
                              <a href="mailto:support@dexpertsystems.com">(support@dexpertsystems.com)</a>
                          </li>
                      </ol>
                  </div>

                  <div style="text-align: center; padding: 10px 0px;">
                      <a href="https://www.sahajayogabharat.org/" class="btn btn-sm btn-outline-dark">Back to Homepage</a>
                  </div>
              </div>
              <div class="col-md-3"></div>
          </div>
      <?php
      }
    } ?>
</body>

</html>