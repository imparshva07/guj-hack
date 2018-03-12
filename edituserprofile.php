<?php
session_start();

/*if(isset($_SESSION['usr_id'])) {
    header("Location:index.php");
}*/

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['edit'])) {
	$id = $_SESSION['usr_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $caste = mysqli_real_escape_string($con, $_POST['caste']);
    $percentage = $_POST['percentage'];
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $uaddress = mysqli_real_escape_string($con, $_POST['home_address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
   
  
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/(7|8|9)\d{9}/",$contact)) {
        $error = true;
        $contact_error = "Mobile number is not in correct format";
    }
    /*if (!preg_match("/[0-100]/",$percentage)) {
        $error = true;
        $percentage_error = "Percentage should be in between 0 and 100";
    }*/
	
	
    if (!$error) {
		echo "INSERT INTO users VALUES (" . $id . ", '" . $name . "', '" . $gender . "',
					'" . $caste ."', " . $percentage ."," . $contact . ", '" . $uaddress ."', '" . $city. "');";
		echo "in if";
		mysqli_select_db($con,'testdb');
				if(mysqli_query($con, "INSERT INTO users VALUES (" . $id . ", '" . $name . "', '" . $gender . "',
					'" . $caste ."', " . $percentage ."," . $contact . ", '" . $uaddress ."', '" . $city. "');")) {
						
						//if(mysqli_query($con, "INSERT INTO users VALUES(".$_POST["id"].",'".$_POST["name"]."','".$_POST["gender"]."','".$_POST["caste"]."',".$_POST["percentage"].",".$_POST["contact"].",
						//'".$_POST["uaddress"]."','".$_POST["city"]."')"){
							

		
		$successmsg = "Successfully Edited!"; /*<a href='.php'>Click here to Login</a>";*/
		unset($name);
    unset($gender);
    unset($caste);
    unset($percentage);
    unset($contact);
    unset($home_address);
    unset($city);


        } else {
            $errormsg = "Error in editing...Please try again later!";
        }
    }
}
?>
<html lang="en-US">

	<head>
		<title>Edit User Profile</title>
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
          <li><a href="hostels3.php">Home</a></li>
          <li><a href="faqs.php">FAQs</a></li>
          <li><a href="sitemap.php">Sitemap</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="color: white"><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo  $_SESSION['usr_name']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
		<form name="edituserprofile" method="post" action="">
			<table align="center" border="0" cellspacing="25px" cellpadding="25px" width="80">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" required/>
				</tr>
				<tr>						
					<td>Gender</td>
					<td><input type="radio" name="gender" value = "Male">Male
						<input type="radio" name="gender" value = "Female">Female</td>
				</tr>
				<tr>
					<td>Caste</td>
					<td>
						<select name="caste">
							<option value="Open">General</option>
							<option value="SC">Scheduled Caste</option>
							<option value="ST">Scheduled Tribe</option>
							<option value="SEBC">Socially and Educationally Backward Classes</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Percentage</td>
					<td><input type="text" name="percentage" required/>
				</tr>
				<tr>
					<td>Contact</td>
					<td><input type="text" name="contact" required/></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><textarea rows="6" cols="40" name="home_address" required></textarea></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="city" placeholder="Enter your city" required/>
				</tr>
				<br />
				<tr>
					<td><button type="submit">Save</button></td>
					<td><button type="reset">Discard</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>