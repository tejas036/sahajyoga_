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
        $payInstrument = $a[1];
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
        $firstName = $a[1];
    }

    if($a[0]=='lastName'){
        $lastName = $a[1];
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
        $pan = $a[1];
    }

    if($a[0]=='udf7'){
        $towards = $a[1];
    }
	if($a[0]=='udf8'){
        $address = $a[1];
    }
echo $a[6];
}


if ($towards == "The Life Eternal Trust General Donation") {
  $bcc = "accounts.ho@sahajayogamumbai.org";
}
if ($towards == "Sahaja Yoga Centre Mumbai General Donation") {
  $bcc = "accounts.ho@sahajayogamumbai.org";
}
if ($towards == "International Sahaja Yoga Reasearch and Health Centre General Donation") {
  $bcc = "accounts@sahajahealthcentre.com";
}
if ($towards == "Nirmal Nagari Ganapatipule General Donation") {
  $bcc = "nirmalnagarigp@sahajayogamumbai.org";
}
if ($towards == "Vaitarna Academy General Donation") {
  $bcc = "accounts@pksacademy.com";
}
if ($towards == "Kothrud Pune Ashram General Donation") {
  $bcc = "kothrudashram@sahajayogamumbai.org";
}
if ($towards == "Aradgaon Rahuri Ashram General Donation") {
  $bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
}
if ($towards == "The Life Eternal Trust Corpus Fund") {
  $bcc = "accounts.ho@sahajayogamumbai.org";
}
if ($towards == "Sahaja Yoga Centre Mumbai Corpus Fund") {
  $bcc = "accounts.ho@sahajayogamumbai.org";
}
if ($towards == "International Sahaja Yoga Reasearch and Health Centre Corpus Fund") {
  $bcc = "accounts@sahajahealthcentre.com";
}
if ($towards == "Nirmal Nagari Ganapatipule Corpus Fund") {
  $bcc = "nirmalnagarigp@sahajayogamumbai.org";
}
if ($towards == "Vaitarna Academy Corpus Fund") {
  $bcc = "accounts@pksacademy.com";
}
if ($towards == "Kothrud Pune Ashram Corpus Fund") {
  $bcc = "kothrudashram@sahajayogamumbai.org";
}
if ($towards == "Aradgaon Rahuri Ashram Corpus Fund") {
  $bcc = "nirmaldhamrahuri@sahajayogamumbai.org";
}

$ccc = "aviraljeevan@gmail.com";

$currDate =  date("d M Y");
$amountInWords = numberTowords( $amount );

















define('FPDF_FONTPATH','/var/www/parastella.com/public_html/font/');
require('fpdf.php');




$pdf = new FPDF('P','mm','A4');
ob_start(); 
$pdf->AddPage();
$pdf->setleftmargin(20);
$pdf->setX(20);
$pdf->setY(10);
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Times','B',16);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Line(42, 61, 100, 61);
$pdf->Line(173,61 , 200, 61);
$pdf->Line(65, 69, 200, 69);
$pdf->Line(30, 76, 200, 76);
$pdf->Line(42, 83, 94, 83);
$pdf->Line(112, 83, 200, 83);
$pdf->Line(65, 90, 200, 90);
$pdf->Line(51, 97, 80, 97);
$pdf->Line(96, 97, 125, 97);
$pdf->Line(163, 97, 200, 97);
$pdf->Line(35, 104, 200, 104);

