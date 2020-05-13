<?php
if (isset($_POST['taskName'])) {
    $name = $_POST['taskName'];
    $discription = $_POST['discription'];
    $testcase = $_POST['testcase'];
    $inputs = $_POST['input'];
    $lang = $_POST['lang'];

    include_once('config.php');

    $qry = "INSERT INTO `ct_tasks` (`t_name`, `t_discription`, `t_noOfTestcase`, `t_noOfInputs`, `t_noOfOutputs`, `ct_language`) VALUES ('$name', '$discription', $testcase, $inputs, $testcase, '$lang')";
    $result = mysqli_query($con, $qry);
    if ($result) {
        echo "Success";
    } else {
        echo "Failed";
    }
    mysqli_close($con);
}
?>