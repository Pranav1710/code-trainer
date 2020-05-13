<?php
if (isset($_POST['tname'])) {
    $name = $_POST['tname'];
    $tc = $_POST['tc'];

    $i1 = $_POST['ip1'];
    $o1 = $_POST['op1'];
    $flg = true;
    include('config.php');

    $qry = "select t_ID FROM `ct_tasks` WHERE t_name= '$name' ";
    $result = mysqli_query($con, $qry);

    $id_tmp = mysqli_fetch_array($result);
    $id = $id_tmp['t_ID'];
    // echo $i1;
    // echo $o1;
    // echo $id;
    for ($c = 1; $c <= $tc; $c++) {
        // $_POST['ip'.$i]
        $qry1 = "INSERT INTO `ct_io` (`io_ID`, `input`, `output`, `t_ID`) VALUES (NULL,'" . $_POST['ip' . $c] . "', '" . $_POST['op' . $c] . "', '$id');";
        
        $result1 = mysqli_query($con, $qry1);
        if (!$result1) {
            echo "Failed".$result1;
            $flg = false;
            break;
        }
    }
    if ($flg) {
        echo "Success";
    }
    mysqli_close($con);
}
