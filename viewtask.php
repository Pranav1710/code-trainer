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
    <title>SearchFriend</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <!-- Header -->
                <div class="col-md-12"><?php include 'nav.php'; ?></div>
            </div>
            <div class="container" style="margin-top: 2em;">
                <table>
                    ?>
                    <?php
                    if (isset($_GET['uid'])) {
                        $uid = $_GET['uid'];

                        include('config.php');

                        $qry = "SELECT ct_tasks.t_name FROM `ct_completedtasks`,`ct_tasks` WHERE ct_tasks.t_ID = ct_completedtasks.t_ID AND ct_completedtasks.u_ID ='" .$uid. "'" ;
                        $result = mysqli_query($con, $qry); ?>
                        <table class="table table-light table-striped table-responsive-md" id="tb" style="margin-top: 2em;">
                            <thead class="thead-dark">
                                <tr class="bg-primary">
                                    <th scope="col">No</th>
                                    <th scope="col">TaskName</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $i++;
                                    echo '<tr id="row' . $i . '">';
                                ?>
                                    <td scope="row"><?php echo $i . "<br>"; ?>
                                    <td><?php echo $row['t_name'] . "<br>"; ?></td>

                                    </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>
                    
                </table>
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
    </div>
</body>

</html>