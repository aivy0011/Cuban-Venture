<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="home.php">Cuban Ventures</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li <?php if (basename($_SERVER['PHP_SELF']) == "about.php"){echo "class='active'";}?>><a href="about.php">Our Company</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == "booking.php"){echo "class='active'";}?>><a href="booking.php">Booking</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == "helpdesk.php"){echo "class='active'";}?>><a href="helpdesk.php">Help Desk</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == "manage.php" || basename($_SERVER['PHP_SELF']) == "account.php" ){echo "class='active'";}?>>
          <a href="manage.php">
            <?php
include $_SERVER['DOCUMENT_ROOT'].'/functions/conn.php';
session_start();

echo  $_SESSION['username'] . "'s Account";

?>
          </a>
        </li>
        <li><a href="/functions/logout.php">Logout</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</nav>

