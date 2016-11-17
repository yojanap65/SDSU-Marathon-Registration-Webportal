<!DOCTYPE html>
<html>
   <!--Name:                 Yojana Vilas Patil
      Class Account #:        jadrn047
      REDID:                819676514
      Project #3             report.php                                    -->
   <head>
      <meta charset="utf-8">
      <title>SDSU Rock 'n' Roll Marathon 2016 Report</title>
      <link rel="stylesheet" href="style.css">
      
   </head>
   <body>
   <div class= "signup">
            <h1>Runner Registration Report!</h1>
         </div>
      
<?php
include('helpers.php');
$db = get_db_handle();


$sql    = "select lname,fname,image,TIMESTAMPDIFF(YEAR,DOB,CURDATE()) AS AGE,explevel from runner;";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    //echo ("success");
}

?>
<table id="report">
    
        <tr>       
<th>Last Name</th>        
            <th>First Name</th>          
            <th>Image</th> 
<th>Age</th> 
<th>Experience Level</th>             
        </tr>
    
<?php

while ($row = mysqli_fetch_row($result)) {
    
?>
   
    <tr>
    

       <td><?php
    echo ($row[0]);
?></td>
       <td><?php
    echo ($row[1]);
?></td>
<td><?php
    $UPLOAD_DIR   = 'im_ges';
    $COMPUTER_DIR = '/home/jadrn047/public_html/proj3/im_ges/';
    $d            = dir($COMPUTER_DIR . '/');
    while ($fname = $d->read()) {
        $data[$fname] = $fname;
    }
    foreach ($data as $fname => $fvalue) {
        if ($fname == "." || $fname == "..") {
            ;
        } else if ($fname == $row[2]) {
            echo "<img src=\"$UPLOAD_DIR/$fname\"" . " width='100px' />\n";
        }
        
    }
?></td>
    
    <td><?php
    echo ($row[3]);
?></td>
       <td><?php
    echo ($row[4]);
?></td>
   
    
</tr>
<?php
}


?>                         

</table>
</body></html>