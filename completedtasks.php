<?php 
     session_start();
     if (!isset($_SESSION['username'])) {
         header("Location: login.php");
     }
    include_once "config.php";
    $qry1 = "SELECT u_ID from ct_user WHERE user_name = '" . $_SESSION['username']."'";
    $result1 = mysqli_query($con, $qry1);
    if (!$result1) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $u_id = mysqli_fetch_array($result1);
    
    $qry2 = "INSERT INTO `ct_completedtasks` (`ID`, `u_ID`, `t_ID`) VALUES (NULL, '".$u_id['u_ID']."', '".$_POST['id']."')";
    $result2 = mysqli_query($con, $qry2);
    $row= mysqli_fetch_array($result2);
    if($result2){
        echo "success";
    } else {
        echo "failed".$result2;
        // echo "INSERT INTO `ct_completedtasks` (`ID`, `u_ID`, `t_ID`) VALUES (NULL, '".$u_id."', '".$_POST['id']."')";
    }
?>