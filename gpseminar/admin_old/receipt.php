
<?php 

$ID = $_GET['id'] ;

include_once 'dbConnection.php';

	$sql = "SELECT * from transactions WHERE  id = '".$ID."'";
				
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			
			$receiptNumber = $row["receiptNumber"];
			//$currDate = $row["Transaction_start_time"];
			$firstName = strtoupper($row["Fname"]);
			$lastName = strtoupper($row["Lname"]);
			$address = strtoupper($row["Address"]);
			$pin = $row["Pin"];
			$contact = $row["Mobile"];
			$pan = strtoupper($row["PAN"]);
			$amount = $row["Amount"];
			$payInstrument = $row["Payment_mode"];
			$currDate1 = $row["Transaction_start_time"];
			$trans_id = $row["Transaction_Number"];
			//$payInstrument = strtoupper('online');
			$towards = strtoupper($row['Towards']);
			
		}
	}
	
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
<div id="tx_1" class="t s6">Rs. <?php  echo $amount;?>/-</div>

<div id="ty_1" class="t s4"> </div>


<!-- End text definitions -->
 

</div>

<div>
<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Download" />
<br/>
<div  class = "hidden-print" > <b>Donation Receipt will be sent to the email submitted in the form. Also check the junk folder in case it is not seen in Inbox. </b> </div>
<br/>

<?php
session_start();
$admin = $_SESSION["ReferenceNo"]; 

if(!isset($_SESSION['username'])){ 
?>
      <a href = "result.php" ><button type="button" class = "button hidden-print">Back</button></a>
	  <?php
}
else{
	?>
     <button type="button" onclick = "window.close()" class = "button hidden-print">Close</button>
	  <?php
}
?>

</div>
<script>
function printDiv(divName) {
     window.print(); 
}
</script>	
</body>
</html>