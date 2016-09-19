<?php 

 include "conn.php";

$order_id = $_POST['Order_id'];

$sql = "delete from trip where Order_id = '$order_id'"; 

$query = mysqli_query($conn, $sql);

header('location:../trips.php');
?>