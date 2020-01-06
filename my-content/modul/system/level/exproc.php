<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new Level();

@$mod = 'level';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {
	$mandatory = array (
        $_POST ['md_name'],
        $_POST ['md_desc']
	);
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = $execute->mywebs_level_add(filter_input_array(INPUT_POST));
				$sql_ = $execute->mywebs_retval_add();
				break;
			case $mod . '/edit' :
				$pid = check ( $_POST ['pid'] );
				$sql = $execute->mywebs_level_update(filter_input_array(INPUT_POST));
				$sql_ = $execute->mywebs_retval_update($pid);
				break;
		}
		
		if (check_mandatory ( $mandatory ))
			$sql .= '=>ERR_MANDATORY';
		$exec = $mysqli->query ( $sql );
		
		if ($exec && $event == $mod . '/create') {
			$exec->free ();
			while ( $mysqli->next_result () ) {
				;
			}
		}
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$errinfo = $e->getCode () . ' - ' . $e->getMessage ();
			}
			$retval = json_encode ( retval ( '1064' ) );
		} else {
			$retval = json_encode ( retval ( $sql_ ) );
		}
	} else {
		$retval = json_encode ( retval ( '401' ) );
	}
	echo $retval;
	checkLog_info ( $mod, $sql, $retval, $errinfo );
}
?>