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
				<h4 class="modal-title" id="myModalLabel">Create New : Module</h4>
			</div>
			<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'create' )) {
									?>
          <form
					action="<?=getmods_info($mod, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST">
					<input type="hidden" name="event" value="<?=$mod.'/create';?>" /> <input
						type="hidden" name="sid" value="<?=$sid;?>" />
					<div class="col-lg-6">
						<div class="form-group">
							<label for="Modal Name">Mod Name</label> <input type="text"
								name="md_name" class="form-control" required />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="Modal Name">Alias</label> <input type="text"
								name="md_alias" class="form-control" required />
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="Modal Name">Location</label> <input type="text"
								name="md_loc" class="form-control" required />
						</div>
						<div class="form-group">
							<label for="Modal Name">Description</label> <input type="text"
								name="md_desc" class="form-control" required />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="Modal Name">Set in Menu</label>
                  <?php
									if (! empty ( checkmodsts ( 'menu' ) )) {
										?>
                  <select class="form-control" name="md_mn">
                  <?= getmenuls();?>
                  </select>
                  <?php
									
} else {
										echo '<strong>' . genparam ( 'HTTP_CODE', '403.1' ) . '</strong>';
									}
									?>
                </div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Modal Name">Set Order</label> <input type="number"
								name="md_order" class="form-control" value="1" required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="Modal Name">Show in menu</label> <select
								class="form-control" name="md_show">
                  <?= getsts('x');?>
                  </select>
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
</div>