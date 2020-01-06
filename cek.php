<?php
if (!empty ($_POST ['user']) and ($_POST ['pass'])) {
  include 'my-config/connect.php';
  include 'my-config/config.php';

  $user = check($_POST ['user']);
  $pass = md5($_POST ['pass']);

  $sql    = "SELECT * FROM userslist WHERE uid='$user' && pass='$pass' && aktif='Y'";
  $login  = $mysqli->query($sql);
  $ketemu = $login->num_rows;

  $token = md5(SALT . $_POST ['token']);

  if ($token == md5(SALT . $sid)) {
    if ($ketemu > 0) {
      $r                         = $login->fetch_array();
      $_SESSION ['mywebs_uid']   = $r ['uid'];
      $_SESSION ['mywebs_store'] = $r ['store_id'];
      $_SESSION ['mywebs_lvl']   = $r ['lid'];
      $_SESSION ['mywebs_sid']   = md5(SALT . $sid);
      $mysqli->query("UPDATE mywebs_users SET ip='" . GET_IP . "', sid='" . $_SESSION ['mywebs_sid'] . "', sts='ON', last_in=NOW() WHERE uid='$_SESSION[mywebs_uid]'");
      usr_log($user, GET_IP, '0');
      $retval = '200';
    }
    else {
      usr_log($user, GET_IP, '1');
      $retval = '401';
    }
  }
  else {
    $retval = '403';
  }
} else {
  $retval = '401';
}
echo $retval;
checkLog_info('LOGIN', $sql, $retval,'');
?>