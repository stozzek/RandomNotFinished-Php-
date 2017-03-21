<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="section w3-teal">
<div class="w3-container w3-center">
    <h1>Success</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="index.php"><button class="w3-btn w3-black w3-padding-large w3-hover-teal"/>Home</button></a>
</div>
</section>
</body>
</html>
