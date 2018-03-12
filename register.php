<?php
session_start();



include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
		mysqli_select_db($con,'testdb');
		/*$query = "INSERT INTO users VALUES('$name','$email','$password')";
		$res = mysqli_query($con,$query);*/
//$hash = crypt($password);

	/*$random = openssl_random_pseudo_bytes(18);
	$salt = sprintf('$2y$%02d$%s',13, // 2^n cost factor substr(strtr(base64_encode($random), '+', '.'), 0, 22));

	$hash = crypt($password, $salt);*/

	$hash = password_hash($password, PASSWORD_DEFAULT);

		if(mysqli_query($con, "INSERT INTO credentials(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . $hash . "')")) {
       // if($res){
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			unset($name);
			unset($email);
			unset($pass);
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
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
        <a class="navbar-brand" href="index.php"><img class="logo" src="images/hh_white.png" alt="logo" /></a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="faqs.php">FAQs</a></li>
        <li><a href="sitemap.php">Sitemap</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav> <!--end of header -->


<div class="container" style="width:480px; height:500px;">
    <div class="">
        <div class="">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">

                    <div class="">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <div class="">
                        <button type="submit" name="signup">Register</button>
                    </div>
            </form>
            <span class=""><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class=""><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>
</div>
</body>
</html>
