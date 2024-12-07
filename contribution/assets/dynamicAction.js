var errorFlag = false;

function radioEevent(myRadio){
		
	var A = ["Guru Puja General Donation","The Life Eternal Trust General Donation","Sahaja Yoga Centre Mumbai General Donation","International Sahaja Yoga Research and Health Centre General Donation","Nirmala Nagari Ganapatipule General Donation","Vaitarna Academy General Donation","Kothrud Pune Ashram General Donation","Aradgaon Rahuri Ashram General Donation","Sahaja Yoga Navi Mumbai"];
	var B = ["The Life Eternal Trust Corpus Fund","Sahaja Yoga Centre Mumbai Corpus Fund","International Sahaja Yoga Research and Health Centre Corpus Fund","Nirmala Nagari Ganapatipule Corpus Fund","Vaitarna Academy Corpus Fund","Kothrud Pune Ashram Corpus Fund","Aradgaon Rahuri Ashram Corpus Fund"];
	
	document.getElementById('payment_towards').innerHTML = "";
   
		currentValue = myRadio;
		//alert("my radio : "+myRadio);
		if(currentValue == 'general_donation'){
			
			document.getElementById('information').innerHTML = "General Donation will be utilized by Trust for various activities and expenses of the Trust including Sahaja Yoga propagation and development work.";
			document.getElementById('info_label').style.display = "block";
			document.getElementById('information').style.display = "block";
			document.getElementById('lb_center_code').style.display = "none";
			//document.getElementById('center_code').style.display = "none";		    	
			document.getElementById('lb_center_name').style.display = "none";
			//document.getElementById('center_name').style.display = "none";
			document.getElementById('lb_payment_towards').style.display = "block";
		   // document.getElementById("payment_towards").style.display = "block";
			var selectHTML = "<option value='0'>Select</option>";
			for (var i = 0; i <= A.length-1; i++) { 
			   // var newSelect = document.createElement('option');
			   var selected = A[i] === "Nirmala Nagari Ganapatipule General Donation" ? " selected" : "";
			 selectHTML += "<option value='" + A[i] + "'" + selected + "> " + A[i] + "</option>";
				//alert(selectHTML);
				//newSelect.innerHTML = selectHTML;
				document.getElementById('payment_towards').innerHTML = selectHTML;
			}
			document.getElementById('paymentFor').value = 'General Donation'; 
			document.getElementById('paymentTowards').value = "Nirmala Nagari Ganapatipule General Donation";
		   
			 //alert("paymentFor : "+paymentFor);
				
		}else if(currentValue == 'corpus_fund'){
			
			document.getElementById('information').innerHTML = "Corpus donation to be utilized for the developmental work of the specified project.";
			document.getElementById('info_label').style.display = "block";
			document.getElementById('information').style.display = "block";
			document.getElementById('lb_center_code').style.display = "none";
			//document.getElementById('center_code').style.display = "none";		    	
			document.getElementById('lb_center_name').style.display = "none";
			//document.getElementById('center_name').style.display = "none";
			document.getElementById('lb_payment_towards').style.display = "block";
			//document.getElementById("payment_towards").style.display = "block";			   
		 //   console.log("Hue");
			var selectHTML = "<option value='0'>Select</option>";
			 for (var i = 0; i <= B.length-1; i++) {
				  //  var newSelect = document.createElement('option');
				 
				  var isSelected = B[i] === "Nirmala Nagari Ganapatipule Corpus Fund" ? " selected" : "";

					selectHTML += "<option value='" + B[i] + "'" + isSelected + "> " + B[i] + "</option>";
				   // alert(selectHTML);
				   // newSelect.innerHTML = selectHTML;
					document.getElementById('payment_towards').innerHTML = selectHTML;
				}
			document.getElementById('paymentFor').value = 'Corpus Fund'; 
			 
			 //alert("paymentFor : "+paymentFor);
			
		}else if(currentValue == 'centre_donation'){

			document.getElementById('information').innerHTML = "";
			document.getElementById('info_label').style.display = "none";
			document.getElementById('information').style.display = "none";
			document.getElementById('lb_center_code').style.display = "block";
			//document.getElementById('center_code').style.display = "block";		    	
			document.getElementById('lb_center_name').style.display = "block";
			//document.getElementById('center_name').style.display = "block";
			document.getElementById('lb_payment_towards').style.display = "none";
			//document.getElementById("payment_towards").style.display = "none"
			document.getElementById('paymentFor').value = 'Centre Donation';
			//alert("paymentFor : "+paymentFor);				
		}
		else{
			document.getElementById('lb_center_code').style.display = "block";
			//document.getElementById('center_code').style.display = "block";		    	
			document.getElementById('lb_center_name').style.display = "block";
			//document.getElementById('center_name').style.display = "block";
			document.getElementById('lb_payment_towards').style.display = "none";
			document.getElementById("payment_towards").style.display = "none"
			document.getElementById('paymentFor').value = 'Donation'; 
		}
		

}
	document.addEventListener("DOMContentLoaded", function() {
		radioEevent('general_donation'); // Set default to 'general_donation' or any other default radio option you prefer
	});
	/*
	function TheLifeEternalCenterName(value){
		
		document.getElementById('4315').innerHTML = "";
		
		var centerName = "4315*0*General Donation earmarked for "+value+" center";
		
		 selectHTML = "<option value='" +centerName + "'>" + centerName.substring(7); + "</option>";
	     
	        document.getElementById('4315').innerHTML = selectHTML;
	        
	        document.getElementById('lb_4315').style.display = "block";
		    document.getElementById("4315").style.display = "block";
	        
		
	}*/
	
	function checkValidateAllFields(){

		errorFlag=true;
		
		if(!checkFirstName()){
			errorFlag=false;
			return errorFlag;
		}
		
		if(!checkLastName()){			
			errorFlag=false;
			return errorFlag;		}
		
		if(!checkMobile()){
			errorFlag=false;
			return errorFlag;
		}		
		
		if(!checkEmail()){
			errorFlag=false;
			return errorFlag;
		}
		
		
		if(!checkCity()){
			errorFlag=false;
			return errorFlag;
		}		
		if(!checkPIN()){
			errorFlag=false;
			return errorFlag;
		}		
		if(!checkPan()){
			errorFlag=false;
			return errorFlag;
		}		
		if(!checkAadhaar()){
			errorFlag=false;
			return errorFlag;
		}
		if(!checkPaymentFor()){
			errorFlag=false;
			return errorFlag;		
		}	
		
		if(!checkPaymentToward()){
			errorFlag=false;
			return errorFlag;	
		}			
		
		if(!checkAmount()){
			errorFlag=false;
			return errorFlag;	
		}
		
		if(errorFlag){
		
			document.getElementById("submitBtn").style.display='block';
			document.getElementById("bt_validate").style.display='none';
			
		
		}		
		return errorFlag;
		
	}
	
	function checkMobile(){
		
			var regmobile = new RegExp("^[0-9]{10}$");
			var mobilevalue = document.getElementById("mobile").value;
			if(mobilevalue==''){
				alert("Please enter Mobile No.");
				errorFlag=true;					
				document.getElementById("mobile").focus();
				return false;
			}
			else{
				if(!regmobile.test(mobilevalue)){
					//document.getElementById("mobile").value = "";
					alert("Please enter a valid Mobile No.");	
					errorFlag=true;					
					document.getElementById("mobile").focus();
					return false;
				}
				else{
					//alert('mobile number good');
					return true;
				}
			}
		
		
	}	
	
	function checkPIN(){
		
			var regpin = new RegExp("^[0-9]{6}$");
			var pinvalue = document.getElementById("pincode").value;
			if(pinvalue!='' && !regpin.test(pinvalue)){
				//document.getElementById("pincode").value = "";
				alert("Please enter a valid PIN.");	
				errorFlag=true;					
				document.getElementById("pincode").focus();
				return false;
			}
			else{
				return true;
			}
			
			
		
	}
	
	function checkPan(){
		
			var panValue = document.getElementById("pan").value;
			var regpan = new RegExp("([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}"); 
			if(panValue==''){
				alert("Please enter PAN No.");
				errorFlag=true;					
				document.getElementById("pan").focus();
				return false;
			}
			else{
				if(!regpan.test(panValue)){
					//document.getElementById("pan").value = "";
					alert("Please enter a valid PAN Number.");
					errorFlag = true;
					document.getElementById("pan").focus();
					return false;				
				}
				else{
					return true;
				}
			}
		
		
	}
	
	function checkAadhaar(){
		
			var adharValue = document.getElementById("aadhaar").value;
			var panValue = document.getElementById("pan").value;
		    var regaadhaar = new RegExp("\\d{12}");
			if(panValue == '' && adharValue == ''){
				alert("Please Enter PAN Card or Aadhaar Number.");
				document.getElementById("pan").focus();
				errorFlag = true;
				return false;
			}
			else{
				if(adharValue !='' && !regaadhaar.test(adharValue)){
					alert("Please Enter a valid Aadhaar Number.");
					//document.getElementById("aadhaar").value = "";
					errorFlag=true;
					document.getElementById("aadhaar").focus();
					return false;
				}	
				else{
					return true;
				}				
			}
			
		
	}
	
	function checkEmail(){
		
			var  regemail = /\S+@\S+\.\S+/;
			var emailId=document.getElementById("email").value;
			if(emailId==''){
				alert("Please enter Email Id.");
				errorFlag=true;					
				document.getElementById("email").focus();
				return false;
			}
			else{				
			
				if (!regemail.test(emailId)) 
				{	
					alert("Please enter a valid Email Id.");	
					//document.getElementById("email").value = "";
					errorFlag=true;
					document.getElementById("email").focus();
					return false;
				}
			
				else{
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
	
	function checkAmount(){
		
			var amount=document.getElementById("amount").value;
			if(amount=='' || amount <= 0 || digits_count(amount) > 7){
				alert('Please enter a valid amount up to 7 digits.');
				errorFlag=true;					
				document.getElementById("amount").focus();
				return false;
			}
			else{
				
				return true;
				
			}
			
		
	}
	
	
	function checkFirstName(){
		
			var fname=document.getElementById("fname").value;
			if(fname==''){
				alert("Please enter your first name.");
				errorFlag=true;					
				document.getElementById("fname").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}	
	function checkLastName(){
		
			var lname=document.getElementById("lname").value;
			if(lname==''){
				alert("Please enter your last name.");
				errorFlag=true;					
				document.getElementById("lname").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}
	
	
	function checkCity(){
		
			var city=document.getElementById("city").value;
			if(city==''){
				alert("Please enter your city.");
				errorFlag=true;					
				document.getElementById("city").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}
	
	
	function checkPaymentFor(){
		
			var paymentFor=document.getElementById("paymentFor").value;
			if(paymentFor==''){
				alert("Please choose a payment type.");
				errorFlag=true;					
				document.getElementById("paymentType").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}
	
	function checkPaymentToward(){
		
			var paymentToward=document.getElementById("paymentTowards").value;
			if(paymentToward==''){
				alert("Please choose payment target.");
				errorFlag=true;					
				document.getElementById("lb_payment_towards").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}		
	
	function setPaymentTowardsFromDropdown(val){
		//alert('value received from dropdown is:'+val);
		//$('#paymentTowards').text(val);
		document.getElementById("paymentTowards").value=val;
		//alert('and now the value is set to ...'+document.getElementById("paymentTowards").value);
		
		
	}
	
	function setPaymentTowardsFromCenterName(val){
		//alert('value received from center name is is:'+val);
		//$('#paymentTowards').text($('#center_name').val());
		document.getElementById("paymentTowards").value=val;
		//alert('and now the value is set to ...'+document.getElementById("paymentTowards").value);
		
		
	}
	
	function validateFields(){
	
		//errorValidation=true;
		var errorValidation = checkValidateAllFields();
		if(errorValidation){
			//alert('all good!');
			document.getElementById("bt_validate").style.display = 'none';
			document.getElementById("submitBtn").style.display = 'block';
			//document.getElementById("resetBtn").style.display = 'block';
			
		}
	
	}
	
	function resetFields(){
		$('#fname').value='';
		$('#lname').value='';
		$('#email').value='';
		$('#mobile').value='';
		$('#city').value='';
		$('#pincode').value='';
		$('#pan').value='';
		$('#aadhaar').value='';
		
	}
	
		
		