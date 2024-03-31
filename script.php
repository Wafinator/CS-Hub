<?php 

use PHPMailer\PHPMailer\PHPMailer;
 
/*
   We have to require the config.php file to use our 
   Gmail account login details.
*/
require 'config.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
function sendMail($email, $subject, $message){
   // Creating a new PHPMailer object.
   $mail = new PHPMailer(true);
 

 
   // Using the SMTP protocol to send the email.
   $mail->isSMTP();
 
   /* 
      Setting the SMTPAuth property to true, so we can use 
      our Gmail login details to send the mail.
   */	
   $mail->SMTPAuth = true;
 
   /*  
      Setting the Host property to the MAILHOST value 
      that we define in the config file.
   */	
   $mail->Host = MAILHOST;
 
   /*  Setting the Username property to the USERNAME value 
      that we define in the config file.
   */	
   $mail->Username = USERNAME;
 
   /*
      Setting the Password property to the PASSWORD value 
      that we define in the config file.
   */	
   $mail->Password = PASSWORD;
    
   /*
      By setting SMTPSecure to PHPMailer::ENCRYPTION_STARTTLS, 
      we are telling PHPMailer to use the STARTTLS encryption 
      method when connecting to the SMTP server. 
   */
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
   // TCP port to connect with the Gmail SMTP server.
   $mail->Port = 587;
 
   /*
      Who is sending the email.
    */
   $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
 
   /*
      Where the mail goes. 
    */
   $mail->addAddress($email);
 
   /*
      The 'addReplyTo' specifies where the 
      recipient can reply to.
    */
   $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
 
   /*
      By setting $mail->IsHTML(true) tells PHPMailer that 
      the email message	I construct will include 
      HTML markup. 
    */
   $mail->IsHTML(true);
 
   /*
      Assigning the incoming subject 
      $mail->subject property. 	
    */
   $mail->Subject = $subject;
 
   /*
      Assigning the incoming message to the $mail->body property.
    */
   $mail->Body = $message;
 
   /*
      When we set $mail->AltBody, we are providing 
      a plain text alternative to the HTML version of our email. 
    */
   $mail->AltBody = $message;
   
   /*
      Send the email
      If something goes wrong the function will return an error,
    */
   if(!$mail->send()){
      return "Email not send. Please try again";
   }else{
      return "success";
   }
}