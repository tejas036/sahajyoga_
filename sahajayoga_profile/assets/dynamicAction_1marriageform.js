var errorFlag = false;

function checkValidateAllFields() {
  errorFlag = true;

  if (!checkTowards()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!checkGroomName()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!checkBrideName()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!totalGuests()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!checkGustName1()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!checkGustGender1()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!checkGustCity1()) {
    errorFlag = false;
    return errorFlag;
  }

  if (document.getElementById("guest_number").value == 2) {
    if (!checkGustName2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity2()) {
      errorFlag = false;
      return errorFlag;
    }
  }
  if (document.getElementById("guest_number").value == 3) {
    if (!checkGustName2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity3()) {
      errorFlag = false;
      return errorFlag;
    }
  }
  if (document.getElementById("guest_number").value == 4) {
    if (!checkGustName2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName4()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender4()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity4()) {
      errorFlag = false;
      return errorFlag;
    }
  }

  if (document.getElementById("guest_number").value == 5) {
    if (!checkGustName2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity2()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity3()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName4()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender4()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity4()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustName5()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustGender5()) {
      errorFlag = false;
      return errorFlag;
    }
    if (!checkGustCity5()) {
      errorFlag = false;
      return errorFlag;
    }
  }

  if (!checkFirstName()) {
    errorFlag = false;
    return errorFlag;
  }

  if (!checkLastName()) {
    errorFlag = false;
    return errorFlag;
  }

  /*	   if(!checkGender()){			
			errorFlag=false;
			return errorFlag;		}	*/
  if (!checkEmail()) {
    errorFlag = false;
    return errorFlag;
  }

  if (!checkMobile()) {
    errorFlag = false;
    return errorFlag;
  }

  // if(!checkCity()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }
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

  // if(!checkadultchild()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }

  /*		if(!checkPaymentFor()){
			errorFlag=false;
			return errorFlag;		
		}	
		
		if(!checkPaymentToward()){
			errorFlag=false;
			return errorFlag;	
		}			 */

  // if(!checkAmount()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }

  if (errorFlag) {
    document.getElementById("submitBtn").style.display = "block";
    document.getElementById("bt_validate").style.display = "none";
  }
  return errorFlag;
}