$pdf->Cell(48 ,7,'',0,0);
$pdf->Cell(73 ,7,'The Life Eternal Trust',0,0);
$pdf->Image('logo.jpg',172,6,28,28);
$pdf->Cell(59 ,7,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(8 ,7,'',0,0);
$pdf->Cell(20 ,6,'Registered under the Bombay Public Trust Act, 1950.Regd.No. E/4884 (B) 1972',0,1);

$pdf->Cell(30 ,7,'',0,0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(50,6,'Correspondence Add: Sahaja Yoga Centre, Unit No.1111, Hubtown Solaris,',0,1);

$pdf->Cell(20 ,7,'',0,0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(50,6,'N. S. Phadke Marg, Andheri(E), Mumbai-400 069.',0,1);

$pdf->Cell(28 ,7,'',0,0);
 
$pdf->Cell(50,6,'Tel.- +91 22 26843169. Website : www.sahajayogamumbai.org',0,0);

$pdf->Cell(80 ,7,'',0,0);
$pdf->SetFont('Times','I',10);
$pdf->Cell(171 ,7,'Founder',0,1);

$pdf->Cell(134 ,7,'',0,0);
$pdf->SetFont('Times','B',10);
$pdf->Cell(171 ,7,'H. H. Mataji Shree Nirmala Devi',0,1);

$pdf->Cell(28 ,7,'',0,1);

$pdf->SetFont('Times','B',10);
$pdf->Cell(22 ,7,'Receipt No.: ',0,0);
$pdf->Cell(120 ,7,$receiptNumber,0,0);
$pdf->Cell(10 ,7,'Date: ',0,0);
$pdf->Cell(34 ,7,$currDate,0,1);

$pdf->Cell(45 ,7,'Received with thanks from ',0,0);
$pdf->Cell(130 ,7,$firstName.' '.$lastName,0,1);
$pdf->Cell(10 ,7,'Address :',0,0);
$pdf->Cell(34 ,7,$address,0,0);

$pdf->Cell(20 ,7,'',0,1);
$pdf->Cell(24,7,'Mobile No. : ',0,0);
$pdf->Cell(50 ,7,$contact,0,0);
$pdf->Cell(18 ,7,'PAN No. :',0,0);
$pdf->Cell(34 ,7,$pan,0,1);


$pdf->SetFont('Times','B',10);
$pdf->Cell(45 ,7,'A sum of Rupees (in words): ',0,0);
$pdf->Cell(10 ,7,$amountInWords.' Only.',0,1);
$pdf->Cell(30 ,7,'Mode of Payment : ',0,0);
$pdf->Cell(35 ,7,$payInstrument,0,0);
$pdf->Cell(12 ,7,'Dated: ',0,0);
$pdf->Cell(40 ,7,$currDate,0,0);
$pdf->Cell(25 ,7,'Transaction Id: ',0,0);
$pdf->Cell(10 ,7,$trans_id,0,1);

$pdf->Cell(28 ,7,'Towards  '.$towards,0,1);
$pdf->Cell(10 ,5,'',0,1);

$pdf->Cell(80 ,7,'Rs. '.$amount.'/-',1,1);

$pdf->Cell(20 ,7,'',0,1);

$pdf->Cell(30 ,7,'Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No. TR/4927',0,1);
$pdf->Cell(35 ,7,'dated 02/08/1976, qualify for deduction under section 80-G vide Certification No. 80-G/3100/2008/2008-09.',0,1);
$pdf->Cell(30 ,7,'',0,0);
$pdf->Cell(35 ,7,'This is a computer generated receipt, hence no signature required.',0,0);


	

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

$bcc .= ";donations@sahajayogamumbai.org".$eol;
$ccc .= ";support@dexpertsystems.com";
// attachment name
$filename = "paymentReceipt.pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers  = "Bcc: ".$ccc.$eol; 
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

#t1_1{left:738px;bottom:462px;letter-spacing:0.16px; word-spacing:0.02px;}
#t2_1{left:648px;bottom:438px;letter-spacing:-0.09px;word-spacing:-0.01px;}
#t3_1{left:224px;bottom:566px;letter-spacing:-0.23px;word-spacing:0.02px; font-weight: bold;}
#t4_1{left:59px;bottom:546px;letter-spacing:-0.08px; text-decoration: underline}
#t5_1{left:80px;bottom:526px;letter-spacing:-0.08px;}
#t6_1{left:150px;bottom:506px;letter-spacing:-0.08px;}
#t7_1{left:105px;bottom:486px;letter-spacing:-0.08px;}
#t8_1{left:49px;bottom:373px;letter-spacing:0.12px;word-spacing:0.11px;}
#t9_1{left:190px;bottom:373px;letter-spacing:0.17px; text-decoration: underline}
#ta_1{left:619px;bottom:373px;letter-spacing:0.08px;word-spacing:0.04px;}
#tb_1{left:671px;bottom:373px;letter-spacing:0.16px; text-decoration: underline }
#tc_1{left:49px;bottom:333px;letter-spacing:0.13px;word-spacing:0.01px;}
#td_1{left:360px;bottom:333px;letter-spacing:0.25px;word-spacing:-0.03px; text-decoration: underline}
#te_1{left:49px;bottom:293px;letter-spacing:0.13px;word-spacing:-0.05px;}
#tf_1{left:150px;bottom:293px;letter-spacing:0.21px; text-decoration: underline}
#tg_1{left:333px;bottom:293px;letter-spacing:0.15px;}
#th_1{left:455px;bottom:293px;letter-spacing:0.17px; text-decoration: underline}
#ti_1{left:600px;bottom:293px;letter-spacing:0.14px;word-spacing:0.03px;}
#tj_1{left:690px;bottom:293px;letter-spacing:0.2px; text-decoration: underline}
#tk_1{left:49px;bottom:253px;letter-spacing:0.13px;word-spacing:0.01px;}
#tl_1{left:198px;bottom:253px;letter-spacing:0.13px;word-spacing:0.19px; text-decoration: underline}
#tm_1{left:49px;bottom:213px;letter-spacing:0.14px;word-spacing:0.01px;}
#tn_1{left:203px;bottom:213px;letter-spacing:0.12px;word-spacing:0.22px; text-decoration: underline}
#to_1{left:333px;bottom:213px;letter-spacing:0.14px;}
#tp_1{left:400px;bottom:213px;letter-spacing:0.15px; text-decoration: underline}
#tq_1{left:522px;bottom:213px;letter-spacing:0.15px;word-spacing:-0.01px;}
#tr_1{left:654px;bottom:213px;letter-spacing:0.17px; text-decoration: underline}
#ts_1{left:49px;bottom:173px;letter-spacing:0.15px;}
#tt_1{left:132px;bottom:173px;letter-spacing:0.12px;word-spacing:0.07px; text-decoration: underline}
#tu_1{left:49px;bottom:79px;letter-spacing:-0.08px;word-spacing:0.35px;}
#tv_1{left:49px;bottom:59px;letter-spacing:-0.08px;word-spacing:0.01px;}
#tw_1{left:236px;bottom:10px;letter-spacing:-0.09px;word-spacing:0.03px;}
#tx_1{left:49px;bottom:118px;letter-spacing:0.13px;border: 1px solid black ;padding:5px 5px 5px 5px;}
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
<div id="t5_1" class="t s4">Correspondence Add: Sahaja Yoga Centre, Unit No.1111, Hubtown Solaris, </div>
<div id="t6_1" class="t s4">N. S. Phadke Marg, Andheri(E), Mumbai-400 069.</div>
<div id="t7_1" class="t s4">Tel.: +91 22 2684 3169. Website : www.sahajayogamumbai.org</div>
<div id="t8_1" class="t s4">RECEIPT NO. :</div>
<div id="t9_1" class="t s5"><?php echo $receiptNumber;?> </div>
<div id="ta_1" class="t s4">DATE : </div>
<div id="tb_1" class="t s5"><?php echo date("d M Y");?></div>
<div id="tc_1" class="t s4">RECEIVED WITH THANKS FROM : </div>
<div id="td_1" class="t s5"><?php echo $firstName.' '.$lastName;?> </div>
<div id="te_1" class="t s4">ADDRESS :</div>
<div id="tf_1" class="t s5"><?php echo $address;?> </div>
<div id="tg_1" class="t s4">MOBILE NO. :</div>
<div id="th_1" class="t s5"><?php echo $contact;?> </div>
<div id="ti_1" class="t s4">PAN NO. :</div>
<div id="tj_1" class="t s5"><?php echo $pan;?> </div>
<div id="tk_1" class="t s4">A SUM OF RUPEES : </div>
<div id="tl_1" class="t s5"><?php echo numberTowords( $amount );?> ONLY</div>
<div id="tm_1" class="t s4">MODE OF PAYMENT : </div>
<div id="tn_1" class="t s5"><?php echo $payInstrument;?> </div>
<div id="to_1" class="t s4">DATED : </div>
<div id="tp_1" class="t s5"><?php echo date("d M Y");?> </div>
<div id="tq_1" class="t s4">TRANSACTION ID:</div>
<div id="tr_1" class="t s5"><?php echo $trans_id;?></div>
<div id="ts_1" class="t s4">TOWARDS : </div>
<div id="tt_1" class="t s5"><?php echo $towards;?> </div>
<div id="tu_1" class="t s2">Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No.TR/ </div>
<div id="tv_1" class="t s2">4927 dated 02/08/1976, qualify for deduction under section 80-G vide Certification No.80-G/3100/2008/2008-09. </div>
<div id="tw_1" class="t s2">This is a computer generated receipt, hence no signature required.</div>
<div id="tx_1" class="t s6">&#x20B9; <?php  echo $amount;?>/-</div>
<div id="ty_1" class="t s4"> </div>

<!-- End text definitions -->


</div>

<div>
<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Print" />

<a href = "http://www.parastella.com/" ><button type="button" class = "button hidden-print">Back to Home</button></a>
</div>



<script>

function printDiv(divName) {
     

     window.print();

     
}

</script>
</body>
</html>


