<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );

echo '<li><a href="#"><div>';

if (! empty ( checkmodsts ( 'fav-menu' ) )) {
	echo '<strong>My Favorites Menu</strong>';
} else {
	echo '<strong>' . genparam ( 'HTTP_CODE', '403.1' ) . '</strong>';
}

echo '</div></a>';

if (! empty ( checkmodsts ( 'fav-menu' ) )) {
	$myfav = $get_content->get_myfav_menu ();
	if (count ( $myfav )) {
		foreach ( $myfav as $favmenu ) {
			echo "
				<li><a href=home.php?menu/$favmenu[mod_name]/view/$sid><i class='fa fa-star fa-fw'></i> " . ucwords ( $favmenu ['mod'] ) . "</a></li>";
		}
	}
}
		echo '
				<li class="divider"></li>
		  		<li><a href="home.php?method=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>';
?>