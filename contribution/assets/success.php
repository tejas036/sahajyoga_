<?php

session_start();
require_once('function.php');
$EncryptDecrypt = new EncryptDecrypt();
$query=$_REQUEST['query'];
$decText = $EncryptDecrypt->decrypt($query,$privateValue,$privateKey);
$res_array = explode('&',$decText);
foreach($res_array as $res){
    $a = explode('=',$res);
    if($a[0]=='pgTransId'){
        $pg_trans_id = $a[1];
    }

    if($a[0]=='transId'){
        $trans_id = $a[1];
    }
	
    if($a[0]=='payInstrument'){
        $payInstrument = strtoupper($a[1]);
    }

    if($a[0]=='respCode'){
        $respCode = $a[1];
    }

    if($a[0]=='mtxnId'){
        $mtxnId = $a[1];
    }

    if($a[0]=='amount'){
        $amount = round($a[1]);
    }

    if($a[0]=='firstName'){
        $firstName = strtoupper($a[1]);
    }

    if($a[0]=='lastName'){
        $lastName = strtoupper($a[1]);
    }

    if($a[0]=='contact'){
        $contact = $a[1];
    }

	if($a[0]=='email'){
        $email = $a[1];
    }

    if($a[0]=='receiptNumber'){
        $receiptNumber = $a[1];

		$receiptNumber = preg_replace('/[\x00-\x1F\x7f-\xFF]/', '', $receiptNumber);
    }

    if($a[0]=='udf5'){
        $pan = strtoupper($a[1]);
    }

    if($a[0]=='udf7'){
        $towards = strtoupper($a[1]);
    }
	if($a[0]=='udf8'){
        $address = strtoupper($a[1]);
    }
echo $a[6];
}
$payInstrument="ONLINE";

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
$pdf->Cell(0 ,7,$trans_id,0,1,'R'); 

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
$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";



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
$headers .= 'Bcc: '.$bcc.$eol;  
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "This is a MIME encoded message.".$eol;

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
</head>

<body >

