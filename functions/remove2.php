<?php 

 include "conn.php";

$C_id = $_POST['C_id'];

$sql = "delete from payment where c_number = '$C_id'"; 

$query = mysqli_query($conn, $sql);

header('location:../manage.php');
?>