<?php
$arr_data = $role->modlists ( check ( GET_PID ) );

if (GET_PID) {
	if (NULL !== cekAkses ( GET_MOD, $_SESSION ['mywebs_lvl'], 'edit' )) {
		?>
<form action="<?=getmods_info(GET_MOD, 'DIR_PATH');?>" method="POST"
	id="frmRole">
	<input type="hidden" name="event" value="<?=GET_MOD;?>/edit" /> <input
		type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
		name="lid" value="<?=GET_PID;?>" /> <input type="hidden" name="lname"
		value="<?=$_GET['lvl_name'];?>" />
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<tr id="tbl">
				<th>Mod Name</th>
				<th>Permissions Group (<?= ucwords($_GET['lvl_name']);?>)</th>
			</tr>
<?php
		if (count ( $arr_data )) {
			foreach ( $arr_data as $r ) {
				?>
            <tr>
				<td><input type="hidden" name="mid[]" value="<?=$r['mid'];?>" />
			<?php echo '<b>'. ucwords($r['mod_name']);?></b><br /> <i
					style="font-size: 12px">(<?=$r['mod_detail'];?>)</i></td>
				<td><?= $role->showrole($r['role'], $r['mod_name'], $no);?></td>
			</tr>
            <?php
				$no ++;
			}
		}
		echo '</table></div>
		<div class="divider"></div>
				<div class="modal-footer">
				<button class="btn btn-success btn-lg btn-block" id="goSave" type="submit">Save</button>
		</div>
			</form>';
	} else {
		echo genparam ( 'HTTP_CODE', '401' );
	}
} else {
	echo "<meta content='0; url=home.php?menu/level/view/$sid' http-equiv='refresh'/>";
}
?>