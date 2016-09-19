
<?php 
     
session_start();
$conn = mysqli_connect('localhost','root','1234','test');
$user = $_SESSION['username'];
$sql = "SELECT * FROM members WHERE username = '$user' ";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($result);
$sql2 = "select * from payment where user = '$user' ";
$get = mysqli_query($conn, $sql2);
$show = mysqli_fetch_all($get, MYSQLI_ASSOC);
include "layout/header.php" ?>



  <div class="container-fluid">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">
<?php


          echo  $user . "'s Account";
          $countryimg = 'flags/'.$results['country'].'.png';
?>
        </h1>



        <h2 class="sub-header">Account Info</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Country</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php echo $results['username']; ?>
                </td>
                <td>********</td>
                <td>
                  <?php echo $results['email']; ?>
                </td>
                <td>
                  <?php echo $results['F_name']; ?>
                </td>
                <td>
                  <?php echo $results['L_name']; ?>
                </td>
                <td> <img src="<?php echo $countryimg;?>" /></td>
              </tr>

            </tbody>
          </table>

         <?php require "formchange.php" ?>
         
        
        <h2 class="sub-header">Card Info</h2>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Card Holder</th>
                        <th>Card Number</th>
                        <th>CVV</th>
                        <th>Zip Code</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                      <tr>
                          <?php foreach ($show as $show) { echo "<tr><td>" .  $show['c_holder'] . "</td><td> XXXX - XXXX - XXXX -". substr($show['c_number'], (strlen($show['c_number'])-4), strlen($show['c_number'])-1). "</td><td>XXX</td><td>" .  $show['zipcode'] . "</td> <td>
                         <form action = 'functions/remove2.php' method = 'post'> <button name = 'C_id' value = '" . $show['c_number']. "' class='btn btn-sm btn-danger btn-block' > X </button> </form>
                        </td> "  ; } ?>
                      </tr>
        
                    </tbody>
                  </table>

        </div>
      </div>
    </div>
  </div>


  </div>
  <!-- /.container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
