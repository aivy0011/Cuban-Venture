<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="#">Cuban Ventures Admin HQ</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li <?php if (basename($_SERVER['PHP_SELF']) == "manage.php" || basename($_SERVER['PHP_SELF']) == "account.php" ){echo "class='active'";}?>>
          <a href="admin_home.php">
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

