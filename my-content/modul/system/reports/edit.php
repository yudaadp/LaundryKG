<?php
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

$id = check ( $_GET ['mid'] );
$mod = 'reports';
$ed = $mysqli->query ( "SELECT * FROM mywebs_reports WHERE id=$id" )->fetch_array ();
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Report : <?=ucwords ($ed['menu']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form
				action="my-content/modul/system/<?=$mod.'/exproc.php?'.$sid;?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$ed['id'];?>" />
				<div class="panel panel-default">
                        <div class="panel-heading">
                            <b><i>Report Information</i></b>
                        </div>
             	<div class="panel-body">
					<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Report name</label> <input type="text"
							name="p_name" class="form-control" value="<?=$ed['rpt_name'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">File name</label> <input type="text"
							name="p_fn" class="form-control" value="<?=$ed['rpt_fn'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-12">
					<div class="form-group">
						<label for="Modal Name">Description</label> <input type="text"
							name="p_desc" class="form-control" required value="<?=$ed['rpt_desc'];?>"/>
					</div>
                    </div>
                    <div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Path</label> <input type="text"
							name="p_path" class="form-control" value="<?=$ed['rpt_path'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
						<label for="Modal Name">Paper</label> <input type="text"
							name="p_ppr" class="form-control" value="A4" value="<?=$ed['paper'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
						<label for="Modal Name">Set As</label> <input type="text"
							name="p_type" class="form-control" placeholder="P/R (P=Print, R=Report)" value="<?=$ed['rptType'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-4">
					<div class="form-group">
						<label for="Modal Name">Print As</label> <input type="text"
							name="p_style" class="form-control" placeholder="P/L (P=Potrait, L=Lanscape)" value="<?=$ed['ppr_orts'];?>" required />
					</div>
                    </div>
                    <div class="col-lg-4">
					<div class="form-group">
						<label>Set Active</label> <select class="form-control"
							name="mn_sts">
                  <?= getsts($ed['rpt_sts']);?>
                  </select>
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
								type="text" name="p_top" id="p_top" value="<?=$ed['mt'];?>" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="md_name">Right</label> <input
								type="text" name="p_right" id="p_right" value="<?=$ed['mr'];?>" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="inputError">Bottom</label> <input
								type="text" name="p_btm" id="p_btm" class="form-control" value="<?=$ed['mb'];?>"  required />
						</div>
					</div>
                    <div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="inputError">Left</label> <input
								type="text" name="p_left" id="p_left" class="form-control"value="<?=$ed['ml'];?>" required />
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