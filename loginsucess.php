<?php
    session_start();
    include_once 'config.php';
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $qry = "SELECT `user_name`,`user_pass` FROM `ct_user` WHERE `user_name` = '$uname' AND `user_pass` = '$pass'";
    $result = mysqli_query($con,$qry);
    $fet = mysqli_fetch_array($result);
    if($uname == $fet['user_name'] && $pass == $fet['user_pass']){
        $_SESSION['username'] = $uname;
        echo "success";
    }
    $con->close();
?>