<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once 'header.php';
$email = '';
$username = '';
$password = '';
$fName = '';
$lName = '';
$mobile = '';
$city = '';
include_once '../dbConnection.php';
if(isset($_POST['email']) && $_POST['username'] && $_POST['password'] && $_POST['fName'] && $_POST['lName'] && $_POST['mobile'] && $_POST['city'])
{ 
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];

$addsql = "INSERT INTO tbl_admin_login (emails,UserName,Password,firstname,lastname,contactno,city) VALUES ('$email','$username','$password','$fName','$lName','$mobile','$city')";  
if ($conn->query($addsql) === TRUE) {
 echo '<script>alert("User added successfully")</script>';
 
} else {
 echo "Error: " . $addsql . "<br>" . $conn->error;
}
}
?>

<style>
a.more {
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#event_start" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#event_end" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script> 
  <script>
    $( function() {
        $( ".datepicker" ).datepicker();
    } );
    $( document ).ready(function() {
        $("#event_start").change(function () {
        startdate = $(this).val();
        // alert(startdate)
        document.getElementsByName('cutoff1')[0].placeholder = startdate;
        })
        $("#cutoff2").change(function () {
            cutoff2 = $(this).val();
            var cutoff2Date = new Date(cutoff2)
            let end = document.getElementById("event_end").value;
            var enddate = new Date(end);
            if(cutoff2Date > enddate ){
                alert("Enter Valid Date");
                document.getElementsByName('cutoff2')[0].value ="";
            }
        })
        
    });
  </script>
  
<div class="container-fluid">
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">User Management</h6>
	  </div>
	  <div class="card-body">
      <div class="md-col-12">
        <form class="form repeater-default" action="" method="post">
          <div class='col-md-12'>
            <div class="row">
              <div class="col-md-3 col-sm-12 form-group">
                    <label for="fName">First Name </label>
                    <input type="text" class="form-control" id="fName" name="fName" placeholder="First Name" required>
                  </div>

                  <div class="col-md-3 col-sm-12 form-group">
                    <label for="lName">Last Name </label>
                    <input type="text" class="form-control" id="lName" name="lName" placeholder="Last Name" required>
                  </div>

                  <div class="col-md-3 col-sm-12 form-group">
                    <label for="Email">Email </label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="Enter email id" required>
                  </div>

                  <div class="col-md-3 col-sm-12 form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
                  </div>
                  <div class="col-md-4 col-sm-12 form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                  </div>

                  <div class="col-md-4 col-sm-12 form-group">
                    <label for="Email">User Name </label>
                    <input type="text" class="form-control" id="username" name='username' placeholder="Enter User Name" required>
                  </div>

                  <div class="col-md-4 col-sm-12 form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                  </div>
                 
                 

                  <div class="col-md-2 col-sm-12 form-group">
                  
                    <input class="btn btn-primary" type="submit" value="Add User">
                  </div>    
            </div>
          </div>
        </form>
      </div>
      
      <script type="text/javascript">
        function addUser(){
         
        }
      </script>
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead class="border">
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Usere Name</th>
                            <th>Password</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql1 = "SELECT * FROM symumbai.tbl_admin_login where Status = '2'";
                      $result1 = $conn->query($sql1);
                      while ($row =$result1->fetch_assoc()) 
                      {
                      ?>
                      <tr>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['emails']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['UserName']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td><a href="changepassword.php?userId=<?php echo $row['id']; ?>"><i class="fa fa-lock"></i></a> / <a href="editdetails.php?userId=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> / <a href="addrole.php?userId=<?php echo $row['id']; ?>"><i class="fa fa-user"></i></a></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                    <tfoot>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Usere Name</th>
                            <th>Password</th>
                            <th>Action</th>
                            
                        </tr>
                    </tfoot>
                </table>
            </div>
           
        </div>
      </div>
    </div>
</div>
<script>
  new DataTable('#example');
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


