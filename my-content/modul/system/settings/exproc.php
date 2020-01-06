<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new settings();
$mysqli  = $execute->connect();

@$mod = 'settings';
@$token = md5($_POST ['sid']);
@$event = check($_POST ['event']);
$sale_id = '';

if (md5(SALT . $sid == $token)) {
  if (NULL !== cekAkses($event, $_SESSION ['mywebs_lvl'])) {

    $mandatory = [
      $_POST['setting_desc'],
      $_POST ['site_nm'],
      $_POST['mail_nm'],
      $_POST['mail_pwd'],
      $_POST['mail_host'],
      $_POST['mail_port'],
      $_POST['printer']
    ];

    switch ($event) {
      case $mod . '/edit' :
        $sql = $execute->save(filter_input_array(INPUT_POST));
        break;
    }

    if (check_mandatory($mandatory)) {
      $sql .= '=>ERR_MANDATORY';
    }

    $mysqli->query($sql);

    if ($mysqli->error) {
      try {
        throw new Exception ("MySQL error $mysqli->error", $mysqli->errno);
      }
      catch (Exception $e) {
        $errinfo = $e->getCode() . ' - ' . $e->getMessage();
      }
      $retval = json_encode(retval('1064'));
    }
    else {
      $retval = json_encode(retval($execute->retval(getid())));
    }
  }
  else {
    $retval = json_encode(retval('401'));
  }
  echo $retval;
  checkLog_info($mod, $sql, $retval, $errinfo);
}
?>