<?php
    include "layout/header.php"; 
    include "functions/conn.php";
    $id= $_SESSION['id'];
    ?>
<div class="container-fluid">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">    
<h2 class="sub-header">Recent Orders</h2>
            <?php
                $result = mysqli_query($conn, "SELECT * FROM trip where C_ID='$id' ORDER BY `trip`.Order_id DESC");
                if(mysqli_num_rows($result) != 0){
                echo "<div class='table-responsive'>
                        <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Hotel Name</th>
                                <th>City</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>";
                    while($row=mysqli_fetch_array($result)){
                        echo "<tr href='random.php'>";
                        echo "<td>".$row["Hotel"]."</td>";
                        echo "<td><a href='https://en.wikipedia.org/wiki/". str_replace(' ','_',$row["City"])."'>".$row["City"]."</a></td>";
                        echo "<td>".$row["Departure"]."</td>";
                        echo "<td>".$row["Arrival"]."</td>";
                        echo "<td>".$row["price"]."</td>";
                        echo "</tr>\n";
                    }
                echo "</tbody>
                    </table>
                    </div>";
                } else {
                   echo "<h4>Looks like you haven't order anything yet</h4>" ;
                }
            ?>
</div>
</div>
<?php include "layout/footer.php"; ?>