<html>

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="description" content="Login - Register Template">
  <meta name="author" content="Lorenzo Angelino aka MrLolok">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <script type="text/javascript" src="font/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="main.css">
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



  <div id="container-register" style="margin-top: -1.8em;">
    <div id="title">
      <i class="material-icons lock">lock</i> Register
    </div>

    <form>
      <div class="input">
        <div class="input-addon">
          <i class="material-icons">email</i>
        </div>
        <input id="email" name="mail" placeholder="Email" type="email" required autocomplete="off">
      </div>

      <div class="clearfix"></div>

      <div class="input">
        <div class="input-addon">
          <i class="material-icons">face</i>
        </div>
        <input id="username" name="uname" placeholder="Username" type="text" required autocomplete="off">
      </div>

      <div class="clearfix"></div>

      <div class="input">
        <div class="input-addon">
          <i class="material-icons">vpn_key</i>
        </div>
        <input id="password" name="pass" placeholder="Password" type="password" required autocomplete="off" minlength="6">
      </div>



      <input type="button" id="btnsubmit" value="Register">
    </form>



    <div class="register">
      Do you already have an account?
      <a href="login.php"><button id="register-link">Log In here</button></a>
    </div>
  </div>
  <!--FOOTER-->
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <div class="navbar-text pull-left">
        <h5>@All copy Right Reserved</h5>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></i></a>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-instagram fa-2x"></i></i></i></a>
      </div>
      <div class="navbar-text pull-right">
        <a href="#"><i class="fab fa-twitter fa-2x"></i></i></i></a>
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#btnsubmit').click(function() {
        $.ajax({
          type: "POST",
          url: "insertusers.php",
          data: {
            email: $("#email").val(),
            username: $("#username").val(),
            password: $("#password").val()

          },
          success: function(data) {
            console.log(data);
            if (data === 'success') {
              alert("Registration is Successful");
              window.location = 'login.php';
            } else {
              alert("Registration Failed!!");
            }
          }
        });
      });

    });
  </script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>