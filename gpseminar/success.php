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

<body>
  <?php

    // Sagar : Here i'm checking wheather it's Contribution or Event Registration
    include_once 'dbConnection.php';
    $paymentType = "";

    
    
   $sqlrahuri = "SELECT * FROM event_registration where Transaction_id='" . $_POST['ReferenceNo'] . "'";
    $resultrahuri = $conn->query($sqlrahuri);

    if ($resultrahuri->num_rows > 0) {
      $paymentType = "EVENT_GPSEMINAR";
    }
    


    // echo    $paymentType;
    
    
    if ($paymentType == 'EVENT_GPSEMINAR') 
    {

      if ($_POST['Response_Code'] == 'E000') {
        // echo "<script>alert('" . $_POST['Response_Code'] ."')</script>";
        $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
        $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
        $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];
        $_SESSION["Transaction_Date"] =  $_POST['Transaction_Date'];
        include "success_receipt.php";

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

      <div>
      <center>
      <h2>You have cancelled this transaction!</h2>

      <a href="https://www.sahajayogabharat.org/gpseminar/index.php" class="btn btn-info"> go to home</a>
      </center>
      </div>

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
            <b>Your payment for International Sahaja Yoga Seminar Nirmal Nagari – 2023, Ganapatipule is UNSUCCESSFUL.  Please try again.</b>
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


      }

    }
    
    ?>
</body>

</html>