<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>logout</title>
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<section class="section w3-teal">
<div class="w3-container w3-center">
          <h1>Thanks for stopping by</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
         
          <a href="index.php"><button class="w3-btn w3-black w3-padding-large w3-hover-teal"/>Home</button></a>
</div>
</section>
</body>
</html>
