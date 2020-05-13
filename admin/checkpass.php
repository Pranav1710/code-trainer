<?php
include_once'config.php';
$q1 = "SELECT `user_pass`, `user_name`FROM `ct_admin` WHERE `a_ID` = '1'";
$result = mysqli_query($con, $q1);
$fet = mysqli_fetch_array($result);
$uname = $fet['user_name'];

if ($_POST['email'] == $uname && $_POST['password'] == $fet['user_pass']) {
    if (!isset($_SESSION['email'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("Location: index.php");
    }
} else {
    echo "wrong Login Details";
}
