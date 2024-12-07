<?php
session_start();
class Eazypay
{
	
    public $encryption_key;
    public $sub_merchant_id;
    public $reference_no;
    public $paymode;
    public $return_url;
	public $merchant_reference_no ;
	
    const DEFAULT_BASE_URL = 'https://eazypay.icicibank.com/EazyPG?';

    public function __construct()
    {
        // $this->encryption_key           =    '$encryption_key';
        $this->sub_merchant_id          =    '3300261016';
        $this->reference_no   			=    '52366666655';//rand(111111,999999); //transaction id
        $this->paymode                  =    '9';
        $this->return_url               =    trim('https://www.sahajayogabharat.org/contribution/success.php');
    }

    public function getPaymentUrl($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail , $optionalField, $merchant_id, $encryption_key )
    {
		

        $mandatoryField   =    $this->getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail,$encryption_key);
        $optionalField    =    $this->getOptionalField($optionalField,$encryption_key);
        $amount           =    $this->getAmount($amount,$encryption_key);
        $reference_no     =    $this->getReferenceNo($reference_no,$encryption_key);

        $paymentUrl = $this->generatePaymentUrl(trim($mandatoryField), trim($optionalField), trim($amount), trim($reference_no), $merchant_id,$encryption_key);
		
		
		
		// die($mandatoryField);
		
		
        return $paymentUrl;
        // return redirect()->to($paymentUrl);
    }

    protected function generatePaymentUrl($mandatoryField, $optionalField, $amount, $reference_no, $merchant_id, $encryption_key)
    {
        $encryptedUrl = self::DEFAULT_BASE_URL."merchantid=".$merchant_id."&mandatory fields=".$mandatoryField."&optional fields=".$optionalField."&returnurl=".$this->getReturnUrl($encryption_key)."&Reference No=".$reference_no."&submerchantid=".$this->getSubMerchantId($encryption_key)."&transaction amount=".$amount."&paymode=".$this->getPaymode($encryption_key);

		// die($encryptedUrl);
        return $encryptedUrl; 
    }

    protected function getMandatoryField($reference_no, $sub_merchant_id,$amount,$payerContact,$payerName ,$payerEmail, $encryption_key)
    {
		
		
		$mandatoryField =$reference_no.'|'.$this->sub_merchant_id.'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail;
		//echo $mandatoryField."<br>";  
		//return $mandatoryField;
        return $this->getEncryptValue($reference_no.'|'.$this->sub_merchant_id.'|'.$amount.'|'.$payerContact.'|'.$payerName.'|'.$payerEmail, $encryption_key);
    }

    
    protected function getOptionalField($optionalField,$encryption_key)
    {
        if (!is_null($optionalField)) {
           
		   // return $optionalField;
		   return $this->getEncryptValue($optionalField,$encryption_key);
        }
        return null;
    }

    protected function getAmount($amount,$encryption_key)
    {
        return $this->getEncryptValue($amount,$encryption_key);
        // return $amount;
    }

    protected function getReturnUrl($encryption_key)
    {
        return $this->getEncryptValue($this->return_url,$encryption_key);
        // return $this->return_url;
    }

    protected function getReferenceNo($reference_no,$encryption_key)
    {
        return $this->getEncryptValue($reference_no,$encryption_key);
        // return $this->$reference_no;
    }
	
    protected function getSubMerchantId($encryption_key)
    {
        return $this->getEncryptValue($this->sub_merchant_id,$encryption_key);
        // return $this->sub_merchant_id;
    }

    protected function getPaymode($encryption_key)
    {
        return $this->getEncryptValue($this->paymode,$encryption_key);
        // return $this->paymode;
    }

    // use @ to avoid php warning php 

    protected function getEncryptValue($str,$encryption_key)
    {	//echo $str."</br>";
	
        // die($encryption_key );
        $block = @mcrypt_get_block_size('rijndael_128', 'ecb');
        $pad = $block - (strlen($str) % $block);
        $str .= str_repeat(chr($pad), $pad);
        return base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryption_key, $str, MCRYPT_MODE_ECB));
		
		 //return $str;	
    }
    
}

