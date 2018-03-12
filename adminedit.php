<?php
/*
session_start();
 $con =  mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
  mysqli_select_db($con,"testdb") or die(mysql_error());
  $uid=$_SESSION['id'];
  */
?>
<html>
  <head>
    <title>Hostel Rector Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/hostels.css">
  <link rel="stylesheet" href="css/adminedit.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img class="logo" src="images/hh_white.png" alt="logo" /></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li>Hello, <!--<?php/*$_SESSION[a_name]*/?>--></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="color: white"><a href="edituserprofile1.php"><span class="glyphicon glyphicon-user"></span> <?php echo  $_SESSION['a_name']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>

    <h2>Showing details for </h2>
    <p>Total Seats:  Vacant Seats:</p>
    <div class="form-con">
    <form action="" method="GET">
      <table border="0" cellspacing="25" cellpadding="25">
        <tr>
          <td>Edit Name:</td>
          <td><input type = "text" value = "" name="a_name"></td>
        </tr>
        <tr>
          <td>Contact:</td>
          <td><input type = "text" value = "" name="a_no"></td>
        </tr>
        <tr>
          <td>Hostel Description:</td>
          <td><textarea name="" value="" rows="6" cols="30"></textarea></td>
        </tr>
        <tr>
          <td><button type="submit">Save</button></td>
          <td><button type="reset">Discard</button></td>
        </tr>
      </table>
    </form>
  </div>
  </body>
</html>
