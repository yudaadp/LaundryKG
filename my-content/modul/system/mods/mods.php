<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
$mod = 'mods';
$get_mods = new Mods ();

foreach ( getfiles ( GET_MOD ) as $file ) {
	if (file_exists ( CORE_PATH . GET_MOD . '/' . $file . $EXT ) && $file != 'edit')
		require_once $file . $EXT;
}
?>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>

