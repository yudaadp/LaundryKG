<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include 'class.php';

$execute = new products();
$mysqli = $execute->connect();

@$mod = 'products';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {

  if (NULL !== cekAkses($event, $_SESSION ['mywebs_lvl'])) {

    switch ($event) {
      case $mod . '/create' :
        $sql = $execute->create(filter_input_array(INPUT_POST));
        break;
      case $mod . '/edit' :
        $sql = $execute->update(filter_input_array(INPUT_POST));
        break;
    }
        $mysqli->query ( $sql );

        if ($mysqli->error) {
          try {
            throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
          } catch ( Exception $e ) {
            $errinfo = $e->getCode () . ' - ' . $e->getMessage ();
          }
          $retval = json_encode ( retval ( '1064' ) );
        } else {
          $retval = json_encode ( fake_retval( $execute->retval(getid()) ) );
        }
      } else {
        $retval = json_encode ( retval ( '401' ) );
      }
  echo $retval;
  checkLog_info($mod, $sql, $retval, $errinfo);
}
?>