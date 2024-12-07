<?php
session_start();

$id = $_GET['userId'];

include_once '../dbConnection.php';
$sql = "DELETE FROM tbl_admin_login WHERE id = '$id'";

if($conn->query($sql) === true) {
    echo '<script>alert("User deleted successfully")</script>';
}
?>
<script>
    history.back();
</script>
