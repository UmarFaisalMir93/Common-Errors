<?php
if (isset($_REQUEST['first_name'],$_REQUEST['last_name'],$_REQUEST['email'],$_REQUEST['message'])) {
     
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
     
	// Set your email address where you want to receive emails. 
    $to = 'YOUR EMAIL ADDRESS';
     
    $subject = 'EMAIL SUBJECT';
    $headers = "From: WHO IS SENDING THE EMAIL <".$email."> \r\n";
    // Set content-type header for sending HTML email 
    //$headers = "MIME-Version: 1.0" . "\r\n"; 
    //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    
    $email_message .= "Message: ".clean_string($message)."\n";
     
    $send_email = mail($to,$subject,$email_message,$headers);
     
	echo ($send_email) ? 'success' : 'error';
     
}
?>
