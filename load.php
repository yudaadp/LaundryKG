<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );

if ($G_MSG)
	echo get_alert ( 'HTTP_CODE', dec_mywebs_char ( $G_MSG ) );

if (isset ( $_SESSION ['mywebs_lvl'] ) && ($_SESSION ['mywebs_uid'])) {
	if (GET_MOD) {
		if (NULL !== cekAkses ( GET_MOD, $_SESSION ['mywebs_lvl'] )) {
			$MPATH = getmods_info ( GET_MOD, 'DIR' );
			
			if (! file_exists ( $MPATH )) {
				echo redirect ( '404' );
			} else {
				echo $get_content->header($back_btn, $subhead);
				echo $get_content->breadcrumb($sid);
				if (file_exists ( get_dir_path ( $MPATH, 'CLASS' ) )) {
					include_once get_dir_path ( $MPATH, 'CLASS' );
				}
				
				include_once $MPATH;
			}
		} else {
			echo redirect ( '401' );
		}
	} else {
		echo DASHBOARD;
	}
} else {
	echo LOGIN_PAGE;
}
?>