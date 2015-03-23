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
        <div class="col-md-4">
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
            
            <h3>Username:</h3> <input type='text' name='username' id='username' class="form-control input-lg" /><br>
            <h3>Email:</h3> <input type="text" name="email" id="email" class="form-control input-lg" /><br>
            <h3>Password:</h3> <input type="password" name="password" id="password" class="form-control input-lg" /><br>
            <h3>Confirm password:</h3> <input type="password" name="confirmpwd" id="confirmpwd" class="form-control input-lg" /><br>
            <h3>Capacity:</h3>  <h4> <input type="radio" name="capacity" id="capacity" value="doctor" /> Doctor</h4>
            <h4> <input type="radio" name="capacity" id="capacity" value="patient" /> Patient</h4>
            <br>
            <br>
            <input type="button" class="btn btn-default btn-lg" value="Register" onclick="return regformhash(this.form,
            this.form.username,
            this.form.email,
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