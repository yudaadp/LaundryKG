<?php
if ( ! defined('MYWEBS'))
    exit ('Not Allowed');

$get_data = new mod_updates();

foreach (getfiles(GET_MOD) as $file) {
    if (file_exists(getmods_info(GET_MOD) .'/'. $file . $EXT) && $file != 'edit')
        require_once $file . $EXT;
}
?>

<div id="ModalEdit" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" class="modal fade" tabindex="-2"
     role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
    $(document).ready(function(e){$("#formUpdate").on('submit',(function(e){e.preventDefault();var exec=$('#formUpdate').attr("action");$.ajax({dataType:'json',type:'POST',url:exec,data:new FormData(this),contentType:!1,cache:!1,processData:!1,beforeSend:function(){$("#goSave").text('Updating modules..')},}).done(function(data){if(data.retval=='200'){$("#upd_note").val('');$("#upd_files").val('');$("#goSave").text('Apply Update');toastr.success('File(s) Updated','Success Alert',{timeOut:5000})}else{$("#goSave").text('Try Again');toastr.error('Update failed, please try again.','Error:',{timeOut:5000})}})}))});
</script>