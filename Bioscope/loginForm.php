<?php
	
	$errors = array();
	if(!isset($_SESSION))
	{
  	session_start();
  }
?>
<!DOCTYPE html>
<html>
	<head lang="en-US">
		<title>BIOSCOPE Login</title>
		<meta name="author" content="Ahmed Shahriar Adnan">
		<meta charset="UTF-8">
		<meta name="description" content="Login Page for BIOSCOPE Users">
		<meta name="keywords" content="BIOSCOPE,Login,Creat,Account">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="mystyle2.css">
	</head>
</html>
	<body>
			<div id ="signup">	
					<form action="<?php if(count($errors) == 0) echo 'form.php' ?>" method="post">
							<h1 style="font-family:'Comic Sans Ms' ">Create Account</h1>
							<label for="fname">First Name</label>
							<input type="text" id="fname" name="fname" placeholder="<?php 
            				if(isset($_SESSION['firstName1'])) echo $_SESSION['firstName1'];
            				else if(isset($_SESSION['firstName2'])) echo $_SESSION['firstName2'];
            				?>">
							
							<label for="lname">Last Name</label>
							<input type="text" id="lname" name="lname" placeholder="<?php 
            				if(isset($_SESSION['lastName1'])) echo $_SESSION['lastName1'];
            				else if(isset($_SESSION['lastName2'])) echo $_SESSION['lastName2'];
            				?>">
							
							<label for="uid">User ID</label>
							<input type="text" id="uid" name="uid" placeholder="<?php 
            				if(isset($_SESSION['uid1'])) echo $_SESSION['uid1'];
            				else if(isset($_SESSION['uid2'])) echo $_SESSION['uid2'];
            				?>">
							
							<label for="password">Password</label>
							<input type="password" id="password" name="password" placeholder="<?php 
            				if(isset($_SESSION['password1'])) echo $_SESSION['password1'];
            				else if(isset($_SESSION['password2'])) echo $_SESSION['password2'];
            				?>">
							
							<input type="submit" value="Signup" style="font-family:'Comic Sans Ms'">


							
					</form>
			</div>

			<div id ="logIn">	
					<form action="login.php" method="post">
							<h1 style="font-family:'Comic Sans Ms' ">Login</h1>
							
							<label for="uid">User ID</label>
							<input type="text" id="uid" name="uid" placeholder="<?php 
            				if(isset($_SESSION['login'])) echo $_SESSION['login'];?>">
							
							<label for="password">Password</label>
							<input type="password" id="password" name="password" placeholder="<?php 
            				if(isset($_SESSION['login'])) echo $_SESSION['login'];?>">
							
							<input type="submit" value="Login" style="font-family:'Comic Sans Ms'">
							
					</form>
			</div>
			</div>

		
		
		
    </body>
</html>