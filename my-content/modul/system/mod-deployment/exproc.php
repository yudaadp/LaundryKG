<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new mod_updates();
$mysqli  = $execute->connect();

@$mod = 'mod-deployment';
@$token = md5(SALT . $_POST ['sid']);
@$event = check($_POST ['event']);

if (md5(SALT . $sid) == $token) {
  $file        = $_FILES['fileupload'];
  $notes       = check($_POST['upd_note']);
  $mod_nm      = check($_POST['mod_nm']);
  $mod_dir     = getmods_info($mod_nm);
  $upload      = FALSE;
  $file_deploy = '';

  if (!empty($file)) {
    $file_deploy = $execute->reArrayFiles($file);
  }

  $mandatory = [$file, $mod_nm, $notes];

  if (cekAkses($event, $_SESSION ['mywebs_lvl'])) {

    switch ($event) {
      case $mod . '/create' :
        if (!check_mandatory($mandatory)) {
          foreach ($file_deploy as $val) {
            if (file_exists('../../../../' . $mod_dir . '/' . $val['name'])) {
              unlink('../../../../' . $mod_dir . '/' . $val['name']);
            }
            if (move_uploaded_file($val['tmp_name'], '../../../../' . $mod_dir . '/' . $val['name'])) {
              $upload   = TRUE;
              $datafile .= $val['name'] . ' | ';
            }
            else {
              $upload = FALSE;
            }
          }
        }
        if ($upload) {
          $sql = $execute->upload_files($mod_nm, $datafile, $notes);
        }
        break;
    }
    if (!$upload) {
      $sql .= '=>ERR_UPLOAD';
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
        $errinfo = "Error No: " . $e->getCode() . " - " . $e->getMessage();
      }
      $retval = json_encode(retval('1064'));
    }
    else {
      $retval = json_encode(retval('200'));
    }
  }
  else {
    $retval = json_encode(retval('401'));
  }
  echo $retval;
  checkLog_info($mod, $sql, $retval, $errinfo);
}
?>