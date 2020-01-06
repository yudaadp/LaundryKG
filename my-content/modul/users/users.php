<?php
if ( ! defined('MYWEBS'))
    exit ('Not Allowed');

$get_data = new users();

foreach (getfiles(GET_MOD) as $file) {
    if (file_exists(MOD_PATH . GET_MOD . '/' . $file . $EXT) && $file != 'edit')
        require_once $file . $EXT;
}
?>

<div id="ModalEdit" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" class="modal fade" tabindex="-2"
     role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/javascript" src="my-library/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="my-library/js/users.js"></script>
