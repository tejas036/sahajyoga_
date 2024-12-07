<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);
require_once('function.php');
// require_once 'dompdf/autoload.inc.php'; 
// use Dompdf\Dompdf; 
// $dompdf = new Dompdf();
//$id = $_SESSION["ReferenceNo"];

$id = '331780';
//$paymentMode = $_SESSION["Payment_Mode"];

$paymentMode = 'UPI_ICICI';
//$Unique_Ref_Number = $_SESSION["Unique_Ref_Number"];
$Unique_Ref_Number = '220903129716834';

// echo $paymentMode;

include_once 'dbConnection.php';

$backToForm = 'https://www.sahajayogamumbai.org/gpseminar/event.php';
//echo $id;
$Date =  date("Y-m-d");
$sql = "update event_registration set Status='Success',Payment_mode = '" . $paymentMode . "',Transaction_end_time = '" . $Date . "', Transaction_Number = '" . $Unique_Ref_Number . "' where Transaction_id='" . $id . "'";

//echo 	$sql;
if ($conn->query($sql) === true) {
    //echo "<script> alert('Record Update.'); </script>";
} else {
    //echo "<script> alert('Failed To Update Record.'); </script>";
}

$sql = "SELECT * FROM event_registration where Transaction_id='" . $id . "'";
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
    }
} else {
    // echo "0 results";
}

    //$bcc = 'preetypreety733@gmail.com';
    
    $ccc = "donations@sahajayogamumbai.org";

    // $to = $email;
    
    
    
    $to = 'preetypreety733@gmail.com';

    $from = "noreply@sahajayogamumbai.org"; 
    $subject = "Confirmation of booking - International Sahajayoga Seminar, 23-26 December 2022"; 
    //$message = "<p>Dear ".$firstName. " " .$lastName. ", Thank you very much for your contribution. Please find the receipt of your payment attached with this email. </p>";

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // attachment name
    //$filename = "Badges.pdf";
    
    // $emailLink = "<a href='#'>Click here for badges</a>";  
    

    // encode data (puts attachment in proper format)
    // $pdfdoc = $pdf->Output("", "S");
    // $attachment = chunk_split(base64_encode($pdfdoc));

    // main header
    $headers  = 'From: '.$from.$eol;
    //$headers .= 'Cc: '.$ccc.$eol;
    // $headers .= 'Cc: '.$cc1.$eol;
    // $headers .= 'Bcc: '.$bcc.$eol;  
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    // no more headers after this, we start the body! //

    $body .=
"Dear <b> $firstName $lastName</b>, <br><br>

Thanks for the registration for the event with details as under:<br>

<h3>International Sahaja Yoga Seminar,Ganapatipule,
December 23-26, 2022</h3>


Please click on the link below to view and print the badges for entry to the event for each of the participants.<br>

<a href='https://www.sahajayogamumbai.org/gpseminar/printbadges.php?reg_id=$eventRegId'>Click here for badges</a><br><br>

You are requested to print the badges on A4 size paper and bring that along on the day of the event.<br><br><br>


Regards,<br>

Sahajayoga Mumbai";

    // message

    // attachment
    // $body .= "--".$separator.$eol;
    // $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
    // $body .= "Content-Transfer-Encoding: base64".$eol;
    // $body .= "Content-Disposition: attachment".$eol.$eol;
    // $body .= $attachment.$eol;
    // $body .= "--".$separator."--";

    // send message
    mail($to, $subject, $body, $headers);

