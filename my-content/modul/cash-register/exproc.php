<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include 'class.php';

$get_data = new Cash();
$mysqli = $get_data->connect();

@$mod = 'cash-register';
@$token = $_POST ['sid'];
@$event = check ( $_POST ['event'] );

if ($sid == $token) {
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		$mandatory = array (
            $_POST ['create_cash']
		);
		
		switch ($event) {
			case $mod . '/create' :
                $sql = $get_data->mywebs_query_add(filter_input_array(INPUT_POST));
                break;
		}
		if (check_mandatory ( $mandatory ))
			$sql .= '=>ERR_MANDATORY';
		
		$exec = $mysqli->query ( $sql );
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$errinfo = $e->getCode () . ' - ' . $e->getMessage ();
			}
			$retval = json_encode ( retval ( '1064' ) );
		} else {
			$retval = json_encode ( retval ( $get_data->mywebs_retval() ) );
		}
	} else {
		$retval = json_encode ( retval ( '401' ) );
	}
	echo $retval;
	checkLog_info ( $mod, $sql, $retval, $errinfo );
}
?>