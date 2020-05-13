<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include('config.php');

    $qry = "DELETE FROM `ct_tasks` WHERE t_ID= '$id' ";
    $result = mysqli_query($con, $qry);
    if ($result) {
        echo "Success";
    } else {
        echo "Failed";
    }
    mysqli_close($con);
}
?>