<?php
    include_once("config.php");
    $qry = "SELECT * from `ct_io` WHERE t_ID = " . $_POST["id"];
    $result = mysqli_query($con, $qry);
    

    $CC="g++";
    $out="a.exe";
    $code=$_POST["code"];
    
    $filename_code="main.cpp";
    $filename_in="input.txt";
    $filename_error="error.txt";
    $executable="a.exe";
    $command=$CC." -lm ".$filename_code;	
    $command_error=$command." 2>".$filename_error;

    putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");

    for($i=0 ; $i<$_POST["testcase"] ; $i++){
        $row = mysqli_fetch_array($result);
	    $input=$row['input'];

        //if(trim($code)=="")
        //die("The code area is empty");
        
        $file_code=fopen($filename_code,"w+");
        fwrite($file_code,$code);
        fclose($file_code);
        $file_in=fopen($filename_in,"w+");
        fwrite($file_in,$input);
        fclose($file_in);
        exec("cacls  $executable /g everyone:f"); 
        exec("cacls  $filename_error /g everyone:f");	

        shell_exec($command_error);
        $error=file_get_contents($filename_error);

        if(trim($error)=="")
        {
            if(trim($input)=="")
            {
                $output=shell_exec($out);
            }
            else
            {
                $out=$out." < ".$filename_in;
                $output=shell_exec($out);
            }
            //echo "<pre>$output</pre>";
            // 1echo "$output";
                //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
        }
        else if(!strpos($error,"error"))
        {
            echo "<pre>$error</pre>";
            if(trim($input)=="")
            {
                $output=shell_exec($out);
            }
            else
            {
                $out=$out." < ".$filename_in;
                $output=shell_exec($out);
            }
            // 1echo "$output";
                            //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
        }
        else
        {
            echo "<pre>$error</pre>";
        }


        if(trim($error) == ""){
            // echo $output. "<br>";
            // echo $row["output"]."<br>";
            if(trim($output)==trim($row["output"])){
                echo "1";
            }
            else{
                echo "0";
            }
        }



        exec("del $filename_code");
        exec("del *.o");
        exec("del *.txt");
        exec("del $executable");

    }
?>