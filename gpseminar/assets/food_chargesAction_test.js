var errorFlag = false;
function radioEevent(myRadio) {
  var A = [
    "The Life Eternal Trust General Donation",
    "Sahaja Yoga Centre Mumbai General Donation",
    "International Sahaja Yoga Research and Health Centre General Donation",
    "Nirmal Nagari Ganapatipule General Donation",
    "Vaitarna Academy General Donation",
    "Kothrud Pune Ashram General Donation",
    "Aradgaon Rahuri Ashram General Donation",
    "Sahaja Yoga Navi Mumbai",
  ];
  var B = [
    "The Life Eternal Trust Corpus Fund",
    "Sahaja Yoga Centre Mumbai Corpus Fund",
    "International Sahaja Yoga Research and Health Centre Corpus Fund",
    "Nirmal Nagari Ganapatipule Corpus Fund",
    "Vaitarna Academy Corpus Fund",
    "Kothrud Pune Ashram Corpus Fund",
    "Aradgaon Rahuri Ashram Corpus Fund",
  ];
  document.getElementById("payment_towards").innerHTML = "";
  currentValue = myRadio;
  //alert("my radio : "+myRadio);
  if (currentValue == "general_donation") {
    document.getElementById("information").innerHTML =
      "General Donation will be utilized by Trust for various activities and expenses of the Trust including Sahaja Yoga propagation and development work.";
    document.getElementById("info_label").style.display = "block";
    document.getElementById("information").style.display = "block";
    document.getElementById("lb_center_code").style.display = "none";
    //document.getElementById('center_code').style.display = "none";
    document.getElementById("lb_center_name").style.display = "none";
    //document.getElementById('center_name').style.display = "none";
    document.getElementById("lb_payment_towards").style.display = "block";
    // document.getElementById("payment_towards").style.display = "block";
    var selectHTML = "<option value='0'>Select</option>";
    for (var i = 0; i <= A.length - 1; i++) {
      // var newSelect = document.createElement('option');
      selectHTML += "<option value='" + A[i] + "'> " + A[i] + "</option>";
      //alert(selectHTML);
      //newSelect.innerHTML = selectHTML;
      document.getElementById("payment_towards").innerHTML = selectHTML;
    }
    document.getElementById("paymentFor").value = "General Donation";
    //alert("paymentFor : "+paymentFor);
  } else if (currentValue == "corpus_fund") {
    document.getElementById("information").innerHTML =
      "Corpus donation to be utilized for the developmental work of the specified project.";
    document.getElementById("info_label").style.display = "block";
    document.getElementById("information").style.display = "block";
    document.getElementById("lb_center_code").style.display = "none";
    //document.getElementById('center_code').style.display = "none";
    document.getElementById("lb_center_name").style.display = "none";
    //document.getElementById('center_name').style.display = "none";
    document.getElementById("lb_payment_towards").style.display = "block";
    //document.getElementById("payment_towards").style.display = "block";
    var selectHTML = "<option value='0'>Select</option>";
    for (var i = 0; i <= B.length - 1; i++) {
      //  var newSelect = document.createElement('option');
      selectHTML += "<option value='" + B[i] + "'> " + B[i] + "</option>";
      // alert(selectHTML);
      // newSelect.innerHTML = selectHTML;
      document.getElementById("payment_towards").innerHTML = selectHTML;
    }
    document.getElementById("paymentFor").value = "Corpus Fund";
    //alert("paymentFor : "+paymentFor);
  } else if (currentValue == "centre_donation") {
    document.getElementById("information").innerHTML = "";
    document.getElementById("info_label").style.display = "none";
    document.getElementById("information").style.display = "none";
    document.getElementById("lb_center_code").style.display = "block";
    //document.getElementById('center_code').style.display = "block";
    document.getElementById("lb_center_name").style.display = "block";
    //document.getElementById('center_name').style.display = "block";
    document.getElementById("lb_payment_towards").style.display = "none";
    //document.getElementById("payment_towards").style.display = "none"
    document.getElementById("paymentFor").value = "Centre Donation";
    //alert("paymentFor : "+paymentFor);
  } else {
    document.getElementById("lb_center_code").style.display = "block";
    //document.getElementById('center_code').style.display = "block";
    document.getElementById("lb_center_name").style.display = "block";
    //document.getElementById('center_name').style.display = "block";
    document.getElementById("lb_payment_towards").style.display = "none";
    document.getElementById("payment_towards").style.display = "none";
    document.getElementById("paymentFor").value = "Donation";
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
function radioEeventCountry(myRadio) {
  // document.getElementById('payment_towards').innerHTML = "";
  currentValue = myRadio;
  //alert("my radio : "+myRadio);
  if (currentValue == "indian") {
    document.getElementById("countryip").style.display = "block";
    document.getElementById("countryia").style.display = "block";
    document.getElementById("countryf").style.display = "none";
    document.getElementById("country").style.display = "none";
    document.getElementById("countryFor").value = "India";
    document.getElementById("panId").style.display = "block";
    document.getElementById("adharId").style.display = "block";
    document.getElementById("passportId").style.display = "none";
    document.getElementById("countryId").style.display = "none";
    $("#pan").prop("required", true);
    $("#pass").prop("required", false);
    $("#countryname").prop("required", false);
    //alert("india");
  } else if (currentValue == "foreigner") {
    document.getElementById("countryia").style.display = "none";
    document.getElementById("countryip").style.display = "none";
    document.getElementById("countryf").style.display = "block";
    document.getElementById("country").style.display = "block";
    document.getElementById("countryFor").value = "Foreigner";
    document.getElementById("panId").style.display = "none";
    document.getElementById("adharId").style.display = "none";
    document.getElementById("passportId").style.display = "block";
    document.getElementById("countryId").style.display = "block";
    $("#pass").prop("required", true);
    $("#countryname").prop("required", true);
    $("#pan").prop("required", false);
    //alert('foreigner');
  }
}
function fdate(RateId) {
  var Rate = document.getElementById(RateId).value * 1;
  if (Rate <= 0) {
    if (RateId == "FoodContAmount") {
      alert("Food Contribution per day amount must be grater than 0.");
      document.getElementById(RateId).value = "";
      document.getElementById("FoodContAmount").focus();
    } else {
      alert("Stay Contribution per day amount must be grater than 0.");
      document.getElementById(RateId).value = "";
      document.getElementById("stayContAmount").focus();
    }
  }
}
// function date(fromDate, toDate, rateId, RateId) {
//   var dateFrom = document.getElementById(fromDate).value;
//   var dateTo = document.getElementById(toDate).value;
//   var Rate = document.getElementById(RateId).value * 1;
//   if (dateFrom <= dateTo) {
//     if (Rate <= 0) {
//       if (RateId == "FoodContAmount") {
//         alert("Food Contribution per day amount must be grater than 0.");
//         document.getElementById(RateId).value = "";
//         document.getElementById("FoodContAmount").focus();
//       } else {
//         alert("Stay Contribution per day amount must be grater than 0.");
//         document.getElementById(RateId).value = "";
//         document.getElementById("stayContAmount").focus();
//       }
//     }
//     //alert(dateFrom+" & "+dateTo+" & "+Rate);
//     const date1 = new Date(dateFrom);
//     const date2 = new Date(dateTo);
//     const diffTime = Math.abs(date2 - date1);
//     const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
//     total = Math.ceil(diffDays * Rate);
//     document.getElementById(rateId).value = total;
//     //alert(diffDays+" & "+total);
//   } else {
//     // alert(dateFrom+" & "+dateTo+" & "+Rate);
//     alert("Please Select After Date " + dateFrom);
//     if (RateId == "FoodContAmount") {
//       document.getElementById(tdatef).value = "";
//       document.getElementById("tdatef").focus();
//     } else {
//       document.getElementById(tdates).value = "";
//       document.getElementById("tdates").focus();
//     }
//   }
// }
function getGrandTotal() {
  var foodTotal = document.getElementById("rate").value;
  var stayTotal = document.getElementById("rates").value;
  var otherCharges = document.getElementById("otherCharges").value;
  var grandTotal = foodTotal * 1 + stayTotal * 1 + otherCharges * 1;
  document.getElementById("amount").value = grandTotal;
}
function checkValidateAllFields() {
  errorFlag = true;
  // if(!checkcountryFor()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }
  // if(!checkPaymentToward()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }
  if (!checkForFood()) {
    errorFlag = false;
    return errorFlag;
  }

  // if (!checkForDate()) {
  //   errorFlag = false;
  //   return errorFlag;
  // }

  // if (!checkToDate()) {
  //   errorFlag = false;
  //   return errorFlag;
  // }

  if (!partName()) {
    errorFlag = false;
    return errorFlag;
  }
  if (!partGender()) {
    errorFlag = false;
    return errorFlag;
  }
  
 if (!partCategory()) {
    errorFlag = false;
    return errorFlag;
  }

  if (!partCity()) {
    errorFlag = false;
    return errorFlag;
  }

  if (!checkFirstName()) {
    errorFlag = false;
    return errorFlag;
  }

  if (!checkLastName()) {
    errorFlag = false;
    return errorFlag;
  }
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

  //  if(!checkCountry()){
  //  	errorFlag=false;
  //  	return errorFlag;
  //  }
  //  if(!checkPASS()){
  //  	errorFlag=false;
  //  	return errorFlag;
  //  }
  // if(!checkPaymentFor()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }
  // if(!checkFoodAmount()){
  // 	errorFlag=false;
  // 	return errorFlag;
  // }

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

function checkFTDateFor() {
  var tdate = document.getElementById("tdatef").value;
  if (tdate == "") {
    alert("Please enter To Date.");
    document.getElementById("tdatef").focus();
    return false;
  } else {
    return true;
  }
}
function checkSFDateFor() {
  var fdate = document.getElementById("fdates").value;
  if (fdate == "") {
    alert("Please enter From Date.");
    document.getElementById("fdates").focus();
    return false;
  } else {
    return true;
  }
}
function checkSTDateFor() {
  var tdate = document.getElementById("tdates").value;
  if (tdate == "") {
    alert("Please enter To Date.");
    document.getElementById("tdates").focus();
    return false;
  } else {
    return true;
  }
}
function checkFoodAmount() {
  var foodAmount = document.getElementById("FoodContAmount").value;
  if (foodAmount == "") {
    alert("Please enter valid Food Contribution amount.");
    document.getElementById("FoodContAmount").focus();
    return false;
  } else if (foodAmount * 1 <= 0) {
    alert("Please enter Food Contribution Amount greater than zero.");
    document.getElementById("FoodContAmount").focus();
    return false;
  }
  return true;
}
function checkStayAmount() {
  var stayAmount = document.getElementById("stayContAmount").value;
  if (stayAmount == "") {
    alert("Please enter valid Stay Contribution  amount.");
    document.getElementById("stayContAmount").focus();
    return false;
  } else if (stayAmount * 1 <= 0) {
    alert("Please enter Stay Contribution Amount greater than zero.");
    document.getElementById("stayContAmount").focus();
    return false;
  }
  return true;
}
function checkcharges() {
  //alert("Please enter a Date.");
  // var regpin = new RegExp("^[0-9]{6}$");
  var charges = document.getElementById("otherCharges").value;
  // alert("as"+charges+"as");
  if (charges == "") {
    //document.getElementById("pincode").value = "";
    alert("Please enter a some Amount.");
    errorFlag = true;
    document.getElementById("otherCharges").focus();
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
// function checkPan(){
// 	var panValue = document.getElementById("pan").value;
// 	var countryFor = document.getElementById("countryFor").value;
// 	var regpan = new RegExp("([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}");
// alert(panValue);
// 	if(countryFor == 'India'){
// 		if( panValue==''){
// 			alert("Please enter PAN No.");
// 			errorFlag=true;
// 			document.getElementById("pan").focus();
// 			return false;
// 		}
// 		else{
// 			if(!regpan.test(panValue)){
//                 //document.getElementById("pan").value = "";
//                 alert("Please enter a valid PAN Number.");
//                 errorFlag = true;
//                 document.getElementById("pan").focus();
//                 return false;
//            	   }
// 	        else{
// 	            return true;
// 	        }
// 	    }
// 	}
//     else{
//         return true;
//     }
// }

function checkPan() {
  var panValue = document.getElementById("pan").value;
  //var countryFor = document.getElementById("countryFor").value;
  var regpan = new RegExp("([A-Z]){5}([0-9]){4}([A-Z]){1}");
  if (panValue == "") {
    alert("Please enter PAN No.");
    errorFlag = true;
    document.getElementById("pan").focus();
    return false;
  } else {
    if (!regpan.test(panValue)) {
      //document.getElementById("pan").value = "";
      alert("Please enter a valid PAN Number");
      errorFlag = true;
      document.getElementById("pan").focus();
      return false;
    } else {
      return true;
    }
  }
}

function checkAadhaar() {
  // alert("bacs");
  var adharValue = document.getElementById("aadhaar").value;
  var panValue = document.getElementById("pan").value;
  var countryFor = document.getElementById("countryFor").value;
  var regaadhaar = new RegExp("\\d{12}");
  if (countryFor == "India") {
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
  } else {
    return true;
  }
}
function checkPASS() {
  var passValue = document.getElementById("pass").value;
  var countryFor = document.getElementById("countryFor").value;
  // alert(countryFor);
  if (countryFor == "Foreigner") {
    var regex = new RegExp("^[A-Z][0-9]{8}$");
    if (passValue == "") {
      alert("Please enter a Passport No.");
      errorFlag = true;
      document.getElementById("pass").focus();
      return false;
    } else {
      return true;
    }
  } else {
    return true;
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
  var foodAmount = document.getElementById("rate").value;
  var stayAmount = document.getElementById("rates").value;
  var otherCharges = document.getElementById("otherCharges").value;
  if (foodAmount == "" && stayAmount == "" && otherCharges == "") {
    alert(
      "Please Enter Food Contribution or Stay Contribution or Other Charges."
    );
    document.getElementById("otherCharges").focus();
    errorFlag = true;
    return false;
  } else {
    if (amount == "" || amount <= 0 || digits_count(amount) > 7) {
      alert("Please enter a valid amount up to 7 digits.");
      errorFlag = true;
      document.getElementById("amount").focus();
      return false;
    } else {
      return true;
    }
  }
}
function checkCountry() {
  var country = document.getElementById("countryname").value;
  var countryFor = document.getElementById("countryFor").value;
  if (countryFor == "Foreigner") {
    if (country == "") {
      alert("Please enter your Country name.");
      errorFlag = true;
      document.getElementById("country").focus();
      return false;
    } else {
      return true;
    }
  } else {
    return true;
  }
}
var for_date;
function checkForDate() {
  for_date = document.getElementById("fdatef").value;
  if (for_date == "") {
    alert("Please select For Date");
    errorFlag = true;
    document.getElementById("fdatef").focus();
    return false;
  } else {
    return true;
  }
}

function checkToDate() {
  var to_date = document.getElementById("tdatef").value;

  if (to_date == "") {
    alert("Please select To Date");
    errorFlag = true;
    document.getElementById("tdatef").focus();
    return false;
  } else if (to_date < for_date) {
    alert("Please Select After Date " + for_date);
    document.getElementById("tdatef").focus();
  } else {
    return true;
  }
}

function checkForFood() {
  var food = document.getElementById("food").checked;
  var stay = document.getElementById("stay").checked;
  var fdataf = document.getElementById("fdatef").value;
  var tdataf = document.getElementById("tdatef").value;
  var fdatas = document.getElementById("fdates").value;
  var tdatas = document.getElementById("tdates").value;

  if (food == false && stay == false) {
    alert("Please select food or stay");
    errorFlag = true;
    document.getElementById("food").focus();
    document.getElementById("stay").focus();
    return false;
  } else if (food == true && fdataf == "mm/dd/yyyy") {
    alert("Please select From Date");
    document.getElementById("fdatef").focus();
  } else if (food == true && tdataf == "mm/dd/yyyy") {
    alert("Please select To Date");
    document.getElementById("tdatef").focus();
  } else if (stay == true && fdatas == "mm/dd/yyyy") {
    alert("Please select From Date");
    document.getElementById("fdates").focus();
  } else if (stay == true && tdatas == "mm/dd/yyyy") {
    alert("Please select To Date");
    document.getElementById("tdates").focus();
  }
  // else if (fdatas >= tdatas) {
  //   alert("Please select date after " + fdatas);
  //   document.getElementById("tdates").focus();
  // }
  else {
    return true;
  }
}
function partName() {
  var part_name = document.getElementById("part_name").value;
  if (part_name == "") {
    alert("Please enter participant name");
    errorFlag = true;
    document.getElementById("part_name").focus();
    return false;
  } else {
    return true;
  }
}

function partGender() {
  var part_gender = document.getElementById("part_gender").value;
  if (part_gender == "") {
    alert("Please select participant gender");
    errorFlag = true;
    document.getElementById("part_gender").focus();
    return false;
  } else {
    return true;
  }
}

function partCategory() {
  var part_category = document.getElementById("part_category").value;
  if (part_category == "") {
    alert("Please select participant category");
    errorFlag = true;
    document.getElementById("part_category").focus();
    return false;
  } else {
    return true;
  }
}

function partCity() {
  var part_gender = document.getElementById("part_city").value;
  if (part_gender == "") {
    alert("Please enter participant city");
    errorFlag = true;
    document.getElementById("part_city").focus();
    return false;
  } else {
    return true;
  }
}
function checkFirstName() {
  var fname = document.getElementById("fname").value;
  if (fname == "") {
    alert("Please enter your first name");
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
    alert("Please enter your city.");
    errorFlag = true;
    document.getElementById("city").focus();
    return false;
  } else {
    return true;
  }
}
function checkcountryFor() {
  var countryFor = document.getElementById("countryFor").value;
  if (countryFor == "") {
    alert("Please choose a Region.");
    errorFlag = true;
    document.getElementById("countryType").focus();
    return false;
  } else {
    return true;
  }
}
function checkPaymentFor() {
  var paymentFor = document.getElementById("payment_towards").value;
  // var paymentFor=document.getElementById("paymentFor").value;
  // alert(paymentFor);
  if (paymentFor == "") {
    alert("Please choose a payment type.");
    errorFlag = true;
    document.getElementById("paymentType").focus();
    return false;
  } else {
    return true;
  }
}
function checkPaymentToward() {
  var paymentToward = document.getElementById("payment_towards").value;
  if (paymentToward == "") {
    alert("Please Select Project.");
    errorFlag = true;
    document.getElementById("paymentTowards").focus();
    return false;
  } else {
    return true;
  }
}
function setPaymentTowardsFromDropdown(val) {
  //alert('value received from dropdown is:'+val);
  //$('#paymentTowards').text(val);
  document.getElementById("paymentTowards").value = val;
  //alert('and now the value is set to ...'+document.getElementById("paymentTowards").value);
}
function setPaymentTowardsFromCenterName(val) {
  //alert('value received from center name is is:'+val);
  //$('#paymentTowards').text($('#center_name').val());
  document.getElementById("paymentTowards").value = val;
  //alert('and now the value is set to ...'+document.getElementById("paymentTowards").value);
}
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
  $("#pass").value = "";
  $("#country").value = "";
}

function getAmount() {
  var from_date = new Date(document.getElementById("fdatef").value);
  var to_date = new Date(document.getElementById("tdatef").value);
  var from_date_stay = new Date(document.getElementById("fdates").value);
  var to_date_stay = new Date(document.getElementById("tdates").value);

  Date.prototype.addDays = function (days) {
    var date = from_date;
    date.setDate(date.getDate() + days);
    return date;
  };

  count = 0;
  count_s = 0;
  total_days_food = 0;
  total_days_stay = 0;
  i = 0;
  j = 0;
  total_food_amount = 0;
  total_stay_amount = 0;
  total_stay = 0;
  total_food = 0;

  date0 = new Date("2023-12-21");
  date1 = new Date("2023-12-22");
  date2 = new Date("2023-12-23");
  date3 = new Date("2023-12-24");
  date4 = new Date("2023-12-25");
  date5 = new Date("2023-12-26");
  date6 = new Date("2023-12-27");

  //food code here

  var diff_food_time = to_date.getTime() - from_date.getTime();
  var diff_food_days = diff_food_time / (1000 * 3600 * 24);
  diff_food_days = Math.ceil(diff_food_days + 1);

  //alert("day diff : " + diff_food_days);

  for (i; i < diff_food_days; i++) {
    console.log("food " + from_date);
    if (from_date.getTime() === date1.getTime()) {
      from_date.addDays(1);
      count = count + 1;
      from_date.addDays(-1);
    }
    if (from_date.getTime() === date2.getTime()) {
      from_date.addDays(1);

      count = count + 1;
      from_date.addDays(-1);
    }
    if (from_date.getTime() === date3.getTime()) {
      from_date.addDays(1);
      count = count + 1;
      from_date.addDays(-1);
    }
    if (from_date.getTime() === date4.getTime()) {
      from_date.addDays(1);
      count = count + 1;
      from_date.addDays(-1);
    }
    if (from_date.getTime() === date5.getTime()) {
      from_date.addDays(1);
      count = count + 1;
      from_date.addDays(-1);
    }
    from_date.addDays(1);
  }
  //alert("count : " + count);
  total_days_food = diff_food_days - count;

  if (document.getElementById("food").checked && from_date >= to_date) {
    total_food_amount = total_food_amount + 350;
    // alert("diff_food_days" + diff_food_days);
    total_food = total_food_amount * total_days_food;

    document.getElementById("food_amount").value = total_food;
  }

  var diff_stay_time = to_date_stay.getTime() - from_date_stay.getTime();
  var diff_stay_days = diff_stay_time / (1000 * 3600 * 24);
  diff_stay_days = Math.ceil(diff_stay_days + 1);

  //alert("say day diff " + diff_stay_days);

  for (j; j < diff_stay_days; j++) {
    console.log(from_date_stay);
    
    if (from_date_stay.getTime() === date0.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }

    if (from_date_stay.getTime() === date1.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    if (from_date_stay.getTime() === date2.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);

      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    if (from_date_stay.getTime() === date3.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    if (from_date_stay.getTime() === date4.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    if (from_date_stay.getTime() === date5.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    if (from_date_stay.getTime() === date6.getTime()) {
      from_date_stay.setDate(from_date_stay.getDate() + 1);
      count_s = count_s + 1;
      from_date_stay.setDate(from_date_stay.getDate() - 1);
    }
    from_date_stay.setDate(from_date_stay.getDate() + 1);
  }
  //alert("count_s : " + count_s);
  total_days_stay = diff_stay_days - count_s;

  //alert("from_date_stay" + from_date_stay);

  if (
    document.getElementById("stay").checked &&
    from_date_stay >= to_date_stay
  ) {
    //alert("##" + total_days_stay);
    total_stay_amount = total_stay_amount + 350;
    //alert("total_stay_amount " + total_stay_amount);
    total_stay = total_stay_amount * total_days_stay;
    //alert("total_stay Money" + total_stay);
    document.getElementById("stay_amount").value = total_stay;
  }

  total = total_stay + total_food;

  if (isNaN(total)) {
    // alert("nan");
    document.getElementById("amount").value = 0;
  } else {
    document.getElementById("amount").value = total;
  }
}
const checkDateFromStay = () => {
  from_date_stay = new Date(document.getElementById("fdates").value);
  to_date_stay = new Date(document.getElementById("tdates").value);

  if (from_date_stay > to_date_stay) {
    alert(
      "Please select date " +
        to_date_stay.toLocaleDateString() +
        " or before " +
        to_date_stay.toLocaleDateString()
    );
    document.getElementById("fdates").value =
      document.getElementById("tdates").value;
    from_date_stay = document.getElementById("tdates").value;
    getAmount();
  }
};
const checkDateToStay = () => {
  from_date_stay = new Date(document.getElementById("fdates").value);
  to_date_stay = new Date(document.getElementById("tdates").value);

  if (from_date_stay > to_date_stay) {
    alert(
      "Please select date " +
        from_date_stay.toLocaleDateString() +
        " or after " +
        from_date_stay.toLocaleDateString()
    );
    document.getElementById("tdates").value =
      document.getElementById("fdates").value;
    to_date_stay = document.getElementById("fdates").value;
    getAmount();
  }
};

//checkDateFromfood

const checkDateFromfood = () => {
  from_date_food = new Date(document.getElementById("fdatef").value);
  to_date_food = new Date(document.getElementById("tdatef").value);

  if (from_date_food > to_date_food) {
    alert(
      "Please select date " +
        to_date_food.toLocaleDateString() +
        " or before " +
        to_date_food.toLocaleDateString()
    );
    document.getElementById("fdatef").value =
      document.getElementById("tdatef").value;
    from_date_stay = document.getElementById("tdatef").value;
    getAmount();
  }
};

const checkDateTofood = () => {
  from_date_food = new Date(document.getElementById("fdatef").value);
  to_date_food = new Date(document.getElementById("tdatef").value);

  if (from_date_food > to_date_food) {
    alert(
      "Please select date " +
        from_date_food.toLocaleDateString() +
        " or after " +
        from_date_food.toLocaleDateString()
    );
    document.getElementById("tdatef").value =
      document.getElementById("fdatef").value;
    to_date_food = document.getElementById("fdatef").value;
    getAmount();
  }
};

const checkFood = () => {
  if (document.getElementById("food").checked) {
    document.getElementById("fdatef").disabled = false;
    document.getElementById("tdatef").disabled = false;
  } else {
    document.getElementById("food_amount").value = 0;
    document.getElementById("fdatef").disabled = true;
    document.getElementById("tdatef").disabled = true;
    document.getElementById("fdatef").value = "mm/dd/yyyy";
    document.getElementById("tdatef").value = "mm/dd/yyyy";
  }
};

const checkStay = () => {
  if (document.getElementById("stay").checked) {
    document.getElementById("fdates").disabled = false;
    document.getElementById("tdates").disabled = false;
  } else {
    document.getElementById("stay_amount").value = 0;
    document.getElementById("fdates").disabled = true;
    document.getElementById("tdates").disabled = true;
    document.getElementById("fdates").value = "mm/dd/yyyy";
    document.getElementById("tdates").value = "mm/dd/yyyy";
  }
};
