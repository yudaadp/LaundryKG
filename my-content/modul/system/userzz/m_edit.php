<?php
define ( 'MYWEBS', TRUE );
include '../../../my-config/connect.php';
include '../../../my-config/config.php';

$id = check ( $_GET ['mid'] );
$mod = 'userzz';
$ed = $mysqli->query ( "SELECT * FROM userslist WHERE uid='$id'" )->fetch_array ();

switch($_GET['mod_nm']) {
	case 'edit': ?>
<div class="modal-dialog" style="width:70%">
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
          <form action="my-content/modul/<?=$mod.'/exproc.php?'.$sid;?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/edit" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="uid" value="<?=$ed['uid'];?>" />
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label" for="md_name">Full Name</label> <input
							type="text" name="md_name" id="md_name" class="form-control"
							value="<?=$ed['full_name'];?>"/>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="md_phone1">Mobile Phone</label>
						<input type="text" name="md_phone1" class="form-control"
							value="<?=$ed['mobile_1'];?>" required />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="md_phone2">Phone Number</label>
						<input type="text" name="md_phone2" value="<?=$ed['mobile_2'];?>"
							class="form-control" />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Set Active</label> <select class="form-control"
							name="md_sts">
                  <?= getsts($ed['aktif']);?>
                  </select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label class="control-label" for="md_mail">Email</label> <input
							type="email" name="md_mail" id="md_mail"
							value="<?=$ed['email'];?>" class="form-control" required />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="Modal Name">Set Level</label>
                  <?php
									if (! empty ( checkmodsts ( 'level' ) )) {
										?>
                  <select class="form-control" name="md_level">
                  <?= getlevel($ed['lid']);?>
                  </select>
                  <?php
									
} else {
										echo '<strong>' . genparam ( 'HTTP_CODE', '403.1' ) . '</strong>';
									}
									?>
                </div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" rows="3" name="address"><?=$ed['addrs'];?></textarea>
					</div>
				</div>
                <div class="col-lg-12">
					<div class="form-group input-group col-lg-4">
						<input type="text" name="prov" id="prov" class="form-control"
							placeholder="Province" readonly="readonly"
							value="<?= $ed['prov'];?>" /> <span class="input-group-btn">
							<button class="btn btn-default" type="button" data-toggle="modal"
								data-target="#myModal">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kota">City</label> <input
							type="text" name="kota" id="kota" class="form-control"
							readonly="readonly" value="<?= $ed['kota'];?>" />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kec">Districts</label> <input
							type="text" name="kec" id="kec" class="form-control"
							value="<?= $ed['kec'];?>" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kel">Village</label> <input
							type="text" name="kel" id="kel" value="<?= $ed['kel'];?>"
							class="form-control" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kd_pos">Zip Code</label> <input
							type="text" name="kd_pos" id="kd_pos"
							value="<?= $ed['kd_pos'];?>" class="form-control"
							readonly="readonly" required />
					</div>
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
<?php
break;
	case 'pwd':?>
    <div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Change Password : <?=ucwords ($ed['uid']);?></h4>
		</div>

		<div class="modal-body">
        <?php
	if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form action="my-content/modul/<?=$mod.'/exproc.php?'.$sid;?>"
				name="mywebs_modal" method="POST">
				<input type="hidden" name="event" value="<?=$mod;?>/pwd" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="uid" value="<?=$ed['uid'];?>" />
				<div class="col-lg-12">
					<div class="form-group">
						<label class="control-label" for="md_name">New Password</label> <input
							type="text" name="new_pwd" id="new_pwd" class="form-control"/>
					</div>
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
<?php
break;
	case 'pic':?>
    <div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">View Picture : <?=ucwords ($ed['uid']);?></h4>
		</div>

		<div class="modal-body">
        <?php
	if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form action="my-content/modul/<?=$mod.'/exproc.php?'.$sid;?>"
				name="mywebs_modal" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="event" value="<?=$mod;?>/pic" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="uid" value="<?=$ed['uid'];?>" />
    			<div class="col-lg-6">
                    <div class="well well-lg">
                     <img src="my-content/images/photo/thumb_<?=$ed['photo'];?>" class="img-responsive"/>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
						<label class="control-label" for="md_name">Change Picture</label> 
                <input type="file" name="md_photo" id="md_photo" required="required" accept="image/x-png,image/jpeg"/>
                </div>
                </div>
				<div class="divider"></div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit">Update</button>
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
<?php
break;
}
?>