<?php
include('constants.php');
include ('header3.php');

if (isset($_GET['Logout'])||!isset($_SESSION['mode'])||($_SESSION['mode']=='patient')){
	session_destroy();
	header('Location:index.php');
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

			<?php
			if (isset($_GET['Logout']))
			{
				session_destroy();
				header('Location:index.php');
			}
			echo "<h1>Welcome Dr ".$_SESSION['name']."</h1>";
			?>

			<div class="row">

				<div class="bs-docs-example">
					<div class="accordion" id="accordion2">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
									Perscriptions
								</a>
							</div>
							<div id="collapseOne" class="accordion-body collapse" style="height: 0px;">
								<div class="accordion-inner">
									<?php 
									$presc="SELECT * FROM prescriptions,drugs WHERE prescriptions.Drug=drugs.Id AND Doctor='".$_SESSION['user']."';";
					$ret=mysql_query($presc,$db); //echo "---".$ret;
					while ($i=mysql_fetch_array($ret))
						$p[]=$i;

					?>
					<table><tr><th>Patient</th><th>Drug</th><th>Dosage</th></tr>
						<?php
						foreach ($p as $i) {
							printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n",$i['Patient'],$i['Name'],$i['Dosage']);
						}
						?>
					</table>	

				</div>
			</div>
		</div>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					Submit a perscription
				</a>
			</div>
			<div id="collapseTwo" class="accordion-body collapse" style="height: 0px;">
				<div class="accordion-inner">
					
					<?php
					if (isset($_GET['patient'])){
						$q='INSERT INTO Prescriptions (Doctor,Drug,Patient,Dosage)VALUES(';
							$q.='"'.$_SESSION['user'].'"';
							$q.=','.$_GET['drug'].'';
							$q.=',"'.$_GET['patient'].'"';
							$q.=','.$_GET['dosage'].');';
						$ret=mysql_query($q,$db);
						//echo '?'.$q."?<br/>";
					}//else echo 'No prescription yet';

					$q="SELECT patients.Fname,patients.Lname, patients.PUsername FROM patients, doctors WHERE (patients.Treated=doctors.DUsername)AND(doctors.DUsername='".$_SESSION['user']."');";
					$ret=mysql_query($q,$db);
					while ($i=mysql_fetch_array($ret))
						$patients[]=$i;

					$q='SELECT * FROM Drugs';
					$ret=mysql_query($q,$db);
					while ($i=mysql_fetch_array($ret))
						$drugs[]=$i;
					?>

					<table><form action='#' method='get'>
						<tr><td>Patient Name</td><td>
							<select name='patient'>
								<?php
								foreach($patients as $patient)
									echo "<option value='".$patient['PUsername']."'>".$patient['Lname'].' '.$patient['Fname']."</option>\n"
								?>
							</select>
						</td></tr>
						<tr><td>Drug Name</td><td>
							<select name='drug'>
								<?php
								foreach($drugs as $drug)
									echo "<option value='".$drug['Id']."'>".$drug['Name']."</option>\n"
								?>
							</select>

						</td></tr>
						<tr><td>Dosage</td><td>
							<select name='dosage'>
								<option value='1'>every hour</option>
								<option value='2'>every 2 hours</option>
								<option value='3'>every 3 hours</option>
								<option value='4'>every 4 hours</option>
								<option value='6'>every 6 hours</option>
								<option value='8'>every 8 hours</option>
								<option value='12'>every 12 hours</option>

							</select>
						</td></tr>
						<tr><td><input class="btn btn-info" type='submit' /></td></tr>

					</form></table>
				</div>
			</div>
		</div>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
					Register a Patient
				</a>
			</div>
			<div id="collapseThree" class="accordion-body collapse" style="height: 0px;">
				<div class="accordion-inner">
					<img src="img/under-construction.jpg" style="height:250;">
					<table>
						<form action='#' method='GET'>
							<tr>
								<h3>Create Your Acount</h3>

								<h3><b> First Name </b></h3>
								<input type="text" name="name" maxlength="30" id="element"/>
								(max 30 characters a-z and A-Z)

								<h3><b> Last Name </b></h3>
								<input type="text" name="surname" maxlength="30" id="element"/>
								(max 30 characters a-z and A-Z)

								<h3><b> e-mail </b></h3>
								<input type="email" name="email" maxlength="30" id="element"/>

								<h3><b> Username </b></h3>
								<input type="text" name="username" maxlength="30" id="element"/>
								(max 30 characters a-z and A-Z)

								<h3><b> Password </b></h3>
								<input type="text" name="password" maxlength="30" id="element"/>
								(max 30 characters a-z and A-Z)

								<h3><b> Telefone </b></h3>
								<input type="tel" name="tel" maxlength="30" id="element"/>

								<h3><b> Address</b></h3>
								<input type="text" name="street" maxlength="30" id="element"/> Street
								<br>
								<input type="text" name="num" maxlength="4" id="element"/> Number
								<br>
								<input type="text" name="city" maxlength="30" id="element"/> City

								<h3><b> Date of Birth</b></h3>
								<select name="day" id="Birthday_Day">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<br>
								<select  name="month" id="Birthday_Month">
									<option value="-1">Month:</option>
									<option value="January">Jan</option>
									<option value="February">Feb</option>
									<option value="March">Mar</option>
									<option value="April">Apr</option>
									<option value="May">May</option>
									<option value="June">Jun</option>
									<option value="July">Jul</option>
									<option value="August">Aug</option>
									<option value="September">Sep</option>
									<option value="October">Oct</option>
									<option value="November">Nov</option>
									<option value="December">Dec</option>
								</select>
								<br>
								<select name="year" id="Birthday_Year">
									<option value="1999">1999</option>
									<option value="1998">1998</option>
									<option value="1997">1997</option>
									<option value="1996">1996</option>
									<option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option> 
									<option value="1989">1989</option>
									<option value="1988">1988</option>
									<option value="1987">1987</option>
									<option value="1986">1986</option>
									<option value="1985">1985</option>
									<option value="1984">1984</option>
									<option value="1983">1983</option>
									<option value="1982">1982</option>
									<option value="1981">1981</option>
									<option value="1980">1980</option>
								</select>

								<h3><b> Profession/ Spetialty </b></h3>
								<input type="tel" name="profession" maxlength="30" id="element"/>

								<h3><b>Gender</b></h3>
								Male <input type="radio" name="gender" value="Male" />
								Female <input type="radio" name="gender" value="Female" />

								<h3><b> AMKA </b></h3>
								<input type="text" name="amka" maxlength="30" id="element"/>
							</tr>
							<br>
							<br>

							
							<?php
							if (isset($_GET['username'])){
								$sql='INSERT INTO patients (Fname, Lname, PUsername,Pass, Mail, Street, Num, City, Telephone, Day, Month, Year, Gender)
								VALUES ("'.$_GET['name'].'","'.$_GET['surname'].'","'.$_GET['username'].'","'.$_GET['password'].'","'.$_GET['email'].'","'.$_GET['street'].'","'.$_GET['num'].'","'.$_GET['city'].'","'.$_GET['tel'].'","'.$_GET['day'].'","'.$_GET['month'].'","'.$_GET['year'].'","'.$_GET['gender'].'")';

								$ret=mysql_query($sql);

								if (!mysqli_query($con,$ret))
								{
									die('Error: ' . mysqli_error($con));
								}
								else {
									echo "1 record added";

									echo(rand() . "<br />");
								}
								mysqli_close($con);

							}

							?>
							<tr><td><input class="btn btn-info" type='submit' /></td></tr>
						</form>
					</table>
				</div>
			</div>
		</div>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
					Add a Therapy to the List
				</a>
			</div>
			<div id="collapseFour" class="accordion-body collapse" style="height: 0px;">
				<div class="accordion-inner">
					<img src="img/under-construction.jpg" style="height:250;">
				</div>
				<div>
					<table>
						<form action='#' method='GET'>
							<tr>
								<h3>Therapy's Information</h3>

								<h3><b> Name </b></h3>
								<input type="text" name="name" maxlength="30" id="element"/>
								(max 30 characters a-z and A-Z)

								<h3><b> Substance </b></h3>
								<input type="text" name="substance" maxlength="30" id="element"/>

								<h3><b> Content </b></h3>
								<input type="text" name="content" maxlength="30" id="element"/>
								
								<h3><b> Sort description/ Site with side effects </b></h3>
								<textarea rows="5" cols="500" name="effects"></textarea>
								(max 500 characters a-z and A-Z)

								<h3><b>Can the patient take the therapy pefore the designated time?</b></h3>
								Yes <input type="radio" name="take" value="yes" />
								No <input type="radio" name="take" value="no" />
								<br>
								<br>
								<?php
								if (isset($_GET['name'])){
									$sql='INSERT INTO patients (Name, Substance, Content, Description, Take)
									VALUES ("'.$_GET['name'].'","'.$_GET['substance'].'","'.$_GET['content'].'","'.$_GET['effects'].'","'.$_GET['take'].'")';

									$ret=mysql_query($sql);

									if (!mysqli_query($con,$ret))
									{
										die('Error: ' . mysqli_error($con));
									}
									else {
										echo "1 record added";

										echo(rand() . "<br />");
									}
									mysqli_close($con);

								}

								?>
								<tr>
									<tr><td><input class="btn btn-info" type='submit' /></td></tr>
									<br>
									<br>
								</tr>
							</form>
						</table>
					</div>

				</div>
			</div>

			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
						Profile
					</a>
				</div>
				<div id="collapseFive" class="accordion-body collapse" style="height: 0px;">
					<div class="accordion-inner">
						<img src="img/under-construction.jpg" style="height:500;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
					/*$presc="SELECT * FROM prescriptions,drugs WHERE prescriptions.Drug=drugs.Id AND Doctor='".$_SESSION['user']."';";
					$ret=mysql_query($presc,$db); //echo "---".$ret;
					while ($i=mysql_fetch_array($ret))
					$p[]=$i;*/

					/*foreach ($presc as $i) {
					foreach ($i as $key => $value) {
						printf("%s=>%s<br/>",$key,$value);
					}
					echo "<br/>";
				}*/
				?>
				<form>
					<input type='submit' class="btn btn-info" value='Logout' />
					<input type='hidden' value='true' name='Logout' />
				</form>


			</div>
		</div>
		<div id="footer">
			<p class="pull-right"><a href="#">Back to top</a></p>
			<p>© CyberDoc 2013</p>
		</div>

	</div>
</div>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="js/bootstrap.js"></script>



</div>
</body>
</html>
