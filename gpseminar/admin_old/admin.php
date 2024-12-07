<?php

require_once('../function.php');
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail']."Session";
}

include_once 'header.php';

include_once '../dbConnection.php';

?>

          <div class="row">

           <div class="col-md-12" align="center">
              <h2>
            <?php
            date_default_timezone_set('Asia/Kolkata');
            echo  $todaydate = date("l, F j, Y, g:i a"); 
             ?>
              </h2>
            </div>
            <br>

          <?php
          $Date =  date("Y-m-d");
          $sql = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM event_registration where status = 'Success' ";
          $resultr = $conn->query($sql);
          if ($resultr->num_rows > 0) {
            while($row = $resultr->fetch_assoc()) {
            $totalAmountr = $row["totalAmount"];
            } 
          } 
          else 
          {
            //echo "0 results";
          }
          
                    $Date =  date("Y-m-d");
          $sqlTodayTotal = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success'";
      
          $resultTotalToday = $conn->query($sqlTodayTotal);
          $countTotalTotal =  $resultTotalToday->fetch_assoc()['count(part.id)'];
      
          $sqlTodayTotalMale = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success' and part.gender='Male'";
      
          $resultTotalMale = $conn->query($sqlTodayTotalMale);
          $countTotalMale =  $resultTotalMale->fetch_assoc()['count(part.id)'];
      
          $sqlTodayTotalFemale = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success' and part.gender='Female'";
      
          $resultTotalFemale = $conn->query($sqlTodayTotalFemale);
          $countTotalFemale =  $resultTotalFemale->fetch_assoc()['count(part.id)'];
          ?>

           <!-- Total Rahuri Event CONTRIBUTION -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Ganapatipule Event CONTRIBUTION</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $totalAmountr; ?></div>
                       <div class="font-weight-bold text-success mb-1">Total: <?php echo $countTotalTotal; ?> <br>Male: <?php echo $countTotalMale; ?> <br>Female: <?php echo $countTotalFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
                        <?php 
               //Today's Adult Count
    $Date =  date("Y-m-d");
    $sqlTodayAdult = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success'";

    $resultAdultToday = $conn->query($sqlTodayAdult);
    $countAdultTotal =  $resultAdultToday->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and part.gender='Male'";

    $resultAdultMale = $conn->query($sqlTodayAdultMale);
    $countAdultMale =  $resultAdultMale->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and part.gender='Female'";

    $resultAdultFemale = $conn->query($sqlTodayAdultFemale);
    $countAdultFemale =  $resultAdultFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Adult Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Adult Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countAdultTotal; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countAdultMale; ?> <br>Female: <?php echo $countAdultFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <?php 
               //Today's Yuva Count
    $Date =  date("Y-m-d");
    $sqlTodayYuva = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success'";

    $resultYuvaToday = $conn->query($sqlTodayYuva);
    $countYuvaTotal =  $resultYuvaToday->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and part.gender='Male'";

    $resultYuvaMale = $conn->query($sqlTodayYuvaMale);
    $countYuvaMale =  $resultYuvaMale->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and part.gender='Female'";

    $resultYuvaFemale = $conn->query($sqlTodayYuvaFemale);
    $countYuvaFemale =  $resultYuvaFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Yuva Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Yuva Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countYuvaTotal; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countYuvaMale; ?> <br>Female: <?php echo $countYuvaFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
            <?php 
               //Today's Child Count
    $Date =  date("Y-m-d");
    $sqlTodayChild = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success'";

    $resultChildToday = $conn->query($sqlTodayChild);
    $countChildTotal =  $resultChildToday->fetch_assoc()['count(part.id)'];

    $sqlTodayChildMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and part.gender='Male'";

    $resultChildMale = $conn->query($sqlTodayChildMale);
    $countChildMale =  $resultChildMale->fetch_assoc()['count(part.id)'];

    $sqlTodayChildFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and part.gender='Female'";

    $resultChildFemale = $conn->query($sqlTodayChildFemale);
    $countChildFemale =  $resultChildFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Yuva Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Child Registration </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countChildTotal; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countChildMale; ?> <br>Female: <?php echo $countChildFemale; ?> <br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <?php

    $Date =  date("Y-m-d");
		$sql = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM event_registration where Transaction_start_time='" . $Date. "' and status = 'Success'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			 $totalAmountDay = $row["totalAmount"];
		  } 
		} 
    else 
    {
		  //echo "0 results";
		}
    ?>

               <!-- Today’s Rahuri Event CONTRIBUTION -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: beige;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today’s Ganapatipule Event CONTRIBUTION</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $totalAmountDay; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
                        <?php 
               //Today's Adult Count
    $Date =  date("Y-m-d");
    $sqlTodayAdult = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and ereg.Transaction_start_time='$Date'";

    $resultAdultToday = $conn->query($sqlTodayAdult);
    $countAdultToday =  $resultAdultToday->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultAdultMale = $conn->query($sqlTodayAdultMale);
    $countAdultMale =  $resultAdultMale->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultAdultFemale = $conn->query($sqlTodayAdultFemale);
    $countAdultFemale =  $resultAdultFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Adult Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: beige;">
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




            <?php 
               //Today's Yuva Count
    $Date =  date("Y-m-d");
    $sqlTodayYuva = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and ereg.Transaction_start_time='$Date'";

    $resultYuvaToday = $conn->query($sqlTodayYuva);
    $countYuvaToday =  $resultYuvaToday->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultYuvaMale = $conn->query($sqlTodayYuvaMale);
    $countYuvaMale =  $resultYuvaMale->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultYuvaFemale = $conn->query($sqlTodayYuvaFemale);
    $countYuvaFemale =  $resultYuvaFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Yuva Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: beige;">
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
            
            
            <?php 
               //Today's Child Count
    $Date =  date("Y-m-d");
    $sqlTodayChild = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and ereg.Transaction_start_time='$Date'";

    $resultYuvaToday = $conn->query($sqlTodayYuva);
    $countYuvaToday =  $resultYuvaToday->fetch_assoc()['count(part.id)'];

    $sqlTodayChildMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Male'";

    $resultChildMale = $conn->query($sqlTodayChildMale);
    $countChildMale =  $resultChildMale->fetch_assoc()['count(part.id)'];

    $sqlTodayChildFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and ereg.Transaction_start_time='$Date' and part.gender='Female'";

    $resultChildFemale = $conn->query($sqlTodayChildFemale);
    $countChildFemale =  $resultChildFemale->fetch_assoc()['count(part.id)'];

            ?>

            <!-- Today’s Child Reg -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: beige;">
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


            </div> 
            
          
          
          <script>
  function eventSearch() {
	location='event_contribution.php';
  }
	</script>

<?php
include_once 'footer.php';
?>