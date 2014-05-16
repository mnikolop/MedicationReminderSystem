<?php
include('constants.php');
include ('header3.php');

if (isset($_GET['Logout'])||!isset($_SESSION['mode'])||($_SESSION['mode']!='patient')){
	session_destroy();
	header('Location:index.php');
}

$t="SELECT prescriptions.Id, drugs.Name, prescriptions.LastTaken, prescriptions.Dosage FROM prescriptions,patients,drugs WHERE patients.PUsername=prescriptions.Patient AND prescriptions.Drug=drugs.Id AND patients.PUsername='".$_SESSION['user']."';";
$prescriptions=mysql_query($t);
while ($i=mysql_fetch_array($prescriptions))
		$drug[]=$i;
//echo "---".$t;
//echo "---".$prescriptions;
if (isset($_GET['took'])){
	//
	foreach($drug as $pill){
		if (isset($_GET[$pill['Name']])){
			$ret=mysql_query("UPDATE Prescriptions SET LastTaken=NOW() WHERE Id=".$pill['Id'],$db);
				//echo "!!!".$ret;
				
		}
	}
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

	<script>
	//document.write("apifdsoufgn;ojfn ");
	time=[];
	
	<?php 

	$index=0;
	foreach($drug as $i)
	{ 
		echo "time[".$index."]=".((strtotime($i['LastTaken'])+$i['Every']*60-time()-3600)).";\n";
		$index=$index+1;
	}
	echo "max=".$index.";\n";
	
	?>
	var i=0;
	temp=1;

	function div(x,y)
	{
		x=Math.abs(x);
		if (x%y==0)
			return parseInt(x/y);
		else
			return parseInt(x/y)+1;
	}

	function update()
	{
				alert(max);
for (i=0;i<max;i++)
{
			alert('x'+i);
			time[i]=time[i]-1;
			h=div(time[i],60*60)%24-1;
			m=div(time[i],60)%60-1;
			s=Math.abs(time[i]%60);
			if (time[i]<0)
				str="Time is running out";
			else
				str="";
			if (time[i]==0)
				notify(document.getElementById('y'+i).innerHTML);
			if (Math.abs(time[i])<15)
				document.getElementById('z'+i).style.backgroundColor='orange';
			else if (time[i]<0)
				document.getElementById('z'+i).style.backgroundColor='red';
			else
				document.getElementById('z'+i).style.backgroundColor='green';
			document.getElementById('x'+i).innerHTML=h+":"+m+":"+s+" "+str;
		}
				document.getElementById('x').innerHTML=time[0];
				document.getElementById('x').style.backgroundColor='red';
			}

			function notify(x)
			{
				alert("Please take your "+x);
			}

	</script>		
</head>
		<body>
			<div class="container">
			<div class="row">
				
			</div>
			<h1>Welcome Mr/Ms <?php echo $_SESSION['name'];?></h1>
			<?php
				foreach($drug as $i)
				{
					echo $i['Name'];
				}
				echo date('y-m-d H:i:s',strtotime('+8 hour'));
			?>
			<table><form action='' method='get'>
				<tr><th>Medication</th><th></th></tr>
				<?php
				$index=0;
				if ($prescriptions!=null) 
					foreach($drug as $i){
					
					$next=strtotime($i['LastTaken'])+$i['Dosage']*60;
					$now=time()+60*60;
		$diff=abs($next-$now)-60*60; 	//dunno why its -1h

//		echo date("H:i:s",$next)."-".date("H:i:s",$now)."<br/>";
//		echo $next."-".time()."<br/>";
		if (abs($now-$next)<30)
			$t='orange'; 
		else if ($now-$next<0)
			$t='blue';
		else	
			$t='red';
		echo "<tr id='z".($index)."' ><td id='y".($index)."'>".$i['Name'].'</td><td>';
		echo '<input type="checkbox" name="'.$i['Name']."\"/><i id='x".($index)."'>".date('H:i:s',$diff);
		echo "</i></td></tr>\n";
		$index=$index+1;
	}
	?>
	<tr><td><input type='submit' value='take pills' /></td></tr>
	<input type='hidden' value='foo' name='took' />
</form></table>

<form>
	<input type='submit' value='Logout' />
	<input type='hidden' value='true' name='Logout' />
</form>
<script>
update();		
setInterval('update()',1000);
document.getElementById('x').innerHTML=1;
</script>

</div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="js/bootstrap.js"></script>

</body>
</html>
