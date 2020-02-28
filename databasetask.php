<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<?php
include_once "config.php";
$qry = "SELECT * FROM `ct_tasks` WHERE `t_ID` = " . $_GET['id'];
$result = mysqli_query($con, $qry);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <div class="row">
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
                                    <li><a href="#">ChangePassword</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row" style="margin-top: 6em">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <?php echo $row['t_name'] ?>
                            </h3>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <textarea name="tt_discription" id="tt_discription" cols="25" rows="15" disabled class="form-control" style="resize: none;">
                            <?php echo $row['t_discription'] ?>
                           </textarea>
                        </div>
                    </div>
                    <form action="checkprogram.php" method="POST">
                        <!--FOR CODE-->
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 2em">
                                <label for="code">Enter Your Code Here</label>
                                <textarea class="form-control" name="code" placeholder="Write your Code Here:" rows="15" cols="120" style="resize: none;"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-3" style="margin-top: 2.8em;">
                                <input type="hidden" name="tid" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="tcs" value="<?php echo $row['t_noOfTestcase'] ?>">
                                <input type="hidden" name="language" value="<?php echo $row['ct_language'] ?>">
                                <input type="submit" class="form-control btn-primary" name="submit" id="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>