<?php 
include $_SERVER['DOCUMENT_ROOT'].'/functions/conn.php';
if(isset($_POST["Submit"])){
  $myusername = $_POST['myusername'];
  $mypassword = md5($_POST['mypassword']);
  
  
  $sql="SELECT id, login_access FROM members WHERE username='$myusername' and password ='$mypassword'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  
  
  $count = mysqli_num_rows($result); //counts number of rows
  
  
  //if result mathched table row must be 1
  if($count == 1){
    if($row['login_access'] == 'Y'){
      session_start();
      $_SESSION['username'] = $myusername;
      $_SESSION['password'] = $mypassword;
      $_SESSION["id"] = $row['id'];
      if($_POST["remember"] == "remember-me"){
        setcookie("User",$myusername,(time() + (86400) * 30));//Sets the cookies for 30 days
        setcookie("id",$row["id"],(time() + (86400) * 30));
        header("location:home.php");
      } else {
        header("location:home.php");
      }
    } else {
      $errMsg = "You've been locked out of your account";
    }
  } else {
    $errMsg = "<script> alert('You entered in the wrong creditentials. Please try again ') </script>";
  }
}


if(isset($_POST["reset"])){
  
  $C_email = $_POST["e_confirm"];
  
  $sql = "select email from members where email ='$C_email'";
  $query = mysqli_query($conn, $sql);
  $find = mysqli_fetch_assoc($query);
  $get = $find["email"];
  $count = mysqli_num_rows($query);
  $NP =  md5($_POST["P_confirm"]);
  $NPC = md5($_POST["NP_confirm"]);
  
  if($count == 1 ) {
    
    if ($NP == $NPC){
      
      $sql2 = "update members set password = '$NPC' where email = '$get'";
      $set = mysqli_query($conn, $sql2);
      
      
    } else {
      
      $errMsg  = "<h2> Your passwords do not match. Please try again </h2>";
    }

  } else {
    
    $errMsg = "<h2> You entered in the wrong creditentials. Please try again </h2>";
  }
  
  unset($_POST["reset"]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imgres_TH0_icon (1).ico">

    <title>Signin</title>

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
    
    <script>
      
        function hide() {
          
          document.getElementById("signin").style.display='none';
          document.getElementById("F_password").style.display='block';
          document.getElementById("F_reset").method = "post";
          
        }
        
          
    </script>

    <div id="signin" class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading" id="brand">Cuban Ventures</h2>
        <input class="form-control" type="text" name="myusername" id="myusername" placeholder="Username" <?php if(isset($_POST["myusername"])){echo "value='".$_POST['myusername']."'";}?>required autofocus>
        <input class="form-control" type="password" name="mypassword" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

        <div class="checkbox">
          <label>
            <input name="remember" type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Login">Sign in</button>
      </form>
    <?php if(isset($errMsg)){echo $errMsg;} ?>
    <button class="btn btn-md btn-link" onclick ="hide();">Forgot Password? </button>
    </div> <!-- /container -->


    <div id="F_password" class="container" style="display:none;"> 
    
      <form id ="F_reset" class="form-signin" >
       
        <h2 class="form-signin-heading" id="brand"> Reset Password </h2>
        
          <input type="email" class="form-control" name="e_confirm" placeholder="Confirm Email" required>  <br />
          
          <input type="password" class="form-control" name="P_confirm" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          <input type="password" class="form-control" name="NP_confirm" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          
          <button class="btn btn-lg btn-warning  btn-block" name="reset" value="reset" >Reset Password</button>
        
      </form>
    
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
