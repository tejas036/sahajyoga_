
<?php 

$ID =  $_GET['id'] ;

include_once 'dbConnection.php';

	$sql = "SELECT * from transactions WHERE  id = '".$ID."'";
				
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			
			$receiptNumber = $row["receiptNumber"];
			//$currDate = $row["Transaction_start_time"];
			$firstName = $row["Fname"];
			$lastName = $row["Lname"];
			$address = $row["Address"];
			$pin = $row["Pin"];
			$contact = $row["Mobile"];
			$pan = $row["PAN"];
			$pass = $row["Passport"];
			$country = $row["Country"];
			$amount = $row["Amount"]; 
			//$payInstrument = $row["Payment_mode"];
			$currDate1 = $row["Transaction_start_time"];
			$trans_id = $row["Transaction_Number"];
			$payInstrument = $row["Payment_mode"];
			$towards = $row['Towards'];
			$Who_im = $row["Who_im"];

			$FoodFromDate1 = $row["FoodFromDate"];
			$FoodToDate1 = $row["FoodToDate"];
			$StayFromDate1 = $row["StayFromDate"];
			$StayToDate1 = $row["StayToDate"];
			$FoodTotal = $row["FoodTotal"];
			$StayTotal = $row["StayTotal"];
			$OtherChargestext = $row["OtherChargestext"];
			$OtherCharges = $row["OtherCharges"];

		}
	}
	

	$date1=date_create($FoodFromDate1);
	$FoodFromDate = date_format($date1,"d/m/Y");

	
	$date2=date_create($FoodToDate1);
	$FoodToDate = date_format($date2,"d/m/Y");


	$date3=date_create($StayFromDate1);
	$StayFromDate = date_format($date3,"d/m/Y");

	
	$date4=date_create($StayToDate1);
	$StayToDate = date_format($date4,"d/m/Y");



	$date=date_create($currDate1);
	$currDate = date_format($date,"d/m/Y");
//$amountInWords = numberTowords( $amount );

