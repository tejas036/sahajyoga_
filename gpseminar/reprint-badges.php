<?php
// session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);
require_once('function.php');

$id = $_REQUEST['trans_id'];

$coupon_number=array();

$participant_name=array();
$gender=array();
$type=array();

include_once 'dbConnection.php';

$backToForm = 'https://www.sahajayogabharat.org/gpseminar/index.php';
//echo $id;
$Date =  date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
 $time = date('h:i a');


$sql = "SELECT * FROM event_registration where Transaction_id='" . $id . "' AND Status = 'Success'";
// echo  $sql;
$result = $conn->query($sql);

$adultCount = 0;
$yuvaCount = 0;
$childCount = 0;
$image = '';
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

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
        $transactionEndDate = $row["Transaction_end_time"];
        $transactionTime = $row["time"];
        
        $pass = $row["Passport"];
        $eventRegId = $row["event_registration_id"];

        //$receiptNumber = 123;
        $country = $row["Country"];
         
       
    

        $countQuery = "SELECT count(*) as count,participant_type FROM `participants` where event_registration_id=$eventRegId group by participant_type";
        $resultCountQuery = $conn->query($countQuery);
        
        if ($resultCountQuery->num_rows > 0) {
            while ($row = $resultCountQuery->fetch_assoc()) {
                if ($row['participant_type'] == 'Adult') {
                    $adultCount = $row['count'];
                } else if ($row['participant_type'] == 'Yuva') {
                    $yuvaCount = $row['count'];
                } else if ($row['participant_type'] == 'Child') {
                    $childCount = $row['count'];
                }
            }
        }
        
        $imageQuery = "SELECT image FROM `participants` where event_registration_id=$eventRegId limit 1";
        $resultImageQuery = $conn->query($imageQuery);
        if ($resultImageQuery->num_rows > 0) {
            while ($row = $resultImageQuery->fetch_assoc()) {
                $image = $row['image'];
                
            }
        }

        $couponQuery = "SELECT coupon_number,name,gender,participant_type FROM `participants` where event_registration_id=$eventRegId";
        $resultCouponQuery = $conn->query($couponQuery);
        if ($resultCouponQuery->num_rows > 0) {
            while ($row = $resultCouponQuery->fetch_assoc()) {
             
                array_push($coupon_number, $row['coupon_number']);
                array_push($participant_name, $row['name']);
                array_push($gender, $row['gender']);
                array_push($type, $row['participant_type']);
    }
    
} else {
    // echo "0 results";
}  
      
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
          padding: 6px;
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
        padding: 6px;
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
    <div class="container-fluid">
      <div class="row print-hidden">
        <div class="col-md-12 text-center" style="padding: 15px 0px 10px 0px">
          <button class="btn btn-secondary" id="btn1" <?php echo "onclick=printDivMain('" . $id . "')"; ?>>
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
        <div class="col-md-10">
          <div class="contain bg-color" style="border: 1px solid #ffc10721; background-color: #ffc1070d;  border-radius: 1rem 0;">
            <div class="heading">
              <div class="row">
                <div class="col-md-1 text-center" style="padding: 5px">
                  <img class="print-margin-left" src="success.gif" alt="" srcset="" style="border-radius: 99022px; height: 40px; width: 50px; margin-left: 0px;"/>
                </div>
                <div
                  class="col-md-11 print-margin text-center"
                  style="padding: 5px"
                >
                  <h6>
                  <b id="cphead">
                    Your payment for International Sahaja Yoga Seminar Nirmal Nagari – 2024, Ganapatipule is SUCCESSFUL as per below details
                    </b>
                  </h6>
                </div>
              </div>
            </div>
            <br />
            <div class="table-responsive" style="padding: 5px 14px 5px 14px">
              <table class="table table-bordered table-sm table-bg-color">
                <thead>
                  <th colspan="2" style="text-align: center">
                    Payer's Details
                  </th>
                </thead>
                <tbody>

                  <tr>
                    <th style="">Contribute Towards</th>
                    <td><?php echo $towards; ?></td>
                  </tr>


                  <tr>
                    <th style="">Payer's Name</th>
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
                    <td><?php echo $payMode ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive" style="padding: 2px 14px 2px 14px">
              <table class="table table-bordered table-bg-color">
                <thead>
                  <th colspan="3" style="text-align: center">
                    Participant's Details
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <th style="width:400px; font-size: 11px;">Participant's Name</th>
                   <th style="width:400px; font-size: 11px;">Gender</th>
                   <th style="width:400px; font-size: 11px;">Type</th>
                   <th style="width:400px; font-size: 11px;">Badge No</th>
                  </tr>
                  <?php 
           foreach($coupon_number as $index=> $value){
        ?>
        <tr>
            <td style="font-size: 11px;padding: 0.2rem 0.2rem;"> <?php echo $participant_name[$index] ?></td>
            <td style="font-size: 11px;padding: 0.2rem 0.2rem;"> <?php echo $gender[$index] ?></td>
            <td style="font-size: 11px;padding: 0.2rem 0.2rem;"> <?php echo $type[$index] ?></td>
            <td style="font-size: 11px;padding: 0.2rem 0.2rem;"> </td>
        </tr>
      

        <?php
            }
            ?>
                  </tbody>
                </table>
              </div>

              <div class="row">
              <div class="col-md-12">
                  <p style="padding: 5px 14px 5px 14px; color: red">
                    Note:
                
                    <br> 
                    1. This is system generated mail. Please don\'t reply.
                    <br />
                    2. For any registration queries, please write to seminar

                    <a
                      style="
                        font-weight: bold;
                        color: blue;
                        word-wrap: break-word;
                      "
                      href="mailto:seminar.payments@thelifeeternaltrustmumbai.org"
                      >seminar.payments@thelifeeternaltrustmumbai.org</a>
                    
                    with transaction number, transaction date, mode
                    of payment and payer's Name.
                  </p>
                </div>
                
                <div class="col-md-6">
              <p style="padding: 5px 14px 5px 14px; color: black">
              Badge issued Date : 
              <br> 
              Badge Issuer Name and Mobile No : 
              </p>
              </div>
              <div class="col-md-6">
              <p style="padding: 5px 14px 5px 14px; color: black">
              <br> 
              Badge Receiver Name and Mobile No : 
              </p>
              </div>
              </div>
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>

      <?php }} ?>

    </div>


    <script>
      function printDivMain(transId) {
        // alert(transId);

        $.ajax({
          // alert(transId);
          url: "print_count.php",
          type: "POST",
          data: {
              "transId": transId,
              "account": "user",
              },
        //   cache: false,
          success: function(result){
            // alert(result);
            if(result == 'yes'){
              window.print();
            }
            else{
              alert("limit expired");
            }
          }
        });
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
