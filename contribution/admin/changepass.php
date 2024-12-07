<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once 'header.php';
include_once '../dbConnection.php';
$cpass = $_POST['cpass'];
$npass = $_POST['npass'];
$id = $_SESSION["userid"];  
$uname = $_SESSION["username"];  
if (isset($_POST['submit'])) {
    if ($cpass != '' and $npass != '' ) {
        $sql = "Select * From tbl_admin_login where UserName='$uname' and Password='$cpass' and id='$id' and Status=1 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                    $no = $row["id"];
                $sql = "UPDATE tbl_admin_login SET Password='$npass' WHERE id= $no ";
                if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully change your Password.');</script>";
                } else {
                echo "<script>alert('Your Password Not Change.');</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Invalid Current Password.');</script>";
        }
    }
    else{
        echo "<script>alert('Please Enter All Fields.');</script>";
    }
}
?>
<div class="container-fluid">
	<!-- <div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Transaction Information</h6>
      </div> -->
      <div class="card-body">
		<div class="card card-default">
			<div class="card-header">
				Change Password  
            </div>
			<form name="frmSearch" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Password</label>
                                <input type="text" class="form-control" placeholder="Current Password" id="cpass" name="cpass"  required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="text" class="form-control" placeholder="New Password" id="npass" name="npass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="padding:0px; ">
                    <input type="submit" class="btn btn-primary float-right" style="margin-right : 70px;" name="submit" id="submit" value="Submit" > 
                </div>
			</form>
		</div>
	  </div>
    <!-- </div> -->
</div>
<?php
include_once 'footer.php';
?>


