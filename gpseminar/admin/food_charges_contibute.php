<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}

include_once 'header.php';

?>
<style>
a.more {
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">



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
		<h6 class="m-0 font-weight-bold text-primary">Transaction Information <?php echo "";?></h6>
		<!-- <input type="button" onclick="tableToExcel('example', 'W3C Example Table')" class="float-right" value="Export to Excel"> -->
	  </div>
				<?php
				   include_once '../dbConnection.php';
					$ToDate = "";
					$FromDate = "";
					$mobile = "";
					$email = "";

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

						 $transaction_number = $_POST["transaction_number"];
						 $payment_Mode = $_POST["payment_mode"];
						 $pan_number= $_POST["pan_number"];
					     $adhar_number = $_POST["adhar_number"];
						 $contributor_name = $_POST["contributor_name"];
						 $participants_name = $_POST["participants_name"];

						 
						if(!empty($_POST["post_at"])) {
							$FromDate = $_POST["post_at"];
						}
						else{
							$FromDate = date('Y-m-d');
						}
						
						$andParts = array();

						if(!empty($ToDate) && !empty($FromDate))
							 $andParts[] = "Transaction_start_time BETWEEN '". $FromDate ."' AND '" . $ToDate . "'  ";
						
						if(!empty($contributor_name))
							 $andParts[] = "fname = '$contributor_name'"; //participants_name

                        if(!empty($participants_name))
							 $andParts[] = "part_name = '$participants_name'";

						if(!empty($pan_number))
							 $andParts[] = "PAN = '$pan_number'";

						if(!empty($adhar_number))
							 $andParts[] = "Aadhar = '$adhar_number'";

						if(!empty($payment_Mode))
							 $andParts[] = "Payment_mode = '$payment_Mode'";

					    if(!empty($transaction_number))
							 $andParts[] = "Transaction_Number = '$transaction_number'";

					    if(!empty($email))
							 $andParts[] = "Email = '$email'";

						if(!empty($status))
							 $andParts[] = "Status = '$status'";

						if (!empty($mobile))
							 $andParts[] = "Mobile = $mobile";
						
                        // SELECT e_reg.Fname,e_reg.Lname,partc.name,partc.participant_type

						   $queryCondition .= " WHERE ".implode(" AND " , $andParts);
							$sql = "SELECT * from event_food" . $queryCondition . " ORDER BY id desc";

						//$queryCondition .= " WHERE Towards ='" . $product. "' AND Status ='" . $status. "' AND  Email ='" . $email. "' AND   Mobile ='" . $mobile. "' AND  Transaction_start_time BETWEEN '".$ToDate."' AND '" . $FromDate . "'  ";
					}
					else{
					 $status = "Success";
					 $sql = "SELECT * from event_food WHERE Status = 'Success' ORDER BY id desc";
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
							<label for="exampleInputTransNumber">Transaction Number</label>
							<input type="text" placeholder="Transaction Number" class="form-control" id="transaction_number" name="transaction_number" value="<?php echo $transaction_number; ?>"  />
						</div>
					</div>

					<div class="col-sm-3">
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
					</div>

					<div class="col-sm-3">
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
					</div>

					<div class="col-sm-6">
						<div class="form-group">
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label>
							<select name="status" value="" class="form-control" id="status">
							<?php if (is_null($status)) { ?> <option value="" default>Select</option> <?php }else{ ?>
							  <option value = "<?php echo $status; ?>"><?php echo $status; ?></option> <?php } ?>
							  <option value="Success" default>Success</option>
							  <option value="Failed">Failed</option>
							  <option value="Pending">Pending</option>
							  
							</select>
						</div>
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
		
		<input type="button" onclick="tableToExcel('example', 'W3C Example Table')" class="float-left mb-3 mx-2" value="Export to Excel">
		
		<div class="table-responsive">
 
		  <table class="table table-bordered" id="example" width="100%" cellspacing="0">
			<thead>
			  <tr>
				<th>Date</th>
				<th>Participants</th>
				<th>Payer Details</th>
				<th>Transcation Details</th>
				<th>Amount</th>
				
				<th>Receipt</th>
				<!-- <th>Sr. No.</th>
				<th>Transaction Start Date</th>
                <th>Name</th>
				<th>Participants</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Address</th>
				<th>Aadhar</th>
				<th>PAN</th>
				<th>Transaction Id</th>
				<th>Transaction Number</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Payment Towards</th>
				<th>Receipt Number</th>
				<th>Food</th>
				<th>From Date</th>
				<th>To Date</th>
				<th>Saty</th>
				<th>From Date</th>
				<th>To Date</th>
				<th>Payment Mode</th>
				<th>Transaction End Date</th>

				<th>Is Sync With PG</th> -->
				<!-- <th>Badges</th> -->
			  </tr>
			</thead>
			<tbody>
			<?php
				
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId = $row['id'];
			?>
				<tr>
					<td style='white-space: nowrap;'><?php echo date_format(date_create($row["transaction_start_time"]),"d M Y "); ?></td>
					<td style='white-space: nowrap;'>
					
				
								<b>Name: </b><?php echo $row["part_name"]; ?><br>
                                <b>Category: </b><?php echo $row["category"]; ?><br>
                                <b>Gender: </b><?php echo $row["part_gender"]; ?><br>
								<b>Receipt No: </b><?php echo $row["receiptNumber"]; ?><br>
								<b>Food: </b><?php echo $row["food"]; ?><br>
								<?php
								if($row["fromdatefood"] == '')
								{
									?>
									<b>From Date: </b>-<br>
									<b>To Date: </b>-<br>
									<?php
								}
								else
								{
								?>
								<b>From Date: </b><?php echo date_format(date_create($row["fromdatefood"]),"d M Y "); ?><br>
								<b>To Date: </b><?php echo date_format(date_create($row["todatefood"]),"d M Y "); ?><br>
								<?php
								}
								?>
								

								<b>Stay: </b><?php echo $row["stay"]; ?><br>
								<?php
								if($row["fromdatestay"] == '')
								{
									?>
								<b>From Date: </b>-<br>
								<b>To Date: </b>-<br>
								<?php
								}
								else
								{
								?>
								<b>From Date: </b><?php echo date_format(date_create($row["fromdatestay"]),"d M Y "); ?><br>
								<b>To Date: </b><?php echo date_format(date_create($row["todatestay"]),"d M Y ");  ?><br>
								<?php
								}
								?>

					</td>
					<td style='white-space: nowrap;'>
						<b>Name: &nbsp&nbsp&nbsp</b><?php echo $row["fname"]." ".$row["lname"]; ?><br>
						<b>Mobile: &nbsp</b><?php echo $row["mobile"]; ?><br>
						<b>Email: &nbsp&nbsp&nbsp&nbsp</b><?php echo $row["email"]; ?><br>
						<!-- <b>Address: </b><?php echo $row["Address"]." ".$row["Pin"]; ?><br> -->
						<b>Adhar No: </b><?php echo $row["aadhar"]; ?><br>
						<b>PAN No: </b><?php echo $row["pan"]; ?><br>
					</td>
					<td style='white-space: nowrap;'>
						<b>Transaction ID:</b> <?php echo $row["transaction_id"]; ?><br>
						<b>Transaction No:</b><?php echo $row["transaction_Number"]; ?> <br>
						<!-- <b>Transaction Amount: </b><?php echo $row["amount"]; ?> <br> -->
						<b>Transaction Status: </b><?php echo $row["status"]; ?> <br>
						<b>Transaction Towards: </b> <?php echo $row["towards"]; ?><br>
						<b>Reciept No: </b> <?php echo $row["receiptNumber"]; ?><br>
						<b>Payment Mode: </b> <?php echo $row["payment_mode"]; ?><br>
						
					</td>
					<td><?php echo $row["amount"]; ?></td>
					
					<?php 
					if($row["status"] == 'success' or $row["status"] == 'Success')
					{
						?>
					<td>
					    <a href="../reprint-foodReceipt.php?id=<?php echo $row["transaction_id"];?>" target = "blank" class="btn btn-primary" role="button">Download</a>
					</td>
					<?php
					}
					else
					{
						?>
						<td></td>
                        <?php
					}
					?>
				</tr>
			<?php
			// $i++;
					}
				}
			// mysqli_close($conn);
			?>
			</tbody>
			</table>
		</div>


		<div class="table-responsive hide">
		<table class=' table table-bordered hide' id="ex" width="100%" cellspacing="0">
			<thead>
			  <tr>
				<th rowspan='2' style="text-align: center; padding-bottom: 40px;" >Transaction Date and Time</th>
				
				<th colspan="7" style="text-align: center">Participant's Details</th>


				<th colspan='7' style="text-align: center">Payer's Details</th>

				<th colspan='7' style="text-align: center">Transcation Details</th>




			  </tr>
			  <tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Category</th>
                <th>Reciept No.</th>
				<th>Food Charge</th>
                <th>From Date</th>
                <th>To Date</th>

                <th>Stay Charge</th>
                <th>From Date</th>
                <th>To Date</th>
                

	


				<th>First Name</th>
				<th>Last Name</th>
				<th>Mobile</th>
				<th>Email</th>
			
				<th>PAN</th>
				<th>Aadhar</th>

				
				<th>Transaction Id</th>
				<th>Transaction Number</th>
				<th>Transaction Status</th>
				<th>Payment Mode</th>
				<th>Payment Towards</th>
				<th>Total Amount</th>
				
				
				
			  </tr>
			</thead>
			<tbody>
			<?php
				$result->data_seek(0);
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId2 = $row['id'];
					
			?>
				<tr>
					<td style='white-space: nowrap;'><?php echo $row["transaction_start_time"].' '.$row['time']; ?></td>
					   

                        <td><?php echo $row["part_name"]; ?></td>
						<td><?php echo $row["part_gender"]; ?></td>
						<td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["receiptNumber"]; ?></td>

                        <td><?php echo $row["food"]; ?></td>
                        <td><?php echo $row["fromdatefood"]; ?></td>
                        <td><?php echo $row["todatefood"]; ?></td>
                        <td><?php echo $row["stay"]; ?></td>
                        <td><?php echo $row["fromdatestay"]; ?></td>
                        <td><?php echo $row["todatestay"]; ?></td>




					
						<td><?php echo $row["fname"]; ?></td>
						<td><?php echo $row["lname"]; ?></td>
						<td><?php echo $row["mobile"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["pan"]; ?></td>
						<td><?php echo $row["aadhar"]; ?></td>

						
						<td><?php echo $row["transaction_id"]; ?></td>
						<td><?php echo $row["transaction_Number"]; ?></td>
						<td><?php echo $row["status"]; ?></td>
						<td><?php echo $row["payment_mode"]; ?></td>
						<td><?php echo $row["towards"]; ?></td>
						<td><?php echo $row["amount"]; ?></td>
						

					
					    
					</td>
					
				</tr>
			<?php
			// $i++;
					}
				}
			// mysqli_close($conn);
			?>
			</tbody>
		  </table>
		</div>
	  </div>
	</div>
</div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-01" ; 

var lasdDate = new Date(year, date.getMonth()+1, 0);
var lastDayOfMonth = year + "-" + month + "-" +lasdDate.getDate();
var fromDate = document.getElementById("post_at").value ;
var toDate = document.getElementById("post_to").value ;

if(fromDate == "" || toDate == "" ){
	 document.getElementById("post_at").value = today;
	document.getElementById("post_to").value = lastDayOfMonth;
} 

$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>

<script>
$(document).ready(function () {
    $('#').DataTable({
		"pageLength": 3,
		"bLengthChange": false,
		"bFilter": true,
		"scrollX": true,
		dom: 'Bfrtip',
		
    });
});
</script> 

 <script type="text/javascript">
// var tableToExcel = (function() {
//   var uri = 'data:application/vnd.ms-excel;base64,'
//     , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
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
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById('ex')
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
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
