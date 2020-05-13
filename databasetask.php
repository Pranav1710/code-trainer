<?php
if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $id = $_POST['tid'];
    $tc = $_POST['tcs'];
    $lan = $_POST['language'];
    $finalLang = $lan == "c++" ? "callcpp.php" : ($lan == "java" ? "calljava.php" : "callc.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tasks</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='//cdn.jsdelivr.net/npm/hack-font@3.3.0/build/web/hack.css'>
        <style>
            .ta {
                width: 100%;
                height: 200px;
                padding: 12px 20px;
                box-sizing: border-box;
                font-family: Hack, monospace;
                font-size: 18px;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                resize: none;
                tab-size: 4;
            }

            input[type="submit"]:disabled {
                margin-left: -12px;
                margin-right: 8px;
                color: grey;
            }

            .bigbox {
                box-sizing: border-box;
                width: 50%;
                display: flex;
                flex-wrap: wrap;
                /* justify-content: space-around; */
                align-items: flex-start;
                background-color: white;
                border: 2px solid #337ab7; 
                border-radius: 1rem;
                margin-bottom: 100px;
            }

            #err{
                width: 100%;
            }
            #err > pre {
                font-size: 16px;
                /* color: red; */
            }
            .item {
                text-transform: uppercase;
                font-weight: bold;
                font-size: 1em;
                margin: 0.8rem;
                /* flex:1 1 100px; */
                padding: 1rem;
                background-color: beige;
                color: green;
                border: 1.5px solid teal;
                border-radius: 3rem;
            }
        </style>
    </head>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    ?>
    <?php
    include_once "config.php";
    $qry = "SELECT * FROM `ct_tasks` WHERE `t_ID` = " . $_POST['tid'];

    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($result);
    ?>

    <body>
        <div class="wrapper">
            <div class="row">
                <!-- Header -->
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=.navbar-collapse>
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php" style="margin-top: 7px;">CODE TRAINER</a>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="searchfriend.php">FRIEND</a></li>
                                <li><a href="problempage.php">PROBLEM SOLVING</a></li>
                                <li><a href="codetesting.php">CODE TESTING</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        echo $_SESSION['username'];
                                        ?>
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="logout.php">Logout</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">ChangePassword</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="row" style="margin-top: 6em">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <?php echo $row['t_name'] ?>
                                </h3>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <textarea name="tt_discription" id="tt_discription" cols="25" rows="15" disabled class="form-control" style="resize: none; cursor: text;"><?php echo $row['t_discription'] ?></textarea>
                            </div>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <!--FOR CODE-->
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 2em">
                                    <label for="code">Enter Your Code Here</label>
                                    <textarea class="ta" name="code" id="myta" placeholder="Write your Code Here:" rows="25" cols="120" style="resize: none;" onkeydown="checktext('myta')" spellcheck="false"><?php echo $_POST['code'] ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-3" style="margin-top: 2.8em;">
                                    <input type="hidden" name="tid" value="<?php echo $id ?>">
                                    <input type="hidden" name="tcs" value="<?php echo $row['t_noOfTestcase'] ?>">
                                    <input type="hidden" name="language" value="<?php echo $row['ct_language'] ?>">
                                    <input type="submit" class="form-control btn-primary" name="submit" id="submit" value="Loading..." disabled>
                                </div>
                            </div>
                        </form>
                        <div id="result" hidden>
                            <div class="bigbox" style="margin-top: 50px;">
                                <div style="font-size: 18px; color:red" id="err" hidden></div>
                                <div class="item" id="i0" hidden></div>
                                <div class="item" id="i1" hidden></div>
                                <div class="item" id="i2" hidden></div>
                                <div class="item" id="i2" hidden></div>
                                <div class="item" id="i3" hidden></div>
                                <div class="item" id="i4" hidden></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        //wait for page load to initialize scriptvandit
        // document.getElementById("submit").disabled = true;
        function checktext(id) {
            enableTab(id);
            console.log(id.value);
        }

        function enableTab(id) {
            var el = document.getElementById(id);
            el.onkeyup = function(e) {
                if (e.keyCode === 9) { // tab was pressed

                    // get caret position/selection
                    var val = this.value,
                        start = this.selectionStart,
                        end = this.selectionEnd;

                    // set textarea value to: text before caret + tab + text after caret
                    this.value = val.substring(0, start) + ' ' + val.substring(end);

                    // put caret at right position again
                    this.selectionStart = this.selectionEnd = start + 1;

                    // prevent the focus lose
                    return false;

                }
            };
        }
        var allPassed = true;
        var data = {
            code: `<?php echo $code ?>`,
            language: `<?php echo $lan ?>`,
            testcase: `<?php echo $tc ?>`,
            id: `<?php echo $id ?>`
        }
        var data2 = {
            id: data.id
        }
        console.log(data2.id);
        $.ajax({
            type: "POST", //type of submit
            url: "<?php echo $finalLang ?>", //destination
            datatype: "html", //expected data format from process.php
            data: data, //target your form's data and serialize for a POST
            success: function(result) { // data is the var which holds the output of your process.php
                // locate the div with #result and fill it with returned data from process.php
                $("#result").show();
                result.trim()
                console.log(result);

                if (!(result.search("error") == -1)) {
                    var index = result.search("</pre>");
                    var str = result.slice(0,index);
                    $('#err').html(str + "</pre>");
                    $('#err').show();

                    document.getElementById("submit").disabled = false;
                    $("#submit").prop("value", "Submit");
                    $(".bigbox").css("border-color", "red")
                } else {
                    for (var i = 0; i < result.length; i++) {
                        console.log(result[i]);
                        if (result[i] == '1') {
                            var t = '#i' + `${i}`
                            console.log(t);
                            $(t).html("TestCase " + `${i}` + " Passed");
                            $(t).show();
                        } else if (result[i] == '0') {
                            var t = '#i' + `${i}`
                            console.log(t);
                            $(t).html("TestCase " + `${i}` + " Failed");
                            $(t).css("color", "red");
                            $(t).show();
                            allPassed = false;
                        }
                    }
                    if (allPassed == true) {
                        $.ajax({
                            type: "POST",
                            url: "completedtasks.php", //destination
                            data: data2, //target your form's data and serialize for a POST
                            success: function(res) {
                                console.log(res);

                                document.getElementById("submit").disabled = false;
                                $("#submit").prop("value", "Submit");
                            },
                            failure: function(res) {

                                console.log(res);
                                document.getElementById("submit").disabled = false;
                                $("#submit").prop("value", "Submit");
                            }
                        })
                        console.log("all passed");
                    } else {
                        document.getElementById("submit").disabled = false;
                        $("#submit").prop("value", "Submit");
                    }
                }
            },
            failure: function(result) { // data is the var which holds the output of your process.php
                document.getElementById("submit").disabled = false;
                $("#submit").prop("value", "Submit");
                // locate the div with #result and fill it with returned data from process.php
                //console.log(result);
            }
        });
        // });
    </script>
