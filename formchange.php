 <h2 class="sub-header">Update my Account</h2>




          <button class="btn btn-sm btn-primary btn-block" onclick="$(document).ready(function(){$('#update1').toggle('slow')});">Change Username </button>

          <br />

          <div id="update1">



            <form onsubmit="changeuser" name="form_U" id="form_U" action="functions/update.php" method="post">
              <input class="form-control" type="hidden" name="C_username" id="C_username" placeholder="Current Username" value="<?php echo $_SESSION['username']?>">
              <input class="form-control" type="" name="N_username" id="N_username" placeholder="New Username">
              <input class="form-control" type="" name="NC_username" id="NC_username" placeholder="New Confirm Username">
              <br>
              <button class="btn btn-sm btn-success btn-block" value="1" name="submit" id="submit"> Update </button>
            </form>
          </div>



          <button class="btn btn-sm btn-primary btn-block" onclick="$('#update2').toggle('slow')">Change Password </button>
          <br >
          <div id="update2">

            <form name="form_P" action="functions/update.php" method="post">

              <input type="password" class="form-control"  name="C_password" id="C_password"  placeholder="Current Password ">

              <input type="password" class="form-control"  name="N_password" id="N_password"  placeholder="New Password">

              <input type="password" class="form-control"  name="NC_password" id="NC_password" placeholder="New Confirm Password">
              
              <script>
                
                function show () {
                  
                  document.getElementById('C_password').type='text';
                  document.getElementById('N_password').type='text';
                  document.getElementById('NC_password').type='text';
                  document.getElementById('check').style.display='none';
                  document.getElementById('hide').style.display='block';
                }
                
                function hide() {
                  document.getElementById('C_password').type='password';
                  document.getElementById('N_password').type='password';
                  document.getElementById('NC_password').type='password';
                  document.getElementById('check').style.display='block';
                  document.getElementById('hide').style.display='none';
                }
                
              </script>
              
             <div id="check"> <input type="checkbox" onclick=" show(); "> Show Password </div>
             <div id="hide" style="display:none;" ><input type="checkbox" onclick= " hide(); "> Hide Password</div>

              <br />

              <button class="btn btn-sm btn-success btn-block" value="2" name="submit" id="submit"> Update </button>


            </form>

          </div>


          <button class="btn btn-sm btn-primary btn-block" onclick="$('#update3').toggle('slow')">Change Email </button>

          <br>

          <div id="update3">


            <form name="form_E" action="functions/update.php" method="post">



              <input class="form-control" type="hidden" name="C_email" id="C_email" placeholder="Current Email" value="<?php echo $results['email']; ?>">

              <input class="form-control" type="" name="N_email" id="N_email" placeholder="New Email">

              <input class="form-control" type="" name="NC_email" id="NC_email" placeholder="New Confirm Email">

              <br />

              <button class="btn btn-sm btn-success btn-block" value="3" name="submit" id="submit"> Update </button>

            </form>

          </div>