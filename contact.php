<?php require("script.php"); ?>
<?php 
   if(isset($_POST['submit'])){
      if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])){
         $response = "All fields are required";
      }else{
         $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles5.css">
</head>
<body>
    <h2>Contact Us</h2>
    <form action="" method="post" enctype="multipart/form-data">

 
   <label>Enter your email</label>
   <input type="email" name="email" value="">
   
   <label>Enter a subject</label>
   <input type="text" name="subject" value="">
 
   <label>Enter your message</label>
   <textarea name="message"></textarea>
 
   <button type="submit" name="submit">Submit</button>

   <?php
      if(@$response == "success"){
         ?>
            <p class="success">Email send successfully</p>
         <?php
      }else{
         ?>
            <p class="error"><?php echo @$response; ?></p>
         <?php
      }
   ?>
</form>
<script src="formValidation.js"></script>
</body>
</html>	
