<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'db.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
  <title>Reset Your Password</title>
</head>

<body>
<section class="section w3-teal">
<div class="w3-container w3-center">

          <h1>Choose Your New Password</h1>
          
          <form action="reset_password.php" method="post" class="w3-third w3-display-middle">
              
          <div class=>
            <p class="w3-text-black"> Nowe hasło</p>
            <input type="password" required name="newpassword" autocomplete="off" placeholder="Wpisz nowe hasło" class="w3-input w3-border"/>
          </div>
              
          <div class=>
            <<p class="w3-text-black"> Potwierdź nowe hasło</p>
            <input type="password"required name="confirmpassword" placeholder="Powtórz hasło" autocomplete="off" class="w3-input w3-border"/>
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash"  value="<?= $hash ?>">    
              <br>
          <button class="w3-btn w3-black w3-padding-large w3-hover-teal"/>Reset</button>
          
          </form>
</div>
</section>
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script> -->

</body>
</html>
