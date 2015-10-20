<!DOCTYPE html>

<?php include('db_conection.php') ?>


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
<body>
	<div class="container-fluid" id="patient"> 

		<div class="page-header">
			<h1><?php echo "<h1>Welcome ".$_SESSION['name']."</h1>"; ?> </h1>
		</div>
		<div class="container-fluid">
			<ul id="sidebar" class="nav nav-tabs " role="tablist">
				<li class="active"><a href="#active" role="tab" data-toggle="tab">Active Perscriptions</a></li>
				<li class=""><a href="#doctors" role="tab" data-toggle="tab">Attending Doctors</a></li>
				<li class=""><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active in" id="active">
					<p>All the perscriptions by $SESSION patient and the doctor that has administered them will be listed here. The colorcode is 
						<br> green: >30min
						<br> orange: 30min< time < 5min
						<br> red: < 5min
					</p>
				<img src="img/377532_422544357800576_1473235392_n.jpg">
				</div>
				<div class="tab-pane fade" id="doctors">
					<p> The atendive doctors of the patient will be listed with all their contac information if existant</p>
				<img src="img/422964_10150557071063360_290539813359_8751506_258651470_n.jpg">
				</div>
				<div class="tab-pane fade" id="profile">
					<p>The full profile of the user will be presented. The user will be able to alter his profile</p>  
				<img src="img/4105956_700b.jpg">
				</div>
			</div>
		</div>

		<div>
			<form actio="#" method="GET">
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
	- name
	- db
	- take at any time
-->