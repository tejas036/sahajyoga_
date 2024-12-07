var errorFlag = false;

function checkValidateAllFields() {
  errorFlag = true;

  // if(!checkTowards()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }
  if (!toward()) {
    errorFlag = false;
    return errorFlag;
  }
  //$('#number_adult').val() > 0)

  if (parseInt($("#number_adult").val()) + parseInt($("#number_yuva").val()) < 1) {
    if (!checkAdultAndYuvaNumber()) {
      errorFlag = false;
      return errorFlag;
    }
  }

  if ($("#number_adult").val() > 0) {
    if (!checkAdult()) {
	errorFlag = false;
    return errorFlag;
	}
  }
  	if($('#number_yuva').val() > 0) {
  		if(!checkYuva()){
  			errorFlag=false;
  			return errorFlag;
		}
  	}
  if($('#number_child').val() > 0) {
  	if(!checkChild())
	{
  		errorFlag=false;
  		return errorFlag;
	}
  }

  //    if(!checkYuva()){
  // 	errorFlag=false;
  // 	return errorFlag;
  //    }
  //    if(!checkAdult()){
  // 	errorFlag=false;
  // 	return errorFlag;
  //    }

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

  // if(!checkAdultValidation()){
  // 		errorFlag=false;
  // 		return errorFlag;
  // 	}

  // 	if(!checkChildValidation()){
  // 		errorFlag=false;
  // 		return errorFlag;
  // 	}

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

function checkAdultAndYuvaNumber() {
  if ($("#number_adult").val() == 0) {
    alert("Please select number of adults or number of yuva.");
    $("#number_adult").focus();
    errorFlag = true;
    return false;
  } else {
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
  
  for (index = 0; index < document.getElementById("number_adult").value; index++) {
    if (adultName[index].value == "") {
      alert("Please enter adult's name");
      $(adultName[index]).focus();
      val = false;
      exit();
    }
    if (adultGender[index].value == "none") {
      alert("Please enter adult's gender");
      //errorFlag=true;
      $(adultGender[index]).focus();
      val = false;
      exit();
    }
    if (adultCity[index].value == "") {
      alert("Please enter adult's city");
      //errorFlag=true;
      $(adultCity[index]).focus();
      val = false;
      exit();
    }
    if (adultCentre[index].value == "") {
      alert("Please enter adult's centre");
      //errorFlag=true;
      $(adultCentre[index]).focus();
      val = false;
    }
  }
  return val;
}

function checkYuva(){
		let index=0;
		let val=true;
	 	let yuvaName = document.getElementsByName('yuva_name[]');
		let yuvaGender = document.getElementsByName('yuva_gender[]');
		let yuvaCity = document.getElementsByName('yuva_city[]');
		let yuvaCentre = document.getElementsByName('yuva_centre[]');
	for(index =0; index<document.getElementById('number_yuva').value;index++)
	{
		if(yuvaName[index].value==''){
		alert("Please enter yuva's name");
		//errorFlag=true;
		$(yuvaName[index]).focus();
		val = false;
		exit();

   }
   if(yuvaGender[index].value=='none'){
	alert("Please enter yuva's gender");
	//errorFlag=true;
	$(yuvaGender[index]).focus();
	val = false;
	 exit();

}
if(yuvaCity[index].value==''){
alert("Please enter yuva's city");
//errorFlag=true;
$(yuvaCity[index]).focus();
val = false;
exit();

}
if(yuvaCentre[index].value==''){
alert("Please enter yuva's centre");
//errorFlag=true;
$(yuvaCentre[index]).focus();
val = false;
}
}
return val;
}

function checkChild(){
	let index=0;
	let val=false;
	 let childName = document.getElementsByName('child_name[]');
	let childGender = document.getElementsByName('child_gender[]');
	let childCity = document.getElementsByName('child_city[]');
	let childCentre = document.getElementsByName('child_centre[]');
for(index =0; index<document.getElementById('number_child').value;index++)
{
	if(childName[index].value==''){
	alert("Please enter child's name");
	//errorFlag=true;
	$(childName[index]).focus();
	val = false;
	 exit();

}
if(childGender[index].value=='none'){
alert("Please enter child's gender");
//errorFlag=true;
$(childGender[index]).focus();
val = false;
exit();

}
if(childCity[index].value==''){
alert("Please enter child's city");
//errorFlag=true;
$(childCity[index]).focus();
val = false;
exit();

}
if(childCentre[index].value==''){
alert("Please enter child's centre");
//errorFlag=true;
$(childCentre[index]).focus();
val = false;
exit();
}
else{
val= true;
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

function checkCity() {
  var city = document.getElementById("city").value;
  if (city == "") {
    alert("Please enter your city.");
    errorFlag = true;
    document.getElementById("city").focus();
    return false;
  } else {
    return true;
  }
}

function get_amount() {
  c_for = myForm.payment_towards.value;
  //age_group=myForm.age_group.value;
  // adultchild=parseInt(myForm.adultchild.value);
  //alert(adultchild);

  /*if(isNaN(adultchild)) 
			{				
			adultchild =0;
			}		  */

  number_adult = parseInt(myForm.number_adult.value);
  number_child = parseInt(myForm.number_child.value);
  //  alert(number_adult);
  total_people = number_adult + number_child;
  total_people =
    "Adult- " +
    number_adult +
    " Child- " +
    number_child +
    " Total- " +
    total_people;

  current_date = new Date();
  amount = 0;
  Firstlastdate = "Sat Dec 18 2021 00:00:00 GMT+0530 (India Standard Time)";
  //Secondlastdate="Sat Dec 20 2019 00:00:00 GMT+0530 (India Standard Time)";
  lastdate = new Date(Firstlastdate);

  if (current_date < lastdate) {
    if (c_for == "International Sahaja Yoga Seminar,Ganapatipule 2021") {
      // Till 15 Dec
      amount_adults = 4000 * number_adult;
      amount_child = 3500 * number_child;
      //	 alert(adultchild);
      //	amount_adults_child_single=1*adultchild;
      //alert(amount_adults_child_single);
    }
    /*	else 
			{
		
				amount_adults=750*number_adult;
				amount_child=550*number_child;
			} */
  } else {
    if (c_for == "International Sahaja Yoga Seminar,Ganapatipule 2021") {
      //	dec 16 onwards -->
      amount_adults = 5000 * number_adult;
      amount_child = 4500 * number_child;
      //	amount_adults_child_single=1000*adultchild;
    }
    /*else 
			{
				amount_adults=800*number_adult;
				amount_child=600*number_child;
			} */
  }

  myForm.amount.value = amount_adults + amount_child;
  myForm.total_people.value = total_people;
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
