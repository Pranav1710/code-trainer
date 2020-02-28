<?php
  session_start();
  if(isset($_SESSION['username'])){
    header("Location: problempage.php");  
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="font/js/all.js"></script>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="font/js/all.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="background.css">
</head>

<body>
    <!--Header-->
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
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="register.php">REGISTER</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <svg viewBox="0 0 1800 600">
        <symbol id="s-text">
            <text text-anchor="middle" x="50%" y="35%" class="webcoderskull">
                Welcome To 
                The
            </text>
            <text text-anchor="middle" x="50%" y="68%" class="text--line">
                Code Trainer
            </text>
    
        </symbol>

        <g class="g-ants">
            <use xlink:href="#s-text" class="webcoderskull-1"></use>
            <use xlink:href="#s-text" class="webcoderskull-1"></use>
            <use xlink:href="#s-text" class="webcoderskull-1"></use>
            <use xlink:href="#s-text" class="webcoderskull-1"></use>
            <use xlink:href="#s-text" class="webcoderskull-1"></use>
        </g>


    </svg>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a href="#" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-user"></span> LOGIN</a>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-text pull-left">
                <h5>@All copy Right Reserved</h5>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>