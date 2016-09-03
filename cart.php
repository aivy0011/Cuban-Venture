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
    <link href="main.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Cuban Travel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Home</a></li>
            <li><a href="about.php">Our Company</a></li>
            <li class="active"><a href="booking.php">Booking</a></li>
            <li><a href="helpdesk.php">Help Desk</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php 
session_start();
 
 $conn = mysqli_connect("localhost","root","1234","test");

$City =  $_POST['City'];

$sql = "SELECT name FROM airports WHERE cityName='$City'";

$result = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($result);
$airport = $fetch['name'];

//get rating 

 $Hotel = $_POST['Hotel'];

 $sql2 = "SELECT rating FROM hotel WHERE name = '$Hotel'";

$result2 = mysqli_query($conn,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);
$r = $fetch2['rating'];

//price 

$b_price = 50;
$num_p = $_POST['Travelers'];
$dur = $_POST['Duration'];
$rate = $fetch2['rating']/3;

$price = $b_price * $num_p * $rate * $dur ;
$price = round($price);
//echo $price;

// dates 
$departure2 = $_POST['Departure'];
$depature = $_POST['Departure'];
$arrival = $_POST['Arrival'];

$_SESSION['airport']=$airport;
$_SESSION['arrival']=$arrival;
$_SESSION['City']=$City;
$_SESSION['departure']= $departure2 ;
$_SESSION['dur']=$dur;
$_SESSION['Hotel']=$Hotel;
$_SESSION['num_p']=$num_p;
$_SESSION['price']=$price ;



?>
<div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
         
          <div class="jumbotron">
            <h1><?php echo $_SESSION['username'] ; ?> </h1>Take a second to ensure that this information is correct!! </h1>
            <p></p>
          </div>
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <h2>Your Cart</h2>
              <p></p>
              <p></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2></h2>
              <p>You will be depating from <?php echo $airport; ?> in <?php echo $City; ?></p>
              <p></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2></h2>
              <p> Number of travelers <?php echo $num_p; ?> </p>
              <p></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2></h2>
              <p>  Name of hotel <?php echo $Hotel ?>  your hotels has a  <?php echo $r ?> star rating </p>
              <p></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2></h2>
              <p>Your trip is scheduled to take place from the <?php echo $arrival; ?> to the <?php echo $depature?> </p>
              <p></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2></h2>
              <p><h3>Your total is $<?php echo $price ?> </h3> </p>
              <p><form action="checkout.php" >
                 <input class="btn btn-lg btn-primary btn-block" type="submit" value="Checkout" name="submit" >

            </form></p>
            <p><form action="booking.php" >
                 <input class="btn btn-lg btn-primary btn-block" type="submit" value="Return" name="Return" >

            </form></p>
            </div><!--/.col-xs-6.col-lg-4-->
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
<!-- <table> 

<th>My Cart </th>

	<tr> 

		<td> <h1><?php echo $_SESSION['username'] ; ?> </h1>Take a second to ensure that this information is correct!! </td>

	</tr>

<br />

	<tr> 

		<td> Your trip is scheduled to take place from the <?php echo $arrival; ?> to the <?php echo $depature?> </td>

	</tr>

	<tr> 

		<td> You will be depating from <?php echo $airport; ?> in <?php echo $City; ?>  </td>

	</tr>


	<tr> 

		<td> Number of travelers <?php echo $num_p; ?> </td>

	</tr>

	<tr> 

		<td> Name of hotel <?php echo $Hotel ?>  your hotels has a  <?php echo $r ?> star rating </td>

	</tr>

	<tr> 

		<td> <h3>Your total is $<?php echo $price ?> </h3> </td>

	</tr>
</table>

<form action="checkout.php" >
	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Checkout" name="submit" >

</form>

--!>

 <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Cuban Ventures, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
<!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
