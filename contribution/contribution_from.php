<?php
session_start();
include_once 'dbConnection.php';
print_r($_SESSION);
echo $selectedType=$_SESSION['type'];
$selectedType = isset($_SESSION['type']) ? $_SESSION['type'] : 'general';
$mobile = $_SESSION["mobile"];
$q2 = "select * from registration_table where Mobile='" . $mobile . "'";
$rs2 = mysqli_query($conn, $q2);
$row2 = mysqli_fetch_array($rs2);
?>



<html>
<script src="./assets/dynamicAction.js"></script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sahaja Yoga Donation</title>
    <?php include_once 'header1.php' ?>
    <style>
        #submitBtn {
            width: 150px;
            color: white;
            background-color: #28a745;
            
           
        }

        #submitBtn:hover {
            color: #f8f9fa;
            background-color: #218838;
           
        }

        #submitBtn:active {
            color: #e9ecef;
            background-color: #1e7e34;
           
        }
    </style>
    <div class="main-content">

        <form class="form-basic mt-5" method="post" action="EazyPayPGtest.php" id="formfield" style="border-radius: 20px 20px 20px 20px; box-shadow: 0 -4px 6px 4px rgba(0, 0, 0, 0.1) ">

            <div class="form-title-row">
                <h2>The Life Eternal Trust, Mumbai</h2>
                <br />
                <h2>DONATIONS</h2>
                <br />
                <p>Only for DONATION in INR from INDIAN Accounts.</p>
                <p>All * Fields are mandatory to fill.</p>
            </div>

            <div class="form-row">
                <label>
                    <span>First name *</span>
                    <input type="text" name="fname" id="fname" width="100%" value="<?php echo $row2['Fname'] ?>" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Last Name *</span>
                    <input type="text" name="lname" id="lname" value="<?php echo $row2['Lname'] ?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Mobile No. *</span>
                    <input type="text" name="mobile" id="mobile" value="<?php if ($row2['Mobile'] != '') {
                                                                            echo $row2['Mobile'];
                                                                        } else {
                                                                            echo $mobile;
                                                                        } ?>" />
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Email *</span>
                    <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $row2['Email'] ?>" />
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>City *</span>
                    <input type="text" name="city" id="city" value="<?php echo $row2['Address'] ?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Pincode</span>
                    <input type="text" name="pincode" id="pincode" value="<?php echo $row2['Pin'] ?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>PAN No. *</span>
                    <input type="text" name="pan" id="pan" maxlength="10" value="<?php echo $row2['PAN'] ?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>AADHAAR No.</span>
                    <input type="text" name="aadhaar" id="aadhaar" value="<?php echo $row2['Aadhar'] ?>">
                </label>
            </div>

            <!-- <div class="form-row">
                <label><span>Choose a type *</span></label>
                <div class="form-radio-buttons" id="paymentType">

                    <div>
                        <label>
                            <input onclick="radioEevent(this.id)" type="radio" name="radio" id="general_donation" checked  <?php echo ($selectedType == 'general') ? 'checked' : ''; ?> />
                           
                            <span>General Donation</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input onclick="radioEevent(this.id)" type="radio" name="radio" id="corpus_fund"  <?php echo ($selectedType == 'Corups') ? 'checked' : ''; ?>  />
                          
                            <span>Corpus Fund</span>
                        </label>
                    </div>

                    <div style="visibility:hidden">
                        <label>
                            <input onclick="radioEevent(this.id)" type="radio" name="radio" id="centre_donation" />
                            <span>Centre Donation</span>
                        </label>
                    </div>

                </div>
            </div> -->


            <!-- <div class="form-row">
                <label style="display:none" id="lb_payment_towards">
                    <span>Payment Towards</span>
                    <select name="payment_towards" id="payment_towards" onchange="setPaymentTowardsFromDropdown(this.value)">
                     
                    </select>
                </label> 
            </div>-->
            <input type="hidden" name="paymentFor" id="paymentFor" />
            <input type="hidden" name="paymentTowards" id="paymentTowards" />

            <div class="form-row">
                <label id="info_label" style="display:none">

                    <label align="center" name="information" id="information"></label>
                </label>
            </div>

            <div class="form-row" id="lb_center_name" style="display:none">
                <label>
                    <span>Centre Name</span>
                    <input type="text" name="center_name" id="center_name" onblur="setPaymentTowardsFromCenterName(this.value)" />
                </label>
            </div>

            <div class="form-row" id="lb_center_code" style="display:none">
                <label>
                    <span>Centre Code</span>
                    <input type="text" name="center_code" id="center_code" />
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Donation Amount *</span>
                    <input type="number" name="amount" id="amount">
                </label>
            </div>

            <!--
            <div class="form-row">
                <label>
                    <span>Textarea</span>
                    <textarea name="textarea"></textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Checkbox</span>
                    <input type="checkbox" name="checkbox" checked>
                </label>
            </div>
			-->




            <div align="center">

                <label>


                    <button type="button" name="btn_validate" id="bt_validate" class="btn btn-primary" onclick="checkValidateAllFields()" style="display:block">Next</button>
                    <input type="button" class="btn btn-success btn-sm" name="btn" value="Proceed TO Pay" id="submitBtn" data-bs-toggle="modal" data-bs-target="#confirm-submit" style="display:none" />
                    <button type="button" name="resetBtn" id="resetBtn" onclick="resetFields()" class="btn btn-failure" style="display:none">Reset </button>

                </label>
                <p style="margin-left: 0;margin-right: 0;" margin-right="50px;" align="justify">
                    <font color="red">
                        We thank you for your donation. You will receive the donation receipt on email. If required, you can also view your previous donations made to us by using Donor Login (given at top right of this page).

                    </font>
                </p>
            </div>


        </form>

    </div>


    <br />
    <br />
    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <tr>
                            <th>City</th>
                            <td id="s_city"></td>
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
                            <th>Payment Towards</th>
                            <td id="s_payment_towards"></td>
                        </tr>
                        <tr>
                            <th>Payment For</th>
                            <td id="s_payment_for"></td>
                        </tr>
                        <tr>
                            <th>Donation Amount</th>
                            <td id="s_amount"></td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="submit" class="btn btn-success success">Submit</a>
                </div>
            </div>
        </div>
    </div>








    </body>


    <script type="text/javascript">
        $('#submitBtn').click(function() {
            /* when the button in the form, display the entered values in the modal */
            $('#s_fname').text($('#fname').val());
            $('#s_lname').text($('#lname').val());
            $('#s_email').text($('#email').val());
            $('#s_mobile').text($('#mobile').val());
            $('#s_city').text($('#city').val());
            $('#s_pincode').text($('#pincode').val());
            $('#s_pan').text($('#pan').val());
            $('#s_aadhaar').text($('#aadhaar').val());
            $('#s_payment_for').text($('#paymentFor').val());
            $('#s_payment_towards').text($('#paymentTowards').val());
            $('#s_amount').text($('#amount').val());
        });

        $('#submit').click(function() {
            /* when the submit button in the modal is clicked, submit the form */
            //alert('submitting');
            $('#formfield').submit();
        });


        function checkValidateAllFields() {

            // document.getElementById("bt_validate").style.display = "none";
            // document.getElementById("submitBtn").style.display = "block";

            // Center the 'Next' button
            // document.getElementById("button-container").style.justifyContent = "center";
            // document.getElementById("bt_validate").style.marginRight = "0"; // Remove right margin if any

            errorFlag = true;



            // if (!toward()) {

            //     errorFlag = false;

            //     return errorFlag;

            // }




            if (!checkFirstName()) {

                errorFlag = false;

                return errorFlag;

            }



            // if (!checkLastName()) {

            //     errorFlag = false;

            //     return errorFlag;

            // }



            // if (!checkMobile()) {

            //     errorFlag = false;

            //     return errorFlag;

            // }



            if (!checkEmail()) {

                errorFlag = false;

                return errorFlag;

            }



            if (!checkCity()) {

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

            // if (!checkList()) {

            //     errorFlag = false;

            //     return errorFlag;

            // }



            if (errorFlag) {

                document.getElementById("submitBtn").style.display = "block";

                document.getElementById("bt_validate").style.display = "none";

            }



            return errorFlag;

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
    </script>

</html>