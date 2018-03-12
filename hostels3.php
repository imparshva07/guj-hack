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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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
		  <li><a href="results.php">Results</a></li>
		  <li><a href="cancel_reg.php">Cancel admission</a></li>
		 <!-- <li><button style="color:white;background:none;border:none;margin-top:24px;	" onclick="myFunction1()">Cancel Admission</button></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="color: white"><a href="edituserprofile1.php"><span class="glyphicon glyphicon-user"></span> <?php echo  $_SESSION['usr_name']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <h3 class="title"><?php echo $_SESSION['usr_name']; ?>, Search Hostels here</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <!--<input type="text" name="query" />
          <input type="submit" value="Search" />-->
		  <label>Search hostels for </label>
			<input type="radio" name="gquery" value = "Female" />Girls
			<input type="radio" name="gquery" value = "Male" />Boys
		  <br />
		  <label>Select your city:</label><select name="cquery">
		  <option value = "any">Anywhere</option>
		  <option value = "Rajkot">Rajkot</option>
		  <option value = "Vallabh Vidyanagar">Vallabh Vidyanagar</option>
		  <option value = "Ahmedabad">Ahmedabad</option>
		  <option value = "Surat">Surat</option>
		  </select>
		  <br />
		  <input type="submit" value="Search" />
		  
      </form>
	  <?php
	if(isset($_GET['gquery']) && isset($_GET['cquery'])){
    $gquery = $_GET['gquery'];
	$cquery = $_GET['cquery'];
	
    $min_length = 1;
    if(strlen($cquery) >= $min_length){
        $cquery = htmlspecialchars($cquery);
		
		
		$raw_results = mysqli_query($con,"SELECT * FROM `hostel` where (`city` LIKE '".$cquery."') AND (`gender` LIKE '".$gquery."')") or die(mysql_error());
        /*$raw_results = mysqli_query($con,"SELECT * FROM credentials
            WHERE (`name` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%')") or die(mysql_error());*/
			if($cquery == "any")
		{
			$raw_results = mysqli_query($con,"SELECT * FROM `hostel` where (`gender` LIKE '%".$gquery."')");
			
		}
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
		
			
            while($results = mysqli_fetch_array($raw_results)){
				$hid=$results['hid'];
		
                $name=$results['name'];
                //$description=$results['description'];
                $address=$results['address'];
                $city=$results['city'];
                $contact=$results['contact'];
				
				//echo $name . $address . $city . $contact;
              //  echo "<p><h3>".$results['name']."</h3>".$results['email']."</p>";
              echo '<div class="container"><div class="hostel-card">
                  <img src="https://picsum.photos/200/200/?random" class="hostel-img" />
                  <h3 class="hostel-name">'.$name.'</h3>
                  <p class="hostel-description">Maruti Paying Guest, as the name implies, offers excellent PG facility for clients looking
          for a place to stay in Ahmedabad, India. We specialise in renting fully-furnished AC and non-AC
          rooms for both men and women at competitive rates. Contact us for any queries</p>
                  <p><span class="glyphicon glyphicon-map-marker"></span>'.$address.'</p>
                  <p><span class="glyphicon glyphicon-phone"></span><a href="tele:7949081529">'.$contact.'</a></p>
                <button onclick="fun('.$hid.','.$uid.')">More</button>
				</div></div>';
				
				
				
				unset($_POST['gquery']);
				unset($_POST['cquery']);
            }
			echo '<a href = "hostels3.php"><button id = "clear" type="button">Clear</button></a>';

        }
        else{
            echo "No hostels";
        }
    }
    else{
        echo "Minimum length is ".$min_length;
    }
	} 	
?>
	

    </div>
  <script type="text/javascript">
	function fun(hid,uid){
		
		window.location="hostelinfo1.php?hid="+hid+"&uid="+uid;
		
	}
	</script>
<script type="text/javascript">
function myFunction1(){
	window.location = "cancel_reg.php";
}

</script>
 <!-- 
  function myFunction(){u
var r = confirm("Are you sure you want to cancel your admission?");
if (r == true) {
    window.location = 'cancel_reg.php';
} else {
   document.location.href = 'login.php';
}
  }
	<!?php-->
	  </body>
</html>
		