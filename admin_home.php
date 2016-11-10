<?php include "layout/header.php"; ?>
<html> 

<div class="container" style="margin-top:5%;">
<div class="panel panel-default pull-right" style="width:45%;"> 

    
    <div class ="panel-header">
        <h2 style="text-align:center;">Users</h2>
    </div>
   
    <div class = "panel-body">
       
           <?php 
           
           include 'functions/conn.php';
           
           $sql= "select * from members";
           
           $results = mysqli_query($conn, $sql);
           
           $show = mysqli_fetch_all($results, MYSQLI_ASSOC);
           
           
           ?>
           
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
                
                <?php foreach($show as $show){ echo "<tr><td>" . $show["username"] . "</td><td>" . $show["email"]. "</td><td>********</td><td>" . $show["F_name"] . "</td><td>" . $show["L_name"] . "</td><td>".
      $show['country']. "</td></tr>" ;  }?>
            
            </tbody>
          </table>
          </div>
    </div>
    </div>


<div class="panel panel-default pull-left" style="width:45%;"> 

     <div class ="panel-header">
        <h2 style="text-align:center;">Trips</h2>
    </div>
   
    <div class = "panel-body">
        <?php
         $result = mysqli_query($conn, "SELECT * FROM trip ORDER BY `trip`.Order_id DESC");
                if(mysqli_num_rows($result) != 0){
                echo "<div class='table-responsive'>
                        <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th> Customer Name</th>
                                <th>Hotel Name</th>
                                <th>City</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Price</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>";
                    while($row=mysqli_fetch_array($result)){
                        $Order_id = $row['Order_id'];
                        echo "<tr href='random.php'>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>".$row["Hotel"]."</td>";
                        echo "<td><a href='https://en.wikipedia.org/wiki/". str_replace(' ','_',$row["City"])."'>".$row["City"]."</a></td>";
                        echo "<td>".$row["Departure"]."</td>";
                        echo "<td>".$row["Arrival"]."</td>";
                        echo "<td>$".$row["price"]."</td>";
                        echo "<td> <form action = 'functions/remove_a.php' method = 'post'> <button value = '$Order_id' name = 'Order_id' class='btn btn-sm btn-danger btn-block' > X </button> </form> </td>";
                        echo "</tr>\n";
                        $price+= $row["price"];
                    }
                echo "</tbody>
                    </table>
                    </div>";
                } else {
                   echo "<h4>Looks like no order has been placed yet</h4>" ;
                } 
                
                ?>
    </div>
    </div>
    
    
<div class="panel panel-default pull-left" style="width:45%;"> 

    
    <div class ="panel-header">
        <h2 style="text-align:center;">Finance</h2>
    </div>
   
    <div class = "panel-body">
        
        <?php 
        
      echo "<h1  style='text-align:center; color:green;'>$" . $price . "</h1>";
        
        ?>
        
    </div>
    </div>
   
    
<div class="panel panel-default pull-left" style="width:45%;"> 

    
    <div class ="panel-header">
        <h2 style="text-align:center;">Locked Users</h2>
    </div>
   
    <div class = "panel-body">
        
         <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
            
              </tr>
            </thead>
            <tbody>
                
        <?php 
        
      
           $sql_m= "select * from members where login_access ='N'";
           
           $results_m = mysqli_query($conn, $sql_m);
           
           $show_m = mysqli_fetch_all($results_m, MYSQLI_ASSOC);
           
            foreach($show_m as $show_m){ echo "<tr><td>" . $show_m["username"] . "</td><td>" . $show_m["email"]. "</td>" ;  }
        ?>
        
        
            </tbody>
          </table>
          </div>
        
    </div>
    </div>
 
<div class="panel panel-default pull-left" style="width:100%;"> 

    
    <div class ="panel-header">
        <h2 style="text-align:center;">Admin Functions</h2>
    </div>
   
    <div class = "panel-body">
       
       <?php 
        
        $sql_u = "select * from members";
        
        $query_u = mysqli_query($conn, $sql_u);
        
        $user_i = mysqli_fetch_all($query_u, MYSQLI_ASSOC);
        
        $get_user = "<select class='form-control'>";
        
        foreach($user_i as $user_i) {
            
            $get_user.= "<option value = " . $user_i["username"] . ">" . $user_i["username"] . "</option>";
            
        }
       
        $get_user.="</select>";
   
       ?>
       
         <form id ="F_reset" class="form-signin" >
       
        <h2 class="form-signin-heading" id="brand"> Reset Password </h2>
        
          <?php echo $get_user;  ?>  <br />
          
          <input type="password" class="form-control" name="P_confirm" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          <input type="password" class="form-control" name="NP_confirm" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          
          <button class="btn btn-lg btn-warning  btn-block" name="reset" value="reset" >Reset Password</button>
        
      </form>
      
      <hr> 
      
      <form id ="F_reset" class="form-signin" >
       
        <h2 class="form-signin-heading" id="brand"> Reset Username </h2>
        
          <?php echo $get_user;  ?>  <br />
          
          <input type="password" class="form-control" name="P_confirm" placeholder="New Username " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          <input type="password" class="form-control" name="NP_confirm" placeholder="Confirm Username" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          
          <button class="btn btn-lg btn-warning  btn-block" name="reset" value="reset" >Reset Password</button>
        
      </form>
      
      <hr> 
      
      <form id ="F_reset" class="form-signin" >
       
        <h2 class="form-signin-heading" id="brand"> Reset Email </h2>
        
          <?php echo $get_user;  ?>  <br />
          
          <input type="password" class="form-control" name="P_confirm" placeholder="New Email" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          <input type="password" class="form-control" name="NP_confirm" placeholder="Confirm Email" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <br />
          
          
          <button class="btn btn-lg btn-warning  btn-block" name="reset" value="reset" >Reset Password</button>
        
      </form>  
      
      <hr> 
      
      <form id ="F_reset" class="form-signin" >
       
        <h2 class="form-signin-heading" id="brand"> Lock Account </h2>
        
          <?php echo $get_user;  ?>  <br />
          
        <select class="form-control" > 
        
            <option>Lock</option>
            <option>Unlock</option>
            
            
        </select>
         
         <hr>
          
          <button class="btn btn-lg btn-warning  btn-block" name="reset" value="reset" >Reset Password</button>
        
      </form>
    </div>
    </div>
 


</div>

</html>

<?php include "footer.php"; ?>