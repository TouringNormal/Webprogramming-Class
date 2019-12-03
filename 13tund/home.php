<?php
	require("../../../config_vp2019.php");
	require("functions_user.php");
	$database = "if19_taavi_ve_1";
	
	//seessioonihaldus
	require("Classes/Session.class.php");
	SessionManager::sessionStart("vp", 0, "/~taavives/", "greeny.cs.tlu.ee");
	
	  //kontrollime, kas on sisse logitud
  if(!isset($_SESSION["userId"])){
	  header("Location: page.php");
	  exit();
  }
  
  //logime välja
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }
  //cookie ehk küpsis
  //nimi, väärtus, aegumisaeg, path ehk kataloogid, domeen, kas https, kas üle http ehk üle veebi 
  setcookie("vpusername", $_SESSION["userFirstname"] .$_SESSION["userLastname"], time() + (86400 * 31), "/-taavives/", "greeny.cs.tlu.ee", isset($_SERVER["HTTPS"]), true);
  if(isset($_COOKIE["vpusername"])){
	  echo "Leiti küpsis" .$_COOKIE["vpusername"];
	} else {
		echo "Küpsist ei leitud";
	}
	//count($_COOKIE)
  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
    
  require("header.php");
	
  echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <hr>
  <br>
  <p><?php echo $userName; ?> | Logi <a href="?logout=1">välja</a>!</p>
  <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
	<li><a href="messages.php">Sõnumid</a></li>
	<li><a href="showfilminfo.php">Filmid</a></li>
	<li><a href="picupload.php">Piltide üleslaadimine</a></li>
	<li><a href="gallery.php">Pildigalerii</a></li>
  </ul>
  
</body>
</html>