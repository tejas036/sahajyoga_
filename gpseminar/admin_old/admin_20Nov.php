<?php

require_once('../function.php');
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail']."Session";
}

include_once 'header.php';

include_once '../dbConnection.php';

    //for total contribution
		
    $sql11 = "SELECT SUM(Amount) FROM symumbai.event_registration where Status='Success'";
    $result11 = $conn->query($sql11);
    $countTotal =  $result11->fetch_assoc()['SUM(Amount)'];
 
    
    $Date =  date("Y-m-d");
		
    //for today's contribution
		$sql = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM event_registration where Transaction_start_time='" . $Date. "' and status = 'Success'
					group by Transaction_start_time ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			
			 //$totalTransanctionDay = $row["totalTransanction"];
			 $totalAmountDay = $row["totalAmount"];
       
			
		  } 
		} else {
		  //echo "0 results";
		}

    //Today's Adult Count
    $sqlTodayAdult = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.Transaction_start_time='$Date'";

    $resultAdultToday = $conn->query($sqlTodayAdult);
    $countAdultToday =  $resultAdultToday->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultAdultMale = $conn->query($sqlTodayAdultMale);
    $countAdultMale =  $resultAdultMale->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultAdultFemale = $conn->query($sqlTodayAdultFemale);
    $countAdultFemale =  $resultAdultFemale->fetch_assoc()['count(part.id)'];


    //Today's Yuva Count
    $sqlTodayYuva = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.Transaction_start_time='$Date'";

    $resultYuvaToday = $conn->query($sqlTodayYuva);
    $countYuvaToday =  $resultYuvaToday->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultYuvaMale = $conn->query($sqlTodayYuvaMale);
    $countYuvaMale =  $resultYuvaMale->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultYuvaFemale = $conn->query($sqlTodayYuvaFemale);
    $countYuvaFemale =  $resultYuvaFemale->fetch_assoc()['count(part.id)'];

    //Today's Child Count
    $sqlTodayChild = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.Transaction_start_time='$Date'";

    $resultChildToday = $conn->query($sqlTodayChild);
    $countChildToday =  $resultChildToday->fetch_assoc()['count(part.id)'];

    $sqlTodayChildMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultChildMale = $conn->query($sqlTodayChildMale);
    $countChildMale =  $resultChildMale->fetch_assoc()['count(part.id)'];

    $sqlTodayChildFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultChildFemale = $conn->query($sqlTodayChildFemale);
    $countChildFemale =  $resultChildFemale->fetch_assoc()['count(part.id)'];



    $sql1 = "SELECT count(id) FROM symumbai.participants where participant_type ='Adult'";
    $result1 = $conn->query($sql1);
    $countAdult =  $result1->fetch_assoc()['count(id)'];
    // echo $countAdult;

    $sql2 = "SELECT count(id) FROM symumbai.participants where participant_type ='Yuva'";
    $result2 = $conn->query($sql2);
    $countYuva =  $result2->fetch_assoc()['count(id)'];
    // echo $countYuva;

    $sql3 = "SELECT count(id) FROM symumbai.participants where participant_type ='Child'";
    $result3 = $conn->query($sql3);
    $countChild =  $result3->fetch_assoc()['count(id)'];
    // echo $countChild;
    
$conn->close();

?>

          <div class="row">

            <!-- Today’s Contribution -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today’s Contribution </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $totalAmountDay; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Today’s Adult Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today’s Adult Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countAdultToday; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countAdultMale; ?> <br>Female: <?php echo $countAdultFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Today’s Yuva Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today’s Yuva Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countYuvaToday; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countYuvaMale; ?> <br>Female: <?php echo $countYuvaFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Today’s Child Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today’s Child Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countChildToday; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countChildMale; ?> <br>Female: <?php echo $countChildFemale; ?> <br></div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Contribution</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $countTotal; ?></div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Adults Registered </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php 
                                                                                  echo $countAdult;
                                                                              ?>
                      </div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Yuva Registered</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countYuva ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Child Registered</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countChild ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Pending Requests Card Example
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Child 1Registered</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countChild; ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            
          </div>
          
          <script>
  function eventSearch() {
	location='event_contribution.php';
  }
	</script>

<?php
include_once 'footer.php';
?>