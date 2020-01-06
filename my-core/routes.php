<?php
function getURL($n, $type) {
	$retval = '';
	$menu = 'menu';
	$routes = array ();
	$routes = explode ( '/', $n );
	
	foreach ( $routes as $route ) {
		if (trim ( $route ) != '')
			array_push ( $routes, $route );
	}
	
	if (isset ( $routes [3] ))
		if (md5 ( SALT . $routes ['3'] ) == md5 ( SALT . session_id () ))
			switch ($type) {
				case 'GET_MOD' :
					if ($routes [0] == $menu) {
						$retval = $routes ['1'];
					}
					break;
				case 'GET_ACT' :
					if ($routes [0] == $menu && (! empty ( $routes ['1'] ))) {
						$retval = $routes ['2'];
					}
					break;
				case 'GET_PID' :
					if ($routes [0] == $menu && $routes ['4'] == 'pid') {
						$retval = $routes ['5'];
					}
					break;
			}
	return $retval;
}
function get_dir_path($dir, $fn = NULL) {
	if ($fn == NULL) {
		$fn = 'edit.php';
	} elseif ($fn == 'lookup') {
		$fn = 'lookup.php';
	} else {
		$fn = 'class.php';
	}
	$arr_dir = explode ( '/', $dir );
	
	if ($arr_dir ['2'] == 'system') {
		$dir = $arr_dir ['0'] . '/' . $arr_dir ['1'] . '/' . $arr_dir ['2'] . '/' . $arr_dir ['3'] . '/' . $fn;
	} else {
		$dir = $arr_dir ['0'] . '/' . $arr_dir ['1'] . '/' . $arr_dir ['2'] . '/' . $fn;
	}
	return $dir;
}
function geturl_menu($mn) {
	if ($mn == '###') {
		$mn = '';
	} else {
		$mn = 'href="' . $mn . '"';
	}
	return $mn;
}
?>