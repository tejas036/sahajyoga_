<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>International Sahaja Yoga Seminar,Ganapatipule,2021</title>

	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
	<script src="assets/dynamicAction_1marriageform.js"></script>
	
  <!--<link rel="stylesheet" type="text/css" href="css/style.css"/> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

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
            min-width: 300px !important;
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
    @media screen and (max-width: 700px) {	
        select{
            min-width: 300px !important;
        }
        span{
            margin-left: -10px !important;
        }
        h2{
          font-size: 25px;
        }
        h3{
          font-size: 19px;
        }
        h4 {
          font-size: 14px;
        }
        p{
          font-size: 12px !important;
        }
    }
</style>
	
</head>
	<header>
	<div align="center">
       <img align="left" src="assets/logo3.png" height="70" width="70"/>
	 <!--  <a href="print.php" target="_blank">Donor Login</a>  -->
	   </div>
    </header> 
    <div class="main-content">

        <form class="form-basic"  method="post" name="myForm" action="EazyPayPGmarriage.php" id="formfield" >

            <div class="form-title-row">
				<h2>The Life Eternal Trust, Mumbai</h2>
			<!--	<br/>
		  	 <h2>DONATIONS</h2> 
				<br/> -->
			<h3>International Sahaja Yoga Seminar,Ganapatipule, <br>December 23-26,2022</h3>	
      <h2 style="margin-top:-5px">Sahaja Marriages</h2>
      <p>Please read the instruction below carefully before filling up the form</p>
			<h4>Online Contribution for Indians Only.</h4>
				<p>All * Fields are mandatory to fill.</p>
            </div>

            <div class="form-row">
                <center style="color:#5F5F5F;">   
                      <label>
                      <h3>Participant's Details</h3>
                      </label>
                </center>
            </div>
            <?php
       $sqlEvent = "select event_id from events_new";
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include_once 'dbConnection.php';
       
            $resultEvent = mysqli_query($conn, $sqlEvent);

            while($row = mysqli_fetch_assoc($resultEvent))
            {
                  $eventId = $row['event_id']; 
                //   echo $eventId;
            }
      ?>

            <div class="form-row"> 
                <label id="toward" for="towards"><span>Towards * </span>
                  <select name="payment_towards" id="payment_towards" style="max-width:300px">
                    <option value="none"> </option>
                  <option value="Sahaja Marriage (Groom and Guests)"> Sahaja Marriage (Groom and Guests)</option>
                   <option value="Sahaja Marriage (Bride and Guests)">Sahaja Marriage (Bride and Guests)</option>
                   <option value="Sahaja Marriage (Groom, Bride and Guests)">Sahaja Marriage (Groom, Bride and Guests)</option>
                 </select> 
                </label>
            </div>

            <div class="form-row">
              <label>
                  <span>Groom’s Full Name* </span>
                  <input type="text" name="groom_name" id="groom_name">
              </label>
            </div>
            <div class="form-row">
              <label>
                  <span>Bride’s Full Name* </span>
                  <input type="text" name="bride_name" id="bride_name">
              </label>
            </div>
            <div class="form-row">
              <label>
                  <span>No. of Guests* </span>
                  <input type="number" name="guest_number" id="guest_number" min="0" max="5">
              </label>
            </div>

          <div class="form-row">
            <label id="tb_g_1">
                <label>
                   <span>Guest Name *</span>
                   <input type="text" name="guest_1" id="guest_1">
                 </label>    
                 <label>
                   <span>Gender *</span>
                   <select name="guest_gender_1" style="width: 100px;" id="guest_gender_1">
                   <option value=""></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               </select>    
              </label> 
                  <label>
                   <span>City *</span>
                   <input type="text" name="guest_city_1" id="guest_city_1">
                 </label> 
                
           </label>    
           </div>

           <div class="form-row">
            <label id="tb_g_2">
                <label>
                   <span>Guest Name *</span>
                   <input type="text" name="guest_2" id="guest_2">
                 </label>    
                 <label>
                   <span>Gender *</span>
                   <select name="guest_gender_2" style="width: 100px;" id="guest_gender_2">
                   <option value=""></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               </select>    
              </label> 
                  <label>
                   <span>City *</span>
                   <input type="text" name="guest_city_2" id="guest_city_2">
                 </label> 
                
           </label>    
           </div>

           <div class="form-row">
            <label id="tb_g_3">
                <label>
                   <span>Guest Name *</span>
                   <input type="text" name="guest_3" id="guest_3">
                 </label>    
                 <label>
                   <span>Gender *</span>
                   <select name="guest_gender_3" style="width: 100px;" id="guest_gender_3">
                   <option value=""></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               </select>    
              </label> 
                  <label>
                   <span>City *</span>
                   <input type="text" name="guest_city_3" id="guest_city_3">
                 </label> 
                
           </label>    
           </div>

           <div class="form-row">
            <label id="tb_g_4">
                <label>
                   <span>Guest Name *</span>
                   <input type="text" name="guest_4" id="guest_4">
                 </label>    
                 <label>
                   <span>Gender *</span>
                   <select name="guest_gender_4" style="width: 100px;" id="guest_gender_4">
                   <option value=""></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               </select>    
              </label> 
                  <label>
                   <span>City *</span>
                   <input type="text" name="guest_city_4" id="guest_city_4">
                 </label> 
                
           </label>    
           </div>
           <div class="form-row">
            <label id="tb_g_5">
                <label>
                   <span>Guest Name *</span>
                   <input type="text" name="guest_5" id="guest_5">
                 </label>    
                 <label>
                   <span>Gender *</span>
                   <select name="guest_gender_5" style="width: 100px;" id="guest_gender_5">
                   <option value=""></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               </select>    
              </label> 
                  <label>
                   <span>City *</span>
                   <input type="text" name="guest_city_5" id="guest_city_5">
                 </label> 
           </label>    
           </div>
            <div class="form-row">
                <label>
                    <span>Total Amount *</span>
                    <input type="number"    name="amount" value="0"  id="amount" readonly>
                </label>
            </div>

            <div class="form-title-row">
                <label style="color:#5F5F5F;">
                <h3 style="margin-bottom: -20px;">Payer's Details</h3>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>First Name *</span>
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

            <!-- <div class="form-row">
                <label>
                    <span>City/Centre *</span>
                    <input type="text" name="city" id="city">
                </label>
            </div>			 -->
			
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

			<input type="hidden" name="Who_im" id="Who_im" value="Gpmarriage"/>
			
			<input type="hidden" name="total_people" id="total_people"/>

			<div align="center">
           
			<label>
                    
                <button type="button" name="btn_validate" id="bt_validate" class="btn btn-summary" onclick="checkValidateAllFields()" style="display:block">Next</button>
				<input type="button" name="btn" value="All Good! Proceed" id="submitBtn" data-toggle="modal" data-target="#confirm-submit"  style="display:none"/>
                <button type="button" name="resetBtn"  id="resetBtn" onclick="resetFields()" class="btn btn-failure" style="display:none" >Reset </button>
                
            </label>
			<p style="margin-left: 0;margin-right: 0;" margin-right = "50px;" align="justify">
				<font color="red">
				Note :<br/>
				1. Badges will be issued at Nirmal Nagari only on submission of receipt & Second COVID-19 Vaccination Certificate.
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
                        <th>Contibution Towards</th>
                        <td style="font-size:15px;" id="s_payment_towards"></td>
                    </tr>
                    <tr>
                        <th>Groom’s Full Name</th>
                        <td id="s_groom_name"></td>
                    </tr>
                    <tr>
                        <th>Bride’s Full Name</th>
                        <td id="s_bride_name"></td>
                    </tr>
                    <tr>
                        <th>Total Guests</th>
                        <td id="s_number_guests"></td>
                    </tr>	
                    <tr>
                        <th>Guests Name 1</th>
                        <td id="s_name_guests1"></td>
                    </tr>	<tr>
                        <th>Gender 1</th>
                        <td id="s_gender_guests1"></td>
                    </tr>	<tr>
                        <th>City 1</th>
                        <td id="s_city_guest1"></td>
                    </tr>	
                  <tr id = "guestname2"></tr>
                  <tr id = "guestgender2"></tr>
                  <tr id = "guestcity2"></tr>
                  
                  <tr id = "guestname3"></tr>
                  <tr id = "guestgender3"></tr>
                  <tr id = "guestcity3"></tr>
                  
                  <tr id = "guestname4"></tr>
                  <tr id = "guestgender4"></tr>
                  <tr id = "guestcity4"></tr>

                  <tr id = "guestname5"></tr>
                  <tr id = "guestgender5"></tr>
                  <tr id = "guestcity5"></tr>

                    <tr> 
                        <th>Amount</th>
                        <td id="s_amount"></td>
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
                    <tr>
                        <th>PAN No.</th>
                        <td id="s_pan"></td>
                    </tr>
                    <tr>
                        <th>AADHAAR No.</th>
                        <td id="s_aadhaar"></td>
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
	
	/*  Restrict source code  */
	
	    $(document).ready(function(){
	        
	    $('#guest_number').keyup(function(){
         if ($(this).val() > 5){
         alert("Maximum 5 guests");
         $(this).val('5');
          }
         });

       document.onkeypress = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
        return false;  
        }  
        }  
        document.onmousedown = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
        return false;  
        }  
        }  
        document.onkeydown = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
        return false;  
        }  
     }
	
	   document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
       });      
	     
	     /*  Restrict source code  */    
	     
	  // $("#tb_a_1").hide(); 
	$("#tb_g_1").hide();
    $("#tb_g_2").hide();
    $("#tb_g_3").hide();
    $("#tb_g_4").hide();
    $("#tb_g_5").hide();
		
    $('#guest_number').on('input', function() {
        let value = parseInt(this.value);
        let value_guest = $('#guest_number').attr('id')
        if (value == "0" && value_guest == "guest_number") {
          // alert(value_adult);
     
          $("#tb_g_1").hide();
          $("#tb_g_2").hide();
          $("#tb_g_3").hide();
          $("#tb_g_4").hide();
          $("#tb_g_5").hide();
    }  
      if (value == "1" && value_guest == "guest_number") {
        // alert(value_adult);
   
        $("#tb_g_1").show();
        $("#tb_g_2").hide();
        $("#tb_g_3").hide();
        $("#tb_g_4").hide();
        $("#tb_g_5").hide();
  }   
  if (value == "2" && value_guest == "guest_number") {
    // alert(value_adult);

    $("#tb_g_1").show();
    $("#tb_g_2").show();
    $("#tb_g_3").hide();
    $("#tb_g_4").hide();
    $("#tb_g_5").hide();
}   

if (value == "3" && value_guest == "guest_number") {
  // alert(value_adult);

  $("#tb_g_1").show();
  $("#tb_g_2").show();
  $("#tb_g_3").show();
  $("#tb_g_4").hide();
  $("#tb_g_5").hide();
}   
if (value == "4" && value_guest == "guest_number") {
  // alert(value_adult);

  $("#tb_g_1").show();
  $("#tb_g_2").show();
  $("#tb_g_3").show();
  $("#tb_g_4").show();
  $("#tb_g_5").hide();
}  
if (value == "5" && value_guest == "guest_number") {
  // alert(value_adult);

  $("#tb_g_1").show();
  $("#tb_g_2").show();
  $("#tb_g_3").show();
  $("#tb_g_4").show();
  $("#tb_g_5").show();
}  
    })    
});
		$('#submitBtn').click(function() {
		/* when the button in the form, display the entered values in the modal */
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
        $('#s_groom_name').text($('#groom_name').val());
        $('#s_bride_name').text($('#bride_name').val());
		$('#s_number_guests').text($('#guest_number').val());
        $('#s_name_guests1').text($('#guest_1').val());
        $('#s_gender_guests1').text($('#guest_gender_1').val());
        $('#s_city_guest1').text($('#guest_city_1').val());


        if($('#guest_number').val() == 2) { 
        let guestname2= "<th>Guests Name 2</th><td id='s_name_guests2'></td>";
        let guestgender2= "<th>Gender 2</th><td id='s_gender_guests2'></td>";
        let guestcity2= "<th>City 2</th><td id='s_city_guest2'></td>";
        document.getElementById('guestname2').innerHTML = guestname2;
        document.getElementById('guestgender2').innerHTML = guestgender2;
        document.getElementById('guestcity2').innerHTML = guestcity2;
        $('#s_name_guests2').text($('#guest_2').val());
        $('#s_gender_guests2').text($('#guest_gender_2').val());
        $('#s_city_guest2').text($('#guest_city_2').val());
   
        }
        
       
        if($('#guest_number').val() == 3) { 
            let guestname2= "<th>Guests Name 2</th><td id='s_name_guests2'></td>";
            let guestgender2= "<th>Gender 2</th><td id='s_gender_guests2'></td>";
            let guestcity2= "<th>City 2</th><td id='s_city_guest2'></td>";
            document.getElementById('guestname2').innerHTML = guestname2;
            document.getElementById('guestgender2').innerHTML = guestgender2;
            document.getElementById('guestcity2').innerHTML = guestcity2;
            $('#s_name_guests2').text($('#guest_2').val());
            $('#s_gender_guests2').text($('#guest_gender_2').val());
            $('#s_city_guest2').text($('#guest_city_2').val());

            let guestname3= "<th>Guests Name 3</th><td id='s_name_guests3'></td>";
            let guestgender3= "<th>Gender 3</th><td id='s_gender_guests3'></td>";
            let guestcity3= "<th>City 3</th><td id='s_city_guest3'></td>";
            document.getElementById('guestname3').innerHTML = guestname3;
            document.getElementById('guestgender3').innerHTML = guestgender3;
            document.getElementById('guestcity3').innerHTML = guestcity3;
            $('#s_name_guests3').text($('#guest_3').val());
            $('#s_gender_guests3').text($('#guest_gender_3').val());
            $('#s_city_guest3').text($('#guest_city_3').val());
        
        }

        if($('#guest_number').val() == 4) { 
            let guestname2= "<th>Guests Name 2</th><td id='s_name_guests2'></td>";
            let guestgender2= "<th>Gender 2</th><td id='s_gender_guests2'></td>";
            let guestcity2= "<th>City 2</th><td id='s_city_guest2'></td>";
            document.getElementById('guestname2').innerHTML = guestname2;
            document.getElementById('guestgender2').innerHTML = guestgender2;
            document.getElementById('guestcity2').innerHTML = guestcity2;
            $('#s_name_guests2').text($('#guest_2').val());
            $('#s_gender_guests2').text($('#guest_gender_2').val());
            $('#s_city_guest2').text($('#guest_city_2').val());

            let guestname3= "<th>Guests Name 3</th><td id='s_name_guests3'></td>";
            let guestgender3= "<th>Gender 3</th><td id='s_gender_guests3'></td>";
            let guestcity3= "<th>City 3</th><td id='s_city_guest3'></td>";
            document.getElementById('guestname3').innerHTML = guestname3;
            document.getElementById('guestgender3').innerHTML = guestgender3;
            document.getElementById('guestcity3').innerHTML = guestcity3;
            $('#s_name_guests3').text($('#guest_3').val());
            $('#s_gender_guests3').text($('#guest_gender_3').val());
            $('#s_city_guest3').text($('#guest_city_3').val());

            let guestname4= "<th>Guests Name 4</th><td id='s_name_guests4'></td>";
            let guestgender4= "<th>Gender 4</th><td id='s_gender_guests4'></td>";
            let guestcity4= "<th>City 4</th><td id='s_city_guest4'></td>";
            document.getElementById('guestname4').innerHTML = guestname4;
            document.getElementById('guestgender4').innerHTML = guestgender4;
            document.getElementById('guestcity4').innerHTML = guestcity4;
            $('#s_name_guests4').text($('#guest_4').val());
            $('#s_gender_guests4').text($('#guest_gender_4').val());
            $('#s_city_guest4').text($('#guest_city_4').val());
        
        }

        if($('#guest_number').val() == 5) { 
            let guestname2= "<th>Guests Name 2</th><td id='s_name_guests2'></td>";
            let guestgender2= "<th>Gender 2</th><td id='s_gender_guests2'></td>";
            let guestcity2= "<th>City 2</th><td id='s_city_guest2'></td>";
            document.getElementById('guestname2').innerHTML = guestname2;
            document.getElementById('guestgender2').innerHTML = guestgender2;
            document.getElementById('guestcity2').innerHTML = guestcity2;
            $('#s_name_guests2').text($('#guest_2').val());
            $('#s_gender_guests2').text($('#guest_gender_2').val());
            $('#s_city_guest2').text($('#guest_city_2').val());

            let guestname3= "<th>Guests Name 3</th><td id='s_name_guests3'></td>";
            let guestgender3= "<th>Gender 3</th><td id='s_gender_guests3'></td>";
            let guestcity3= "<th>City 3</th><td id='s_city_guest3'></td>";
            document.getElementById('guestname3').innerHTML = guestname3;
            document.getElementById('guestgender3').innerHTML = guestgender3;
            document.getElementById('guestcity3').innerHTML = guestcity3;
            $('#s_name_guests3').text($('#guest_3').val());
            $('#s_gender_guests3').text($('#guest_gender_3').val());
            $('#s_city_guest3').text($('#guest_city_3').val());

            let guestname4= "<th>Guests Name 4</th><td id='s_name_guests4'></td>";
            let guestgender4= "<th>Gender 4</th><td id='s_gender_guests4'></td>";
            let guestcity4= "<th>City 4</th><td id='s_city_guest4'></td>";
            document.getElementById('guestname4').innerHTML = guestname4;
            document.getElementById('guestgender4').innerHTML = guestgender4;
            document.getElementById('guestcity4').innerHTML = guestcity4;
            $('#s_name_guests4').text($('#guest_4').val());
            $('#s_gender_guests4').text($('#guest_gender_4').val());
            $('#s_city_guest4').text($('#guest_city_4').val());

            let guestname5= "<th>Guests Name 5</th><td id='s_name_guests5'></td>";
            let guestgender5= "<th>Gender 5</th><td id='s_gender_guests5'></td>";
            let guestcity5= "<th>City 5</th><td id='s_city_guest5'></td>";
            document.getElementById('guestname5').innerHTML = guestname5;
            document.getElementById('guestgender5').innerHTML = guestgender5;
            document.getElementById('guestcity5').innerHTML = guestcity5;
            $('#s_name_guests5').text($('#guest_5').val());
            $('#s_gender_guests5').text($('#guest_gender_5').val());
            $('#s_city_guest5').text($('#guest_city_5').val());
        
        }
        
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
</html>
