<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=.navbar-collapse>
      <span class="sr-only">Navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php" style="margin-top: 7px;">CODE TRAINER</a>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="searchfriend.php">FRIEND</a></li>
        <li><a href="codetesting.php">CODE TESTING</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php 
              echo $_SESSION['username'];
            ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a>
            </li>
            <li role="separator" class="divider"></li>
            <li><a href="changepassword.php">ChangePassword</a>
            </li>
          </ul>
        </li>
      </ul>

      </ul>
    </div>
  </div>
</nav>
<!--FOOTER-->
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">
    <div class="navbar-text pull-left">
      <h5>@All copy Right Reserved</h5>
    </div>
  </div>
</nav>