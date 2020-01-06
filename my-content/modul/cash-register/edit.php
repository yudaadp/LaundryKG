<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';

$id = check ( $_GET ['mid'] );
$mod = 'kategori';
$ed = $mysqli->query ( "SELECT * FROM mywebs_kategori WHERE id='$id'" )->fetch_array ();
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Users : <?=ucwords ($ed['uid']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form action="<?=MOD_PATH.$mod.'/exproc.php?'.$sid;?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod.'/edit';?>" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['id'];?>" />
				<div class="form-group">
					<label class="control-label" for="md_name">Category Name</label> <input
						type="text" name="md_name" id="md_name" class="form-control"
						onblur="checkname()" value="<?=$ed['cat_name'];?>" required /> <span
						id="user-availability-status"></span>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" rows="3" name="md_desc"><?=$ed['cat_desc'];?></textarea>
				</div>
				<div class="divider"></div>
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