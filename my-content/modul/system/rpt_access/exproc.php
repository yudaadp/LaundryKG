<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

@$mod = 'rpt_access';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	@$p1 = check ( $_POST ['rpt'] );
	@$pid = check ($_POST['pid']);
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = "INSERT INTO mywebs_report_roles SET rpt='$p1', lid='$pid', createby='$_SESSION[mywebs_uid]', createdate=NOW()";
				break;
			case $mod . '/edit' :
				$sql = "";
				break;
			case $mod . '/delete' :
				$id = check (dec_mywebs_char( $_POST ['pid']) );
				$pid = check (dec_mywebs_char( $_POST ['lid']) );
				$sql = "DELETE FROM mywebs_report_roles WHERE rpt=$id && lid=$pid";
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
			header ( "location:../../../../home.php?menu/$mod/view/$sid/pid/$pid/&$e_msg=".to_mywebs_char('1064')."");
		} else {
			header ( "location:../../../../home.php?menu/$mod/view/$sid/pid/$pid/&$e_msg=".to_mywebs_char('201')."");
		}
	} else {
		header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('400')."");
	} // end cek akses
} else {
} // end cek token
?>