error_reporting(1);
$amount = $_POST['amount'];
$trans_id=rand(111111,999999);
$mtxnId = $trans_id;
$payerFirstName = str_replace("'","",$_POST['fname']);
$payerLastName =  str_replace("'","",$_POST['lname']);
$payerContact =  str_replace("'","",$_POST['mobile']);
$payerEmail = str_replace("'","",$_POST['email']);
$payerAddress = $_POST['city'].' '.$_POST['pincode'];
$payerAddress = str_replace("'","",$payerAddress);
$city = str_replace("'","",$_POST['city']);
$pin = str_replace("'","",$_POST['pincode']);
$PANNo = str_replace("'","", $_POST['pan']);
$aadhar = str_replace("'","", $_POST['aadhaar']);
$towards =  str_replace("'","", $_POST['payment_towards']);
$data = ' ';
if($towards == 'Aradgaon Rahuri Ashram Corpus Fund' || $towards == 'Aradgaon Rahuri Ashram General Donation'){
    $merchant_id = '330587';
	$encryption_key           =    '3314511605801000';
}

else if($towards == 'International Sahaja Yoga Research and Health Centre Corpus Fund' || $towards == 'International Sahaja Yoga Research and Health Centre General Donation'){
    $merchant_id = '330525';
	$encryption_key           =    '3308732305201001';
}

else if($towards == 'Kothrud Pune Ashram Corpus Fund' || $towards == 'Kothrud Pune Ashram General Donation'){
    $merchant_id = '330586';
	$encryption_key           =    '3305552305801006';
}

else if($towards == 'Nirmala Nagari Ganapatipule Corpus Fund' || $towards == 'Nirmala Nagari Ganapatipule General Donation'){
    $merchant_id = '331115';
	$encryption_key           =    '3305550511101006';
}

else if($towards == 'Sahaja Yoga Centre Mumbai Corpus Fund' || $towards == 'Sahaja Yoga Centre Mumbai General Donation' || $towards == 'The Life Eternal Trust Corpus Fund' || $towards == 'The Life Eternal Trust General Donation'){
    $merchant_id = '271091';
	$encryption_key           =    '2705550610901002';
}

else if($towards == 'Vaitarna Academy Corpus Fund' || $towards == 'Vaitarna Academy General Donation'){
    $merchant_id = '330590';
	$encryption_key           =    '3305552305901006';
}

else if($towards == 'Sahaja Yoga Navi Mumbai'){
    $merchant_id = '330524';
	$encryption_key           =    '3308732305201001';
}
else{
    $merchant_id = '271091';
	$encryption_key           =    '2705550610901002';
}

if($merchant_id =='271091'){
$optionalField= $PANNo.'||||||'.$towards.'|'.$city.'||2020-21';
}else{
$optionalField= $PANNo.'||||||'.$towards.'|'.$city.'||2020-21|'.$data;
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


$createdate =  date("Y-m-d");
$rtype ='contribution';

$q2 = "select * from registration_table where Mobile='" .$payerContact. "'";
$rs2 = mysqli_query($conn,$q2);
$row2 = mysqli_fetch_array($rs2);

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
		
	if($row2['Mobile'] ==''){	
		
	$sql1 = "INSERT INTO `registration_table` ( `Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Rtype`, `Create_date`)
	VALUES ('$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin', '$rtype', '$createdate')";
    if ($conn->query($sql1) === true) {
			//echo "<script> alert('Record Inserted.'); </script>";
		} else {
			//echo "<script> alert('Failed To Insert Record.'); </script>";
		}
	}

  $reference_no = $trans_id;
  $base=new Eazypay();
  
  //optional fields=AEWPW2087H||||||Sahaja Yoga Navi Mumbai|PUNE||2020-21
  //echo $optionalField."<br><br>";
 // echo "Referece number : ".$reference_no."<br><br>";
 
   $url=$base->getPaymentUrl($reference_no, $sub_merchant_id,$amount,$payerContact,
									$payerFirstName." ".$payerLastName ,$payerEmail , $optionalField, $merchant_id, $encryption_key);
  // echo $url."<br>";
  // echo $encryption_key."<br>";
	$url = str_replace("+", "%2B",$url);								
  $_SESSION["ReferenceNoDB"] =  $reference_no; 
// echo $url;
header("Location: $url");
?>