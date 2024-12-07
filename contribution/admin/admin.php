<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}

include_once 'header.php';

require_once('../function.php');

include_once '../dbConnection.php';
//echo $id;
$Date =  date("Y-m-d");
		
		
		$sql = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM transactions where Transaction_start_time='" . $Date. "' and status = 'Success'
					group by Transaction_start_time ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			  
			//echo "id: " . $row["id"]. " - Name: " . $row["Fname"]. " " . $row["Lname"]. "<br>";
			
			 $totalTransanctionDay = $row["totalTransanction"];
			 $totalAmountDay = $row["totalAmount"];
			 
			 //$receiptNumber = 123;
			
		  } 
		} else {
		  //echo "0 results";
		}
		
		
		
		$sql1 = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM transactions where Transaction_start_time between '" . date('Y-m-01'). "' and '" . date('Y-m-t'). "' and status = 'Success'
					 ";
		$result1 = $conn->query($sql1);

		if ($result1->num_rows > 0) {
		  // output data of each row
		  while($row = $result1->fetch_assoc()) {
			  
			//echo "id: " . $row["id"]. " - Name: " . $row["Fname"]. " " . $row["Lname"]. "<br>";
			
			 $totalTransanctionMonth = $row["totalTransanction"];
			 $totalAmountMonth = $row["totalAmount"];
			 
			 //$receiptNumber = 123;
			
		  } 
		} else {
		  //echo "0 results";
		}
		
		
$conn->close();


?>

 <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Donation </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $totalAmountDay; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Todays Total Transaction</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalTransanctionDay; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Monthly Donation</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $totalAmountMonth; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Monthly Transactions</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalTransanctionMonth; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


<?php
include_once 'footer.php';
?>