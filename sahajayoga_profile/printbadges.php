<?php
// reg_id = '2998';

require_once('function.php');
// session_start();
if(!isset($_SESSION['username'])){       
  header("Location: Login/index.php");
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET['reg_id']))
{
  $event_reg_id=$_GET['reg_id'];
}
else{
  $event_reg_id="";
  // echo"<script>window.location.href='even'</script>";  
}

include_once 'dbConnection.php';

$sql = "SELECT * FROM event_registration where event_registration_id ='" . $event_reg_id . "'";
// echo  $sql;
$result = $conn->query($sql);

$adultCount = 0;
$yuvaCount = 0;
$childCount = 0;
$image = '';
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $email = $row["Email"];
        
        $towards = $row["Towards"];
     
        $transactionDate = $row["Transaction_start_time"];
        $transactionEndDate = $row["Transaction_end_time"];
        $eventRegId = $row["event_registration_id"];


        $countQuery = "SELECT count(*) as count,participant_type FROM `participants` where event_registration_id=$eventRegId group by participant_type";
        $resultCountQuery = $conn->query($countQuery);
        
        if ($resultCountQuery->num_rows > 0) {
            while ($row = $resultCountQuery->fetch_assoc()) {
                if ($row['participant_type'] == 'Adult') {
                    $adultCount = $row['count'];
                } else if ($row['participant_type'] == 'Yuva') {
                    $yuvaCount = $row['count'];
                } else if ($row['participant_type'] == 'Child') {
                    $childCount = $row['count'];
                }
            }
        }
        
        $imageQuery = "SELECT image FROM `participants` where event_registration_id=$eventRegId limit 1";
        $resultImageQuery = $conn->query($imageQuery);
        if ($resultImageQuery->num_rows > 0) {
            while ($row = $resultImageQuery->fetch_assoc()) {
                $image = $row['image'];
                
            }
        }
    }
} else {
    //  echo "0 results";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Badge Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        @page{
            size: A5; 
        }

        #printbtn{
            background-color: #db4f0c;
            color:white;
            border:none;
            width:100px;
            height:30px;
            border-radius:5px;
            cursor: pointer;
        }

        #printbtn1{
            background-color: #fec20a;
            color:white;
            border:none;
            width:100px;
            height:30px;
            border-radius:5px;
            cursor: pointer;
        }

        .p1{
            margin-top: 11px;
            margin-left: 250px;
            font-size: 14px;
        }

        .p2{
            margin-left: 250px;
            font-size: 14px;
            margin-top: -12px;
        }

        .p3{
            font-size: 11px;
            margin-top: -10px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .box1{
            width:320px;
            margin-top: -2px;
            margin-left:146px;
        }

        .p4{
            font-size: 11px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            margin-top: -10px;
        }

       

        @media print {
            .print_hidden{
                display:none;
            }
        }
    </style>
</head>

<body class="A5">
    <div style="padding:20px;" class="print_hidden">
        <center>
        <input type="button" id="printbtn" class="btn btn-dark btn-sm" <?php echo "onclick=printDivMain('" . $event_reg_id . "')"; ?> value="Print All"/>
        <a class="btn btn-dark btn-sm" href="https://www.sahajayogamumbai.org/gpseminar/admin/admin.php">Back to Home</a>
        </center>
    </div>  
    
    <?Php
    if($adultCount > 0) 
    {                               
        $partTypeAdl = 'Adult';
        $sqlAdult = "SELECT * FROM participants where participant_type='" . $partTypeAdl ."' and event_registration_id=$eventRegId";
        $adultResult = $conn->query($sqlAdult);
        while($row = $adultResult->fetch_assoc()) 
        {
        $adultName = $row['name'];
        $adultName;
        $adultCity = $row['city'];
        $adultGender = $row['gender'];
        $partTypeadult = $row['participant_type'];
        $coupon_number = $row['coupon_number'];
    ?>

        <section class="sheet" id="sheet_<?php echo $coupon_number;?>">
            <div style="padding:20px;" class="print_hidden text-center">
                <center><input type="button" id="printbtn1" class="btn btn-dark btn-sm" onclick="printDiv('sheet_<?php echo $coupon_number;?>')" value="Print"/></center> 
            </div>
            <div class="main_content">
                <br><br><br><br><br><br><br>
                <p class="p1"><?php echo $adultName;?></p>
                <p class="p2"><?php echo $adultCity;?></p>
                <div class="row box1">
                    <div class="col-6">
                        <p class="p3"><?php echo $partTypeadult;?></p>
                    </div>
                    <div class="col-6">
                        <p class="p4"><?php echo $coupon_number;?></p>
                    </div>
                </div>
            </div>
        </section>

    <?php 
        }
    } 
    ?>



    <?Php
        if($yuvaCount > 0) 
        { 
            $partTypeyuva = 'Yuva';
            $sqlYuva = "SELECT * FROM participants where participant_type='" . $partTypeyuva ."' and event_registration_id=$eventRegId";
            $yuvaResult = $conn->query($sqlYuva);
            while($row = $yuvaResult->fetch_assoc()) 
            {                     
                $yuvaName = $row['name'];
                $yuvaCity = $row['city'];
                $partTypeyuva = $row['participant_type'];
                $coupon_number_yuva = $row['coupon_number'];         
                ?>

                    <section class="sheet" id="sheet_<?php echo $coupon_number_yuva;?>">
                        <div style="padding:20px;" class="print_hidden text-center">
                            <center><input type="button" id="printbtn1" class="btn btn-dark btn-sm" <?php echo "onclick=printDiv('sheet_" . $coupon_number_yuva . "','" . $coupon_number_yuva . "')"; ?> value="Print"/></center> 
                        </div>
                        <div class="main_content">
                            <br><br><br><br><br><br><br>
                            <p class="p1"><?php echo $yuvaName;?></p>
                            <p class="p2"><?php echo $yuvaCity;?></p>
                            <div class="row box1">
                                <div class="col-6">
                                    <p class="p3"><?php echo $partTypeyuva;?></p>
                                </div>
                                <div class="col-6">
                                    <p class="p4"><?php echo $coupon_number_yuva;?></p>
                                </div>
                            </div>
                        </div>
                    </section>
            
                <?php 
            }
        } 
    ?>





    <?Php
        if($childCount > 0) 
        { 
            $partTypechild = 'Child';
            
            $sqlChild = "SELECT * FROM participants where participant_type='" . $partTypechild ."' and event_registration_id=$eventRegId";
            $childResult = $conn->query($sqlChild);                   
            while($row = $childResult->fetch_assoc()) 
            {                     
            $childName = $row['name'];
            $childCity = $row['city'];
            $partTypechild = $row['participant_type'];
            $coupon_number_child = $row['coupon_number'];     
            ?>
                <section class="sheet" id="sheet_<?php echo $coupon_number_child;?>">
                    <div style="padding:20px;" class="print_hidden text-center">
                        <center><input type="button" id="printbtn1" class="btn btn-dark btn-sm" onclick="printDiv('sheet_<?php echo $coupon_number_child;?>')" value="Print"/></center> 
                    </div>
                    <div class="main_content">
                        <br><br><br><br><br><br><br>
                        <p class="p1"><?php echo $childName;?></p>
                        <p class="p2"><?php echo $childCity;?></p>
                        <div class="row box1">
                            <div class="col-6">
                                <p class="p3"><?php echo $partTypechild;?></p>
                            </div>
                            <div class="col-6">
                                <p class="p4"><?php echo $coupon_number_child;?></p>
                            </div>
                        </div>
                    </div>
                </section>

            <?php 
            }
        } 
    ?>


    <script>
      function printDiv(divName,couponNo) {
        //   alert(couponNo);
          $.ajax({
          // alert(eregId);
          url: "print_count.php",
          type: "POST",
          data: {
              "couponNo": couponNo,
              "badges": "one",
              },
        //   cache: false,
          success: function(result){
            // alert(result);
            if(result == 'yes'){
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                
                // document.getElementById().style.display = 'none';
            }
            else{
              alert("limit expired");
            }
          }
        });
      }
      
      function printDivMain(eregId) {
          $.ajax({
          // alert(eregId);
          url: "print_count.php",
          type: "POST",
          data: {
              "eregId": eregId,
              "badges": "all",
              },
        //   cache: false,
          success: function(result){
            // alert(result);
            if(result == 'yes'){
              window.print();
            }
            else{
              alert("limit expired");
            }
          }
        });
      }
    </script>
  </body>
</html>