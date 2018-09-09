<?php
	session_start();
	include 'dbh.php';
	include 'loginForm.php';
   
        if(empty($_POST['fname']))
        {
            $_SESSION['firstName1'] = "Your first name cannot be empty";
            $errors['firstName1'] = "Your first name cannot be empty";
        }
        if(strlen($_POST['fname']) < 2)
        {
            $_SESSION['firstName2'] = "Your first name must be atleast 2 characters long";
             $errors['firstName2'] = "Your first name must be atleast 2 characters long";
        }

        if(empty($_POST['lname']))
        {
            $_SESSION['lastName1'] = "Your last name cannot be empty";
             $errors['lastName1'] = "Your last name cannot be empty";
        }
        if(strlen($_POST['lname']) < 2)
        {
            $_SESSION['lastName2'] = "Last name must be atleast 2 characters long";
            $errors['lastName2'] = "Last name must be atleast 2 characters long";
        }

        if(empty($_POST['uid']))
        {
            $_SESSION['uid1'] = "User ID cannot be empty";
            $errors['uid1'] = "User ID cannot be empty";

        }
        if(strlen($_POST['uid']) < 6)
        {
            $_SESSION['uid2'] = "User ID must be atleat 6 characters long";
            $errors['uid2'] = "User ID must be atleat 6 characters long";
        }

        if(empty($_POST['password']))
        {
            $_SESSION['password1'] = "Password cannot be empty";
            $errors['password1'] = "Password cannot be empty";
        }
        if(strlen($_POST['password']) < 3)
        {
            $_SESSION['password2'] = "Password must be atlest 3 characters long";
            $errors['password2'] = "Password must be atlest 3 characters long";
        }

        if(count($errors) == 0)
        {
     	 $first = $_POST['fname'];
		$last = $_POST["lname"];
		$uid = $_POST["uid"];
		$password = $_POST["password"];
		$conn = mysqli_connect("localhost","root","","login");

		$sql = "INSERT INTO users(FIRST , LAST , UID , PWD) 
		values ('$first','$last','$uid','$password')";
		$result = mysqli_query($conn,$sql);
		$_SESSION['firstName1']=null;
		$_SESSION['firstName2'] = null;
		$_SESSION['lastName1'] = null;
		$_SESSION['lastName'] = null;
		$_SESSION['uid1'] =null;
		$_SESSION['uid2'] = null;
		$_SESSION['password1'] = null;
		$_SESSION['password2'] = null;


		header("Location :loginForm.php");
        }
        else
        {
 		$_POST = null;
       	header("Location: loginForm.php");	
        }




?>