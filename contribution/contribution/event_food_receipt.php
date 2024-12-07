<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);
require_once('function.php');

    $transID = $_POST['ReferenceNo']; 
    $paymentMode = $_POST['Payment_Mode']; 
    $transactionNumber = $_POST['Unique_Ref_Number']; 

    // $transID = 442775;
    // $paymentMode = 'UPI_ICICI';
    // $transactionNumber = '221122136853252';
    
    
  include_once 'dbConnection.php';       

  $sql = "update event_food set payment_mode = '$paymentMode', transaction_Number='$transactionNumber', status = 'Success' where transaction_id = '$transID'";

  if($conn->query($sql)) {

    // echo 'Updated';

  }

  $sql1 = "select * from event_food where transaction_id = '$transID'";
  $result1 = $conn->query($sql1);
 

  while($row1 = $result1->fetch_assoc()) {
     $id = $row1['id'];
      $fName = $row1['fname'];
      $lName = $row1['lname'];

      $mobile = $row1['mobile'];
      $email = $row1['email'];
      $pan = $row1['pan'];
      $aadhar = $row1['aadhar'];
      $pin = $row1['pin'];
      $partName = $row1['part_name'];
      $partGender = $row1['part_gender'];
      $partCategory = $row1['category'];
      $partCity = $row1['part_city'];
      $amount = $row1['amount'];
      $status = $row1['status'];
      $transDate = $row1['transaction_start_time'];
     $receiptNumber = $row1['receiptNumber'];
     $paymentMode = $row1['payment_mode'];
     $transNumber = $row1['transaction_Number'];

     $towards = $row1['towards'];
     $toDateFood = $row1['todatefood'];
	 $fromDateFood = $row1['fromdatefood'];

	 $toDateStay = $row1['todatestay'];
	 $fromDateStay = $row1['fromdatestay'];

	 $food = $row1['food'];
	 $stay = $row1['stay'];


	 $time = $row1['time'];

  }

  $sql2 = "select Count(*) from event_food where status ='Success'";
  $result2 = $conn->query($sql2);
  $recieptCount = $result2->fetch_assoc()['Count(*)']; 

//   echo 'Count '.$recieptCount ;
  $date = date("Y-m-d");
 

  $receiptNumber = 'GP/' . substr($date, 8, 2) . substr($date, 5, 2) . substr($date, 0, 4) .'-24/'. str_pad($recieptCount, 5, '0', STR_PAD_LEFT);
//   echo 'receiptNumber'.$receiptNumber;

  $sql3 = "update event_food set receiptNumber = '$receiptNumber' where id = '$id'";
  if($conn->query($sql3)) {
    // echo '<br>recipt updated<br>';
  }

	
   $tdate=date_create($transDate,timezone_open("Asia/Kolkata"));
   $tjDate =  date_format($tdate,"jS M Y");

//    $fromDateFood=date_create($fromDateFood,timezone_open("Asia/Kolkata"));
//    $toDateFood=date_create($toDateFood,timezone_open("Asia/Kolkata"));

//    $fromDateStay=date_create($fromDateStay,timezone_open("Asia/Kolkata"));
//    $toDateStay=date_create($toDateStay,timezone_open("Asia/Kolkata"));


if($toDateFood == '')
{
   $fromDateFood= '-';
   $toDateFood= '-';
}
else
{
   $fromDateFood=date_create($fromDateFood,timezone_open("Asia/Kolkata"));
   $toDateFood=date_create($toDateFood,timezone_open("Asia/Kolkata"));
   $toDateFood=date_format($toDateFood,"jS M Y");
   $fromDateFood=date_format($fromDateFood,"jS M Y");
}

if($toDateStay == '')
{
$fromDateStay= '-';
$toDateStay= '-';
}
else
{
   $fromDateStay=date_create($fromDateStay,timezone_open("Asia/Kolkata"));
   $toDateStay=date_create($toDateStay,timezone_open("Asia/Kolkata"));
   $fromDateStay=date_format($fromDateStay,"jS M Y");
   $toDateStay=date_format($toDateStay,"jS M Y");
}

   
    $num = $amount;
  

    $from = "noreply@thelifeeternaltrustmumbai.org";
    $to = $email;
            
    $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com';
    $ccc = 'seminar.payments@thelifeeternaltrustmumbai.org';

    $subject = "International Sahaja Yoga Seminar - 2024 Ganpatipule [Food & Stay Receipt]"; 
    //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;


    $headers  = 'From: '.$from.$eol;
    $headers .= 'Cc: '.$ccc.$eol;
    // $headers .= 'Cc: '.$cc1.$eol;
    $headers .= 'Bcc: '.$bcc.$eol;  
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-type:text/html;charset=UTF-8".$eol; 
    $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      
    
     $tdate=date_create($transDate,timezone_open("Asia/Kolkata"));
     $tjDate =  date_format($tdate,"jS M Y");


    $body = '';
    $body .= 

    '<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>

