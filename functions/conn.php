<?php 

$host = "localhost";
$username = "root";
$password = "1234";
$db_name = "test";
$tbl_name = "members";

//conect to sever and select database. 

$conn = mysqli_connect("$host","$username","$password","$db_name") or die("cannot connect ");
//mysqli_select_db("") or die("cannot select DB");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }