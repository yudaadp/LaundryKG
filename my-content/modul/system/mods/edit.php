<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
$mod = 'mods';
@$id = check ( $_GET ['mid'] );
$ed = $mysqli->query ( "SELECT * FROM mywebs_modul WHERE id=$id" )->fetch_array ();
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Module : <?=ucwords ($ed['mod']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form
				action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['id'];?>" />
				<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Mod Name</label> <input type="text"
							name="md_name" class="form-control" value="<?=$ed['mod_name'];?>"
							required />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Alias</label> <input type="text"
							name="md_alias" class="form-control" value="<?=$ed['mod'];?>"
							required />
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Location</label> <input type="text"
							name="md_loc" class="form-control"
							value="<?=$ed['mod_location'];?>" required />
					</div>
					<div class="form-group">
						<label for="Modal Name">Description</label> <input type="text"
							name="md_desc" class="form-control"
							value="<?=$ed['mod_detail'];?>" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label for="Modal Name">Set in Menu</label>
                  <?php
									if (! empty ( checkmodsts ( 'menu' ) )) {
										?>
                  <select class="form-control" name="md_mn">
                  <?= getmenuls($ed['mn_id']);?>
                  </select>
                  <?php
									
} else {
										echo '<input type="hidden" name="md_mn" value="' . $ed ['mn_id'] . '"/>';
										echo '<strong>' . genparam ( 'HTTP_CODE', '403.1' ) . '</strong>';
									}
									?>
                </div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label for="Modal Name">Set Order</label> <input type="number"
							name="md_order" class="form-control"
							value="<?=$ed['set_order'];?>" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label>Set Active</label> <select class="form-control"
							name="md_sts">
                  <?= getsts($ed['sts']);?>
                  </select>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label>Show in menu</label> <select class="form-control"
							name="md_show">
                  <?= getsts($ed['show']);?>
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