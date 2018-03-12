<?php
session_start();

/*if(isset($_SESSION['usr_id'])) {
    header("Location:index.php");
}*/

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;
	mysqli_select_db($con,'testdb');
	
	$hid=$_SESSION['hid'];
	$uid=$_SESSION['uid'];
	
	$result = mysqli_query($con, "SELECT percentage,distance FROM users WHERE uid = " . $uid);
	$row = mysqli_fetch_array($result);
	$percentage = $row['percentage'];
	$distance = $row['distance'];
	
	
	if($percentage == 0 || $distance == 0)
	{
		echo "You have not completed your profile".'<br>';
		echo '<a href="edituserprofile1.php">Edit profile</a>';
	}
	else
	{
		//echo "You have successfully applied";
		$score  = (($percentage*30) + ($distance*70))/100;
		$query = mysqli_query($con,"INSERT INTO application(score,hid,uid) VALUES(".$score.",".$hid.",".$uid.")");
		header("Location:success.php");
		
	}
	
		
	
		
?>
	