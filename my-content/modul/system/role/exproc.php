<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

@$mod = 'role';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {
	@$p1 = check ( $_POST ['lid'] );
	@$p2 = check ( $_POST ['lname'] );
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/edit' :
				foreach ( $_POST ['mid'] as $mid ) {
					$val_role = check ( $_POST ['perm_group' . $no] );
					$field_value = "sts='0'";
					
					if ($val_role == 8) {
						$field_value = "sts='1'";
					}
					
					$sql .= "UPDATE mywebs_modul_role SET gid=$val_role, $field_value WHERE lid=$p1 && mid=$mid;";
					$no ++;
				}
				break;
		}
		
		$mysqli->multi_query ( $sql );
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$errinfo = $e->getCode () . ' - ' . $e->getMessage ();
			}
			$retval = json_encode ( retval ( '1064' ) );
		} else {
			$retval = json_encode ( retval ( '200' ) );
		}
	} else {
		$retval = json_encode ( retval ( '401' ) );
	}
	echo $retval;
	checkLog_info ( $mod, $sql, $retval, $errinfo );
}
?>