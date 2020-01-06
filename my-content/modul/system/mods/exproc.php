<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

@$mod = 'mods';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	@$p1 = check ( $_POST ['md_name'] );
	@$p2 = check ( $_POST ['md_alias'] );
	@$p3 = check ( $_POST ['md_loc'] );
	@$p4 = check ( $_POST ['md_desc'] );
	@$p5 = check ( $_POST ['md_mn'] );
	@$p6 = check ( $_POST ['md_order'] );
	@$p7 = check ( $_POST ['md_sts'] );
	@$p8 = check ( $_POST ['md_show'] );
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = "CALL create_mods ('$p5', '$p2', '$p1', '$p4', '$p3', '$p8', '$p6', '$_SESSION[mywebs_uid]', @retval)";
				break;
			case $mod . '/edit' :
				$pid = check ( $_POST ['pid'] );
				$sql = "UPDATE mywebs_modul SET `mn_id`='$p5', `mod`='$p2', `mod_name`='$p1', `mod_detail`='$p4', `mod_location`='$p3', `sts`='$p7', `show`='$p8', `set_order`='$p6', last_update=NOW(), last_update_by='$_SESSION[mywebs_uid]' WHERE id=$pid";
				break;
			case $mod . '/delete' :
				$sql = "DELETE FROM mywebs_menu WHERE";
				break;
		}
		$mysqli->query ( $sql );
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$error .= "Error No: " . $e->getCode () . " - " . $e->getMessage ();
				$error .= '#SQL => '. $sql;
				saveLogs($error, 'SQL');
			}
			header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('1064')."" );
		} else {
			header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('201')."" );
		}
	} else {
		header ( "location:../../../../home.php?menu/$mod/view/$sid/&msg=400" );
	} // end cek akses
} else {
} // end cek token
?>