$payInstrument = $paymentMode;


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Badges</title>
    <meta charset="utf-8" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css" media="print">
      @media print {
        @page {
          margin: 20px;
        }
        body {
          padding-top: 52px;
          padding-bottom: 52px;
        }
      }
    </style>
    <style>
      body {
        margin: 0px;
        padding: 0px;
        font-family: arial;
      }
      .fakeimg {
        width: 100%;
        background: #aaa;
      }

      .container {
        padding: 20px 5px 20px 5px;
        width: 793.92px;
      }

      .border {
        border: 1px solid #948a8a !important;
      }

      .cardbox {
        width: 360px;
      }
      .cardbox1 {
        width: 360px;
        padding: 5px 15px 5px 15px;
      }

      .cardbox2 {
        width: 130px;
        padding: 5px;
      }

      .cardbox3 {
        width: 190px;
        padding: 0px 10px 5px 10px;
      }
    </style>
  </head>

  <body>
      <div>
 <br>
    &nbsp&nbsp<input type="button" class="button" onclick="printDiv('page_1')" value="Download PDF"/>
    &nbsp<input type="button" class="button hidden-print" onclick="printDiv('page_1')" value="Print" />
    <a href="<?php echo $backToForm; ?>"><button type="button" class="button hidden-print">Back to Home</button></a>

    </div>
    
      
  <div class="container-fluid main">
  <div class="row" style="padding: 5px">
          <?PHP
          if($adultCount > 0) { 
                                      
          $partTypeAdl = 'Adult';
          $sqlAdult = "SELECT * FROM participants where participant_type='" . $partTypeAdl ."' and event_registration_id=$eventRegId";
          
          $sqlAdultCount = "SELECT count(*) as total_adult_count FROM participants where participant_type='" . $partTypeAdl ."'" ;
          $sqlAdultCountResult = $conn->query($sqlAdultCount);
          $totalAdultCount = 0;
          while($countRow = $sqlAdultCountResult->fetch_assoc()) {
            $totalAdultCount = $countRow['total_adult_count'] ;
            $totalAdultCount -= $adultCount;
            //echo "<script>alert($totalAdultCount)</script>";
            $totalAdultCount++;
          }
          
          if($totalAdultCount == 0){
            $totalAdultCount++;         
          }
          
          $adultResult = $conn->query($sqlAdult);
          
           while($row = $adultResult->fetch_assoc()) {
           
              $adultName = $row['name'];
              $adultCity = $row['city'];
              $adultGender = $row['gender'];
              $partTypeadult = $row['participant_type'];
              $adltImage = $row['image'];
          
          ?>
          
          <div class="col-md-3 cardbox" style="padding: 3px">
           <div
            class="border text-center"
            style="border-radius: 10px; padding: 8px 18px 8px 18px"
          ><br>
            <h6><b>JAI SHREE MATAJI</b></h6>
            <p style="font-size: 14px">
              International Sahaja Yoga Seminar<br />
              Nirmal Nagari Ganpatipule<br />
              23-26 December-2022<br />
              <?PHP echo $towards ?>
            </p>
            <h6 style="font-size: 14px" class="text-end">
              Coupon Sr No. :  <?php echo 'A'.strtoupper($adultGender[0]).substr($transactionEndDate,8,2).substr($transactionEndDate,5,2).substr($transactionEndDate,0,4).str_pad($totalAdultCount,4,'000',STR_PAD_LEFT)?></h6>
            </h6>
            <hr />
            <div class="row">
              <div
                class="col-md-12 border text-center cardbox1"
                style="border-radius: 5px"
              >
                <div class="row">
                  <div class="col-md-6 border text-start cardbox2">
                    <div class="border p-1 text-center" style="font-size: 13px">
                    <?php echo $partTypeadult; ?>
                    </div>
                    <?php echo '<img style="height:146px; width:120px;" class="mx-auto d-block mt-2" src="data:image/png;base64,' .base64_encode( $adltImage ). '" />';?>
                    <div
                      class="border"
                      style="padding: 3px; padding-bottom: 0px; margin-top: 6px"
                    >
                      <p style="font-size: 13px">
                        Name : <?php echo $adultName; ?>
                        <br />
                        City/Centre : <?php echo $adultCity;?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-start cardbox3">
                                <table class="table table-bordered table-sm" style="font-size:12px;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">23 Dec</th>
                                        <th scope="col">24 Dec</th>
                                        <th scope="col">25 Dec</th>
                                        <th scope="col">26 Dec</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Breakfast</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lunch</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinner</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12" style="width:200px; padding:0px; margin-left:8px;">
                                    <h6 class="text-center" style="margin-top: 10px;">Accomodation</h6>
                                        <p class="border rounded-2" style="margin-top:-10px">
                                            <br><br><br>
                                        </p>
                                   
              
                                 </div>
                                </div>
                            </div>
                        </div> 
                   
                  
                  </div>
                </div>
              </div>
              </div>
              <?php 
         $totalAdultCount++;
        }} ?>

