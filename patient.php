<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

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
            <h1>Welcome Mr/Mrs <?php echo htmlentities($_SESSION['username']); ?>
            </h1>
        </div>
        <div class="container-fluid">
         <div class=" col-md-2" role="complementary">
            <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix">
                <ul class="nav bs-docs-sidenav">
                    <li>
                        <a href="#therapies">Therapies</a>
                    </li>
                    <li>
                        <a href="#doctors">Doctors</a>
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
            <h3 id="therapies" class="page-header">Therapies</h3>
            
            <?php 
            $time = time();
            
            $stmt = "SELECT * 
            FROM `prescriptions`, `drugs` 
            WHERE prescriptions.Drug = drugs.Id 
            AND Patient = '".$_SESSION['username']."'";
            $result = mysqli_query($mysqli,$stmt);
            while ($i = mysqli_fetch_array($result))
                $p[] = $i;
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Drug</th>
                        <th>Dosage</th>
                        <th>ETA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($p as $i) {
                        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n",$i['Name'],$i['Dosage'], $i['LastTaken']);
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="bs-docs-section">
            <h3 id="doctors" class="page-header">Doctors</h3>
            <?php 
            $stmt1 = "SELECT * 
            FROM `treated`, `members`
            WHERE treated.DUsername = members.username
            AND PUsername = '".$_SESSION['username']."'";
            $result1 = mysqli_query($mysqli,$stmt1);
            while ($i = mysqli_fetch_array($result1))
                $p[] = $i;
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>e-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($p as $i) {
                        printf("<tr> <td>%s</td> <td>%s</td> </tr>\n", $i['username'], $i['email']);
                    }
                    ?>
                </tbody>
            </table>
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

</body>
</html>