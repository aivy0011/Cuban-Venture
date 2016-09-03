
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

    <link href="sign.css" rel="stylesheet">
    
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

$on = mysqli_connect("localhost", "root", "1234", "test") or die (mysqli_connect_error());

$name = $_SESSION['username'];

$result3 = mysqli_query($on, "SELECT country FROM members WHERE username = '$name' ");


$show3 = mysqli_fetch_assoc($result3);

$country = $show3['country'];

//cities

$result2 = mysqli_query($on, "SELECT DISTINCT cityName FROM airports where countryCode = '$country' ORDER BY cityName asc");

$show2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$stuff2 = '<select class="form-control" name="City" id"City" required>';
foreach ($show2 as $show2) {
	$stuff2.= '<option value = "'.$show2['cityName'] . '">'. $show2['cityName'] . '</option>';
}

$stuff2.= '</select>';
//echo $stuff2;

// hotels

$result = mysqli_query($on, "SELECT * FROM hotel") or die ();

$row = mysqli_num_rows($result);

$show = mysqli_fetch_all($result, MYSQLI_ASSOC);


	$stuff= '<select class="form-control" name="Hotel" id ="Hotel" required>';
	foreach($show as $show) {

		$stuff.=  '<option value = "'. $show['name'] .'">'. $show['name'] . " (". $show['rating'] ."* star )" . '</option>';
 
	}
	$stuff.= '</select>';
	//echo $stuff;







//foreach($show as $show) {
//	echo $show['name'], '<br>';
//}

// print_r($show);
//if ($row == true ) {
//	echo "succes";
//} else {
//	echo "error";
//}
?>





   
   <form  class="form-signin" method="post" action="cart.php">

  	<?php echo $stuff2; ?>
	<br />
  	<?php echo $stuff; ?>
  <br />
  	<input type="number" min ="1" step = "1" name="Travelers" id="Travelers" class="form-control" placeholder ="How many people?" required >
	 <br />
 		<input type="number" min ="1" step = "1" name="Duration" id="Duration" class="form-control" placeholder ="How many days?" required >
 	  <br />
 
  	<input type="date" min="current" name="Arrival" id="Arrival" class="form-control" required>
    <br />
    <input type="date" min="current" name="Departure" id="Departure" class="form-control"  required>
  	 <br />
	
  	<input class="btn btn-lg btn-primary btn-block" type ="submit" name ="submit" value="Book Now" onclick = "check()">
   </form>

  <script type="text/javascript">
    
    function check() {
      alert("Double check your info, before you decide to continue");
    }
  </script>
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
