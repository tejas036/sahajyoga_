<?php

session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail']."Session";
}


require_once('../function.php');
require_once('../file.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Eazypay
{
    public $merchant_id;
    public $encryption_key;
    public $sub_merchant_id;
    public $reference_no;
    public $paymode;
    public $return_url;
	public $merchant_reference_no ;
	
    const DEFAULT_BASE_URL = 'https://eazypay.icicibank.com/EazyPG?';

    public function __construct()
    {

        $this->merchant_id              =    '331115';
        $this->encryption_key           =    '3305550511101006';
        $this->sub_merchant_id          =    '3300261016';
        $this->reference_no   			=    rand(111111,999999); //transaction id
        $this->paymode                  =    '9';
        $this->return_url               =    trim('https://www.sahajayogabharat.org/contribution/success.php');

    }

    public function getPaymentUrl($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail , $optionalField)
    {
        $mandatoryField   =    $this->getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail);
		
        $optionalField    =    $this->getOptionalField($optionalField);
        $amount           =    $this->getAmount($amount);
        $reference_no     =    $this->getReferenceNo($reference_no);

        $paymentUrl = $this->generatePaymentUrl(trim($mandatoryField), trim($optionalField), trim($amount), trim($reference_no));
        echo "PalinUrl:".$paymentUrl."<br>";
        return $paymentUrl;
        // return redirect()->to($paymentUrl);
    }

    protected function generatePaymentUrl($mandatoryField, $optionalField, $amount, $reference_no)
    {
        $encryptedUrl = self::DEFAULT_BASE_URL."merchantid=".$this->merchant_id."&mandatory fields=".$mandatoryField."&optional fields=".$optionalField."&returnurl=".$this->getReturnUrl()."&Reference No=".$reference_no."&submerchantid=".$this->getSubMerchantId()."&transaction amount=".$amount."&paymode=".$this->getPaymode();
        echo $encryptedUrl;
        return $encryptedUrl; 
    }

    protected function getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail)
    {
		
		
		$mandatoryField =$reference_no.'|'.trim($this->sub_merchant_id).'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail;
		echo 'mandatoty : '.$mandatoryField."<br>";  
		//return $mandatoryField;
        return $this->getEncryptValue($reference_no.'|'.trim($this->sub_merchant_id).'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail);
    }

    
    protected function getOptionalField($optionalField)
    {
        if (!is_null($optionalField)) {
           
		   // return $optionalField;
		   return $this->getEncryptValue($optionalField);
        }
        return null;
    }

    protected function getAmount($amount)
    {
        return $this->getEncryptValue($amount);
        // return $amount;
    }

    protected function getReturnUrl()
    {
        return $this->getEncryptValue($this->return_url);
        // return $this->return_url;
    }

    protected function getReferenceNo($reference_no)
    {
        return $this->getEncryptValue($reference_no);
        // return $this->$reference_no;
    }
	
    protected function getSubMerchantId()
    {
        return $this->getEncryptValue($this->sub_merchant_id);
        // return $this->sub_merchant_id;
    }

    protected function getPaymode()
    {
        return $this->getEncryptValue($this->paymode);
        // return $this->paymode;
    }

    // use @ to avoid php warning php 

    protected function getEncryptValue($str)
    {	//echo $str."</br>";
        $block = @mcrypt_get_block_size('rijndael_128', 'ecb');
        $pad = $block - (strlen($str) % $block);
        $str .= str_repeat(chr($pad), $pad);
        return base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->encryption_key, $str, MCRYPT_MODE_ECB));
 	//	return 	$str;
    }
    
} 

$paymentMode = '';
$transactionNumber = '';
$trans_id=rand(111111,999999);
$mtxnId = $trans_id;

 $towards = $_POST['towards'];
echo $fromDateFood = $_POST['fdatef'];

echo $toDateFood = $_POST['tdatef'];

echo $fromDateStay = $_POST['fdates'];

echo $toDateStay = $_POST['tdates'];

$stayAmount = $_POST['stay_amount'];
$foodAmount = $_POST['food_amount'];
echo "<br>";
echo $partName = $_POST['part_name'];
echo "<br>";
echo $partGender = $_POST['part_gender'];
echo "<br>";
echo $partCategory = $_POST['part_category'];
echo "<br>";
echo $partCity = $_POST['part_city'];
echo "<br>";

