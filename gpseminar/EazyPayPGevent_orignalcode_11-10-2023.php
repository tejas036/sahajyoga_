<?php
session_start();

require_once('function.php');
require_once('file.php');

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
        $this->reference_no   		    	=    rand(11111111,99999999); //transaction id
        $this->paymode                  =    '9';
        $this->return_url               =    trim('https://www.sahajayogabharat.org/gpseminar/success.php');
        
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

$eventId = $_POST['eventid'];
//echo $event_id;
$amountfromget = $_POST['amount'];
// echo $amount;

$trans_id=rand(11111111,99999999);
// echo $trans_id;
$mtxnId = $trans_id;
$payerFirstName = ucfirst($_POST['fname']);
$payerFirstName = preg_replace('/\s/', '', $payerFirstName);

// echo $payerFirstName."<br>";
$payerLastName = ucfirst($_POST['lname']);
$payerLastName = preg_replace('/\s/', '', $payerLastName);

// echo $payerLastName."<br>";
$payerContact = $_POST['mobile'];
// echo $payerContact."<br>";
$payerEmail = $_POST['email'];

$payerAddress = ucfirst($_POST['city']).' '.ucfirst($_POST['pincode']);
// echo $payerAddress."<br>";
$city = ucfirst($_POST['city']);
$city = preg_replace('/\s/', '', $city);


$dist = ucfirst($_POST['dist']);
$dist = preg_replace('/\s/', '', $dist);

// echo $city."<br>";
$pin = $_POST['pincode'];
// echo $pin."<br>";
$PANNo = $_POST['pan'];
// echo $PANNo."<br>";
$aadhar = $_POST['aadhaar'];
// $towards = $_POST['payment_towards'];
$towards = $_POST['contriRadio'];
// echo $towards;
$Who_im = $_POST['Who_im'];

include_once 'dbConnection.php';
$Date =  date("Y-m-d");
$DateReceipt =  date("dmY");

date_default_timezone_set("Asia/Kolkata");
$mydate = date("Y-m-d H:i:s a");

$adultcount=(int)$_POST['number_adult1'];
$yuvacount=(int)$_POST['number_yuva1'];
$childcount=(int)$_POST['number_child1'];

$enddate = '2023-12-12';

 if($enddate > $Date)
{
  if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
{
  $adulttotal=$adultcount * 4000;
  $yuvatotal=$yuvacount * 3000;
  $childtotal= $childcount * 2000;
  $gtotal=$adulttotal+$yuvatotal+$childtotal;
}
else
{
  $adulttotal=$adultcount * 1000;
  $yuvatotal=$yuvacount * 1000;
  $childtotal= $childcount * 1000;
  $gtotal=$adulttotal+$yuvatotal+$childtotal;
}
}
else
{
  if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
  {

  $adulttotal=$adultcount * 5000;
  $yuvatotal=$yuvacount * 4000;
  $childtotal=$childcount * 2500;
  $gtotal=$adulttotal+$yuvatotal+$childtotal;
  }
  elseif($towards == 'Only day Puja, Ganapatipule')
  {
    $adulttotal=$adultcount * 1000;
    $yuvatotal=$yuvacount * 1000;
    $childtotal=$childcount * 1000;
    $gtotal=$adulttotal+$yuvatotal+$childtotal;
  }
}

