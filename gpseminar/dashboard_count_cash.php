<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Total Count Dashboard</title>
  
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>


<?php

include_once 'dbConnection.php';

?>

<div class="row" style="margin-top: 50px;">

<center>
    <h1>International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule, 2023</h1>
    <h3>Event Registration Count Dashboard (Offline Cash)</h3>
</center>

          <?php
             $Date =  date("Y-m-d");
          $sqlTodayTotal = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success' and ereg.paymenttype ='offline' and ereg.Payment_mode ='Cash'";
      
          $resultTotalToday = $conn->query($sqlTodayTotal);
          $countTotalTotal =  $resultTotalToday->fetch_assoc()['count(part.id)'];
      
          $sqlTodayTotalMale = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success' and part.gender='Male' and ereg.paymenttype ='offline' and ereg.Payment_mode ='Cash'";
      
          $resultTotalMale = $conn->query($sqlTodayTotalMale);
          $countTotalMale =  $resultTotalMale->fetch_assoc()['count(part.id)'];
      
          $sqlTodayTotalFemale = "select count(part.id)
          from participants part
          join event_registration ereg
          on part.event_registration_id= ereg.event_registration_id
          where ereg.status = 'success' and part.gender='Female' and ereg.paymenttype ='offline' and ereg.Payment_mode ='Cash'";
          
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countTotalTotal; ?></div>
                      <div class="font-weight-bold text-success mb-1">Male: <?php echo $countTotalMale; ?> <br>Female: <?php echo $countTotalFemale; ?> <br></div>
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
    where part.participant_type='Adult' and ereg.status = 'success' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultAdultToday = $conn->query($sqlTodayAdult);
    $countAdultTotal =  $resultAdultToday->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and part.gender='Male' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultAdultMale = $conn->query($sqlTodayAdultMale);
    $countAdultMale =  $resultAdultMale->fetch_assoc()['count(part.id)'];

    $sqlTodayAdultFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Adult' and ereg.status = 'success' and part.gender='Female' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

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
    where part.participant_type='Yuva' and ereg.status = 'success' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultYuvaToday = $conn->query($sqlTodayYuva);
    $countYuvaTotal =  $resultYuvaToday->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and part.gender='Male' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultYuvaMale = $conn->query($sqlTodayYuvaMale);
    $countYuvaMale =  $resultYuvaMale->fetch_assoc()['count(part.id)'];

    $sqlTodayYuvaFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Yuva' and ereg.status = 'success' and part.gender='Female' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

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
    where part.participant_type='Child' and ereg.status = 'success' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultChildToday = $conn->query($sqlTodayChild);
    $countChildTotal =  $resultChildToday->fetch_assoc()['count(part.id)'];

    $sqlTodayChildMale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and part.gender='Male' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

    $resultChildMale = $conn->query($sqlTodayChildMale);
    $countChildMale =  $resultChildMale->fetch_assoc()['count(part.id)'];

    $sqlTodayChildFemale = "select count(part.id)
    from participants part
    join event_registration ereg
    on part.event_registration_id= ereg.event_registration_id
    where part.participant_type='Child' and ereg.status = 'success' and part.gender='Female' and ereg.Payment_mode ='Cash' and ereg.paymenttype ='offline'";

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


            </div> 
            
          