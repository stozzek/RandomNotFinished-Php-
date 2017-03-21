<?php 
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!  

        Please click this link to reset your password:

        http://localhost/aplikacja/main/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="section w3-teal">
  <div class="w3-container w3-center ">
  
    <h1>Reset Your Password</h1>
    <form action="forgot.php" method="post" class="w3-third w3-display-middle" >
        <p class="w3-text-black"> Enter your email adress</p>
      <input  class="w3-input w3-border " type="email" required autocomplete="off" name="email" placeholder="Twój Email" />

    <br>
    <button class="w3-btn w3-black w3-padding-large w3-hover-teal"/>Reset</button>
    </form>
    </div>

</section> 
          
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script> -->
</body>

</html>
