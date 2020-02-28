<?php
        include_once 'config.php'; 
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $mail = $_POST['email'];
      $qry = "INSERT INTO `ct_user`(`user_name`, `user_pass`, `user_email`, `user_last_login`, `user_joined`, `is_active`) VALUES ('$uname','$pass','$mail', '2020-01-23 08:24:28', '2020-01-23 08:24:33', '1')";
      $result = $con->query($qry);
      if($result){
        echo "success";
      }
      else{
        echo "fail";
      }
      $con->close();
?>