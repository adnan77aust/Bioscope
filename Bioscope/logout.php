<?php
	session_start();
	//session_destroy();
	$_SESSION['ID']= null;
	header("Location: homePage.php");

?>