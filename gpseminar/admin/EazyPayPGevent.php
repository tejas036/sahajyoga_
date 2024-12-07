<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail'] . "Session";
}


require_once('../function.php');
require_once('../file.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$eventId = $_POST['eventid'];
//echo $event_id;
$amountfromget = $_POST['amount'];
// echo $amount;

$trans_id = rand(11111111, 99999999);
// echo $trans_id;
$mtxnId = $trans_id;
$payerFirstName = ucfirst($_POST['fname']);
$payerFirstName = preg_replace('/\s/', '', $payerFirstName);

// echo $payerFirstName."<br>";
$payerLastName = ucfirst($_POST['lname']);
$payerLastName = preg_replace('/\s/', '', $payerLastName);

// echo $payerLastName."<br>";
$payerContact = $_POST['mobile'];
// echo $payerContact."<br>";
$payerEmail = $_POST['email'];

$payerAddress = ucfirst($_POST['city']) . ' ' . ucfirst($_POST['pincode']);
// echo $payerAddress."<br>";
$city = ucfirst($_POST['city']);
$city = preg_replace('/\s/', '', $city);

$dist = ucfirst($_POST['dist']);
$dist = preg_replace('/\s/', '', $dist);

// echo $city."<br>";
$pin = $_POST['pincode'];
// echo $pin."<br>";
$PANNo = $_POST['pan'];
// echo $PANNo."<br>";
$aadhar = $_POST['aadhaar'];
// $towards = $_POST['payment_towards'];

$paymode = $_POST['paymode'];
// echo $pin."<br>";

$tranno = $_POST['tranno'];
// echo $pin."<br>";

$towards = $_POST['contriRadio'];
// echo $towards;
$Who_im = $_POST['Who_im'];

$terms_conditions=$_POST['checkbox_show'];

include_once '../dbConnection.php';
date_default_timezone_set("Asia/Kolkata");
$Date =  date("Y-m-d");
$DateReceipt =  date("dmY");

$mydate = date("Y-m-d H:i:s a");

$adultcount = (int)$_POST['number_adult1'];
$yuvacount = (int)$_POST['number_yuva1'];
$childcount = (int)$_POST['number_child1'];

$enddate = '2024-12-15';

$paymenttype = 'offline';

$userid =  $_POST['userid'];



if ($enddate > $Date) {
  if ($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
    $adulttotal = $adultcount * 3600;
    $yuvatotal = $yuvacount * 2700;
    $childtotal = $childcount * 1800;
    $gtotal = $adulttotal + $yuvatotal + $childtotal;
  } else {
    $adulttotal = $adultcount * 900;
    $yuvatotal = $yuvacount * 900;
    $childtotal = $childcount * 900;
    $gtotal = $adulttotal + $yuvatotal + $childtotal;
  }
} else {
  if ($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {

    $adulttotal = $adultcount * 4500;
    $yuvatotal = $yuvacount * 3500;
    $childtotal = $childcount * 2500;
    $gtotal = $adulttotal + $yuvatotal + $childtotal;
  } elseif ($towards == 'Only day Puja, Ganapatipule') {
    $adulttotal = $adultcount * 900;
    $yuvatotal = $yuvacount * 900;
    $childtotal = $childcount * 900;
    $gtotal = $adulttotal + $yuvatotal + $childtotal;
  }
}
// echo '<pre>';
//   print_r($_POST); // or var_dump($_POST);
//   echo '</pre>';


if ($amountfromget == $gtotal && $eventId != '' && $payerFirstName != '' && $payerLastName != '' && $payerContact != '' && $payerEmail != '' && $city != '' && $PANNo != '' && $pin != '' && $trans_id != '' && $Date != '' && $towards != '') {
  $amount = $gtotal;



  $sql1 = "SELECT * FROM event_registration where Transaction_start_time='" . $Date . "'";
  $result1 = $conn->query($sql1);
  $listSize = 0;
  if ($result1->num_rows > 0) {
    $listSize = $result1->num_rows + 1;
    //echo $listSize;
  } else {
    $listSize = 1;
    //echo $listSize ;
  }

  $listSize = str_pad($listSize, 6, 0, STR_PAD_LEFT);
  //echo $listSize."</br>";

  $receiptNumber = $DateReceipt . '/' . $listSize;

  $Status = "Success";


  $optionalField = $PANNo . '||||||' . $towards . '|' . $city . '||2022-23';



  $adultNameArray = array();
  $adultGenderArray = array();
  $adultCityArray = array();
  $adultCentreArray = array();
  $adultBadgenoArray = array();

  $yuvaNameArray = array();
  $yuvaGenderArray = array();
  $yuvaCityArray = array();
  $yuvaCentreArray = array();
  $yuvaBadgenoArray = array();

  $childNameArray = array();
  $childGenderArray = array();
  $childCityArray = array();
  $childCentreArray = array();
  $childBadgenoArray = array();


  // echo '<pre>';
  // print_r($_POST); // or var_dump($_POST);
  // echo '</pre>';

  // die();
  if (isset($_POST['adult_name']) && isset($_POST['adult_gender']) && isset($_POST['adult_city']) && isset($_POST['adult_centre'])&&  $_POST['adult_age']) {

    $adultNameArray = $_POST['adult_name'];
    $adultGenderArray = $_POST['adult_gender'];
    $adultCityArray = $_POST['adult_city'];
    $adultCentreArray = $_POST['adult_centre'];
    $adultAgeArray = $_POST['adult_age'];
    $adultBadgenoArray = $_POST['adult_badge_No'];
  }

  if (isset($_POST['yuva_name']) && isset($_POST['yuva_gender']) && isset($_POST['yuva_gender']) && isset($_POST['yuva_city']) && isset($_POST['yuva_centre']) && isset($_POST['yuva_age'])) {

    $yuvaNameArray = $_POST['yuva_name'];
    $yuvaGenderArray = $_POST['yuva_gender'];
    $yuvaCityArray = $_POST['yuva_city'];
    $yuvaCentreArray = $_POST['yuva_centre'];
    $yuvaAgeArray = $_POST['yuva_age'];
    $yuvaBadgenoArray = $_POST['yuva_badge_No'];
  }

  if (isset($_POST['child_name']) && isset($_POST['child_gender']) && isset($_POST['child_gender']) && isset($_POST['child_city']) && isset($_POST['child_centre']) && isset($_POST['child_age'])) {
    $childNameArray = $_POST['child_name'];
    $childGenderArray = $_POST['child_gender'];
    $childCityArray = $_POST['child_city'];
    $childCentreArray = $_POST['child_centre'];
    $childAgeArray = $_POST['child_age'];
    $childBadgenoArray = $_POST['child_badge_No'];
  }

  $participent_type_adult = "Adult";
  $participent_type_yuva = "Yuva";
  $participent_type_child = "Child";


  include_once "../dbConnection.php";

  if ($conn) {
    $adultSql1 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $adultResCount1 = $conn->query($adultSql1);

    while ($row = $adultResCount1->fetch_assoc()) {
      $adult_count_seminar = $row['adult_count'];
    }


    $adultSql2 = "SELECT count(part.name) as adult_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Adult' and ereg.Towards='Only day Puja, Ganapatipule'";
    $adultResCount2 = $conn->query($adultSql2);

    while ($row = $adultResCount2->fetch_assoc()) {
      $adult_count_puja = $row['adult_count'];
    }

    $yuvaSql1 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $yuvaResCount1 = $conn->query($yuvaSql1);

    while ($row = $yuvaResCount1->fetch_assoc()) {
      $yuva_count_seminar = $row['yuva_count'];
    }


    $yuvaSql2 = "SELECT count(part.name) as yuva_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Yuva' and ereg.Towards='Only day Puja, Ganapatipule'";
    $yuvaResCount2 = $conn->query($yuvaSql2);

    while ($row = $yuvaResCount2->fetch_assoc()) {
      $yuva_count_puja = $row['yuva_count'];
    }

    $childSql1 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
    $childResCount1 = $conn->query($childSql1);

    while ($row = $childResCount1->fetch_assoc()) {
      $child_count_seminar = $row['child_count'];;
    }

    $childSql2 = "SELECT count(part.name) as child_count FROM participants part join event_registration ereg on part.event_registration_id=ereg.event_registration_id where part.participant_type='Child' and ereg.Towards='Only day Puja, Ganapatipule'";
    $childResCount2 = $conn->query($childSql1);

    while ($row = $childResCount2->fetch_assoc()) {
      $child_count_puja = $row['child_count'];
    }


     $sql = "INSERT INTO `event_registration` (`event_id`,`Fname`, `Lname`, `Mobile`, `Email`, `Address`, `PAN`, `Aadhar`, `Pin`, `Who_im`, `Transaction_id`, `Amount`, `Status`, `Transaction_start_time`, `Towards`,`receiptNumber`,`count_adult`,`count_yuva`,`count_child`,`dist`,`Payment_mode`,`Transaction_Number`,`paymenttype`,`userid`,terms_conditions)
	  VALUES ('$eventId','$payerFirstName', '$payerLastName', '$payerContact', '$payerEmail', '$city', '$PANNo', '$aadhar', '$pin','$Who_im', '$trans_id', '$amount', '$Status','$Date','$towards','$receiptNumber','$adultcount','$yuvacount','$childcount','$dist','$paymode','$tranno','$paymenttype','$userid', '$terms_conditions')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      // echo "<script> alert('Record Inserted.'); </script>";
    }
    $last_id = mysqli_insert_id($conn);

     // Check if the email exists in the database
     $sqlCheckUser = "SELECT * FROM `sahajyoga_user_registration` WHERE `email` = '$payerEmail'";
     $result = $conn->query($sqlCheckUser);
     if ($result->num_rows > 0) {
       // Email already exists, do not insert
       // echo "Email already registered.";
     } else {
       // Email does not exist, insert the new record
       $sqlInsert = "INSERT INTO sahajyoga_user_registration (full_name,first_name,last_name, email, mobile, pan_number, aadhaar_number, city,district)
                  VALUES ('$payerFirstName $payerLastName','$payerFirstName','$payerLastName', '$payerEmail', '$payerContact',  '$PANNo', '$aadhar', '$city' ,'$dist')";
 
       if ($conn->query($sqlInsert) === TRUE) {
          // echo "New record created successfully";
        //  $_SESSION['email'] = $payerEmail;
       } else {
         // echo "Error: " . $sqlInsert . "<br>" . $conn->error;
       }
     }
 
    
  }
 
  $i = 0;
  $j = 0;
  $k = 0;
  for ($i; $i < count($adultNameArray); $i++) {
    $adult_coupon = '';

    if ($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
      $adult_count_seminar = $adult_count_seminar + 1;
      $adult_coupon = 'A' . strtoupper(substr($adultGenderArray[$i], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($adult_count_seminar, 5, '0', STR_PAD_LEFT);
    }

    if ($towards == 'Only day Puja, Ganapatipule') {
      $adult_count_puja = $adult_count_puja + 1;
      $adult_coupon = 'PA' . strtoupper(substr($adultGenderArray[$i], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($adult_count_puja, 5, '0', STR_PAD_LEFT);
    }

    $sql1 = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre,participant_age, participant_type, coupon_number)  VALUES('" . $eventId . "','" . $last_id . "','" . ucfirst($adultNameArray[$i]) . "','" . ucfirst($adultGenderArray[$i]) . "','" . ucfirst($adultCityArray[$i]) . "','" . ucfirst($adultCentreArray[$i]) .  "','" . ucfirst($adultAgeArray[$i]) ."','" . ucfirst($participent_type_adult) . "','" . ucfirst($adultBadgenoArray[$i]) . "')";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
      // echo "<script> alert('Adult record is inserted.'); </script>";
    }
  }


  for ($j; $j < count($yuvaNameArray); $j++) {

    $yuva_coupon = '';

    if ($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
      $yuva_count_seminar = $yuva_count_seminar + 1;
      $yuva_coupon = 'Y' . strtoupper(substr($yuvaGenderArray[$j], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($yuva_count_seminar, 5, '0', STR_PAD_LEFT);
    }

    if ($towards == 'Only day Puja, Ganapatipule') {
      $yuva_count_puja = $yuva_count_puja + 1;
      $yuva_coupon = 'PY' . strtoupper(substr($yuvaGenderArray[$j], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($yuva_count_puja, 5, '0', STR_PAD_LEFT);
    }

    $sqlyuva = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre,participant_age, participant_type, coupon_number)  VALUES('" . $eventId . "','" . $last_id . "','" . ucfirst($yuvaNameArray[$j]) . "','" . ucfirst($yuvaGenderArray[$j]) . "','" . ucfirst($yuvaCityArray[$j]) . "','" . ucfirst($yuvaCentreArray[$j]) . "','" . ucfirst($yuvaAgeArray[$j]) . "','" . ucfirst($participent_type_yuva) . "','" . ucfirst($yuvaBadgenoArray[$j]) . "')";
    $resultyuva = mysqli_query($conn, $sqlyuva);

    if ($resultyuva) {
      // echo "<script> alert('Yuva record is inserted.'); </script>";
    }
  }

  for ($k; $k < count($childNameArray); $k++) {
    $child_coupon = '';

    if ($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
      $child_count_seminar = $child_count_seminar + 1;
      $child_coupon =  'C' . strtoupper(substr($childGenderArray[$k], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($child_count_seminar, 5, '0', STR_PAD_LEFT);
    }

    if ($towards == 'Only day Puja, Ganapatipule') {
      $child_count_puja = $child_count_puja + 1;
      $child_coupon = 'PC' . strtoupper(substr($childGenderArray[$k], 0, 1)) . substr($Date, 8, 2) . substr($Date, 5, 2) . substr($Date, 0, 4) . str_pad($child_count_puja, 5, '0', STR_PAD_LEFT);
    }


    $sqlchild = "INSERT INTO participants (event_id, event_registration_id, name, gender, city, centre,participant_age, participant_type, coupon_number)  VALUES('" . $eventId . "','" . $last_id . "','" . ucfirst($childNameArray[$k]) . "','" . ucfirst($childGenderArray[$k]) . "','" . ucfirst($childCityArray[$k]) . "','" . ucfirst($childCentreArray[$k]) . "','" . ucfirst($childAgeArray[$k]) . "','" . ucfirst($participent_type_child) . "','" . ucfirst($childBadgenoArray[$k]) . "')";
    $resultchild = mysqli_query($conn, $sqlchild);
    if ($resultchild) {
      //  echo "<script> alert('Child record is inserted.'); </script>";
    }
  }

  echo "<script>alert('Record Add Successfuly');</script>";
   echo "<script>location='https://www.sahajayogabharat.org/gpseminar/admin/offline_booking_index.php'</script>";
} else {
  echo "<script>alert('unauthorized request');</script>";
   echo "<script>location='https://www.sahajayogabharat.org/gpseminar/admin/offline_booking_index.php'</script>";
}
