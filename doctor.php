<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
// include_once 'includes/Doctor.inc.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doctor's page</title>  
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- defining responsivnes in mobile devices -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> <!-- styling link -->
</head>
<body>
    <div id="patient"> 
        <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
            <h1>Welcome Dr. <?php echo htmlentities($_SESSION['username']); ?>
            </h1>
        </div>
        <div class="container-fluid">
            <div class=" col-md-2" role="complementary">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                    <ul class="nav bs-docs-sidenav">
                        <li>
                            <a href="#present">Allready Given Therapies</a>
                        </li>
                        <li>
                            <a href="#asignment">Asigne a Therapy to a Patient</a>
                        </li>
                        <li>
                            <a href="new_therapy.php">Register a NEW Therapy</a>
                        </li>
                        <li>
                            <a href="add_patient.php">Add a Patient to the patient list</a>
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
                    <h2 id="present" class="page-header">Your Patietnts and theis Dosages</h2>
                    <?php 
                    $stmt = "SELECT * 
                    FROM `prescriptions`, `drugs` 
                    WHERE prescriptions.Drug = drugs.Id 
                    AND Doctor = '".$_SESSION['username']."'";
                    $result = mysqli_query($mysqli,$stmt);
                    while ($i = mysqli_fetch_array($result))
                        $p[] = $i;
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Drug</th>
                                <th>Every # Hour(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($p as $i) {
                                printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n",$i['Patient'],$i['Name'],$i['Dosage']);
                            }
                            ?>
                        </tbody>
                    </table>    
                </div>

                <div class="bs-docs-section">
                    <h2 id="asignment" class="page-header">Asigne a Therapy to a Patient</h2>           

                    <form action="insert" 
                    method="post" 
                    name="doctor_form">

                    <?php
                    function insert (){
                        $stmt1 = $mysqli->prepare("INSERT INTO prescriptions (Doctor, Drug, Patient, Dosage, LastTaken) VALUES (?, ?, ?, ?, ?)");
                        $stmt1->bind_param("sisii", $doctor, $drug, $patient, $dosage, $lastTaken);

                        $drug = filter_input(INPUT_POST, 'drug', FILTER_SANITIZE_STRING);
                        $patient = filter_input(INPUT_POST, 'patient', FILTER_SANITIZE_STRING);
                        $dosage = filter_input(INPUT_POST, 'dosage', FILTER_SANITAZE_NUMBER_INT);
                        $doctor = $_SESSION['username'];
                        $lastTaken = time();

                        $stmt1->execute();
                    }
                    ?>

                    <?php
                    $sql1 = "SELECT PUsername
                    FROM `treated`
                    WHERE DUsername = '".$_SESSION['username']."'";
                    $results1 = mysqli_query($mysqli, $sql1);
                    while ($i = mysqli_fetch_array($results1))
                        $patients[] = $i;
                    ?>

                    <h3>Patient Useraname: </h3>
                    <select name='patient' id='patient' class="form-control input-lg">
                        <?php
                        foreach($patients as $patient)
                            printf("<option>%s</option>", $patient['PUsername']);
                        ?>
                    </select>
                    <br>

                    <?php 
                    $sql2 = "SELECT * 
                    FROM Drugs
                    WHERE DUsername = '".$_SESSION['username']."'";
                    $results2 = mysqli_query($mysqli, $sql2);
                    while ($j = mysqli_fetch_array($results2))
                        $drugs[] = $j;
                    ?>

                    <h3>Drug Name:</h3> 
                    <select name='drug' id='drug' class="form-control input-lg">
                        <?php
                        foreach($drugs as $drug)
                            printf("<option> %s</option>", $drug['Name']);
                        ?>
                    </select>
                    <br>
                    <h3>Dosage</h3>
                    <select name='dosage' class="form-control input-lg">
                        <option value='1'>every 1 hour</option>
                        <option value='2'>every 2 hours</option>
                        <option value='3'>every 3 hours</option>
                        <option value='4'>every 4 hours</option>
                        <option value='5'>every 5 hours</option>
                        <option value='6'>every 6 hours</option>
                        <option value='7'>every 7 hours</option>
                        <option value='8'>every 8 hours</option>
                        <option value='12'>every 12 hours</option>
                    </select>
                    <br>
                    <input type="button" class="btn btn-default btn-lg" value="Submit" />
                </form> 
            </div>

            <div class="bs-docs-section">
                <h3 id="profile" class="page-header">Profile</h3>
                <?php 
                $stmt2 = "SELECT * 
                FROM `members` 
                WHERE username = '".$_SESSION['username']."'";
                $result = mysqli_query($mysqli, $stmt2);
                $i = mysqli_fetch_array($result);
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>e-mail</th>
                            <th>Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td> <?php echo $i['username']; ?> </td>
                        <td> <?php echo $i['email']; ?> </td>
                        <td> <?php echo $i['capacity']; ?> </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>