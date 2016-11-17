<!--Name:                 Yojana Vilas Patil
      Class Account #:        jadrn047
      REDID:                819676514
      Project #3             p2.php                                    -->
<?php

function validate_data($params)
{
    $msg  = "";
    $arr2 = array(
        $params[10],
        $params[11],
        $params[12]
    );
    
    $str2 = implode("/", $arr2);
    
    if (strlen($params[0]) == 0)
        $msg .= "Please enter the fname<br />";
    
    elseif (strlen($params[1]) == 0)
        $msg .= "Please enter the lname<br />";
    elseif (strlen($params[2]) == 0)
        $msg .= "Please enter the address<br />";
    elseif (strlen($params[3]) == 0)
        $msg .= "Please enter the city<br />";
    elseif (strlen($params[4]) == 0)
        $msg .= "Please enter the state<br />";
    elseif (strlen($params[5]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif (!is_numeric($params[5]))
        $msg .= "Zip code may contain only numeric digits<br />";
    elseif (strlen($params[6]) == 0)
        $msg .= "Please enter the area code<br />";
    elseif (!is_numeric($params[6]))
        $msg .= "area code may contain only numeric digits<br />";
    elseif (strlen($params[7]) == 0)
        $msg .= "Please enter the prefix code<br />";
    elseif (!is_numeric($params[7]))
        $msg .= "prefix code may contain only numeric digits<br />";
    elseif (strlen($params[8]) == 0)
        $msg .= "Please enter the phone number<br />";
    elseif (!is_numeric($params[8]))
        $msg .= "phone number may contain only numeric digits<br />";
    elseif (strlen($params[9]) == 0)
        $msg .= "Please enter email<br />";
    elseif (!filter_var($params[9], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";
    elseif (!isset($_POST['gender']))
        $msg .= "Please select the gender<br />";
    elseif (strlen($params[10]) == 0)
        $msg .= "Please enter the month<br />";
    elseif (!is_numeric($params[10]))
        $msg .= "month may contain only numeric digits<br />";
    elseif (strlen($params[11]) == 0)
        $msg .= "Please enter the day<br />";
    elseif (!is_numeric($params[11]))
        $msg .= "day may contain only numeric digits<br />";
    elseif (strlen($params[12]) == 0)
        $msg .= "Please enter the year<br />";
    elseif (!is_numeric($params[12]))
        $msg .= "Year may contain only numeric digits<br />"; 
    elseif (!validateDate($str2))
        $msg .= "Please enter valid date!<br />";
    elseif (!checkDOBirth($str2))
        $msg .= "Age should be between 15 to 100 years!<br />";
    elseif (!isset($_POST['experience']))
        $msg .= "Please select the experience level<br />";
    elseif (!isset($_POST['category']))
        $msg .= "Please select the category <br />";
    elseif (strlen($params[16]) == 0)
        $msg .= "Please select picture.<br />";   
    if ($msg) {
        write_form_error_page($msg);
        exit;
    }
}

function write_form_error_page($msg)
{
    write_header();
    echo "<h2>Sorry, an error occurred<br />", $msg, "</h2>";
    write_form();
    write_footer();
}

function validateDate($DOB)
{
    list($month, $day, $year) = explode('/', $DOB);
    $checkDate = new DateTime();
    $checkDate->setDate($year, $month, $day);   
    $formatDate = $checkDate->format('n/j/Y'); //n: Month without leading 0, j: Day without leading 0	
    if ($DOB == $formatDate)
        return TRUE;
    else 
        return FALSE;   
}

function checkDOBirth($DOB)
{
    
    list($month, $day, $year) = explode('/', $DOB);
    // Date of Marathon event
    $nowyear  = 2016;
    $nowmonth = 12;
    $nowday   = 4;
    
    $age       = $nowyear - $year;
    $age_month = $nowmonth - $month;
    $age_day   = $nowday - $day;
    
    if ($age > 100)
        return false;
    if ($age_month < 0 || ($age_month == 0 && $age_day < 0))
        $age = $age - 1;
    if (($age == 15 && $age_month <= 0 && $age_day <= 0) || $age < 15)
        return false;
    return true;
}

function write_form()
{
    print <<<ENDBLOCK
   
    <form  
        name="customer"
        method="post" 
        action="process_request.php"
        enctype="multipart/form-data">
    <fieldset>
            
               <legend>Personal Information</legend>
              
               <ul>
                  <li><label class="grid" >First Name<span>*</span></label>
                     <input type="text" id="fname" name="fname" value="$_POST[fname]" size="25" class='required' autofocus="autofocus" />
                  </li>
                  <li><label class="grid" >Middle Name</label>
                     <input type="text" id="mname" name="mname" value="$_POST[mname]" size="25" class='required' />
                  </li>
                  <li><label class="grid" >Last Name<span>*</span></label>
                     <input type="text" id="lname"  name="lname" value="$_POST[lname]" size="25" class='required' />
                  </li>
                  <li><label class="grid" >Address<span>*</span></label>
                     <input type="text" id="address" name="address" value="$_POST[address]" size="40" class='space'/>
                  </li>
                  <li><label class="grid" >Address(optional)</label>
                     <input type="text"  id="address_1" name="address_1"  value="$_POST[address_1]" size="40" class='required'/>
                  </li>
                  <li>
                     <label class="grid" >City<span>*</span></label>
                     <input type="text" id="city"  name="city" size="25" value="$_POST[city]" class='required'/> 
                  </li>
                  <div class="clearfix" ></div>
                  <li>
                     <label class="grid" >State<span>*</span></label>
                     <input type="text" id="state"  name="state" value="$_POST[state]" size="2"> 
                  </li>
                  <div class="clearfix" ></div>
                  <li>
                     <label class="grid" >Zipcode<span>*</span></label>
                     <input type="text" id="zipcode" name="zipcode" value="$_POST[zipcode]" size="5" maxlength="5" class='required'/>
                  </li>
                  <div class="clearfix" ></div>
               </ul>
            </fieldset>
            <fieldset>
               <legend>Contact Information</legend>
               <ul>
                  <li><label class="grid" >Primary Phone<span>*</span></label>
                     <input type="text" id ="area_code" name="area_code" size="3" value="$_POST[area_code]" placeholder="XXX" maxlength="3" class='required'/>
                     <input type="text" id="prefix"  name="prefix" size="3" placeholder="XXX" value="$_POST[prefix]" maxlength="3" class='required' />-
                     <input type="text" id="phone" name="phone" size="4" placeholder="XXXX" maxlength="4" value="$_POST[phone]" class='required'/>
                  </li>
                  <li><label class="grid" >Email Address<span>*</span></label>
                     <input type="text" id="email" name="email" value="$_POST[email]" size="25" class='required'/>
                  </li>
               </ul>
            </fieldset>
            <fieldset>
               <legend>Other Information</legend>
               <ul>
                  <li><label class="grid" >Gender<span>*</span></label>    
            
ENDBLOCK;
    
    
    $gender_choice = array(
        "Male",
        "Female"
    );
    foreach ($gender_choice as $item) {
        echo "<input type='radio' name='gender'  value='$item'";
        if ($item == $_POST['gender'])
            echo " checked='checked'";
        echo " />$item";
    }
    echo "<br />";
    print <<<ENDBLOCK
 
 </li>
                  <li><label class="grid" >Date of Birth<span>*</span></label>
                     <input type="text" id="m" size="2" name="month" value="$_POST[month]" placeholder="mm" maxlength="2" > /
                     <input type="text" id="d" size="2" name="day" placeholder="dd" value="$_POST[day]" maxlength="2"> /
                     <input type="text" id="y" size="4" name="year" placeholder="YYYY" value="$_POST[year]" maxlength="4">                                   
                  </li>
                  <li><label class="grid" >Medical Conditions</label></li>
                  <textarea rows="4" cols="50"  name="medical" value="$_POST[medical]" id="medical"> </textarea>
                  <li><label class="grid" >Experience Level<span>*</span></label> 
 
ENDBLOCK;
    
    $experience_choice = array(
        "Expert",
        "Experienced",
        "Novice"
    );
    foreach ($experience_choice as $item) {
        echo "<input type='radio' name='experience'  value='$item'";
        if ($item == $_POST['experience'])
            echo " checked='checked'";
        echo " />$item";
    }
    echo "<br />";
    
    print <<<ENDBLOCK
          
             </li>
                  <li><label class="grid" >Category<span>*</span></label>  
                 
ENDBLOCK;
    
    $category_choice = array(
        "Teen",
        "Adult",
        "Senior"
    );
    foreach ($category_choice as $item) {
        echo "<input type='radio' name='category'  value='$item'";
        if ($item == $_POST['category'])
            echo " checked='checked'";
        echo " />$item";
    }
    echo "<br />";
    
    
    
    print <<<ENDBLOCK
	</li>
               </ul>
               </fieldset>
               <fieldset>
        <legend>Runner Photo Upload</legend>
				<table>        
					<tr>
                     <td>Runner Image:</td>
                     <td><input type="file" id="picture" name="file" />  
					</tr>
				</table>
			<h2 id="status"></h2>
			<div id="pic"></div>
			<h2 id="answer"></h2>
            
            <div id="button_panel">  
                  <input type="reset" value="Clear" class="button" id="reset_btn" />
                  <input type="submit" value="submit" class="button" id="submit_btn"/>           
               </div>
               <div id="home1"><a href="index.html" id="home" >Go To Home</a></div>
        </form>   
    </fieldset> 
ENDBLOCK;
}

function process_parameters()
{
    global $bad_chars;
    $params   = array();
    $params[] = trim(str_replace($bad_chars, "", $_POST['fname']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['address']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['city']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['state']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['zipcode']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['area_code']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['prefix']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['phone']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['email']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['month']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['day']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['year']));
    $params[] = trim(str_replace($bad_chars, "", $_POST['mname'])); 
    $params[] = trim(str_replace($bad_chars, "", $_POST['address_1']));    
    $params[] = trim(str_replace($bad_chars, "", $_POST['medical']));  
    $params[] = trim(str_replace($bad_chars, "", $_FILES['file']['name']));    
    return $params;
}

function store_data_in_db($params)
{
    # get a database connection
    $db   = get_db_handle(); ## method in helpers.php
    $arr  = array(
        $params[6],
        $params[7],
        $params[8]
    );
    $arr2 = array(
        $params[10],
        $params[11],
        $params[12]
    );
    $str  = implode("", $arr);
    $str2 = implode("/", $arr2);  
    
    $sql2 = "SELECT * FROM runner WHERE email = '$params[9]';";
    
    $result = mysqli_query($db, $sql2);
    
    if (mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
    }
    //OK, duplicate check passed, now insert */   
    $UPLOAD_DIR   = 'im_ges/';
    $COMPUTER_DIR = '/home/jadrn047/public_html/proj3/im_ges/';
    $new          = rand(0000, 9999);
    $fname        = $new . $_FILES['file']['name']; //Rename file before sending it to server
    
    if (file_exists("$UPLOAD_DIR" . $fname)) {
        echo "<b>Error, the file $fname already exists on the server</b><br />\n";
    } else if ($_FILES['file']['error'] > 0) {
        $err = $_FILES['file']['error'];
        echo "Error Code: $err ";
        if ($err == 1)
            echo "The file was too big to upload, the limit is 2MB<br />";
    } elseif (exif_imagetype($_FILES['file']['tmp_name']) != IMAGETYPE_JPEG) {
        echo "ERROR, not a jpg file<br />";
    }
    ## file is valid, copy from /tmp to your directory.         
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], "$UPLOAD_DIR" . $fname);
        //echo "Success!</br >\n";
        //echo "The filename is: " . $fname . "<br />";
    }
       
    $sql = "INSERT INTO runner(fname,mname,lname,address,address2,city,state,zip,phone,email,gender,DOB,medical,explevel,category,image) " . "VALUES('$params[0]','$params[13]','$params[1]','$params[2]','$params[14]','$params[3]','$params[4]','$params[5]','$str','$params[9]','$_POST[gender]',STR_TO_DATE('$str2','%m/%d/%Y'),'$params[15]','$_POST[experience]','$_POST[category]','$fname');";
    //echo ($fname);
    mysqli_query($db, $sql);
    $how_many = mysqli_affected_rows($db);
    //echo ("There were $how_many rows affected");
    close_connector($db);
}

?>   