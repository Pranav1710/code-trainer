<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: sign-in.php");
}
?>
<?php
include_once "config.php";
$qry = "select * from ct_tasks where t_ID=" . $_GET['id'];
$r = mysqli_query($con, $qry);
$val = mysqli_fetch_array($r);
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
                <form id="form1" action="updatetask.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="taskName">Enter Task Name</label>
                            <input type="text" class="form-control" name="taskName" id="taskName" placeholder="Enter Task Name" value=<?php echo $val['t_name'] ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <label for="task" class="form-label">Enter Discription</label>
                            <textarea class="form-control z-depth-1" name="discription" id="task" rows="10" placeholder="Enter Task here..."><?php echo $val['t_discription'] ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="testcase">Enter Number of Testcases</label>
                            <input type="number" class="form-control" name="testcase" id="testcase" placeholder="No. of Testcases" value=<?php echo $val['t_noOfTestcase'] ?>>
                        </div>

                        <div class="col-md-4">
                            <label for="input">Enter Number of input of Each Testcases</label>
                            <input type="number" class="form-control" name="input" id="input" placeholder="No. of Input" value=<?php echo $val['t_noOfInputs'] ?>>
                        </div>
                        <?php $lng = $val['ct_language'] ?>
                        <div class="col-md-4">
                            <label for="lang">Select Language: </label>
                            <select name="lang" id="lang" class="form-control drop-down">
                                <?php if ($lng == 'c') { ?> 
                                    <option value="c" selected>C</option> 
                                <?php } else {?>
                                    <option value="c">C</option> 
                                <?php }?>

                                <?php if ($lng == 'c++') { ?> 
                                    <option value="c++" selected>C++</option> 
                                <?php } else {?>
                                    <option value="c++">C++</option> 
                                <?php }?>

                                <?php if ($lng == 'java') { ?> 
                                    <option value="java" selected>java</option> 
                                <?php } else {?>
                                    <option value="java">java</option> 
                                <?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <input type="hidden" name="Id" value=<?php echo $_GET['id'] ?>>
                            <input type="submit" class="form-control btn-primary" name="submit" id="submit" value="Update">
                        </div>

                    </div>
                </form>
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
</body>

</html>