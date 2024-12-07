<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}

include_once 'header.php';

if(isset($_GET['eid']))
{
    $et=$_GET['eid'];
    if($et=="1")
    {
       $cpeventtype="&& Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
       $head="for International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule";
    }
    else if($et=="2")
    {
        $cpeventtype="&& Towards='Only day Puja, Ganapatipule'";
        $head="for Only day Puja, Ganapatipule";
    }
}
else{
    $cpeventtype="";
    $head="";
}


?>
<style>
a.more {
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>

<style>
	/* #example > table > td {
		white-space: nowrap;
	} */
	.hide {
  display: none;
}
</style>



<div class="container-fluid">
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Transaction Information <?php echo $head;?></h6>
		<!-- <input type="button" onclick="tableToExcel('example', 'W3C Example Table')" class="float-right" value="Export to Excel"> -->
	  </div>
				<?php
				   include_once '../dbConnection.php';
				   
				   //$yesterdayDate = date('Y-m-d',strtotime("-1 days"));
				   $yesterdayDate = "2023-08-12";
                     $todayDate = date('Y-m-d');
				   
					$ToDate =  $todayDate;
					$FromDate = $yesterdayDate;
					$mobile = "";
					$email = "";
					$product = "";
					$queryCondition = "";
					$status = 'Success';
					$transaction_number = "";
					$payment_Mode = "";
					$pan_number= "";
					$adhar_number = "";
					$contributor_name = "";
					$participants_name = "";
					
					
					if(!empty($_POST["search"])) {
			
						 $ToDate = $_POST["post_to"];
						 $mobile = $_POST["mobile"];
						 $email = $_POST["email"];
						 $status = $_POST["status"];
						// $product = $_POST["product"];
						 $transaction_number = $_POST["transaction_number"];
						//  $payment_Mode = $_POST["payment_mode"];
						//  $pan_number= $_POST["pan_number"];
					    //  $adhar_number = $_POST["adhar_number"];
						//  $contributor_name = $_POST["contributor_name"];
						//  $participants_name = $_POST["participants_name"];

						 
						if(!empty($_POST["post_at"])) {
							$FromDate = $_POST["post_at"];
						}
						else{
							$FromDate = date('Y-m-d');
						}
						
						$andParts = array();

						if(!empty($ToDate) && !empty($FromDate))
							 $andParts[] = "Transaction_start_time BETWEEN '". $FromDate ."' AND '" . $ToDate . "'  ";
						

					    if(!empty($transaction_number))
							 $andParts[] = "Transaction_Number = '$transaction_number'";

					    if(!empty($email))
							 $andParts[] = "Email = '$email'";

						if(!empty($status))
							 $andParts[] = "Status = '$status'";

						if (!empty($mobile))
							 $andParts[] = "Mobile = $mobile";

						   $queryCondition .= " WHERE ".implode(" AND " , $andParts)." and paymenttype is NULL";
							$sql = "SELECT * from event_registration inner join participants on participants.event_registration_id = event_registration.event_registration_id " . $queryCondition . " group by event_registration.event_registration_id ORDER BY event_registration.event_registration_id desc";
                           
                            //   echo $sql;
						//$queryCondition .= " WHERE Towards ='" . $product. "' AND Status ='" . $status. "' AND  Email ='" . $email. "' AND   Mobile ='" . $mobile. "' AND  Transaction_start_time BETWEEN '".$ToDate."' AND '" . $FromDate . "'  ";
					}
					else{
					 $status = "Success";
					 
					 $sql = "SELECT * from event_registration WHERE Status = 'Success' and paymenttype is NULL  and Transaction_start_time between '$yesterdayDate' and '$todayDate'  $cpeventtype    ORDER BY event_registration_id desc";
					}
					$result = $conn->query($sql);
				?>
	  <div class="card-body">
	  
		<div class="card card-default">
			<div class="card-header">
				Search  
			</div>
			<div class="card-body">
			
				
				<form name="frmSearch" method="post" action="#">
				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputEmail1">From Date</label>
							<input type="date" class="form-control" value= "<?php echo $FromDate; ?>" placeholder="From Date" id="post_at" name="post_at"  />
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputEmail1">To Date</label>
							<input type="date" class="form-control" value= "<?php echo $ToDate; ?>" placeholder="To Date" id="post_to" name="post_to"  />
						</div>
					</div>
					
				<!--	<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputPassword1">To Date</label>
							<input type="date" value= "<?php echo $ToDate; ?>" class="form-control"  placeholder="To Date" id="post_to" name="post_to"  />			 		
						</div>		
					</div> -->
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Mobile No</label>
							<input type="text" placeholder="Mobile No" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>"  />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputPassword1">Email</label>
							<input type="email" placeholder="Email" class="form-control" id="mobile" name="email" value="<?php echo $email; ?>"  />
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputTransNumber">Bank Reference No</label>
							<input type="text" placeholder="Transaction Number" class="form-control" id="transaction_number" name="transaction_number" value="<?php echo $transaction_number; ?>"  />
						</div>
					</div>

					<!-- <div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputPaymentMode">Payment Mode</label>
							<input type="text" placeholder="Payment Mode" class="form-control" id="payment_mode" name="payment_mode" value="<?php echo ''; ?>"  />
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputName">Contributor Name</label>
							<input type="text" placeholder="Contributor Name" class="form-control" id="contributor_name" name="contributor_name" value="<?php echo ''; ?>"  />
						</div>
					</div> -->

					<!-- <div class="col-sm-3">
						<div class="form-group">
							<label for="participants_name">Participant Name</label>
							<input type="text" placeholder="Participant Name" class="form-control" id="participants_name" name="participants_name" value="<?php echo ''; ?>"  />
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputPANNumber">PAN Number</label>
							<input type="text" placeholder="PAN Number" class="form-control" id="pan_number" name="pan_number" value="<?php echo ''; ?>"  />
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputAdharNumber">Aadhar Number</label>
							<input type="text" placeholder="Adhar_number" class="form-control" id="adhar_number" name="adhar_number" value="<?php echo ''; ?>"  />
						</div>
					</div> -->
					
					<!-- <div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Towards</label>
							<select name="product"  class="form-control" id="product">
							  <option value="" <?php if($product == '') { echo 'selected'; } ?> disabled>All</option> 
							  <option value="International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule" <?php if ($product == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule') {
                              echo 'selected';} ?>>International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule</option>
							  <option value="Only day Puja, Ganapatipule" <?php if ($product == 'Only day Puja, Ganapatipule') {
                              echo 'selected';} ?>>Only day Puja, Ganapatipule</option>
							</select>
						</div>
					</div> -->
					

				
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label>
							<select name="status" value="" class="form-control" id="status">
							   <option value="" <?php if ($status == '') {
	                               echo 'selected'; } ?> disabled>select</option> 
							   <option value="Success" <?php if ($status == 'Success') {
	                               echo 'selected'; } ?>>Success</option> 
							  <option value="Failed" <?php if ($status == 'Failed') {
	                               echo 'selected'; } ?>>Failed</option>
							  <option value="Pending" <?php if ($status == 'Pending') {
	                               echo 'selected'; } ?>>Pending</option>
							  
							</select>
						</div>
					</div>
				</div>
		
		
			</div>
			<div class="card-footer" style="background-color: #ecedf0;">
			    
			   
				<input type="submit" class="float-right" name="search" value="Search" > 
			</div>
		</div>
		<br />
		<br />	
		
		<input type="button" onclick="tableToExcel()" class="float-left mb-3 mx-2" value="Export Payment MIS Report">
		
		<div class="table-responsive">

		<table class="table table-bordered table-sm" style="color:black;" border="1" id="example" width="100%" cellspacing="0">
			<thead>
			  <tr>
				<th>Date</th>
				<th>Payer Name</th>
				<th>Payer Email</th>
				<th>Mobile No</th>
				<th>Amount</th>
				<th>Transcation Date</th>
				<th>Transcation ID</th>
				<th>Status</th>
				<th>Payment Mode</th>
				<th>Bank Reference No</th>
				<th>Receipt No</th>
				<th>Print Receipt</th>
				
				
			  </tr>
			</thead>
			<tbody>
			<?php
				
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId = $row['event_registration_id'];
			?>
				<tr>
					<td style='white-space: nowrap;'><?php echo $row["Transaction_start_time"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Fname"] ." ". $row["Lname"] ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Email"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Mobile"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Amount"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Transaction_end_time"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Transaction_id"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Status"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Payment_mode"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["Transaction_Number"]; ?></td>
					<td style='white-space: nowrap;'><?php echo $row["receiptNumber"]; ?></td>
					<?php 
					if($row["Status"] == 'Success')
					{
						?>
					<td style='white-space: nowrap;'>
					<a href="printreceipt.php?trans_id=<?php echo $row["Transaction_id"];?>" target = "blank" class="btn btn-primary" role="button">print</a>
				    </td>
					<?php
					}
					else
					{
						?>
						<td style='white-space: nowrap;'>
					
				    </td>
						<?php
					}
					?>
				</tr>
			<?php
			
					}
				}
			// mysqli_close($conn);
			?>
			</tbody>
			</table>
		</div>



		
		<div class="table-responsive hide">
		<table class='table table-bordered hide' id="ex" width="100%" cellspacing="0">
			<thead>

			<tr>
				<th colspan="10" style="text-align: center"></th>
				<th colspan="5" style="text-align: center">Adult</th>
				<th colspan="5" style="text-align: center">Yuva</th>
				<th colspan="5" style="text-align: center">Child</th>
				<th colspan='4' style="text-align: center">Total Registeration</th>

			  </tr>
			  <tr>
				<th>Transection Date</th>
				<th>Payer Name</th>
				<th>Payer Email</th>
				<th>Payer Mobile</th>
				<th>Payer Pan No</th>
				<th>Transection ID</th>
				<th>Status</th>
				<th>Payment Mode</th>
				<th>Bank Reference No</th>
				<th>Receipt No</th>

				<th>Male</th>
				<th>Female</th>
				<th>No.of Total Adult</th>
				<th>Amount</th>
				<th>Total Adult Contribution </th>

				<th>Male</th>
				<th>Female</th>
				<th>No.of Total Yuva</th>
				<th>Amount</th>
				<th>Total Yuva Contribution </th>

				<th>Male</th>
				<th>Female</th>
				<th>No.of Total Child</th>
				<th>Amount</th>
				<th>Total Child Contribution </th>


				<th>Total Male</th>
				<th>Total Female</th>
				<th>Total Registeration</th>
				<th>Total Contribution</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				$result->data_seek(0);
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId2 = $row['event_registration_id'];

					$towards = $row['Towards'];

					
			?>

         <tr>
					<td><?php echo $row["Transaction_start_time"].' '.$row['time']; ?></td>
					<td><?php echo $row["Fname"] ." ". $row["Lname"]; ?></td>
					<td><?php echo $row["Email"]; ?></td>
					<td><?php echo $row["Mobile"]; ?></td>
					<td><?php echo $row["PAN"]; ?></td>
					<td><?php echo $row["Transaction_id"]; ?></td>
					<td><?php echo $row["Status"]; ?></td>
					<td><?php echo $row["Payment_mode"]; ?></td>
                    <td><?php echo $row["Transaction_Number"]; ?></td>
					<td><?php echo $row["receiptNumber"]; ?></td>
          
        
			<td>
		   <?PHP 
			$male = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Male' and participant_type='Adult'";
			$maleresult = $conn->query($male)->fetch_assoc();			
		    echo $maleresult['Count(*)'];              
            ?>
          </td>	

		  <td>
		   <?PHP 
			$Female = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Female' and participant_type='Adult'";
			$Femaleresult = $conn->query($Female)->fetch_assoc();			
		    echo $Femaleresult['Count(*)'];              
            ?>
          </td>	

		  <td><?php echo $row["count_adult"]; ?></td>
		  <td>
			<?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount= 4000;
				 }
				 else
				 {
				echo $adultcount= 1000;
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad= 5000;
				 }
				else
				 {
				echo $adultcountad= 1000;
				 }
			}
			
			?>
		  </td>
		  <td>
		  <?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount=$row["count_adult"] * 4000;
				 }
				 else
				 {
				echo $adultcount=$row["count_adult"] * 1000;
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad=$row["count_adult"] * 5000;
				 }
				else
				 {
				echo $adultcountad=$row["count_adult"] * 1000;
				 }
			}
			
			?>
		  </td>
          
          	
		  <td>
		   <?PHP 
			$male = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Male' and participant_type='Yuva'";
			$maleresult = $conn->query($male)->fetch_assoc();			
		    echo $maleresult['Count(*)'];              
            ?>
          </td>	

		  <td>
		   <?PHP 
			$Female = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Female' and participant_type='Yuva'";
			$Femaleresult = $conn->query($Female)->fetch_assoc();			
		    echo $Femaleresult['Count(*)'];              
            ?>
          </td>	

		  <td><?php echo $row["count_yuva"]; ?></td>
		  <td>
			<?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount= 3000;
				 }
				 else
				 {
				echo $adultcount= 1000;
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad= 4000;
				 }
				 else
				 {
				echo $adultcountad= 1000;
				 }
			}
			
			?>
		  </td>
		  <td>
		  <?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount=$row["count_yuva"] * 3000;
				 }
				 else
				 {
				echo $adultcount=$row["count_yuva"] * 1000;
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad=$row["count_yuva"] * 4000;
				 }
				 else
				 {
				echo $adultcountad=$row["count_yuva"] * 1000;
				 }
			}
			
			?>
		  </td>


		  <td>
		   <?PHP 
			$male = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Male' and participant_type='Child'";
			$maleresult = $conn->query($male)->fetch_assoc();			
		    echo $maleresult['Count(*)'];              
            ?>
          </td>	

		  <td>
		   <?PHP 
			$Female = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Female' and participant_type='Child'";
			$Femaleresult = $conn->query($Female)->fetch_assoc();			
		    echo $Femaleresult['Count(*)'];              
            ?>
          </td>	

		  <td><?php echo $row["count_child"]; ?></td>
		  <td>
			<?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount= 2000;
				 }
				 else
				 {
				echo $adultcount= 1000;
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad= 2500;
				 }
				 else
				 {
				echo $adultcountad= 1000;
				 }
			}
			
			?>
		  </td>
		  <td>
		  <?php 
			if('2023-12-12' > $row["Transaction_start_time"])
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcount=$row["count_child"] * 2000;
				 }
				 else
				 {
				echo $adultcount=$row["count_child"] * 1000;	
				 }
			}
			else
			{
				if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                 {
				echo $adultcountad=$row["count_child"] * 2500;
				 }
				 else
				 {
				echo $adultcountad=$row["count_child"] * 1000;	
				 }
			}
			
			?>
		  </td>


		  <td>
		   <?PHP 
			$male = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Male'";
			$maleresult = $conn->query($male)->fetch_assoc();			
		    echo $maleresult['Count(*)'];              
            ?>
          </td>	

		  <td>
		   <?PHP 
			$Female = "SELECT Count(*) FROM participants where event_registration_id = '$regId2' and gender='Female'";
			$Femaleresult = $conn->query($Female)->fetch_assoc();			
		    echo $Femaleresult['Count(*)'];              
            ?>
          </td>	

		  <td><?php echo $row["count_adult"]+$row["count_yuva"]+$row["count_child"]; ?></td>
		  <td><?php echo $row["Amount"]; ?></td>
          
				</tr>
			<?php
				}
                }
			?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>

				<td>
				<?PHP 
				$Tmale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Male" and participants.participant_type="Adult"';
				$Tmaleresult = $conn->query($Tmale)->fetch_assoc();			
				echo $Tmaleresult['Count(*)'];              
				?>
				</td>

				<td>
				<?PHP 
				$TFemale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Female" and participants.participant_type="Adult"';
				$TFemaleresult = $conn->query($TFemale)->fetch_assoc();			
				echo $TFemaleresult['Count(*)'];             
				?>
				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_adult) from event_registration 
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				echo $TTFemaleresult['sum(count_adult)'];             
				?>
				</td>

				<td>

				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_adult) from event_registration  
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				
				if('2023-12-12' > $row["Transaction_start_time"])
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                     {
					echo $TTFemaleresult['sum(count_adult)'] * 4000;
				     }
					 else
					 {
					echo $TTFemaleresult['sum(count_adult)'] * 1000;	
					 }
				}
				else
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                     {
					echo $TTFemaleresult['sum(count_adult)'] * 5000;
					 }
					 else
					 {
					echo $TTFemaleresult['sum(count_adult)'] * 1000;
					 }
				}            
				?>
				</td>



				<td>
				<?PHP 
				$Tmale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Male" and participants.participant_type="Yuva"';
				$Tmaleresult = $conn->query($Tmale)->fetch_assoc();			
				echo $Tmaleresult['Count(*)'];              
				?>
				</td>

				<td>
				<?PHP 
				$TFemale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Female" and participants.participant_type="Yuva"';
				$TFemaleresult = $conn->query($TFemale)->fetch_assoc();			
				echo $TFemaleresult['Count(*)'];             
				?>
				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_yuva) from event_registration 
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				echo $TTFemaleresult['sum(count_yuva)'];             
				?>
				</td>

				<td>

				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_yuva) from event_registration  
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				
				if('2023-12-12' > $row["Transaction_start_time"])
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                     {
					echo $TTFemaleresult['sum(count_yuva)'] * 3000;
					 }
					 else
					 {
				    echo $TTFemaleresult['sum(count_yuva)'] * 1000;	
					 }
				}
				else
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
					{
					echo $TTFemaleresult['sum(count_yuva)'] * 4000;
					}
					else
					{
					echo $TTFemaleresult['sum(count_yuva)'] * 1000;	
					}
				}            
				?>
				</td>


				<td>
				<?PHP 
				$Tmale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Male" and participants.participant_type="Child"';
				$Tmaleresult = $conn->query($Tmale)->fetch_assoc();			
				echo $Tmaleresult['Count(*)'];              
				?>
				</td>

				<td>
				<?PHP 
				$TFemale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Female" and participants.participant_type="Child"';
				$TFemaleresult = $conn->query($TFemale)->fetch_assoc();			
				echo $TFemaleresult['Count(*)'];             
				?>
				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_child) from event_registration 
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				echo $TTFemaleresult['sum(count_child)'];             
				?>
				</td>

				<td>

				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_child) from event_registration  
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				
				if('2023-12-12' > $row["Transaction_start_time"])
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
					{
					echo $TTFemaleresult['sum(count_child)'] * 2000;
					}
					else
					{
					echo $TTFemaleresult['sum(count_child)'] * 1000;	
					}
				}
				else
				{
					if($towards == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
					{
					echo $TTFemaleresult['sum(count_child)'] * 2500;
					}
					else
					{
					echo $TTFemaleresult['sum(count_child)'] * 1000;	
					}
				}            
				?>
				</td>
			

				
			<td>
				<?PHP 
				$Tmale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Male"';
				$Tmaleresult = $conn->query($Tmale)->fetch_assoc();			
				echo $Tmaleresult['Count(*)'];              
				?>
				</td>

				<td>
				<?PHP 
				$TFemale = 'SELECT Count(*) from event_registration 
				inner join participants on participants.event_registration_id = event_registration.event_registration_id 
				'. $queryCondition .' and participants.gender="Female"';
				$TFemaleresult = $conn->query($TFemale)->fetch_assoc();			
				echo $TFemaleresult['Count(*)'];             
				?>
				</td>

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(count_yuva),sum(count_adult),sum(count_child) from event_registration 
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				echo $TTFemaleresult['sum(count_yuva)']+$TTFemaleresult['sum(count_adult)']+$TTFemaleresult['sum(count_child)'];             
				?>
				</td>

				

				<td>
				<?PHP 
				$TTFemale = 'SELECT sum(Amount) from event_registration  
				'. $queryCondition .'';
				$TTFemaleresult = $conn->query($TTFemale)->fetch_assoc();			
				echo $TTFemaleresult['sum(Amount)'];             
				?>
				</td>
				

			</tr>

			</tbody>
		  </table>
		</div>




	  </div>
	</div>
</div>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<script>
    $(document).ready(function () {
        $('#example').DataTable({
 			"pageLength": 5,
			"bLengthChange": false,
			"bFilter": true,
			"scrollX": true,
			dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
            ]
        });
    });
  </script>

 <script type="text/javascript">
