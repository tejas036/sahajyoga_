<?php

require_once('../function.php');
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET['reg_id']))
{
  $event_reg_id=$_GET['reg_id'];
}
else{
  $event_reg_id="";
  // echo"<script>window.location.href='even'</script>";  
}

include_once '../dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pid'])) {
    // Get values from the form
    $pid = $_POST['pid'];
    $badgesno = $_POST['badgesno'];
    $badges_issuer = $_POST['badges_issuer'];
    $badges_receiver = $_POST['badges_receiver'];

    // SQL query to update records in the database
    $updateSql = "UPDATE participants SET coupon_number = '$badgesno', badges_issuer = '$badges_issuer', badges_receiver = '$badges_receiver' WHERE id = '$pid'";

    // Execute the SQL query
    if ($conn->query($updateSql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}


$sql = "SELECT * FROM participants where event_registration_id ='" . $event_reg_id . "'";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM event_registration where event_registration_id ='" . $event_reg_id . "'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga</title>
	
	<link rel="stylesheet" href="../assets/demo.css">
	<link rel="stylesheet" href="../assets/form-basic.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="../assets/dynamicAction.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >

</head>
<body>

<div class="container">
	<h1 class="text-center my-5" >Add Badges No</h1>
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card card-default">
					<form  method="post" action="#">
					<div class="card-body">
						<div class="form-row">

						<center><h5>Towards:-<?php echo $row1['Towards'] ?></h5></center>

						<table class="table table-striped b-t b-b">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Type</th>
                                    <th>Badges No</th>
                                    <th>Badge Issuer Name</th>
                                    <th>Badge Receiver Name</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$index = 0;
                            while ($row = $result->fetch_assoc()) 
                            {
                            ?>

                                    <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['participant_type']; ?></td> 
									<td>
									    <input type="hidden" class="form-control" name="pid_<?php echo $index; ?>" id="pid_<?php echo $index; ?>" value="<?php  echo $row['id']; ?>" readonly >
										<input type="text" class="form-control" name="badgesno_<?php echo $index; ?>" id="badgesno_<?php echo $index; ?>" value="<?php echo $row['coupon_number']; ?>">
									</td> 
									<td><input type="text" class="form-control" name="badges_issuer_<?php echo $index; ?>" id="badges_issuer_<?php echo $index; ?>" value="<?php echo $row['badges_issuer']; ?>"></td> 
									<td><input type="text" class="form-control" name="badges_receiver_<?php echo $index; ?>" id="badges_receiver_<?php echo $index; ?>" value="<?php echo $row['badges_receiver']; ?>"></td> 
									<td>
										<?php
								// 		if($row['coupon_number'] == "")
								// 		{
											?>
                                           <button type="button" id="btn1" onclick="submitRow(<?php echo $index; ?>,<?php echo $row['id']; ?>)" value="<?php echo $row['id']; ?>" class="btn btn-xs btn-info">Save</button>
											<?php
								// 		}
								// 		else
								// 		{
								// 			echo "Badge No Allocated";
								// 		}
										?>
									
									</td>
									</tr>
                            <?php
							   $index++;
                            }
                            ?>
							   </tbody>
                        </table>
							
						</div>
						
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    function submitRow(rowIndex, pid) {

      var pid = $("#pid_" + rowIndex).val();
      var badgesno = $("#badgesno_" + rowIndex).val();
      var badges_issuer = $("#badges_issuer_" + rowIndex).val();
      var badges_receiver = $("#badges_receiver_" + rowIndex).val();

      //alert(files);


      $.ajax({
        type: "POST",
        url: "addbadges.php",
        data: {
			pid: pid,
			badgesno: badgesno,
			badges_issuer: badges_issuer,
			badges_receiver: badges_receiver,
         
        },
       
        success: function(data) {
          alert('Record Update Successfully');

          load_data();

          // url = '<?php echo $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>';
          // window.location = url;
        }

      });



    }
  </script>
</body>
</html>