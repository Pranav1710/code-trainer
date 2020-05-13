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
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
</head>

<body>
  <!-- HEADER -->
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

  <!--FOR CODING TEST-->
  <div class="container">
    <form action="compile.php" id="form" name="f2" method="POST">
      <div class="row">
        <div class="col-md-10 forlang">
          <div class="form-group">
            <label for="language">Choose Language</label>
            <select class="form-control" name="language">
              <option value="c">C</option>
              <option value="cpp">C++</option>
              <option value="cpp11">C++11</option>
              <option value="java">Java</option>
            </select>
          </div>
        </div>
        <!--FOR CODE-->
        <div class="row">
          <div class="col-md-10 forcode">
            <label for="code">Enter Your Code Here</label>
            <textarea class="form-control" name="code" placeholder="Write your Code Here:" rows="12" cols="120" style="resize: none;"></textarea>
          </div>
        </div>
        <!--FOR INPUT-->
        <div class="row">
          <div class="col-md-3 forinput">

            <label for="input">Enter Your Input Here</label>
            <textarea class="form-control" name="input" placeholder="Write your input Here:" rows="8" cols="20" style="resize: none;"></textarea>
          </div>
        </div>
        <div class="btn4">
          <input type="submit" id="st" class="btn btn-success" value="RUN CODE"></input>
        </div>
    </form>

    <script type="text/javascript">
      $(document).ready(function() {

        $("#st").click(function() {

          $("#div").html("Loading ......");


        });

      });
    </script>

    <script>
      //wait for page load to initialize script
      $(document).ready(function() {
        //listen for form submission
        $('form').on('submit', function(e) {
          //prevent form from submitting and leaving page
          e.preventDefault();

          // AJAX 
          $.ajax({
            type: "POST", //type of submit
            cache: false, //important or else you might get wrong data returned to you
            url: "compile.php", //destination
            datatype: "html", //expected data format from process.php
            data: $('form').serialize(), //target your form's data and serialize for a POST
            success: function(result) { // data is the var which holds the output of your process.php

              // locate the div with #result and fill it with returned data from process.php
              $('#div').html(result);
            }
          });
        });
      });
    </script>


    <!--FOR OUTPUT-->
    <div class="row">
      <div class="col-md-4 foroutput">
        <textarea class="form-control" name="output" id="div" placeholder="OUTPUT" rows="15" cols="35" style="resize: none;"></textarea>
      </div>
    </div>
  </div>
  <!-- Footer-->
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <div class="navbar-text pull-leftside">
        <h5>@All copy Right Reserved</h5>
      </div>
    </div>
  </nav>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>