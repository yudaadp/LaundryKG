<?php
require_once '../../../../my-config/connect.php';
require_once '../../../../my-config/config.php';
require_once 'class.php';

$mod = 'menu';
$id = check ( $_GET ['mid'] );
$get_menu = new Menu ();
$ed = $get_menu->edit ( $id );
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Menu : <?= $mod. ucwords ($ed['menu']);?></h4>
		</div>

		<div class="modal-body">
        <?php if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) { ?>
          <form action="<?=getmods_info($mod, 'DIR_PATH');?>"
				id="frmEdit" name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="menu/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['menuID'];?>" />
				<div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Name of Menu</label> <input type="text"
							name="mn_name" class="form-control" value="<?=$ed['menu'];?>"
							required />
					</div>
					<div class="form-group">
						<label for="Modal Name">URL</label> <input type="text"
							name="mn_url" class="form-control" value="<?=$ed['url'];?>"
							required />
					</div>
					<div class="form-group">
						<label for="Modal Name">Menu Icon</label> <input type="text"
							name="mn_icon" class="form-control" value="<?=$ed['class'];?>" />
					</div>
				</div>
				<!-- col 12 -->
				<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">SEQ</label> <input type="number"
							name="mn_order" class="form-control"
							value="<?=$ed['set_order'];?>" required />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Set Active</label> <select class="form-control"
							name="mn_sts">
                  <?= getsts($ed['aktif']);?>
                  </select>
					</div>
				</div>
				<!-- end col 6 -->
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
            beforeSend: function(){ $("#goChange").text('Saving..');},
		}).done(function(data){

			if(data.retval == '200') {
				$('#ModalEdit').modal('hide');
				$('#tbdata tr').find('#menu'+data.menuID).text(data.menu);
				$('#tbdata tr').find('#url'+data.menuID).text(data.url);
				$('#tbdata tr').find('#icon'+data.menuID).text(data.class);
				$('#tbdata tr').find('#seq'+data.menuID).text(data.set_order);
				$('#tbdata tr').find('#sts'+data.menuID).text(data.aktif);
				$("#goChange").text('Confirm');
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				$("#goChange").text('Try Again');
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
}); 
</script>