<?php
include_once '../dbConnection.php';

$sql = "SELECT * FROM symumbai.event_registration";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $eventRegId = $row['event_registration_id'];
        echo $eventRegId . "<br>" ;
        $aCountSql = "SELECT count(event_registration_id) FROM symumbai.participants where participant_type='Adult' and event_registration_id='$eventRegId'";
        $result1 = $conn->query($aCountSql);
        $aCount = $result1->fetch_assoc()['count(event_registration_id)'];

        // echo $aCount;
        // echo '<br>';
        $yCountSql = "SELECT count(event_registration_id) FROM symumbai.participants where participant_type='Yuva' and event_registration_id='$eventRegId'";
        $result2 = $conn->query($yCountSql);
        $yCount = $result2->fetch_assoc()['count(event_registration_id)'];
        
        // echo $yCount;
        // echo '<br>';

        $cCountSql = "SELECT count(event_registration_id) FROM symumbai.participants where participant_type='Child' and event_registration_id='$eventRegId'";
        $result3 = $conn->query($cCountSql);
        $cCount = $result3->fetch_assoc()['count(event_registration_id)'];
        
        // echo $cCount;
        // echo '<br>';

        $SQlUpdate = "update event_registration set count_adult='$aCount', count_yuva='$yCount', count_child='$cCount' where event_registration_id='$eventRegId'";
        // echo $SQlUpdate;
        $resultFinal = $conn->query($SQlUpdate);
    }
}

?>