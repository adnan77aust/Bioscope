<?php
	session_start();
	include 'dbh.php';
	$uid = $_POST["uid"];
	$password = $_POST["password"];

	$sql = "SELECT * FROM users WHERE UID = '$uid' AND PWD ='$password'" ;
	$result = mysqli_query($conn,$sql);

	if(!$row = mysqli_fetch_assoc($result)){
		echo "Your username and password is incorrect";
	}
	else{
		$_SESSION['ID'] = $row['ID'];
		$_SESSION['LAST'] = $row['LAST'];

	}
	if(isset($_SESSION['ID']))
	{
		header("Location: homePage.php");	
	}
	else
	{
	$_SESSION['login']="Must use valid username or password";
	$_POST = null;
	header("Location: loginForm.php");

	}	

?>