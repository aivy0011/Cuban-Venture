<?php 

$host = "localhost";
$username = "root";
$password = "1234";
$db_name = "test";
$tbl_name = "members";

//conect to sever and select database. 

$conn = mysqli_connect("$host","$username","$password","$db_name") or die("cannot connect ");
//mysqli_select_db("") or die("cannot select DB");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//username and password sent from form 
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];


$sql="SELECT id FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result); //counts number of rows


//ir result mathched table row must be 1
if($count == 1 ) {

//session_register("myusername");
//session_register("mypassword"); 
session_start();
$_SESSION['username'] = $myusername ;
$_SESSION['password'] = $mypassword ;
	
header("location:home.php");

	
	
}
else {
	$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imgres_TH0_icon (1).ico">

    <title>Cuban Ventures</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="temp.css" rel="stylesheet">

    <!-- Just for debugging purposes. Dont actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cuban Ventures</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Sorry your login information was incorrect plaese try again</h1>
            <p class="lead"></p>
            <p class="lead">
              <a href="login.php" class="btn btn-lg btn-default">Login</a>
              <a href="register.php" class="btn btn-lg btn-default">Signup</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p> <a href="">Cuban Ventures, INC.</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    
  </body>
</html>
';
echo $html;
	
}
//header("location:login_success.php");

//else {
//echo "Wrong Username or Password";
//}



?>