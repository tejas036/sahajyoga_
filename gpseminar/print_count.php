<?php
include_once 'dbConnection.php';

session_start();
$roles = $_SESSION["roles"];
$badgesFor = $_POST['badges'];

// echo $id . $roles . $badgesFor;
if($roles == 'admin' && $badgesFor == 'all'){
    
    $id = $_POST['eregId'];
    // echo $id;
    $sql1 = "select print_count_admin from event_registration_rahuri where event_registration_id='" . $id . "'";
    $result1 = $conn->query($sql1);
    $result1 = $result1->fetch_assoc();
    $printCount = $result1['print_count_admin'];
    
    // echo $printCount;

    if($printCount >= 0 ){
        $inDbCOunt = $printCount + 1;
        $sql2 = "update event_registration_rahuri set print_count_admin ='" . $inDbCOunt . "' where event_registration_id='" . $id . "'";
        $result2 = $conn->query($sql2);
        
        $sql3 = "update participants_rahuri set print_count_admin ='" . $inDbCOunt . "' where event_registration_id='" . $id . "'";
        $result3 = $conn->query($sql3);
        
        echo "yes";
    }
    else{
        echo "yes";
    }
    
}

if($roles == 'operator' && $badgesFor == 'all'){
    
    $id = $_POST['eregId'];
    
    $sql1 = "select print_count from event_registration_rahuri where event_registration_id='" . $id . "'";
    $result1 = $conn->query($sql1);
    $result1 = $result1->fetch_assoc();
    $printCount = $result1['print_count'];

    if($printCount < 1 ){
        $inDbCOunt = $printCount + 1;
        $sql2 = "update event_registration_rahuri set print_count ='" . $inDbCOunt . "' where event_registration_id='" . $id . "'";
        $result2 = $conn->query($sql2);
        $sql3 = "update participants_rahuri set print_count ='" . $inDbCOunt . "' where event_registration_id='" . $id . "'";
        $result3 = $conn->query($sql3);
        echo "yes";
    }
    else{
        echo "no";
    }
    
}

if($roles == 'admin' && $badgesFor == 'one'){
    
    $coupon_number = $_POST['couponNo'];
    // echo $coupon_number;
    $sql1 = "select print_count_admin,event_registration_id from participants_rahuri where coupon_number='" . $coupon_number . "'";
    // echo $sql1
    $result1 = $conn->query($sql1);
    $result1 = $result1->fetch_assoc();
    $printCount = $result1['print_count_admin'];
    $eregId = $result1['event_registration_id'];
    
    // echo $printCount;

    if($printCount >=0 ){
        $inDbCOunt = $printCount + 1;
        $sql2 = "update participants_rahuri set print_count_admin ='" . $inDbCOunt . "' where coupon_number='" . $coupon_number . "'";
        $result2 = $conn->query($sql2);
        echo "yes";
    }
    else{
        echo "yes";
    }
}

if($roles == 'operator' && $badgesFor == 'one'){
    
    $coupon_number = $_POST['couponNo'];
    $sql1 = "select print_count,event_registration_id from participants_rahuri where coupon_number='" . $coupon_number . "'";
    $result1 = $conn->query($sql1);
    $result1 = $result1->fetch_assoc();
    $printCount = $result1['print_count'];
    $eregId = $result1['event_registration_id'];
    
    $sqlereg = "select print_count from event_registration_rahuri where event_registration_id='" . $eregId . "'";
    $resultreg = $conn->query($sqlereg);
    $resultreg = $resultreg->fetch_assoc();
    $printCountreg = $resultreg['print_count'];

    if($printCount < 1 && $printCountreg == 0){
        $inDbCOunt = $printCount + 1;
        $sql2 = "update participants_rahuri set print_count ='" . $inDbCOunt . "' where coupon_number='" . $coupon_number . "'";
        $result2 = $conn->query($sql2);
        echo "yes";
    }
    else{
        echo "no";
    }
}
?>