<html>
    <title></title>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <style>
            <?php
                $template=2;        // 1 , 2
                if($template==1)
                {
                    $layout="cp_template_1.png";
                    $cpcolor="#2b3990";
                    $cpcolor1="#006838";
                    $hr1="cp_hr_1.png";
                    $title="Nirmal Nagari, Ganapatipule";
                    $title1="23<sup>rd</sup>-26<sup>th</sup> December 2022";
                }
                else{
                    $layout="cp_template_2.png";
                    $cpcolor="#be1e2d";
                    $cpcolor1="#2b3990";
                    $hr1="cp_hr_2.png";
                    $title="Nirmal Nagari, Ganapatipule";
                    $title1="Christmas Puja | 25<sup>th</sup> December 2022";
                }
            ?>

            .break_line{
                display:none;
            }

            body{
                padding:0px;
                margin:0px;
                width:100%;
            }


            .pagesize{
                width:396.85px;
                height:566.92px;
            }

            #cp_box{
                background-image: url("<?php echo $layout;?>");
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-position: center;
                height:100%;
            }

           

            #printbtn{
                padding:4px 30px 4px 30px;
            }


            .cpcontent1{
                position: absolute;
                /* background-color: red; */
                width:320px;
                margin:40px 25px 0px 25px;
            }


            .cpcontent2{
                margin-top:321px !important;
                position: absolute;
                /* background-color: red; */
                width:320px;
                margin:22px 25px 0px 25px;
            }

            .cptable{
                margin-top: -10px;
                font-size: 9.5px;
                width:200px;
                margin-left:59px;
            }


            .cptable tr td{
                padding:2px 2px 2px 2px;
                text-align: center;
                border:2px solid <?php echo $cpcolor1;?>;
            }

            .cph1{
                text-align: center;
                margin-top:-5px;
                color:red;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size:9.5px;
            }

            .cph11{
                text-align: center;
                margin-top:-5px;
                color:red;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size:9.5px;
            }


            .cpcat{
                margin-top:-5px;
                margin-left:35px;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                font-size:9.5px;
            }

            .cph2{
                text-align: center;
                margin-top:-13px;
                color:<?php echo $cpcolor;?>;
                font-family: 'Philosopher', sans-serif;
                font-weight: 600;
                font-size: 17px;
                text-transform: uppercase;
            }


            .cph3{
                text-align: center;
                margin-top:-25px;
                color:<?php echo $cpcolor;?>;
                font-family: 'Philosopher', sans-serif;
                font-weight: 600;
                font-size: 17px;
                text-transform: uppercase;
            }

            .cph4{
                text-align: center;
                margin-top:-18px;
                color:<?php echo $cpcolor1;?>;
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
                font-size: 10px;
            }

            .cph5{
                text-align: center;
                margin-top:-18px;
                color:<?php echo $cpcolor1;?>;
                font-family: 'Poppins', sans-serif;
                font-weight: 400;
                font-size: 10px;
            }


            .cph6{
                margin-top:38px;
                margin-left: 53px;
                color:#2b3990;
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 10px;
            }

            .cph7{
                margin-top:-9px;
                margin-left: 53px;
                color:#2b3990;
                font-family: 'Poppins', sans-serif;
                font-weight: 500;
                font-size: 10px;
            }

            .cpc2h2{
                text-transform:uppercase;
                font-size: 10px;
                text-align: center;
                margin-top: 10px;
                font-weight: 600;
                color:#2b3990;
                font-family: 'Poppins', sans-serif;
                margin-top:7px;
            }

            .cphr{
                margin-top: -15px;
                width:80%;
            }

            .cpacc{
                margin-top: -10px;
                border:2px solid <?php echo $cpcolor1;?>;
                width:180px;
                margin-left: 70px;
                border-radius: 10px;
                height:50px;
                font-size: 9.5px;
                padding:0px 5px 0px 5px;
            }

           


            @media print {
                @page {
                    size:4.13in 5.9in;
                    margin: 0mm !important;
                }

                #cp_box{
                    background: none;
                }

                .cph1,.cph2,.cph3,.cph4,.cph5,.cphr,.cph11,.cpacc,.cpc2h2,.cptable,.cph1{
                    display: none;
                }

                .cphide{
                    display: none;
                }

                .cpshow{
                    margin-left: 60px;
                }

                .pagesize{
                    margin: auto 4.655px;
                    width:100%;
                    height:566.92px;
                }

                .cpcontent1{
                    position: absolute;
                    /* background-color: red; */
                    width:320px;
                    margin:40px 38px 0px 38px;
                }


                .cpcontent2{
                    margin-top:321px !important;
                    position: absolute;
                    /* background-color: red; */
                    width:320px;
                    margin:22px 38px 0px 38px;
                }
                
                #printme{
                    margin-top:-8px;
                }

                .break_line{
                    display:flex;
                }

                .print_hidden {
                    display: none;
                }
            }
            

            @media only screen and (max-width: 390px) {
               

            }
        </style>
    </head>
