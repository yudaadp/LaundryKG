<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include 'class.php';

$execute = new laundry();
$mysqli  = $execute->connect();

@$mod = 'laundry';
@$token = $_POST ['sid'];
@$event = check($_POST ['event']);
$sale_id = '';

if (md5(SALT . $sid == $token)) {
  if (NULL !== cekAkses($event, $_SESSION ['mywebs_lvl'])) {

    if ($event == $mod . '/checkout') {
      $ssid = check($_POST['ssid']);
      $store_info = getStoreInfo();

      include '../../../my-content/template/struk/temp_1.php';

      $printer->feed();
      $printer->cut();
      $printer->pulse();
      $printer->close();

      //checkLog_info($mod, $printer, '', $connector);

      if($printer) {
        $retval = json_encode(array('retval'=>'200'));
      } else {
        $retval = json_encode(array('retval'=>'400'));
      }
    } else if($event == $mod . '/print_label') {
      $ssid = check($_POST['ssid']);
      $store_info = getStoreInfo();

      include '../../../my-content/template/struk/temp_label.php';

      $printer->feed();
      $printer->cut();
      $printer->pulse();
      $printer->close();

      //checkLog_info($mod, $printer, '', $connector);

      if($printer) {
        $retval = json_encode(array('retval'=>'200'));
      } else {
        $retval = json_encode(array('retval'=>'400'));
      }
    } else {

      $mandatory = [
        $_POST ['end_date'],
        $_POST ['prod_nm'],
        $_POST ['qty'],
      ];

      $event_mandatory = [
        $mod . '/create',
        $mod . '/edit',
      ];

      switch ($event) {
        case $mod . '/create' :
          $sql = $execute->addtocart(filter_input_array(INPUT_POST));
          break;
        case $mod . '/edit' :
          $sql = $execute->update(filter_input_array(INPUT_POST));
          break;
        case $mod . '/delete' :
          $sql = $execute->del_item(getid(), $_POST['ssid']);
          break;
      }

      if (in_array($event, $event_mandatory)) {
        if (check_mandatory($mandatory)) {
          $sql .= '=>ERR_MANDATORY';
        }
      }

      $exec = $mysqli->query($sql);

      if ($exec) {
        $data    = $exec->fetch_array();
        $sale_id = $data['retval'];

        $exec->free();
        while ($mysqli->next_result()) {
          ;
        }
      }
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
        $retval = json_encode(fake_retval($execute->retval($sale_id)));
      }
    }
  }
  else {
      $retval = json_encode(retval('401'));
    }
    echo $retval;
    checkLog_info($mod, $sql, $retval, $errinfo);
}
?>