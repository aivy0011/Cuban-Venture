<?php 

$conn = mysqli_connect('localhost','root','1234','test');


if(isset($_POST["Submit"] == "Login")){
  
  $myusername = $_POST['myusername'];
  $mypassword = $_POST['mypassword'];
  
  
  $sql="SELECT id FROM members WHERE username='$myusername' and password ='$mypassword'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //$active = $row['active'];
  
  $count = mysqli_num_rows($result); //counts number of rows
 
  echo $count;
  
  
  //if result mathched table row must be 1
  if($count == 1 ) {
  
    session_start();
    $_SESSION['username'] = $myusername;
    $_SESSION['password'] = $mypassword;
    $_SESSION["id"] = $row['id'];
    if($_POST["remember"] == "remember-me"){
      setcookie("User",$myusername,(time() + (86400) * 30));//Sets the cookies for 30 days
      //setcookie("id",$row["id"],(time() + (86400) * 30));
      header("location:home.php");
    } else {
      header("location:home.php");
    } 	
  } else {
    //$errMsg = "<script> alert('You entered in the wrong creditentials. Please try again ') </script>";
  }
}

?>

 <div id="signin" class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading" id="brand">Cuban Ventures</h2>
        <input class="form-control" type="text" name="myusername" id="myusername" placeholder="Username" required >
        <input class="form-control" type="password" name="mypassword" id="mypassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

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