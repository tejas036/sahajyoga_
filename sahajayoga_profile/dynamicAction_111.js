var errorFlag = false;
/*function radioEevent(myRadio){
		
		var A = ["Seminar Event - 3 Days (December 24-26,2021)"];
		var B = ["Only Puja Day on December 25,2021"];
		
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
				document.getElementById('paymentFor').value = 'Seminar'; 
			    
			   
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
		    	document.getElementById('paymentFor').value = 'Pooja'; 
		    	 
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
	
	function checkValidateAllFields(){

		errorFlag=true;

    // if(!checkTowards()){
		// 	errorFlag=false;
		// 	return errorFlag;
		// }
    if(!toward()){
			errorFlag=false;
			return errorFlag;
		}
		if(!checkFirstName()){
			errorFlag=false;
			return errorFlag;
		}
		
		if(!checkLastName()){			
			errorFlag=false;
			return errorFlag;		}
			
/*	   if(!checkGender()){			
			errorFlag=false;
			return errorFlag;		}	*/
		
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

    if(!checkAdultValidation()){
			errorFlag=false;
			return errorFlag;
		} 
		
		if(!checkChildValidation()){
			errorFlag=false;
			return errorFlag;
		}  
		
	
		
		// if(!checkadultchild()){
		// 	errorFlag=false;
		// 	return errorFlag;
		// }  
		
		
/*		if(!checkPaymentFor()){
			errorFlag=false;
			return errorFlag;		
		}	
		
		if(!checkPayment
		()){
			errorFlag=false;
			return errorFlag;	
		}			 */
		
		// if(!checkAmount()){
		// 	errorFlag=false;
		// 	return errorFlag;	
		// }
		
		if(errorFlag){
		
			document.getElementById("submitBtn").style.display='block';
			//document.getElementById("submitBtn").style.margin='0px 0px 0px 35px';
			document.getElementById("bt_validate").style.display='none';
			
		
		}		
		return errorFlag;
		
	}


  // function checkTowards()
  // {
  //     if(document.getElementById(rad1).checked == false)
  //     { 
  //     alert("Please select contribution towards.");	
  //     return false;
  //     }
      
      
  //   }

  function toward() {
    var option = document.getElementsByName('contriRadio');
    if (!(option[0].checked || option[1].checked)) {
      alert("Please select the contribution towards");
      document.getElementById("rad1").focus();
      return false;
    } else {
      return true;
    }
      
    }
  //   if(!document.getElementsByName('radio').checked){ 
  //   alert('Please select the contribution towards');
  //   document.getElementsByName("radio").focus();
  //       return false;
  // } else {
  //   return true;
  // }


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
	
      
	
	
	
