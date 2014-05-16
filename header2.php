<html>
<head>
	<title>
		CyberDoc
	</title>
	
	<meta charset="utf-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.icon-large.min.css" rel="stylesheet">
</head>
<body>
<div class="row">
<div class="navbar navbar-inverse navbar-fixed-top" id="navbar">
				<div class="navbar-inner">
					<a class="brand" href="home.php"><img src="img/1.png" style="height:20px;"> CyberDoc</a>
					<ul class="nav">
						
					</ul>
					<ul class="nav pull-right">
						<li>
							<a href="acount.php" target="_blank">Sign Up</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Log In</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<form id="login_form" action="index.php">
									<li>
										<label for="uname">Username or email</label>
										<input class="textfield user_field" required="required" type="text" id="uname">
									</li>	
									<li>	
										<label for="upass">Password</label>
										<input class="textfield password" required="required" type="password" id="upass">
									</li>			
									<li class="loginButtons">
										<a href="doctor.php" target="_blank" class="btn btn-info" style="margin-right: 10px">Submit as Doctor</a>
         								<a href="patient.php" target="_blank" class="btn btn-info">Submit as Patient</a>
									</li>
									<li id="results"></li>
								</form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
	</html>	