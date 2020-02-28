<?php
    include_once 'config.php';
    session_start();
    $curpass = $_POST['curpass'];
    $newpas = $_POST['newpass'];
    $conpas = $_POST['conpass'];
    $uname = $_SESSION['username'];

    $q1 = "SELECT `user_pass` FROM `ct_user` WHERE `user_name` = '$uname'";
    $result = mysqli_query($con,$q1);
    $fet = mysqli_fetch_array($result);
    $curpas = $fet['user_pass'];
    if($curpass == $curpas){
       if($newpas==$conpas){
        $q2 = "UPDATE `ct_user` SET `user_pass` = '$conpas' WHERE `user_name` = '$uname'";
        $re = mysqli_query($con,$q2);
        if($re){
            echo "success";
        }
        else{
            echo "failed";
        }
       }
    }
    $con->close();
?>