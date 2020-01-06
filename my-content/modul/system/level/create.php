<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
	?>
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Create New : Level</h4>
				</div>
				<div class="modal-body">
				<?php
				if (NULL !== cekAkses ( GET_MOD, $_SESSION ['mywebs_lvl'], 'create' )) {
					?>
          <form
					action="<?=getmods_info(GET_MOD, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST" id="frmAdd">
					<input type="hidden" name="event" value="<?=GET_MOD.'/create';?>" /> <input
						type="hidden" name="sid" value="<?=$sid;?>" id="sid" />
					<div class="form-group">
						<label for="Modal Name">Level Name</label> <input type="text"
							name="md_name" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="Modal Name">Description</label> <input type="text"
							name="md_desc" class="form-control" required />
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit" id="goSave">Confirm</button>
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
</div>