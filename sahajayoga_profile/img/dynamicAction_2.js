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
		
		if(!checkContibutionTowards()){			
			errorFlag=false;
			return errorFlag;		}
			
		
		
		if(!checkBrideName()){			
			errorFlag=false;
			return errorFlag;		}
			
			
	    if(!checkGroomName()){			
			errorFlag=false;
			return errorFlag;		}

		
         if(!checkGuestValidation()){
			errorFlag=false;
			return errorFlag;
		}  
		
	/*	if(!checkadultchild()){
			errorFlag=false;
			return errorFlag;
		}  */
		
		
/*		if(!checkPaymentFor()){
			errorFlag=false;
			return errorFlag;		
		}	
		
		if(!checkPaymentToward()){
			errorFlag=false;
			return errorFlag;	
		}			 */
		
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
	
   
    function checkContibutionTowards()
      {
        var e = document.getElementById("payment_towards");
          //if you need text to be compared then use
        var strUser1 = e.options[e.selectedIndex].text;
        if(strUser1=="Select") //for text use if(strUser1=="Select")
        {
          alert("Please select Contibution Towards");
            errorFlag=true;
            document.getElementById("payment_towards").focus();
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
	
	
	function checkBrideName(){
		
			var Bname=document.getElementById("Bname").value;
			if(Bname==''){
				alert("Please enter Bride's Full Name.");
				errorFlag=true;					
				document.getElementById("Bname").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}
	
	
	function checkGroomName(){
		
			var Gname=document.getElementById("Gname").value;
			if(Gname==''){
				alert("Please enter Groom's Full Name.");
				errorFlag=true;					
				document.getElementById("Gname").focus();
				return false;
			}
			else{
				return true;
			}
			
		
	}
      
	
	function checkGuestValidation(){
		
			var number_guest=document.getElementById("number_guest").value;
			var guest_1=document.getElementById("guest_1").value;
			var item_G1=document.getElementById("item_G1").value;
			var guest_2=document.getElementById("guest_2").value;
			var item_G2=document.getElementById("item_G2").value;
			var guest_3=document.getElementById("guest_3").value;
			var item_G3=document.getElementById("item_G3").value;
			var guest_4=document.getElementById("guest_4").value;
			var item_G4=document.getElementById("item_G4").value;
			var guest_5=document.getElementById("guest_5").value;
			var item_G5=document.getElementById("item_G5").value;
			var guest_6=document.getElementById("guest_6").value;
			var item_G6=document.getElementById("item_G6").value;
			if(number_guest=='1'){
			    	if(guest_1==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_1").focus();
				       return false;
				
			    	}else if (item_G1=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G1").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	
			}
			else if(number_guest=='2'){
				 	if(guest_2==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_2").focus();
				       return false;
				
			    	}else if (item_G2=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G2").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_guest=='3'){
				 	if(guest_3==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_3").focus();
				       return false;
				
			    	}else if (item_G3=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G3").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_guest=='4'){
				 	if(guest_4==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_4").focus();
				       return false;
				
			    	}else if (item_G4=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G4").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_guest=='5'){
				 	if(guest_5==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_5").focus();
				       return false;
				
			    	}else if (item_G5=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G5").focus();
				       return false;
			    	    
			    	}else{
			    	    
			    	    return true;
			    	}
			    	

			    	
			}else if(number_guest=='6'){
				 	if(guest_6==""){
			          alert("Please enter your Name.");
				      errorFlag=true;					
				       document.getElementById("guest_6").focus();
				       return false;
				
			    	}else if (item_G6=="") {
			    	  alert("Please enter your Gender.");
				      errorFlag=true;					
				       document.getElementById("item_G6").focus();
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
		    number_guest=parseInt(myForm.number_guest.value);
		  
			 if(c_for=="Sahaja Marriage 2021 (Groom, Bride & Guests)")
			{     
			     if(number_guest == "0"){
			           amount_guest=0*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			         
			     }else if(number_guest == "1"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else if(number_guest == "2"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else if(number_guest == "3"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else if(number_guest == "4"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else if(number_guest == "5"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else if(number_guest == "6"){
			           amount_guest=500*number_guest;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }else{
			            amount_guest=500*6;
			           amount_Bride_Groom=30000;
			           myForm.amount.value=amount_Bride_Groom+amount_guest;
			     }
			}
			else if(c_for=="Sahaja Marriage 2021 (Bride & Guest)")
			{
		         
		          if(number_guest == "0")
		          {
		          amount_guest=0*number_guest;
		          amount_Bride=15000;
		          myForm.amount.value=amount_Bride+amount_guest;
		          }else if(number_guest == "1")
		          {
		          amount_guest=500*number_guest;
		          amount_Bride=15000;
		          myForm.amount.value=amount_Bride+amount_guest;
		          }else if(number_guest == "2")
		          {
		          amount_guest=500*number_guest;
		          amount_Bride=15000;
		          myForm.amount.value=amount_Bride+amount_guest;
		          }else if(number_guest == "3")
		          {
		          amount_guest=500*number_guest;
		          amount_Bride=15000;
		          myForm.amount.value=amount_Bride+amount_guest;
		          }else{
		          amount_guest=500*3;
		          amount_Bride=15000;
		          myForm.amount.value=amount_Bride+amount_guest;   
		          }

			}
			else if(c_for=="Sahaja Marriage 2021 (Groom & Guest)")
			{    
			    
			      if(number_guest == "0")
		          {
		          amount_guest=0*number_guest;
		          amount_Groom=15000;
		           myForm.amount.value=amount_Groom+amount_guest;
		          }else if(number_guest == "1")
		          {
		          amount_guest=500*number_guest;
		          amount_Groom=15000;
		           myForm.amount.value=amount_Groom+amount_guest;
		          } else if(number_guest == "2")
		          {
		          amount_guest=500*number_guest;
		          amount_Groom=15000;
		           myForm.amount.value=amount_Groom+amount_guest;
		          } else if(number_guest == "3")
		          {
		          amount_guest=500*number_guest;
		          amount_Groom=15000;
		          myForm.amount.value=amount_Groom+amount_guest;
		          }else{
		          amount_guest=500*3;
		          amount_Groom=15000;
		          myForm.amount.value=amount_Groom+amount_guest;
		          }
			    
			}
			else{
			    amount_none=0;
			    myForm.amount.value=amount_none;
			    
			}
	
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
	
		
		