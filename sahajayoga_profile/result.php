<?php
include_once 'dbConnection.php';
session_start();
$email = $_SESSION['email'];
$phone = $_SESSION['mobile'];
// $email = 'umeshjaiswal34@gmail.com';
// $phone = '7767834643';

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga </title>
	<!-- <link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="assets/dynamicAction.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

	

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous"> -->


	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- FontAwesome for icons -->
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous" rel="stylesheet">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">

	<!-- jQuery (required for Bootstrap 4.5 JS) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Bootstrap 4.5 JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

	<!-- Additional JS Files -->
	<script src="assets/dynamicAction.js"></script>
	<header>
		
			<div class="row align-items-center justify-content-between">
				<!-- Left: Logo and Title -->
				<div class="col-8 col-md-6 d-flex align-items-center">
					<img src="assets/logo3.png" height="70" width="70" alt="Logo" class="mr-2">
					<h4 class="mb-0 text-white">Sahajayoga, Mumbai</h4>
				</div>

				<!-- Right: Profile and Logout Buttons -->
				<div class="col-4 col-md-6 text-right  ">
					<a href="logOut.php" class="btn btn-sm text-white ml-2" style="border-radius: 10px; background-color: #008471; padding: 8px 15px;">
						Logout
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-1" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
							<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
						</svg>
					</a>

					<a href="profile.php" class="btn btn-sm text-white " style="border-radius: 10px; background-color: #008471; padding: 8px 15px;">
						Profile
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-1" viewBox="0 0 16 16">
							<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
							<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
						</svg>
					</a>
				</div>
			</div>
		
	</header>

</head>
<style>
	header {
		box-sizing: border-box;
		text-align: center;
		width: 100%;
		padding: 25px 40px;
		background: linear-gradient(90deg,
				rgba(131, 58, 180, 1) 0%,
				rgba(253, 29, 29, 1) 50%,
				rgba(252, 176, 69, 1) 100%);
		overflow: hidden;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		border-radius: 0 0 20px 20px;
	}

	.collapsible {
		background-color: #eee;
		color: #444;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		position: relative;
		/* Add this for positioning the icon */
		padding: 20px;
		margin: 0 20px;
	}

	.active,
	.collapsible:hover {
		background-color: #ccc;
	}

	.content {
		padding: 0 18px;
		display: none;
		overflow: hidden;
		background-color: #f1f1f1;
	}

	.collapsible i {

		position: absolute;
		font-size: 20px;

		right: 15px;
		transition: transform 0.3s ease;
	}

	.collapsible.active i {
		transform: rotate(45deg);
		/* Rotate icon when active */
	}
</style>

