<?php
session_start();

/*if(isset($_SESSION['usr_id'])) {
    header("Location:index.php");
}*/

include_once 'dbconnect.php';
//set validation error flag as false
$error = false;
	mysqli_select_db($con,'testdb');
	echo '
	<table align="center" border="1" cellspacing="15px" cellpadding="15px" width="50" style="border-collapse:collapse">
				<tr>
					<th>Hostel</th>
					<th>Applied Users</th>
					<th>Status</th>
					<th>Caste</th>
					<th>Remarks</th>
					<th>Consolidated Score</th>
					

				</tr>';
	$result1=mysqli_query($con,"SELECT * FROM hostel"); 
	//$result1 = mysqli_query($con,"SELECT * FROM users");

	if(mysqli_num_rows($result1) > 0){ // if one or more rows are returned do following
		
	while($results1 = mysqli_fetch_array($result1)){
		$hid=$results1['hid'];
		$hostel=$results1['name'];
		$query1 = mysqli_query($con,"Select vacancies from hostel where hid=".$hid);
		$row=mysqli_fetch_array($query1);
		$vac= $row['vacancies'];
	
		$result2=mysqli_query($con,"SELECT uid FROM application where hid=".$hid." ORDER BY score desc LIMIT 0,".$vac);
	//$row=mysqli_fetch_array($result);
		if(mysqli_num_rows($result2) > 0){ // if one or more rows are returned do following
			
		while($results2 = mysqli_fetch_array($result2)){
			$hostel=$results1['name'];
				$uid=$results2['uid'];
				$search= mysqli_query($con,"Select name,caste from users where uid=".$uid);
				$query2 = mysqli_query($con,"Select score from application where uid=".$uid);
				$row=mysqli_fetch_array($search);
				$row2=mysqli_fetch_array($query2);
				$user= $row['name'];
				$caste = $row['caste'];
				$status="Allocated";
				$remark="Congratulations";
				$score=$row2['score'];
		
		
		echo '<tr>						
						<td>'.$hostel.'</td>
						<td>'.$user.'</td>
						<td>'.$status.'</td>
						<td>'.$caste.'</td>
						<td>'.$remark.'</td>
						<td>'.$score.'</td>
						
					</tr>';
		}}
		$result3=mysqli_query($con,"SELECT uid FROM application where hid=".$hid." ORDER BY score desc LIMIT ".$vac.",10" );
			if(mysqli_num_rows($result3) > 0){ // if one or more rows are returned do following
				
			while($results3 = mysqli_fetch_array($result3)){
				$hostel=$results1['name'];
				$uid=$results3['uid'];
				$search= mysqli_query($con,"Select name,caste from users where uid=".$uid);
				$query2 = mysqli_query($con,"Select score from application where uid=".$uid);
				$row=mysqli_fetch_array($search);
				$row2=mysqli_fetch_array($query2);
				$user= $row['name'];
				$caste = $row['caste'];
				$status="Waiting";
				$remark="You are in WL - We will notify you, if allocated.";
				$score=$row2['score'];
				echo '<tr>						
						<td>'.$hostel.'</td>
						<td>'.$user.'</td>
						<td>'.$status.'</td>
						<td>'.$caste.'</td>
						<td>'.$remark.'</td>
						<td>'.$score.'</td>
						
					</tr>';
				//echo $username ."  " .  $caste .'</br>';
			}}}}
	echo '</table>';
?>
