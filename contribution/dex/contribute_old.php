<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga Donation</title>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/form.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script src="assets/contributeAction.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="css/style.css"/> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->

    

    <!--<script src="script.js/jquery.js"></script>	-->
    <style>
    @media screen and (max-width: 700px) {	
       
        .inputdate
        {
            width:320px !important;
        }
        /* .select{
            max-width: 320px !important;
        } */


        select{
            min-width: 320px !important;
        }
        span{
            margin-left: -10px !important;
        }

    }
    @media only screen and (max-width: 700px) and (min-width: 600px) {
        .todate{
            margin-left: 154px !important;
        }
    }
    @media only screen and (width: 600px) {
        .todate{
            margin-left: 0px !important;
        }
    }
    @media only screen and (min-width: 601px) and (max-width: 603px) {
        .todate{
            margin-left: -19px !important;
        }
    }

    @media only screen and (max-width: 1525px) and (min-width: 700px) {
        
        .inputdate
        {
            width: 148px !important;
        }

        /* .selectabc{
            width: 320px !important;
        } */

     
    }
    </style>
</head>
	<header>
	<div align="center">
       <img align="left" src="assets/logo3.png" height="70" width="70"/>
	   <a href="print.php" target="_blank">Donor Login</a> 
	   </div>
    </header> 
    <div class="main-content">
        <form class="form-basic" method="post" action="EazyPayPG.php" id="formfield" >
            <div class="form-title-row">
				<h2>The Life Eternal Trust, Mumbai</h2>
				<br/>
				<h2 style="margin-top: -10px;">Online Contribution Form</h2>
				<br/>
				<p>For Payments in INR only.</p>
				<p>All * Fields are mandatory to fill.</p>
            </div>
       
            <div class="form-row">
                <label><span>I am *</span>
                <div class="form-radio-buttons" id="countryType">
                    <div>
                        <label>
                            <input onclick="radioEeventCountry(this.id)" type="radio" name="radioc" id="indian"/>
                            Indian
                        </label>
                        <label>
                            <input onclick="radioEeventCountry(this.id)" type="radio" style="margin-left: 50px;" name="radioc" id="foreigner"/>
                            Foreigner
                        </label>
                    </div> 
                </div></label>
            </div>
			<input type="hidden" name="countryFor" id="countryFor"/>

            <div class="form-row">
                <label>
                    <span>Project *</span>
                    <select name="payment_towards" id="payment_towards" style="max-width: 43%;" required>
                        <option value="">Select</option>
                        <option value="International Sahaja Yoga Research & Health Centre, CBD Belapur">International Sahaja Yoga Research & Health Centre, CBD Belapur</option>
                        <option value="Shri P.K. Salve Kala Pratishthan, Vaitarna">Shri P.K. Salve Kala Pratishthan, Vaitarna</option>
                        <option value="Nirmal Nagari, Ganapatipule">Nirmal Nagari, Ganapatipule</option>
                        <option value="Kothrud, Pune Ashram">Kothrud, Pune Ashram</option>
                        <option value="Aradgaon, Rahuri Ashram">Aradgaon, Rahuri Ashram</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>First name *</span>
                    <input type="text" name="fname" id="fname" width="100%" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Last Name *</span>
                    <input type="text" name="lname" id="lname">
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
                    <span>Mobile No. *</span>
                    <input type="text" name="mobile" id="mobile"  />
                </label>
            </div>			
            <div class="form-row">
                <label>
                    <span>City *</span>
                    <input type="text" name="city" id="city">
                </label>
            </div>			
            <div class="form-row">
                <label>
                    <span>Pincode</span>
                    <input type="text" name="pincode" id="pincode">
                </label>
            </div>
            <div class="form-row">
                <label style="display:none" id="country">
                    <span>Country *</span>
                    <input type="text" name="countryname" id="countryname">
                </label>
            </div>			

            <div class="form-row">
                <label style="display:none" id="countryip">
                    <span>PAN No. *</span>
                    <input type="text" name="pan" id="pan">
                </label>
            </div>
            <div class="form-row">
                <label style="display:none" id="countryia">
                    <span>AADHAAR No.</span>
                    <input type="text" name="aadhaar" id="aadhaar">
                </label>
            </div>
            <div class="form-row">
                <label style="display:none" id="countryf">
                    <span>Passport No. *</span>
                    <input type="text" name="pass" id="pass">
                </label>
            </div>
            
            <!-- <div class="form-row" >
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
                    <input type="text" name="center_code" id="center_code"/>
                </label>
            </div>	 -->


	    <div class="form-row">
            <label>
                <span>Food Contribution Per Day</span>
                <input type="text" name="FoodContAmount" id="FoodContAmount" /> 
            </label>
        </div>

	    <div class="form-row">
            <label>
                <span> Date From</span>
                <input type="date"  name="fdatef" id="fdatef" class="inputdate"  onchange="fdate('FoodContAmount')">
            </label>
            <label class="todate">
                <!-- <span>To Date</span> -->To
                <input type="date" onchange="date('fdatef','tdatef','rate','FoodContAmount'), getGrandTotal()"  name="tdatef" id="tdatef" class="inputdate">
            </label>
            <label>
                <span>Food Total</span>
                <input type="text" name="rate" id="rate" READONLY=""/>
            </label>
        </div>

	    <div class="form-row">
            <label>
                <span>Stay Contribution Per Day</span>
                <input type="text" name="stayContAmount" id="stayContAmount" />
            </label>  
        </div>  
	    <div class="form-row">
            <label>
                <span> Date From</span>
                <input type="date" name="fdates" id="fdates" class="inputdate"  onchange="fdate('stayContAmount')">
            </label>
            <label class="todate">
                <!-- <span>To Date</span> -->To
                <input type="date" onchange="date('fdates','tdates','rates','stayContAmount'), getGrandTotal()"  name="tdates" id="tdates" class="inputdate" >
            </label>
            <label>
                <span>Stay Total</span>
                <input type="text" name="rates" id="rates" READONLY=""/> 
            </label>
        </div>

	    <div class="form-row">
            <label>
                <span>Other Charges for</span>
                <input type="text" name="otherChargestext" id="otherChargestext">
            </label>
        </div>  
    
        <div class="form-row">
            <label>
                <span>Other Charges Amount</span>
                <input type="number" name="otherCharges" id="otherCharges" onchange = "getGrandTotal()">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Contribution Amount</span>
                <input type="text" name="amount" id="amount" READONLY=""/>
            </label>
        </div>    
        <input type="hidden" name="Who_im" id="Who_im" value="Contribution"/>

			<div align="center">
			<label>
                <button type="button" name="btn_validate" id="bt_validate" class="btn btn-summary" onclick="checkValidateAllFields()" style="display:block">Next</button>
				<input type="button" name="btn" value="All Good! Proceed" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"  style="display:none"/>
                <button type="button" name="resetBtn"  id="resetBtn" onclick="resetFields()" class="btn btn-failure" style="display:none" >Reset </button>
            </label>
            
            <p style="margin-left: 0;margin-right: 0;" margin-right = "50px;" align="justify">
                <font color="red">
                    If you don't get payment receipt after payment or missed to print it, you can view all your previous payments from the Donor Login option at the top right of this page!
                </font> 
            </p>
            </div>

        </form>
    </div>
