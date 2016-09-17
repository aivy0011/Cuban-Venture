<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if (basename($_SERVER['PHP_SELF']) == "manage.php"){echo "class='active'";}?>><a href="/manage.php">Manage Account <span class="sr-only">(current)</span></a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "trips.php"){echo "class='active'";}?>><a href="/trips.php">Trips</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "account.php"){echo "class='active'";}?>><a href="/account.php">Add a Card</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == "payment.php"){echo "class='active'";}?>><a href="#">Payment</a></li>
          </ul>
</div>
<button id="show" onclick="$('.sidebar').toggle('slow');"><span class="glyphicon glyphicon-chevron-right"></span>
</button>