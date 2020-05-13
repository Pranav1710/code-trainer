<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<?php
if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $id = $_POST['tid'];
    $tc = $_POST['tcs'];
    $lan = $_POST['language'];
    $finalLang = $lan=="c++"?"callcpp.php":($lan=="java"?"calljava.php":"callc.php");
?>
    <form id="form">
        <input type="hidden" name="code" value='<?php echo $code ?>'>
        <input type="hidden" name="language" value="<?php echo $lan ?>">
        <input type="hidden" name="testcase" value="<?php echo $tc ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="button" value="sub" id="sub" onclick="call()">
    </form>
      
<?php } ?>
<p id="abc" name="output"></p>
<script>
    //wait for page load to initialize script
    function call() {
        $.ajax({
                type: "POST", //type of submit
                cache: false, //important or else you might get wrong data returned to you
                url: "<?php echo $finalLang ?>" , //destination
                datatype: "html", //expected data format from process.php
                data: $('form').serialize(), //target your form's data and serialize for a POST
                success: function(result) { // data is the var which holds the output of your process.php

                    // locate the div with #result and fill it with returned data from process.php
                    result.trim()
                    console.log(result);

                },
                failure: function(result) { // data is the var which holds the output of your process.php

                    // locate the div with #result and fill it with returned data from process.php
                    //console.log(result);

                }
            });
    }
</script>
<!-- process echo answer
string.split(',')
[true, false, false ... n] -->