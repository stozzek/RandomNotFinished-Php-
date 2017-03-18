<!-- Sign up i login -->

<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>


<!-- KONTAKT FORMULARZ -->

<?php 
// Sprawdzanie Submitu
$msg ='';
$msgClass=''; 
 // BEDZIE DZIALAC GDY BEDZIEMY POSIADAC SERVER EMAIL W SERWISIE HOSTINGOWYM
if(filter_has_var(INPUT_POST, 'submit')) {
	//bierzemy z daty
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

		//sprawdzamy czy wypelnione i nie puste
		if (!empty($email) && !empty($name)	&& !empty($message)) {
			//udalo sie 
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$msg ='Prosze użyć właściwego emaila';
				$msgClass ='alert-danger';   // alert-danger jest klasą alertu w bootstrapie 
 			} else {
				// to jest email
				// wysyłanie na maila 

				 $toEmail = 'stozzek@gmail.com';
				 $subject = 'Wiadomość od ' .$name;
				 $body = "<h2>Wiadomość od </h2>
				 <h4>Wiadomość od </h4> <p>'.$name' </p>
				 <h4>Wiadomość od </h4> <p>'.$email' </p>
				 <h4>Wiadomość od </h4> <p>'.$message'</p>";

				 //Email headers 
				 $headers = "MIME_Version: 1.0" ."\r\n";
				 // .= dodaje do zmiennej headers , NIE NADPISUJE
				 $headers .="Content-Type:text/html;charset=utf-8 " . "\r\n";
				 // Od kogo
				 $headers.= "From: " .$name. "<".$email.">". "\r\n";

				 if (mail($toEmail, $subject, $body, $headers)) {
				 		//Wysłanie emaila
				 	$msg = 'Twoja wiadomość została wysłana';
				 	$msgClass ="alert-succes";
				 } else
				 	$msg ='Twoja wiadomość nie została wysłana';
					$msgClass ='alert-danger';
			}
			//email check
		} else {
			// nie udalo sie wyslac wiadomosci
			$msg ='Prosze wypelnić cały formularz';
			$msgClass ='alert-danger';
		}
}


 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>main</title>



<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" ref="https://bootswatch.com/cosmo/bootstrap.min.css"> <!-- do alertów (zielonych, pozytywnych)-->

</head>





<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>



<body>

<!-- Navigacja -->
<div class="w3-top">
<div class="w3-bar w3-black ">
	<span class="branding w3-bar-item w3-mobile">Medical Art</span>
	<span class="w3-right w3-mobile">
	  <a href="#" class="w3-bar-item w3-button w3-hover-blue w3-mobile">Home</a>
	  <a href="#about" class="w3-bar-item w3-button w3-hover-blue w3-mobile">About</a>
	  <a href="#usługi" class="w3-bar-item w3-button w3-hover-blue w3-mobile">Usługi</a>
	  <a href="#kontakt" class="w3-bar-item w3-button w3-hover-blue w3-mobile">Kontakt</a>
	  <a onclick="document.getElementById('login-modal').style.display='block'" class="w3-bar-item w3-button w3-hover-blue w3-mobile">Logowanie</a>
	  <a onclick="document.getElementById('start-modal').style.display='block'" class="w3-bar-item w3-button w3-hover-blue w3-mobile">Zarejerstruj się</a>
    </span>
</div>
</div>

<!-- Głowna --> 

<section class = "zdjecie1">
	<div class = "w3-container w3-center">
		<h1  class = "wdech w3-animate-opacity">
			Odetchnij z nami	
		</h1>
		<hr>
		<p> Aplikacja, która umożliwi Ci umówić się na wizytę w mniej niż 5 min. Niewiedza jest najgorszą chorobą. Dowiedz się na co jesteś uczulony, kiedy rozpoczyna się sezon pylenia i jak poradzić sobie z uciążliwym katarem alergicznym. Wa idsifohoidf odsifoidspqwe oqwpeoqwiep ouigiug uiewg iusdfs dfkjbjkbkjcv kjkbjbsd fuh wieuhriuh wieuhi </p>
		<button onclick="document.getElementById('start-modal').style.display='block'" class ="but w3-button w3-black w3-large w3-opacity w3-hover-blue ">Zaufaj nam <i class="icobut fa fa-user-md"></i></button>

	</div>
</section>


<!-- Druga Sekcja --> 

<section class="section w3-hover-opacity w3-blue">
	<div class="w3-container w3-center">
		<i class="fa fa-heartbeat"></i>
		<h2>Medical Stuff</h2>
		<p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
	</div>
</section>

<!-- Trzecia sekcja  -->
<section class="section w3-center w3-light-grey">
	<div class="w3-container ">
		<i class="fa fa-heartbeat"></i>
		<h2>Best possible way</h2>
		<p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
	</div>

</section>


<!-- O nas -->
<section id="about" class="section">
	<div class="w3-container">
		<div class="w3-row-padding">
			<div class="w3-col m5">
				<img src="img/zdj1.jpg">
			</div>
			<div class="w3-col m7">
				<button onclick="myFunction('co')" class="w3-button w3-block w3-left-align  w3-blue">
Czym się zajmujemy</button>

<div id="co" class="w3-container w3-show">
<h3>Wszystkim i niczym</h3>
  <p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
</div>

<button onclick="myFunction('kto')" class="w3-button w3-block w3-left-align  w3-blue">
Kim jesteśmy</button>
<div id="kto" class="w3-container w3-hide">
<h3>Kim byśmy nie byli</h3>
  <p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
</div>

<button onclick="myFunction('gdzie')" class="w3-button w3-block w3-left-align  w3-blue">
Lokalizacja  </button>

<div id="gdzie" class="w3-container w3-hide">
<h3>JJestesmy tu i tam</h3>
  <p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f
  Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
