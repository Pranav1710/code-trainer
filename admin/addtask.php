<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Code Trainer - Admin Panel</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />



    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <?php include('nav.php') ?>
    <?php include('header.php') ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="container">
                <form id="form1">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="taskName">Enter Task Name</label>
                            <input type="text" class="form-control" name="taskName" id="taskName" placeholder="Enter Task Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <label for="task" class="form-label">Enter Discription</label>
                            <textarea class="form-control z-depth-1" name="discription" id="task" rows="10" placeholder="Enter Task here..." style='resize: none'></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="testcase">Enter Number of Testcases</label>
                            <input type="number" class="form-control" name="testcase" id="testcase" placeholder="No. of Testcases" max="5" min="1">
                        </div>

                        <div class="col-md-4">
                            <label for="input">Enter Number of input of Each Testcases</label>
                            <input type="number" class="form-control" name="input" id="input" placeholder="No. of Input" max="5" min="1">
                        </div>

                        <div class="col-md-4">
                            <label for="lang">Select Language: </label>
                            <select name="lang" id="lang" class="form-control drop-down">
                                <option value="c">C</option>
                                <option value="c++">C++</option>
                                <option value="java">Java</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <input type="button" class="form-control btn-primary" name="submit" id="submit" value="Submit">
                        </div>

                    </div>
                </form>
                <form id="form2">

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label id="i1"></label>
                            <div id="input1"></div>
                        </div>
                        <div class="col-md-6">
                            <label id="o1"></label>
                            <div id="output1"></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label id="i2"></label>
                            <div id="input2"></div>
                        </div>
                        <div class="col-md-6">
                            <label id="o2"></label>
                            <div id="output2"></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label id="i3"></label>
                        <div class="col-md-6">
                            <label id="i3"></label>
                            <div id="input3"></div>
                        </div>
                        <div class="col-md-6">
                            <label id="o3"></label>
                            <div id="output3"></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label id="i4"></label>
                            <div id="input4"></div>
                        </div>
                        <div class="col-md-6">
                            <label id="o4"></label>
                            <div id="output4"></div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label id="i5"></label>
                            <div id="input5"></div>
                        </div>
                        <div class="col-md-6">
                            <label id="o5"></label>
                            <div id="output5"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <div id="hid_name"></div>
                            <div id="hid_tc"></div>
                            <div id="subi"></div>
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="res"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="modalClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src=" assets/plugins/jquery/jquery.min.js"></script>
    <script src=" assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src=" assets/plugins/toaster/toastr.min.js"></script>
    <script src=" assets/plugins/charts/Chart.min.js"></script>
    <script src=" assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src=" assets/plugins/ladda/spin.min.js"></script>
    <script src=" assets/plugins/ladda/ladda.min.js"></script>
    <script src=" assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src=" assets/plugins/select2/js/select2.min.js"></script>
    <script src=" assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src=" assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src=" assets/plugins/daterangepicker/moment.min.js"></script>
    <script src=" assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src=" assets/plugins/jekyll-search.min.js"></script>
    <script src=" assets/js/sleek.js"></script>
    <script src=" assets/js/chart.js"></script>
    <script src=" assets/js/date-range.js"></script>
    <script src=" assets/js/map.js"></script>
    <script src=" assets/js/custom.js"></script>

    <script>
        $('#submit').click(function(event) {
            event.preventDefault()
            let data = $('#form1').serialize();
            $.ajax({
                url: 'input.php',
                type: "POST",
                data: data,
                // success: res => console.log(res),
                // failure: res => console.log(res),
                success: function(res) {
                    console.log(res)
                    if (res === "Success") {
                        $('#res').text("Task Added Successfully")
                        $('#modalTitle').text(res)
                        $('#modalTitle').css("color", "limegreen")
                        $('#submit').hide()
                        var n = document.getElementById("testcase");
                        var tn = document.getElementById("taskName");
                        //$('#hidden').vslue = $('#input1')
                        for (var i = 1; i <= n.value; i++) {
                            $('#form2 .row .col-md-6 #input' + i).html("<textarea rows= '10' class='form-control z-depth-1' id=ip" + i + " name=ip" + i + " style='resize: none'> </textarea>");
                            $('#form2 .row .col-md-6 #output' + i).html("<textarea rows= '10' class='form-control z-depth-1' id=op" + i + " name=op" + i + " style='resize: none'> </textarea>");
                            $('#form2 .row .col-md-6 #i' + i).html("Enter input Number: " + i);
                            $('#form2 .row .col-md-6 #o' + i).html("Enter Output Number: " + i);

                        }
                        $('#form2 .row .col-md-3 #hid_name').html(`<input type="hidden" id="tname"  name="tname" value = "${tn.value}" >`);
                        $('#form2 .row .col-md-3 #hid_tc').html(`<input type="hidden" id="tc"  name="tc" value = "${n.value}" >`);
                        $('#form2 .row .col-md-3 #subi').html('<input type="button" class="form-control btn-primary" name="sub" id="subi"value="Insert">');


                    } else {
                        $('#res').text("Task Not Added")
                        $('#modalTitle').text(res)
                        $('#modalTitle').css("color", "red")
                    }

                    $('.modal').show()
                },
                failure: function(res) {
                    $('#res').text("Something Went Wrong")
                    $('#modalTitle').text(res)
                    $('#modalTitle').css({
                        "color": "red"
                    })
                    $('.modal').show()
                }

            })
        })
        $('#modalClose').click(() => $('.modal').hide())
    </script>
    <script>
        $('#subi').click(function(e) {
            console.log("clicked");
            let data = $('#form2').serialize();
            $.ajax({
                url: 'insertInput.php',
                type: "POST",
                data: data,
                success: function(re) {
                    console.log(re)
                    $('#res').text("Data Added Successfully")
                    $('#modalTitle').text(re)
                    $('#modalTitle').css("color", "limegreen")
                    $('.modal').show()
                    $('#subi').hide()
                },
                failure: function(re) {
                    $('#res').text("Something Went Wrong")
                    $('#modalTitle').text(res)
                    $('#modalTitle').css({
                        "color": "red"
                    })
                    $('.modal').show()
                }

            })

        })
    </script>
</body>

</html>