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
    $offline_d = $_POST['offline_d'];
    $offline_c = $_POST['offline_c'];
    $foreign_dc = $_POST['foreign_dc'];
    $action = $_POST['action'];
    $foodstay = $_POST['foodstay'];
 

         
                $sql = "UPDATE tbl_admin_login SET 
                offline_c='$offline_c', 
                offline_d='$offline_d',
                foreign_dc='$foreign_dc',
                action='$action',
                foodstay='$foodstay'
                WHERE id= $no ";
                if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully Add Access.');</script>";
                echo "<script>location='user_manage.php';</script>";
                } else {
                echo "<script>alert('Sorry.');</script>";
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
				User Role Access
            </div>
			<form name="frmSearch" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?userId='.$reg_id; ?>" >
                <div class="card-body">
                    
                    <div class="row">
                    <div class="col-md-6 col-sm-12 form-group">

                    <?php 
                    if($row['offline_d'] == 'yes')
                    {
                        ?>
                        <input type="checkbox" id="offline_d" name="offline_d" value="<?php echo $row['offline_d'];?>" checked> <label for="fName">Offline Digital </label>
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="checkbox" id="offline_d" name="offline_d" value="yes"> <label for="fName">Offline Digital </label>
                        <?php
                    }
                   ?>
                    
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">

                  <?php 
                    if($row['offline_c'] == 'yes')
                    {
                        ?>
                        <input type="checkbox" id="offline_c" name="offline_c" value="<?php echo $row['offline_c'];?>" checked> <label for="lName">Offline  Cash </label>
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="checkbox" id="offline_c" name="offline_c" value="yes"> <label for="lName">Offline  Cash </label>
                        <?php
                    }
                   ?>
                   
                    
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">

                  <?php 
                    if($row['foreign_dc'] == 'yes')
                    {
                        ?>
                       <input type="checkbox" id="foreign_dc" name='foreign_dc' value="<?php echo $row['foreign_dc'];?>" checked> <label for="Email"> Foreigner Digital & Cash </label>
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="checkbox" id="foreign_dc" name='foreign_dc' value="yes"> <label for="Email"> Foreigner Digital & Cash </label>
                        <?php
                    }
                   ?>
                    
                    
                  </div>

                  <div class="col-md-6 col-sm-12 form-group">

                  <?php 
                    if($row['action'] == 'yes')
                    {
                        ?>
                        <input type="checkbox" id="action" name="action" value="<?php echo $row['action'];?>" checked> <label for="fName">Action </label>
                        <?php
                    }
                    else
                    {
                        ?>
                        <input type="checkbox" id="action" name="action" value="yes"> <label for="fName">Action</label>
                        <?php
                    }
                   ?>
                    
                  
                  </div>
                  
                  <div class="col-md-6 col-sm-12 form-group">

                        <?php 
                        if($row['foodstay'] == 'yes')
                        {
                            ?>
                            <input type="checkbox" id="foodstay" name="foodstay" value="<?php echo $row['foodstay'];?>" checked> <label for="fName">Food & Stay</label>
                            <?php
                        }
                        else
                        {
                            ?>
                            <input type="checkbox" id="foodstay" name="foodstay" value="yes"> <label for="fName">Food & Stay</label>
                            <?php
                        }
                        ?>
                        

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


