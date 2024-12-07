<?php
session_start();

require_once('function.php');
require_once('file.php');


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
		//$this->merchant_id              =    '3300261016';
		$this->merchant_id              =    '271091';
        $this->encryption_key           =    '2705550610901002';
        $this->sub_merchant_id          =    '3300261016';
        $this->reference_no   			=    '52366666655';//rand(111111,999999); //transaction id
        $this->paymode                  =    '9';
        $this->return_url               =    trim('https://www.sahajayogamumbai.org/contribution/success.php');
		
    }

    public function getPaymentUrl($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail , $optionalField, $merchant_id)
    {
        $mandatoryField   =    $this->getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail);
		
        $optionalField    =    $this->getOptionalField($optionalField);
        $amount           =    $this->getAmount($amount);
        $reference_no     =    $this->getReferenceNo($reference_no);

        $paymentUrl = $this->generatePaymentUrl(trim($mandatoryField), trim($optionalField), trim($amount), trim($reference_no), trim($merchant_id));
        return $paymentUrl;
        // return redirect()->to($paymentUrl);
    }

    protected function generatePaymentUrl($mandatoryField, $optionalField, $amount, $reference_no, $merchant_id)
    {
        $encryptedUrl = self::DEFAULT_BASE_URL."merchantid=".$merchant_id."&mandatory fields=".$mandatoryField."&optional fields=".$optionalField."&returnurl=".$this->getReturnUrl()."&Reference No=".$reference_no."&submerchantid=".$this->getSubMerchantId()."&transaction amount=".$amount."&paymode=".$this->getPaymode();

        return $encryptedUrl; 
    }

    protected function getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail)
    {
		
		
		$mandatoryField =$reference_no.'|'.$this->sub_merchant_id.'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail;
		//echo $mandatoryField."<br>";  
		//return $mandatoryField;
        return $this->getEncryptValue($reference_no.'|'.$this->sub_merchant_id.'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail);
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
		
		 //return $str;	
    }
    
}
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

if($towards == 'Aradgaon Rahuri Ashram Corpus Fund' || $towards == 'Aradgaon Rahuri Ashram General Donation'){
    $merchant_id = '330587';
}

else if($towards == 'International Sahaja Yoga Research and Health Centre Corpus Fund' || $towards == 'International Sahaja Yoga Research and Health Centre General Donation'){
    $merchant_id = '330525';
}

else if($towards == 'Kothrud Pune Ashram Corpus Fund' || $towards == 'Kothrud Pune Ashram General Donation'){
    $merchant_id = '330586';
}

else if($towards == 'Nirmal Nagari Ganapatipule Corpus Fund' || $towards == 'Nirmal Nagari Ganapatipule General Donation'){
    $merchant_id = '331115';
}

else if($towards == 'Sahaja Yoga Centre Mumbai Corpus Fund' || $towards == 'Sahaja Yoga Centre Mumbai General Donation' || $towards == 'The Life Eternal Trust Corpus Fund' || $towards == 'The Life Eternal Trust General Donation'){
    $merchant_id = '271091';
}

else if($towards == 'Vaitarna Academy Corpus Fund' || $towards == 'Vaitarna Academy General Donation'){
    $merchant_id = '330590';
}

else if($towards == 'Aradgaon Rahuri Ashram Corpus Fund' || $towards == 'Aradgaon Rahuri Ashram General Donation'){
    $merchant_id = '330587';
}
else if($towards == 'Sahaja Yoga Navi Mumbai'){
    $merchant_id = '330524';
}
else{
    $merchant_id = '271091';
}

$CountryName = $_POST['countryname'];

if($CountryName == null){
    $Country = "India";
}else{
    $Country = $CountryName;
}

$FoodFromDate = $_POST['fdatef'];
$FoodToDate = $_POST['tdatef'];
$StayFromDate = $_POST['fdates'];
$StayToDate = $_POST['tdates'];
$FoodTotal = $_POST['rate'];
$StayTotal = $_POST['rates'];
$OtherChargestext = $_POST['otherChargestext'];
$OtherCharges = $_POST['otherCharges'];
$stayContribution = $_POST['stayContAmount'];
$foodContribution = $_POST['FoodContAmount'];

$Who_im = $_POST['Who_im'];
$Passport = $_POST['pass'];
// echo "<script> alert($Who_im); </script>";
include_once 'dbConnection.php';
$Date =  date("Y-m-d");
$DateReceipt =  date("dmY");

$sql1 = "SELECT * FROM transactions where Transaction_start_time='" .$Date. "'";
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

$receiptNumber = $DateReceipt.'/'.$listSize ;

$Status = "Pending";
	// $sql = "INSERT INTO `transactions` ( `id`, `Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Transaction_id`, `Amount`, `Status`, `Transaction_start_time`, `Towards`,`receiptNumber` )
	// VALUES (null, '$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin', '$trans_id', '$amount', '$Status','$Date','$towards','$receiptNumber')";
    $sql = "INSERT INTO `transactions` ( `id`, `Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Transaction_id`, `Amount`, `Status`, `Transaction_start_time`, `Towards`,`receiptNumber`, `Country`, `Passport`, `Who_im`,`FoodFromDate`, `FoodToDate`, `StayFromDate`, `StayToDate`, `FoodTotal`, `StayTotal`,`OtherChargestext`, `OtherCharges`,`food_contribution_per_day`,`stay_contribution_per_day` )
	VALUES (null, '$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin', '$trans_id', '$amount', '$Status','$Date','$towards','$receiptNumber', '$Country', '$Passport', '$Who_im', '$FoodFromDate', '$FoodToDate', '$StayFromDate', '$StayToDate', '$FoodTotal', '$StayTotal','$OtherChargestext', '$OtherCharges','$foodContribution ' ,'$stayContribution ')";
    if ($conn->query($sql) === true) {
			//echo "<script> alert('Record Inserted.'); </script>";
		} else {
			//echo "<script> alert('Failed To Insert Record.'); </script>";
		}

  $reference_no = $trans_id;
  $base=new Eazypay();
  
  //optional fields=AEWPW2087H||||||Sahaja Yoga Navi Mumbai|PUNE||2020-21
  $optionalField= $PANNo.'||||||'.$towards.'|'.$city.'||2020-21';
  //echo $optionalField."<br><br>";
 // echo "Referece number : ".$reference_no."<br><br>";
 
   $url=$base->getPaymentUrl($reference_no, $sub_merchant_id,$amount,$payerContact,$merchant_id,
									$payerFirstName." ".$payerLastName ,$payerEmail , $optionalField);
									
	$url = str_replace("+", "%2B",$url);								
  //echo $url."<br>";
  $_SESSION["ReferenceNoDB"] =  $reference_no; 


header("Location: $url");
?>