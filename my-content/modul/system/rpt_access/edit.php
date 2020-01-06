<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
$mod = 'rpt_access';
$id = check ( $_GET ['mid']);
$lid = check ($_GET ['mod_nm']);
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Delete Confirmation : <?=ucwords ($mod_nm);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'delete' )) {
									?>
          <form
				action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/delete" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> 
                    <input type="hidden" name="pid" value="<?=$id;?>" />
                    <input type="hidden" name="lid" value="<?=$lid;?>"/>
				<div class="form-group">
					Are you sure want to remove this report?
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit">Yes</button>
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