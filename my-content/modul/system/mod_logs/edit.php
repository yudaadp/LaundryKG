<?php
require_once '../../../../my-config/connect.php';
require_once '../../../../my-config/config.php';

$mod = 'mod_logs';
$id = check ( $_GET ['mid'] );
$mod_nm = check ( $_GET ['mod_nm'] );
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Delete Confirmation : <?=ucwords ($mod_nm);?></h4>
		</div>

		<div class="modal-body">
        <?php if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'delete' )) { ?>
          <form
				action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST" id="frmDel">
				<input type="hidden" name="event" id="event" value="<?=$mod;?>/delete" /> <input
					type="hidden" name="sid" id="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$id;?>" id="pid" />
				<div class="form-group">
					Are you sure want to delete <b>"<?=ucwords ($mod_nm);?>"</b> from
					your favorites menu?
				</div>
				<div class="modal-footer">
					<button class="btn btn-success del-yes" type="submit" id="goChange">Yes</button>
					<button type="reset" class="btn btn-danger" data-dismiss="modal"
						aria-hidden="true">Cancel</button>
				</div>
			</form>
             <?php
								
} else {
									echo genparam ( 'HTTP_CODE', '401' );
								}
								?>
            </div>
	</div>
</div>
<script>
$("#goChange").click(function(e){
    e.preventDefault();
    var exec = $('#frmDel').attr("action");
    var formdata = $('#frmDel').serialize();
    var pid = $('#pid').val();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: exec,
            data: formdata,
            beforeSend: function(){ $("#goChange").text('Processing..');},
		}).done(function(data){

			if(data.retval == '200') {
				$('#ModalEdit').modal('hide');
				$('tr#data'+pid).remove();
				$("#goChange").text('Confirm');
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				$("#goChange").text('Try Again');
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
});
</script>