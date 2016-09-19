<?php 


session_start();


$submit = $_POST['submit'];

$user = $_SESSION['username'];


function C_user () {


include "conn.php";

$C_username = $_POST['C_username'];

$N_username = $_POST['N_username'];

$NC_username = $_POST['NC_username'];

$sql = "UPDATE members SET username = '$NC_username' WHERE username = '$C_username' ";

$query = mysqli_query($conn, $sql);

$_SESSION["username"] = $N_username;

header('location: ../manage.php');


}


function C_pass () {

include "conn.php";

$N_username = $_SESSION["username"];

$sql1 = "select id from members where username = '$N_username'";

$result = mysqli_query($conn, $sql1);

$show = mysqli_fetch_assoc($result);

$id = $show["id"];

$C_password = $_POST['C_password'];

$N_password = $_POST['N_password']; 

$NC_password = $_POST['NC_password'];

$sql = "UPDATE members set password = '$N_password' where  id = '$id'";

$query = mysqli_query($conn, $sql);

header('location: ../manage.php');

}


function C_email () {

include "conn.php";

$N_username = $_SESSION["username"];

$sql1 = "select id from members where username = '$N_username'";

$result = mysqli_query($conn, $sql1);

$show = mysqli_fetch_assoc($result);

$id = $show["id"];

$C_email = $_POST['C_email'];

$N_email = $_POST['N_email'];

$NC_email = $_POST['NC_email'];

$sql = "UPDATE members set email = '$N_email' where id = '$id'";

$query = mysqli_query($conn, $sql);

header('location: ../manage.php');

}


switch ($submit) {

case "1" : 

C_user();

break;

case "2" :

C_pass();

break; 

case "3" : 

C_email();

break;


}




?>