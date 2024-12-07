
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule, 2023</title>

    <link rel="stylesheet" href="assets/form-basic.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


    <script src="assets/dynamicAction_1.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/style.css"/> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!--<script src="script.js/jquery.js"></script>	-->

    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/event.css">

    <style>
    input[type=file] {
        color: transparent;
    }

    .mytableresp {}

    .mytable {
        margin-left: 0px;
    }

    .lebelCls {
        color: #5F5F5F;
        font-size: 14px;
    }

    .mybtnright {
        margin-left: 590px;
    }

    .mybtnleft {}

    @media only screen and (max-width: 900px) {
        .mytableresp {
            width: 100%;
            overflow: auto;
        }

        .mybtn {
            margin-left: 70px;
        }

        .mytable {
            margin-left: 0px;
        }
    }
    </style>
    
    <script language="JavaScript">
 
function disableCtrlKeyCombination(e)
{
//list all CTRL + key combinations you want to disable
var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j' , 'w');
var key;
var isCtrl;
if(window.event)
{
key = window.event.keyCode;     //IE
if(window.event.ctrlKey)
isCtrl = true;
else
isCtrl = false;
}
else
{
key = e.which;     //firefox
if(e.ctrlKey)
isCtrl = true;
else
isCtrl = false;
}
//if ctrl is pressed check if other key is in forbidenKeys array
if(isCtrl)
{
for(i=0; i<forbiddenKeys.length; i++)
{
//case-insensitive comparation
if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
{
// alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
return false;
}
}
}
return true;
}
</script>

</head>
<body onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
    <header>
    <div align="centre">
        <img align="left" src="assets/logo3.png" height="70" width="70" />
         <a href="print.php" target="_blank">Participant Login</a> 
    </div>
    <style>
    .eventtable {
        width: 150px !important;
    }
    </style>
</header>

