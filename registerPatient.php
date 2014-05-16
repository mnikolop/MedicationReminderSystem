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
                <h3>Create Your Acount</h3>
                
                <h3><b> First Name </b></h3>
                <input type="text" name="name" maxlength="30" id="element"/>
                (max 30 characters a-z and A-Z)

                <h3><b> Last Name </b></h3>
                <input type="text" name="surname" maxlength="30" id="element"/>
                (max 30 characters a-z and A-Z)

                <h3><b> e-mail </b></h3>
                <input type="email" name="email" maxlength="30" id="element"/>
                
                <h3><b> Username </b></h3>
                <input type="text" name="username" maxlength="30" id="element"/>
                (max 30 characters a-z and A-Z)

                <h3><b> Password </b></h3>
                <input type="text" name="password" maxlength="30" id="element"/>
                (max 30 characters a-z and A-Z)
                
                <h3><b> Telefone </b></h3>
                <input type="tel" name="tel" maxlength="30" id="element"/>

                <h3><b> Address</b></h3>
                <input type="text" name="street" maxlength="30" id="element"/> Street
                <br>
                <input type="text" name="num" maxlength="4" id="element"/> Number
                <br>
                <input type="text" name="city" maxlength="30" id="element"/> City

                <h3><b> Date of Birth</b></h3>
                <select name="day" id="Birthday_Day">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <br>
                <select  name="month" id="Birthday_Month">
                  <option value="-1">Month:</option>
                  <option value="January">Jan</option>
                  <option value="February">Feb</option>
                  <option value="March">Mar</option>
                  <option value="April">Apr</option>
                  <option value="May">May</option>
                  <option value="June">Jun</option>
                  <option value="July">Jul</option>
                  <option value="August">Aug</option>
                  <option value="September">Sep</option>
                  <option value="October">Oct</option>
                  <option value="November">Nov</option>
                  <option value="December">Dec</option>
                </select>
                <br>
                <select name="year" id="Birthday_Year">
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option> 
                  <option value="1989">1989</option>
                  <option value="1988">1988</option>
                  <option value="1987">1987</option>
                  <option value="1986">1986</option>
                  <option value="1985">1985</option>
                  <option value="1984">1984</option>
                  <option value="1983">1983</option>
                  <option value="1982">1982</option>
                  <option value="1981">1981</option>
                  <option value="1980">1980</option>
                </select>

                <h3><b> Profession/ Spetialty </b></h3>
                <input type="tel" name="profession" maxlength="30" id="element"/>

                <h3><b>Gender</b></h3>
                Male <input type="radio" name="gender" value="Male" />
                Female <input type="radio" name="gender" value="Female" />

                <h3><b> AMKA </b></h3>
                <input type="text" name="amka" maxlength="30" id="element"/>
              </tr>
              <br>
              <br>

              <tr>
                <a href="patient.php" class="btn btn-info">Submit</a>
              </tr>
              </form>
            </table>
            <?php
             if (isset($_POST['username'])){
                $sql='INSERT INTO patients (Fname, Lname, PUsername,Pass, Mail, Street, Num, City, Telephone, Day, Month, Year, Gender)
                  VALUES ("'.$_POST['name'].'","'.$_POST['surname'].'","'.$_POST['username'].'","'.$_POST['password'].'","'.$_POST['email'].'","'.$_POST['street'].'","'.$_POST['num'].'","'.$_POST['city'].'","'.$_POST['tel'].'","'.$_POST['day'].'","'.$_POST['month'].'","'.$_POST['year'].'","'.$_POST['gender'].'")';

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