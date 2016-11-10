<?php 

include $_SERVER['DOCUMENT_ROOT'].'/functions/conn.php';
if(isset($_POST["Submit"])){
  $myusername = $_POST['myusername'];
  $mypassword = $_POST['mypassword'];
  
  
  $sql="SELECT AD_ID FROM Admin WHERE username='$myusername' and password ='$mypassword'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $active = $row['active'];
  
  $count = mysqli_num_rows($result); //counts number of rows
  
  
  //if result mathched table row must be 1
  if($count == 1 ) {
  
    session_start();
    $_SESSION['username'] = $myusername;
    $_SESSION['password'] = $mypassword;
    $_SESSION["id"] = $row['AD_ID'];
    header("location:admin_home.php");
    } 	
  } else {
    $errMsg = "<script> alert('You entered in the wrong creditentials. Please try again ') </script>";
  }


?>


<html lang="en">
    
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imgres_TH0_icon (1).ico">

    <title>Admin Signin</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    

    <div id="signin" class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading" id="brand">Cuban Ventures</h2>
        <input class="form-control" type="text" name="myusername" id="myusername" placeholder="Admin Username" required autofocus>
        <input class="form-control" type="password" name="mypassword" id="password" placeholder="Admin Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Login">Sign in</button>
      </form>
    <?php if(isset($errMsg)){echo $errMsg;} ?>
    </div> <!-- /container -->
