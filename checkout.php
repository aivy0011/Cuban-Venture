
<?php 

session_start();
 $conn = mysqli_connect("localhost","root","1234","test");
$username = $_SESSION['username'];
$airport = $_SESSION['airport'] ;
$arrival = $_SESSION['arrival'];
$City = $_SESSION['City'];
$departure = $_SESSION['departure'];
$dur = $_SESSION['dur'];
$Hotel = $_SESSION['Hotel'];
$num_p = $_SESSION['num_p'];
$username = $_SESSION['username'];
$price = $_SESSION['price'];


 $sql3 = "INSERT trip SET Airport= '$airport', Arrival ='$arrival' ,City ='$City', Departure ='$departure', Duration ='$dur', Hotel ='$Hotel', Travelers ='$num_p', Username='$username', price = '$price'";

$update = mysqli_query($conn,$sql3);

header("location:home.php");


