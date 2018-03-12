<?php
session_start();

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {
  mysqli_select_db($con,'testdb');

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM credentials WHERE email = '" . $email. "'");
$row = mysqli_fetch_array($result);
$hash = $row[3];
//echo strlen($hash);
//$hash = substr( $hash, 0, 60 );

//echo password_verify($password,$hash);
if (password_verify($password, $hash)){
   // if ($row = mysqli_fetch_array($result)) {
        $_SESSION['id'] = $row['a_id'];
     //echo "login";
        $_SESSION['usr_name'] = $row['name'];
    header("Location: hostels3.php");

    } else {
        $errormsg = "Incorrect Email or Password!!!";
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

  <!-- add header -->
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

<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
  <div class="container" style="width:480px; height:500px;">
    <div class="">
        <label for="name">Email</label>
        <input type="text" name="email" placeholder="Enter Email" name="uname" required class="form-control" />
    </div>

    <div class="">
        <label for="name">Password</label>
        <input type="password" name="password" placeholder="Password" name="psw" required class="form-control" />
    </div>

    <input type="submit" name="login" value="Login" />
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form>
<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        New User? <a href="register.php">Sign Up Here</a>
        </div>

</div>

</body>
</html>
