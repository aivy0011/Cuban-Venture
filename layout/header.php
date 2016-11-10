<?php
session_start();
if(isset($_COOKIE["User"])){
  session_start();
  $_SESSION['username'] = $_COOKIE["User"];
  $_SESSION['id'] = $_COOKIE["id"];
  header("location: home.php");
} elseif(isset($_SESSION['username'])){
    
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="icon" href="imgres_TH0_icon (1).ico">
        <title>Cuban Ventures</title>
        <link href="css/dashboard.css" rel="stylesheet">
        <?php if (basename($_SERVER['PHP_SELF']) == "booking.php"){ echo "<link href='css/sign.css' rel='stylesheet'>";}?>
        <?php if (basename($_SERVER['PHP_SELF']) == "helpdesk.php"){ echo "<link href='css/blog.css' rel='stylesheet'>";}?>
        <link href="starter-template.css" rel="stylesheet">
        <link href="css/boostrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <?php if(basename($_SERVER['PHP_SELF']) == "admin_home.php"){ echo "<meta http-equiv='refresh' content='30'>";}?>
    </head>

    <body>
        <div class="loader"></div>
        <div class="container">
            <?php 
            if (basename($_SERVER['PHP_SELF']) != 'admin_home.php' ){
                 include "navbar.php";
            } else {
                 include "admin_navbar.php";
            }
           
            if((basename($_SERVER['PHP_SELF']) == "manage.php" || basename($_SERVER['PHP_SELF']) == "account.php") || (basename($_SERVER['PHP_SELF']) == "trips.php")){
             include "aside.php";   
            }
            ?>
            