
<?php 

$conn = mysqli_connect("localhost","root","1234","test");

$sql = "SELECT * FROM countries ";

$results = mysqli_query($conn,$sql);

$show = mysqli_fetch_all($results, MYSQLI_ASSOC);

$country = '<select  class="form-control"  name="country" id="country" class="form-control" required autofocus>';
foreach($show as $show) {
  $country.= '<option value="' . $show['alpha_2'] . '">'. $show['name'] . '</option>';
}
$country.= '</select>';
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

    <title>Signup</title>
    
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signup.css" rel="stylesheet">

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

    <div class="container">

      <form class="form-signin" method="post" action="functions/checkregister.php">
        <h2 class="form-signin-heading" id="brand">Cuban Ventures</h2>
        <br />
        <input type="text" name="f_name" id="F_name" class="form-control" placeholder="First Name" required autofocus>
        <br />
        <input type="text" name="l_name" id="L_name" class="form-control" placeholder="Last Name" required autofocus>
        <br />
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
        <br />
        <input type="text" name="myusername" id="myusername" class="form-control" placeholder="Username" required autofocus>
        <br />
        <input type="password" name="mypassword" id="mypassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
        <br/>
        <input type="password" name="c_mypassword" id="c_mypassword" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" required>
        <br />
        <?php echo $country; ?> 

        <div class="checkbox">
          <label>
            <input type="checkbox" value="1" id="terms" name="terms" required> I accept the terms of agreement

          </label> 
          <label>
          <input type="checkbox" value="1" id="age" name="age" required> I am 18 years +
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="signup">Sign up</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