<div class="main-content">


    <form class="form-basic" method="post" name="myForm" action="EazyPayPGevent.php" id="formfield"
        enctype="multipart/form-data">

        <div class="form-title-row">
            <h3 style="text-align: center;">The Life Eternal Trust, Mumbai</h3>
            <h2 style="text-align: center;">International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule</h2>
            <h3 style="text-align: center;">December 22-26, 2023</h3>
            <h4>Online Contribution for Indians Only.</h4>
            <p style="font-size:12px">All * Fields are mandatory to fill.</p>
        </div>

        <div class="form-title-row partiH3">
            <h3>Participant's Details</h3>
        </div>

        <?php
    $sqlEvent = "select event_id from events_new where form_name='event'";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once 'dbConnection1.php';

    $resultEvent = mysqli_query($conn, $sqlEvent);

    while ($row = mysqli_fetch_assoc($resultEvent)) {
      $eventId = $row['event_id'];
    } ?>
        <input type="text" id="eventid" name="eventid" value="<?php echo $eventId ?>" style="display:none">

        <div class="form-row">
        <label><span class="contri">Contribution Towards *</span></label>
            <div class="form-radio-buttons" id="paymentType">
                <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        include_once 'dbConnection1.php';

        $sql = "SELECT * FROM events_new where form_name = 'event'";
        $resultevent = $conn->query($sql);

        while ($row = mysqli_fetch_assoc($resultevent)) {
          $payment_towards = $row['contribution_toward'];
          $towardsArray = explode("*", $payment_towards);

          foreach ($towardsArray as $val) {
            

        ?>
               <div>
                    <label>
                        <input class="common" type="radio" name="contriRadio" id="rad1"
                            value='<?php echo $val;?>' onclick="reset1()"/>
                        <span class="myradio"><?php echo $val; ?></span>
                    </label>
                </div>

                <script>
                    function reset1()
                    {
        
                        
                        addRowsOrRemoveByNumber(0);
                        addRowsOrRemoveByNumberYuva(0);
                        addRowsOrRemoveByNumberChild(0);
                        document.getElementById("number_adult1").value = 0;
                        document.getElementById("number_yuva1").value = 0;
                        document.getElementById("number_child1").value = 0; 
                        document.getElementById("amount").value = 0;
                        finalTotalAmountAdult = 0;
                        finalTotalAmountYuva = 0;
                        finalTotalAmountChild = 0;
                        

                    }
                </script>
                <?php }
        } ?>


            </div>
        </div>

        <br>
        <br>

        <div class="form-row">
            <label>
                <span>Numbers of Adult</span>
                <input type="number" value="0" id="number_adult1" name="number_adult1"
                    oninput="addRowsOrRemoveByNumber(this.value), getAdultNumber(this.value)">
            </label>
        </div>



        <div class="mytableresp">
            <table class="table table-bordered mytable" id="adult">
                <thead>
                    <tr>
                        <th scope="col" class="lebelCls">Adult Name *</th>
                        <th scope="col" class="lebelCls">Gender *</th>
                        <th scope="col" class="lebelCls">State *</th>
                        <th scope="col" class="lebelCls">District *</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


      


        <br><br>
        <div class="form-row">
            <label>
                <span>Numbers of Yuva</span>
                <input type="number" value="0" id="number_yuva1" name="number_yuva1"
                    oninput="addRowsOrRemoveByNumberYuva(this.value), getYuvaNumber(this.value)">
            </label>


            <br><br>
            <table class="table table-bordered mytable" id="yuva">
                <thead>
                    <tr>

                        <th scope="col" class="lebelCls">Yuva Name *</th>
                        <th scope="col" class="lebelCls">Gender *</th>
                        <th scope="col" class="lebelCls">State *</th>
                        <th scope="col" class="lebelCls">District *</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>

        <br><br>
        <div class="form-row">
            <label>
                <span>Numbers of Child</span>
                <input type="number" value="0" id="number_child1" name="number_child1"
                    oninput="addRowsOrRemoveByNumberChild(this.value), getChildNumber(this.value)">
            </label>

            <br><br>
            <table class="table table-bordered mytable" id="child">
                <thead>
                    <tr>
                        <th scope="col" class="lebelCls">Child Name *</th>
                        <th scope="col" class="lebelCls">Gender *</th>
                        <th scope="col" class="lebelCls">State *</th>
                        <th scope="col" class="lebelCls">District *</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <br><br>
      

        <div class="form-row">
            <label>
                <span>Total Amount *</span>
                <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include_once 'dbConnection1.php';
        $sql = "select * from events_new where form_name = 'event'";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $start_date =  $row['startdate'];
          $end_date = $row['enddate'];
          $event_Id = $row['event_id'];
        }
      

        // echo $adultAmount2."<br>";
        // echo $yuvaAmount."<br>";
        // echo $childAmount."<br>";
       

    
        ?>
                <input type="hidden" id="startDate" value="<?php echo $start_date; ?>">
                <input type="hidden" id="endDate" value="<?php echo $end_date; ?>">
                    
                <script>

            
                
                let strtDate = document.getElementById('startDate').value;
                let endDate = document.getElementById('endDate').value;
               
              
                var finalTotalAmountAdult =0;
                var finalTotalAmountYuva =0;
                var finalTotalAmountChild=0;



            
                function getAdultNumber(num) {
                 
                  let x = new Date().toISOString().slice(0, 10);
                  let y = new Date('2023-12-12').toISOString().slice(0, 10);

                //   alert(x);
                //   alert(y);

                var radioValue = $("input[name='contriRadio']:checked").val();

                  if(y > x)
                 {
                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                            finalTotalAmountAdult =  4000 * num;
                            }
                            else
                            {
                            finalTotalAmountAdult =  1000 * num;  
                            }
                            

                 }
                 else
                 {
                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                            finalTotalAmountAdult =  5000 * num;
                            }
                            else
                            {
                            finalTotalAmountAdult =  1000 * num;  
                            }
                 }
                    
                   document.getElementById('amount').value = finalTotalAmountAdult + finalTotalAmountYuva + finalTotalAmountChild;
                 
                }

                function getYuvaNumber(num) {

                  let x = new Date().toISOString().slice(0, 10);
                  let y = new Date('2023-12-12').toISOString().slice(0, 10);

                //   alert(x);
                //   alert(y);

                var radioValue = $("input[name='contriRadio']:checked").val();

                  if(y > x)
                 {

                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                                finalTotalAmountYuva =  3000 * num;
                            }
                            else
                            {
                                finalTotalAmountYuva =  1000 * num; 
                            }
                    

                 }
                 else
                 {
                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                                finalTotalAmountYuva =  4000 * num;
                            }
                            else
                            {
                                finalTotalAmountYuva =  1000 * num; 
                            }
                 }

                    
                   document.getElementById('amount').value = finalTotalAmountAdult + finalTotalAmountYuva + finalTotalAmountChild;
                  }


                
                function getChildNumber(num) {

                  let x = new Date().toISOString().slice(0, 10);
                  let y = new Date('2023-12-12').toISOString().slice(0, 10);

                //   alert(x);
                //   alert(y);


                var radioValue = $("input[name='contriRadio']:checked").val();

                  if(y > x)
                 {

                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                                finalTotalAmountChild =  2000 * num;
                            }
                            else
                            {
                                finalTotalAmountChild =  1000 * num; 
                            }
                    

                 }
                 else
                 {
                    if(radioValue == 'International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule')
                            {
                                finalTotalAmountChild =  2500 * num;
                            }
                            else
                            {
                                finalTotalAmountChild =  1000 * num; 
                            }
                 }

                   document.getElementById('amount').value = finalTotalAmountAdult + finalTotalAmountYuva + finalTotalAmountChild;
                  }
               
                </script>
                <input type="number" name="amount" id="amount" readonly>
            </label>
        </div>


        <div class="form-title-row">
            <h3>Payer's Details</h3>
        </div>

        <div class="form-row">
            <label>
                <span>First Name *</span>
                <input type="text" name="fname" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" id="fname" width="100%">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Last Name *</span>
                <input type="text" name="lname" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" id="lname">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Mobile No. *</span>
                <input type="text" name="mobile" id="mobile" />
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Email *</span>
                <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>State *</span>
                <!-- <input type="text" name="city" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" id="city"> -->

                <select onChange="getdistrict(this.value);"  name="city" id="city"  style="width:300px; max-width:100% !important;">
                          <option value="">Select</option>
                          <?php 
                          include('db.php');
                          $query =mysqli_query($conn,"SELECT * FROM state");
                           while($row=mysqli_fetch_array($query))
                             { ?>
                          <option value="<?php echo $row['StCode'];?>"><?php echo $row['StateName'];?></option>
                           <?php
                            }
                            ?>
                         </select>
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>District *</span>
                <select name="dist" id="dist" style="width:300px; max-width:100% !important;">
                         <option value="">Select</option>
                          </select>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Pincode *</span>
                <input type="text" name="pincode" id="pincode">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>PAN No. *</span>
                <input type="text" name="pan" id="pan" maxlength="10">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>AADHAAR No.</span>
                <input type="text" name="aadhaar" id="aadhaar">
            </label>
        </div>
        <input type="hidden" name="Who_im" id="Who_im" value="gpseminar" />

        <input type="hidden" name="total_people" id="total_people" />

        <div align="centre">

            <label>
                <button type="button" name="btn_validate" id="bt_validate" class="btn btn-summary"
                    onclick="checkValidateAllFields()" style="display:block">Next</button>
                <input type="button" name="btn" value="All Good! Proceed" id="submitBtn" data-toggle="modal"
                    data-target="#confirm-submit" style="display:none" />
                <button type="button" name="resetBtn" id="resetBtn" onclick="resetFields()" class="btn btn-failure"
                    style="display:none">Reset </button>

            </label>
             <p style="margin-left: 0;margin-right: 0;" margin-right = "50px;" align="justify">
				<font color="red">
                    <br>
                    We thank you for your registration. You will receive the registration receipt on email. If required, you can also download your receipt by using Participant Login (given at top right of this page).
				</font> 
			</p>

        </div>
    </form>
