<?php
session_start();
require_once('../function.php');
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail']."Session";
}

include_once '../dbConnection.php';
// error_reporting(0);
$userid = $_SESSION["userid"];
$sql1 = "SELECT * FROM tbl_admin_login where id = $userid";
$result1 = $conn->query($sql1);
$row =$result1->fetch_assoc();

?>

<html lang="en">
<head>
  <title>Sahaja Yoga, Mumbai</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    th{
        background-color: rgb(2, 117, 216);
        color: white;
        border: 1px solid white;
        text-align: center;
        font-size: 13px;
        /* height: 43px; */
    }
    li{
        margin-top:20px;
    }


    .tg  {
        border-collapse:collapse;
        border-color:#9ABAD9;
        border-spacing:0;
        width: 700px;
    }

    .tg td{
        background-color:#EBF5FF;
        border-color:#9ABAD9;
        border-style:solid;
        border-width:1px;
        color:#444;
        font-family:Arial, sans-serif;
        font-size:14px;
        overflow:hidden;
        padding:10px 5px;
        word-break:normal;
    }

    .tg th{
        background-color:#409cff;
        border-color:#9ABAD9;
        border-style:solid;
        border-width:1px;
        color:#fff;
        font-family:Arial, sans-serif;
        font-size:14px;
        font-weight:normal;
        overflow:hidden;
        padding:10px 5px;
        word-break:normal;
    }

    .tg .tg-5cz4{
        background-color:#D2E4FC;
        border-color:inherit;
        text-align:center;
        vertical-align:middle
    }

    .tg .tg-9wq8{
        border-color:inherit;
        text-align:center;
        vertical-align:middle
    }

    .tg .tg-uzvj{
        border-color:inherit;
        font-weight:bold;
        text-align:center;
        vertical-align:middle
    }

    .tg .tg-aejj{
        background-color:#D2E4FC;
        border-color:inherit;
        font-weight:bold;
        text-align:center;
        vertical-align:middle
    }

    @media screen and (max-width: 767px) 
    {
        .tg {
            width: auto !important;
        }
        
        .tg col {
            width: auto !important;
        }

        .tg tbody tr td{
            font-size: 12px;
        }

        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}
        
    }


  </style>
</head>
<body>
    
    <div class="container" style="margin-top: 15px;">
    <div class="card" style=" background-color: #FFFAFA;">
        <div class="card-body">
            <h3 style="text-align: center;">The Life Eternal Trust, Mumbai</h3>
            <h2 style="text-align: center;">International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule</h2>
            <h6 style="text-align: center;"> December 22-26, 2023</h6>
            <h2 style="text-align: center;">Instructions</h2>
            <p style="text-align: center;">Online contribution for Indians only</p>
            <p style="text-align: center;">(Please read the instructions below carefully before payment)</p>
            
            <ul>
                <li style="font-weight: 500;">Indian Sahaja yogis - Contribution for SEMINAR:
                    <div class="table-responsive">
                        <table class="tg">
                            <tbody>
                            <tr>
                                <td class="tg-uzvj"></td>
                                <td class="tg-uzvj">   <br><span style="color:#002060">Upto December 12</span></td>
                                <td class="tg-uzvj">   <br><span style="color:#002060">From December 12 /</span><br>   <br><span style="color:#002060">At Puja Site</span>   </td>
                                <td class="tg-uzvj">   <br><span style="color:#002060">At Puja Site</span></td>
                            </tr>
                            <tr>
                                <td class="tg-aejj"><span style="color:#002060">Payment Methods</span></td>
                                <td class="tg-aejj" colspan="2"> <span style="color:#002060">ONLINE PAYMENT</span></td>
                                <td class="tg-aejj"><span style="color:#002060">CASH</span></td>
                            </tr>
                            <tr>
                                <td class="tg-9wq8"><span style="color:#002060">Adults</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">4000/-</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">5000/-</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">5500/-</span></td>
                            </tr>
                            <tr>
                                <td class="tg-5cz4"><span style="color:#002060">Yuvas</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">3000/-</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">4000/-</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">4500/-</span></td>
                            </tr>
                            <tr>
                                <td class="tg-9wq8"><span style="color:#002060">Children (6-12 years)</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">2000/-</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">2500/-</span></td>
                                <td class="tg-9wq8"><span style="color:#002060">3000/-</span></td>
                            </tr>
                            <tr>
                                <td class="tg-5cz4"><span style="color:#002060">Children below 6 years</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">Nil</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">Nil</span></td>
                                <td class="tg-5cz4"><span style="color:#002060">Nil</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li style="font-weight: 500;">Indian Sahaja yogis - Contribution for ONLY PUJA DAY on December 25, 2023:
                    <div class="table-responsive">
                        <table class="tg">
                            <tbody>
                                <tr>
                                    <td class="tg-9wq8"><span style="color:#002060">Adults, Yuvas, Children</span></th>
                                    <td class="tg-9wq8"><span style="color:#002060">ONLINE - 1000/-</span></th>
                                    <td class="tg-9wq8"><span style="color:#002060">Cash - 1300/-</span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <!-- <li style="font-weight: 500;">Seminar Contribution to be made only using the Online Payment Gateway link below:<br><h6 style="color: rgb(2, 117, 216);">
                <a href="https://www.sahajayogabharat.org/gpseminar/input.php">https://www.sahajayogabharat.org/gpseminar/index.php</a></h6>
                </li> -->
                <li style="font-weight: 500;">Seminar Badges will be issued at Seminar Site/ Trust office.
                </li>
                <li style="font-weight: 500;">Please bring valid ID (i.e. Aadhaar/PAN/Passport) card for verification. 
                </li>
                <li style="font-weight: 500;">Seminar Event expenses includes charges for Stay & Meals (i.e. breakfast, lunch, dinner) from December 22 to 26, 2023.
                </li>
