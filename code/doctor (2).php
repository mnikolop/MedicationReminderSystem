<!DOCTYPE html>
<html lang="en">
<?php include('db_conection.php') ?>
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
<body>
	<div class="container-fluid" id="doctor"> 

		<div class="page-header">
			<h1><?php echo "<h1>Welcome Dr ".$_SESSION['name']."</h1>"; ?> </h1>
		</div>

		<div class="container-fluid">
			
			<ul id="sidebar" class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#active" role="tab" data-toggle="tab">Active Perscriptions</a></li>
				<li class=""><a href="#dose" role="tab" data-toggle="tab">Administer a Perscription</a></li>
				<li class=""><a href="#signup" role="tab" data-toggle="tab">Register a Patient</a></li>
				<li class=""><a href="#therapy" role="tab" data-toggle="tab">Add a Therapy in the List</a></li>
				<li class=""><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
			</ul>
			

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="active">
					
				<p>All the perscriptions by $SESSION doctor and the cosresponding patient will be listed here</p>
				<img src="img/120687.strip.jpg">
			</div>
			<div class="tab-pane fade" id="dose">

				<p>The $SESION doctoer will be able to perscribe a therapy to one of HIS patients</p>
				<img src="img/42809.strip.jpg">
			</div>
			<div class="tab-pane fade" id="signup">
				<p>The $SESSION doctor will be able to register a patient. The register patient will be "marked" as HIS patient</p> 
				<img src="img/145773.strip.jpg">
			</div>
			<div class="tab-pane fade" id="therapy">
				<p>The doctor will be able to put a therapy in the db. It is wet to be desides weather the therapy will be accesible by all the other doctors</p>  
				<img src="img/154045.strip.sunday.jpg">
			</div>
			<div class="tab-pane fade" id="profile">
				<p>The full profile of the user will be presented. The user will be able to alter his profile</p>  
				<img src="img/169099.strip.sunday.jpg">
			</div>
		</div>
	</div>
	<div>
		<form action="#" method="GET">
			<input type='submit' value='Logout' class="btn btn-primary" />
			<input type='hidden' value='true' name='Logout' />

			<?php 
			if (isset($_GET['Logout'])){
				session_destroy();
				header('Location:index.php');
			} ?>
		</form>
	</div>

</div>

<div>
	<?php include ('footer.php') ?>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-tab.js"></script>


</body>
</html>

<!-- fixes
	- make db conectio
	- desplay username in jumbotron
	- make logout with fuction not form
	- put more than one formes in a page 
			IF NOT POSSIBLE make slick rediraction
-->