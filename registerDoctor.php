<?php include('constants.php'); ?>
<html>
  <head>
   <title>
    Doctor Registration
  </title>
  <meta name="Sign Up" content="All pharmaceutical and therapeutic treatments in one place. Reminder for those who forget and entertainment for everyone.">
  <meta name="author" content="Markella Nikolopoulou">
  <meta charset="utf-8">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/bootstrap.icon-large.css" rel="stylesheet">
  <link href="css/bootstrap.icon-large.min.css" rel="stylesheet">
  <style type="text/css">
    #element{
    height: 30px;
    }
  </style>
  </head>



    <body>
      <div class="container">
       <div class="wrap">

        <div class="row">
          
          <?php include 'header2.php'; ?>
        </div>
        
    <div class="row">
      <div class="span8">
      <table> 
      <form action='#' method='POST'>
       <tr>
         <h3>Create Your Acount</h3>

         <h3><b> First Name </b></h3>
         <input type="text" name="name" maxlength="30" id="element"/>
         (max 30 characters a-z and A-Z)

         <h3><b> Last Name </b></h3>
         <input type="text" name="surname" maxlength="30" id="element"/>
         (max 30 characters a-z and A-Z)

         <h3><b> Username </b></h3>
         <input type="text" name="username" maxlength="30" id="element"/>
         (max 30 characters a-z and A-Z)

         <h3><b> Password </b></h3>
         <input type="text" name="password" maxlength="30" id="element"/>
         (max 30 characters a-z and A-Z)

         <h3><b> e-mail </b></h3>
         <input type="email" name="email" maxlength="30" id="element"/>

         <h3><b> Telefone </b></h3>
         <input type="tel" name="tel" maxlength="30" id="element"/>

         <h3><b> Address</b></h3>
         <input type="text" name="street" maxlength="30" id="element"/> Street
         <br>
         <input type="text" name="num" maxlength="4" id="element"/> Number
         <br>
         <input type="text" name="city" maxlength="30" id="element"/> City

         <h3><b> Profession/ Spetialty </b></h3>
         <input type="tel" name="profession" maxlength="30" id="element"/>

      </tr>
      <br>
      <tr>
        <a href="doctor.php" class="btn" style="margin-right: 10px">Submit</a>
      </tr>
      </form>
      </table>

      <?php
        if (isset($_POST['username'])){
        $sql='INSERT INTO Doctors (Fname, Lname, DUsername, Pass, Mail, Telefone, Street, Num, City, Spetialty)
        VALUES ("'.$_POST['name'].'","'.$_POST['surname'].'","'.$_POST['username'].'","'.$_POST['password'].'","'.$_POST['email'].'","'.$_POST['tel'].'","'.$_POST['street'].'","'.$_POST['num'].'","'.$_POST['city'].'","'.$_POST['profession'].'")';

        if (!mysqli_query($con,$sql))
        {
          die('Error: ' . mysqli_error($con));
        }
        //echo "1 record added";
        mysqli_close($con);
      }
      ?>

    </div>

    <div class="span4">
     <img src="img/under-construction.jpg" style="height:250;">
  </div>
</div>

		<div id="push"></div>


   <div id="footer">
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>© CyberDoc 2013</p>
  </div>
</div>
</div>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="js/bootstrap.js"></script>


</body>

</html>