<body>
    <div style="padding:20px;" class="print_hidden text-center">
        <input type="button" id="printbtn" class="btn btn-dark btn-sm" onclick="printDiv('printme')" value="Print"/>  
        <!-- <input type="button" id="printbtn" class="btn btn-dark btn-sm" onclick="printDiv('cpbox1')" value="Print"/>   -->
    </div>
    <div style="width:98%;" id="printme">
        <div class="row">
            <?php
                for($i=1;$i<=1;$i++)       
                { 
                    $data="<div class='break_line' style='height:12.5px;'></div>";
                    // if($i%4==0)
                    // {
                    //    $data="<div class='break_line' style='height:123px;'></div>";
                    // }
                    // else{
                    //     $data="";
                    // }
                    
            ?>
                
                    
                <div class="col-6 pagesize cpcol_<?php echo $i;?>" id="cpbox1" style="padding:10px;">
                    <div id="cp_box">
                        <div class="cpcontent1" style="transform: rotate(0deg);">
                            <p class="cph1">|| Jai Shree Mataji ||</p>
                            <p class="cph2">International</p>
                            <p class="cph3">&#x2022; Sahaja Yoga Seminar &#x2022;</p>
                            <p class="cph4"><?php echo $title;?></p>
                            <p class="cph5"><?php echo $title1;?></p>
                            <center><img class="cphr" src="<?php echo $hr1;?>"></center>
                            <p class="cph6"><span class="cphide">Name:</span>&nbsp;&nbsp; <span class="cpshow">Chandan Patel</span></p> 
                            <p class="cph7"><span class="cphide">City/Centre:</span>&nbsp;&nbsp; <span class="cpshow">Pune</span></p> 
                            <div class="row cpcat">
                                <div class="col-6">
                                    Adult
                                </div>
                                <div class="col-6">
                                    AM0511202200085
                                </div>
                            </div>
                        </div>

                        <div class="cpcontent2" style="transform: rotate(180deg);">
                            <p class="cph11">|| Jai Shree Mataji ||</p>
                            <table class="cptable table-sm table-bordered table-condensed">
                                <tr>
                                    <td>23rd Dec</td>
                                    <td>Breakfast</td>
                                    <td>Lunch</td>
                                    <td>Dinner</td>
                                </tr>
                                <tr>
                                    <td>24rd Dec</td>
                                    <td>Breakfast</td>
                                    <td>Lunch</td>
                                    <td>Dinner</td>
                                </tr>
                                <tr>
                                    <td>25rd Dec</td>
                                    <td>Breakfast</td>
                                    <td>Lunch</td>
                                    <td>Dinner</td>
                                </tr>
                                <tr>
                                    <td>26rd Dec</td>
                                    <td>Breakfast</td>
                                    <td>Lunch</td>
                                    <td>Dinner</td>
                                </tr>
                            </table>

                            <p class="cpc2h2">ACCOMMODATION</p>
                            <p class="cpacc">
                                
                            </p>
                        </div>
                    </div>
                </div>

                <?php echo $data;?>

           <?php
                }
            ?> 
        </div>
    </div>

    <script>
      function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
      
      function printDivMain() {
        window.print();
      }
    </script>
</body>
</html>