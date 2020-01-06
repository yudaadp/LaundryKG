<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

@$mod = 'menu';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	@$name = check ( $_POST ['mn_name'] );
	@$url = check ( $_POST ['mn_url'] );
	@$icon = check ( $_POST ['mn_icon'] );
	@$order = check ( $_POST ['mn_order'] );
	@$pid = check ( $_POST ['pid'] );
	@$sts = check ( $_POST ['mn_sts'] );
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = "INSERT INTO mywebs_menu SET menu='$name', url='$url', class='$icon', aktif='Y', set_order=$order";
				break;
			case $mod . '/edit' :
				$sql = "UPDATE mywebs_menu SET menu='$name', url='$url', class='$icon', aktif='$sts', set_order=$order
						WHERE menuID=$pid";
				break;
			case $mod . '/delete' :
				$sql = "DELETE FROM mywebs_menu WHERE";
				break;
		}
		// execute query
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
		header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('401')."" );
	} // end cek akses
} else {
} // end cek token
?>