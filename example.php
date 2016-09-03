<?php 

$conn = mysqli_connect("localhost","root","1234","test");

if (mysqli_connect_error() == false){

	echo "connection successful";
} else {
	echo "connection failed";
}

//$sql = ;

$result = mysqli_query($conn, "SELECT * FROM  countries");

$show = mysqli_fetch_all($result, MYSQLI_ASSOC);

	echo $show;

?>