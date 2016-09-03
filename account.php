<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="icon" href="imgres_TH0_icon (1).ico">

    <title>Cuban Ventures</title>

    <!-- Bootstrap core CSS -->
    <link href="main.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <link href="dashboard.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Cuban Travel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Home</a></li>
            <li><a href="about.php">Our Company</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="helpdesk.php">Help Desk</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <link href="dashboard.css" rel="stylesheet">



    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="manage.php">Trips <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="account.php">Add a Card</a></li>
            <li><a href="payment.php">Payment</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php include 'conn.php';
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
 

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Cuban Ventures, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
<!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
