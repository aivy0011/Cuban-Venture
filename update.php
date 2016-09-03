<?php 


session_start();


$submit = $_POST['submit'];

$user = $_SESSION['username'];


function C_user () {


include 'conn.php';

$C_username = $_POST['C_username'];

$N_username = $_POST['N_username'];

$NC_username = $_POST['NC_username'];

$sql = "UPDATE members SET username = '$NC_username' WHERE username = '$C_username' ";

$query = mysqli_query($conn,$sql2);

header('location:index.php');


}


function C_pass () {


$C_password = $_POST['C_password'];

$N_password = $_POST['N_password'];

$NC_password = $_POST['NC_password'];

$sql = "UPDATE 	memebers set password = '$N_password' where  password = '$C_password'";

}


function C_email () {

$C_email = $_POST['C_email'];

$N_email = $_POST['N_email'];

$NC_email = $_POST['NC_email'];

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