</div>
<br />
<br />
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Are you sure you want to pay with the following details?
                <table class="table">
                    <tr>
                        <th>First Name</th>
                        <td id="s_fname"></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td id="s_lname"></td>
                    </tr>
                    <tr>
                        <th>Mobile No.</th>
                        <td id="s_mobile"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="s_email"></td>
                    </tr>
                    <!-- <tr>
                        <th>State</th>
                        <td id="s_city"></td>
                    </tr> -->

                    <tr>
                        <th>District</th>
                        <td id="s_dist"></td>
                    </tr>

                    <tr>
                        <th>Pincode</th>
                        <td id="s_pincode"></td>
                    </tr>
                    <tr>
                        <th>PAN No.</th>
                        <td id="s_pan"></td>
                    </tr>
                    <tr>
                        <th>AADHAAR No.</th>
                        <td id="s_aadhaar"></td>
                    </tr>
                    <tr>
                        <th>Contibution Towards</th>
                        <td style="font-size:15px;" id="s_payment_towards"></td>
                    </tr>
                    <tr>
                        <th>Total Adults</th>
                        <td id="s_number_adult"></td>
                    </tr>
                    <tr>
                        <th>Total Yuva</th>
                        <td id="s_number_yuva"></td>
                    </tr>
                    <tr>
                        <th>Total Child</th>
                        <td id="s_number_child"></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td id="s_amount"></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Submit</a>
            </div>
        </div>
    </div>
