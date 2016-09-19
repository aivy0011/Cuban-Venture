<?php
 include "layout/header.php";
 $conn = mysqli_connect("localhost","root","1234","test");

$City =  $_POST['City'];

$sql = "SELECT name FROM airports WHERE cityName='$City'";

$result = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($result);
$airport = $fetch['name'];
$Hotel = $_POST["Hotel"];
//get rating 

$result2 = mysqli_query($conn,"SELECT rating FROM hotel WHERE name = '".$_POST['Hotel']."'");
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
$departure = $_POST['Departure'];
$arrival = $_POST['Arrival'];

$_SESSION['airport']=$airport;
$_SESSION['arrival']=$departure;
$_SESSION['City']=$City;
$_SESSION['departure']= $arrival;
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
              <p><form action="functions/checkout.php" >
                 <input class="btn btn-lg btn-primary btn-block" type="submit" value="Checkout" name="submit" >

            </form></p>
            <p><form action="booking.php" >
                 <input class="btn btn-lg btn-primary btn-block" type="submit" value="Return" name="Return" >

            </form></p>
            
              <button class="btn btn-lg btn-primary btn-block" onclick="window.print();"> Print </button>

            </div><!--/.col-xs-6.col-lg-4-->
          </div><!--/row-->
          <?php include "footer.php" ?>
        </div><!--/.col-xs-12.col-sm-9-->



