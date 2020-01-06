<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

$id = check ( $_GET ['mid'] );
$mod = 'menu';
$ed = $mysqli->query ( "SELECT * FROM mywebs_menu WHERE menuID=$id" )->fetch_array ();
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Menu : <?=ucwords ($ed['menu']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form
				action="my-content/modul/system/menu/exproc.php?<?=$sid;?>"
				name="mywebs_modal" method="POST">
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
						<label for="Modal Name">Set Order</label> <input type="number"
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