</div>

</body>


<script type="text/javascript">
//Adult table adding and removing

function addRowsOrRemoveByNumber(inputNumber) {
    inputNumber = inputNumber*1;
    //alert('input : '+inputNumber);
    if (inputNumber == "" && inputNumber > 0) {
        //alert('return');
        return; 
    }
    if (inputNumber > 7) {
        alert("You can add only 7 entries here.");
        $("#number_adult1").val(0);
        return;
    }
    // check lenght of table here
    var rowCount = document.getElementById('adult').rows.length * 1 - 1;
    var rowCountDiff = 0;
    // check inputNumber and lenght
    // if length is greater then add row
    if (rowCount < inputNumber * 1) {
        //alert('if');
        rowCountDiff = inputNumber - rowCount;

        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            addRowsadult();
        }

    } else { // if lenght is lower than inputNumber then remove differece number rows..
        rowCountDiff = rowCount - inputNumber;
        //alert(rowCountDiff);
        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            deleteRowsadult();
        }
    }
}



//Yuva table adding and removing
function addRowsOrRemoveByNumberYuva(inputNumberyuva) {
    inputNumberyuva = inputNumberyuva*1;
    if (inputNumberyuva == "" && inputNumberyuva > 0) {
        return;
    }
    if (inputNumberyuva > 7) {
        alert("You can add only 7 entries here.");
        $("#number_yuva1").val(0);
        return;
    }
    // check lenght of table here
    var rowCount = document.getElementById('yuva').rows.length * 1 - 1;
    var rowCountDiff = 0;
    // check inputNumberyuva and lenght
    // if length is greater then add row
    if (rowCount < inputNumberyuva * 1) {
        rowCountDiff = inputNumberyuva - rowCount;

        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            addRowsyuva();
        }

    } else { // if lenght is lower than inputNumberyuva then remove differece number rows..
        rowCountDiff = rowCount - inputNumberyuva;

        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            deleteRowsyuva();
        }
    }
}


//Child table adding and removing

function addRowsOrRemoveByNumberChild(inputNumberchild) {
    if (inputNumberchild == "") {
        return;
    }
    if (inputNumberchild > 7) {
        alert("You can add only 7 entries here.");
        $("#number_child1").val(0);
        return;
    }
    // check lenght of table here
    var rowCount = document.getElementById('child').rows.length * 1 - 1;
    var rowCountDiff = 0;
    // check inputNumberchild and lenght
    // if length is greater then add row
    if (rowCount < inputNumberchild * 1) {
        rowCountDiff = inputNumberchild - rowCount;

        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            addRowschild();
        }

    } else { // if lenght is lower than inputNumberchild then remove differece number rows..
        rowCountDiff = rowCount - inputNumberchild;

        //for loop for rowcountdiff number
        for (var i = rowCountDiff; i > 0; i--) {
            deleteRowschild();
        }
    }
}

//Adult table add function

function addRowsadult() {

    var table = document.getElementById('adult');
    var rowCount = table.rows.length * 1;
    if (rowCount >= 8) {
        alert("You can add only seven adults.");
        $("#number_adult1").val(4);
        return;
        exit();
    }
    var cellCount = table.rows[0].cells.length;
    //alert(table.rows[0].cells[0].value);
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = 'adult' + i;

        // alert(rowCount);
        if (rowCount == 1) {

            cell = row.insertCell(0);
            cell.id = 'adult0';
            var copycel =
                '<input style="width:180px !important" class="eventtable" type="text" onkeydown="return /^([^0-9]*)$/i.test(event.key)" id="adult_name" name="adult_name[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(1);
            cell.id = 'adult1';
            var copycel =
                '<select style="width:150px !important" name="adult_gender[]" id="adult_gender" class="eventtable"><option value="">Select Gender</option><option value="female">Female</option>          <option value="male">Male</option>        </select>';
            cell.innerHTML = copycel;
            cell = row.insertCell(2);
            cell.id = 'adult2';
            var copycel =
                '<input style="width:200px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="adult_city" name="adult_city[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(3);
            cell.id = 'adult3';
            var copycel =
                '<input style="width:170px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="adult_centre" name="adult_centre[]" value="">';
            cell.innerHTML = copycel;
            //cell = row.insertCell(4);
            //cell.id = 'adult4';
            //var copycel =
            //    '<input style="width:210px !important; padding:9px" class="eventtable" type="file" name="adult_image[]"  value="" onchange="validateSizeAdult(this)" placeholder="">';
            //cell.innerHTML = copycel;
            // console.log("1--------->"+ copycel);


            return;
        } else {
            cell = row.insertCell(i);
            var copycel = document.getElementById('adult' + i).innerHTML;
            cell.innerHTML = copycel;
            // console.log("2--------->"+ copycel);
        }

        if (i == 3) {}
    }
    // $("#number_adult1").val(rowCount);

}

