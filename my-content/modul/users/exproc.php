<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include '../../../my-config/f_mail.php';
include 'class.php';

$execute = new users();
$mysqli  = $execute->connect();

@$mod = 'users';
@$token = md5(SALT . $_POST ['sid']);
@$event = check($_POST ['event']);

if (md5(SALT . $sid) == $token) {
  $uid         = check($_POST ['uid']);

  $mandatory_create = [
    $_POST ['uid'],
    $_POST ['md_name'],
    $_POST ['md_pass'],
    $_POST ['md_mail'],
  ];

  $mandatory_edit = [
    $_POST ['md_name'],
    $_POST ['md_mail'],
  ];

  $sent_mail = [
    $mod . '/create',
    $mod . '/pwd',
  ];

  if (NULL !== cekAkses($event, $_SESSION ['mywebs_lvl'])) {

    switch ($event) {
      case $mod . '/create' :
        $sql = $execute->mywebs_query_add(filter_input_array(INPUT_POST));
        break;
      case $mod . '/edit' :
        $sql = $execute->mywebs_query_edit(filter_input_array(INPUT_POST));
        break;
      case $mod . '/pwd' :
        $newpass = md5($_POST['new_pwd']);
        $sql     = $execute->mywebs_change_pass($uid, $newpass);
        break;
      case $mod . '/delete' :
        $sql = $execute->mywebs_delete($uid);
        break;
    }

    if ($event == $mod . '/create') {
      if (check_mandatory($mandatory_create)) {
        $sql .= '=>ERR_MANDATORY';
      }
    }
    if ($event == $mod . '/edit') {
      if (check_mandatory($mandatory_edit)) {
        $sql .= '=>ERR_MANDATORY';
      }
    }

    //execute query
    $exec = $mysqli->query($sql)->fetch_object();
    if ($mysqli->error) {
      try {
        throw new Exception ("MySQL error $mysqli->error", $mysqli->errno);
      }
      catch (Exception $e) {
        $errinfo = "Error No: " . $e->getCode() . " - " . $e->getMessage();
      }
      $retval = json_encode(retval('1064'));
    }

    if ($exec->retval == '201') {
      //if (in_array($event, $sent_mail)) {
      //if (isset ($_POST ['md_sent']))
      //sentMail($uid, $_POST['md_name'], $_POST['md_mail'], $_POST['md_pass']);
      //}
      $retval = json_encode(retval($execute->mywebs_retval($event, $uid)));
    }
    else {
      $retval = json_encode(retval('400'));
    }
  }
  else {
    $retval = json_encode(retval('401'));
  }
  echo $retval;
  checkLog_info($mod, $sql, $retval, $errinfo);
}
?>