<?Php
          if($yuvaCount > 0) { 


            $partTypeyuva = 'Yuva';
            $sqlYuva = "SELECT * FROM participants where participant_type='" . $partTypeyuva ."' and event_registration_id=$eventRegId";

            $sqlYuvaCount = "SELECT count(*) as total_yuva_count FROM participants where participant_type='" . $partTypeyuva ."'" ;
            $sqlYuvaCountResult = $conn->query($sqlYuvaCount);
            $totalYuvaCount = 0;
           
            while($countRow1 = $sqlYuvaCountResult->fetch_assoc()) {
              $totalYuvaCount = $countRow1['total_yuva_count'] ;
              $totalYuvaCount -= $yuvaCount;
  //echo "<script>alert($totalAdultCount)</script>";
  $totalYuvaCount++;
}

if($totalYuvaCount == 0){
  $totalYuvaCount++;         
}
                        
         $yuvaResult = $conn->query($sqlYuva);
                            
         while($row = $yuvaResult->fetch_assoc()) {                     
              $yuvaName = $row['name'];
              $yuvaCity = $row['city'];
              $yuvaGender = $row['gender'];
              $partTypeyuva = $row['participant_type'];
              $yuvaImage = $row['image'];
                            
         ?>

<div class="col-md-3 cardbox" style="padding: 3px">
           <div
            class="border text-center"
            style="border-radius: 10px; padding: 8px 18px 8px 18px"
          ><br>
            <h6><b>JAI SHREE MATAJI</b></h6>
            <p style="font-size: 14px">
              International Sahaja Yoga Seminar<br />
              Nirmal Nagari Ganpatipule<br />
              23-26 December-2022<br />
              <?PHP echo $towards ?>
            </p>
            <h6 style="font-size: 14px" class="text-end">
              Coupon Sr No. : <?php echo 'Y'.strtoupper($yuvaGender[0]).substr($transactionEndDate,8,2).substr($transactionEndDate,5,2).substr($transactionEndDate,0,4).str_pad($totalYuvaCount,4,'000',STR_PAD_LEFT) ?></h6> 
            </h6>
            <hr />
            <div class="row">
              <div
                class="col-md-12 border text-center cardbox1"
                style="border-radius: 5px"
              >
                <div class="row">
                  <div class="col-md-6 border text-start cardbox2">
                    <div class="border p-1 text-center" style="font-size: 13px">
                    <?php echo $partTypeyuva; ?>
                    </div>
                    <?php echo '<img style="height:146px; width:120px;" class="mx-auto d-block mt-2" src="data:image/png;base64,' .base64_encode( $yuvaImage ). '" />';?>
                    <div
                      class="border"
                      style="padding: 3px; padding-bottom: 0px; margin-top: 6px"
                    >
                      <p style="font-size: 13px">
                        Name : <?php echo $yuvaName; ?>
                        <br />
                        City/Centre : <?php echo $yuvaCity;?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-start cardbox3">
                                <table class="table table-bordered table-sm" style="font-size:12px;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">23 Dec</th>
                                        <th scope="col">24 Dec</th>
                                        <th scope="col">25 Dec</th>
                                        <th scope="col">26 Dec</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Breakfast</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lunch</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinner</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12" style="width:200px; padding:0px; margin-left:8px;">
                                    <h6 class="text-center" style="margin-top: 10px;">Accomodation</h6>
                                        <p class="border rounded-2" style="margin-top:-10px">
                                            <br><br><br>
                                        </p>
                                   
              
                                 </div>
                                </div>
                            </div>
                        </div> 
                   
                  
                  </div>
                </div>
              </div>
              </div>

              <?php $totalYuvaCount++; }} ?>

   <?Php
          if($childCount > 0) { 

                               
            $partTypechild = 'Child';
            
            $sqlChildCount = "SELECT count(*) as total_yuva_count FROM participants where participant_type='" . $partTypechild ."'" ;
            $sqlChildCountResult = $conn->query($sqlChildCount);
            $totalChildCount = 0;
           
            while($countRow2 = $sqlChildCountResult->fetch_assoc()) {
              $totalChildCount = $countRow2['total_yuva_count'] ;
              $totalChildCount -= $childCount;
              //echo "<script>alert($totalAdultCount)</script>";
              $totalChildCount++;
           }

           if($totalChildCount == 0){
                $totalChildCount++;         
           }

         $sqlChild = "SELECT * FROM participants where participant_type='" . $partTypechild ."' and event_registration_id=$eventRegId";
         $childResult = $conn->query($sqlChild);
                            
         while($row = $childResult->fetch_assoc()) {                     
              $childName = $row['name'];
              $childCity = $row['city'];
              $childGender = $row['gender'];
              $partTypechild = $row['participant_type'];
              $childImage = $row['image'];
                            
         ?>


              <div class="col-md-3 cardbox" style="padding: 3px">
           <div
            class="border text-center"
            style="border-radius: 10px; padding: 8px 18px 8px 18px"
          ><br>
            <h6><b>JAI SHREE MATAJI</b></h6>
            <p style="font-size: 14px">
              International Sahaja Yoga Seminar<br />
              Nirmal Nagari Ganpatipule<br />
              23-26 December-2022<br />
              <?PHP echo $towards ?>
            </p>
            <h6 style="font-size: 14px" class="text-end">
              Coupon Sr No. : <?php echo 'C'.strtoupper($childGender[0]).substr($transactionEndDate,8,2).substr($transactionEndDate,5,2).substr($transactionEndDate,0,4).str_pad($totalChildCount,4,'000',STR_PAD_LEFT)  ?></h6> 
            </h6>
            <hr />
            <div class="row">
              <div
                class="col-md-12 border text-center cardbox1"
                style="border-radius: 5px"
              >
                <div class="row">
                  <div class="col-md-6 border text-start cardbox2">
                    <div class="border p-1 text-center" style="font-size: 13px">
                    <?php echo $partTypechild; ?>
                    </div>
                    <?php echo '<img style="height:146px; width:120px;" class="mx-auto d-block mt-2" src="data:image/png;base64,' .base64_encode( $childImage ). '" />';?>
                    <div
                      class="border"
                      style="padding: 3px; padding-bottom: 0px; margin-top: 6px"
                    >
                      <p style="font-size: 13px">
                        Name :  <?php echo $childName; ?>
                        <br />
                        City/Centre : <?php echo $childCity;?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-start cardbox3">
                                <table class="table table-bordered table-sm" style="font-size:12px;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">23 Dec</th>
                                        <th scope="col">24 Dec</th>
                                        <th scope="col">25 Dec</th>
                                        <th scope="col">26 Dec</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Breakfast</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lunch</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinner</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12" style="width:200px; padding:0px; margin-left:8px;">
                                    <h6 class="text-center" style="margin-top: 10px;">Accomodation</h6>
                                        <p class="border rounded-2" style="margin-top:-10px">
                                            <br><br><br>
                                        </p>
                                   
              
                                 </div>
                                </div>
                            </div>
                        </div> 
                   
                        
                  </div>
                </div>
              </div>
              </div>
       <?php $totalChildCount++; }} ?>
      </div>
      
  </div>

    <script>
    function printDiv(divName) {

        window.print();
    }
   </script>     
</body>
</html>