//Adult table remove function

function deleteRowsadult() {
    var table = document.getElementById('adult');
    var rowCount = table.rows.length * 1;
    if (rowCount > 1) {
        var row = table.deleteRow(rowCount - 1);
        rowCount--;
    } else {
        alert('There should be atleast one row');
    }
    $("#number_adult1").val(rowCount - 1);
}

//Yuva table add function

function addRowsyuva() {
    var table = document.getElementById('yuva');
    var rowCount = table.rows.length;
    if (rowCount >= 8) {
        alert("You can add only seven yuva.");
        $("#number_yuva1").val(4);
        return;
        exit();
    }
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = 'yuva' + i;


        if (rowCount == 1) {

            cell = row.insertCell(0);
            cell.id = 'yuva0';
            var copycel =
                '<input style="width:180px !important" class="eventtable" onkeydown="return /^([^0-9]*)$/i.test(event.key)" type="text" id="yuva_name" name="yuva_name[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(1);
            cell.id = 'yuva1';
            var copycel =
                '<select style="width:150px !important" name="yuva_gender[]" id="yuva_gender" class="eventtable"><option value="">Select Gender</option><option value="female">Female</option>          <option value="male">Male</option>        </select>';
            cell.innerHTML = copycel;
            cell = row.insertCell(2);
            cell.id = 'yuva2';
            var copycel =
                '<input style="width:200px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="yuva_city" name="yuva_city[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(3);
            cell.id = 'yuva3';
            var copycel =
                '<input style="width:170px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="yuva_centre" name="yuva_centre[]" value="">';
            cell.innerHTML = copycel;
            //cell = row.insertCell(4);
            //cell.id = 'yuva4';
            //var copycel =
            //    '<input style="width:210px !important; padding:9px" class="eventtable" type="file" name="yuva_image[]" onchange="validateSizeYuva(this)" value="" placeholder="">';
            //cell.innerHTML = copycel;
            return;
        } else {
            cell = row.insertCell(i);
            var copycel = document.getElementById('yuva' + i).innerHTML;
            cell.innerHTML = copycel;
        }
        if (i == 3) {}
    }
    $("#number_yuva1").val(rowCount);
}


//Yuva table remove function

function deleteRowsyuva() {
    var table = document.getElementById('yuva');
    var rowCount = table.rows.length;
    if (rowCount > '1') {
        var row = table.deleteRow(rowCount - 1);
        rowCount--;
    } else {
        alert('There should be atleast one row');
    }
    $("#number_yuva1").val(rowCount - 1);
}

//Child table add function

function addRowschild() {
    var table = document.getElementById('child');
    var rowCount = table.rows.length;
    if (rowCount >= 8) {
        alert("You can add only seven childs.");
        $("#number_child1").val(4);
        return;
        exit();
    }
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = 'child' + i;
        if (rowCount == 1) {
            var tempTable = document.getElementById('tempTableChild');
            cell = row.insertCell(0);
            cell.id = 'child0';
            var copycel =
                '<input style="width:180px !important" class="eventtable" onkeydown="return /^([^0-9]*)$/i.test(event.key)" type="text" id="child_name" name="child_name[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(1);
            cell.id = 'child1';
            var copycel =
                '<select style="width:150px !important" name="child_gender[]" id="child_gender" class="eventtable"><option value="">Select Gender</option><option value="female">Female</option>          <option value="male">Male</option>        </select>';
            cell.innerHTML = copycel;
            cell = row.insertCell(2);
            cell.id = 'child2';
            var copycel =
                '<input style="width:200px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="child_city" name="child_city[]" value="">';
            cell.innerHTML = copycel;
            cell = row.insertCell(3);
            cell.id = 'child3';
            var copycel =
                '<input style="width:170px !important" class="eventtable" onkeydown="return /^[A-Za-z]*$/i.test(event.key)" type="text" id="child_centre" name="child_centre[]" value="">';
            cell.innerHTML = copycel;
            //cell = row.insertCell(4);
            //cell.id = 'child4';

            //var copycel =
            //    '<input style="width:210px !important; padding:9px" class="eventtable" type="file" name="child_image[]" value="" onchange="validateSizeChild(this)" placeholder="">';
            // cell.innerHTML = copycel;
            return;
        } else {
            cell = row.insertCell(i);
            var copycel = document.getElementById('child' + i).innerHTML;
            cell.innerHTML = copycel;
        }
        if (i == 3) {}
    }
    $("#number_child1").val(rowCount);
}


