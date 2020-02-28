<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<?php
include_once "config.php";
$qry = "SELECT `t_ID`, `t_name` FROM `ct_tasks` WHERE `ct_language`='c' ";
$result = mysqli_query($con, $qry);
$n = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>chanllagesc</title>

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
    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
        <div class="row mt-5" style="margin: 6em;">
            <div class="col-md-12">
                <div class="container">
                    <?php
                    for ($i = 1; $i <= $n; $i++) {
                        $row = mysqli_fetch_array($result);
                    ?>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="jumbotron" style="display:flex">
                                    <div class="taskTitle" style="flex-grow: 1;">
                                        <p class="lead"><?php echo $row['t_name'] ?> </p>
                                    </div>
                                    <div>
                                        <button type="button" id="btn" onclick="solve(<?php echo $row['t_ID'] ?>)" class="btn btn-success">Solve challange</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function solve(id) {
            window.location = `databasetask.php?id=${id}`
        }
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</body>

</html>