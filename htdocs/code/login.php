<?php
include_once 'secure/db_connection.php';
include_once 'secure/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>


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
	<body>

		<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 

		<div class="container-fluid" >
			<form action="secure/login_process.php" method="POST" name="login_form">
				<div class="input-group">
  					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
  					<input type="text" class="form-control" name="username" id="username" placeholder="Username">
				</div>
				<br>
				<div class="input-group">
  					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
  					<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
				<br>
				<!-- 	<a href="doctor.php" class="btn btn-info" role="button">Doctor</a>
					<a href="patient.php" class="btn btn-info" role="button">Patient</a>
					<a href="other.php" class="btn btn-info" role="button">Other</a> -->
					<input type="submit" class="btn btn-info" value="Doctor">
					<input type="submit" class="btn btn-info" value="Patient">
					<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 

			</form>

<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>   

		</div>
	</body>
</html>

<!-- fixes
	- db conection
-->