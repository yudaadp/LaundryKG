<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include 'class.php';

$execute = new suppliers();
$mysqli = $execute->connect();

@$mod = 'supplier';
@$token = $_POST ['sid'];
@$pid = check($_POST['pid']);
@$event = check ( $_POST ['event'] );

if ($sid == $token) {

	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {

		$mandatory = array (
            $_POST ['sup_nm'],
            $_POST ['email'],
            $_POST ['phone']
		);

		switch ($event) {
			case $mod . '/create' :
                $sql = $execute->mywebs_query_add(filter_input_array(INPUT_POST));
				break;
            case $mod . '/edit' :
                $sql = $execute->mywebs_query_update(filter_input_array(INPUT_POST));
                break;
		}

		if (check_mandatory ( $mandatory ))
			$sql .= '=>ERR_MANDATORY';
		
		$exec = $execute->connect()->query ( $sql );
		
		if (!$exec) {
			try {
				throw new Exception ( "MySQL error ". $mysqli->error, $mysqli->errno );
			} catch ( Exception $e ) {
				$errinfo = $e->getCode () . ' - ' . $e->getMessage ();
			}
			$retval = json_encode ( retval ( '1064' ) );
		} else {
			$retval = json_encode ( retval ( $execute->mywebs_retval($pid) ) );
		}
	} else {
		$retval = json_encode ( retval ( '401' ) );
	}
	echo $retval;
	checkLog_info ( $mod, $sql, $retval, $errinfo );
}
?>