<?php } else { ?>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    ?>
    <?php
    include_once "config.php";
    $qry = "SELECT * FROM `ct_tasks` WHERE `t_ID` = " . $_GET['id'];
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($result);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tasks</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='//cdn.jsdelivr.net/npm/hack-font@3.3.0/build/web/hack.css'>
        <style>
            .ta {
                width: 100%;
                height: 150px;
                font-family: Hack, monospace;
                font-size: 18px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: white;
                resize: none;
                tab-size: 4;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="row">
                <!-- Header -->
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=.navbar-collapse>
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php" style="margin-top: 7px;">CODE TRAINER</a>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="searchfriend.php">FRIEND</a></li>
                                <li><a href="problempage.php">PROBLEM SOLVING</a></li>
                                <li><a href="codetesting.php">CODE TESTING</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        echo $_SESSION['username'];
                                        ?>
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="logout.php">Logout</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">ChangePassword</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="row" style="margin-top: 6em">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    <?php echo $row['t_name'] ?>
                                </h3>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <textarea name="tt_discription" id="tt_discription" cols="25" rows="15" disabled class="form-control" style="resize: none; cursor: text;"><?php echo $row['t_discription'] ?></textarea>
                            </div>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <!--FOR CODE-->
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 2em">
                                    <label for="code">Enter Your Code Here</label>
                                    <textarea class="form-control ta" id="myta" name="code" placeholder="Write your Code Here:" rows="25" cols="120" style="resize: none;" onkeydown="enableTab('myta')" spellcheck="false"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-3" style="margin-top: 2.8em;">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="tcs" value="<?php echo $row['t_noOfTestcase'] ?>">
                                    <input type="hidden" name="language" value="<?php echo $row['ct_language'] ?>">
                                    <input type="submit" class="form-control btn-primary" name="submit" id="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        function enableTab(id) {
            var el = document.getElementById(id);
            el.onkeydown = function(e) {
                if (e.keyCode === 9) { // tab was pressed

                    // get caret position/selection
                    var val = this.value,
                        start = this.selectionStart,
                        end = this.selectionEnd;
                    console.log(val)
                    console.log(start)
                    // set textarea value to: text before caret + tab + text after caret
                    this.value = val.substring(0, start) + "\t" + val.substring(end);

                    // put caret at right position again
                    this.selectionStart = this.selectionEnd = start + 1;

                    // prevent the focus lose
                    return false;

                }
            };
        }
    </script>
    </body>

    </html>