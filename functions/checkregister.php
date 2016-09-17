<?php 

include $_SERVER['DOCUMENT_ROOT'].'/functions/conn.php';

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
$c_mypassword = $_POST['c_mypassword'];
$l_name = $_POST['l_name'];
$f_name = $_POST['f_name'];
$email =  $_POST['email'];
$age =  $_POST['age'];
$terms = $_POST['terms'];
$country = $_POST['country'];

$sql = " INSERT $tbl_name  SET  username = '$myusername', password = '$mypassword', email = '$email', F_name = '$f_name', L_name = '$l_name', age = '$age', terms = '$terms', country = '$country' ";
$result=mysqli_query($conn, $sql);
if(1==1) {
	echo "signup successful";
	header("location: ../login.php");
} else {
	echo "error";
}


