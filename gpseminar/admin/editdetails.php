<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once 'header.php';
include_once '../dbConnection.php';


$reg_id = $_GET['userId'];

$sql1 = "SELECT * FROM symumbai.tbl_admin_login where id = $reg_id";
$result1 = $conn->query($sql1);
$row =$result1->fetch_assoc();

$no = $row['id'];
//echo $reg_id;
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    if ($email != '' and $username != '' ) {

         
                $sql = "UPDATE tbl_admin_login SET 
                UserName='$username', 
                emails='$email',
                firstname='$fName',
                lastname='$lName',
                city='$city',
                contactno='$mobile'
                WHERE id= $no ";
                if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully Update User Details.');</script>";
                echo "<script>location='user_manage.php';</script>";
                } else {
                echo "<script>alert('Sorry User Details Not Update.');</script>";
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
				Edit User Details
            </div>
			<form name="frmSearch" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?userId='.$reg_id; ?>" >
                <div class="card-body">
                    
                    <div class="row">
                    <div class="col-md-6 col-sm-12 form-group">
                    <label for="fName">First Name </label>
                    <input type="text" class="form-control" id="fName" name="fName" placeholder="First Name" value="<?php echo $row['firstname'];?>" required>
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">
                    <label for="lName">Last Name </label>
                    <input type="text" class="form-control" id="lName" name="lName" placeholder="Last Name" value="<?php echo $row['lastname'];?>" required>
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">
                    <label for="Email">Email </label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="Enter email id" value="<?php echo $row['emails'];?>" required>
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $row['contactno'];?>" required>
                  </div>
                  <div class="col-md-6 col-sm-12 form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row['city'];?>" required>
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">
                    <label for="Email">User Name </label>
                    <input type="text" class="form-control" id="username" name='username' placeholder="Enter User Name" value="<?php echo $row['UserName'];?>" required>
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


