  <?php 

session_start();

   $user = $_SESSION['username'];
   $c_holder = $_POST ['c_holder'];
   $c_number = $_POST ['c_number'];
   $cvv = $_POST ['cvv'];
   $zipcode = $_POST ['zipcode'];
   $type = $_POST ['type'];

   $conn= mysqli_connect("localhost","root","","test");

  $sql = "INSERT INTO payment (user,c_holder,c_number,cvv,zipcode,type) VALUES ('$user','$c_holder','$c_number','$cvv','$zipcode','$type')";

  $result = mysqli_query($conn,$sql);


 ?>
