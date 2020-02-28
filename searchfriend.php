<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serach friend</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .active-cyan-4 input[type=text]:focus:not([readonly]) {
            border: 1px solid #4dd0e1;
            box-shadow: 0 0 0 1px #4dd0e1;
        }

        .active-cyan-3 input[type=text] {
            border: 1px solid #4dd0e1;
            box-shadow: 0 0 0 1px #4dd0e1;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once('config.php');

    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><?php include 'nav.php'; ?></div>
            </div>
            <div class="row" style="margin-top: 5em; margin-left:15em;">
                <!-- Search form -->
                <form action="searchfriend.php" method="GET">
                    <div class="col-md-8">
                        <div class="active-pink-3 active-pink-4 mb-4">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="txt" name="srch">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Search" id="s" class="btn btn-primary">

                    </div>
                </form>
                <div class="container" style="margin-top: 2em;" id="res">
                    <table>
                        <!-- Display search res -->
                        <?php
                        if (isset($_GET['srch'])) {
                            // echo $_GET['srch'];
                            $qry = "SELECT * FROM `ct_user` WHERE `user_name` LIKE '%" . $_GET['srch'] . "%'";
                            $result = mysqli_query($con, $qry); ?>
                            <table class="table table-light table-striped table-responsive-md" id="tb" style="margin-left: -15em; margin-top: 2em;">
                                <thead class="thead-dark">
                                    <tr class="bg-primary">
                                        <th scope="col">no</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr id="row' . $row['u_ID'] . '">';
                                        $i++;
                                    ?>
                                        <td scope="row"><?php echo $i . "<br>"; ?>
                                        <td><?php echo $row['user_name'] . "<br>"; ?></td>
                                        <td><?php echo $row['user_email'] . "<br>"; ?></td>

                                        <td><input type="button" class="btn btn-primary btn-sm" value="View Completed Tasks" onclick="viewTask(<?php echo $row['u_ID'] ?>)"></td>
                                        </tr>
                                <?php }
                                } ?>
                                </tbody>
                            </table>
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
    <script>
        function viewTask(id){
            
            window.location = `viewtask.php?uid=${id}`;
        }
    </script>
</body>

</html>