/*  Form processing with AJAX.  The file upload function is done with
    jQuery.  The form data other than the image is handled manually.
    Alan Riggins
    CS545 Fall 2016
*/    

    $(document).ready(function()  {
        $('#submit_button').bind('click', function() {
            processUpload();
            }
        );});

    function processUpload() {
        send_file();    // picture upload takes longer, get it going
        send_form_data();
        }
        
    function send_form_data() {
               
        var url = "ajax_echo.php";
        
        var req = new HttpRequest(url, handleData);
        req.send();
        }
        
    function handleData(response) {
               $('#status').css('color','blue');
               $('#answer').html(response);    
               }
        
    function send_file() {    
        var form_data = new FormData($('form')[0]);       
        form_data.append("image", document.getElementById("picture").files[0]);
        $.ajax( {
            url: "ajax_file_upload.php",
            type: "post",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
               $('#status').css('color','blue');
               $('#status').html("Your file has been received.");
               var fname = $("#picture").val();
			   
               var toDisplay = "<img src=\"/~jadrn047/public_html/proj3/" + fname + "\" />";               
               $('#pic').html(toDisplay);
                },
            error: function(response) {
               $('#status').css('color','red');
               $('#status').html("Sorry, an upload error occurred, "+response.statusText);
                }
            });
        }