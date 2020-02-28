<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      $var = $_POST['txt1'];
    ?>
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
        <li><a href="#">FRIEND</a></li>
        <li><a href="problempage.php">PROBLEM SOLVING</a></li>
        <li><a href="codetesting.php">CODE TESTING</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php
              session_start();               
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

      <div class="container c">
        <div class="row">
            <div class="col-md-10">
              <div class="jumbotron">
              <p class="lead">ABCD</p>
              </div>
            </div>

            <div class="col-md-10">
              <div class="jumbotron">
              <p class="lead">ABCD</p>
              </div>
            </div>

            <div class="col-md-10">
              <div class="jumbotron">
              <p class="lead">ABCD</p>
              </div>
            </div>
          
        </div>
      </div>


   </div>        <!-- Header -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>