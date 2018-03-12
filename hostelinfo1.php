<?php
session_start();
include_once 'dbconnect.php';
//check if form is submitted
//if (isset($_POST['login'])) {
	mysqli_select_db($con,'testdb');

    //$hid = $_SESSION['hid'];
	$hid=$_REQUEST['hid'];
	$uid=$_REQUEST['uid'];
	$_SESSION['uid'] = $uid;
	$_SESSION['hid'] = $hid;

	//echo $hid;
	//echo $uid;
    $result = mysqli_query($con, "SELECT * FROM hostel WHERE hid = ".$hid);
    $row = mysqli_fetch_array($result);
    $name=$row[1];
    $gender=$row[2];
    $address=$row[3];
    $city=$row[4];
    $contact=$row[5];
    $fees=$row[6];
	$vac=$row[7];
    $mess=$row[8];
    
//}
?>

<html>
<head>
<link rel="stylesheet" href="css/hostelinfo.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/hostels.css">
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
          <li><a href="hostels3.php">Home</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="sitemap.php">Sitemap</a></li>
          <li><a href="contact.php">Contact</a></li>
		  <li><button style="background-color: rgba(0,0,0,0); border: none; color: grey; font-weight: bold; position: relative; bottom: -13px; font-size: 1.2em" onclick="myFunction1()">Cancel</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="color: white"><a href="edituserprofile1.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usr_name'] ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
<div class="main-div">
<figure>
<img src="https://dummyimage.com/300x200/000/fff" width = "500px" height = "400px" class="hostel-image" />
	<div style="    text-align: center; width: 450px;
">
</figure><!--Fetched data should be echoed after </span> tag -->
<div class="hostel-info">
<h2><?php if (isset($name)) { echo $name; } ?></h2>
<h4>Hostel For <?php if (isset($gender)) { echo $gender; } ?> Only</h4><!--Gender-->
<p class="inc-size">Maruti Paying Guest, as the name implies, offers excellent PG facility for clients looking for a place to stay in Ahmedabad, India. 
We specialise in renting fully-furnished AC and non-AC rooms for both men and women at competitive rates. Contact us for any queries.</p>
<p class="inc-size"><span class="glyphicon glyphicon-map-marker"></span><?php if (isset($address)) { echo $address; } ?></p>
<h4><?php if (isset($city)) { echo $city; } ?></h4>
<p class="inc-size"><?php if (isset($vac)) { echo $vac; } ?> Vacancies</p>
<p class="inc-size"><span class="glyphicon glyphicon-phone"></span><?php if (isset($contact)) { echo $contact; } ?></p>
<p class="inc-size">Rs. <?php if (isset($fees)) { echo $fees; } ?> / sem</p>
<p class="inc-size">Mess Available</p>
<button  onclick="myFunction()">Apply</button>
</div>
</div>
<script>
function myFunction(){
	
	window.location="apply.php";
	
}

</script>
</body>
</html>