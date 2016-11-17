<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <!--Name: 				Yojana Vilas Patil
      Class Account #:		jadrn047
      REDID:				819676514
      Project #3 			confirmation.php									-->
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Registration confirmed</title>
<link rel="stylesheet" type="text/css" href="style.css" />   

</head>

<body>
<div class= "signup">
            <h1>Registration confirmed!</h1>
         </div>
<?php
echo <<<ENDBLOCK

      
  <h2>$params[0], Thank you for registering.</h2>
    <table id="confirmation">
        <tr>
            <td>Address</td>
            <td>$params[2] $params[14]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[4]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[5]</td>
        </tr>
		<tr>
            <td>Phone</td>
            <td>($params[6])$params[7]-$params[8] </td>
        </tr>
        <tr>
            <td>Email ID</td>
            <td>$params[9]</td>
        </tr>  
		<tr>
            <td>DOB</td>
            <td>$params[10]/ $params[11]/ $params[12] </td>
        </tr>		
		<tr>
            <td>Gender</td>
            <td>$_POST[gender]</td>
        </tr> 
		<tr>
            <td>Medical Condition</td>
            <td>$params[15]</td>
        </tr> 
		<tr>
            <td>Experience Level</td>
            <td>$_POST[experience]</td>
        </tr> 	
		
		<tr>
            <td>Category</td>
            <td>$_POST[category]</td>
        </tr> 
		
    </table>                                
ENDBLOCK;


?>
</body></html>