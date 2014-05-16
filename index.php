<?php
	include('constants.php');
	include('header2.php');
	if (isset($_SESSION['user'])){	
		if ($_SESSION['mode']=='doctor')
			header('Location:doctor.php');
		else if ($_SESSION['mode']=='patient')
			header('Location:patient.php');	

	}else if (isset($_GET['user'])){
		if ($_GET['mode']=='doctor')
			$q='SELECT * FROM Doctors WHERE DUsername="'.$_GET['user'].'";';
		else if ($_GET['mode']=='patient')
			$q='SELECT * FROM Patients WHERE PUsername="'.$_GET['user'].'";';
		$ret=mysql_query($q,$db);

		while ($row=mysql_fetch_array($ret)){
			echo "looking<br/>";
			if ($row['Pass']==$_GET['pass'])
			{
				$_SESSION['user']=$_GET['user'];
				$_SESSION['name']=$row['Lname'];
				$_SESSION['mode']=$_GET['mode'];

				if ($_SESSION['mode']=='doctor')
					header('Location:doctor.php');
				else if ($_SESSION['mode']=='patient')
					header('Location:patient.php');		
			}	
		}
		echo"wrong username or password";	
		die();		
	}
	
?>

<html>
	<head>
	<title>
		CyberDoc
	</title>
	<meta name="description" content="All pharmaceutical and therapeutic treatments in one place. Reminder for those who forget and entertainment for everyone.">
	<meta name="author" content="Markella Nikolopoulou">
	<meta charset="utf-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.icon-large.min.css" rel="stylesheet">
	<style type="text/css">
		#element{
 		height: 30px;
		}
	</style>
</head>
	<body>
	<div class="container">
		<div class="row">
        </div>
        <div>
		<table><form action='#' method='GET'>
			<tr><td><h4>Name</h4></td>
				<td><input type='text' name='user'/></td></tr>
			<tr><td><h4>Password</h4></td>
				<td><input type='password' name='pass'/></td></tr>
			<tr><td><h4>Doctor</h4></td><td><input type='radio' name='mode' value='doctor' /></td></tr>
			<tr><td><h4>Patient</h4></td><td><input type='radio' name='mode' value='patient' /></td></tr>
			<tr><td><input type='submit' class="btn"/></td></tr>
		</form></table>
		</div>
	</div>
	</body>
</html>