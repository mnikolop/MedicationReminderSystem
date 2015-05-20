<!DOCTYPE html>




<html lang="en">
<head>
	<title> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- defining responsivnes in mobile devices -->
	<meta name="author" content="Markella Nikolopoulou-Themeli"><!-- defining the author of the docoument -->
	<meta charset="utf-8"><!-- defining the character set for encoding -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet"> <!-- styling link -->
</head>  
<body >
	<div class="container-fluid" id="index"> 
	</div>
	<div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
		<h1>Markella Nikolopoulou-Themeli
			<small>Thesis progect</small>
		</h1>
	</div>

	<div class="container-fluid" >
		<div class="col-md-1"></div>
		<div class="col-md-5" id="index-img">
			<img src="img/1590169_700b.jpg">
		</div>
		<div class="col-md-5" id="index-login">
			<?php
				include 'login.php';
			?>
			<br>
			<p>Do you have an acount? If not <a href="register.php">Sign Up</a></p>
		</div>
	</div>
	<div>
		<?php include ('footer.php') ?>
	</div>
</div>


</body>
</html>






<!-- fixes
	- make login
	- commentery
-->
