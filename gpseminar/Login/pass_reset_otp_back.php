<?php
session_start();
include_once("../dbConnection.php");
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$otp = $_SESSION['otp'];
} else {
	echo "<script>window.location.href='index.php'</script>";
}
?>
<?php

if (isset($_POST['logincontrol'])) {
	$otp1 = strip_tags(trim($_POST['otp']));      // removing whitespace and html or php tags if consisted in email
	$password = strip_tags(trim($_POST['password']));

	$stmt = $conn->prepare("select * from tbl_admin_login where emails=?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$count = $result->num_rows;

	if ($count == 1) {
		$row = $result->fetch_assoc();
		$emails = $row['emails'];
		$regis_id = $row['id'];

		if ($otp1 == $otp) {
			$sqls = "UPDATE tbl_admin_login SET Password=? WHERE id=?"; // SQL with parameters
			$stmt2 = $conn->prepare($sqls);
			$arr = array("password" => "$password", "id" => "$regis_id");
			$stmt2->bind_param("si", $arr['password'], $arr['id']);
			$stmt2->execute();
			// $con->close();


			if ($emails != '') {
				$_SESSION['email'] = $email;
				echo 1;
              
			}
		}
	} else {
		echo 0;
	}
}

?>
