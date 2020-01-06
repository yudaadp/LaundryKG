<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$mod = 'reports';
$get_menu = new RPT ();
?>
&nbsp;
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr id="tbl">
				<th width="20">No</th>
				<th width="300">Report Name</th>
				<th width="300">Description</th>
				<th width="300">File Name</th>
                <th>Paper</th>
				<th width="20">Source</th>
				<th width="20">Type</th>
                <th width="20">Sts</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
$arr_data = $get_menu->show ();
foreach ( $arr_data as $r ) {
	?>
<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $r['2'];?></td>
				<td><?php echo $r['3'];?></td>
				<td><?php echo $r['1'];?></td>
                <td><?php echo $r['10'].'/'.$r['11'];?></td>
				<td><?php echo $r['4'];?></td>
                <td><?php echo $r['8'];?></td>
				<td><?php echo $r['9'];?></td>
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
				<h4 class="modal-title" id="myModalLabel">Create New : Report</h4>
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
              <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><i>Report Information</i></b>
                        </div>
             	<div class="panel-body">
					<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Report name</label> <input type="text"
							name="p_name" class="form-control" required />
					</div>
                    </div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">File name</label> <input type="text"
							name="p_fn" class="form-control" required />
					</div>
                    </div>
                    <div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Description</label> <input type="text"
							name="p_desc" class="form-control" required />
					</div>
                    </div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Path</label> <input type="text"
							name="p_path" class="form-control" required />
					</div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
						<label for="Modal Name">Paper</label> <input type="text"
							name="p_ppr" class="form-control" value="A4"required />
					</div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
						<label for="Modal Name">Set As</label> <input type="text"
							name="p_type" class="form-control" placeholder="P/R (P=Print, R=Report)" required />
					</div>
                    </div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Print As</label> <input type="text"
							name="p_style" class="form-control" placeholder="P/L (P=Potrait, L=Lanscape)" required />
					</div>
                    </div>
               </div>
               </div>
               <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><i>Margin</i></b>
                        </div>
             	<div class="panel-body">
                   <div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="SID">Top</label> <input
								type="text" name="p_top" id="p_top" value="7" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="md_name">Right</label> <input
								type="text" name="p_right" id="p_right" value="10" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="inputError">Bottom</label> <input
								type="text" name="p_btm" id="p_btm" class="form-control" value="7" required />
						</div>
					</div>
                    <div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="inputError">Left</label> <input
								type="text" name="p_left" id="p_left" class="form-control" value="10" required />
						</div>
					</div>
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