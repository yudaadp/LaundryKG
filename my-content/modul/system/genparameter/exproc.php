<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$execute = new Genparam();

@$mod = 'genparameter';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = $execute->mywebs_genparam_add(filter_input_array(INPUT_POST));
                break;
			case $mod . '/edit' :
				$sql = $execute->mywebs_genparam_update(filter_input_array(INPUT_POST));
				break;
		}
		// execute query
		$mysqli->query ( $sql );
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $msqli->errno );
			} catch ( Exception $e ) {
                $errinfo .= "Error No: " . $e->getCode () . " - " . $e->getMessage ();
			}
			header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('1064')."" );
		} else {
			header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('201')."" );
		}
	} else {
		header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('401')."" );
	} // end cek akses
    checkLog_info ( $mod, $sql, 'NA', $errinfo );
}
?>