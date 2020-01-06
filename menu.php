<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );

$qm = $mysqli->query ( $get_content->get_menu () );
while ( $menu = $qm->fetch_array () ) {
	$sm = $mysqli->query ( $get_content->get_submenu ( $menu ['menuID'] ) );
	$cekSM = $sm->num_rows;
	
	if ($cekSM > 0)
		$arrow = '<span class="fa arrow"></span>';
	
	if ($menu ['url'] != '#' || $cekSM > 0) {
		echo LI_START . "
				<a " . geturl_menu ( $menu ['url'], $sid ) . ">
					<i class='$menu[class]' id=''></i> " . ucwords ( $menu ['menu'] ) . " $arrow
				</a>";
		if ($cekSM > 0) {
			echo '<ul class="nav nav-second-level">';
			while ( $sub = $sm->fetch_array () ) {
				echo LI_START . "<a href=home.php?menu/$sub[mod_name]/view/$sid>
				<i class='fa fa-check-circle-o fa-fw'></i> " . ucwords ( $sub ['mod'] ) . "</a>";
				echo LI_END;
				if (GET_MOD == $sub ['mod_name']) {
					if (in_array ( GET_ACT, $get_content->get_third_menu () ))
						echo LI_START . '<a href="home.php?menu/' . $sub ['mod_name'] . '/' . GET_ACT . '/' . $sid . '">
						<i class="fa fa-angle-right fa-fw"></i> ' . ucwords ( GET_ACT ) . '</a>' . LI_END;
				}
			} // end while
			echo UL_END;
		} // end if
		echo LI_END;
	}
}
?>

