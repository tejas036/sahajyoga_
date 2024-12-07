<?php
	include_once 'dbConnection.php';
	session_start();
	 $email = $_SESSION['email'];
	 $phone = $_SESSION['mobile'];
	$sql = "SELECT * from transactions WHERE  Email = '".$email."' AND Mobile = '".$phone."' AND  Status = 'Success' ";		
	$result = $conn->query($sql);
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="assets/dynamicAction.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<header>
			<div align="center">
			   <img align="left" src="assets/logo3.png" height="70" width="70"/>
			   <a href="index.html">Dashboard</a> 
		   </div>
		</header> 
	</head>
<body>
<div style = "background : white;">
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
  </div>
&nbsp<h3> &nbsp Transaction</h3>
<div style = "overflow:auto">
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
	if ($result->num_rows > 0) {
		$i = 1;
		while ($row = $result->fetch_assoc()) {
	?>
	<tbody>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row["Fname"]." ".$row["Lname"]; ?></td>
    <td><?php echo $row["Email"]; ?></td>
	<td><?php echo $row["Mobile"]; ?></td>
	<td><?php echo $row["Address"]." ".$row["Pin"]; ?></td>
	<td><?php echo $row["PAN"]; ?></td>
	<td><?php echo $row["Transaction_id"]; ?></td>
	<td><?php echo $row["Amount"]; ?></td>
	<td><?php echo $row["receiptNumber"]; ?></td>
	<td><?php echo $row["Payment_mode"]; ?></td>
	<td><a href="receipt.php?id=<?php echo $row["id"]; ?>">Download</td>
  </tr>
  </tbody>
		<?php
	$i++;		
		}
    }
	mysqli_close($conn);
?>
</table>
</div>
</div>
</body>
</html>