<!--                <li style="font-weight: 500;">Food charges are separately payable for December 21 and December 27, 2023. Accommodation will be -->
<!--provided free for December 21, subject to availability. For stay and food other than seminar dates, please  -->
<!--                 <h6><a href="https://www.sahajayogamumbai.org/gpseminar/food_charges.php" style="color: rgb(2, 117, 216);"> Click Here </a> at the latest by December 12, 2023.</h6>-->
<!--                </li>-->
                <li style="font-weight: 500;">Contribution for SAARC countries will be the same as for Indian nationals.
                </li>
                <li style="font-weight: 500;"><b>Only Puja Day Badges</b> covers only Puja and Mahaprasad. Badges will be given at the seminar site on or after December 24, 2023.
                </li>
                <li style="font-weight: 500;">For any Seminar payment related queries, write to 
                <h6 style="color: rgb(2, 117, 216);"><a target="_blank" href="mailto:seminar.payments@thelifeeternaltrustmumbai.org">seminar.payments@thelifeeternaltrustmumbai.org</a></h6>
                </li>
            </ul>
            <center>
                
                 <?php 
                if ($row['offline_d'] == 'yes') {
                ?>
                 <button class="btn btn-primary" onclick="myFun()">Offline Digital Event Booking</button>
                <?php
                    }
                    if($row['offline_c'] == 'yes')
                    {
                   ?>

                <button class="btn btn-primary" onclick="myFun1()">Offline Cash Event Booking</button>
                <?php
                    }
                    if($row['foreign_dc'] == 'yes')
                    {
                   ?>

               <button class="btn btn-primary" onclick="myFun2()">Foreigner Digital & Cash Event Booking</button>
                <?php
                    }
                    if($row['foodstay'] == 'yes')
                    {
                    ?>
                    <button class="btn btn-primary" onclick="myFun3()">Food & Stay</button>
                   <?php
                    }
                    ?>
              
        </center>
        </div>
    </div>
    </div>
    <script>
        function myFun() {
            //location="https://www.sahajayogabharat.org/gpseminar/eventform.php";
            location="eventform.php";
        }

        function myFun1() {
            //location="https://www.sahajayogabharat.org/gpseminar/eventform.php";
            location="eventformcash.php";
        }

        function myFun2() {
            //location="https://www.sahajayogabharat.org/gpseminar/eventform.php";
            location="eventfromforeign.php";
        }
        
        function myFun3() {
            //location="https://www.sahajayogabharat.org/gpseminar/eventform.php";
            location="foodstaybooking.php";
        }
    </script>
</body>
</html>