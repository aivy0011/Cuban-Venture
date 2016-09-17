
<?php 
     
session_start();
$conn = mysqli_connect('localhost','root','1234','test');
$user = $_SESSION['username'];
$sql = "SELECT * FROM members WHERE username = '$user' ";
$result = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($result);
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

         <?php include "formchange.php" ?>


        </div>
      </div>
    </div>
  </div>


  </div>
  <!-- /.container -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="jquery.min.js"><\/script>')
  </script>
  <script src="js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="ie10-viewport-bug-workaround.js"></script>
</body>

</html>
