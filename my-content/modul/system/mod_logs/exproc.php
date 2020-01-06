<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new Logs();
$mysqli = $execute->connect();

@$mod = 'mod_logs';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {
	@$p1 = check ( $_POST ['mn_id'] );
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = $execute->mywebs_query_add($p1);
				break;
			case $mod . '/delete' :
				$pid = check ( $_POST ['pid'] );
				$sql = $execute->mywebs_query_del($pid);
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
            $retval = json_encode ( retval($execute->mywebs_retval()));
		}
	} else {
		$retval = json_encode(retval('401'));
	}
	echo $retval;
	checkLog_info ( $mod, $sql, $retval, $errinfo);
}
?>