<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';

@$mod = 'stores';
@$token = md5 ( SALT . $_POST ['sid'] );
@$event = check ( $_POST ['event'] );

if (md5 ( SALT . $sid ) == $token) {
	@$str_cd = check ( $_POST ['str_cd'] );
	@$str_nm = check ( $_POST ['str_nm'] );
	@$str_desc = check ( $_POST ['str_desc'] );
	@$email = check ( $_POST ['mail'] );
	@$hp1 = check ( $_POST ['ph1'] );
	@$hp2 = check ( $_POST ['ph2'] );
	@$adrs = check ( $_POST ['addrs'] );
	@$prov = check ( $_POST ['prov'] );
	@$kota = check ( $_POST ['kota'] );
	@$kec = check ( $_POST ['kec'] );
	@$kel = check ( $_POST ['kel'] );
	@$kdpos = check ( $_POST ['kdpos'] );
	
	$mandatory = array (
			$email,
			$str_cd,
			$str_nm 
	);
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
				$sql = "INSERT INTO mywebs_stores (store_cd, store_nm, store_desc, addrs, prov, kota, kec, kel, kd_pos, email, tlp_no, mob_no, createby, createdate) VALUE ('$str_cd','$str_nm','$str_desc','$adrs','$prov','$kota','$kec','$kel','$kdpos','$email','$hp1','$hp2','$_SESSION[mywebs_uid]', NOW())";
				$sql_ = "SELECT *, 200 as retval, '$sid' as sid FROM mywebs_stores WHERE createby='$_SESSION[mywebs_uid]' ORDER BY id DESC LIMIT 1";
				break;
			case $mod . '/edit' :
				if ($_POST ['sub_event']) {
					$sql = "CALL change_store (" . getid () . ", '$_SESSION[mywebs_uid]')";
					$sql_ = "SELECT s.id, s.store_nm, 200 as retval FROM mywebs_stores s INNER JOIN mywebs_users u ON s.`id`=u.`store_id`
								WHERE u.`uid`='$_SESSION[mywebs_uid]'";
				} else {
					$sql = "UPDATE mywebs_stores SET store_nm='$str_nm', store_desc='$str_desc', addrs='$adrs', prov='$prov', kota='$kota', kec='$kec', kel='$kel', kd_pos='$kdpos', email='$email', tlp_no='$hp2', mob_no='$hp1', updateby='$_SESSION[mywebs_uid]', last_update=NOW() WHERE id=" . getid () . "";
					$sql_ = "SELECT *, 200 as retval FROM mywebs_stores WHERE id=" . getid () . "";
				}
				break;
		}
		
		if (! $_POST ['sub_event'])
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