<style>
.heading{
    margin-top: 0px;
    margin-left: 0px;
    background: #72448d;
    color: white;
    padding: 15px;
    border-radius: 1rem 0;
}
table, th, td {
    border: 1px solid black;
    border-radius: 5px;
    background-color:#fff8dc4a;
}
td,th{
    padding:5px;
}
table {
    width:600px;
}
.table-bg-color {
    background-color:#fff8dc4a;
}
</style>
</head>
<body style="background-color:whitesmoke; width=700px">

 Dear <b> '.$fName.' '.$lName.'</b>, <br><br>
 <b>Jai Shree Mataji</b><br><br>

  <div class="container-fluid col-md-8 card ">
    <div class="contain bg-color" style="border: 1px solid #ffc10721; background-color: #ffc1070d; border-radius: 1rem 0;">
      <div class="heading">
         <div class="row">
            <div class="col-md-12 print-margin" style="margin-top: ;margin-left: 10px;
        font-size: 17px;">
            <h6><b>Your payment for International Sahaja Yoga Seminar - 2024, Ganpatipule for Food & Stay is SUCCESSFUL as per below details</b></h6>
        
            </div>
    </div>
  </div>
  
  
    <center>
    <div class="table-responsive">
    <table class="table table-bordered table-bg-color" style="width:600px;">
       <thead>
        <th colspan="2" style="text-align: center;">Payer\'s Details </th>
       </thead>
        <tbody>

        <tr>
        <th style="text-align:left; width: 290px;">Payer\'s Name  </th>
        <td> '.$fName.' '.$lName.'</td>
        </tr>
        
        <tr>
        <th style="width: 290px; text-align:left;">Payer\'s Mobile </th>
        <td> '.$mobile.'</td>
        </tr>
        
        
        <tr>
        <th style="width: 290px; text-align:left;">Payer\'s Email</th>
        <td> '.$email.'</td>
        </tr>
        
        <tr>
        <th style="width: 290px; text-align:left;">Amount (Rs)  </th>
        <td> '.$amount.'</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Number  </th>
        <td> '.$transNumber.'</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Date  </th>
        <td> '.$tjDate.' '.$time.'</td>
        </tr>

        <th style="text-align:left">Mode of Payment </th>
        <td>'.$paymentMode.'</td>
        </tbody>
    </table>
    </div>
    
    <table class="table table-bordered table-bg-color" style="width:600px">
       <thead>
        <th colspan="2" style="text-align: center;">Participant\'s Details </th>

       </thead>
       <tbody>
       <th>Participant\'s Name </th>
        <th>Receipt Number</th>
       
        <tr><td>'.$partName.'</td><td>'.$receiptNumber.'</td></tr>
        </tbody>
        </table>
        <br><br>
        <p style="margin-left: 10px;font-weight: 600;">Download your reciept from <a href="https://www.sahajayogabharat.org/gpseminar/reprint-foodReceipt.php?id='.$transID.'"> here</a></p>
        </center>
       </div>';
           $body .= '
        
        <p>
     Thanks & Regards,<br>
     Seminar Organising Team<br>
     The Life Eternal Trust, Mumbai</p><br><br>
     <p><b>Note:
                <br> 1. Seminar badges will be issued at Nirmal Nagari, Ganpatipule during seminar or Trust office at Unit No. 1111,  11<sup>th</sup> Floor,  Hubtown Solaris, N S Phadke Marg, Andheri (East), Mumbai 400069, +91 2226843169, +91 7738111185. 
                <br> 2. For any registration queries, please write to seminar

                <a
                  style="
                    font-weight: bold;
                    color: blue;
                    word-wrap: break-word;
                  "
                  href="mailto:seminar.payments@thelifeeternaltrustmumbai.org"
                  >seminar.payments@thelifeeternaltrustmumbai.org</a
                >
                
                with transaction number, transaction date, mode
                of payment and payer\'s Name.
                
                </b></>
       </div>
     </body>
     </html>';
     
