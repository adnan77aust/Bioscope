<?php
	session_start();
	$connection = mysqli_connect("localhost","root","","login");
	$sql = "SELECT name FROM movie ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($connection,$sql);
	while($row = mysqli_fetch_array($result)){
	$name = $row['name'];
	}
	//for suggestive part
	$sql = "SELECT * FROM movie WHERE name ='$name'";
	$result = mysqli_query($connection,$sql);
	while($row = mysqli_fetch_array($result)){
		$destination1 = $row['imgNameFront'];
		$destination2 = $row['imgNameBack'];
		$text = $row['description'];
		$link  = $row['title'];
		$name = $row['name'];
		$rate = $row['rating'];
		$preview = 'preview.php?a=$name';
		$_SESSION['movie'] =$name;

	}
	//for featured part
	$sql = "SELECT * FROM movie ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($connection,$sql);
	while($row = mysqli_fetch_array($result)){
		$links = $row['title'];
		$names = $row['name'];
	}
?>
<!DOCTYPE html>
<html>
	<head lang="en-US">
		<title>BIOSCOPE</title>
		<meta name="author" content="Ahmed Shahriar Adnan">
		<meta charset="UTF-8">
		<meta name="description" content="An Informational Website for Movie Lovers">
		<meta name="keywords" content="Movies,Ratings,Recent Release,Trailers">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		
			<div id="pageWrap">
				<div id="logo">
					<a href="homePage.php" style="text-decoration: none"><h1 id="websiteName">BIOSCOPE</h1></a>
					<p style="font-size:80%">Share the movies you love</p>
					<img src="logo.png" alt="BIOSCOPE logo" style="width:200px;height:98px">
				</div><!--logo-->
				<div id="nav">
					<ul>
						<li><a href="whatsNew.php">What's New?</a></li>
						<li class="dropdown"><a href="toprated.php" class="dropBtn">Top Rated</a>

    					</li>
						<li><a href="yourChoice.php">Your Choices</a></li>
						<li class="dropdown"><a href="top10.php" class="dropBtn">Top 10s Hits</a>
						</li>
						<li class="dropdown">
							<?php
									if(isset($_SESSION['ID'])){
										echo "<div class='dropBtn' style='color:#9a9a9a'>";
										echo 'Welcome '.$_SESSION['LAST'];
										echo"</div>";
										echo"<div class='dropdown-content'>";
 										echo "<a href='logout.php' >Log Out</a>";
    									echo"</div>";
									
										}
									else
										{
											echo "<a href='loginForm.php' >Log In</a>";
										}
								?>
						</li>
					</ul>
				</div><!--nav-->
				<div class="clearBoth"></div><!--clearBoth-->
				<!--<div id="searchBox">
					<form>
  						<input type="text" name="search" placeholder="Search..">
					</form>
				</div><!-searchBox-->
				<div id="mainContentBorder">
					<div id="mainContent">
						<div id="featured">
							<iframe width=100% height="345" src="<?php echo "$links" ?>"></iframe>
							<h2 id="featuredTitle">Here Comes <?php echo "$names" ?> <h2>
						</div><!--featured-->
						<div id="insideContent">
							<div id="leftContent">
								<p id="lookingFor">Looking For??</p>
								<ul>
									<li><a href="hollyWoodMovies.php"><span class="menuIcon"><img src="socia2l.png" alt="Icon"></span>Movies</a></li>
									<li><a href="series.php"><span class="menuIcon"><img src="socia2l.png" alt="Icon"></span>TV Series</a></li>
									<li><a href="anime.php"><span class="menuIcon"><img src="socia2l.png" alt="Icon"></span>Anime</a></li>
									<li><a href="animeMovies.php"><span class="menuIcon"><img src="socia2l.png" alt="Icon"></span>Anime Movies</a></li>
									

								</ul>									
							</div><!--leftContent-->
							<div id="rightContent">
								<p id="todaySuggestion">Have You Seen This Movie ?</p>
								<?php
									echo "<img src='$destination1' alt='daily sugge' style='width:550px;height:460px;position:relative;top:10px;left:5px;z-index: 1'>"
								?>
								
									<h2 id='titleOfSuggestion'><a href=<?php echo "preview.php?a=$name" ?> ><?php echo "$name"?></a></h2
								
							</div><!--rightContent-->								
						</div><!--insideContent-->
					</div><!--mainContent-->
				</div><!--mainContentBorder-->

			</div><!--pageWrap-->
			
			<div id="footerContent" style="background-color: black;width:160% ;position: relative;left: -250px">
				<div style="position: relative;top: +30px ;left : +250px;width: 850px;">
				<p >www.bioscope.com Copyrights and trademarks for the contents, and other promotional materials are held by their respective owners and their use is allowed under the fair use clause of the Copyright Law|| All rights reserved</p>
				</div>
			
			</div>
			
		
	</body>
<html>