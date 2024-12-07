var errorFlag = false;
	function radioEevent(myRadio){
		var A = ["The Life Eternal Trust General Donation","Sahaja Yoga Centre Mumbai General Donation","International Sahaja Yoga Research and Health Centre General Donation","Nirmal Nagari Ganapatipule General Donation","Vaitarna Academy General Donation","Kothrud Pune Ashram General Donation","Aradgaon Rahuri Ashram General Donation","Sahaja Yoga Navi Mumbai"];
		var B = ["The Life Eternal Trust Corpus Fund","Sahaja Yoga Centre Mumbai Corpus Fund","International Sahaja Yoga Research and Health Centre Corpus Fund","Nirmal Nagari Ganapatipule Corpus Fund","Vaitarna Academy Corpus Fund","Kothrud Pune Ashram Corpus Fund","Aradgaon Rahuri Ashram Corpus Fund"];
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
				selectHTML += "<option value='" + A[i] + "'> " + A[i] + "</option>";
				//alert(selectHTML);
				//newSelect.innerHTML = selectHTML;
				document.getElementById('payment_towards').innerHTML = selectHTML;
			}
			document.getElementById('paymentFor').value = 'General Donation'; 
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
			var selectHTML = "<option value='0'>Select</option>";
				for (var i = 0; i <= B.length-1; i++) {
					//  var newSelect = document.createElement('option');
					selectHTML += "<option value='" + B[i] + "'> " + B[i]  + "</option>";
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
	/*
	function TheLifeEternalCenterName(value){
		document.getElementById('4315').innerHTML = "";
		var centerName = "4315*0*General Donation earmarked for "+value+" center";
		selectHTML = "<option value='" +centerName + "'>" + centerName.substring(7); + "</option>";
		document.getElementById('4315').innerHTML = selectHTML;
		document.getElementById('lb_4315').style.display = "block";
		document.getElementById("4315").style.display = "block";
	}*/
	function radioEeventCountry(myRadio){
		// document.getElementById('payment_towards').innerHTML = "";
		currentValue = myRadio;
		//alert("my radio : "+myRadio);
		if(currentValue == 'indian'){
			document.getElementById('countryip').style.display = "block";
			document.getElementById('countryia').style.display = "block";
			document.getElementById('countryf').style.display = "none";
			document.getElementById('country').style.display = "none";
			document.getElementById('countryFor').value = 'India';
			document.getElementById("panId").style.display = "block";
			document.getElementById("adharId").style.display = "block";
			document.getElementById("passportId").style.display = "none";
			document.getElementById("countryId").style.display = "none";
			$('#pan').prop('required', true);
			$('#pass').prop('required', false);
			$('#countryname').prop('required', false);
			//alert("india");
		}
		else if(currentValue == 'foreigner'){
			document.getElementById('countryia').style.display = "none";
			document.getElementById('countryip').style.display = "none";
			document.getElementById('countryf').style.display = "block";
			document.getElementById('country').style.display = "block";
			document.getElementById('countryFor').value = 'Foreigner';
			document.getElementById("panId").style.display = "none";
			document.getElementById("adharId").style.display = "none";
			document.getElementById("passportId").style.display = "block";
			document.getElementById("countryId").style.display = "block";
			$('#pass').prop('required', true);
			$('#countryname').prop('required', true);
			$('#pan').prop('required', false);
		//alert('foreigner');
		}     
	}
	function fdate(RateId){
		var Rate = document.getElementById(RateId).value*1;
		if(Rate <= 0){
			if(RateId == 'FoodContAmount'){
				alert("Food Contribution per day amount must be grater than 0.");
				document.getElementById(RateId).value = "";
				document.getElementById("FoodContAmount").focus();
			}else{
				alert("Stay Contribution per day amount must be grater than 0.");
				document.getElementById(RateId).value = "";
				document.getElementById("stayContAmount").focus();
			}
		}
	}
	function date(fromDate,toDate,rateId,RateId){
		var dateFrom = document.getElementById(fromDate).value;
		var dateTo = document.getElementById(toDate).value;
		var Rate = document.getElementById(RateId).value*1;
		if(dateFrom <= dateTo){
			if(Rate <= 0){
				if(RateId == 'FoodContAmount'){
					alert("Food Contribution per day amount must be grater than 0.");
					document.getElementById(RateId).value = "";
					document.getElementById("FoodContAmount").focus();
				}else{
					alert("Stay Contribution per day amount must be grater than 0.");
					document.getElementById(RateId).value = "";
					document.getElementById("stayContAmount").focus();
				}
			}
			//alert(dateFrom+" & "+dateTo+" & "+Rate);
			const date1 = new Date(dateFrom );
			const date2 = new Date(dateTo );
			const diffTime = Math.abs(date2 - date1);
			const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
			total = Math.ceil(diffDays * Rate);
			document.getElementById(rateId).value = total ;
			//alert(diffDays+" & "+total);
		}
		else{
			// alert(dateFrom+" & "+dateTo+" & "+Rate);
			alert("Please Select After Date " + dateFrom );
			if(RateId == 'FoodContAmount'){ 
			document.getElementById(tdatef).value = "";
			document.getElementById("tdatef").focus();
			}else{
			document.getElementById(tdates).value = "";
			document.getElementById("tdates").focus();
			}
		}
	}
	function getGrandTotal(){
		var foodTotal = document.getElementById('rate').value;
		var stayTotal = document.getElementById('rates').value;
		var otherCharges = document.getElementById('otherCharges').value;
		var grandTotal = foodTotal*1+stayTotal*1+otherCharges*1 ;
		document.getElementById('amount').value = grandTotal ;
	}
	function checkValidateAllFields(){
		errorFlag=true;
        if(!checkcountryFor()){
			errorFlag=false;
			return errorFlag;		
        }	
        if(!checkPaymentToward()){
			errorFlag=false;
			return errorFlag;	
		}
		if(!checkFirstName()){
			errorFlag=false;
			return errorFlag;
		}
		if(!checkLastName()){			
			errorFlag=false;
            return errorFlag;		
        }
		if(!checkEmail()){
			errorFlag=false;
			return errorFlag;
		}
		if(!checkMobile()){
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
        		
		 if(!checkCountry()){
		 	errorFlag=false;
		 	return errorFlag;
		 }		
		 if(!checkPASS()){
		 	errorFlag=false;
		 	return errorFlag;
         }
		// if(!checkPaymentFor()){
		// 	errorFlag=false;
		// 	return errorFlag;		
		// }	
		// if(!checkFoodAmount()){
		// 	errorFlag=false;
		// 	return errorFlag;	
		// }
		// if(!checkFFDateFor()){
		// 	errorFlag=false;
		// 	return errorFlag;		
  		//  }
		// if(!checkFTDateFor()){
		// 	errorFlag=false;
		// 	return errorFlag;		
  		//       }
		// if(!checkStayAmount()){
		// 	errorFlag=false;
		// 	return errorFlag;	
		// }
		// if(!checkSFDateFor()){
		// 	errorFlag=false;
		// 	return errorFlag;		
  		//       }
		// if(!checkSTDateFor()){
		// 	errorFlag=false;
		// 	return errorFlag;		
  		//       }	
		//  if(!checkcharges()){
		//  	errorFlag=false;
		//  	return errorFlag;
  		//        }
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
	function checkFFDateFor(){
		var fdate = document.getElementById("fdatef").value;
		if(fdate == ''){
			alert("Please enter From Date.");
				document.getElementById("fdatef").focus();
		return false;
		}else
		{
		return true;
		}
	}
	function checkFTDateFor(){
		var tdate = document.getElementById("tdatef").value;
		if(tdate == ''){
			alert("Please enter To Date.");
				document.getElementById("tdatef").focus();
		return false;
		}else
		{
		return true;
		}
	}
	function checkSFDateFor(){
		var fdate = document.getElementById("fdates").value;
		if(fdate == ''){
			alert("Please enter From Date.");
				document.getElementById("fdates").focus();
		return false;
		}else
		{
		return true;
		}
	}
	function checkSTDateFor(){
		var tdate = document.getElementById("tdates").value;
		if(tdate == ''){
			alert("Please enter To Date.");
				document.getElementById("tdates").focus();
		return false;
		}else
		{
		return true;
		}
	}
	function checkFoodAmount(){
		var foodAmount = document.getElementById("FoodContAmount").value;
		if(foodAmount == ''){
			alert("Please enter valid Food Contribution amount.");
				document.getElementById("FoodContAmount").focus();
		return false;
		}else if(foodAmount*1 <= 0 ){
			alert("Please enter Food Contribution Amount greater than zero.");
				document.getElementById("FoodContAmount").focus();
		return false;
		}
	return true;
	}
	function checkStayAmount(){
		var stayAmount = document.getElementById("stayContAmount").value;
		if(stayAmount == ''){
			alert("Please enter valid Stay Contribution  amount.");
				document.getElementById("stayContAmount").focus();
		return false;
		}else if(stayAmount*1 <= 0 ){
			alert("Please enter Stay Contribution Amount greater than zero.");
				document.getElementById("stayContAmount").focus();
		return false;
		}
		return true;
	}
	function checkcharges(){
		//alert("Please enter a Date.");	
			// var regpin = new RegExp("^[0-9]{6}$");
			var charges = document.getElementById("otherCharges").value;
			// alert("as"+charges+"as");
			if(charges==''){
				//document.getElementById("pincode").value = "";
				alert("Please enter a some Amount.");	
				errorFlag=true;					
				document.getElementById("otherCharges").focus();
				return false;
			}
			else{
				return true;
			}
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
		var countryFor = document.getElementById("countryFor").value;
		var regpan = new RegExp("([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}"); 
		// alert(panValue);
		if(countryFor == 'India'){
			if( panValue==''){
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
        else{
            return true;
        }
	}
	function checkAadhaar(){
	// alert("bacs");
		var adharValue = document.getElementById("aadhaar").value;
		var panValue = document.getElementById("pan").value;
		var countryFor = document.getElementById("countryFor").value;
		var regaadhaar = new RegExp("\\d{12}");
		if(countryFor == 'India'){
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
		}else{
			return true;
		}
	}
	function checkPASS(){
        var passValue = document.getElementById("pass").value;
		var countryFor = document.getElementById("countryFor").value;
		// alert(countryFor);
		if(countryFor == 'Foreigner'){
			var regex = new RegExp("^[A-Z][0-9]{8}$");
			if(passValue =='' ){
				alert("Please enter a Passport No.");	
				errorFlag=true;					
				document.getElementById("pass").focus();
				return false;
			}
			else {
			
				return true;
			}
		}
        else{
            return true;
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
		var foodAmount = document.getElementById("rate").value;
		var stayAmount = document.getElementById("rates").value;
		var otherCharges = document.getElementById("otherCharges").value;
		if(foodAmount == '' && stayAmount == ''&& otherCharges == ''){
			alert("Please Enter Food Contribution or Stay Contribution or Other Charges.");
			document.getElementById("otherCharges").focus();
			errorFlag = true;
			return false;
		}
		else{
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
	}
	function checkCountry(){
        var country=document.getElementById("countryname").value;
		var countryFor = document.getElementById("countryFor").value;
		if(countryFor == 'Foreigner'){
			if(country==''){
				alert("Please enter your Country name.");
				errorFlag=true;					
				document.getElementById("country").focus();
				return false;
			}
			else{
				return true;
			}
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
	function checkcountryFor(){
        var countryFor=document.getElementById("countryFor").value;
        if(countryFor==''){
            alert("Please choose a Region.");
            errorFlag=true;					
            document.getElementById("countryType").focus();
            return false;
        }
        else{
            return true;
        }
    }   
	function checkPaymentFor(){
		var paymentFor = document.getElementById("payment_towards").value;
		// var paymentFor=document.getElementById("paymentFor").value;
		alert(paymentFor)
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
		var paymentToward=document.getElementById("payment_towards").value;
		if(paymentToward==""){
			alert("Please Select Project.");
			errorFlag=true;					
			document.getElementById("paymentTowards").focus();
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
		$('#pass').value='';
		$('#country').value='';
	}