//Child table remove function

function deleteRowschild() {
    var table = document.getElementById('child');
    var rowCount = table.rows.length;
    if (rowCount > '1') {
        var row = table.deleteRow(rowCount - 1);
        rowCount--;
    } else {
        alert('There should be atleast one row');
    }
    $("#number_child1").val(rowCount - 1);
}

$(document).ready(function() {
    
    disableclick();
    
    var i = 1;
    $("#add_row").click(function() {
        $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input name='name" + i +
            "' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail" +
            i +
            "' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile" +
            i + "' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

        $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
        i++;
    });
    $("#delete_row").click(function() {
        if (i > 1) {
            $("#addr" + (i - 1)).html('');
            i--;
        }
    });

});


$('#submitBtn').click(function() {
    /* when the button in the form, display the entered values in the modal */
    $('#s_fname').text($('#fname').val());
    $('#s_lname').text($('#lname').val());
    //	$('#s_item').text($('#item').val());
    $('#s_email').text($('#email').val());
    $('#s_mobile').text($('#mobile').val());
    $('#s_city').text($('#city').val());
    $('#s_dist').text($('#dist').val());
    $('#s_pincode').text($('#pincode').val());
    $('#s_pan').text($('#pan').val());
    $('#s_aadhaar').text($('#aadhaar').val());
    $('#s_payment_towards').text($("input[type=radio][name=contriRadio]").filter(":checked")[0]
        .value);
    $('#s_number_adult').text($('#number_adult1').val());
    $('#s_number_yuva').text($('#number_yuva1').val());
    $('#s_number_child').text($('#number_child1').val());
    //		$('#s_payment_for').text($('#paymentFor').val());
    //		$('#s_payment_towards').text($('#paymentTowards').val());
    $('#s_amount').text($('#amount').val());
});

$('#submit').click(function() {
    /* when the submit button in the modal is clicked, submit the form */
    //alert('submitting');
    $('#formfield').submit();
});


//validation id started from here


function validateSizeAdult(input) {
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > 5) {
    alert('Image size exceeds 5 MB');
    input.value = '';
    // $(file).val(''); //for clearing with Jquery
  } else {
    // Proceed further
  }
}

function validateSizeYuva(input) {
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > 5) {
    alert('Image size exceeds 5 MB');
    input.value = '';
    // $(file).val(''); //for clearing with Jquery
  } else {
    // Proceed further
  }
}

function validateSizeChild(input) {
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > 5) {
    alert('Image size exceeds 5 MB');
    input.value = '';
    // $(file).val(''); //for clearing with Jquery
  } else {
    // Proceed further
  }
}

var errorFlag = false;

function checkValidateAllFields() {
    errorFlag = true;

    if (!toward()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkAdultOrYuva()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkAdult()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkYuva()) {
        errorFlag = false;
        return errorFlag;
    }



    if (!checkChild()) {
        errorFlag = false;
        return errorFlag;
    }


    if (!checkFirstName()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkLastName()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkMobile()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkEmail()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkCity()) {
        errorFlag = false;
        return errorFlag;
    }

    if (!checkdist()) {
        errorFlag = false;
        return errorFlag;
    }
    if (!checkPIN()) {
        errorFlag = false;
        return errorFlag;
    }
    if (!checkPan()) {
        errorFlag = false;
        return errorFlag;
    }
    if (!checkAadhaar()) {
        errorFlag = false;
        return errorFlag;
    }

    if (errorFlag) {
        document.getElementById("submitBtn").style.display = "block";
        document.getElementById("bt_validate").style.display = "none";
    }

    return errorFlag;
}

function toward() {
    var option = document.getElementsByName("contriRadio");
    if (!(option[0].checked || option[1].checked)) {
        alert("Please select contribution towards");
        document.getElementById("rad1").focus();
        return false;
    } else {
        return true;
    }
}

