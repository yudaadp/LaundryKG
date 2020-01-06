<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
$mod = 'rpt_access';
$get = new RPT ();
$myFav = $get->show ($pid);
?>&nbsp;
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr id="tbl">
				<th width="30">No</th>
				<th>Report Name</th>
				<th width="20"></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
if (count ( $myFav )) {
	foreach ( $myFav as $r ) {
		?>
<tr>
				<td><?php echo $no;?></td>
				<td><?php echo ucwords($r['rpt_name']);?></td>
				<td align="center"><a href="#"  event="edit" class='mywebs_modal'
					id='<?= to_mywebs_char($r['id']);?>' mod='<?= to_mywebs_char($r['lid']);?>'><img
						src="my-content/images/delete-icon.png" border="0" width="20"
						height="20" /></a></td>
			</tr><?php
		$no ++;
	}
}
?>
</tbody>
	</table>
</div>
<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Add Report</h4>
			</div>
			<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'create' )) {
									$myMenu = $get->show_rpt ($pid);
									?>
          <form
					action="<?=getmods_info($mod, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST">
					<input type="hidden" name="event" value="<?=$mod.'/create';?>" /> <input
						type="hidden" name="sid" value="<?=$sid;?>" />
                    <input type="hidden" name="pid" value="<?= $pid;?>"/>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="Modal Name">Report Name</label>
                            <select class="selectpicker form-control" data-style="btn-primary" style="display: none;" name="rpt">
                  <?php
									foreach ( $myMenu as $mn ) {
										echo '<option value="' . $mn ['id'] . '">' . ucwords ( $mn ['rpt_name'] ) . '</option>';
									}
									?>
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
<!-- end modal create -->
<!-- Modal edit -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>