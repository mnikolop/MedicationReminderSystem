<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/Doctor.inc.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Patient's page</title>  
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
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix">
                    <ul class="nav bs-docs-sidenav">
                        <li>
                            <a href="#present">Allready Given Therapies</a>
                        </li>
                        <li>
                            <a href="#asignment">Asigne a Therapy to a Patient</a>
                        </li>
                        <li>
                            <a href="#register">Register a NEW Patient</a>
                        </li>
                        <li>
                            <a href="#therapy">Register a NEW Therapy</a>
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
                                <th>Dosage</th>
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

                    <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                        method="post" 
                        name="doctor_form">
                    
                    <?php

                        $sql1 = "SELECT PUsername
                        FROM `treated`
                        WHERE DUsername = '".$_SESSION['username']."'";
                        $results1 = mysqli_query($mysqli, $sql1);
                        while ($i = mysqli_fetch_array($results1))
                            $patients[] = $i;

                   // $sql2 = 'SELECT * 
                   //          FROM Drugs';
                   //  $results2 = mysql_query($mysqli, $results2);
                   // while ($i = mysql_fetch_array($results2))
                   //     $drugs[] = $i;
                     ?>
                     <h3>Patient Useraname: </h3>
                     <select name='patient' id='patient' class="form-control input-lg">
                        <?php
                        foreach($patients as $patient)
                            ?>
                    </select>
                    <br>
                    <h3>Drug Name:</h3> 
                    <select name='drug' id='drug' class="form-control input-lg">
                        <?php
                        foreach($drugs as $drug)
                            echo "<option value='".$drug['Id']."'>".$drug['Name']."</option>\n"
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
                    <input type="button" class="btn btn-default btn-lg" value="Submit" onclick="return docformhash(this.form,
                    this.form.,
                    this.form.,
                    this.form.,
                    this.form.drug,
                    this.form.dosage);" /> 
                </div>

                <div class="bs-docs-section">
                    <h3 id="register" class="page-header">Register a NEW Patient</h3>
                    <h3>Username:</h3> <input type='text' name='username' id='username' class="form-control input-lg" /><br>
                    <h3>Email:</h3> <input type="text" name="email" id="email" class="form-control input-lg" /><br>
                    <h3>Password:</h3> <input type="password" name="password" id="password" class="form-control input-lg" /><br>
                    <h3>Confirm password:</h3> <input type="password" name="confirmpwd" id="confirmpwd" class="form-control input-lg" /><br>

                    <br>
                    <input type="button" class="btn btn-default btn-lg" value="Register" onclick="return docregformhash(this.form,
                    this.form.username,
                    this.form.email,
                    this.form.password,
                    this.form.confirmpwd);"/> 
                </div>

                <div class="bs-docs-section">
                    <h3 id="therapy" class="page-header">Register a NEW Therapy</h3>
                   
                    <h3>Name</h3> <input type="text" name="name" id="name" class="form-control input-lg"/>
                    <h3>Substance</h3> <input type="text" name="substance"  id="substance" class="form-control input-lg"/>
                    <h3>Content</h3> <input type="text" name="content" id="content" class="form-control input-lg"/>
                    <h3>Sort description/ Site with side effects</h3> <textarea name="effects" id="effects" class="form-control input-lg"></textarea>
                    <h3>Can the patient take the therapy pefore the designated time?</h3>
                    <h4> <input type="radio" name="take" id="take" value="yes" /> Yes</h4>
                    <h4> <input type="radio" name="take" id="take" value="no" /> No</h4>
                    <br>
                    <input type="button" class="btn btn-default btn-lg" value="Register" onclick="return docformhash(this.form,
                    this.form.name,
                    this.form.substance,
                    this.form.content,
                    this.form.effects,
                    this.form.take);"/> 
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