$amt = $_POST['amount'];
echo "<br>";
echo $payerFirstName = $_POST['fname'];
echo "<br>";
echo $payerLastName = $_POST['lname'];
echo "<br>";
echo $payerEmail = $_POST['email'];
echo "<br>";
$payerContact = $_POST['mobile'];
$pin = $_POST['pincode'];
echo $panNumber = $_POST['pan'];
$aadhar = $_POST['aadhaar'];


$userid =  $_POST['userid'];


//  if($partName == '' || $partGender == '' || $partCity == '' || $payerFirstName == '' || $payerLastName == '' || $payerEmail == '' || $panNumber == '') {
//   echo "<script>alert('Please enter all mandatory fields')</script>";
//   echo "<script>location = 'food_charges.php';</script>";
//  }


$amount = 0;
$total_charges = (int)$foodAmount + (int)$stayAmount; 
echo "#######".$total_charges;
if($amt == $total_charges && $partName != '' && $partGender != '' && $partCity != '' && $payerFirstName != '' && $payerLastName != '' && $payerEmail != '' && $panNumber != '') {
    $amount = $total_charges;
   
include_once '../dbConnection.php';
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:s A");
$date =  date("Y-m-d");
$dateReceipt =  date("dmY");

$sql1 = "SELECT * FROM event_food where transaction_start_time='" .$date. "'";
		$result1 = $conn->query($sql1);
		$listSize = 0;
		if ($result1->num_rows > 0) {
			$listSize = $result1->num_rows + 1;
			//echo $listSize;
		}else{
			$listSize = 1;
			//echo $listSize ;
		}

$listSize = str_pad($listSize,6,0,STR_PAD_LEFT);
//echo $listSize."</br>";

$receiptNumber = $dateReceipt.'/'.$listSize ;

$status = "pending";

    $sql = "INSERT INTO `event_food`(`fname`, `lname`, `mobile`, `email`, `pan`, `aadhar`, `pin`, `part_name`, `part_gender`, `part_city`, `transaction_id`, `amount`, `status`, `transaction_start_time`,`towards`, `who_im`, `fromdatefood`, `todatefood`, `food`, `fromdatestay`, `todatestay`, `stay`, `time`,`category`,`userid`) 
    VALUES ('$payerFirstName','$payerLastName','$payerContact','$payerEmail','$panNumber','$aadhar','$pin','$partName', '$partGender','$partCity','$trans_id','$amount','$status','$date','$towards','event_food', '$fromDateFood','$toDateFood','$foodAmount','$fromDateStay','$toDateStay','$stayAmount','$time','$partCategory','$userid')";
    echo $sql;
    if ($conn->query($sql) === true) {
			// echo "<script> alert('Record Inserted.'); </script>";
} else {
			// echo "<script> alert('Failed To Insert Record.'); </script>";
 }

 $reference_no = $trans_id;
        $base=new Eazypay();
        
        //optional fields=AEWPW2087H||||||Sahaja Yoga Navi Mumbai|PUNE||2020-21
        $optionalField= $panNumber.'| | | |0|0|'.$towards.'|'.$partCity.'| |2021-22| ';
        
        echo 'Optional : '.$optionalField;
        
        
        
        //   $optionalField= 'AEWPW2087H'|'567898564523'|'XYZ'||||'Sahaja Yoga Navi Mumbai'|'PUNE|'|'2020-21';
        // echo "Referece number : ".$reference_no."<br><br>";
        
         $url=$base->getPaymentUrl(trim($reference_no), trim($sub_merchant_id),trim($amount),trim($payerContact),
                                          trim($payerFirstName." ".$payerLastName) ,trim($payerEmail) , $optionalField);
                                          
          $url = str_replace("+", "%2B",$url);								
        echo 'Final Url : <br>'.$url."<br>";
        //   die(':sagar');
        $_SESSION["ReferenceNoDB"] =  $reference_no; 
        
        header("Location: $url");
        
}else {
    echo "<script>alert('Unauthorized Request')</script>";
    echo "<script>location = 'foodstaybooking.php';</script>";
}

    
 ?>