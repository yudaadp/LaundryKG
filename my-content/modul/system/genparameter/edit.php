<?php
require_once '../../../../my-config/connect.php';
require_once '../../../../my-config/config.php';
require_once 'class.php';

$mod = 'genparameter';
$id = check ( $_GET ['mid'] );
$get_data = new Genparam ();
$ed = $get_data->edit($id);
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Parameter Group : <?=ucwords ($ed['code']);?></h4>
		</div>

		<div class="modal-body">
        <?php if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {?>
          <form
				action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['id'];?>" />
				<div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Group Code</label> <input type="text"
							name="md_code" class="form-control" value="<?=$ed['code'];?>"
							required />
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Description</label> <input type="text"
							name="md_desc" class="form-control" value="<?=$ed['p_desc'];?>"
							required />
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit">Confirm</button>
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