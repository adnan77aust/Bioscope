<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="front">
	<br>
	<input type="file" name="back">
	<br>
	<div>
	<textarea name="name" cols="40" rows="4" placeholder="Give the  name here" ></textarea>
	</div>
	<div>
		<textarea name="des" cols="40" rows="4" placeholder="Give the LINK here" ></textarea>
	</div>
	<div>
		<textarea name="text" cols="40" rows="4" placeholder="Give the description here" ></textarea>
	</div>
	<div>
		<textarea name="rating" cols="40" rows="4" placeholder="Give the imdb rating  here" ></textarea>
	</div>
	<div>
		<textarea name="year" cols="40" rows="4" placeholder="Give the release year  here" ></textarea>
	</div>
	



	<input type="submit" name="Go">
	
	</form>
</body>
</html>