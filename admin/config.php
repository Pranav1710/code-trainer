<?php
    $con = mysqli_connect('localhost', 'root','', 'code_trainer');
    if(!$con){
        echo"somethin is wrong".mysqli_error($con);
        die;
    }
?>