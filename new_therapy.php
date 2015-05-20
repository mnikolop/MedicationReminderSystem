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
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                    <ul class="nav bs-docs-sidenav">
                        <li>
                            <a href="Doctor.php#present">Allready Given Therapies</a>
                        </li>
                        <li>
                            <a href="Doctor.php#asignment">Asigne a Therapy to a Patient</a>
                        </li>
                        <li>
                            <a href="Doctor.php#therapy">Register a NEW Therapy</a>
                        </li>
                        <li>
                            <a href="add_patient.php">Add a new Patient to the patient list</a>
                        </li>
                        <li>
                            <a href="Doctor.php#profile">Profile</a>
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
                    <h3 id="therapy" class="page-header">Register a NEW Therapy</h3>
                    <form action="#" 
                        method="post" 
                        name="doctor_form">

                        <h3>Name</h3> <input type="text" name="name" id="name" class="form-control input-lg"/>
                        <h3>Substance</h3> <input type="text" name="substance"  id="substance" class="form-control input-lg"/>
                        <h3>Content</h3> <input type="text" name="content" id="content" class="form-control input-lg"/>
                        <h3>Sort description/ Site with side effects</h3> <textarea name="effects" id="effects" class="form-control input-lg"></textarea>
                    <!-- <h3>Can the patient take the therapy pefore the designated time?</h3>
                    <h4> <input type="radio" name="take" id="take" value="yes" /> Yes</h4>
                    <h4> <input type="radio" name="take" id="take" value="no" /> No</h4> -->
                    <br>
                    <input type="button" class="btn btn-default btn-lg" value="Register" onclick="return docTherapyFormHash(this.form,
                    this.form.name,
                    this.form.substance,
                    this.form.content,
                    this.form.effects);"/> 
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>