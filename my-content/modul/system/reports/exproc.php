<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

@$mod = 'reports';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	@$name = check ( $_POST ['p_name'] );
	@$fn   = check ( $_POST ['p_fn'] );
	@$desc = check ( $_POST ['p_desc'] );
	@$path = check ( $_POST ['p_path'] );
	@$tipe = check ( $_POST ['p_type'] );
	@$ppr = check($_POST['p_ppr']);
	@$mode = check($_POST['p_style']);
	
	//margin
	@$top = check($_POST['p_top']);
	@$btm = check($_POST['p_btm']);
	@$lft = check($_POST['p_left']);
	@$rgt = check($_POST['p_right']);
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = "INSERT INTO mywebs_reports SET rpt_fn='$fn', rpt_name='$name', rpt_desc='$desc', rptType='$tipe', rpt_path='$path', paper='$ppr', ppr_orts='$mode', mt='$top', mr='$rgt', mb='$btm', ml='$lft', createby='$_SESSION[mywebs_uid]', createdate=NOW()";
				break;
			case $mod . '/edit' :
			$id = check($_POST['pid']);
				$sql = "UPDATE mywebs_reports SET rpt_fn='$fn', rpt_name='$name', rpt_desc='$desc', rptType='$tipe', rpt_path='$path', paper='$ppr', ppr_orts='$mode', mt='$top', mr='$rgt', mb='$btm', ml='$lft', last_update=NOW(), last_updateby='$_SESSION[mywebs_uid]' WHERE id=$id";
				break;
		}
		// execute query
		$mysqli->query ( $sql );
		
		if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$error .= "Error No: " . $mod.' - '. $e->getCode () . " - " . $e->getMessage ();
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