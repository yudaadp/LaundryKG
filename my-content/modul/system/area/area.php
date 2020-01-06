<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$mod = 'area';
$get_menu = new Area ();
?>
&nbsp;
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr id="tbl">
				<th width="20">No</th>
				<th width="300">Provinsi</th>
				<th width="300">Kota/Kab</th>
				<th width="300">Kecamatan</th>
				<th width="20">Kelurahan</th>
				<th width="20">Kode Pos</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
$arr_data = $get_menu->show ();
foreach ( $arr_data as $r ) {
	?>
<tr align="center">
				<td><?php echo $no;?></td>
				<td><?php echo $r['1'];?></td>
				<td><?php echo $r['2'];?></td>
				<td><?php echo $r['3'];?></td>
				<td><?php echo $r['5'];?></td>
				<td align="center"><?php echo $r['4'];?></td>
				<td align="center"><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['0'];?>'><img src="my-content/images/icon-edit-on.png"
						border="0" width="20" height="20" /></a></td>
			</tr>
<?php
	$no ++;
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
				<h4 class="modal-title" id="myModalLabel">Create New : Menu</h4>
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

					<div class="form-group">
						<label for="Modal Name">Name of Menu</label> <input type="text"
							name="mn_name" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="Modal Name">URL</label> <input type="text"
							name="mn_url" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="Modal Name">Menu Icon</label> <input type="text"
							name="mn_icon" class="form-control" required />
					</div>
					<div class="form-group">
						<label for="Modal Name">Set Order</label> <input type="text"
							name="mn_order" class="form-control" required />
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