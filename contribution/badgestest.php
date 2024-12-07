<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);
require_once('function.php');

//$id = $_SESSION["ReferenceNo"];
//$paymentMode = $_SESSION["Payment_Mode"];
//$Unique_Ref_Number = $_SESSION["Unique_Ref_Number"];


$id = '722345';//'584939';
$paymentMode = 'UPI_ICICI';
$Unique_Ref_Number = '221029135117430';//'221030135132151';

$coupon_number=array();

$participant_name=array();

include_once 'dbConnection.php';
$backToForm = 'https://www.sahajayogamumbai.org/gpseminar/event.php';
//echo $id;
$Date =  date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
 $time = date('h:i a');

$sql = "update event_registration set time='$time', Status='Success',Payment_mode = '" . $paymentMode . "',Transaction_end_time = '" . $Date . "', Transaction_Number = '" . $Unique_Ref_Number . "' where Transaction_id='" . $id . "'";

if ($conn->query($sql) === true) {
    //echo "<script> alert('Record Update.'); </script>";
} else {
    //echo "<script> alert('Failed To Update Record.'); </script>";
}

$sql = "SELECT * FROM event_registration where Transaction_id='" . $id . "'";
$result = $conn->query($sql);

// print_r($result);

if ($result-> num_rows > 0) {
  while($row = $result->fetch_assoc()){
    // echo "id: " . $row["id"]. " - Name: " . $row["Fname"]. " " . $row["Lname"]. "<br>";
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
    $transactionEndDate = $row["Transaction_end_time"];
    $transactionTime = $row["time"];
    
    $pass = $row["Passport"];
    $eventRegId = $row["event_registration_id"];

    //$receiptNumber = 123;
    $country = $row["Country"];
  }

  if($towards == "Only one day Puja, Ganapatipule") {
    $payment_for = "(Christmas Puja Only)";
  }else {
    $payment_for = '';
  }

  $couponQuery = "SELECT coupon_number,name FROM `participants` where event_registration_id=$eventRegId";
  $resultCouponQuery = $conn->query($couponQuery);
  if ($resultCouponQuery->num_rows > 0) {
      while ($row = $resultCouponQuery->fetch_assoc()) {
        
          array_push($coupon_number, $row['coupon_number']);
          array_push($participant_name, $row['name']);
      }

  } else {
      // echo "0 results";
  }



  // Email Code id here
  $from = "noreply@thelifeeternaltrustmumbai.org";
    //   $to = $email;
      $to = 'nilesh@dexpertsystems.com'; 
      
      $bcc = 'seminar.payments@thelifeeternaltrustmumbai.org,seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,preetypreety733@gmail.com';

    $subject = "International Sahaja Yoga Seminar - 2022 Ganpatipule"; 
    //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;


    $headers  = 'From: '.$from.$eol;
    // $headers .= 'Cc: '.$ccc.$eol;
    // $headers .= 'Cc: '.$cc1.$eol;
    $headers .= 'Bcc: '.$bcc.$eol;  
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-type:text/html;charset=UTF-8".$eol; 
    $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
      
    // no more headers after this, we start the body! // 
    $cop = "";
    foreach($coupon_number as $index=> $value) 
    { 
        $cop .= "<tr><td>".$participant_name[$index]."</td><td>".$coupon_number[$index]."</td></tr>";
    }
    
     $tdate=date_create($transactionDate,timezone_open("Asia/Kolkata"));
     $tjDate =  date_format($tdate,"jS F Y");


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

 Dear <b> '.$firstName.' '.$lastName.'</b>, <br><br>
 <b>Jai Shree Mataji</b><br><br>

  <div class="container-fluid col-md-8 card ">
    <div class="contain bg-color" style="border: 1px solid #ffc10721; background-color: #ffc1070d; border-radius: 1rem 0;">
      <div class="heading">
         <div class="row">
            <div class="col-md-12 print-margin" style="margin-top: ;margin-left: 10px;
        font-size: 17px;">
            <h6><b>Your payment for International Sahaja Yoga Seminar - 2022, Ganpatipule '.$payment_for.' is SUCCESSFUL as per below details</b></h6>
        
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
        <td> '.$firstName.' '.$lastName.'</td>
        </tr>
        
        <tr>
        <th style="width: 290px; text-align:left;">Payer\'s Mobile </th>
        <td> '.$contact.'</td>
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
        <td> '.$bankTransId.'</td>
        </tr>
        <tr>
        <th style="text-align:left">Transaction Date  </th>
        <td> '.$tjDate.' '.$transactionTime.'</td>
        </tr>

        <th style="text-align:left">Mode of Payment </th>
        <td>'.$payMode.'</td>
        </tbody>
    </table>
    </div>
    
    <table class="table table-bordered table-bg-color" style="width:600px">
       <thead>
        <th colspan="2" style="text-align: center;">Participant\'s Details </th>

       </thead>
       <tbody>
       <th>Participant\'s Name </th>
        <th>Badge Number</th>
       
        '.$cop.'
        </tbody>
        </table>
        <br><br>
        <p style="margin-left: 10px;font-weight: 600;">Download your reciept from <a href="https://www.sahajayogamumbai.org/gpseminar/reprint-badges.php?trans_id='.$id.'"> here</a></p>
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
                <br>3. Please do not reply to this email, since has been sent from an unattended email.
                </b></>
       </div>
     </body>
     </html>';
     
// Your payment for international Sahaja Yoga Seminar - 2022 $payment_for is successful and below are the registration details<br><br>


  mail($to, $subject, $body, $headers);
      
$payInstrument = $paymentMode;

//email End
}
else{
}

