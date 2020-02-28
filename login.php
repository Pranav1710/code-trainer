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
  <style>
    body {
      background-color: lightgrey;
    }
  </style>
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
          <li><a href="about.php">ABOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="container-login" style="margin-top: 10.3em;">
    <div id="title">
      <i class="material-icons lock">lock</i> Login
    </div>
    <form action="loginsucess.php" method="POST" name="myfrm">

      <div class="input">
        <div class="input-addon">
          <i class="material-icons">face</i>
        </div>
        <input id="username" placeholder="Username" type="text" required class="validate" autocomplete="off" name="uname">

      </div>

      <div class="clearfix"></div>

      <div class="input">
        <div class="input-addon">
          <i class="material-icons">vpn_key</i>
        </div>
        <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off" name="psw">


      </div>
      <input type="button" id="btnsubmit" value="Log In" style="margin-top: 10px;" /><br><br>
    </form>



    <div class="register">
      Don't have an account yet?
      <a href="register.php"><button id="register-link">Register here</button></a>
    </div>
  </div>

  <!--FOOTER-->
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <div class="navbar-text pull-left">
        <h5>@All copy Right Reserved</h5>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#btnsubmit').click(function() {
        $.ajax({
          type: "POST",
          url: "loginsucess.php",
          data: {
            username: $("#username").val(),
            password: $("#password").val()
            
          },
          success: function(data) {
            if (data === 'success') {
             window.location.replace("problempage.php");
            } else {
              alert("User Not Valid!!");
            }
          }
        });
      });

    });
  </script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>