<?php
include 'my-config/connect.php';
include 'my-config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaundryKu | Aplikasi Laundry Kiloan</title>
    <link href="my-plugin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="my-plugin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="my-library/css/toastr.min.css" rel="stylesheet">
    <link href="my-library/css/custom.min.css" rel="stylesheet">
    <script src="my-plugin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="my-library/js/toastr.min.js" type="text/javascript"></script>
    <script src="my-library/js/login.js" type="text/javascript"></script>
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <form method="post" id="login">
                    <h1>LaundryKu</h1>
                    <div>
                        <input type="text" class="form-control input-lg" placeholder="Username"
                               name="user" id="user" required/>
                    </div>
                    <div>
                        <input type="password" class="form-control input-lg" name="pass"
                               placeholder="Password" id="pass" required/>
                    </div>
                    <div>
                        <input type="hidden" id="token" name="token" value="<?= session_id(); ?>"/>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="gologin">Log in</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                    </div>
                </form>
                <br/>
                <p>©<?= date('Y'); ?> All Rights Reserved. by digitalisasi.com<br/>
                </p>
            </section>
        </div>
    </div>
</div>
</body>
</html>