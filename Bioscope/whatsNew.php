<?php
	session_start();
	$_SESSION['movie'] = null;
	$connection = mysqli_connect("localhost","root","","login");
	$sql = "SELECT * FROM movie  ORDER BY year DESC";
	$result = mysqli_query($connection,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>What's New</title>
	<meta charset="UTF-8">
	<meta name="description" content="Hollywood Movies">
	<meta name="keywords" content="Movies,Ratings,Recent Release,Trailers">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="forHollywoodMovies.css">

</head>
<body>
			<div id="pageWrap">
				<div id="logo">
					<a href="homePage.php" style="text-decoration: none"><h1 id="websiteName">BIOSCOPE</h1></a>
					<p style="font-size:80%">Share the movies you love</p>
					<div style="position: relative;">

						<?php
							if(isset($_SESSION['ID'])){
						}	
						?>

					 </div>
					<img src="logo.png" alt="BIOSCOPE logo" style="width:200px;height:98px">
				</div><!--logo-->
				<div id="nav">
					<ul>
						<li><a href="whatsNew.php">What's New?</a></li>
						<li class="dropdown"><a href="toprated.php" class="dropBtn">Top Rated</a>
    					</li>
						<li><a href="yourChoice.php">Your Choices</a></li>
						<li class="dropdown"><a href="top10.php" class="dropBtn">Top 10 Hits</a>
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
				<div id="mainContentBorder">
					<div id="mainContent">
						<div id="movieList">
							<table>
  								<tr>
    								<th>Name</th>
 								</tr>
  								<?php
  									while($row = mysqli_fetch_array($result))
  									{
  												$name = $row['name'];
												$rate = $row['rating'];
												$userRating = $row['userRating'];
												$hits = $row['userHits'];
												echo "<tr>";
												echo "<td>".$name."</td>";
												echo "<td> ".$rate."</td>";
												echo "</tr>";

  									}
  								?>
    								

							</table>
						</div><!--movieList-->
					</div><!--mainContent-->
				</div><!--mainContentBorder-->
			</div><!--pageWrap-->
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