function checkAdultOrYuva() {
    if ((document.getElementById('number_adult1').value + document.getElementById('number_yuva1').value + document.getElementById('number_child1').value) < 1) {
        alert("Please add atleast one adult or one yuva or one child");
        $('#number_adult1').focus();
        return false;
    } else {
        // alert();
        return true;
    }
}

function checkAdult() {
    let index = 0;
    let val = true;
    let adultName = document.getElementsByName("adult_name[]");

    let adultGender = document.getElementsByName("adult_gender[]");
    let adultCity = document.getElementsByName("adult_city[]");
    let adultCentre = document.getElementsByName("adult_centre[]");
    let adultImage = document.getElementsByName("adult_image[]");

    for (index = 0; index < document.getElementById("number_adult1").value; index++) {
        if (adultName[index].value == "") {
            alert("Please enter adult's name");
            $(adultName[index]).focus();
            val = false;
            exit();
        }
        if (adultGender[index].value == "") {
            alert("Please select adult's gender");
            //errorFlag=true;
            $(adultGender[index]).focus();
            val = false;
            exit();
        }
        if (adultCity[index].value == "") {
            alert("Please enter adult's state");
            //errorFlag=true;
            $(adultCity[index]).focus();
            val = false;
            exit();
        }
        if (adultCentre[index].value == "") {
            alert("Please enter adult's district");
            //errorFlag=true;
            $(adultCentre[index]).focus();
            val = false;
            exit();
        }
        
    }
    return val;
}

function checkYuva() {
    let index = 0;
    let val = true;
    let yuvaName = document.getElementsByName('yuva_name[]');
    let yuvaGender = document.getElementsByName('yuva_gender[]');
    let yuvaCity = document.getElementsByName('yuva_city[]');
    let yuvaCentre = document.getElementsByName('yuva_centre[]');
    for (index = 0; index < document.getElementById('number_yuva1').value; index++) {
        if (yuvaName[index].value == '') {
            alert("Please enter yuva's name");
            //errorFlag=true;
            $(yuvaName[index]).focus();
            val = false;
            exit();
        }
        if (yuvaGender[index].value == '') {
            alert("Please select yuva's gender");
            //errorFlag=true;
            $(yuvaGender[index]).focus();
            val = false;
            exit();
        }
        if (yuvaCity[index].value == '') {
            alert("Please enter yuva's state");
            //errorFlag=true;
            $(yuvaCity[index]).focus();
            val = false;
            exit();

        }
        if (yuvaCentre[index].value == '') {
            alert("Please enter yuva's district");
            //errorFlag=true;
            $(yuvaCentre[index]).focus();
            val = false;
            exit();
        }
    }
    return val;
}

function checkChild() {
    let index = 0;
    let val = true;
    let childName = document.getElementsByName('child_name[]');
    let childGender = document.getElementsByName('child_gender[]');
    let childCity = document.getElementsByName('child_city[]');
    let childCentre = document.getElementsByName('child_centre[]');
    for (index = 0; index < document.getElementById('number_child1').value; index++) {
        if (childName[index].value == '') {
            alert("Please enter child's name");
            //errorFlag=true;
            $(childName[index]).focus();
            val = false;
            exit();

        }
        if (childGender[index].value == '') {
            alert("Please select child's gender");
            //errorFlag=true;
            $(childGender[index]).focus();
            val = false;
            exit();
            a
        }
        if (childCity[index].value == '') {
            alert("Please enter child's state");
            //errorFlag=true;
            $(childCity[index]).focus();
            val = false;
            exit();

        }
        if (childCentre[index].value == '') {
            alert("Please enter child's district");
            //errorFlag=true;
            $(childCentre[index]).focus();
            val = false;
            exit();
        } else {
            val = true;
        }
    }
    return val;
}

function checkMobile() {
    var regmobile = new RegExp("^[0-9]{10}$");
    var mobilevalue = document.getElementById("mobile").value;
    if (mobilevalue == "") {
        alert("Please enter Mobile No.");
        errorFlag = true;
        document.getElementById("mobile").focus();
        return false;
    } else {
        if (!regmobile.test(mobilevalue)) {
            //document.getElementById("mobile").value = "";
            alert("Please enter a valid Mobile No.");
            errorFlag = true;
            document.getElementById("mobile").focus();
            return false;
        } else {
            //alert('mobile number good');
            return true;
        }
    }
}

