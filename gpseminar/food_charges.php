<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sahaja Yoga Donation</title>
  
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">



	<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/form.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/food_chargesAction_test.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    

<script>
    function checkForTowards() {
  var towards = document.getElementById("towards").value;

//   alert();
  if (towards == "") {
    alert("Please select Towards");
    errorFlag = true;
    document.getElementById("towards").focus();
    // document.getElementById("stay").focus();
    // return false;
  } else {
    checkValidateAllFields()
  }
}
</script>
    <style>
       .toward {
        margin-left: 0px;
       }


        @media only screen and (max-width: 700px) {	
        .inputdate
        {
            width:300px !important;
        }
        select{
           
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
    }
    @media screen and (max-width: 700px) {	
        select{
           
        }
        span{
            margin-left: -10px !important;
        }
        h2{
          font-size: 25px !important;
        }
        h3{
          font-size: 19px !important;
        }
        h4 {
          font-size: 14px;
        }
        p{
          font-size: 12px !important;
        }
        .form-check-label {
           margin-top:-15px !important;
        }
        .sideSection {
            margin-left:-190px !important;
          }
        .tow {
            width: 300px !important;
        }
       
.form-basic input[type=checkbox] {
    margin: 20px 0px 20px 200px !important;
}
.form-basic .form-row > label span {
    display: block;
    text-align: left;
    padding: 0 0 15px;
    margin-top: 8px;
}
    }
</style>
</head>
	<header>
        <body onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
	<div align="center">
       <img align="left" src="assets/logo3.png" height="70" width="70"/>
	   
	   </div>
    </header> 
    <div class="main-content">
        <form class="form-basic" method="post" action="EazyPayPGTest.php" id="formfield" >
            <div class="form-title-row" style="margin-top:-30px">
				<h2>The Life Eternal Trust, Mumbai</h2>
				<br/>
				<h3 style="margin-top: -10px; font-weight:bold">Food & Stay Contribution</h3>
                <p>Please read the instruction below carefully before filling up the form</p>
				<br/>
				<p>All * Fields are mandatory to fill</p>
            </div>

			<input type="hidden" name="countryFor" id="countryFor"/>
			<br/>
			<br/>


        <div class="form-row">
                <label>
                    <span>Towards *</span>
                    <!--<input style="width:380px" type="text" class="tow" name="towards" id="towards" value="International Sahaja Yoga Seminar, Ganpatipule 2022" readonly/> -->
                    <select style="width:580px" type="text" class="tow" name="towards" id="towards" onchange="" required>
                        <option value="" disabled selected>--select--</option>
                        <option value="International Sahaja Yoga Seminar, Ganpatipule 2023">International Sahaja Yoga Seminar, Ganpatipule 2023</option>
                        <!--<option value="Nirmal Nagri Ganapatipule">Nirmal Nagri Ganapatipule</option>-->
                        
                        <!--<option value="International Sahaja Yoga Seminar, Ganapatipule">International Sahaja Yoga Seminar, Ganapatipule</option>-->
                        <!--<option value="Nirmal Nagari Ganapatipule">Nirmal Nagari Ganapatipule</option>-->
                        <!--<option value="Vaitarna Academy">Vaitarna Academy</option>-->
                        <!--<option value="Kothrud Pune Ashram">Kothrud Pune Ashram</option>-->
                        <!--<option value="Aradgaon Rahuri Ashram">Aradgaon Rahuri Ashram</option>-->
                        <!--<option value="Seminar / Puja">Seminar / Puja</option>-->
                    </select>
                </label>

                <div class="form-check sideSection" align="left">
                <input class="form-check-input" style="margin: 20px 0px 20px 255px;"  type="checkbox" value="food" name="food" id="food" onchange="getAmount(),checkFood()"> 
                <label class="form-check-label" style="color:#5F5F5F;" for="food">
                    Food 
                </label>
                 <input type="hidden" id="food_amount" name="food_amount"> 
                <!--<input type="text" id="food_amount" name="food_amount">-->
              </div>

            <label>
                <span> From Date</span>
                <input type="text" disabled value="mm/dd/yyyy"  name="fdatef" id="fdatef" class="inputdate" readonly onchange="getAmount(),checkDateFromfood()">
            </label>
            <label>
               <span>To Date</span> 
                <!-- <input type="date"  onchange="date('fdatef','tdatef','rate','FoodContAmount'), getGrandTotal(), getAmount()"  name="tdatef" id="tdatef" class="inputdate"> -->
                <input type="text" disabled value="mm/dd/yyyy"  name="tdatef" id="tdatef" class="inputdate" readonly onchange="getAmount(), checkDateTofood()">
            </label>
        
            
              <div class="form-check sideSection" align="left">
                <input class="form-check-input" style="margin: 20px 0px 20px 255px;"  type="checkbox" value="stay" name="stay" id="stay" onchange="getAmount(),checkStay()">
                <label class="form-check-label" style="color:#5F5F5F;" for="stay">
                    Stay 
                </label>
                 <input type="hidden" id="stay_amount" name="stay_amount"> 
                <!--<input type="text" id="stay_amount" name="stay_amount">-->
              </div>

              <label>
                <span> From Date</span>
                <input type="text" disabled value="mm/dd/yyyy"  name="fdates" id="fdates" class="inputdate" readonly onchange="getAmount(),checkDateFromStay()">
            </label>
            <label >
               <span>To Date</span> 
                <!-- <input type="date" onchange="date('fdatef','tdatef','rate','FoodContAmount'), getGrandTotal(), getAmount()"  name="tdatef" id="tdatef" class="inputdate"> -->
                <input type="text" disabled value="mm/dd/yyyy"  name="tdates" id="tdates" class="inputdate" readonly onchange="getAmount(), checkDateToStay()">
            </label>
            </div>
            <br>
            
         <div style="text-align: center; margin: 25px;">
            <h3>Participant's Details</h3>
          </div>
             <div class="form-row">
                <label id="tb_part_1">
                    <label>
                       <span>Name *</span>
                       <input type="text" name="part_name" id="part_name">
                     </label>    
                     <label>
                       <span>Gender *</span>
                       <select name="part_gender" style="width: 300px;" id="part_gender">
                       <option value=""></option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                   </select>    
                  </label> 
                    <br>
                  <label>
                       <span>Category *</span>
                       <select name="part_category" style="width: 300px;" id="part_category">
                        <option value=""></option>
                        <option value="Adult">Adult (Age above 25 year)</option>
                        <option value="Yuva">Yuva (Age upto 25 year)</option>
                        <option value="Child">Child (Below 12 year)</option>
                   </select>    
                  </label>
                      <label>
                       <span>City *</span>
                       <input type="text" name="part_city" id="part_city">
                     </label> 
               </label>    
             </div>

        <div class="form-row">
            <label>
                <span>Total Amount Rs. </span>
                <input type="text" name="amount" id="amount" readonly/>
            </label>
        </div>    
        <input type="hidden" name="Who_im" id="Who_im" value="Contribution"/>
         <div style="text-align: center; margin: 25px;">
            <h3>Payer's Details</h3>
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
                <span>Pincode</span>
                <input type="text" name="pincode" id="pincode">
            </label>
        </div>		
        <div class="form-row">
            <label id="countryip">
                <span>PAN No. *</span>
                <input type="text" name="pan" id="pan">
            </label>
        </div>
        <div class="form-row">
            <label id="countryia">
                <span>AADHAAR No.</span>
                <input type="text" name="aadhaar" id="aadhaar">
            </label>
        </div>

			<div align="center">
			<label>
                <button type="button" name="btn_validate" id="bt_validate" class="btn btn-summary" onclick="checkForTowards()" style="display:block">Next</button>
				<input type="button" name="btn" value="All Good! Proceed" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" style="display:none"/>
                <button type="button" name="resetBtn"  id="resetBtn" onclick="resetFields()" class="btn btn-failure" style="display:none" >Reset</button>
            </label>
            <p style="margin-left: 0;margin-right: 0;" margin-right = "50px;" align="justify">
                
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
                        <th>Payment Towards</th>
                        <td id="s_towards"></td>
                    </tr> 

                    <tr>
                        <th>From Date (Food)</th>
                        <td id="s_from_date"></td>
                    </tr> 
                    <tr>
                        <th>To Date (Food)</th>
                        <td id="s_to_date"></td>
                    </tr> 

                    <tr>
                        <th>Food (Rs.)</th>
                        <td id="s_food"></td>
                    </tr> 

                    <tr>
                        <th>From Date (Stay)</th>
                        <td id="s_from_date_stay"></td>
                    </tr> 
                    <tr>
                        <th>To Date (Stay)</th>
                        <td id="s_to_date_stay"></td>
                    </tr> 
                    
                    <tr>
                        <th>Stay (Rs.)</th>
                        <td id="s_stay"></td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td id="s_amount">/-</td>
                    </tr> 
                    <tr>
                        <th colspan="2">Participant's Details</th>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td id="p_name"></td>
                    </tr>

                    <tr>
                        <th>Gender</th>
                        <td id="p_gender"></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td id="p_category"></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td id="p_city"></td>
                    </tr>

                    <tr>
                        <th colspan="2">Payer's Details</th>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td id="s_fname"></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td id="s_lname"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="s_email"></td>
                    </tr>
                    <tr>
                        <th>Mobile No.</th>
                        <td id="s_mobile"></td>
                    </tr>
                    
                    <tr>
                        <th>Pincode</th>
                        <td id="s_pincode"></td>
                    </tr>
                    <tr id = "panId" >
                        <th>PAN No.</th>
                        <td id="s_pan"></td>
                    </tr>
                    <tr id = "adharId">
                        <th>AADHAAR No.</th>
                        <td id="s_aadhaar"></td>
                    </tr>
        
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="reedit()" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Submit</a>
                
                <script>
                function reedit(){
                   document.getElementById("bt_validate").style.display = "block";
                   document.getElementById("submitBtn").style.display = "none";
                                 }
</script>
            </div>
        </div>
    </div>
</div>	
</body>

<script type="text/javascript">
	


		$('#submitBtn').click(function() {
            
		/* when the button in the form, display the entered values in the modal */


        $('#s_towards').text($('#towards').val());

        var from_date_f = new Date(document.getElementById("fdatef").value);
        var to_date_f = new Date(document.getElementById("tdatef").value);

        if(from_date_f == 'Invalid Date') {
            $('#s_from_date').text("");
        }else{
            $('#s_from_date').text(from_date_f.toLocaleDateString());
        }

        if(to_date_f == 'Invalid Date') {
            $('#s_to_date').text("");
        }else{
            $('#s_to_date').text(to_date_f.toLocaleDateString());
        }



        var from_date_s = new Date(document.getElementById("fdates").value);
        var to_date_s = new Date(document.getElementById("tdates").value);
        
        if ( from_date_s == 'Invalid Date')
            {
                $('#s_from_date_stay').text("");
                
            } else {
                $('#s_from_date_stay').text(from_date_s.toLocaleDateString());
        }

        if ( to_date_s == 'Invalid Date')
            {
                $('#s_to_date_stay').text("");
                
            } else {
                $('#s_to_date_stay').text(to_date_s.toLocaleDateString());
        }


        if(document.getElementById('food').checked) {
            document.getElementById('s_food').innerHTML = total_food;
        }else 
        {
            document.getElementById('s_food').innerHTML = ''; 
        }

        if(document.getElementById('stay').checked) {
            document.getElementById('s_stay').innerHTML = total_stay;
        }else 
        {
            document.getElementById('s_stay').innerHTML = ''; 
        }
        
        $('#p_name').text($('#part_name').val());
        $('#p_gender').text($('#part_gender').val());
        $('#p_category').text($('#part_category').val());
        $('#p_city').text($('#part_city').val());
        

		$('#s_fname').text($('#fname').val());
		$('#s_lname').text($('#lname').val());
	//	$('#s_item').text($('#item').val());
		$('#s_email').text($('#email').val());
		$('#s_mobile').text($('#mobile').val());
		$('#s_city').text($('#city').val());
		$('#s_pincode').text($('#pincode').val());	
		$('#s_pan').text($('#pan').val());
		$('#s_aadhaar').text($('#aadhaar').val());
	    $('#s_payment_towards').text($('#payment_towards').val());
		$('#s_number_adult').text($('#number_adult').val());
		$('#s_number_child').text($('#number_child').val());
//		$('#s_payment_for').text($('#paymentFor').val());
//		$('#s_payment_towards').text($('#paymentTowards').val());
		$('#s_amount').text($('#amount').val());	
	});

	$('#submit').click(function(){
		/* when the submit button in the modal is clicked, submit the form */
		//alert('submitting');
		$('#formfield').submit();
	});	 
	</script>

	<!-- <script type="text/javascript">
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
        
		$('#s_amount').text($('#amount').val());	
        });
        $('#submit').click(function(){
            /* when the submit button in the modal is clicked, submit the form */
            //alert('submitting');
            $('#formfield').submit();
        });	 
        function dispayFields(id){
        }
	</script> -->
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
 <script>

 $(document).ready(function() {
    disableclick();
 });
