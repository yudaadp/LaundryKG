<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new Menu();

@$mod = 'menu';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {
	@$pid = check ( $_POST ['pid'] );
	
	$mandatory = array($_POST ['mn_name'], $_POST ['mn_url'], $_POST ['mn_icon']);
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
                $sql = $execute->mywebs_menu_add(filter_input_array(INPUT_POST));
				$sql_ = $execute->mywebs_retval_add();
				break;
			case $mod . '/edit' :
				$sql = $execute->mywebs_menu_update(filter_input_array(INPUT_POST));
				$sql_ = $execute->mywebs_retval_update($pid);
				break;
		}
		// execute query
		
		if (check_mandatory ( $mandatory ))
			$sql .= '=>ERR_MANDATORY';
		
		$mysqli->query ( $sql );
		
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