<body>
	<div style="background : white; margin: 10px 30px; padding-bottom:20px; ">
		&nbsp &nbsp <h3> &nbsp Payer Details</h3>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email:-</label>
				<input type="text" class="form-control" readonly value="<?php echo $email; ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Mobile:-</label>
				<input type="text" class="form-control" readonly value="<?php echo $phone; ?>">
			</div>
		</div>
		&nbsp<h3 class=" d-flex  collapsible" style="margin: 10px; display: flex; justify-content: flex-start;">
			<a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#contributionTransaction" aria-expanded="false" aria-controls="contributionTransaction" style="text-decoration: none;">
				<i class="fa fa-plus"></i> Contribution Transaction
			</a>
		</h3>
		<div style="overflow:auto" id="contributionTransaction" class="collapse">
			<table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
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
						<th>Download</th>
					</tr>
				</thead>
				<?php
				$sql = "SELECT * from transactions WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
				// $sql = "SELECT * FROM transactions WHERE Email = '$email' AND Mobile = '$phone'";
				// echo $sql;
				$result = $conn->query($sql);
				// print_r($result);
				if ($result->num_rows > 0) {
					$i = 1;
					while ($row = $result->fetch_assoc()) {
				?>
						<tbody>
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
								<td><a href="receipt.php?id=<?php echo $row["Transaction_id"]; ?>&table_id=transactions" target="_blank">Download</td>
							</tr>
						</tbody>
					<?php
						$i++;
					}
				} else {
					// No records found
					?>
					<tbody>
						<tr>
							<td colspan="11" class="text-center">No records found</td>
						</tr>
					</tbody>
				<?php
				}
				mysqli_close($conn);
				?>
			</table>
		</div>



		&nbsp<h3 class="collapsible" style="margin: 10px; display: flex; justify-content: flex-start;">
			<a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#gpSeminarTransaction" aria-expanded="false" aria-controls="gpSeminarTransaction" style="text-decoration: none;">
				<i class="fa fa-plus"></i> &nbsp Gp-Seminar Transaction
			</a>

		</h3>
		<div style="overflow:auto" id="gpSeminarTransaction" class="collapse">
			<table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
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
						<th>Download</th>
					</tr>
				</thead>
				<?php
				include 'dbConnection.php';
				$sql = "SELECT * from event_registration WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
				// $sql = "SELECT * FROM event_registration WHERE Email = '$email' AND Mobile = '$phone' AND who_im='gpseminar'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$i = 1;
					while ($row = $result->fetch_assoc()) {

						$state_id = $row['Address'];

						$state_sql = "select StateName from state where StCode='" . $state_id . "'";
						$state_result = $conn->query($state_sql);
						$state_name = '';

						if ($state_result->num_rows > 0) {
							$state_row = $state_result->fetch_assoc();
							$state_id = $state_row['StateName'];
						} else {
							// $state_name';
						}
						// echo var_dump($row);
				?>
						<tbody>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row["Fname"] . " " . $row["Lname"]; ?></td>
								<td><?php echo $row["Email"]; ?></td>
								<td><?php echo $row["Mobile"]; ?></td>
								<td><?php echo $state_id . ", " . $row["Pin"]; ?></td>
								<td><?php echo $row["PAN"]; ?></td>
								<td><?php echo $row["Transaction_id"]; ?></td>
								<td><?php echo $row["Amount"]; ?></td>
								<td><?php echo $row["receiptNumber"]; ?></td>
								<td><?php echo $row["Payment_mode"]; ?></td>
								<td><a href="reprint-badges.php?trans_id=<?php echo $row["Transaction_id"]; ?>&table_id=event_registration" target="_blank">Download</td>
							</tr>
						</tbody>
					<?php
						$i++;
					}
				} else {
					// No records found
					?>
					<tbody>
						<tr>
							<td colspan="11" class="text-center">No records found</td>
						</tr>
					</tbody>
				<?php
				}
				mysqli_close($conn);
				?>
			</table>
		</div>



		&nbsp<h3 class="collapsible" style="margin: 10px; display: flex; justify-content: flex-start;">
			<a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#nirmalaTransaction" aria-expanded="false" aria-controls="nirmalaTransaction" style="text-decoration: none;">
				<i class="fa fa-plus"></i> &nbsp Nirmala Transaction
			</a>


		</h3>
		<div style="overflow:auto" id="nirmalaTransaction" class="collapse">
			<table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
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
						<th>Download</th>
					</tr>
				</thead>
				<?php
				include 'dbConnection.php';
				$sql = "SELECT * from event_registration_rahuri WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
				// $sql = "SELECT * FROM event_registration WHERE Email = '$email' AND Mobile = '$phone'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$i = 1;
					while ($row = $result->fetch_assoc()) {
				?>
						<tbody>
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
								<td><a href="reprint-badges.php?trans_id=<?php echo $row["Transaction_id"]; ?>&table_id=event_registration_rahuri" target="_blank">Download</td>
							</tr>
						</tbody>
					<?php
						$i++;
					}
				} else {
					// No records found
					?>
					<tbody>
						<tr>
							<td colspan="11" class="text-center">No records found</td>
						</tr>
					</tbody>
				<?php
				}
				mysqli_close($conn);
				?>
			</table>
		</div>
	</div>
</body>
<div style="margin-top: 268px;">

	<?php include 'footer.php'; ?>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var collapsibles = document.querySelectorAll('[data-toggle="collapse"]');

		collapsibles.forEach(function(collapsible) {
			collapsible.addEventListener('click', function() {
				var icon = this.querySelector('i');
				var isExpanded = this.getAttribute('aria-expanded') === 'true';
				icon.className = isExpanded ? 'fa fa-plus' : 'fa-solid fa-minus';
			});
		});
	});
</script>


</html>