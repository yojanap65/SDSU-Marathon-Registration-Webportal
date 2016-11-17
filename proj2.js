 /* Name: Yojana Vilas Patil
     	RED ID: 819676514
     	Jadrn047 
     	Proj3 CS545 
     	proj2.js	*/
 function isValidEmail(email) {
     var regex = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
     return regex.test(email);
 }

 function validateDate() {

     var day = $("#d").val();
     var month = $("#m").val();
     var year = $("#y").val();

     //Turn the three values into a Date object and check them
     var checkDate = new Date(year, month - 1, day);
     var checkDay = checkDate.getDate();
     var checkMonth = checkDate.getMonth() + 1;
     var checkYear = checkDate.getFullYear();

     if (!(day == checkDay && month == checkMonth && year == checkYear)) {
         return false;
     }
     return true;
 }

 function checkDOBirth() {
     //Check age from date of event
     var nowyear = 2016;
     var nowmonth = 12;
     var nowday = 4;

     var birthyear = $("#y").val();
     var birthmonth = $("#m").val();
     var birthday = $("#d").val();

     var age = nowyear - birthyear;
     var age_month = nowmonth - birthmonth;
     var age_day = nowday - birthday;

     if (age > 100) {
         return false;
     }
     if (age_month < 0 || (age_month == 0 && age_day < 0)) {
         age = parseInt(age) - 1;
     }
     if ((age == 16 && age_month <= 0 && age_day <= 0) || age < 16) {
         return false;
     }
     return true;

 }

 function checkValidState(stateName) {
     var states = new Array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA",
         "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD",
         "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ",
         "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC",
         "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY",
         "AS", "DC", "FM", "GU", "MH", "MP", "PR", "PW", "VI");
     for (var i = 0; i < states.length; i++) {
         if (states[i] == $.trim(stateName))
             return true;
     }
     return false;
 }

 function resetAll() {
     $('#error_message').text("");
     $('#fname').val("");
     $('#mname').val("");
     $('#lname').val("");
     $('#address').val("");
     $('#address_1').val("");
     $('#city').val("");
     $('#state').val("");
     $('#zipcode').val("");
     $('#area_code').val("");
     $('#prefix').val("");
     $('#phone').val("");
     $('#email').val("");
     $('input[name="gender"]').prop('checked', false);
     $('#m').val("");
     $('#d').val("");
     $('#y').val("");
     $('#medical').val("");
     $('input[name="experience"]').prop('checked', false);
     $('input[name="category"]').prop('checked', false);
 }

 $(document).ready(function() {
     function validateData() {
         var fname = $('#fname').val(),
             lname = $('#lname').val(),
             address = $('#address').val(),
             city = $('#city').val(),
             state = $('#state').val(),
             zipcode = $('#zipcode').val(),
             area_code = $('#area_code').val(),
             prefix = $('#prefix').val(),
             phone = $('#phone').val(),
             email = $('#email').val(),
             m = $('#m').val(),
             d = $('#d').val(),
             y = $('#y').val(),
             experience = $('#experience'),
             category = $('#category'),
             gender = $('#gender'),
             picture = $('#picture').val();


         var errorMessage = $('#error_message');

         if ($.trim(fname).length == 0) {
             $('#error_message').text("Please enter first name");
             $('#fname').focus();
             return false;
         } else if ($.trim(lname).length == 0) {
             errorMessage.text("Please enter last name");
             $('#lname').focus();
             return false;
         } else if ($.trim(address).length == 0) {
             errorMessage.text("Please enter address");
             $('#address').focus();
             return false;
         } else if ($.trim(city).length == 0) {
             errorMessage.text("Please enter city");
             $('#city').focus();
             return false;
         } else if ($.trim(state).length == 0) {
             errorMessage.text("Please enter state");
             $('#state').focus();
             return false;
         } else if (!checkValidState($('#state').val().toUpperCase())) {
             errorMessage.text("Please enter valid state");
             $('#state').focus();
             return false;
         } else if ($.trim(zipcode).length == 0) {
             errorMessage.text("Please enter zipcode");
             $('#zipcode').focus();
             return false;
         } else if (!$.isNumeric(zipcode)) {
             errorMessage.text("Zipcode should be numeric");
             $('#zipcode').focus();
             return false;
         } else if (zipcode.length != 5) {
             errorMessage.text("Please enter valid zipcode");
             $('#zipcode').focus();
             return false;
         } else if ($.trim(area_code).length == 0) {
             errorMessage.text("Please enter area code");
             $('#area_code').focus();
             return false;
         } else if (!$.isNumeric(area_code)) {
             errorMessage.text("Please enter numeric area code");
             $('#area_code').focus();
             return false;
         } else if (area_code.length != 3) {
             errorMessage.text("Please enter 3 digit area code");
             $('#area_code').focus();
             return false;
         } else if ($.trim(prefix).length == 0) {
             errorMessage.text("Please enter prefix of phone numebr");
             $('#prefix').focus();
             return false;
         } else if (!$.isNumeric(prefix)) {
             errorMessage.text("Please enter numeric prefix phone number");
             $('#prefix').focus();
             return false;
         } else if (prefix.length != 3) {
             errorMessage.text("Please enter 3 digit prefix phone number");
             $('#prefix').focus();
             return false;
         } else if ($.trim(phone).length == 0) {
             errorMessage.text("Please enter phone number");
             $('#phone').focus();
             return false;
         } else if (!$.isNumeric(phone)) {
             errorMessage.text("Please enter numeric phone number");
             $('#phone').focus();
             return false;
         } else if (phone.length != 4) {
             errorMessage.text("Please enter 4 digit phone number");
             $('#phone').focus();
             return false;
         } else if ($.trim(email).length == 0) {
             errorMessage.text("Please enter email ID");
             $('#email').focus();
             return false;
         } else if (!isValidEmail(email)) {
             errorMessage.text("Please enter valid email ID");
             $('#email').focus();
             return false;
         } else if (!$("input[name*='gender']:checked").val()) {
             errorMessage.text("Please select gender");
             $('#gender').focus();
             return false;
         } else if ($.trim(m).length == 0) {
             errorMessage.text("Please enter Month(mm)");
             $('#m').focus();
             return false;
         } else if ($.trim(d).length == 0) {
             errorMessage.text("Please enter Day(dd)");
             $('#d').focus();
             return false;
         } else if ($.trim(y).length == 0) {
             errorMessage.text("Please enter Year(yyyy)");
             $('#y').focus();
             return false;
         } else if (!validateDate()) {
             errorMessage.text("Please enter valid date");
             $('#d').focus();
             return false;
         } else if (!checkDOBirth()) {
             errorMessage.text("Age should be between 16 to 100 years");
             $('#d').focus();
             return false;
         } else if (!$("input[name*='experience']:checked").val()) {
             errorMessage.text("Please select experience level");
             $('#experience').focus();
             return false;
         } else if (!$("input[name*='category']:checked").val()) {
             errorMessage.text("Please select category");
             $('#category').focus();
             return false;
         } else if ($.trim(picture) == "") {
             errorMessage.text("Please select image");
             return false;
         } else {
             return true;
         }
     }


     function handleData(response) {

         if (response.startsWith("DUP"))
             $('#status').text("This record appears to be a duplicate.");

         else if (response.startsWith("OK")) {
             $('#status').text("This record is OK, not a duplicate.");
             $('#customer_info_form').serialize();
             $('#customer_info_form').submit();

         }

     }

     $('#send_data').on('click', function(e) {
         e.preventDefault();
         if (validateData()) {
             var params = "email=" + $("#email").val();
             var url = "check_dup.php?" + params;
             $.get(url, dup_handler);
         }
     });

     $(':reset').on('click', function() {
         for (var i = 0; i < 24; i++)
             resetAll();
     });
 });

 function dup_handler(response) {

     if (response == "DUP") {
         $('#status').text("This record appears to be a duplicate.");
         $('#error_message').text("");
     } else if (response == "OK") {
         $('form').serialize();
         $('form').submit();
     } else {
         alert(response);
     }
 }