<?php 
include('storenumbers.php');

if(isset($_POST['numbers']) && isset($_POST['caller'])){
	putNumbers($_POST['caller'], $_POST['numbers']);
	$msg = "Number successfully stored";
} 

?>
<htmL>
	<head>
		<title>Twilio: Emergency Broadcast Demo</title>
	</head>
	<body>
		<h1>Emergency Broadcast</h1>
		<?php echo "<i> " . $msg . "</i>"; ?>
		<h3>Please enter your phone number, and then up to five numbers of people you would like your Emergency Message to reach. After submitting this form, simply call NNNNNNNNN and leave your message</h3>
		<form action="index.php" method="post">
		    <ul>
		    <li>Your Number: <input type="text" name="caller" /></li>
		   	<li>Number #1: <input type="text" name="numbers[0]" /></li>
		   	<li>Number #2: <input type="text" name="numbers[1]" /></li>
		   	<li>Number #3: <input type="text" name="numbers[2]" /></li>
		   	<li>Number #4: <input type="text" name="numbers[3]" /></li>
		   	<li>Number #5: <input type="text" name="numbers[4]" /></li>
		   	</ul>
		    <input type="submit" value="Broadcast">
		</form>
		</h3>
	</body>
</html>

