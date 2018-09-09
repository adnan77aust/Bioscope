<?php
	$connection = mysqli_connect("localhost","root","","login");


	$text = $_POST['text'];
	$des  = $_POST['des'];
	$name = $_POST['name'];
	$name1 = $_FILES['front']['name'];
	$filename1= $_FILES['front']['tmp_name'];
	$name2 = $_FILES['back']['name'];
	$filename2= $_FILES['back']['tmp_name'];
	$destination1 = "images/".$_FILES['front']['name'];
	$destination2= "images/".$_FILES['back']['name'];
	$rating = $_POST['rating']; 
	$year = $_POST['year']; 
	move_uploaded_file($filename1, $destination1);
	move_uploaded_file($filename2, $destination2);
	$hits = 1;
	$sql = "INSERT INTO series (name ,title ,description,imgNameFront,imgNameBack,rating,userHits,year) 
	values('$name','$des','$text','$destination1','$destination2','$rating','$hits','$year')";
	mysqli_query($connection,$sql);
	echo "inserted";
	
	
	


?>