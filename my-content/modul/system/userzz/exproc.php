<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
include '../../../my-config/f_mail.php';

@$mod = 'users';
@$token = md5(SALT.$_POST ['sid']);
@$event = check ( $_POST ['event'] );

if (md5(SALT.$sid) == $token) {
	@$fn = check ( $_POST ['md_name'] );
	@$uid = check ( $_POST ['uid'] );
	@$email = check ( $_POST ['md_mail'] );
	@$hp1 = check ( $_POST ['md_phone1'] );
	@$hp2 = check ( $_POST ['md_phone2'] );
	@$pass = $_POST ['md_pass'];
	@$lvl = check ( $_POST ['md_level'] );
	@$adrs = check ( $_POST ['address'] );
	@$refcode = check($_POST['refcode']);
	@$gid = check($_POST['gcd']);
	
	$_SESSION['mywebs_lvl'] != 1 ? $gcd = $_SESSION['mywebs_gcd'] : $gcd=$gid;
	
	if (NULL !== cekAkses ( $event, $_SESSION ['mywebs_lvl'] )) {
		
		switch ($event) {
			case $mod . '/create' :
			if (isset($_FILES['md_photo']['name'])) {
			$path = "../../images/photo/";
			$valid_file_formats = array("jpg","png","jpeg");
			if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['md_photo']['name'];
				$size = $_FILES['md_photo']['size'];
			if(strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_file_formats)) {
					if($size<(1024*1024)) {
						$image_name = date('dmY').'_'.$name;
						$tmp = $_FILES['md_photo']['tmp_name'];
					convert_img($image_name, $path);
					$httpcode = '200';
				} else
					$httpcode = '500.1';
				} else
					$httpcode = '415';
				} else
					$httpcode = '415';
				}
			} else {
				$image_name = 'nopic.jpg';
			}
				$sql = "CALL create_users ('$uid','$gcd', '$lvl','$refcode','$image_name','" . md5 ( $pass ) . "','$fn','$adrs','$email','$hp1','$hp2','$_SESSION[mywebs_uid]', '$httpcode', @retval)";
				break;
			case $mod . '/edit' :
				$actv = check ( $_POST ['md_sts'] );
				$_SESSION['mywebs_lvl'] == 1 ? $g_cd = $gid : $g_cd = $_SESSION['mywebs_gcd'];
				$sql = "CALL edit_users ('$uid', '$lvl', '$g_cd', '$actv','$fn','$adrs','$email','$hp1','$hp2','$_SESSION[mywebs_uid]', @retval)";
				break;
			case $mod . '/pwd' :
				$newpass = md5($_POST['new_pwd']);
				$sql = "CALL change_pass ('$uid','$newpass','$_SESSION[mywebs_uid]', @retval)";
				break;
			case $mod . '/pic' :
			if (isset($_FILES['md_photo']['name'])) {
			$path = "../../images/photo/";
			$valid_file_formats = array("jpg","png","jpeg");
			if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
				$name = $_FILES['md_photo']['name'];
				$size = $_FILES['md_photo']['size'];
			if(strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_file_formats)) {
					if($size<(1024*1024)) {
						$image_name = date('dmY').'_'.$name;
						$tmp = $_FILES['md_photo']['tmp_name'];
					convert_img($image_name, $path);
					$httpcode = '200';
				} else
					$httpcode = '500.1';
				} else
					$httpcode = '415';
				} else
					$httpcode = '415';
				}
			} else {
				$httpcode = '500.1';
			}
		$sql = "CALL change_pic ('$uid','$image_name','$_SESSION[mywebs_uid]', '$httpcode', @retval)";
		break;
			case $mod . '/delete' :
				$sql = "CALL kill_session ('$uid', '$_SESSION[mywebs_uid]', @retval)";
				break;
		}
		
		//execute query
		$exec = $mysqli->query ( $sql )->fetch_object ();
		 if ($mysqli->error) {
			try {
				throw new Exception ( "MySQL error $mysqli->error", $mysqli->errno );
			} catch ( Exception $e ) {
				$error .= "Error No: " . $e->getCode () . " - " . $e->getMessage ();
				$error .= '#SQL => '. $sql;
				saveLogs($error, 'SQL');
			}
			header ( "location:../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('1064')."" );
		} else {
			if ($event == $mod . '/create') {
				if (isset ( $_POST ['md_sent'] )) {
					sentMail ( $uid, $fn, $email, $pass );
				}
			}
			header ( "location:../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char($exec->retval)."" );
		}
	} else {
		header ( "location:../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('401')."" );
	} // end cek akses
} else {
	header ( "location:../../../home.php?menu/$mod/view/$sid/&$e_msg=".to_mywebs_char('401')."" );
} // end cek token
?>