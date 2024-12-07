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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<div class="container-fluid">
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Transaction Information</h6>
		<input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" class="float-right" value="Export to Excel">
	  </div>
				<?php
				   include_once '../dbConnection.php';
					$ToDate = "";
					$FromDate = "";
					$mobile = "";
					$email = "";
					$product = "";
					$queryCondition = "";
					$status = 'Success';
					
					if(!empty($_POST["search"])) {
			
						 $ToDate = $_POST["post_to"];
						 $mobile = $_POST["mobile"];
						 $email = $_POST["email"];
						 $status = $_POST["status"];
						 $product = $_POST["product"];
						 
						

						if(!empty($_POST["post_at"])) {
							$FromDate = $_POST["post_at"];
						}
						else{
							$FromDate = date('Y-m-d');
						}
						
						$andParts = array();

						if(!empty($ToDate) && !empty($FromDate))
							 $andParts[] = "Transaction_start_time BETWEEN '". $FromDate ."' AND '" . $ToDate . "'  ";
							
						if(!empty($email))
							 $andParts[] = "Email = '$email'";

						if(!empty($status))
							 $andParts[] = "Status = '$status'";

						if (!empty($mobile))
							 $andParts[] = "Mobile = $mobile";
						
						if (!empty($product))
							 $andParts[] = "Towards = '$product'";

						if (!empty($andParts))
						   $queryCondition .= " WHERE ".implode(" AND " , $andParts);
							$sql = "SELECT * from transactions " . $queryCondition . " AND  Who_im = 'Contribution' ORDER BY id desc";
						//$queryCondition .= " WHERE Towards ='" . $product. "' AND Status ='" . $status. "' AND  Email ='" . $email. "' AND   Mobile ='" . $mobile. "' AND  Transaction_start_time BETWEEN '".$ToDate."' AND '" . $FromDate . "'  ";
					}
					else{
					 $status = "Success";
					 $sql = "SELECT * from transactions WHERE Status = 'Success' AND  Who_im = 'Contribution' ORDER BY id desc";
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
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Towards</label>
							<select name="product"  class="form-control" id="product">
							<?php if (is_null($product) || $product == "" ) { ?> <option value="" >Select</option> <?php }else{ ?>
							  <option value = "<?php echo $product; ?>"><?php echo $product; ?></option>
							  <option value="" >All</option> <?php } ?>
							  <option value="The Life Eternal Trust General Donation">The Life Eternal Trust General Donation</option>
							  <option value="Sahaja Yoga Centre Mumbai General Donation">Sahaja Yoga Centre Mumbai General Donation</option>
							  <option value="International Sahaja Yoga Research and Health Centre General Donation">International Sahaja Yoga Research and Health Centre General Donation </option>
							  <option value="Nirmal Nagari Ganapatipule General Donation">Nirmal Nagari Ganapatipule General Donation</option>
							  <option value="Vaitarna Academy General Donation">Vaitarna Academy General Donation</option>
							  <option value="Kothrud Pune Ashram General Donation">Kothrud Pune Ashram General Donation</option>
							  <option value="Aradgaon Rahuri Ashram General Donation">Aradgaon Rahuri Ashram General Donation</option>
							  <option value="Sahaja Yoga Navi Mumbai">Sahaja Yoga Navi Mumbai</option>
							  
							  <option value="The Life Eternal Trust Corpus Fund">The Life Eternal Trust Corpus Fund</option>
							  <option value="Sahaja Yoga Centre Mumbai Corpus Fund">Sahaja Yoga Centre Mumbai Corpus Fund</option>
							  <option value="International Sahaja Yoga Research and Health Centre Corpus Fund">International Sahaja Yoga Research and Health Centre Corpus Fund</option>
							  <option value="Nirmal Nagari Ganapatipule Corpus Fund">Nirmal Nagari Ganapatipule Corpus Fund</option>
							  <option value="Vaitarna Academy Corpus Fund">Vaitarna Academy Corpus Fund</option>
							  <option value="Kothrud Pune Ashram Corpus Fund ">Kothrud Pune Ashram Corpus Fund</option>
							  <option value="Aradgaon Rahuri Ashram Corpus Fund">Aradgaon Rahuri Ashram Corpus Fund</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
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
			<div class="card-footer" style="background-color: #ecedf0;">
				<input type="submit" class="float-right" name="search" value="Search" > 
			</div>
		</div>
		
		
		
		<div class="table-responsive">
		 
		  <table class="table table-bordered"  width="100%" cellspacing="0" id="testTable" style = "color:black;">
			<thead>
			  <tr>
				<th>Sr. No.</th>
				<th>Transaction Start Date</th>

				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Address</th>
				<th>Aadhar</th>
				<th>PAN</th>
				<th>Transaction Id</th>

				<th>Food FromDate</th>
				<th>Food ToDate</th>
				<th>Food Total</th>
				<th>Stay FromDate</th>
				<th>Stay ToDate</th>
				<th>Stay Total</th>
				<th>Other Charges</th>

				<th>Amount</th>
				<th>Status</th>
				<th>Product</th>
				<th>Receipt Number</th>
				<th>Payment Mode</th>
				<th>Transaction End Date</th>

				<th>Is Sync With PG</th>
				<th>Download</th>
			  </tr>
			</thead>
	<!--		<tfoot>
			  <tr>
				<th>Sr. No.</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Address</th>
				<th>Aadhar</th>
				<th>PAN</th>
				<th>Transaction Id</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Product</th>
				<th>Receipt Number</th>
				<th>Payment Mode</th>
				<th>Transaction Start Time</th>
				<th>Transaction End Time</th>
			  </tr>
			</tfoot> -->
			<tbody>
				<?php
				
					if ($result->num_rows > 0) {
						$i = 1;
						while ($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["Transaction_start_time"]; ?></td>

					<td><?php echo $row["Fname"]." ".$row["Lname"]; ?></td>
					
					<td><?php echo $row["Mobile"]; ?></td>
					<td><?php echo $row["Email"]; ?></td>
					<td><?php echo $row["Address"]." ".$row["Pin"]; ?></td>
					
					<td><?php echo $row["Aadhar"]; ?></td>
					<td><?php echo $row["PAN"]; ?></td>
					<td><?php echo $row["Transaction_id"]; ?></td>

					<td><?php echo $row["FoodFromDate"]; ?></td>
					<td><?php echo $row["FoodToDate"]; ?></td>
					<td><?php echo $row["FoodTotal"]; ?></td>
					<td><?php echo $row["StayFromDate"]; ?></td>
					<td><?php echo $row["StayToDate"]; ?></td>
					<td><?php echo $row["StayTotal"]; ?></td>
					<td><?php echo $row["OtherCharges"]; ?></td>

					<td><?php echo $row["Amount"]; ?></td>
					<td><?php echo $row["Status"]; ?></td>
					<td><?php echo $row["Towards"]; ?></td>
					<td><?php echo $row["receiptNumber"]; ?></td>
					<td><?php echo $row["Payment_mode"]; ?></td>
					<td><?php echo $row["Transaction_end_time"]; ?></td>
					<td><?php echo $row["Is_Sync_With_PG"]; ?></td>
					<td><a href="../receipt.php?id=<?php echo $row["id"];  ?>" target = "blank">Download</td>
				</tr>
				  
				<?php
				$i++;
						}
					}
				mysqli_close($conn);
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

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
<!-- /.container-fluid -->
<?php
include_once 'footer.php';
?>
