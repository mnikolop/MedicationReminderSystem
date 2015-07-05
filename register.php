<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid" id="register"> 
    </div>
    <div class="page-header"> <!-- page header: prefered because there was nothing to put in the navibar -->
        <h1>Register with us</h1>

    </div>

    <div class="container-fluid" >
        <div class=" col-md-2" role="complementary">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
                    <ul class="nav bs-docs-sidenav">

                        <li class="">
                            <?php echo '<a href="index.php">Log In</a>'; ?>
                        </li>

                        <li>
                            <a href="#">Back to the top of the Page</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <div class="col-md-6">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->

        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
            method="post" 
            name="registration_form">
            
            <h3>Username: <small>Here inseart the username you want to use for loging in the system</small></h3> <input type='text' name='username' id='username' class="form-control input-lg" /><br>
            <h3>Email: <small>Here inseart the email you want to store in the system</small></h3> <input type="text" name="email" id="email" class="form-control input-lg" /><br>
            <h3>Telephone: <small>here you can add a telephone on which the calla will be made for the therapy reminder</small></h3> <input type="text" name="tel" id="tel" class="form-control input-lg" /><br>
            <h3>Password: <small>Hete type the password you want to use for your log in</small></h3> <input type="password" name="password" id="password" class="form-control input-lg" /><br>
            <h3>Confirm password: <small>Retype the above password </small></h3> <input type="password" name="confirmpwd" id="confirmpwd" class="form-control input-lg" /><br>
            <h3>Capacity: <small>If you want to register as a doctor select Doctor. If you want to regisret as a patient select Patient</small></h3>  <h4> <input type="radio" name="capacity" id="capacity" value="doctor" /> Doctor</h4>
            <h4> <input type="radio" name="capacity" id="capacity" value="patient" /> Patient</h4>
            <br>
            <input type="button" class="btn btn-default btn-lg" value="Register" onclick="return regformhash(this.form,
            this.form.username,
            this.form.email,
            this. form.tel,
            this.form.password,
            this.form.confirmpwd,
            this.form.capacity);" 
            /> 
        </form>
        <h4>Return to the <a href="index.php">login page</a>.</h4>
    </div>
</div>

</body>
</html>