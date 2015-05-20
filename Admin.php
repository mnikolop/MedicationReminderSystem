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
</head>
<body>
    <div id="patient"> 
        <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
            <h1>Welcome Mr/Mrs <?php echo htmlentities($_SESSION['username']); ?>
            </h1>
        </div>
        <div class="container-fluid">
        
    
        <div class="bs-docs-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Doctor</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $stmt = "SELECT * 
                    FROM `admin_temp` 
                        ORDER BY PUsername, DUsername";
                    $result = mysqli_query($mysqli,$stmt);
                    while ($i = mysqli_fetch_array($result))
                        $p[] = $i;
                    foreach ($p as $i) {
                        printf("<tr><td>%s</td><td>%s</td></tr>\n",$i['PUsername'],$i['DUsername']);
                    }
                    ?>
                </tbody>
            </table>
            <h5>If a row is double there will be the oportunity to insert it in the therapies table </h5>
        </div>
 
    </div>



</body>
</html>