<?php include('constants.php'); ?>
<?php include ('header2.php'); ?>
<html>
<head>
 <title>
  Sign Up
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
        <div class="span8">
        <table>
          <form action='#' method='GET'>
            <tr>
              <h3>Confirm Your Acount</h3>

              <h3><b> Username </b></h3>
              <input type="text" name="Username" maxlength="30" id="element"/>
              (max 30 characters a-z and A-Z)

              <h3><b> Password </b></h3>
              <input type="text" name="Password" maxlength="30" id="element"/>
              (max 30 characters a-z and A-Z)

              <h3><b> Confirmation Code </b></h3>
              <input type="text" name="code" maxlength="30" id="element"/>
              (max 30 characters a-z and A-Z)
            </tr>
            <br>
            <br>

            <tr>
              <a href="patient.php" class="btn btn-info">Submit</a>
            </tr>
          </form>
        </table>
        <?php
        if (isset($_SESSION['code'])){ 

          $q='SELECT * FROM Patients WHERE PUsername="'.$_GET['Username'].'";';
          $ret=mysql_query($q,$db);
          while ($row=mysql_fetch_array($ret)){
            echo "looking<br/>";
            header('Location:patient.php'); 
            if ($row['Pass']==$_GET['pass'])
            {
             $_SESSION['user']=$_GET['user'];
             $_SESSION['name']=$row['Lname'];

             header('Location:patient.php');   
           }
            echo"wrong username or password"; 
            die();
         }
       }
           


       ?>
     </div>

  <div class="span4">
     <img src="img/under-construction.jpg" style="height:250;">
  </div>
</div>
     <div id="footer">
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>© CyberDoc 2013</p>
    </div>
  
</div>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="js/bootstrap.js"></script>


</body>

</html>