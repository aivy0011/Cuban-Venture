<?php include "layout/header.php";?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php include $_SERVER['DOCUMENT_ROOT'].'/functions/conn.php';
          session_start();
          $user = $_SESSION['username'];
          echo  $user . "'s Account";
         
?></h1>

          

          <h3 class="sub-header">Add a Payment Method</h3>
          <div class="container">
      <form class="form-signin" method="post" action="payment.php">
        <h2 class="form-signin-heading">Enter Your Payment</h2>
        <br />
        <input class="form-control" type="number" name="c_number" id="c_number" placeholder=" enter your card number(XXXX-XXXX-XXXX-XXXX)" pattern = "{16} " required autofocus>
        <br />
        <input class="form-control" type="text" name="c_holder" id="c_holder" placeholder="Card Holder" required>
        <br />
        <input class="form-control" type="number" name="cvv" id="cvv" placeholder="Enter CVV" pattern ="{3}" required autofocus>
        <br />
        <input class="form-control" type="number" name="zipcode" id="zipcode" placeholder="Enter Your Zip Code" required autofocus>
        <br />
        <select name ="type" id ="type" class="form-control" required>
        <option value = "master">Master</option>
        <option value = "visa">Visa</option>
        </select>
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" patter ="{5}" value="Login">Submit</button>
      </form>

    </div> <!-- /container -->
        </div>
      </div>
    </div>
<?php include "layout/footer.php"; ?>