// var tableToExcel = (function() {
//   var uri = 'data:application/vnd.ms-excel;base64,'
//     , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="https://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
//     , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
//     , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
//   return function(table, name) {
//     if (!table.nodeType) table = document.getElementById(table)
//     var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
//     window.location.href = uri + base64(format(template, ctx))
//   }
// })()
</script> 

<script type="text/javascript">
var d = new Date();
var datestring = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear() ;
var tableToExcel = (function () {
        var table = document.getElementById('ex');
        var encabezado = '<html><head><meta http-equiv="content-type"  content="text/plain; charset=UTF-8"/><style> table, td {border:thin solid black} table {border-collapse:collapse}</style></head><body><table>';
  
  var dataTable = table.innerHTML
  var piePagina = "</table></body></html>";
  var tabla = encabezado + dataTable + piePagina;
  var myBlob =  new Blob( [tabla] , {type:'text/html'});
  var url = window.URL.createObjectURL(myBlob);
  var a = document.createElement("a");
  document.body.appendChild(a);
  a.href = url;
  a.download = "Payment MIS Report - "+datestring+".xls";
  a.click();
  
  setTimeout(function() {window.URL.revokeObjectURL(url);},0);

});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

<!-- /.container-fluid -->
<?php
include_once 'footer.php';
?>