function checkPIN() {
    var regpin = new RegExp("^[0-9]{6}$");
    var pinvalue = document.getElementById("pincode").value;
    if (pinvalue == '') {
        alert("Please enter pin");
        errorFlag = true;
        document.getElementById("pincode").focus();
        return false;
    } else {
        if (pinvalue != "" && !regpin.test(pinvalue)) {
            //document.getElementById("pincode").value = "";
            alert("Please enter a valid PIN.");
            errorFlag = true;
            document.getElementById("pincode").focus();
            return false;
        } else {
            return true;
        }
    }
}

function checkPan() {
    var panValue = document.getElementById("pan").value;
    var regpan = new RegExp("([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}");
    if (panValue == "") {
        alert("Please enter PAN No.");
        errorFlag = true;
        document.getElementById("pan").focus();
        return false;
    } else {
        if (!regpan.test(panValue)) {
            //document.getElementById("pan").value = "";
            alert("Please enter a valid PAN Number.");
            errorFlag = true;
            document.getElementById("pan").focus();
            return false;
        } else {
            return true;
        }
    }
}

function checkAadhaar() {
    var adharValue = document.getElementById("aadhaar").value;
    var panValue = document.getElementById("pan").value;
    var regaadhaar = new RegExp("\\d{12}");
    if (panValue == "" && adharValue == "") {
        alert("Please Enter PAN Card or Aadhaar Number.");
        document.getElementById("pan").focus();
        errorFlag = true;
        return false;
    } else {
        if (adharValue != "" && !regaadhaar.test(adharValue)) {
            alert("Please Enter a valid Aadhaar Number.");
            //document.getElementById("aadhaar").value = "";
            errorFlag = true;
            document.getElementById("aadhaar").focus();
            return false;
        } else {
            return true;
        }
    }
}

function checkEmail() {
    var regemail = /\S+@\S+\.\S+/;
    var emailId = document.getElementById("email").value;
    if (emailId == "") {
        alert("Please enter Email Id.");
        errorFlag = true;
        document.getElementById("email").focus();
        return false;
    } else {
        if (!regemail.test(emailId)) {
            alert("Please enter a valid Email Id.");
            //document.getElementById("email").value = "";
            errorFlag = true;
            document.getElementById("email").focus();
            return false;
        } else {
            return true;
        }
    }
}

function digits_count(n) {
    var count = 0;
    if (n >= 1) ++count;

    while (n / 10 >= 1) {
        n /= 10;
        ++count;
    }

    return count;
}

function checkAmount() {
    var amount = document.getElementById("amount").value;
    if (amount == "" || amount <= 0 || digits_count(amount) > 7) {
        alert("Please enter a valid amount up to 7 digits.");
        errorFlag = true;
        document.getElementById("amount").focus();
        return false;
    } else {
        return true;
    }
}

function checkFirstName() {
    var fname = document.getElementById("fname").value;
    if (fname == "") {
        alert("Please enter your first name.");
        errorFlag = true;
        document.getElementById("fname").focus();
        return false;
    } else {
        return true;
    }
}

function checkLastName() {
    var lname = document.getElementById("lname").value;
    if (lname == "") {
        alert("Please enter your last name.");
        errorFlag = true;
        document.getElementById("lname").focus();
        return false;
    } else {
        return true;
    }
}



function checkCity() {
    var city = document.getElementById("city").value;
    if (city == "") {
        alert("Please select your state.");
        errorFlag = true;
        document.getElementById("city").focus();
        return false;
    } else {
        return true;
    }
}

function checkdist() {
    var city = document.getElementById("dist").value;
    if (city == "") {
        alert("Please select your district.");
        errorFlag = true;
        document.getElementById("dist").focus();
        return false;
    } else {
        return true;
    }
}

function validateFields() {
    //errorValidation=true;
    var errorValidation = checkValidateAllFields();
    if (errorValidation) {
        //alert('all good!');
        document.getElementById("bt_validate").style.display = "none";
        document.getElementById("submitBtn").style.display = "block";
        //document.getElementById("resetBtn").style.display = 'block';
    }
}

function resetFields() {
    $("#fname").value = "";
    $("#lname").value = "";
    $("#email").value = "";
    $("#mobile").value = "";
    $("#city").value = "";
    $("#pincode").value = "";
    $("#pan").value = "";
    $("#aadhaar").value = "";
}
</script>
<script>
function disableclick(){
    document.addEventListener('contextmenu',
					event => event.preventDefault());
}
</script>


<script>
function getdistrict(val) {
  $.ajax({
  type: "POST",
  url: "datahandler.php",
  data:'state_id='+val,
  success: function(data){
    $("#dist").html(data);
  }
  });
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</body>
</html>