function disableclick(){
    document.addEventListener('contextmenu',
	event => event.preventDefault());
}


$(function() {
        //This array containes all the disabled array
         datesToBeDisabled = ["2023-12-22","2023-12-23","2023-12-24","2023-12-25","2023-12-26"];
          datesToBeDisabled1 = ["2023-12-21","2023-12-22","2023-12-23","2023-12-24","2023-12-25","2023-12-26","2023-12-27"];

            $("#fdatef").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                todayHighlight: 1,
                beforeShowDay: function (date) {
                    var dateStr = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [datesToBeDisabled.indexOf(dateStr) == -1];
                },
            });

            $("#tdatef").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
               
                todayHighlight: 1,
                
                beforeShowDay: function (date) {
                    var dateStr = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [datesToBeDisabled.indexOf(dateStr) == -1];
                },
            });

            $("#fdates").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                
                todayHighlight: 1,
                
                beforeShowDay: function (date) {
                    var dateStr = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [datesToBeDisabled1.indexOf(dateStr) == -1];
                },
            });

            $("#tdates").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
               
                todayHighlight: 1,
                
                beforeShowDay: function (date) {
                    var dateStr = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [datesToBeDisabled1.indexOf(dateStr) == -1];
                },
            });
    });
</script>

    </body>
    
</html>
