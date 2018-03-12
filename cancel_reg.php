<?php
	session_start();
   $con =  mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysqli_select_db($con,"testdb") or die(mysql_error());
	$uid=$_SESSION['usr_id'];
	
?>

<html>
<head>
	<title>Hostel Hunt </title>
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
          <li style="color: white"><a href="edituserprofile1.php"><span class="glyphicon glyphicon-user"></span> <?php echo  $_SESSION['usr_name']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
<h1>Are you sure you want to cancel your admission</h1>


<button type="button" value="yes" onclick="myFunction1()">Yes</button>
<button type="button" value="No" onclick="myFunction2()">No</button>
</body>
<script>
function myFunction1(){
	window.location="cancel_reg2.php";
}
function myFunction2(){
	window.location="hostels3.php";
}

</script>




</html>