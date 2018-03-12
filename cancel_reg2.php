<?php
session_start();
   $con =  mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysqli_select_db($con,"testdb") or die(mysql_error());
	
	$uid = $_SESSION['usr_id'];
	
	mysqli_query($con,"delete from users where uid=".$uid);
	
	echo '<!DOCTYPE html>
<html>
<head><title>Hostel Hunt </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/hostels.css">
</head>
<body>

  <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="hostels3.php"><img class="logo" src="images/hh_white.png" alt="logo" /></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="hostels3.php">Home</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="sitemap.php">Sitemap</a></li>
          <li><a href="contact.php">Contact</a></li>
		  
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="color: white"><a href="edituserprofile1.php"><span class="glyphicon glyphicon-user"></span></a></li>
          
        </ul>
      </div>
    </nav>
	<center><h1 style="padding-top: 200px; color: FORESTGREEN ;">Cancel successfully!</h1>
	<a href="hostels.php">Take me home</a></center>
  </body>
</html>
';


?>