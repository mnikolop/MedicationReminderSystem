<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thesis Project </title>
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- defining responsivnes in mobile devices -->
    <meta charset="utf-8"><!-- defining the character set for encoding -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> <!-- styling link -->
</head>
<body>
    <div  id="index">     
        <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
            <h1>Markella Nikolopoulou-Themeli
                <small>Thesis project</small>
            </h1>
        </div>

        <div class="container-fluid" >
            <div class=" col-md-2" role="complementary">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                    <ul class="nav bs-docs-sidenav">

                        <li class="">
                            <?php echo '<a href="register.php">Register</a>'; ?>
                        </li>

                        <li>
                            <a href="#">Back to the top of the Page</a>
                        </li>
                    </ul>
                </nav>
            </div>

             <div class="col-md-6">
                <?php
                if (isset($_GET['error'])) {
                    echo '<h3 class="error">Error Logging In!</h3>';
                }
                ?> 
                <form action="includes/process_login.php" method="post" name="login_form">                      
                    <h3>Username: <small>Here insert the username from your registration</small></h3> <input type="text" name="username" class="form-control input-lg" />
                    <br>
                    <h3>Password: <small>Here insert the password from your registration</small></h3> <input type="password" name="password" id="password" class="form-control input-lg" />
                    <br>

                    <input type="button" class="btn btn-default btn-lg" value="Login" onclick="formhash(this.form, this.form.password);"  /> 
                </form>

                <?php
                if (login_check($mysqli) == true) {
                    echo '<h3>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</h3>';

                    echo '<h3>Do you want to change user? <a href="includes/logout.php">Log out</a>.</h3>';
                } else {
                    echo '<h3>Currently logged ' . $logged . '.</h3>';
                    echo "<h3>Do you have an acount? If not <a href='register.php'>register</a></h3>";
                }
                ?> 
            </div>

        </div>
    </div>


</body>
</html>