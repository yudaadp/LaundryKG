<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include "class.php";

$execute = new Favmenus();
$mysqli = $execute->connect();

@$mod = 'fav-menu';
@$ajx_post = $_POST['ap'];
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
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

		if (isset($ajx_post)) {
			$sql = "SELECT * FROM mywebs_favmenus WHERE userid='$_SESSION[mywebs_uid]' ORDER BY id DESC LIMIT 1";
			$res = $mysqli->query($sql);
			$data = $res->fetch_assoc();
			echo json_encode($data);
		} else {
			if ($mysqli->error) {
				try {
					throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
				} catch ( Exception $e ) {
                    $errinfo = "Error No: " . $e->getCode () . " - " . $e->getMessage ();
				}
				header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('1064')."");
			} else {
				header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('201')."");
			}
		}
	} else {
		header ( "location:../../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('400')."");
	} // end cek akses
    checkLog_info ( $mod, $sql, 'NA', $errinfo );
}
?>