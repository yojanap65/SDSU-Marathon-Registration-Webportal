<?php
   $UPLOAD_DIR = 'im_ges/';
    $COMPUTER_DIR = '/home/jadrn047/public_html/proj3/im_ges/';
    $fname = $_FILES['file']['name'];
    

    if(file_exists("$UPLOAD_DIR".$fname))  {
        echo "<b>Error, the file $fname already exists on the server</b><br />\n";
        }
    elseif($_FILES['file']['error'] > 0) {
    	$err = $_FILES['file']['error'];	
        echo "Error Code: $err ";
	if($err == 1)
		echo "The file was too big to upload, the limit is 2MB<br />";
        }     
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], "$UPLOAD_DIR".$fname);
        echo "Success!</br >\n";
        echo "The filename is: ".$fname."<br />";
        echo "The type is: ".$_FILES['file']['type']."<br />";
        echo "The size is: ".$_FILES['file']['size']."<br />";
        echo "The tmp filename is: ".$_FILES['file']['tmp_name']."<br />";  
        echo "The basename is: ".basename($fname)."<br />";  
    } 
	 foreach($_POST as $key => $val) {
        echo "Parameter: <b>$key</b> and value: <b>$val</b><br />\n";     
        }
        
?>  
   
    
<?php
    $d = dir($COMPUTER_DIR);
    while($fname = $d->read()) {
        $data[$fname] = stat($fname);
        }
    foreach($data as $fname => $fvalue) {
        if($fname == "." || $fname == "..") {
            ;
            }
        else {
            echo "<img src=\"$UPLOAD_DIR/$fname\""." width='200px' />";
        }
    }    
    ?>
        

</body>
</html>     
    