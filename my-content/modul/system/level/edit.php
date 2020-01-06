<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

$mod = 'level';
$id = check ( $_GET ['mid'] );
$ed = $mysqli->query ( "SELECT * FROM mywebs_level WHERE id=$id" )->fetch_array ();
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Level : <?=ucwords ($ed['level_name']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form
				action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST" id="frmEdit">
				<input type="hidden" name="event" value="<?=$mod;?>/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['id'];?>" />
				<div class="form-group">
					<label for="Modal Name">Level Name</label> <input type="text"
						name="md_name" class="form-control"
						value="<?=$ed['level_name'];?>" required />
				</div>
				<div class="form-group">
					<label for="Modal Name">Description</label> <input type="text"
						name="md_desc" class="form-control"
						value="<?=$ed['level_desc'];?>" required />
				</div>
				<div class="form-group">
					<label>Set Active</label> <select class="form-control"
						name="md_sts">
                  <?= getsts($ed['sts']);?>
                  </select>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit" id="goChange">Confirm</button>
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
    var exec = $('#frmEdit').attr("action");
    var formdata = $('#frmEdit').serialize();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: exec,
            data: formdata,
            beforeSend: function(){ $("#goChange").text('Processing..');},
		}).done(function(data){

			if(data.retval == '200') {
				$('#ModalEdit').modal('hide');
				$('#tbdata tr').find('#lvl'+data.id).text(data.level_name);
				$('#tbdata tr').find('#desc'+data.id).text(data.level_desc);
				$('#tbdata tr').find('#sts'+data.id).text(data.sts);
				$("#goChange").text('Confirm');
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				$("#goChange").text('Try Again');
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
}); 
</script>