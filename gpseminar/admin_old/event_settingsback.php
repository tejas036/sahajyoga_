<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once '../dbConnection.php';

$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$contribution_towards = $_POST['contribution_towards'];
$event_start = $_POST['event_start'];
$venue = $_POST['venue'];
$event_end = $_POST['event_end'];
$adult1= $_POST['adult1'];
$cutoff1 = $_POST['cutoff1'];
$yuva1 = $_POST['yuva1'];
$child1 = $_POST['child1'];
$adult2 = $_POST['adult2'];
$cutoff2 = $_POST['cutoff2'];
$yuva2 = $_POST['yuva2'];
$child2 = $_POST['child2'];

// $date = date('Y-m-d',strtotime('-7 days',$date));
// echo $event_date . "<br>";
$event_date = date('Y-m-d', strtotime($event_date));
$event_start = date('Y-m-d', strtotime($event_start));
$event_end = date('Y-m-d', strtotime($event_end));
$cutoff2 = date('Y-m-d', strtotime($cutoff2));
// echo $event_date;
// echo "Evennt Name : " . $event_name;
// echo "Evennt Date : " . $event_date;

$sql1 = "insert into symumbai.events_new (name,event_date,contribution_toward,venue,startdate,enddate) values('$event_name','$event_date','$contribution_towards','$venue','$event_start','$event_end')";
$result1 = $conn->query($sql1);
$sql2 = "SELECT event_id FROM symumbai.events_new where name='$event_name'";
$result2 = $conn->query($sql2);
$event_id =  $result2->fetch_assoc()['event_id'];
// echo "<br>" .$event_id. "<br>";
$sql3 = "insert into symumbai.event_settings (event_id,cuttoffdate,adult,yuva,child) values($event_id,'$cutoff1','$adult1','$yuva1','$child1')";
$result3 = $conn->query($sql3);
$sql4 = "insert into symumbai.event_settings (event_id,cuttoffdate,adult,yuva,child) values($event_id,'$cutoff2','$adult2','$yuva2','$child2')";
$result4 = $conn->query($sql4);
// echo $sql3;
$conn->close();
header("Location: ../admin/event_settings.php");
?>