<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 610px;border-style: solid;" >

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
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:738px;bottom:452px;letter-spacing:0.16px; word-spacing:0.02px;}
#t2_1{left:648px;bottom:428px;letter-spacing:-0.09px;word-spacing:-0.01px;}
#t3_1{left:230px;bottom:546px;letter-spacing:-0.23px;word-spacing:0.02px; font-weight: bold; font-size:30px}
#t4_1{left:59px;bottom:526px;letter-spacing:-0.08px; }
#t5_1{left:142px;bottom:506px;letter-spacing:-0.08px;}
#t6_1{left:150px;bottom:486px;letter-spacing:-0.08px;}
#t7_1{left:105px;bottom:466px;letter-spacing:-0.08px;}
#t8_1{left:49px;bottom:373px;letter-spacing:0.12px;word-spacing:0.11px;}
#t9_1{left:190px;bottom:373px;letter-spacing:0.17px; }
#ta_1{right:40px;bottom:373px;letter-spacing:0.08px;word-spacing:0.04px;}
#tb_1{right:70px;bottom:373px;letter-spacing:0.16px; }
#tc_1{left:49px;bottom:333px;letter-spacing:0.13px;word-spacing:0.01px;}
#td_1{right:360px;bottom:333px;letter-spacing:0.25px;word-spacing:-0.03px; }
#te_1{left:49px;bottom:293px;letter-spacing:0.13px;word-spacing:-0.05px;}
#tf_1{left:150px;bottom:293px;letter-spacing:0.21px; }
#tg_1{left:333px;bottom:293px;letter-spacing:0.15px;}
#th_1{left:465px;bottom:293px;letter-spacing:0.17px; }
#ti_1{right:40px;bottom:293px;letter-spacing:0.14px;word-spacing:0.03px;}
#tj_1{right:60px;bottom:293px;letter-spacing:0.2px; }
#tk_1{left:49px;bottom:253px;letter-spacing:0.13px;word-spacing:0.01px;}
#tl_1{left:230px;bottom:253px;letter-spacing:0.13px;word-spacing:0.19px; }
#tm_1{left:49px;bottom:213px;letter-spacing:0.14px;word-spacing:0.01px;}
#tn_1{left:150px;bottom:213px;letter-spacing:0.12px;word-spacing:0.22px; }
#to_1{left:333px;bottom:213px;letter-spacing:0.14px;}
#tp_1{left:415px;bottom:213px;letter-spacing:0.15px; }
#tq_1{right:40px;bottom:213px;letter-spacing:0.15px;word-spacing:-0.01px;}
#tr_1{right:60px;bottom:213px;letter-spacing:0.17px; }
#ts_1{left:49px;bottom:173px;letter-spacing:0.15px;}
#tt_1{left:155px;bottom:173px;letter-spacing:0.12px;word-spacing:0.07px; }
#tu_1{left:49px;bottom:71px;letter-spacing:-0.08px;word-spacing:0.35px;}
#tv_1{left:49px;bottom:52px;letter-spacing:-0.08px;word-spacing:0.01px;}
#tw_1{left:236px;bottom:1px;letter-spacing:-0.09px;word-spacing:0.03px;}
#tx_1{left:49px;bottom:118px;letter-spacing:0.13px;border: 1px solid black ;padding:5px 50px 5px 5px;font-weight:bold; font-size:25px}
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
<div id="t3_1" class="t s3">The Life Eternal Trust</div>
<div id="t4_1" class="t s4">Registered under the Bombay Public Trust Act, 1950.Regd.No.E/4884 (B) 1972</div>
<div id="t5_1" class="t s4">Sahaja Yoga Centre, Unit No.1111, Hubtown Solaris, </div>
<div id="t6_1" class="t s4">N. S. Phadke Marg, Andheri(E), Mumbai-400 069.</div>
<div id="t7_1" class="t s4">Tel.: +91 22 2684 3169 Website : www.sahajayogamumbai.org</div>
<div id="t8_1" class="t s4">RECEIPT NO. : ___________________________________________________</div>
<div id="t9_1" class="t s5"><?php echo $receiptNumber;?> </div>
<div id="ta_1" class="t s4">DATE :  ________________</div>
<div id="tb_1" class="t s5"><?php echo $currDate;?></div>
<div id="tc_1" class="t s4">RECEIVED WITH THANKS FROM : ________________________________________________________</div>
<div id="td_1" class="t s5"><?php echo $firstName.' '.$lastName;?> </div>
<div id="te_1" class="t s4">ADDRESS : ____________________</div>
<div id="tf_1" class="t s5"><?php echo $address;?> </div>
<div id="tg_1" class="t s4">MOBILE NO. :__________________</div>
<div id="th_1" class="t s5"><?php echo $contact;?> </div>
<div id="ti_1" class="t s4">PAN NO. : _________________</div>
<div id="tj_1" class="t s5"><?php echo $pan;?> </div>
<div id="tk_1" class="t s4">A SUM OF RUPEES : ______________________________________________________________________</div>
<div id="tl_1" class="t s5"><?php echo numberTowords( $amount );?> ONLY</div>
<div id="tm_1" class="t s4">PAID VIA : ___________________ </div>
<div id="tn_1" class="t s5"><?php echo $payInstrument;?> </div>
<div id="to_1" class="t s4">DATED : ____________</div>
<div id="tp_1" class="t s5"><?php echo $currDate;?> </div>
<div id="tq_1" class="t s4">TRANSACTION ID: __________________</div>
<div id="tr_1" class="t s5"><?php echo $trans_id;?></div>
<div id="ts_1" class="t s4">TOWARDS : ______________________________________________________________________________</div>
<div id="tt_1" class="t s5"><?php echo $towards;?> </div>

<div id="tu_1" class="t s2"><br/>Receipt valid only on realisation of Cheque/Cash.</br>Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No. TR/4927 </div>
<div id="tv_1" class="t s2">dated 02/08/1976, qualify for deduction under section 80-G vide Certification No.80-G/3100/2008/2008-09. </div>
<div id="tw_1" class="t s2">This is a computer generated receipt, hence no signature is required.</div>
<div id="tx_1" class="t s6">&#x20B9; <?php  echo $amount;?>/-</div>

<div id="ty_1" class="t s4"> </div>


<!-- End text definitions -->
 

</div>

<div>
<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Print" />

<a href = "http://www.sahajayogamumbai.org/contribution" ><button type="button" class = "button hidden-print">Back to Home</button></a>
</div>



<script>

function printDiv(divName) {
     

     window.print();

     
}

</script>	
</body>
</html>


