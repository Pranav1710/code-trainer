<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="changepass.css">
</head>

<body>
    <div class="wrapper">
        <div class="login-dark">
            <form method="post">
                <h2 class="sr-only">Change Password</h2>
                <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                <div class="form-group"><input class="form-control" id="curpass" type="Password" name="currpass" placeholder="Current Password"></div>
                <div class="form-group"><input class="form-control" id="newpass" type="Password" name="email" placeholder="New Password"></div>
                <div class="form-group"><input class="form-control" id="conpass" type="password" name="password" placeholder="Confirm Password"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="button" id="btnsubmit">Change Password</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#btnsubmit').click(function() {
                $.ajax({
                    type: "POST",
                    url: "change.php",
                    data: {
                        curpass: $("#curpass").val(),
                        newpass: $("#newpass").val(),
                        conpass: $("#conpass").val()
                    },
                    success: function(data) {
                        console.log(data);
                        if (data === 'success') {
                            alert("Password Changed Successfully");
                            window.location = 'problempage.php';
                        } else {
                            alert("Password not changed!!");
                        }
                    }
                });
            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>