  <?php

  // Check if a session is already active
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION['username'])) {
    header("Location: ../Login/index.php");
  }

  include_once 'header.php';

  // require_once('../function.php');

  include_once '../dbConnection.php';
  //echo $id;
  $Date =  date("Y-m-d");




  // Query to count approved users (approval = 1)
  $sqlApproved = "SELECT COUNT(*) as countApproved FROM sahajyoga_user_registration WHERE approval = 1";
  $resultApproved = $conn->query($sqlApproved);
  $countApproved = $resultApproved->fetch_assoc()['countApproved'];

  // Query to count unapproved users (approval = 0)
  $sqlUnapproved = "SELECT COUNT(*) as countUnapproved FROM sahajyoga_user_registration WHERE approval = 0";
  $resultUnapproved = $conn->query($sqlUnapproved);
  $countUnapproved = $resultUnapproved->fetch_assoc()['countUnapproved'];


  // Close the database connection
  $conn->close();


  ?>

  <div class="row">

    <!-- Approved profile -->
    <div class="col-xl-3 col-md-6 mb-4 ml-4">
      <div class="card border-left-primary shadow h-100 py-2 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Apporved Profile </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $countApproved; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- un-Approved profile -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Un-Approved Profile</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countUnapproved; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example
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

             Pending Requests Card Example 
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
            </div> -->
  </div>




  <?php
  include_once 'footer.php';
  ?>