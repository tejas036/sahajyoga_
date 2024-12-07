<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
include 'file.php';
//require 'PHPMailer/src/PHPMailer.php';
//echo "sagar  ".$_SESSION["ReferenceNoDB"];

function payment_success_exec() {

	if(isset($_POST) && isset($_POST['Total_Amount']) && $_POST['Response_Code'] == 'E000') {
		$res = $_POST;
		$res['ReferenceNo'] ;
		// Same encryption key that we gave for generating the URL
		$aes_key_for_payment_success = "2705550610901002";

		$data = array(
			'Response_Code'=> $res['Response_Code'],
			'Unique_Ref_Number'=> $res['Unique_Ref_Number'],
			'Service_Tax_Amount'=> $res['Service_Tax_Amount'],
			'Processing_Fee_Amount'=> $res['Processing_Fee_Amount'],
			'Total_Amount'=> $res['Total_Amount'],
			'Transaction_Amount'=> $res['Transaction_Amount'],
			'Transaction_Date'=> $res['Transaction_Date'],
			'Interchange_Value'=> $res['Interchange_Value'],
			'TDR'=> $res['TDR'],
			'Payment_Mode'=> $res['Payment_Mode'],
			'SubMerchantId'=> $res['SubMerchantId'],
			'ReferenceNo'=> $res['ReferenceNo'],
			'ID'=> $res['ID'],
			'RS'=> $res['RS'], 
			'TPS'=> $res['TPS'],
        );
       // echo json_encode($data );
		$verification_key = $data['ID'].'|'.$data['Response_Code'].'|'.$data['Unique_Ref_Number'].'|'.
				$data['Service_Tax_Amount'].'|'.$data['Processing_Fee_Amount'].'|'.$data['Total_Amount'].'|'.
				$data['Transaction_Amount'].'|'.$data['Transaction_Date'].'|'.$data['Interchange_Value'].'|'.
				$data['TDR'].'|'.$data['Payment_Mode'].'|'.$data['SubMerchantId'].'|'.$data['ReferenceNo'].'|'.
                $data['TPS'].'|'.$aes_key_for_payment_success; 
                
                //echo $verification_key;

        $encrypted_message = hash('sha512', $verification_key);
      
		if($encrypted_message == $data['RS']) {
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
function response_code($code) {
     $rc=array('E000' =>'"Payment Successful.', 
     'E001' =>'Unauthorized Payment Mode', 
     'E002' =>'Unauthorized Key', 
     'E003' =>'Unauthorized Packet', 
     'E004' =>'Unauthorized Merchant', 
     'E005' =>'Unauthorized Return URL', 
     'E006' =>'"Transaction Already Paid, Received Confirmation from the Bank, Yet to Settle the transaction with the Bank', 
     'E007' =>'Transaction Failed', 
     'E008' =>'Failure from Third Party due to Technical Error', 
     'E009' =>'Bill Already Expired', 
     'E0031' =>'Mandatory fields coming from merchant are empty', 
     'E0032' =>'Mandatory fields coming from database are empty', 
     'E0033' =>'Payment mode coming from merchant is empty', 
     'E0034' =>'PG Reference number coming from merchant is empty', 
     'E0035' =>'Sub merchant id coming from merchant is empty', 
     'E0036' =>'Transaction amount coming from merchant is empty', 
     'E0037' =>'Payment mode coming from merchant is other than 0 to 9', 
     'E0038' =>'Transaction amount coming from merchant is more than 9 digit length', 
     'E0039' =>'Mandatory value Email in wrong format', 
     'E00310' =>'Mandatory value mobile number in wrong format', 
     'E00311' =>'Mandatory value amount in wrong format', 
     'E00312' =>'Mandatory value Pan card in wrong format', 
     'E00313' =>'Mandatory value Date in wrong format', 
     'E00314' =>'Mandatory value String in wrong format', 
     'E00315' =>'Optional value Email in wrong format', 
     'E00316' =>'Optional value mobile number in wrong format', 
     'E00317' =>'Optional value amount in wrong format', 
     'E00318' =>'Optional value pan card number in wrong format', 
     'E00319' =>'Optional value date in wrong format', 
     'E00320' =>'Optional value string in wrong format', 
     'E00321' =>'Request packet mandatory columns is not equal to mandatory columns set in enrolment or optional columns are not equal to optional columns length set in enrolment', 
     'E00322' =>'Reference Number Blank', 
     'E00323' =>'Mandatory Columns are Blank', 
     'E00324' =>'Merchant Reference Number and Mandatory Columns are Blank', 
     'E00325' =>'Merchant Reference Number Duplicate', 
     'E00326' =>'Sub merchant id coming from merchant is non numeric', 
     'E00327' =>'Cash Challan Generated', 
     'E00328' =>'Cheque Challan Generated', 
     'E00329' =>'NEFT Challan Generated', 
     'E00330' =>'Transaction Amount and Mandatory Transaction Amount mismatch in Request URL', 
     'E00331' =>'UPI Transaction Initiated Please Accept or Reject the Transaction', 
     'E00332' =>'Challan Already Generated, Please re-initiate with unique reference number', 
     'E00333' =>'Referer value is null / invalid Referer', 
     'E00334' =>'Value of Mandatory parameter Reference No and Request Reference No are not matched', 
     'E00335' =>'Payment has been cancelled',
     'E0801' =>'FAIL', 
     'E0802' =>'User Dropped', 
     'E0803' =>'Canceled by user', 
     'E0804' =>'User Request arrived but card brand not supported', 
     'E0805' =>'Checkout page rendered Card function not supported', 
     'E0806' =>'Forwarded / Exceeds withdrawal amount limit', 
     'E0807' =>'PG Fwd Fail / Issuer Authentication Server failure', 
     'E0808' =>'Session expiry / Failed Initiate Check, Card BIN not present', 
     'E0809' =>'Reversed / Expired Card', 
     'E0810' =>'Unable to Authorize', 
     'E0811' =>'Invalid Response Code or Guide received from Issuer', 
     'E0812' =>'Do not honor', 
     'E0813' =>'Invalid transaction', 
     'E0814' =>'Not Matched with the entered amount', 
     'E0815' =>'Not sufficient funds', 
     'E0816' =>'No Match with the card number', 
     'E0817' =>'General Error', 
     'E0818' =>'Suspected fraud', 
     'E0819' =>'User Inactive', 
     'E0820' =>'ECI 1 and ECI6 Error for Debit Cards and Credit Cards', 
     'E0821' =>'ECI 7 for Debit Cards and Credit Cards', 
     'E0822' =>'System error. Could not process transaction', 
     'E0823' =>'Invalid 3D Secure values', 
     'E0824' =>'Bad Track Data', 
     'E0825' =>'Transaction not permitted to cardholder', 
     'E0826' =>'Rupay timeout from issuing bank', 
     'E0827' =>'OCEAN for Debit Cards and Credit Cards', 
     'E0828' =>'E-commerce decline', 
     'E0829' =>'This transaction is already in process or already processed', 
     'E0830' =>'Issuer or switch is inoperative', 
     'E0831' =>'Exceeds withdrawal frequency limit', 
     'E0832' =>'Restricted card', 
     'E0833' =>'Lost card', 
     'E0834' =>'Communication Error with NPCI', 
     'E0835' =>'The order already exists in the database', 
     'E0836' =>'General Error Rejected by NPCI', 
     'E0837' =>'Invalid credit card number', 
     'E0838' =>'Invalid amount', 
     'E0839' =>'Duplicate Data Posted', 
     'E0840' =>'Format error', 
     'E0841' =>'SYSTEM ERROR', 
     'E0842' =>'Invalid expiration date', 
     'E0843' =>'Session expired for this transaction', 
     'E0844' =>'FRAUD - Purchase limit exceeded', 
     'E0845' =>'Verification decline', 
     'E0846' =>'Compliance error code for issuer', 
     'E0847' =>'Caught ERROR of type:[ System.Xml.XmlException ] . strXML is not a valid XML string', 
     'E0848' =>'Incorrect personal identification number', 
     'E0849' =>'Stolen card', 
     'E0850' =>'Transaction timed out, please retry', 
     'E0851' =>'Failed in Authorize - PE', 
     'E0852' =>'Cardholder did not return from Rupay', 
     'E0853' =>'Missing Mandatory Field(s)The field card_number has exceeded the maximum length of', 
     'E0854' =>'Exception in CheckEnrollmentStatus: Data at the root level is invalid. Line 1, position 1.', 
     'E0855' =>'CAF status = 0 or 9', 
     'E0856' =>'412', 
     'E0857' =>'Allowable number of PIN tries exceeded', 
     'E0858' =>'No such issuer', 
     'E0859' =>'Invalid Data Posted', 
     'E0860' =>'PREVIOUSLY AUTHORIZED', 
     'E0861' =>'Cardholder did not return from ACS', 
     'E0862' =>'Duplicate transmission', 
     'E0863' =>'Wrong transaction state', 
     'E0864' =>'Card acceptor contact acquirer');
 return $rc[$code];
 }
?>
<html>
<body>
<?php 
  if(payment_success_exec()){
    //if($_POST['Response_Code'] == 'E000'){
    

    $_SESSION["ReferenceNo"] = $_POST['ReferenceNo'];
    $_SESSION["Payment_Mode"] = $_POST['Payment_Mode'];
    $_SESSION["Unique_Ref_Number"] = $_POST['Unique_Ref_Number'];

    include "thank-you.php"; // Insert any content into the file you wish to display to the user when the payment is successful 

  }else{ 
    include_once 'dbConnection.php';
    $sql = "update transactions set Status='Failed',Transaction_Number = '" .$_POST['Unique_Ref_Number']."',
    Transaction_end_time = '".$_POST['Transaction_Date']."'
      where Transaction_id='".$_POST['ReferenceNo']."' ";
      
    if ($conn->query($sql) === true) {
      //echo "<script> alert('Record Update.'); </script>";
    } else {
      //echo "<script> alert('Failed To Update Record.'); </script>";
    }

    $sql1 = "SELECT * FROM transactions where Transaction_id='".$_POST['ReferenceNo']."'";
		$result = $conn->query($sql1);

		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
             $Who_im = $row["Who_im"];
             
             $towards = $row["Towards"];
             $email = $row["Email"];
             $amount = $row["Amount"];
		  } 
		} else {
		  echo "0 results";
    }
    if($Who_im == 'Contribution'){
        $backToForm = "http://sahajayogamumbai.org/contribution/contribute.php";

        if ($towards == "International Sahaja Yoga Research & Health Centre, CBD Belapur") {
          $bcc = "accounts@sahajahealthcentre.com";
        }
        if ($towards == "Shri P.K. Salve Kala Pratishthan, Vaitarna") {
          $bcc = "accounts@pksacademy.com";
        }
        if ($towards == "Nirmal Nagari, Ganapatipule") {
          $bcc = "nirmalnagarigp@sahajayogamumbai.org";
        }
        if ($towards == "Kothrud, Pune Ashram") {
          $bcc = "kothrudashram@sahajayogamumbai.org";
        }
        if ($towards == "Aradgaon, Rahuri Ashram") {
          $bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
        }
    }

      $to = $email; 
      $from = "noreply@sahajayogamumbai.org"; 
      $subject = "Contribution Payment Receipts"; 
      $separator = md5(time());
      $eol = PHP_EOL;
      $ccc = "donations@sahajayogamumbai.org";
      
      $headers  = 'From: '.$from.$eol;
      $headers .= 'Cc: '.$ccc.$eol;
      $headers .= 'Bcc: '.$bcc.$eol;  
      $headers .= "MIME-Version: 1.0".$eol; 
      $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
        
      $body = "--".$separator.$eol;
      $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
      $body .= "Thank you for your attempt to donate.".$eol;
      $body .= "We regret to inform you that your payment for Amount $amount has not been successful.".$eol;
      $body .= "--".$separator.$eol;
      $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
      $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;

      mail($to, $subject, $body, $headers);
		
      $response = response_code($_POST['Response_Code']);
      //echo $response;
      echo "<div style='text-align:center; width: 100%;font-size:20px;'>
      <p>Sorry for the inconvenience caused.</p>";
      echo "<p>Your bank has returned the following error message: <b>".$response."</b></p><p>Transaction failed due to some reason. Please check with your bank if amount has been deducted.</p> ";
      echo "<p> Click <a href=".$backToForm.">here</a> to return to the home page</p>";
      echo "<p> If money was debited from your account,</p>";
      echo "<p> please reach out to donations@sahajayogamumbai.org or download  <a href='https://www.sahajayogamumbai.org/contribution/print.php'>here</a> after two working days.</p>";
      echo "<p>If you don’t get auto system generated contribution receipt due to technical issue then receipt will be email to you within 7 days or please go to‘Donor Login’  after 7 days to download all historical receipts</p></div>";

  } ?>
</body>
</html>