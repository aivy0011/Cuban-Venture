
  <?php 
     
     session_start();

    $conn = mysqli_connect('localhost','root','1234','test');

    $user = $_SESSION['username'];

    $sql = "SELECT * FROM members WHERE username = '$user' ";

    $result = mysqli_query($conn, $sql);

    $results = mysqli_fetch_assoc($result);


  ?>

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

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="function.js"> </script>


    
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
            <li class="active"><a href="booking.php">Booking</a></li>
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
            <li class="active"><a href="manage.php">Trips <span class="sr-only">(current)</span></a></li>
            <li><a href="account.php">Add a Card</a></li>
            <li><a href="payment.php">Payment</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php include 'conn.php';


          echo  $user . "'s Account";
          $countryimg = 'flags/'.$results['country'].'.png';
?></h1>

          

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
                  <td><?php echo $results['username']; ?></td>
                  <td>********</td>
                  <td><?php echo $results['email']; ?></td>
                  <td><?php echo $results['F_name']; ?></td>
                  <td><?php echo $results['L_name']; ?></td>
                  <td> <img src= "<?php echo $countryimg;?>" /></td>
                </tr>
               
              </tbody>
            </table> 

             <h2 class="sub-header">Update my Account</h2>

             <script type="text/javascript">

                class check (){
               
                  function validateForm() {

                    var C_user = document.forms["form_U"]["C_username"].value;
                    var I_user = "<?php echo $user; ?>";
                    var user = document.forms["form_U"]["N_username"].value; 
                    var user2 = document.forms["form_U"]["NC_username"].value;

                     if (C_user !== I_user ){
                      var x = false;
  
                        }

                      switch (x) {

                      case false : 
                      document.getElementById("C_username").style.border = "solid red";
                      alert("Name must be correct");
                      return false;
                        }

                      

                      }

                      function validateForm1() {


                       if (user !== user2) {
                          var y = false; 
                         }

                        switch (y) {

                        case false: 
                        document.getElementById("N_username").style.border = "solid red";
                        document.getElementById("NC_username").style.border = "solid red";
                        alert("Name do not corralate");
                        return false;

                          }

                      }
                    }

             </script>



              <button class="btn btn-sm btn-primary btn-block"  onclick=" document.getElementById('update1').style.display ='block' " >Change Username </button>
             
              <br />

              <div id="update1" > 

                  <button class="btn btn-sm btn-default btn-block" onclick= "document.getElementById('update1').style.display = 'none'"> <i class="glyphicon glyphicon-collapse-up"></i> </button>

                  <form name="form_U" action="update.php" method="post" onsubmit="return check();">  

                  

                    <input class="form-control" type="" name="C_username" id="C_username" placeholder="Current Username">

                    <input class="form-control" type="" name="N_username" id="N_username" placeholder="New Username">

                    <input class="form-control" type="" name="NC_username" id="NC_username" placeholder="New Confirm Username">


                    <br />

                  <button class="btn btn-sm btn-success btn-block" value="1" name="submit" id="submit"> Update </button>

                  </form>
                </div>



            <button class="btn btn-sm btn-primary btn-block" onclick=" document.getElementById('update2').style.display = 'block' " >Change Password </button>

                  <br />
                <div id="update2"> 

                  <button class="btn btn-sm btn-default  btn-block " onclick= "document.getElementById('update2').style.display = 'none'"> <i class="glyphicon glyphicon-collapse-up"></i> </button>

                  <form name="form_P" action="update.php" method="post"> 

                      

                        <input  class="form-control" type="" name="C_password" id="C_password" placeholder="Current Password "> 

                        <input class="form-control" type="" name="N_password"  id="N_password" placeholder="New Password">

                         <input class="form-control" type="" name="NC_password"  id="NC_password" placeholder="New Confirm Password">            

                        <br />

                         <button class="btn btn-sm btn-success btn-block" value="2" name="submit" id="submit"> Update </button>


                  </form>

                </div>


              <button class="btn btn-sm btn-primary btn-block"  onclick=" document.getElementById('update3').style.display = 'block'"  >Change Email </button>

                <br />

                 <div id="update3" > 

                 <button class="btn btn-sm btn-default  btn-block " onclick= "document.getElementById('update3').style.display = 'none'"> <i class="glyphicon glyphicon-collapse-up"></i></button>

                    <form name="form_E" action="update.php" method="post"> 

                      

                        <input class="form-control" type="" name="C_email" id="C_email" placeholder="Current Email"> 

                        <input class="form-control" type="" name="N_email" id="N_email" placeholder="New Email">

                        <input class="form-control" type="" name="NC_email" id="NC_email" placeholder="New Confirm Email">

                        <br />

                       <button class="btn btn-sm btn-success btn-block" value="1" name="submit" id="submit"> Update </button>

                    </form>

                 </div>


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
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
