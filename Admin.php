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
    <title>Admins's page</title>  
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
    <div id="admin"> 
        <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
            <h1>Welcome  <?php echo htmlentities($_SESSION['username']); ?>
            </h1>
        </div>
        <div class="container-fluid">
            <div class=" col-md-2" role="complementary">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                    <ul class="nav bs-docs-sidenav">

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
               <!--  <h5>If a row is double there will be the oportunity to insert it in the therapies table </h5> -->

                <div class="bs-docs-section">

                    <table class="table">
                        <caption>This table contines all the requests for conection betwen an doctor and a patient. 
                            If a row is double AND the origin is once from the doctor and the other from the patient it must be insearted in the therapies table </caption>
                        <thead>
                            <tr>
                                <th>Check</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Submited by the</th>
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
                                printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",'<input type="checkbox" name="entry" value="('.$i['DUsername'].','.$i['PUsername'].')">' , $i['PUsername'], $i['DUsername'], $i['SubmitedBy']);
                            }
                    // something about implode to make it make multiple entries
                            if (isset($_POST['entry'])){
                                
                                $sql= "INSERT INTO treated (PUsername, DUsername)
                                VALUES ('".$_POST['PUsername']."', '".$_POST['DUsername']."')";

                                $ret = mysqli_query($mysqli, $sql);

                                if (!$ret)
                                {
                                    die('Error: ' . mysqli_error($mysqli));
                                }
                                else {
                                    echo "1 record added";

                                    
                                }                               
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <input type="Submit" class="btn btn-default btn-lg" value="Submit" />

                </div>

            </div>



        </body>
        </html>