function checkTowards() {
  let towards = document.getElementById("payment_towards").value;
  if (towards == "none") {
    alert("Please select the contribution towards");
    document.getElementById("payment_towards").focus();
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
  if (pinvalue == "") {
    //document.getElementById("pincode").value = "";
    alert("Please enter PIN.");
    errorFlag = true;
    document.getElementById("pincode").focus();
    return false;
  } else if (pinvalue != "" && !regpin.test(pinvalue)) {
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
  var regpan = new RegExp("([A-Z]){4}([P]){1}([0-9]){4}([A-Z]){1}");
  if (panValue == "") {
    alert("Please enter PAN No.");
    errorFlag = true;
    document.getElementById("pan").focus();
    return false;
  } else {
    if (!regpan.test(panValue)) {
      //document.getElementById("pan").value = "";
      alert("Please enter a valid PAN Number. All characters should be capital and fourth character should be capital P.");
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

function checkGroomName() {
  var groomName = document.getElementById("groom_name").value;
  if (groomName == "") {
    alert("Please enter groom's name.");
    errorFlag = true;
    document.getElementById("groom_name").focus();
    return false;
  } else {
    return true;
  }
}
function checkBrideName() {
  var brideName = document.getElementById("bride_name").value;
  if (brideName == "") {
    alert("Please enter bride's name.");
    errorFlag = true;
    document.getElementById("bride_name").focus();
    return false;
  } else {
    return true;
  }
}

function totalGuests() {
  var totalGuest = document.getElementById("guest_number").value;
  if (totalGuest < 1) {
    alert("Please enter number of guests.");
    errorFlag = true;
    document.getElementById("guest_number").focus();
    return false;
  } else {
    return true;
  }
}

function checkGustName1() {
  var guestName1 = document.getElementById("guest_1").value;
  if (guestName1 == "") {
    alert("Please enter name.");
    errorFlag = true;
    document.getElementById("guest_1").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustGender1() {
  var guestGender1 = document.getElementById("guest_gender_1").value;
  if (guestGender1 == "") {
    alert("Please enter gender.");
    errorFlag = true;
    document.getElementById("guest_gender_1").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustCity1() {
  var guestCity1 = document.getElementById("guest_city_1").value;
  if (guestCity1 == "") {
    alert("Please enter city.");
    errorFlag = true;
    document.getElementById("guest_city_1").focus();
    return false;
  } else {
    return true;
  }
}

function checkGustName2() {
  var guestName2 = document.getElementById("guest_2").value;
  if (guestName2 == "") {
    alert("Please enter name.");
    errorFlag = true;
    document.getElementById("guest_2").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustGender2() {
  var guestGender2 = document.getElementById("guest_gender_2").value;
  if (guestGender2 == "") {
    alert("Please enter gender.");
    errorFlag = true;
    document.getElementById("guest_gender_2").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustCity2() {
  let guestCity2 = document.getElementById("guest_city_2").value;
  if (guestCity2 == "") {
    alert("Please enter city.");
    errorFlag = true;
    document.getElementById("guest_city_2").focus();
    return false;
  } else {
    return true;
  }
}

function checkGustName3() {
  var guestName3 = document.getElementById("guest_3").value;
  if (guestName3 == "") {
    alert("Please enter name.");
    errorFlag = true;
    document.getElementById("guest_3").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustGender3() {
  var guestGender3 = document.getElementById("guest_gender_3").value;
  if (guestGender3 == "") {
    alert("Please enter gender.");
    errorFlag = true;
    document.getElementById("guest_gender_3").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustCity3() {
  let guestCity3 = document.getElementById("guest_city_3").value;
  if (guestCity3 == "") {
    alert("Please enter city.");
    errorFlag = true;
    document.getElementById("guest_city_3").focus();
    return false;
  } else {
    return true;
  }
}

function checkGustName4() {
  var guestName4 = document.getElementById("guest_4").value;
  if (guestName4 == "") {
    alert("Please enter name.");
    errorFlag = true;
    document.getElementById("guest_4").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustGender4() {
  var guestGender4 = document.getElementById("guest_gender_4").value;
  if (guestGender4 == "") {
    alert("Please enter gender.");
    errorFlag = true;
    document.getElementById("guest_gender_4").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustCity4() {
  let guestCity4 = document.getElementById("guest_city_4").value;
  if (guestCity4 == "") {
    alert("Please enter city.");
    errorFlag = true;
    document.getElementById("guest_city_4").focus();
    return false;
  } else {
    return true;
  }
}

function checkGustName5() {
  var guestName5 = document.getElementById("guest_5").value;
  if (guestName5 == "") {
    alert("Please enter name.");
    errorFlag = true;
    document.getElementById("guest_5").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustGender5() {
  var guestGender5 = document.getElementById("guest_gender_5").value;
  if (guestGender5 == "") {
    alert("Please enter gender.");
    errorFlag = true;
    document.getElementById("guest_gender_5").focus();
    return false;
  } else {
    return true;
  }
}
function checkGustCity5() {
  let guestCity5 = document.getElementById("guest_city_5").value;
  if (guestCity5 == "") {
    alert("Please enter city.");
    errorFlag = true;
    document.getElementById("guest_city_5").focus();
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
function checkAdultValidation() {
  var number_adult = document.getElementById("number_adult").value;

  var adult_1 = document.getElementById("adult_1").value;
  var item_1 = document.getElementById("item_1").value;
  var adult_2 = document.getElementById("adult_2").value;
  var item_2 = document.getElementById("item_2").value;
  var adult_3 = document.getElementById("adult_3").value;
  var item_3 = document.getElementById("item_3").value;
  var adult_4 = document.getElementById("adult_4").value;
  var item_4 = document.getElementById("item_4").value;
  //var adult_5=document.getElementById("adult_5").value;
  //var item_5=document.getElementById("item_5").value;
  if (number_adult == "1") {
    if (adult_1 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("adult_1").focus();
      return false;
    } else if (item_1 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_1").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_adult == "2") {
    if (adult_2 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("adult_2").focus();
      return false;
    } else if (item_2 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_2").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_adult == "3") {
    if (adult_3 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("adult_3").focus();
      return false;
    } else if (item_3 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_3").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_adult == "4") {
    if (adult_4 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("adult_4").focus();
      return false;
    } else if (item_4 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_4").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_adult == "5") {
    if (adult_5 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("adult_5").focus();
      return false;
    } else if (item_5 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_5").focus();
      return false;
    } else {
      return true;
    }
  } else {
    return true;
  }
}

function checkChildValidation() {
  var number_child = document.getElementById("number_child").value;
  var child_1 = document.getElementById("child_1").value;
  var item_6 = document.getElementById("item_6").value;
  var child_2 = document.getElementById("child_2").value;
  var item_7 = document.getElementById("item_7").value;
  var child_3 = document.getElementById("child_3").value;
  var item_8 = document.getElementById("item_8").value;
  var child_4 = document.getElementById("child_4").value;
  var item_9 = document.getElementById("item_9").value;
  //var child_5=document.getElementById("child_5").value;
  //var item_10=document.getElementById("item_10").value;
  if (number_child == "1") {
    if (child_1 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("child_1").focus();
      return false;
    } else if (item_6 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_6").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_child == "2") {
    if (child_2 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("child_2").focus();
      return false;
    } else if (item_7 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_7").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_child == "3") {
    if (child_3 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("child_3").focus();
      return false;
    } else if (item_8 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_8").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_child == "4") {
    if (child_4 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("child_4").focus();
      return false;
    } else if (item_9 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_9").focus();
      return false;
    } else {
      return true;
    }
  } else if (number_child == "5") {
    if (child_5 == "") {
      alert("Please enter your Name.");
      errorFlag = true;
      document.getElementById("child_5").focus();
      return false;
    } else if (item_10 == "") {
      alert("Please enter your Gender.");
      errorFlag = true;
      document.getElementById("item_10").focus();
      return false;
    } else {
      return true;
    }
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
