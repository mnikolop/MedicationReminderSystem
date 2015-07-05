<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--     <meta http-equiv="refresh" content="1"> -->
    <title>Patient's page</title>  
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- defining responsivnes in mobile devices -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> <!-- styling link -->
    <script type="text/javascript">
    update();       
    setInterval('update()',1000);
    document.getElementById('x').innerHTML=1;
    </script>

</head>
<body>
    <div id="patient"> 
        <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
            <h1>Welcome Mr/Mrs <?php echo htmlentities($_SESSION['username']); ?>
            </h1>
        </div>
        <div class="container-fluid">
         <div class=" col-md-2" role="complementary">
            <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                <ul class="nav bs-docs-sidenav">
                    <li>
                        <a href="#therapies">Therapies</a>
                    </li>
                    <li>
                        <a href="#doctors">Doctors</a>
                    </li>
                    <li>
                        <a href="add_doctor.php">Add a new Doctor to the doctor list</a>
                    </li>
                    <li>
                        <a href="#profile">Profile</a>
                    </li>
                    <li class="">
                       <?php echo '<a href="includes/logout.php">Log Out</a>' ?>
                   </li>
                   <li>
                    <a href="#">Back to the top of the Page</a>
                </li>
            </ul>
        </nav>

    </div>  
    <div class="col-md-10">
        <div class="bs-docs-section">
            <h3 id="therapies" class="page-header">Therapies<small> In this section you can review all the prescriptions and the time left to take them</small></h3>
            
            <?php 
            // $t = time();
            // $h = ($t / (60*60)) % (24-1);
            // $m = ($t /60) % (60-1);
            // $s = abs($t % 60);

            
            ?>
            <table class="table">
                <thead>
                    <caption>This table contains all the prescriptions, the given dosage, the prescribing doctor, the time of the last intake and the time left for the next intake.</caption>
                    <tr>
                        <th>Drug</th>
                        <th>Take every (hour(s))</th>
                        <th>Prescribed  by:</th>
                        <th>Take again in:</th>
                        <th>Time left:</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // $index = 0;
                    $stmt = "SELECT prescriptions.Id, prescriptions.Doctor, prescriptions.Drug, prescriptions.Dosage, prescriptions.LastTaken, drugs.Name
                    FROM `prescriptions`, `drugs` 
                    WHERE prescriptions.Drug = drugs.Id 
                    AND Patient = '".$_SESSION['username']."'";
                    $result = mysqli_query($mysqli,$stmt);
                    $pa = array();
                    // $timeLeft = array();
                    while ($x = mysqli_fetch_array($result)){
                        $pa[] = $x;
                    }
                    foreach ($pa as $i){
                        

                        // $lastTaken = strtotime($i['LastTaken']); 

                        // $dosage = ($i['Dosage'] - 1) * 3600;
                        $nextTakeIn = strtotime($i['LastTaken']) + ($i['Dosage'] - 1) * 3600;
                        $id = $i['Id'];
                        $time = time() + 3600;                        
                        $timeLeft =  (strtotime($i['LastTaken']) + (($i['Dosage'] - 1) * 3600)) - (time() + 3600);

                        // echo date('H:i:s', $timeLeft - abs($nextTakeIn))."<br>";
                        // echo $timeLeft;
                        // echo date('H:i:s',$nextTakeIn)."<br>";
                        // // $a = strtotime("0 seconds");
                        // echo $a;
                        // echo "lastTaken =".date('H:i:s', $lastTaken)."<br>"; 
                        // echo "dosage =".$dosage."<br>";
                        // echo "next =".date('H:i:s',$nextTakeIn)."<br>";
                        $t = "success";

                        printf("<tr id='x'class='st'><td id='y'>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",$i['Name'],$i['Dosage'], $i['Doctor'], date('H:i:s d-m', $nextTakeIn), date('H:i:s',$timeLeft));

                        
                        if ($nextTakeIn <= strtotime("+0 seconds")) {
                            echo "You should have taken your".$i['Name']."in".date('H:i:s d-m', $nextTakeIn)."<br>";
                            $sql = "UPDATE prescriptions SET prescriptions.LastTaken = CURRENT_TIMESTAMP WHERE prescriptions.Id = '".$i['Id']."'";
                            $stmt3 = $mysqli->prepare($sql);
                            $stmt3->execute();


                            // Include the Twilio PHP library
                            require_once 'Services/Twilio.php';

                            // Twilio REST API version
                            $version = "2010-04-01";

                            // Set our Account SID and AuthToken
                            $sid = "ACe1eba0a045df901297dfc4ce0de51de2";
                            $token = "53c19ce2566b5d1f19ec8f733f98c28a";

                            // A phone number you have previously validated with Twilio
                            $phonenumber = '+306976928623';

                            // Instantiate a new Twilio Rest Client
                            $client = new Services_Twilio($sid, $token, $version);

                            // $sql2 = "SELECT telephone 
                            //             FROM `members` 
                            //             WHERE username = '".$_SESSION['username']."'"; 
                    
                            // $res = mysqli_query($mysqli,$sql2);
                            // while ($x = mysqli_fetch_array($res)){
                            //     $c[] = $x;
                            // }
                            // $cn = array("+30", $x['telephone']);
                            // $callnumber = implode( $cn );

                            // echo date('H:i:s',$timeLeft)."<br>";
                            // echo $x['telephone'] ."<br>";

                            echo "I got here, before the call";
                            try {
                            // Initiate a new outbound call
                                $call = $client->account->calls->create(
                                                                $phonenumber, // The number of the phone initiating the call
                                                                '+306976928623', // The number of the phone receiving call
                                                                'https://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
                                                                    );
                                echo 'Started call: ' . $call->sid;
                            } catch (Exception $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            echo "I got here, after the call";
                        } 
                    }
                    ?>
                    <script type="text/javascript">
                    function update(){
                        st = "success";
                        var d = new Date();
                        var n = d.getTime();
                        // var tl = $timeLeft;
                        if (tl==0)
                            notify(document.getElementById('y').innerHTML);
                        if (Math.abs(tl<30)
                            document.getElementById('x').style.backgroundColor='orange';
                            else if (tl<10)
                                document.getElementById('x').style.backgroundColor='red';
                            else
                                document.getElementById('x').style.backgroundColor='green';
                        }


                    // function notify(x)
                    // {
                    //     alert("Please take your "+y);
                    // }
                    </script>
                </tbody>
            </table>
        </div>
        <div class="bs-docs-section">
            <h3 id="doctors" class="page-header">Doctors <small>Here are all the doctors that have you under their care</small></h3>
            <?php 
            $stmt1 = "SELECT `username` ,`email`,`telephone`  
            FROM `treated`, `members`
            WHERE treated.DUsername = members.username
            AND PUsername = '".$_SESSION['username']."'";
            $result1 = mysqli_query($mysqli,$stmt1);
            while ($i = mysqli_fetch_array($result1))
                $p[] = $i;
            ?>

            <table class="table">
                <thead>
                    <caption>This table contains all the usernames and e-mail of the doctors that have you under their care</caption>
                    <tr>
                        <th>Doctor</th>
                        <th>e-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($p as $z) {
                        printf("<tr> <td>%s</td> <td>%s</td> </tr>\n", $z['username'], $z['email']);
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="bs-docs-section">
            <h3 id="profile" class="page-header">Profile<small> Here you can see the information with which you registered</small></h3>
            <?php 
            $stmt2 = "SELECT * 
            FROM `members` 
            WHERE username = '".$_SESSION['username']."'";
            $result = mysqli_query($mysqli, $stmt2);
            $i = mysqli_fetch_array($result);
            ?>
            <table class="table">
                <thead>
                    <caption>In this table you can see the information you have given during your registration.</caption>
                    <tr>
                        <th>Username</th>
                        <th>e-mail</th>
                        <th>Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo $i['username']; ?> </td>
                        <td> <?php echo $i['email']; ?> </td>
                        <td> <?php echo $i['capacity']; ?> </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
<script type="text/javascript">
update();       
setInterval('update()',1000);
document.getElementById('x').innerHTML=1;

</script>


</body>
</html>