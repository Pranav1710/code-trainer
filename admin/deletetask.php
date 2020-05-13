<?php
  session_start();
  if(!isset($_SESSION['email'])){
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
  <?php
  include_once 'config.php';
  $qry = "select * from ct_tasks";
  $result = mysqli_query($con, $qry);
  ?>
  <div class="mobile-sticky-body-overlay"></div>

  <?php include('nav.php') ?>
  <?php include('header.php') ?>
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <table class="table table-light table-striped table-responsive-md" id="tb">
          <thead class="thead-dark">
            <tr class="bg-primary">
              <th scope="col">no</th>
              <th scope="col">Task Name</th>
              <th scope="col">No Of Testcases</th>
              <th scope="col">No Of Input of Each Testcase</th>
              <th scope="col">Language</th>
              
              <th></th>
              <!-- <th></th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
              echo '<tr id="row' . $row['t_ID'] . '">';
              $i++;
            ?>
              <td scope="row"><?php echo $i . "<br>"; ?>
              <td><?php echo $row['t_name'] . "<br>"; ?></td>
              <td><?php echo $row['t_noOfTestcase'] . "<br>"; ?></td>
              <td><?php echo $row['t_noOfInputs'] . "<br>"; ?></td>
              <td><?php echo $row['ct_language'] . "<br>"; ?></td>
              <td><input type="button" class="btn btn-primary btn-sm" value="Edit" onclick="editTask(<?php echo $row['t_ID'] ?>)">
              <span style="margin:0px 5px"></span>
              <input type="button" class="btn btn-danger btn-sm" value="Delete" onclick="deleteTask( <?php echo $row['t_ID'] ?> )"></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
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

  <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you Want To Delete This Task?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnDelConfirm">Yes! Delete it</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="modalRes">
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
          <button type="button" id="modalClose" class="btn btn-secondary" data-dismiss="#modalRes">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function editTask(id) {
      window.location = `editTask.php?id=${id}`
    }
    function deleteTask(id) {
      $('#deleteModal').modal('show');
      $('#btnDelConfirm').click(function() {
        $('#deleteModal').modal('hide');
        // console.log(`row${id}`)

        $.ajax({
          url: `delete.php?id=${id}`,
          success: function(res) {
            if (res === "Success") {
              $('#res').text("Task Deleted Successfully")
              $('#modalTitle').text(res)
              $('#modalTitle').css("color", "limegreen")
              $(`#row${id}`).remove()
            } else {
              $('#res').text("Task Not Deleted")
              $('#modalTitle').text(res)
              $('#modalTitle').css("color", "red")
            }

            $('#modalRes').show()
          },
          failure: function(res) {
            $('#res').text("Something Went Wrong")
            $('#modalTitle').text(res)
            $('#modalTitle').css({
              "color": "red"
            })
            $('#modalRes').show()
          }
        })
      })
    }
    $('#modalClose').click(() => $('#modalRes').hide())
    // $('#tb tbody').on('click', '#btnDelete', function() {
    //   // $('#deleteModal').modal('show');
    //   console.log($(this).closest('tr'))

    // });
  </script>
</body>

</html>