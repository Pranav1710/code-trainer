<?php
    include_once "config.php";
    if (isset($_POST['taskName'])) {
        $name = $_POST['taskName'];
        $discription = $_POST['discription'];
        $testcase = $_POST['testcase'];
        $inputs = $_POST['input'];
        $id = $_POST['Id'];
        $lng = $_POST['lang'];

        $qry = "UPDATE `ct_tasks` SET  `t_name` = '$name' , `t_discription` = '$discription' , `t_noOfTestcase` =$testcase , `t_noOfInputs`=$inputs, `t_noOfOutputs`=$testcase, `ct_language`='$lng' WHERE t_ID = '$id' ";
        $result = mysqli_query($con, $qry);
        if ($result) {
            echo $result;
            echo "Success";
        } else {
            echo "Failed";
        }
        mysqli_close($con);
    }
?>