if($amountfromget == $gtotal && $eventId != '' && $payerFirstName != '' && $payerLastName != '' && $payerContact != '' && $payerEmail != '' && $city != '' && $PANNo !='' && $pin != '' && $trans_id != '' && $Date != '' && $towards != '')
{
 $amount=$gtotal;
 


$sql1 = "SELECT * FROM event_registration where Transaction_start_time='" .$Date. "'";
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


$optionalField= $PANNo.'||||||'.$towards.'|'.$city.'||2022-23';



$adultNameArray = array();
$adultGenderArray = array();
$adultCityArray = array();
$adultCentreArray = array();

$yuvaNameArray = array();
$yuvaGenderArray = array();
$yuvaCityArray = array();
$yuvaCentreArray = array();

$childNameArray = array();
$childGenderArray = array();
$childCityArray = array();
$childCentreArray = array();



if(isset($_POST['adult_name']) && isset($_POST['adult_gender']) && $_POST['adult_city'] && $_POST['adult_centre'])
{ 

$adultNameArray = $_POST['adult_name'];
$adultGenderArray = $_POST['adult_gender'];
$adultCityArray = $_POST['adult_city'];
$adultCentreArray = $_POST['adult_centre'];
}

if(isset($_POST['yuva_name']) && isset($_POST['yuva_gender']) && isset($_POST['yuva_gender']) && isset($_POST['yuva_city']) && isset($_POST['yuva_centre']))
{ 

$yuvaNameArray = $_POST['yuva_name'];
$yuvaGenderArray = $_POST['yuva_gender'];
$yuvaCityArray = $_POST['yuva_city'];
$yuvaCentreArray = $_POST['yuva_centre'];
}

if(isset($_POST['child_name']) && isset($_POST['child_gender']) && isset($_POST['child_gender']) && isset($_POST['child_city']) && isset($_POST['child_centre']))
{ 
$childNameArray = $_POST['child_name'];
$childGenderArray = $_POST['child_gender'];
$childCityArray = $_POST['child_city'];
$childCentreArray = $_POST['child_centre'];
}

$participent_type_adult = "Adult";
$participent_type_yuva = "Yuva";
$participent_type_child = "Child";


 include_once "dbConnection.php";
  
    if($conn)
    { 
    $adultSql1 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $adultResCount1 = $conn->query($adultSql1);

        while($row=$adultResCount1->fetch_assoc()){
                $adult_count_seminar = $row['adult_count'];
    }


    $adultSql2 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='Only day Puja, Ganapatipule'";
    $adultResCount2 = $conn->query($adultSql2);

        while($row=$adultResCount2->fetch_assoc()){
                $adult_count_puja = $row['adult_count'];
    }

    $yuvaSql1 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $yuvaResCount1 = $conn->query($yuvaSql1);

        while($row=$yuvaResCount1->fetch_assoc()){
                $yuva_count_seminar = $row['yuva_count'];
              
    }


    $yuvaSql2 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='Only day Puja, Ganapatipule'";
    $yuvaResCount2 = $conn->query($yuvaSql2);

        while($row=$yuvaResCount2->fetch_assoc()){
                $yuva_count_puja = $row['yuva_count'];
    }

    $childSql1 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $childResCount1 = $conn->query($childSql1);

        while($row=$childResCount1->fetch_assoc()){
                $child_count_seminar = $row['child_count'];;
    }

    $childSql2 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='Only day Puja, Ganapatipule'";
    $childResCount2 = $conn->query($childSql1);

        while($row=$childResCount2->fetch_assoc()){
                $child_count_puja = $row['child_count'];
    }


    $sql = "INSERT INTO `event_registration` (`event_id`,`Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Who_im`, `Transaction_id`, `Amount`, `Status`, `Transaction_start_time`, `Towards`,`receiptNumber`,`count_adult`,`count_yuva`,`count_child`,`dist`)
	  VALUES ('$eventId','$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin','$Who_im', '$trans_id', '$amount', '$Status','$Date','$towards','$receiptNumber','$adultcount','$yuvacount','$childcount','$dist')";
   			
            $result = mysqli_query($conn, $sql);
            if($result) {
                //echo "<script> alert('Record Inserted.'); </script>";
            }
        }
             $last_id = mysqli_insert_id($conn);
              $i = 0;
              $j = 0;
              $k = 0;
        for ($i; $i < count($adultNameArray); $i++)
         { 
          $adult_coupon = '';

            if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
              $adult_count_seminar = $adult_count_seminar+1; 
              $adult_coupon = 'A'.strtoupper(substr($adultGenderArray[$i],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($adult_count_seminar,5,'0',STR_PAD_LEFT);
             
            }

            if($towards == 'Only day Puja, Ganapatipule') {
              $adult_count_puja = $adult_count_puja + 1;
              $adult_coupon = 'PA'.strtoupper(substr($adultGenderArray[$i],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($adult_count_puja,5,'0',STR_PAD_LEFT);
              
            }

            $sql1 = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre, participant_type)  VALUES('". $eventId."','". $last_id."','".ucfirst($adultNameArray[$i])."','". ucfirst($adultGenderArray[$i])."','".ucfirst($adultCityArray[$i])."','".ucfirst($adultCentreArray[$i])."','".ucfirst($participent_type_adult)."')";
            $result1 = mysqli_query($conn,$sql1);

             if($result1)
               {
                 //echo "<script> alert('Adult record is inserted.'); </script>";
               }
         }
         
   
         for ($j; $j < count($yuvaNameArray); $j++)
         { 

          $yuva_coupon = '';
          
          if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
            $yuva_count_seminar = $yuva_count_seminar+1; 
            $yuva_coupon = 'Y'.strtoupper(substr($yuvaGenderArray[$j],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($yuva_count_seminar,5,'0',STR_PAD_LEFT);
          
          }

          if($towards == 'Only day Puja, Ganapatipule') {
            $yuva_count_puja = $yuva_count_puja + 1;
            $yuva_coupon = 'PY'.strtoupper(substr($yuvaGenderArray[$j],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($yuva_count_puja,5,'0',STR_PAD_LEFT);
          
          }
      
            $sqlyuva = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre, participant_type)  VALUES('". $eventId."','". $last_id."','".ucfirst($yuvaNameArray[$j])."','". ucfirst($yuvaGenderArray[$j])."','".ucfirst($yuvaCityArray[$j])."','".ucfirst($yuvaCentreArray[$j])."','".ucfirst($participent_type_yuva)."')";
            $resultyuva = mysqli_query($conn,$sqlyuva);

             if($resultyuva)
               {
                 //echo "<script> alert('Yuva record is inserted.'); </script>";
               } 
         }

         for ($k; $k < count($childNameArray); $k++)
         { 
          $child_coupon = '';
          
          if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
            $child_count_seminar = $child_count_seminar+1; 
            $child_coupon =  'C'.strtoupper(substr($childGenderArray[$k],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($child_count_seminar,5,'0',STR_PAD_LEFT);
           
          }

          if($towards == 'Only day Puja, Ganapatipule') {
            $child_count_puja = $child_count_puja + 1;
            $child_coupon = 'PC'.strtoupper(substr($childGenderArray[$k],0,1)).substr($Date,8,2).substr($Date,5,2).substr($Date,0,4).str_pad($child_count_puja,5,'0',STR_PAD_LEFT);
            
          }

       
            $sqlchild = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre, participant_type)  VALUES('". $eventId."','". $last_id."','".ucfirst($childNameArray[$k])."','". ucfirst($childGenderArray[$k])."','".ucfirst($childCityArray[$k])."','".ucfirst($childCentreArray[$k])."','".ucfirst($participent_type_child)."')";
            $resultchild = mysqli_query($conn,$sqlchild);
             if($resultchild)
               {
                // echo "<script> alert('Child record is inserted.'); </script>";
               }
              }
            
         
  $reference_no = $trans_id;
  $base=new Eazypay();


   $optionalField= $PANNo.'| | | |0|0|'.$towards.'|'.$city.'| |2021-22| ';
  
  //echo 'Optional : '.$optionalField;
  
 
 
   $url=$base->getPaymentUrl(trim($reference_no), trim($sub_merchant_id),trim($amount),trim($payerContact),
									trim($payerFirstName." ".$payerLastName) ,trim($payerEmail) , $optionalField);

									
	$url = str_replace("+", "%2B",$url);								
  echo 'Final Url : <br>'.$url."<br>";
//   die(':sagar');
  $_SESSION["ReferenceNoDB"] =  $reference_no; 
  
header("Location: $url");

}
else
{
echo "<script>alert('unauthorized request');</script>";
echo"<script>location='https://www.sahajayogabharat.org/gpseminar/index.php'</script>";
} 
?>