$num =  $amount;
function numberTowords($num)
{
  /**
   * Created by PhpStorm.
   * User: sakthikarthi
   * Date: 9/22/14
   * Time: 11:26 AM
   * Converting Currency Numbers to words currency format
   */
$number = $num;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'ONE', '2' => 'TWO',
    '3' => 'THREE', '4' => 'FOUR', '5' => 'FIVE', '6' => 'SIX',
    '7' => 'SEVEN', '8' => 'EIGHT', '9' => 'NINE',
    '10' => 'TEN', '11' => 'ELEVEN', '12' => 'TWELE',
    '13' => 'THIRTEEN', '14' => 'FOURTEEN',
    '15' => 'FIFTEEN', '16' => 'SIXTEEN', '17' => 'SEVENTEEN',
    '18' => 'EIGHTEEN', '19' =>'NINETEEN', '20' => 'TWENTY',
    '30' => 'THIRTY', '40' => 'FOURTY', '50' => 'FIFTY',
    '60' => 'SIXTY', '70' => 'SEVENTY',
    '80' => 'EIGHTY', '90' => 'NINETY');
   $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' AND ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return $result ;
  

}
// if($Who_im == 'Donation'){
	if($Who_im != 'Contribution'){
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
<div id="tl_1" class="t s5"><?php echo numberTowords("$num");?> ONLY</div>
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
<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Download" />
<br/>
<div  class = "hidden-print" > <b>Donation Receipt will be sent to the email submitted in the form. Also check the junk folder in case it is not seen in Inbox. </b> </div>
<br/>
<a href = "result.php" ><button type="button" class = "button hidden-print">Back</button></a>
</div>


<?php
}else if($Who_im == 'Contribution'){
?>
<!DOCTYPE html >
		<html lang="en">
		<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta charset="utf-8" />
		</head>
		<body >
		<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 770px;border-style: solid;" >
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
		#t1_1{left:738px;bottom:612px;letter-spacing:0.16px; word-spacing:0.02px;}
		#t2_1{right:20px;bottom:588px;letter-spacing:-0.09px;word-spacing:-0.01px;}
		#t3_1{left:230px;bottom:706px;letter-spacing:-0.23px;word-spacing:0.02px; font-weight: bold; font-size:30px}
		#t4_1{left:59px;bottom:686px;letter-spacing:-0.08px; }
		#t5_1{left:142px;bottom:666px;letter-spacing:-0.08px;}
		#t6_1{left:150px;bottom:646px;letter-spacing:-0.08px;}
		#t7_1{left:105px;bottom:626px;letter-spacing:-0.08px;}
		#t8_1{left:49px;bottom:533px;letter-spacing:0.12px;word-spacing:0.11px;}
		#t9_1{left:190px;bottom:533px;letter-spacing:0.17px; }
		#ta_1{right:42px;bottom:533px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tb_1{right:60px;bottom:533px;letter-spacing:0.16px; }
		#tc_1{left:49px;bottom:493px;letter-spacing:0.13px;word-spacing:0.01px;}
		#td_1{right:420px;bottom:493px;letter-spacing:0.25px;word-spacing:-0.03px; }
		#te_1{left:49px;bottom:453px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#tf_1{left:115px;bottom:453px;letter-spacing:0.21px; }

		#te_2{left:414px;bottom:453px;letter-spacing:0.15px;}
		#tf_2{left:524px;bottom:453px;letter-spacing:0.17px; }

		#tg_1{left:49px;bottom:413px;letter-spacing:0.15px;}
		#th_1{left:180px;bottom:413px;letter-spacing:0.17px; }

		#ti_1{left:416px;bottom:413px;letter-spacing:0.14px;word-spacing:0.03px;}
		#tj_1{right:152px;bottom:413px;letter-spacing:0.2px; }

		#tj_2{right:245px;bottom:413px;letter-spacing:0.2px; }

		#tk_1{left:49px;bottom:373px;letter-spacing:0.13px;word-spacing:0.01px;}
		#tl_1{left:230px;bottom:373px;letter-spacing:0.13px;word-spacing:0.19px; }

		#tm_1{left:49px;bottom:333px;letter-spacing:0.14px;word-spacing:0.01px;}
		#tn_1{left:250px;bottom:333px;letter-spacing:0.12px;word-spacing:0.22px; }
		#to_1{right:40px;bottom:333px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tp_1{right:60px;bottom:333px;letter-spacing:0.16px; }
		
		#tq_1{left:49px;bottom:293px;letter-spacing:0.15px;word-spacing:-0.01px;}
		#tr_1{left:160px;bottom:293px;letter-spacing:0.17px; }

		#tdd{left:49px;bottom:70px;letter-spacing:0.15px;}

		#taa{left:49px;bottom:253px;letter-spacing:0.17px; }
		#tab{right:430px;bottom:253px;letter-spacing:0.17px; }
		#tac{left:495px;bottom:253px;letter-spacing:0.17px; }
		#tad{right:272px;bottom:253px;letter-spacing:0.17px; }
		#tae{right:40px;bottom:253px;letter-spacing:0.17px;word-spacing:0.04px; }
		#taf{right:111px;bottom:253px;letter-spacing:0.17px; }

		#tag{left:49px;bottom:213px;letter-spacing:0.17px; }
		#tah{right:430px;bottom:213px;letter-spacing:0.17px; }
		#tai{left:495px;bottom:213px;letter-spacing:0.17px; }
		#taj{right:272px;bottom:213px;letter-spacing:0.17px; }
		#tak{right:40px;bottom:213px;letter-spacing:0.17px;word-spacing:0.04px; }
		#tal{right:111px;bottom:213px;letter-spacing:0.17px; }

		#tam{left:49px;bottom:173px;letter-spacing:0.17px; }
		#tan{left:283px;bottom:173px;letter-spacing:0.17px; }
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
		<div id="t2_1" class="t s2">Her Holiness Mataji Shree Nirmala Devi</div>
		<div id="t3_1" class="t s3">The Life Eternal Trust</div>
		<div id="t4_1" class="t s4">Registered under the Bombay Public Trust Act, 1950.Regd.No.E/4884 (B) 1972</div>
		<div id="t5_1" class="t s4">Sahaja Yoga Centre, Unit No.1111, Hubtown Solaris, </div>
		<div id="t6_1" class="t s4">N. S. Phadke Marg, Vijay Nagar, Andheri(E), Mumbai-400 069.</div>
		<div id="t7_1" class="t s4">Tel.: +91 22 2684 3169 Website : www.sahajayogamumbai.org</div>
		<div id="t8_1" class="t s4">RECEIPT NO. : ___________________________________________________</div>
		<div id="t9_1" class="t s5"><?php echo $receiptNumber;?> </div>
		<div id="ta_1" class="t s4">DATE : _________________</div>
		<div id="tb_1" class="t s5"><?php echo $currDate;?></div>

		<div id="tc_1" class="t s4">RECEIVED WITH THANKS FROM : ________________________________________________________</div>
		<div id="td_1" class="t s5"><?php echo strtoupper($firstName.' '.$lastName);?> </div>

		<div id="te_1" class="t s4">CITY : _________________________________</div>
		<div id="tf_1" class="t s5"><?php echo strtoupper($address);?> </div>

		<div id="te_2" class="t s4">COUNTRY : ______________________________________</div>
		<div id="tf_2" class="t s5"><?php echo strtoupper($country);?> </div>

		<div id="tg_1" class="t s4">MOBILE NO. : __________________________</div>
		<div id="th_1" class="t s5"><?php echo $contact;?> </div>
<?php 
if($pan != null ){
	?>
		<div id="ti_1" class="t s4">PAN NO./AADHAAR NO. : _________________________</div>
		<div id="tj_1" class="t s5"><?php echo $pan;?> </div>

<?php }
else{
	?>
		<div id="ti_1" class="t s4">PASSPORT NO. : __________________________________</div>
		<div id="tj_2" class="t s5"><?php echo $pass;?> </div>
		<?php 
}
	?>

		<div id="tk_1" class="t s4">A SUM OF RUPEES : ______________________________________________________________________</div>
		<div id="tl_1" class="t s5"><?php echo numberTowords( $amount );?> ONLY</div>

		<div id="tm_1" class="t s4">MODE OF PAYMENT : ____________________________________________ </div>
		<div id="tn_1" class="t s5"><?php echo $payInstrument;?> </div>
		<div id="to_1" class="t s4">DATED : ________________</div>
		<div id="tp_1" class="t s5"><?php echo $currDate;?> </div>

		<!--<div id="tq_1" class="t s4">TRANSACTION ID: __________________</div>
		<div id="tr_1" class="t s5"><?php echo $trans_id;?></div>-->

		<!-- <div id="tq_1" class="t s4">TOWARDS</div> -->
		<div id="tq_1" class="t s4">TOWARDS : ______________________________________________________________________________</div>
		<div id="tr_1" class="t s5"><?php echo strtoupper($towards);?> </div>
		
		<div id="taa" class="t s4">FOOD CONTRIBUTION            (FROM : ____________</div>
		<div id="tab" class="t s5"><?php echo $FoodFromDate;?> </div>
		<div id="tac" class="t s4">TO : ____________)</div>
		<div id="tad" class="t s5"><?php echo $FoodToDate;?> </div>
		<div id="tae" class="t s4">RS : ___________________</div>
		<div id="taf" class="t s5"><?php echo $FoodTotal;?>/- </div>

		<div id="tag" class="t s4">STAY CONTRIBUTION             (FROM : ____________</div>
		<div id="tah" class="t s5"><?php echo $StayFromDate;?> </div>
		<div id="tai" class="t s4">TO : ____________)</div>
		<div id="taj" class="t s5"><?php echo $StayToDate;?> </div>
		<div id="tak" class="t s4">RS : ___________________</div>
		<div id="tal" class="t s5"><?php echo $StayTotal;?>/- </div>

		<div id="tam" class="t s4">OTHER CONTRIBUTION : ________________________________________</div>
		<div id="tan" class="t s5"><?php echo $OtherChargestext;?></div>
		<div id="tao" class="t s4">RS : ___________________</div>
		<div id="tap" class="t s5"><?php echo $OtherCharges;?>/- </div>
		<div id="tx_1" class="t s6">&#x20B9; <?php  echo $amount;?>/-</div>

<!-- 
		<div id="taq" class="t s4">At<Project Name></div>
		<div id="tar" class="t s4">e.g. Kothrud, Pune Ashram</div> -->

		<!--<div id="tu_1" class="t s2"><br/>Receipt valid only on realisation of Cheque/Cash.</br>Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No. TR/4927 </div>
		<div id="tv_1" class="t s2">dated 02/08/1976, qualify for deduction under section 80-G vide Certification No.80-G/3100/2008/2008-09. </div>-->

		<div id="tw_2" class="t s2">This is a computer generated receipt, hence no signature is required.</div>
		<div id="tdd" class="t s4">__________________________________________________________________________________________</div>

		<?php
			if($towards == "International Sahaja Yoga Research & Health Centre, CBD Belapur"){
			?>
				<div id="tw_1" class="t s2">
					<label>
Plot No: 1, Sector 8, H.H.Shri Nirmala Devi Marg, CBD-Belapur Navi Mumbai - 400614, India. 
			  Tel: +91 22 27571341/27576922 Mobile: +91 - 7738111184.
					</label>
				</div>
			<?php
			}
		?>

		<?php
			if($towards == "Shri P.K. Salve Kala Pratishthan, Vaitarna"){
			?>
				<div id="tw_13" class="t s2">
Near Vaitarna Dam, Village Belvad, at Post Vaitarna, Taluka: - Shahpur, District: - Thane,
			  		Pincode: -421304, Maharashtra, India
				</div>
			<?php
			}
		?>

		<?php
			if($towards == "Nirmal Nagari, Ganapatipule"){
			?>
				<div id="tw_1" class="t s2">
Nirmal Nagari, Arrey Warrey Road, Malgund-Bhailadi, Malgund Ratnagiri, Maharashtra 415615 
			  		Tel: +91 2357 235662, +91 2357 235663

				</div>
			<?php
			}
		?>

		<?php
			if($towards == "Kothrud, Pune Ashram"){
			?>
				<div id="tw_11" class="t s2">
Plot No 79, Survey No 98, Bhusari Colony, Kothrud, Near chandani chowk, Pune, Maharashtra – 411038. 
			  		  Tel: +91 20 25283830 Mobile: +91 7410077781
				</div>
			<?php
			}
		?>

		<?php
			if($towards == "Aradgaon, Rahuri Ashram"){
			?>
				<div id="tw_14" class="t s2">
Nirmal Dham Ashram, Aradgaon, Taluka-Rahuri, District-Ahmednagar, Maharashtra 
			  Mobile: +91 9420341696, 9890320400

				</div>
			<?php
			}
		?>


		<!-- <div id="tx_2" class="t s6">at <?php  echo $towards;?></div> -->

		<div id="ty_1" class="t s4"> </div>


		<!-- End text definitions -->
		 

		</div>

		<div>
		<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Download" />
		<a href = "result.php" ><button type="button" class = "button hidden-print">Back</button></a>
		</div>

		<?php 
		} 
?>


<script>

function printDiv(divName) {

     window.print();
}

</script>
	
</body>
</html>