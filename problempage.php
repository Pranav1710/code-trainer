<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");  
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ProblemPage</title>

    <!-- Bootstrap -->
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- LANGUAGE BUTTONS -->
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12"><?php include 'nav.php'; ?></div>
        </div>
        <div class="row">
          <div class=col-md-4>
            <div class="jumbotron abcd text-center">
                <h3>C</h3>
                  <div class="btn1">
                      <a href="challangesc.php"><button type="button" class="btn btn-success">Practice Code</button></a>
                  </div>
            </div>
          </div>
                  <div class="col-md-4">
                      <div class="jumbotron abcd text-center">
                          <h3>C++</h3>
                              <div class="btn2">
                                  <a href="challangesc++.php"><button type="button" class="btn btn-success">Practice Code</button></a>
                              </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="jumbotron abcd text-center">
                          <h3>JAVA</h3>
                              <div class="btn3">
                                  <a href="challangesjava.php"><button type="button" class="btn btn-success">Practice Code</button></a>
                              </div>
                      </div>
                  </div>
        </div>
      </div>
    <!-- Footer-->
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
        <div class="navbar-text pull-left">
          <h5>@All copy Right Reserved</h5>
        </div>
      </div>
    </nav>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>