</div>


			</div>
		</div>
	</div>
</section>

<!-- Usługi  -->

<!--nagłówek usług -->
<section id="usługi" class="section w3-hover-opacity w3-blue">
	<div class="w3-container w3-center">
		<h1 class="w3-text-shadow">Medyczne usługi</h1>
		<p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
	</div>
</section>
	

<!-- faktyczne usługi -->

<section class="section w3-light-grey">
	<div class="w3-container w3-center ">
		<div class="w3-col m3">
			<i class="icobut fa fa-stethoscope w3-blue w3-padding-small w3-round-xxlarge"></i>
			<h3>Alergologia</h3>
			<p>bla bla bla </p>
		</div>
		<div class="w3-col m3">
			<i class="icobut 	fa fa-hospital-o w3-blue w3-padding-small w3-round-xxlarge"></i>
			<h3>Zapis</h3>
			<p>bla bla bla</p>
		</div>
		<div class="w3-col m3">
			<i class="icobut hideme	fa fa-medkit w3-blue w3-padding-small w3-round-xxlarge"></i>
			<h3>Zabiegi</h3>
			<p>bla bla bla</p>
		</div>
		<div class="w3-col m3">
			<i class="icobut fa fa-user-md w3-blue w3-padding-small w3-round-xxlarge"></i>
			<h3>Profesionalizm</h3>
			<p>bla bla bla </p>
		</div>

		
	</div>

</section>


<!-- Kontakt --> 
<!-- Nagłówek -->
<section id="kontakt" class="section ">
	<div class="w3-container w3-center ">
		<h1>Skontaktuj się z nami</h1>
		<p>Talking talking talking talking talking talking talking talking talkign talkgint al tkaefb euif biu fbdsjk f</p>
	</div>

<!-- faktyczny kontakt -->

<section class="section">
	<div class="w3-container">
		
<div class="w3-card-4">

<div class="w3-container w3-blue">
  <h2>Kontakt</h2>
</div>

<!-- informacja o poprawnym i niepoprawnym wypełnieniu formularza -->
<?php if ($msg != ''):  ?>
<div class="w3-panel w3-red w3-display-container <<?php echo $msgClass; ?>" >
 <h4><?php echo $msg; ?></h4>
              <!-- 2 linie kodu dla X zamykającego Div, alert-->
<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>

 </div>
<?php endif; ?>


<!-- formularz -->
<form class="w3-container w3-card-4 " method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<br>
<label class="w3-label w3-text-black text">Imie</label>
<input class="w3-input w3-border" type="text" name="name" value="
 <?php echo isset($_POST['name']) ? $name : ''; ?>">
<br>
<label class="w3-label w3-text-black text ">Email</label>
<input class="w3-input w3-border" type="text" name="email" value="
 <?php echo isset($_POST['email']) ? $email : ''; ?>">
<br>
<label class="w3-input" >Message</label>
<textarea class="w3-input w3-border" name="message"><?php echo isset($_POST['name']) ? $name : ''; ?></textarea>
<button type="submit" name="submit" class="w3-button w3-black w3-hover-blue">Submit</button>
<br><br>

</form>

</div>

	</div>
</section>


<!-- Footer --> 

<footer class="w3-black w3-padding-xlarge w3-center ">
	<p>Usługi medyczne Medcostam &copy; 2017</p>
</footer>


<!-- Modal code rejerstracja-->
<
<div id="start-modal" class="w3-modal">
	<div class="w3-modal-content">
		<header class="w3-container w3-blue">
			<span class="w3-closebtn" onclick="document.getElementById('start-modal').style.display='none'">&times;</span>
		

		<h2>Zacznij już dziś</h2>
</header>
		<div class="w3-container">
			<form action="index.php" method="post" autocomplete="off">
				<div class="w3-section">
					<label>Imie</label>
					<input placeholder="Twoje imie" class="w3-input w3-border w3-margin-bottom" type="text" required autocomplete="off" name='firstname' />
					<label>Nazwisko</label>
					<input placeholder="Twoje nazwisko" class="w3-input w3-border w3-margin-bottom" type="text" required autocomplete="off" name='lastname' />
					<label>Email</label>
					<input placeholder="Twój Email" class="w3-input w3-border w3-margin-bottom" type="email" required autocomplete="off" name='email' />
					<label>Hasło</label>
					<input placeholder="Hasło" class="w3-input w3-border w3-margin-bottom" type="password" required autocomplete="off" name='password' />
					<!--<label>Powtórz Hasło</label>
					<input type="password" placeholder="Powtórz Hasło" name="" class="w3-input w3-border w3-margin-bottom"> -->


					<button href="#kontakt" class="w3-black w3-btn-block w3-section w3-padding w3-hover-blue" type="submit" name="register">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Moral code login -->

<
<div id="login-modal" class="w3-modal">
	<div class="w3-modal-content">
		<header class="w3-container w3-blue">
			<span class="w3-closebtn" onclick="document.getElementById('login-modal').style.display='none'">&times;</span>
		

		<h2>Zaloguj się</h2>
</header>
		<div class="w3-container">
			<form aaction="index.php" method="post" autocomplete="off>
				<div class="w3-section">
					<label>Email</label>
					<input placeholder="Twój Email" name="email" class="w3-input w3-border w3-margin-bottom" type="email" required autocomplete="off" name="email">
					<label>Hasło</label>
					<input placeholder="Hasło" class="w3-input w3-border w3-margin-bottom" type="password" required autocomplete="off" name="password">
					<p class="forgot"><a href="forgot.php">Zapomniałeś hasła?</a></p>
					<button class="w3-black w3-btn-block w3-section w3-padding w3-hover-blue" name="login">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- kod do rozwijanego menu js --> 
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>




</script>
</body>
</html>