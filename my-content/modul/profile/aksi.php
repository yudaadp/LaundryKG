<?php
session_start ();
include '../../../my-config/config.php';
include '../../../my-config/function.php';

$old = md5 ( $_POST ['old_pass'] );
$p1 = md5 ( $_POST ['new_pass'] );
$p2 = md5 ( $_POST ['re_pass'] );
// @$exc = $_POST['act'];

if (NULL !== cekAkses ( 'profile', "$_SESSION[mywebs_lvl]", 'edit' )) {
	if (NULL !== cekData ( 'mywebs_users', "username='$_SESSION[mywebs_usr]' && password='$old'" )) {
		if ($p1 == $p2) {
			$ex = $mysqli->query ( "UPDATE mywebs_users SET password='$p1' WHERE username='$_SESSION[mywebs_usr]'" );
			header ( "location:../../../index.php?$fm=$gm&msg=sucessfully" );
		} else {
			header ( "location:../../../index.php?$fm=$gm&msg=error&errno=1020" );
		}
	} else {
		header ( "location:../../../index.php?$fm=$gm&msg=error&errno=1020" );
	}
} else {
	header ( "location:../../../index.php?$fm=$gm&msg=error&errno=1045" );
}

?>