// Your payment for international Sahaja Yoga Seminar - 2022 $payment_for is successful and below are the registration details<br><br>

// <br>3. Please do not reply to this email, since has been sent from an unattended email.

  mail($to, $subject, $body, $headers);
  
 

?>

<DOCTYPE html >
		<html lang="en">
		<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta charset="utf-8" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		</head>
		<body>
			<center>
		<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 650px;border-style: solid;" >
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
		#t3_1{left:290px;bottom:600px;letter-spacing:-0.23px;word-spacing:0.02px; font-weight: bold; font-size:30px}
		#t4_1{left:150px;bottom:580px;letter-spacing:-0.08px; }
		#t5_1{left:170px;bottom:560px;letter-spacing:-0.08px;}
		#t6_1{left:210px;bottom:540px;letter-spacing:-0.08px;}
		#t7_1{left:245px;bottom:520px;letter-spacing:-0.08px;}
		#t8_1{left:49px;bottom:445px;letter-spacing:0.12px;word-spacing:0.11px;}
		#t9_1{left:160px;bottom:445px;letter-spacing:0.17px; }
		#ta_1{right:42px;bottom:445px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tb_1{right:60px;bottom:445px;letter-spacing:0.16px; }
		#tc_1{left:49px;bottom:405px;letter-spacing:0.13px;word-spacing:0.01px;}
		#tc_1_1{left:640px;bottom:405px;letter-spacing:0.13px;word-spacing:0.01px;}
		#td_1{left:280px;right:520px;bottom:405px;letter-spacing:0.25px;word-spacing:-0.03px; }
		#td_1_1{left:720px;right:520px;bottom:405px;letter-spacing:0.25px;word-spacing:-0.03px; }
		
		
		#tc_1_2{left:49px;bottom:325px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#td_1_2{left:160px;bottom:325px;letter-spacing:0.21px; }
		#tc_1_21{left:440px;bottom:325px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#td_1_21{left:515px;bottom:325px;letter-spacing:0.21px; }

		#tc_1_211{left:630px;bottom:325px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#td_1_211{left:715px;bottom:325px;letter-spacing:0.21px; }
		
		#te_1{left:49px;bottom:365px;letter-spacing:0.13px;word-spacing:-0.05px;}
		#tf_1{left:140px;bottom:365px;letter-spacing:0.21px; }

		#te_2{left:414px;bottom:453px;letter-spacing:0.15px;}
		#tf_2{left:524px;bottom:453px;letter-spacing:0.17px; }

		#tg_1{left:49px;bottom:365px;letter-spacing:0.15px;}
		#th_1{left:130px;bottom:365px;letter-spacing:0.17px; }

		#ti_1{left:416px;bottom:365px;letter-spacing:0.14px;word-spacing:0.03px;}
		#tj_1{right:250px;bottom:365px;letter-spacing:0.2px; }

		#tj_2{right:245px;bottom:413px;letter-spacing:0.2px; }

		#tk_1{left:49px;bottom:285px;letter-spacing:0.13px;word-spacing:0.01px;}
		#tl_1{left:200px;bottom:285px;letter-spacing:0.13px;word-spacing:0.19px; }

		#tm_1{left:49px;bottom:245px;letter-spacing:0.14px;word-spacing:0.01px;}
		#tn_1{left:210px;bottom:245px;letter-spacing:0.12px;word-spacing:0.22px; }
		#to_1{right:40px;bottom:333px;letter-spacing:0.08px;word-spacing:0.04px;}
		#tp_1{right:60px;bottom:333px;letter-spacing:0.16px; }
		
		#tq_1{left:49px;bottom:210px;letter-spacing:0.15px;word-spacing:-0.01px;}
		#tr_1{left:140px;bottom:210px;letter-spacing:0.17px; }

		#tdd{left:150px;bottom:685px;letter-spacing:0.15px;}

		#taa{left:49px;bottom:175px;letter-spacing:0.17px; }
		#tab{left:280px;bottom:175px;letter-spacing:0.17px; }
		#tac{left:460px;bottom:175px;letter-spacing:0.17px; }
		#tad{right:288px;bottom:175px;letter-spacing:0.17px; }
		#tae{right:30px;bottom:175px;letter-spacing:0.17px;word-spacing:0.04px; }
		#taf{right:100px;bottom:175px;letter-spacing:0.17px; }

		#tag{left:49px;bottom:140px;letter-spacing:0.17px; }
		#tah{left:270px;bottom:140px;letter-spacing:0.17px; }
		#tai{left:460px;bottom:140px;letter-spacing:0.17px; }
		#taj{right:288px;bottom:140px;letter-spacing:0.17px; }
		#tak{right:30px;bottom:140px;letter-spacing:0.17px;word-spacing:0.04px; }
		#tal{right:100px;bottom:140px;letter-spacing:0.17px; }

		#tam{left:49px;bottom:173px;letter-spacing:0.17px; }
		#tan{left:283px;bottom:173px;letter-spacing:0.17px; }
		#tao{right:40px;bottom:173px;letter-spacing:0.17px;word-spacing:0.04px; }
		#tap{right:45px;bottom:60px;letter-spacing:0.17px; }
		
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


		#tw_2{left:232px;bottom:10px;letter-spacing:-0.09px;word-spacing:0.03px;color: darkgray;}

		#tx_1{left:55px;bottom:60px;letter-spacing:0.13px;border: 1px solid black ;padding:0px 55px 0px 5px;font-weight:bold; font-size:22px}
		#tx_2{left:200px;bottom:293px;letter-spacing:0.13px;padding:5px 50px 5px 5px;font-weight:bold; font-size:18px}
		#ty_1{left:120px;bottom:18px;}

		.s1{font-size:17px;font-family:Calibri-BoldItalic_b;color:#000;}
		.s2{font-size:17px;font-family:TimesNewRoman-Bold_d;color:#000;}
		.s3{font-size:28px;font-family:TimesNewRoman-Bold_d;color:#000; }
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
		<!-- <div id="t1_0" style="margin-left:705px;margin-bottom:603px;margin-top:10px;"><img src="logo.jpg" heigh="130" width="130"/> </div> -->
		<!-- <div id="t1_1" class="t s1">Founder </div> -->
		<!-- <div id="t2_1" class="t s2">Her Holiness Mataji Shree Nirmala Devi</div> -->
		<div id="t3_1" class="t s3"><center>The Life Eternal Trust</center></div>
		<div id="t4_1" class="t s4">Registered under the Bombay Public Trust Act, 1950.Regd.No.E/4884 (B) 1972</div>
		<div id="tdd" class="t s4">_________________________________________________________________</div>
		<div id="t5_1" class="t s4">Correspondece Add : Sahaja Yoga Centre, Unit No. 1111, Hubtown Solaris, </div>
		<div id="t6_1" class="t s4">N. S. Phadke Marg, Vijay Nagar, Andheri(E), Mumbai-400 069</div>
		<div id="t7_1" class="t s4">Tel. : 2684 3169 Website : www.sahajayogamumbai.org</div>
		<div id="t8_1" class="t s4">Receipt No. : ______________________________________________________</div>
		<div id="t9_1" class="t s5"> <?php echo $receiptNumber ?></div>
		<div id="ta_1" class="t s4">Date : _________________</div>
		<div id="tb_1" class="t s5"> <?php echo $tjDate ?></div>

		<div id="tc_1" class="t s4">Received with thanks from : _______________________________________</div>
		<div id="td_1" class="t s5"> <?php echo $fName.' '.$lName ?></div>
		<div id="tc_1_1" class="t s4">Tel. No : ___________________</div>
		<div id="td_1_1" class="t s5"> <?php echo $mobile ?></div>
		
		<!-- <div id="tc_1_2" class="t s4">On Behalf of : ____________________________________________________________</div>
		<div id="td_1_2" class="t s5"> <?php echo  $partName ?></div>
		<div id="tc_1_21" class="t s4">Gender : ________________</div>
		<div id="td_1_21" class="t s5"> <?php echo $partGender ?></div> -->

		<!--<div id="te_1" class="t s4">Address : ________________________________________________________________________________</div>-->
		<!--<div id="tf_1" class="t s5"> <?php echo $partCity ?></div>-->

		<!-- <div id="te_2" class="t s4">COUNTRY : ______________________________________</div>
		<div id="tf_2" class="t s5"> </div> -->

		<div id="tg_1" class="t s4">PAN No. : _______________________________</div>
		<div id="th_1" class="t s5"> <?php echo $pan ?></div>

		<div id="ti_1" class="t s4">Aadhar No. : ________________________________________</div>
		<div id="tj_1" class="t s5"> <?php echo $aadhar ?></div>


		<div id="tc_1_2" class="t s4">On Behalf of : ____________________________________________________________</div>
		<div id="td_1_2" class="t s5"> <?php echo  $partName ?></div>
		<div id="tc_1_21" class="t s4">Gender : ________________</div>
		<div id="td_1_21" class="t s5"> <?php echo $partGender ?></div>
			<div id="tc_1_211" class="t s4">Category : ________________</div>
		<div id="td_1_211" class="t s5"> <?php echo $partCategory ?></div>

		<div id="tk_1" class="t s4">a sum of Rupees : _________________________________________________________________________</div>
		<div id="tl_1" class="t s5"> <?php echo numberTowords("$num");?>RUPEES ONLY</div>

		<div id="tm_1" class="t s4">Mode of Payment : ________________________________________________________________________ </div>
		<div id="tn_1" class="t s5"> <?php echo $paymentMode ?></div>
		<!-- <div id="to_1" class="t s4">DATED : ________________</div>
		<div id="tp_1" class="t s5"> </div> -->

		<!--<div id="tq_1" class="t s4">TRANSACTION ID: __________________</div>
		<div id="tr_1" class="t s5"> <?php echo $receiptNumber ?></div>-->

		<!-- <div id="tq_1" class="t s4">Towards</div> -->
		<div id="tq_1" class="t s4">Towards : ________________________________________________________________________________</div>
		<div id="tr_1" class="t s5"> <?php echo $towards ?></div>
		
		<div id="taa" class="t s4">Food Contribution (From : ___________________</div>
		<div id="tab" class="t s5"> <?php echo $fromDateFood ?></div>
		<div id="tac" class="t s4">To : ________________)</div>
		<div id="tad" class="t s5">  <?php echo $toDateFood ?></div>
		<div id="tae" class="t s4">Rs : ___________________</div>
		<div id="taf" class="t s5"> <?php echo $food ?> /- </div>

		<div id="tag" class="t s4">Stay Contribution (From : ____________________</div>
		<div id="tah" class="t s5">   <?php echo $fromDateStay ?></div>
		<div id="tai" class="t s4">To : ________________)</div>
		<div id="taj" class="t s5">  <?php echo $toDateStay ?></div>
		<div id="tak" class="t s4">Rs : ___________________</div>
		<div id="tal" class="t s5">  <?php echo $stay ?>/- </div>

		<!-- <div id="tam" class="t s4">OTHER CONTRIBUTION : ________________________________________</div>
		<div id="tan" class="t s5"> </div> 
		<div id="tao" class="t s4">Rs : ___________________</div> -->
		
		<div id="tx_1" class="t s6">Rs.  <?php echo $amount ?> /-</div> 
		<div id="tap" class="t s5" style="font-weight:bolder; font-size: 20px;" >For The Life Eternal Trust </div> 

<!-- 
		<div id="taq" class="t s4">At<Project Name></div>
		<div id="tar" class="t s4">e.g. Kothrud, Pune Ashram</div> -->

		<!--<div id="tu_1" class="t s2"><br/>Receipt valid only on realisation of Cheque/Cash.</br>Exemption on Donations to The Life Eternal Trust bearing PAN No. AAATT0521B and 12A Registration No. TR/4927 </div>
		<div id="tv_1" class="t s2">dated 02/08/1976, qualify for deduction under section 80-G vide Certification No.80-G/3100/2008/2008-09. </div>-->

		<div id="tw_2" class="t s2">This is a computer generated receipt, hence no signature is required.</div>
		

		
				<!-- <div id="tw_1" class="t s2">
					<label>
Plot No: 1, Sector 8, H.H.Shri Nirmala Devi Marg, CBD-Belapur Navi Mumbai - 400614, India. 
			  Tel: +91 22 27571341/27576922 Mobile: +91 - 7738111184.
					</label>
				</div> -->
			

	
				
		

		
				

		
				
			

		
			


		<!-- End text definitions -->
		 

		</div>

		<div>
		<input type="button" class = "button hidden-print" onclick="printDiv('page_1')" value="Download" />
		<a href = "https://www.sahajayogamumbai.org/gpseminar/food_charges.php" ><button type="button" class = "button hidden-print">Back</button></a>
		</div>

		

			</center>







	    
	    














		</body>
<script>

function printDiv(divName) {

     window.print();
}

</script>
	
</body>
</html>