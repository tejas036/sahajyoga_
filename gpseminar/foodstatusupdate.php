<?php

include_once 'dbConnection.php';
// $q2 = "select * from event_food where status not in ('Success')  and paymenttype is NULL ORDER BY id DESC Limit 50";
$q2 = "select * from event_food where transaction_id='462953'";


$rs2 = mysqli_query($conn, $q2);
while ($row2 = mysqli_fetch_array($rs2)) {

  echo $txnId = $row2['transaction_id'];
  echo '<br>';
  echo $Tdate = $row2['transaction_start_time'];
  echo '<br>';

  //echo $Tdate.'<br/>' ;
  $json_url = "https://eazypay.icicibank.com/EazyPGVerify?ezpaytranid=&amount=&paymentmode=&merchantid=331115&trandate=&pgreferenceno=" . $txnId;
  //$json_url = "https://sandbox.dexpertsystems.com/TransactionStatusInquiry/InquiryServlet?mtxnId=".$txnId."&txnDate=".$txnDate."&mid=".$mid."&mcode=".$mcode;
  $crl = curl_init();
  curl_setopt($crl, CURLOPT_URL, $json_url);
  curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
  $json = curl_exec($crl);
  "output : " . $json;
  curl_close($crl);
  $array = explode("&", $json);
  if (count($array) != 0) {
    foreach ($array as $value) {
      $data = explode("=", $value);
      $data[0] . "=" . $data[1];
      if ("ezpaytranid" == $data[0]) {
        echo 'ezpaytranid : ';
        echo $ezpaytranid = $data[1];
        echo '<br>';
      } else if ("BA" == $data[0]) {
        echo 'amount : ';
        echo $amount = $data[1];
        echo '<br>';
      } else if ("PaymentMode" == $data[0]) {
        echo 'PaymentMode : ';
        echo $PaymentMode = $data[1];
        echo '<br>';
      } else if ("pgreferenceno" == $data[0]) {
        echo 'pgreferenceno : ';
        echo $pgreferenceno = $data[1];
        echo '<br>';
      } else if ("status" == $data[0]) {
        echo 'status :';
        echo $status = $data[1];
        echo '<br>';
      }
    }
  }
  $date = date("Y-m-d");
  $datep = strtotime("-5 day");
  $datel = date('Y-m-d', $datep);

  if ($status == 'RIP' || $status == 'Success' || $status == 'SIP') {


    $query = "update event_food set status='Success', is_sync_with_pg = 'Y', payment_mode = '$PaymentMode', transaction_Number = '$ezpaytranid', transaction_end_time = '$date'
	where Transaction_id='$pgreferenceno'";
    if ($conn->query($query) === true) {

      $transID = $pgreferenceno;
      $paymentMode = $PaymentMode;
      $Unique_Ref_Number = $ezpaytranid;

      $coupon_number = array();
      $participant_name = array();

      include_once 'dbConnection.php';
      $backToForm = 'https://www.sahajayogabharat.org/gpseminar/index.php';
      //echo $id;
      $Date = date("Y-m-d");
      date_default_timezone_set("Asia/Kolkata");
      $time = date('h:i a');


      $sql = "SELECT * FROM event_food where transaction_id='" . $pgreferenceno . "'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row1 = $result->fetch_assoc()) {
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


        $receiptNumber = 'GP/' . substr($date, 8, 2) . substr($date, 5, 2) . substr($date, 0, 4) . '-24/' . str_pad($recieptCount, 5, '0', STR_PAD_LEFT);
        //   echo 'receiptNumber'.$receiptNumber;

        $sql3 = "update event_food set receiptNumber = '$receiptNumber' where id = '$id'";
        if ($conn->query($sql3)) {
          // echo '<br>recipt updated<br>';
        }


        $tdate = date_create($transDate, timezone_open("Asia/Kolkata"));
        $tjDate =  date_format($tdate, "jS M Y");

        //    $fromDateFood=date_create($fromDateFood,timezone_open("Asia/Kolkata"));
        //    $toDateFood=date_create($toDateFood,timezone_open("Asia/Kolkata"));

        //    $fromDateStay=date_create($fromDateStay,timezone_open("Asia/Kolkata"));
        //    $toDateStay=date_create($toDateStay,timezone_open("Asia/Kolkata"));


        if ($toDateFood == '') {
          $fromDateFood = '-';
          $toDateFood = '-';
        } else {
          $fromDateFood = date_create($fromDateFood, timezone_open("Asia/Kolkata"));
          $toDateFood = date_create($toDateFood, timezone_open("Asia/Kolkata"));
          $toDateFood = date_format($toDateFood, "jS M Y");
          $fromDateFood = date_format($fromDateFood, "jS M Y");
        }

        if ($toDateStay == '') {
          $fromDateStay = '-';
          $toDateStay = '-';
        } else {
          $fromDateStay = date_create($fromDateStay, timezone_open("Asia/Kolkata"));
          $toDateStay = date_create($toDateStay, timezone_open("Asia/Kolkata"));
          $fromDateStay = date_format($fromDateStay, "jS M Y");
          $toDateStay = date_format($toDateStay, "jS M Y");
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


        $headers  = 'From: ' . $from . $eol;
        $headers .= 'Cc: ' . $ccc . $eol;
        // $headers .= 'Cc: '.$cc1.$eol;
        $headers .= 'Bcc: ' . $bcc . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-type:text/html;charset=UTF-8" . $eol;
        $headers .= 'Reply-To: seminar.payments@thelifeeternaltrustmumbai.org' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();


        $tdate = date_create($transDate, timezone_open("Asia/Kolkata"));
        $tjDate =  date_format($tdate, "jS M Y");


        $body =

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
               
                Dear <b> ' . $fName . ' ' . $lName . '</b>, <br><br>
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
                       <td> ' . $fName . ' ' . $lName . '</td>
                       </tr>
                       
                       <tr>
                       <th style="width: 290px; text-align:left;">Payer\'s Mobile </th>
                       <td> ' . $mobile . '</td>
                       </tr>
                       
                       
                       <tr>
                       <th style="width: 290px; text-align:left;">Payer\'s Email</th>
                       <td> ' . $email . '</td>
                       </tr>
                       
                       <tr>
                       <th style="width: 290px; text-align:left;">Amount (Rs)  </th>
                       <td> ' . $amount . '</td>
                       </tr>
                       <tr>
                       <th style="text-align:left">Transaction Number  </th>
                       <td> ' . $transNumber . '</td>
                       </tr>
                       <tr>
                       <th style="text-align:left">Transaction Date  </th>
                       <td> ' . $tjDate . ' ' . $time . '</td>
                       </tr>
               
                       <th style="text-align:left">Mode of Payment </th>
                       <td>' . $paymentMode . '</td>
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
                      
                       <tr><td>' . $partName . '</td><td>' . $receiptNumber . '</td></tr>
                       </tbody>
                       </table>
                       <br><br>
                       <p style="margin-left: 10px;font-weight: 600;">Download your reciept from <a href="https://www.sahajayogamumbai.org/gpseminar/reprint-foodReceipt.php?id=' . $transID . '"> here</a></p>
                       </center>
                      </div>
                      <br>

                    </p>
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

        //  mail($to, $subject, $body, $headers);

        $emailCurl = curl_init();
        $to = $email;
        $cc = $ccc;
        // $bcc = 'seminar.payments@sahajayogamumbai.org,seminar.registrations@outlook.com,rahul@dexpertsystems.com'; 
        $bcc=$bcc;
        $subject = $subject;
        $htmlContent = $body;

        curl_setopt_array($emailCurl, array(
          CURLOPT_URL => 'https://api.mailgun.net/v3/app.payplatter.in/messages',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
            'from' => 'support@dexpertsystems.com',
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc, 
            'subject' => $subject,
            'html' => $htmlContent // Use 'html' for HTML content
          ),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YXBpOmtleS00NzNlODlhODBiNWNiOGFjZGUzYTgxMGM5YTE4MDIyYQ==' 
          ),
        ));

        $emailResponse = curl_exec($emailCurl);
        if ($emailResponse === false) {
          echo 'Curl error: ' . curl_error($emailCurl);
        } else {
          echo 'Email sent successfully: ' . $emailResponse;
        }
        curl_close($emailCurl);


        echo '<br>';
      } else {
        echo "Success Record not Update";
      }
    }
  }
}