// echo $body;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
      integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
      // const btn = document.getElementById("print123");
      // btn.addEventListener("click", function(){ var element = document.getElementById('body'); html2pdf().from(element).save('filename.pdf'); });
    </script>

    <title>Title</title>
    <style>
      body {
        width: 100%;
        margin: 0px;
        padding: 0px;
        font-size: 13px;
      }

      @media print {
        .print-hidden {
          display: none;
        }
        .print-bold {
          font-weight: bold;
        }
        .print-margin {
          margin-top: -40px;
          margin-left: 60px;
        }
        .print-margin-top {
          margin-top: 40px;
        }
        .print-margin-left {
          margin-top: -110px;
        }
        .table-bg-color {
          background-color: #fff8dc4a;
          -webkit-print-color-adjust: exact;
        }
        .bg-color {
          border: 1px solid #ffc10721;
          background-color: #ffc1070d;
          border-radius: 1rem 0;
          -webkit-print-color-adjust: exact;
        }
        .heading {
          margin-top: 60px;
          margin-left: 0px;
          background: #72448d;
          color: white;
          padding: 15px;
          border-radius: 1rem 0;
          -webkit-print-color-adjust: exact;
        }
      }

      .success {
        background: url("success.gif");
      }
      .heading {
        margin-top: 0px;
        margin-left: 0px;
        background: #72448d;
        color: white;
        padding: 15px;
        border-radius: 1rem 0;
      }
      .table-bg-color {
        background-color: #fff8dc4a;
      }

      #btn1 {
        padding: 5px 30px 5px 30px;
        font-size: 14px;
        display: inline-block;
        width: 155px;
        margin: 2px 2px 2px 2px;
      }
      
      th,td{
          font-size: 13px;
      }

      #btn2 {
        font-size: 14px;
        width: 155px;
        display: inline-block;
        margin: 2px 2px 2px 2px;
      }

      #btn3 {
        padding: 5px 30px 5px 30px;
        font-size: 14px;
        width: 155px;
        display: inline-block;
        margin: 2px 2px 2px 2px;
      }

      /* extra small xs */
      @media only screen and (max-width: 410px) {
        #btn1,
        #btn2,
        #btn3 {
          padding: 7px 10px 7px 10px;
          font-size: 10px;
          width: 100px;
        }

        #cphead {
          font-size: 14px;
        }
      }
    </style>
  </head>
  <body style="background-color: whitesmoke" id="body">
    <div class="container-fluid" style="width: 99%">
      <div class="row print-hidden">
        <div class="col-md-12 text-center" style="padding: 15px 0px 10px 0px">
          <button class="btn btn-secondary" id="btn1" onclick="printDivMain()">
            Print
          </button>
          <button class="btn btn-secondary" id="btn2" onclick="downpdf()">
            Download PDF
          </button>
          <a id="btn3" href="<?php echo $backToForm ?>" class="btn btn-secondary">Back to Home</a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
          <div
            class="contain bg-color"
            style="
              border: 1px solid #ffc10721;
              background-color: #ffc1070d;
              border-radius: 1rem 0;
            "
          >
            <div class="heading">
              <div class="row">
                <div class="col-md-1 text-center" style="padding: 5px">
                  <img
                  class="print-margin-left"
                    src="success.gif"
                    alt=""
                    srcset=""
                    style="
                      border-radius: 99022px;
                      height: 40px;
                      width: 50px;
                      margin-left: 0px;
                    "
                  />
                </div>
                <div
                  class="col-md-11 print-margin text-center"
                  style="padding: 5px"
                >
                  <h6>
                    <b id="cphead" style=" font-size: 16px;">
                    Your payment for International Sahaja Yoga Seminar - 2022, Ganpatipule <?php echo $payment_for ?> is SUCCESSFUL as per below details
                    </b>
                  </h6>
                </div>
              </div>
            </div>
            <br />
            <div class="table-responsive" style="padding: 5px 20px 5px 20px">
              <table class="table table-bordered table-sm table-bg-color">
                <thead>
                  <th colspan="2" style="text-align: center">
                    Payer's Details
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <th style="width: 300px">Payer's Name</th>
                    <td><?php echo $firstName." ".$lastName ?></td>
                  </tr>
                  
                  <tr>
                    <th>Payer's Mobile</th>
                    <td><?php echo $contact ?></td>
                  </tr>
                  
                  
                  <tr>
                    <th>Payer's Email</th>
                    <td><?php echo $email ?></td>
                  </tr>
                  
                  
                  <tr>
                    <th>Amount (Rs.)</th>
                    <td><?php echo $amount ?></td>
                  </tr>
                  <tr>
                    <th>Transaction Number</th>
                    <td><?php echo $bankTransId; ?></td>
                  </tr>
                  <tr>
                    <th>Transaction Date</th>
                    <td><?php 
                        $date=date_create($transactionDate,timezone_open("Asia/Kolkata"));
                       echo date_format($date,"jS F Y").' '.$transactionTime;
                       ?></td>
                  </tr>
                  <tr>
                    <th>Mode of Payment</th>
                    <td><?php echo $payMode; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive" style="padding: 5px 20px 5px 20px">
              <table class="table table-bordered table-bg-color">
                <thead>
                  <th colspan="2" style="text-align: center">
                    Participant's Details
                  </th>
                </thead>
                <tbody>
                  <tr>
                     <th style="width:300px">Participant's Name</th>
                    <th>Badge Number</th>
                  </tr>
                  <?php echo $cop;?>
                </tbody>
              </table>
            </div>

            <div class="row">
            <div class="col-md-12">
                <p style="padding: 5px 20px 5px 20px; color: red">
                  Note:
                  <br />
                  1. Seminar badges will be issued at Nirmal Nagari, Ganpatipule during seminar or Trust office at Unit No. 1111,  11<sup>th</sup> Floor,  Hubtown Solaris, N S Phadke Marg, Andheri (East), Mumbai 400069, +91 2226843169, +91 7738111185. 


                  <br />
                  2. For any registration queries, please write to seminar

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
                  of payment and payer's Name.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <br /><br />

    <script>
      function printDivMain() {
        window.print();
      }
      function downpdf() {
        // alert()
        var element = document.getElementById("body"); //' select div which needs to be dowloaded as pdf
        html2pdf(element);
        document.getElementById("btn1").style.display = "none";
        document.getElementById("btn2").style.display = "none";
        document.getElementById("btn3").style.display = "none";

        const timeLimit = 1; // sec;
        let i = 0;
        const timer = setInterval(function () {
          i++;
          if (i == timeLimit) {
            clearInterval(timer);
            document.getElementById("btn1").style.display = "inline-block";
            document.getElementById("btn2").style.display = "inline-block";
            document.getElementById("btn3").style.display = "inline-block";
          }
          console.log(i);
        }, 1000);
      }
    </script>
  </body>
</html>
