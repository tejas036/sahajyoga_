<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once '../dbConnection.php';
$sql1 = "SELECT * FROM symumbai.user_event";
$result1 = $conn->query($sql1);

// $fetchdata = array();

// print_r($fetchdata);
// while ($row = $result1->fetch_assoc()) {
//     $fetchdata['data'][]= array(
//         'ID'=>$row['id'],
//         'EMAIL' => $row['email'],
//         'NAME'=> $row['firstname'] . " " . $row['lastname'],
//         'MOBILE' => $row['mobile'],
//         'CITY' => $row['city'],
//     );
// }
// // $fntt = $fetchdata = array('data'=>$fetchdata);
// print_r(json_encode($fetchdata));
?>
<?php
while ($row =$result1->fetch_assoc()) {

$item = array();

    $item["id"] = $row['id'];
    $item['name'] = $row['firstname'] . " " . $row['lastname'];
    $item["email"] = $row['email'];
    $item["mobile"] = $row['mobile'];
    $item['city']=$row['city'];
    $item['login_history']=$row['login_history'];


    $output[] = $item;

    }

$out = array('data' => $output);
echo json_encode($out);
?>