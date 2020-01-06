<?php
define('MYWEBS', TRUE);
include 'my-config/connect.php';
include 'my-config/config.php';

if (isset($_GET['method']) && $_GET['method'] == 'logout') {
  $get_content->destoy_all();
  echo LOGIN_PAGE;
}

if ($_SESSION ['mywebs_uid'] && $_SESSION['mywebs_sid']) {
  check_accsts();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="yudaadp">
    <title>LaundryKu - v1.0</title>
  <?php $get_content->get_library(); ?>
</head>
<body>
<div id="wrapper">
  <?php include 'navbar.php'; ?>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <?php include $get_content->menu(); ?>
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="loader"></div>
                <div class="col-lg-12">
                  <?php
                  include $get_content->content();
                  include $get_content->mycashtoday();
                  include $get_content->jscontent();
                  ?>
                </div>
                <footer class="navbar-default navbar-fixed-bottom">
                    <div class="container-fluid">
                        <span><i>version <?= get_version(); ?></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
</body>
</html>