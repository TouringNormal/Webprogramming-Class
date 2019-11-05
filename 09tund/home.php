<?php
	require("../../../config_vp2019.php");
	require("functions_user.php");
	$database = "if19_taavi_ve_1";
	
	//kontrollime, kas on sisse logitud
	if(!isset($_SESSION["userId"])){
		header("Location: testpage.php");
		exit ();
	}
	
	//logime välja
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: testpage.php");
		exit();
	}
	$userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
	
	require("header.php");
	//echo "<hl>" .'$username' .',veebiprogrammeerimine</hl>';
	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>Minu kirjeldus</label><br>
	  <textarea rows="10" cols="80" name="description"><?php ?></textarea>
	  <br>
	  <label>Minu valitud taustavärv: </label><input name="bgcolor" type="color" value="<?php echo $mybgcolor; ?>"><br>
	  <label>Minu valitud tekstivärv: </label><input name="txtcolor" type="color" value="<?php echo $mytxtcolor; ?>"><br>
	  <input name="submitProfile" type="submit" value="Salvesta profiil">
	</form>
	<p> See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
	<hr>
	<br>
	<p><?php echo $userName; ?> | Logi <a href="?logout=1">välja</a>!</p>
	<ul>
		<li><a href="userprofile.php">Kasutajaprofiil</a></li>
		<li><a href="messages.php">Sõnumid</a></li>
	</body>
	</html>