/*	function checkadultchild()
      {
        var e = document.getElementById("adultchild");
          //if you need text to be compared then use
        var strUser1 = e.options[e.selectedIndex].text;
        if(strUser1=="Select") //for text use if(strUser1=="Select")
        {
          alert("Please select Adult/Yuva");
            errorFlag=true;
            document.getElementById("adultchild").focus();
			return false;
			}  
			else{
				return true;
			}
  
          
      }  */
	
   
   /* function checkGender()
      {
        var e = document.getElementById("item");
          //if you need text to be compared then use
        var strUser1 = e.options[e.selectedIndex].text;
        if(strUser1=="Select") //for text use if(strUser1=="Select")
        {
          alert("Please select a gender");
            errorFlag=true;
            document.getElementById("item").focus();
			return false;
			}
			else{
				return true;
			}
  
          
      } */
	
	
	

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
	
	function checkAdultValidation(){
		
			var number_adult=document.getElementById("number_adult").value;
     
			var adult_1=document.getElementById("adult_1").value;
			var item_1=document.getElementById("item_1").value;
			var adult_2=document.getElementById("adult_2").value;
			var item_2=document.getElementById("item_2").value;
			var adult_3=document.getElementById("adult_3").value;
			var item_3=document.getElementById("item_3").value;
			var adult_4=document.getElementById("adult_4").value;
			var item_4=document.getElementById("item_4").value;
			//var adult_5=document.getElementById("adult_5").value;
			//var item_5=document.getElementById("item_5").value;
			if(number_adult=='1'){
			    	if(adult_1==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("adult_1").focus();
				       return false;
				
			    	}else if (item_1=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_1").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	
			}
			else if(number_adult=='2'){
				 	if(adult_2==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("adult_2").focus();
				       return false;
				
			    	}else if (item_2=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_2").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_adult=='3'){
				 	if(adult_3==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("adult_3").focus();
				       return false;
				
			    	}else if (item_3=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_3").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_adult=='4'){
				 	if(adult_4==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("adult_4").focus();
				       return false;
				
			    	}else if (item_4=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_4").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_adult=='5'){
				 	if(adult_5==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("adult_5").focus();
				       return false;
				
			    	}else if (item_5=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_5").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else{
			    
			    return true;
			}
			
			
			
    }	
		
	

	
	function checkChildValidation(){
		
			var number_child=document.getElementById("number_child").value;
			var child_1=document.getElementById("child_1").value;
			var item_6=document.getElementById("item_6").value;
			var child_2=document.getElementById("child_2").value;
			var item_7=document.getElementById("item_7").value;
			var child_3=document.getElementById("child_3").value;
			var item_8=document.getElementById("item_8").value;
			var child_4=document.getElementById("child_4").value;
			var item_9=document.getElementById("item_9").value;
			//var child_5=document.getElementById("child_5").value;
			//var item_10=document.getElementById("item_10").value;
			if(number_child=='1'){
			    	if(child_1==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("child_1").focus();
				       return false;
				
			    	}else if (item_6=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_6").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	
			}
			else if(number_child=='2'){
				 	if(child_2==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("child_2").focus();
				       return false;
				
			    	}else if (item_7=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_7").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_child=='3'){
				 	if(child_3==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("child_3").focus();
				       return false;
				
			    	}else if (item_8=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_8").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_child=='4'){
				 	if(child_4==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("child_4").focus();
				       return false;
				
			    	}else if (item_9=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_9").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_child=='5'){
				 	if(child_5==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("child_5").focus();
				       return false;
				
			    	}else if (item_10=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_10").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else{
			    
			    return true;
			}
			
			
			
			
		
	}

	
	
	
	  function get_amount()
		{
		    
		     		    
		    c_for=myForm.payment_towards.value;
		    //age_group=myForm.age_group.value;
		  // adultchild=parseInt(myForm.adultchild.value);
		   //alert(adultchild);
		  
		   /*if(isNaN(adultchild)) 
			{				
			adultchild =0;
			}		  */

	        number_adult=parseInt(myForm.number_adult.value);
	        number_child=parseInt(myForm.number_child.value);
	      //  alert(number_adult);
	        total_people=number_adult+number_child;
	        total_people="Adult- "+number_adult+" Child- "+number_child+" Total- "+total_people;
	
		    current_date= new Date();
		    amount=0;
            Firstlastdate="Sat Dec 18 2021 00:00:00 GMT+0530 (India Standard Time)";
		    //Secondlastdate="Sat Dec 20 2019 00:00:00 GMT+0530 (India Standard Time)";
		    lastdate= new Date(Firstlastdate);
        
		    if(current_date<lastdate)
                        
		    {
		
			   if(c_for=="International Sahaja Yoga Seminar,Ganapatipule 2021")
			{
				// Till 15 Dec			
				amount_adults=4000*number_adult;
				amount_child=3500*number_child;
			//	 alert(adultchild);
			//	amount_adults_child_single=1*adultchild;
				//alert(amount_adults_child_single);
			}
		/*	else 
			{
		
				amount_adults=750*number_adult;
				amount_child=550*number_child;
			} */
		}
		else
		{
		
		if(c_for=="International Sahaja Yoga Seminar,Ganapatipule 2021")
			{
			//	dec 16 onwards -->				
				amount_adults=5000*number_adult;
				amount_child=4500*number_child;
			//	amount_adults_child_single=1000*adultchild;
			}
			/*else 
			{
				amount_adults=800*number_adult;
				amount_child=600*number_child;
			} */
		}
	
		
		myForm.amount.value=amount_adults+amount_child;
		myForm.total_people.value=total_people;
		
		}
	
	    
	
	
	
/*	function checkPaymentFor(){
		
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
		
		 
	} */
	
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
	
		
		