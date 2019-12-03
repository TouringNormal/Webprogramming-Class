<?php
  require("../../../config_vp2019.php");
  require("functions_main.php");
  $database = "if19_taavi_ve_1";
  
  //sessioonihaldus
  require("classes/Session.class.php");
  SessionManager::sessionStart("vp", 0, "/~taavives/", "greeny.cs.tlu.ee");
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userId"])){
	  header("Location: page.php");
	  exit();
  }
  
  //väljalogimine
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
  }

  
  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];