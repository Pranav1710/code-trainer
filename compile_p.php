<?php
include_once "config.php";
$id = $_POST['id'];
$languageID = $_POST["language"];
$code=$_POST["code"];
$qry = "SELECT * from `ct_io` WHERE t_ID = " . $id;

$result = mysqli_query($con, $qry);
$testcase = $_POST['testcase'];
// echo $_POST["input"] . "\n";

//error_reporting(0);
for ($i = 1; $i <= $testcase; $i++) {
	$row = mysqli_fetch_array($result);
	$input=$row['input'];
	switch ($languageID) {
		case "c": {
				include("compilers/c.php");
				break;
			}
		case "c++": {
				include("compilers/cpp_new.php");
				break;
			}

		case "cpp11": {
				include("compilers/cpp11.php");
				break;
			}
		case "java": {
				include("compilers/java.php");
				break;
			}
	}
	if(trim($error)==""){
        echo trim("$output");
        echo $row['output'];
		$o = "$output";
        $expop = $row['output'];
        settype($expop,"string");
		if($expop == $o){
			echo "Passed";
		} else {
			echo "Failed";
		}
	} else {
		echo $error;
	}
}
?>
