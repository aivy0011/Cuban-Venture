<?php
include "layout/header.php";
$tomorrow = new DateTime('tomorrow');

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
  	<input type="date" min="<?php echo date(Y).'-'.date(m).'-'.date(d);?>" name="Arrival" id="Arrival" class="form-control" required>
    <br />
    <input type="date" min="<?php echo $tomorrow->format('Y-m-d');?>" name="Departure" id="Departure" class="form-control"  required>
  	 <br />
	
  	<input class="btn btn-lg btn-primary btn-block" type ="submit" name ="submit" value="Book Now" onclick = "check()">
   </form>

  <script type="text/javascript">
    
    function check() {
      alert("Double check your info, before you decide to continue");
    }
  </script>
     
     

    </div>
<!-- /.container -->

   <!-- FOOTER -->
      <footer>
        <p>&copy; 2015 Cuban Ventures, Inc. &middot; <a href="../terms.php">Terms</a></p>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>