<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>
<head>

  <title>Welcome <?= $first_name.' '.$last_name ?></title>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rale way">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>


</head>

<body class="w3-light-grey">




  
  <!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4   ">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> Menu </button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; " id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/img_avatar3.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Witaj, <strong><?php echo $first_name.' '.$last_name; ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>  
  <div class="w3-container w3-teal">
    <h4>Dashboard</h34>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'overwiev')"><i class="fa fa-home fa-fw")"></i>  Overview</a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'zapis')"><i class=" fa fa-hospital-o"></i> Zapis na wizytę </a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'profil')"><i class="fa fa-user fa-fw"></i>  Profil</a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'opcje')" ><i class="fa fa-wrench "></i> Opcje</a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'kontakt')"><i class="fa fa-envelope"></i> Kontakt</a>
    <a class="w3-bar-item w3-button w3-padding tablink" onclick="openLink(event, 'przeglądaj')"><i class="fa fa-eye fa-fw"></i>  Przeglądaj</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding tablink" name="logout"><i class=" fa fa-sign-out" ></i>  Log out</a>
    
  </div>
</nav>    


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

<!-- OVERWIEV -->
<div id="overwiev" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;">
<h1>Welcome</h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
            
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
</div>
<!-- Zapis na wizytę -->
<div id="zapis" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;display:none">
  <h1> TO JEST ZAPIS </h1>
</div>

<div id="profil" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;display:none">
  <h1> TO JEST Profil </h1>
</div>

<div id="opcje" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;display:none">
  <h1> TO JEST Opcje </h1>
</div>

<div id="kontakt" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;display:none">
  <h1> TO JEST Kontakt </h1>
</div>

<div id="przeglądaj" class="w3-main tabs w3-animate-left" style="margin-left:300px;margin-top:43px;display:none">
  <h1> TO JEST Przeglądaj </h1>
</div>


<script>
function openLink(evt, animName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tabs");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-blue", "");
  }
  document.getElementById(animName).style.display = "block";
  evt.currentTarget.className += " w3-blue";
}
</script>

<!--

<script src="js/general.js"></script>

-->











<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");


// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