<br/>
<br/>
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
                    <tr id = "panId" style = "display:none">
                        <th>PAN No.</th>
                        <td id="s_pan"></td>
                    </tr>
                    <tr id = "adharId" style = "display:none">
                        <th>AADHAAR No.</th>
                        <td id="s_aadhaar"></td>
                    </tr>
                    <tr id = "countryId" style = "display:none">
                        <th>Country.</th>
                        <td id="s_country"></td>
                    </tr>
                    <tr id = "passportId" style = "display:none">
                        <th>Passport No.</th>
                        <td id="s_pass"></td>
                    </tr>
		            <!-- <tr>
                        <th>Payment Towards</th>
                        <td id="s_payment_towards"></td>
                    </tr> -->
                    <tr>
                        <th>Project</th>
                        <td id="s_payment_for"></td>
                    </tr>
		            <tr><th colspan="2">Food Contribution</th></tr>
 		            <tr>
                        <th>Per Day </th>
                        <td id="s_FoodContAmount"></td>
                    </tr>
		            <tr>
                        <th>From Date</th>
                        <td id="s_fdatef"></td>
                    </tr>
		            <tr>
                        <th>To Date</th>
                        <td id="s_tdatef"></td>
                    </tr>
		            <tr>
                        <th>Food Total</th>
                        <td id="s_rate">/-</td>
                    </tr>
		            <tr><th colspan="2">Stay Contribution</th></tr>
		            <tr>
                        <th>Per Day </th>
                        <td id="s_stayContAmount"></td>
                    </tr>
		            <tr>
                        <th>From Date</th>
                        <td id="s_fdates"></td>
                    </tr>
		            <tr>
                        <th>To Date</th>
                        <td id="s_tdates"></td>
                    </tr>
		            <tr>
                        <th>Stay Total</th>
                        <td id="s_rates">/-</td>
                    </tr>
                    <tr>
                        <th>Other Charges for</th>
                        <td id="s_otherChargestext">/-</td>
                    </tr>
		            <tr>
                        <th>Other Charges amount</th>
                        <td id="s_otherCharges">/-</td>
                    </tr>
                    <tr>
                        <th>Contribution Amount</th>
                        <td id="s_amount">/-</td>
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
		$('#s_country').text($('#countryname').val());
		$('#s_pass').text($('#pass').val());
		$('#s_payment_for').text($('#payment_towards').val());
		$('#s_countyr_for').text($('#countryFor').val());
		// $('#s_payment_towards').text($('#paymentTowards').val());
		$('#s_fdatef').text($('#fdatef').val());
		$('#s_tdatef').text($('#tdatef').val());
		$('#s_rate').text($('#rate').val());
		$('#s_fdates').text($('#fdates').val());
		$('#s_tdates').text($('#tdates').val());
		$('#s_rates').text($('#rates').val());
		$('#s_FoodContAmount').text($('#FoodContAmount').val());
		$('#s_stayContAmount').text($('#stayContAmount').val());
		$('#s_otherChargestext').text($('#otherChargestext').val());
		$('#s_otherCharges').text($('#otherCharges').val());
		$('#s_amount').text($('#amount').val());	
	});
	$('#submit').click(function(){
		/* when the submit button in the modal is clicked, submit the form */
		//alert('submitting');
		$('#formfield').submit();
	});	 

	function dispayFields(id){
	}
	</script>


</html>
