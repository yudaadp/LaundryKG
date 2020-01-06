<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';

$id = check ( $_GET ['mid'] );
$mod = 'users';
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Kill Session : <?=$id;?></h4>
		</div>
		<form action="my-content/modul/<?=$mod.'/'.'exproc.php?'.$sid;?>"
			name="mywebs_modal" method="POST">
			<div class="modal-body">
    <?php
				if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'delete' )) {
					?>
          <input type="hidden" name="event" value="<?=$mod;?>/delete" />
				<input type="hidden" name="sid" value="<?=$sid;?>" /> <input
					type="hidden" name="uid" value="<?=$id;?>" />
Are you sure?
    <?php
				
} else {
					echo genparam ( 'HTTP_CODE', '401' );
				}
				?>
     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Yes! I'm Sure!</button>
			</div>
		</form>
	</div>
</div>