<?php
	session_start();
	$connection = mysqli_connect("localhost","root","","login");
	$movie = $_GET['a'];
	
	if(isset($_SESSION['movie']))
	{
		$movie = $_SESSION['movie'];
	}
	$sql = "SELECT * FROM movie WHERE name = '$movie' ";
	$result = mysqli_query($connection,$sql);
	while($row = mysqli_fetch_array($result)){
		$destination1 = $row['imgNameFront'];
		$destination2 = $row['imgNameBack'];
		$text = $row['description'];
		$link  = $row['title'];
		$name = $row['name'];
		$rate = $row['rating'];
		$userRating = $row['userRating'];
		$hits = $row['userHits'];
	}
	$average = $userRating / $hits;
	//rating try
	if(isset($_POST['quantity']))
	{		
		$_SESSION['vallue'] = $_POST['quantity'];



	}
	if (isset($_SESSION['vallue'])) {
		$sql = "SELECT * FROM movie WHERE name = '$movie' ";
		$connection = mysqli_connect("localhost","root","","login");
		$result = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($result)){

		$rate = $row['rating'];
		$userRating = $row['userRating'];
		$hits = $row['userHits'];
		}
		$scream = (int)$_POST['quantity'];
		$userRating = $userRating + $scream ;
		$hits = $hits+1;
		$sql = "UPDATE  movie SET userRating = $userRating, userHits = $hits WHERE  name = '$movie' ";
		mysqli_query($connection,$sql);
		var_dump($_POST);
		$hits =null;;
		$_SESSION['vallue'] = null;
	}

?>
<!DOCTYPE html>
<html>
	<head>
			<title></title>
			<meta name="author" content="Ahmed Shahriar Adnan & Biozid Niloy">
			<meta charset="UTF-8">
			<meta name="description" content="Preview">
			<meta name="keywords" content="Movies,Ratings,Recent Release,Trailers">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="forPreview.css">

	</head>
<body>
		<div id="pageWrap">
			<div id="header">
				<div id="logo">
					<a href="homePage.php" style="text-decoration: none"><h1 id="websiteName">BIOSCOPE</h1></a>
					<p style="font-size:80%;position: relative;left:-30px;top: -30px">Share the movies you love</p>
					<img src="logo.png" alt="BIOSCOPE logo" style="width:200px;height:98px;position: relative;top: -30px;left: -50px">
				</div><!--logo-->
				<div id="nav">
					<ul>
						<li><a href="whatsNew.php">What's New?</a></li>
						<li class="dropdown"><a href="toprated.php" class="dropBtn">Top Rated</a>
    					</li>
						<li><a href="yourChoice.php">Your Choices</a></li>
						<li class="dropdown"><a href="top10.php" class="dropBtn">Top 10 Hits</a>
						</li>
						<li><a href="homePage.php">Go Back</a></li>
					</ul>
				</div><!--nav-->
				<div class="clearBoth"></div><!--clearBoth-->
			</div><!--header-->
	    </div><!--pageWrap-->
		<div id=center>
			<div id="centerLeft">
				<?php
					echo "<img src='$destination1' alt='BIOSCOPE logo' style='width:450px;height:600px'>"
				?>
			</div><!--centerLeft-->
			<div id="centerRight">
				<div class="background">
					<?php
						echo "<img src='$destination2' alt='BIOSCOPE logo' style='width:900px;height:600px;z-index: -1;position:absolute;'>"
					?>
  					<div class="transbox">
    					<div id="movieTitle">
    						<?php
								echo "<h1>$name</h1>"
							?>
						</div><!--movieTitle-->
						<div id="movieDes">
							<?php
								echo"<h3 style='margin-left:30px;'>".$text."</h3>"
							?>
						</div><!--movieDes-->
						<div id="others">
							<div id="othersLeft">
								<?php

									if(isset($_SESSION['ID']))
									{
									echo "<form action='' style='position: relative;top:-120px' method='POST'>
  							 				Your Rating:
  											<input type='number' name='quantity'
  						 					min='0' max='10' step='1' value='0'>
  											<input type='submit' class='button' style='position: relative;left: 15px;top: -4px;background-color:black;
  											hover{background-color:#6666ff'>
											</form>";
									}
								?>

								<div>
								<?php
										echo "<h1 style='position: relative; top: -120px;left:-25px;'>IMDB Rating<br> ".$rate."</h1>";
								?>
								</div>
								<div>
								<?php
                                       if(isset($_SESSION['ID']))
                                       {
										echo "<h1 style='position: relative; top: -225px;left:+180px;'>Bioscope Rating<br> ".number_format((float)$average, 2, '.', '')."</h1>";
									}
								?>
								</div>
							</div><!--othersLeft-->
							<div id="othersRight">
								<?php
								 echo "<a href=$link target='_blank' class='button'>Watch Trailer</a>"
								?>
							</div><!--othersRight-->
						</div><!--others-->
  					</div><!--tranbox-->
				</div><!--background-->
			</div><!--centerRight-->
		</div><!--center-->
		<div id="footerWrap">
				<div id="footerContent">
					<p style="position: relative;top: +30px;color:#9a9a9a;font-family: "Comic Sans Ms"; ">www.bioscope.com Copyrights and trademarks for the contents, and other promotional materials are held by their respective owners and their use is allowed under the fair use clause of the Copyright Law|| All rights reserved</p>
					<!--<div id="footerLeft">
						

					</div><!-footerLeft->
					<div id="footerRight">
						 

	

						<br>
						
					</div><!-footerRight->-->
				</div><!--footerContent-->
		</div><!--footerWrap-->
</body>
</html>