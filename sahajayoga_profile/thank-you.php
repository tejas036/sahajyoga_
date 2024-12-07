<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('function.php');
$id = $_SESSION["ReferenceNo"];

$paymentMode = $_SESSION["Payment_Mode"];  

$Unique_Ref_Number = $_SESSION["Unique_Ref_Number"];

// echo $paymentMode;
include_once 'dbConnection.php';
//echo $id;
$Date =  date("Y-m-d");
		$sql = "update event_registration set Status='Success',Payment_mode = '".$paymentMode."',Transaction_end_time = '".$Date."', Transaction_Number = '" .$Unique_Ref_Number."' where Transaction_id='" . $id. "'";
  
    //echo 	$sql;
    if ($conn->query($sql) === true) {
			//echo "<script> alert('Record Update.'); </script>";
		} else {
			//echo "<script> alert('Failed To Update Record.'); </script>";
		}
		
    $sql = "SELECT * FROM event_registration where Transaction_id='" . $id. "'";
   // echo  $sql;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
             $currDate =  date("d/m/Y");
             $amountInWords = numberTowords( $amount );
		      // output data of each row
		  while($row = $result->fetch_assoc()) {
			  
			//echo "id: " . $row["id"]. " - Name: " . $row["Fname"]. " " . $row["Lname"]. "<br>";
			
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
			 $pass = $row["Passport"];
			 $country = $row["Country"];
       $Who_im = $row["Who_im"];
       $FoodFromDate1 = $row["FoodFromDate"];
       $FoodToDate1 = $row["FoodToDate"];
       $StayFromDate1 = $row["StayFromDate"];
       $StayToDate1 = $row["StayToDate"];
       $FoodTotal = $row["FoodTotal"];
       $StayTotal = $row["StayTotal"];
       $OtherCharges = $row["OtherCharges"];
			 $OtherChargestext = $row["OtherChargestext"];
       $mailid = $row["id"];
      } 

      $sql1 = "select id from event_registration where id ='".$mailid."'";
      $res = $conn->query($sql1);
      //echo $num_rows;
      if ($res->num_rows > 0) {
         //echo $res->num_rows;
         while($row = $res->fetch_assoc()) {
            $myid = $row["id"];
         }
       }
       $adultName = array();
       $adultGender = array();
	   $adultCity = array();
	   $adultCentre = array();
	   $adultImage = array();
	   $partTypeadult = 'Adult';
       $sql2 = "select * from participants where event_registration_id ='".$myid."' and participant_type ='".$partTypeadult."'";
       $res1 = $conn->query($sql2);
       if($res1->num_rows > 0) {
        while($row = $res1->fetch_assoc()) {
          array_push($adultName,$row['name']);
          array_push($adultGender,$row['gender']);
		  array_push($adultCity,$row['city']);
          array_push($adultCentre,$row['centre']);
		  array_push($adultImage,$row['image']);

        }
       }
	   $yuvaName = array();
       $yuvaGender = array();
	   $yuvaCity = array();
	   $yuvaCentre = array();
	   $yuvaImage = array();
	   $partTypeyuva = 'Yuva';
       $sqlyuva = "select * from participants where event_registration_id ='".$myid."' and participant_type ='".$partTypeyuva."'";
       $resyuva = $conn->query($sqlyuva);
       if($resyuva->num_rows > 0) {
        while($row = $resyuva->fetch_assoc()) {
          array_push($yuvaName,$row['name']);
          array_push($yuvaGender,$row['gender']);
		  array_push($yuvaCity,$row['city']);
          array_push($yuvaCentre,$row['centre']);
		  array_push($yuvaImage,$row['image']);

        }
       }

	   $childName = array();
       $childGender = array();
	   $childCity = array();
	   $childCentre = array();
	   $childImage = array();
	   $partTypechild = 'Yuva';
       $sqlchild = "select * from participants where event_registration_id ='".$myid."' and participant_type ='".$partTypeyuva."'";
       $reschild = $conn->query($sqlchild);
       if($reschild->num_rows > 0) {
        while($row = $reschild->fetch_assoc()) {
          array_push($childName,$row['name']);
          array_push($childGender,$row['gender']);
		  array_push($yuvaCity,$row['city']);
          array_push($childCentre,$row['centre']);
		  array_push($childImage,$row['image']);

        }
       }
		} else {
		  echo "0 results";
    }

	if($FoodFromDate1 == 0000-00-00){
		$FoodFromDate = " ";
		}else{
		$date1=date_create($FoodFromDate1);
		$FoodFromDate = date_format($date1,"d/m/Y");
		}
	  
		if($FoodToDate1 == 0000-00-00){
		$FoodToDate = " ";
		}else{
		$date2=date_create($FoodToDate1);
		$FoodToDate = date_format($date2,"d/m/Y");
		}
	  
		if($StayFromDate1 == 0000-00-00){
		  $StayFromDate = " ";
		}else{
		$date3=date_create($StayFromDate1);
		$StayFromDate = date_format($date3,"d/m/Y");
		}
	  
		if($StayToDate1 == 0000-00-00){
		  $StayToDate = " ";
		}else{
		$date4=date_create($StayToDate1);
		$StayToDate = date_format($date4,"d/m/Y");
		}
		
		$LogintDate = strtotime($transactionDate);
		$transactionDate_1=date('d/m/Y', $LogintDate);
		
	  
		$payInstrument=$paymentMode;
	
		if($Who_im != 'Contribution' && $Who_im != 'Gpseminar' && $Who_im != 'Gpsmarriage'){
			  $conn->close();
	
			  if ($towards == strtoupper("Guru Puja General Donation")) {
				// $bcc = "vinitsheral123@gmail.com";
				$bcc = "donations@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("The Life Eternal Trust General Donation")) {
				$bcc = "accounts.ho@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("Sahaja Yoga Centre Mumbai General Donation")) {
				$bcc = "accounts.ho@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("International Sahaja Yoga Research and Health Centre General Donation")) {
				$bcc = "accounts@sahajahealthcentre.com";
			  }
			  if ($towards == strtoupper("Nirmal Nagari Ganapatipule General Donation")) {
				$bcc = "nirmalnagarigp@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("Vaitarna Academy General Donation")) {
				$bcc = "accounts@pksacademy.com";
			  }
			  if ($towards == strtoupper("Kothrud Pune Ashram General Donation")) {
				$bcc = "kothrudashram@sahajayogamumbai.org";
			  }
			  if ($towards == 'Aradgaon Rahuri Ashram General Donation') {
				$bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("The Life Eternal Trust Corpus Fund")) {
				$bcc = "accounts.ho@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("Sahaja Yoga Centre Mumbai Corpus Fund")) {
				$bcc = "accounts.ho@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("International Sahaja Yoga Research and Health Centre Corpus Fund")) {
				$bcc = "accounts@sahajahealthcentre.com";
			  }
			  if ($towards == strtoupper("Nirmal Nagari Ganapatipule Corpus Fund")) {
				$bcc = "nirmalnagarigp@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("Vaitarna Academy Corpus Fund")) {
				$bcc = "accounts@pksacademy.com";
			  }
			  if ($towards == strtoupper("Kothrud Pune Ashram Corpus Fund")) {
				$bcc = "kothrudashram@sahajayogamumbai.org";
			  }
			  if ($towards == strtoupper("Aradgaon Rahuri Ashram Corpus Fund")) {
				$bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
			  }
	
			  if ($towards == "The Life Eternal Trust Corpus Fund" || $towards == "The Life Eternal Trust General Donation"	|| $towards == "Sahaja Yoga Centre Mumbai Corpus Fund" || $towards == "Sahaja Yoga Centre Mumbai General Donation") {
				$cc1 = "accounts.ho@sahajayogamumbai.org";
			  }
		  
			  if ($towards == "International Sahaja Yoga Research and Health Centre Corpus Fund" || $towards == "International Sahaja Yoga Research and Health Centre General Donation") {
				$cc1 = "accounts@sahajahealthcentre.com";
			  }
			  
			  if ($towards == "Kothrud Pune Ashram Corpus Fund"|| $towards == "Kothrud Pune Ashram General Donation") {
				 $cc1 = "kothrudashram@sahajayogamumbai.org";
			  }
		  
			  if ($towards == "Vaitarna Academy General Donation") {
				$cc1 = "vinitsheral123@gmail.com";
			  }
		  
			  if ($towards == "Nirmal Nagari Ganapatipule Corpus Fund" || $towards == "Nirmal Nagari Ganapatipule General Donation") {
				$cc1 = "nirmalnagarigp@sahajayogamumbai.org";
			  }
		  
			  if ($towards == "Aradgaon Rahuri Ashram Corpus Fund" || $towards == "Aradgaon Rahuri Ashram General Donation") {
				$cc1 = "nirmaldhamrahuri@sahajayogamumbai.org";
			  }
	
			  $currDate =  date("d/m/Y");
			  $amountInWords = numberTowords( $amount );
	
			  //define('FPDF_FONTPATH','/var/www/parastella.com/public_html/font/');
			  define('FPDF_FONTPATH','font/');
			  require('fpdf.php');

          $pdf = new FPDF('P','mm','A4');
          ob_start(); 
          $pdf->AddPage();
          $pdf->setleftmargin(12);
          $pdf->setX(12);
          $pdf->setY(10);

          $pdf->SetRightMargin(12);
          /*output the result*/

          /*set font to arial, bold, 14pt*/
          $pdf->SetFont('Times','B',16);

          /*Cell(width , height , text , border , end line , [align] )*/

          $pdf->Line(41, 56, 150, 56);
          $pdf->Line(169,56 , 197, 56);
          $pdf->Line(79, 63, 197, 63);
          $pdf->Line(34, 70, 70, 70);
          $pdf->Line(99, 70, 147, 70);
          $pdf->Line(169, 70, 197, 70);
          $pdf->Line(51, 77, 197, 77);
          $pdf->Line(33, 84, 70, 84);
          $pdf->Line(89, 84, 130, 84);
          $pdf->Line(170, 84, 197, 84);
          $pdf->Line(36, 91, 197, 91);		
          $pdf->Cell(43 ,7,'',0,0);
          $pdf->Cell(75 ,7,'The Life Eternal Trust',0,0);
          $pdf->Image('logo.jpg',160,10,26,26);
          $pdf->Cell(54 ,7,'',0,1);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(3 ,7,'',0,0);
          $pdf->Cell(15 ,6,'Registered under the Bombay Public Trust Act, 1950.Regd.No. E/4884 (B) 1972',0,1);
          $pdf->Cell(25 ,7,'',0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(50,6,'Sahaja Yoga Centre, Unit No.1111, Hubtown Solaris,',0,1);
          $pdf->Cell(27 ,7,'',0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(45,6,'N. S. Phadke Marg, Andheri(E), Mumbai-400 069.',0,1);
          $pdf->Cell(18 ,7,'',0,0);
          $pdf->Cell(50,6,'Tel.: +91 22 2684 3169 Website : www.sahajayogamumbai.org',0,0);
          $pdf->Cell(86 ,7,'',0,0);
          $pdf->SetFont('Times','I',11);
          $pdf->Cell(0 ,5,'Founder',0,1);
          $pdf->Cell(138 ,5,'',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(0 ,7,'H. H. Mataji Shree Nirmala Devi',0,1,'R');
          $pdf->Cell(28 ,3,'',0,1);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(28 ,7,'RECEIPT NO. : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(114 ,7,$receiptNumber,0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(14 ,7,'DATE : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(0 ,7,$currDate,0,1,'R');
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(68 ,7,'RECEIVED WITH THANKS FROM : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(130 ,7,$firstName.' '.$lastName,0,1);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(23 ,7,'ADDRESS :',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(37 ,7,$address,0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(27,7,'MOBILE NO. : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(50 ,7,$contact,0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(18 ,7,'PAN NO. :',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(0 ,7,$pan,0,1,'R');
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(38 ,7,'A SUM OF RUPEES : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(10 ,7,$amountInWords.' ONLY',0,1);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(22 ,7,'PAID VIA : ',0,0);
          $pdf->SetFont('Times','',11);		
          $pdf->Cell(38 ,7,$payInstrument,0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(18 ,7,'DATED : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(41 ,7,$currDate,0,0);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(55 ,7,'TRANSACTION ID : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(0 ,7,$bankTransId,0,1,'R'); 
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(24 ,7,'TOWARDS : ',0,0);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(28 ,7,$towards,0,1);
          $pdf->Cell(10 ,5,'',0,1);
          $pdf->SetFont('Times','B',11);
          $pdf->Cell(40 ,7,'Rs.'.$amount.'/-',1,1);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(30 ,7,'Receipt valid only on realisation of Cheque/Cash.',0,0);
          $pdf->Cell(20 ,7,'',0,1);
          $pdf->SetFont('Times','',11);
          $pdf->Cell(30 ,7,'Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No. TR/4927',0,1);
          $pdf->Cell(35 ,7,'dated 02/08/1976, qualify for deduction under section 80-G vide Certification No.80-G/3100/2008/2008-09. ',0,1);
          $pdf->Cell(30 ,7,'',0,0);
          $pdf->Cell(35 ,7,'This is a computer generated receipt, hence no signature is required.',0,0);
            
          //$pdf->Output();

          // email stuff (change data below)
          $to = $email; 
          $from = "noreply@sahajayogamumbai.org"; 
          $subject = "Payment Receipt"; 
          //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

          // a random hash will be necessary to send mixed content
          $separator = md5(time());

          // carriage return type (we use a PHP end of line constant)
          $eol = PHP_EOL;

          $ccc = "donations@sahajayogamumbai.org";
          // attachment name
          $filename = "paymentReceipt.pdf";

          // encode data (puts attachment in proper format)
          $pdfdoc = $pdf->Output("", "S");
          $attachment = chunk_split(base64_encode($pdfdoc));

          // main header
          $headers  = 'From: '.$from.$eol;
          $headers .= 'Cc: '.$ccc.$eol;
          $headers .= 'Cc: '.$cc1.$eol;
          $headers .= 'Bcc: '.$bcc.$eol;  
          $headers .= "MIME-Version: 1.0".$eol; 
          $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

          // no more headers after this, we start the body! //

          $body = "--".$separator.$eol;
          $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
          $body .= "Thanks for the Donation. Please find attached receipt.".$eol;

          // message
          $body .= "--".$separator.$eol;
          $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
          $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
          $body .= $message.$eol;

          // attachment
          $body .= "--".$separator.$eol;
          $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
          $body .= "Content-Transfer-Encoding: base64".$eol;
          $body .= "Content-Disposition: attachment".$eol.$eol;
          $body .= $attachment.$eol;
          $body .= "--".$separator."--";

          // send message
          mail($to, $subject, $body, $headers);
      ?>
<!DOCTYPE html >
		<html lang="en">
		<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		</head>
		<body>
		<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 550px;border-style: solid;margin-left:250px" >
		<!-- Begin shared CSS values -->
		<style class="shared-css" type="text/css" >
		.t {
			transform-origin: bottom left;
			z-index: 2;
			position: absolute;
			white-space: pre;
			overflow: visible;
			line-height: 1.5;
		}
		@media print {
		  .hidden-print {
			display: none !important;
		  }
		}
		.button {
		  border-radius: 4px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 15px;
		  padding: 14px;
		  width: 200px;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}
		.button span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}
		.button span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}
		.button:hover span {
		  padding-right: 25px;
		}
		.button:hover span:after {
		  opacity: 1;
		  right: 0;
		}
        table, th, td {
			border: 2px solid black;
			padding:8px;
		  }
		  table{
			margin-bottom: 30px;
		  }
		</style>
		<!-- End shared CSS values -->
		<!-- Begin inline CSS -->
		<style type="text/css" >
		#t1_1{left:740px;bottom:380px;letter-spacing:0.16px; word-spacing:0.02px;}
		#t2_1{right:20px;bottom:355px;letter-spacing:-0.09px;word-spacing:-0.01px;}
		#t3_1{left:230px;bottom:473px;letter-spacing:-0.23px;word-spacing:0.02px; font-weight: bold; font-size:30px}
		#t4_1{left:260px;bottom:456px;letter-spacing:-0.08px; }
		#t5_1{left:230px;bottom:435px;letter-spacing:-0.08px;}
		#t6_1{left:150px;bottom:576px;letter-spacing:-0.08px;}
		#t7_1{left:105px;bottom:556px;letter-spacing:-0.08px;}
		#t8_1{left:49px;bottom:300px;letter-spacing:0.12px;word-spacing:0.11px;}
		#t9_1{left:185px;bottom:300px;letter-spacing:0.17px; }
		#ta_1{left:650px;bottom:300px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tb_1{left:725px;bottom:300px;letter-spacing:0.16px; }
		#tc_1{left:49px;bottom:255px;letter-spacing:0.13px;word-spacing:0.01px;}
		#td_1{left:362px;bottom:255px;letter-spacing:0.25px;word-spacing:-0.03px; }
		#te_1{left:49px;bottom:215px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#tf_1{left:190px;bottom:215px;letter-spacing:0.21px; }

		#te_2{left:300px;bottom:215px;letter-spacing:0.15px;}
		#tf_2{left:440px;bottom:215px;letter-spacing:0.17px; }

		#tg_1{left:580px;bottom:215px;letter-spacing:0.15px;}
		#th_1{left:680px;bottom:215px;letter-spacing:0.17px; }

		#ti_1{left:416px;bottom:413px;letter-spacing:0.14px;word-spacing:0.03px;}
		#tj_1{left:650px;bottom:413px;letter-spacing:0.2px; }

		#tj_2{left:555px;bottom:413px;letter-spacing:0.2px; }

		#tk_1{left:49px;bottom:175px;letter-spacing:0.13px;word-spacing:0.01px;}
		#tl_1{left:240px;bottom:175px;letter-spacing:0.13px;word-spacing:0.19px; }

		#tm_1{left:49px;bottom:135px;letter-spacing:0.14px;word-spacing:0.01px;}
		#tn_1{left:260px;bottom:135px;letter-spacing:0.12px;word-spacing:0.22px; }
		#to_1{left:650px;bottom:135px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tp_1{left:725px;bottom:135px;letter-spacing:0.16px; }
		#tq_1{left:49px;bottom:90px;letter-spacing:0.15px;word-spacing:-0.01px;}
		#tr_1{left:160px;bottom:90px;letter-spacing:0.17px; }
		#tr_111{left:160px;bottom:20px; font-weight: bold; letter-spacing:0.17px; }
		#tdd{left:49px;bottom:70px;letter-spacing:0.15px;}
		#taa{left:49px;bottom:253px;letter-spacing:0.17px; }
		#tab{left:390px;bottom:253px;letter-spacing:0.17px; }
		#tac{left:495px;bottom:253px;letter-spacing:0.17px; }
		#tad{right:272px;bottom:253px;letter-spacing:0.17px; }
		#tae{right:40px;bottom:253px;letter-spacing:0.17px;word-spacing:0.04px; }
		#taf{right:111px;bottom:253px;letter-spacing:0.17px; }
		#tag{left:49px;bottom:213px;letter-spacing:0.17px; }
		#tah{left:390px;bottom:213px;letter-spacing:0.17px; }
		#tai{left:495px;bottom:213px;letter-spacing:0.17px; }
		#taj{right:272px;bottom:213px;letter-spacing:0.17px; }
		#tak{right:40px;bottom:213px;letter-spacing:0.17px;word-spacing:0.04px; }
		#tal{right:111px;bottom:213px;letter-spacing:0.17px; }

		#tam{left:49px;bottom:173px;letter-spacing:0.17px; }
		#tan{left:306px;bottom:173px;letter-spacing:0.17px; }
		#tao{right:40px;bottom:173px;letter-spacing:0.17px;word-spacing:0.04px; }
		#tap{right:111px;bottom:173px;letter-spacing:0.17px; }
		
		#taq{left:315px;bottom:133px;letter-spacing:0.17px;word-spacing:0.04px;  }
		#tar{left:315px;bottom:93px;letter-spacing:0.17px;word-spacing:0.04px;  }

		#ts_1{left:49px;bottom:109px;letter-spacing:0.15px;}
		#tt_1{left:155px;bottom:109px;letter-spacing:0.12px;word-spacing:0.07px; }

		#tu_1{left:49px;bottom:109px;letter-spacing:-0.08px;word-spacing:0.35px;}
		#tv_1{left:49px;bottom:68px;letter-spacing:-0.08px;word-spacing:0.01px;}

		#tw_1{left:141px;bottom:-30px;letter-spacing:-0.09px;word-spacing:0.03px;}
		#tw_11{left:110px;bottom:-8px;letter-spacing:-0.09px;word-spacing:0.03px;}
		#tw_12{left:183px;bottom:-8px;letter-spacing:-0.09px;word-spacing:0.03px;}
		#tw_13{left:141px;bottom:-8px;letter-spacing:-0.09px;word-spacing:0.03px;}
		#tw_14{left:183px;bottom:-30px;letter-spacing:-0.09px;word-spacing:0.03px;}
		#tw_2{left:232px;bottom:90px;letter-spacing:-0.09px;word-spacing:0.03px;color: darkgray;}
		#tx_1{right:39px;bottom:126px;letter-spacing:0.13px;border: 1px solid black ;padding:0px 55px 0px 5px;font-weight:bold; font-size:22px}
		#tx_2{left:200px;bottom:293px;letter-spacing:0.13px;padding:5px 50px 5px 5px;font-weight:bold; font-size:18px}
		#ty_1{left:120px;bottom:18px;}
		.s1{font-size:17px;font-family:Calibri-BoldItalic_b;color:#000;}
		.s2{font-size:17px;font-family:TimesNewRoman-Bold_d;color:#000;}
		.s3{font-size:28px;font-family:TimesNewRoman-Bold_d;color:#000;}
		.s4{font-size:18px;font-family:TimesNewRoman-Bold_d;color:#000; font-weight: bold;}
		.s5{font-size:18px;font-family:TimesNewRoman_f;color:#000;}
		.s6{font-size:18px;font-family:TimesNewRoman-Bold_l;color:#000;}
		
		</style>
		<!-- End inline CSS -->
		<!-- Begin embedded font definitions -->
		<style id="fonts1" type="text/css" >
		@font-face {
			font-family: Calibri-BoldItalic_b;
			src: url("fonts/Calibri-BoldItalic_b.woff") format("woff");
		}
		@font-face {
			font-family: TimesNewRoman-Bold_d;
			src: url("fonts/TimesNewRoman-Bold_d.woff") format("woff");
		}
		@font-face {
			font-family: TimesNewRoman-Bold_l;
			src: url("fonts/TimesNewRoman-Bold_l.woff") format("woff");
		}
		@font-face {
			font-family: TimesNewRoman_f;
			src: url("fonts/TimesNewRoman_f.woff") format("woff");
		}
		</style>
		<!-- End embedded font definitions -->
		<!-- Begin page background -->
		<!--<div id="pg1Overlay" style="width:100%; height:50%; position:absolute;margin-bottom:200px;margin-left:200px; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
		<div id="pg1" style="-webkit-user-select: none;"><object width="909" height="1286" data="1/1.svg" type="image/svg+xml" id="pdf1" style="width:909px; height:1286px; -moz-transform:scale(1); z-index: 0;"></object></div>
		--><!-- End page background -->
		<!-- Begin text definitions (Positioned/styled in CSS) -->
		<div id="t1_0" style="margin-left:705px;margin-bottom:603px;margin-top:10px;"><img src="logo.jpg" heigh="130" width="130"/> </div>
        <div id="t1_1" class="t s1">Founder </div>
        <div id="t2_1" class="t s2">H. H. Mataji Shree Nirmala Devi</div>       
		<div id="t3_1" class="t s3">The Life Eternal Trust, Mumbai</div>
		<div id="t4_1" class="t s4">International Sahaja Yoga Seminar</div>
		<div id="t5_1" class="t s4">Nirmal Nagari, Ganpatipule | December 24-26, 2022</div>
		
		<div id="t8_1" class="t s4">RECEIPT NO. : ___________________________________________________</div>
		<div id="t9_1" class="t s5"><?php echo $receiptNumber;?></div>
		<div id="ta_1" class="t s4">DATE : _________________</div>
		<div id="tb_1" class="t s5"><?php echo $currDate;?></div>

		<div id="tc_1" class="t s4">RECEIVED WITH THANKS FROM : ________________________________________________________</div>
		<div id="td_1" class="t s5"><?php echo strtoupper($firstName.' '.$lastName);?></div>

		<div id="te_1" class="t s4">CITY/CENTRE : __________</div>
		<div id="tf_1" class="t s5"><?php echo strtoupper($address);?> </div>
         
		<div id="te_2" class="t s4">MOBILE NO. : ________________</div>
		<div id="tf_2" class="t s5"><?php echo $contact;?></div>
		
		<div id="tg_1" class="t s4">PAN NO. : ______________________</div>
		<div id="th_1" class="t s5"><?php echo $pan;?></div>
		<div id="tk_1" class="t s4">A SUM OF RUPEES : ______________________________________________________________________</div>
        <div id="tl_1" class="t s5"><?php echo numberTowords( $amount );?></div>
		<div id="tm_1" class="t s4">PAID VIA:UPI DATED ______________________________ </div>
		<div id="tn_1" class="t s5"><?php echo $currDate;?></div>
		<div id="to_1" class="t s4" style="margin-left:-120px">TRANSACTION ID : __________________</div>
		<div id="tp_1" class="t s5"><?php echo $trans_id;?></div>
		<div id="tq_1" class="t s4">TOWARDS : ______________________________________________________________________________</div>
		<div id="tr_1" class="t s5"><?php echo strtoupper($towards);?></div>
		<div id="tr_111" class="t" style="margin-bottom:0px">This is computer generated receipt, hence no signature is required.</div>
		</div>
		<center><div style="margin:20px 0px 20px 0px; font-weight:bold;">---------------------------------------------------: For office use only (Not to be filled in by participents):---------------------------------------------------</div></center>
        <center>
		<table>
	    <tr>
		<th scope="col">Sr. N0.</th>
		<th scope="col">Adult Participent's Details</th>
		<th scope="col">Gender</th>
		<th scope="col">Badge Number</th>
		<th scope="col">Receiver's Signature and Mobile Number</th>
	  </tr>
		<?PHP
    for($index = 0;$index<count($adultName);$index++) {
       echo '<tr>';
       //echo '<th scope="row">1</th>';
       echo '<td>'.$index.'</td>';
       echo '<td>'.$adultName[$index].'</td>';
       echo '<td>'.$adultGender[$index].'</td>';
       echo '<td>'.$adultCity[$index].'</td>';
       echo '<td>'.$adultCentre[$index].'</td>';
       echo '</tr>';
    }
    ?>
  </table>

  <table>
	<tr>
	<th scope="col">Sr. N0.</th>
	<th scope="col">Child Participent's Details</th>
	<th scope="col">Gender</th>
	<th scope="col">Badge Number</th>
	<th scope="col">Receiver's Signature and Mobile Number</th>
  </tr>
  <?PHP
    for($i=0;$i<count($yuvaName);$i++) {
       echo '<tr>';
       //echo '<th scope="row">1</th>';
       echo '<td>'.$i.'</td>';
       echo '<td>'.$yuvaName[$i].'</td>';
       echo '<td>'.$yuvaGender[$i].'</td>';
	   echo '<td>'.$yuvaCity[$i].'</td>';
       echo '<td>'.$yuvaCentre[$i].'</td>';
       echo '</tr>';
    }
    ?>
</table>
  </center>

  <p style="margin:100px 0px 50px 50px">(1)Date on Budges issued: ___________December 2022</p>
  <p style="margin:0px 0px 100px 50px">(2)Budges issuer Name and Signature: </p>
  <script>
	function printDiv(divName) {
	
		 window.print();
	}
	</script>
</body>
</html>
