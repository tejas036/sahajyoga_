<?php
include_once 'dbConnection.php';
session_start();
//  $email = $_SESSION['email'];
//  $phone = $_SESSION['mobile'];
$email = "umeshjaiswal34@gmail.com";
$phone = "7767834643";
$sql = "SELECT * from transactions WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";

$result = $conn->query($sql);

$fromDate = '';
$toDate = '';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $fromDate = $_POST["post_at"];
    $toDate = $_POST["post_to"];

    $sql = "SELECT * FROM transactions WHERE Transaction_start_time BETWEEN '$fromDate' AND '$toDate' AND Status='Success' AND Email='$email' AND Mobile='$phone'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga Donation</title>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<header>
		<div align="center">
			<img align="left" src="assets/logo3.png" height="70" width="70" />
			<a href="index.html">Dashboard</a>
		</div>
	</header>
</head>

<body>
	<!-- <div style = "background : white;">
&nbsp &nbsp <h3> &nbsp   Donor Details</h3>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email:-</label>
      <input type="text" class="form-control" readonly value="<?php echo $email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mobile:-</label>
      <input type="text" class="form-control" readonly value="<?php echo $phone; ?>">
    </div>
  </div> -->
	<div class="form-row" style="margin: 20px 21px 1px 20px;">
		<div class="form-group col-md-6">
			<label for="inputEmail4">Email:-</label>
			<input type="text" class="form-control" readonly value="<?php echo $email; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="inputPassword4">Mobile:-</label>
			<input type="text" class="form-control" readonly value="<?php echo $phone; ?>">
		</div>
	</div>
	




	<div class="card-body" style="margin: 1px 25px 10px 10px;">
		<form name="frmSearch" method="post" action="">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="post_at">From Date</label>
						<input type="date" class="form-control" id="post_at" name="post_at" value="<?php echo htmlspecialchars($fromDate); ?>" placeholder="From Date" />
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="post_to">To Date</label>
						<input type="date" class="form-control" id="post_to" name="post_to" value="<?php echo isset($toDate) ? $toDate : ''; ?>" placeholder="To Date" />
					</div>
				</div>
				<div class="col-sm-4" style="margin-top: 30px; padding-left: 10px; ">


					<input type="submit" class="btn btn-primary " name="search" value="Search">

				</div>
			</div>
		</form>
	</div>



	
	&nbsp<h3> &nbsp Transaction</h3>
	<div style="overflow:auto">
		<table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%" id="tabledetails">
			<thead>
				<tr>
					<th>Sr</th>
					<th>Name</th>
					<th>email</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Pan</th>
					<th>Transaction Id</th>
					<th>Amount</th>
					<th>receipt Number</th>
					<th>Payment mode</th>
					<th>Date</th>
					<th class="download">Download</th>
				</tr>
			</thead>
					<tbody>
			<?php
			
			if ($result->num_rows > 0) {
				$i = 1;
				while ($row = $result->fetch_assoc()) {
			?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["Fname"] . " " . $row["Lname"]; ?></td>
							<td><?php echo $row["Email"]; ?></td>
							<td><?php echo $row["Mobile"]; ?></td>
							<td><?php echo $row["Address"] . " " . $row["Pin"]; ?></td>
							<td><?php echo $row["PAN"]; ?></td>
							<td><?php echo $row["Transaction_id"]; ?></td>
							<td><?php echo $row["Amount"]; ?></td>
							<td><?php echo $row["receiptNumber"]; ?></td>
							<td><?php echo $row["Payment_mode"]; ?></td>
							<td><?php echo $row["Transaction_start_time"]; ?></td>
							<td class="download"><a href="receipt.php?id=<?php echo $row["id"]; ?>" target="_blank">Download</td>
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
</body>

</html>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
	$(document).ready(function() {
    $('#tabledetails').DataTable({
        paging: false,
        searching: false,
        dom: '<"float-right"B>frtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export to Excel',
                title: 'Transaction Data',
                // className: 'btn btn-primary', 
				// style: {
                //     background: 'blue',
                //     color: 'white' 
                // },
                exportOptions: {
                    columns: ':not(.download)' 
                }
            }
        ]
    });


	var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-01";
    var lastDayOfMonth = year + "-" + month + "-" + new Date(year, month, 0).getDate();

    // Set default dates if inputs are empty
    if ($("#post_at").val() === "" || $("#post_to").val() === "") {
        $("#post_at").val(today);
        $("#post_to").val(lastDayOfMonth);
    }
		
	});
</script>

