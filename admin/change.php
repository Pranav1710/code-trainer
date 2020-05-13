<?php
    include_once 'config.php';

    $curpas = $_POST['currpass'];
    $newpas = $_POST['newpass'];
    $conpas = $_POST['conpass'];
    
    $q1 = "SELECT `user_pass`, `user_name`FROM `ct_admin` WHERE `a_ID` = '1'";
    $result = mysqli_query($con,$q1);
    $fet = mysqli_fetch_array($result);
    $uname = $fet['user_name'];
    if($curpas = $fet['user_pass'] && $newpas==$conpas){
       $q2 = "UPDATE `ct_admin` SET `user_pass` = '$conpas' WHERE `user_name` = '$uname'";
       $re = mysqli_query($con,$q2);
       if($re){
           echo "success";
       }
    }
    $con->close();
?>