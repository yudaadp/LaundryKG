<?php
require_once '../../../my-config/connect.php';
require_once '../../../my-config/config.php';
require_once 'class.php';

$id = check ( $_GET ['mid'] );
$mod = 'stores';
$get_store = new Store ();
$ed = $get_store->edit ( $id );
?>
<div class="modal-sm modal-lg modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Store : <?= $ed['store_nm'];?></h4>
		</div>
		<div class="modal-body">
		<?php if (NULL !== cekAkses ($mod, $_SESSION ['mywebs_lvl'], 'edit' )) { ?>
          <form action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST" id="frmEdit">
				<input type="hidden" name="id" id="id" value="<?=$id;?>" /> <input
					type="hidden" name="event" id="event" value="<?=$mod.'/edit';?>" />
				<input type="hidden" name="sid" id="sid" value="<?=$sid;?>" />
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="str_cd">Store Code</label> <input
							type="text" name="str_cd" id="str_cd" class="form-control"
							value="<?= $ed['store_cd'];?>" maxlength="10" disabled="disabled" /><span
							id="user-availability-status" class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label" for="md_phone1">Mobile Phone</label>
						<input type="text" name="ph1" id="ph1" class="form-control"
							value="<?= $ed['mob_no'];?>" required />
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="md_name">Name of Store</label> <input
							type="text" name="str_nm" id="str_nm"
							value="<?= $ed['store_nm'];?>" class="form-control" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="md_phone2">Phone Number</label>
						<input type="text" name="ph2" id="ph2"
							value="<?= $ed['tlp_no'];?>" class="form-control" />

					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="inputError">Store Description</label>
						<input type="text" name="str_desc" id="str_desc"
							value="<?= $ed['store_desc'];?>" class="form-control" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="md_mail">Email</label> <input
							type="email" name="mail" id="mail" class="form-control"
							value="<?= $ed['email'];?>" required />
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group input-group col-lg-4">
						<input type="text" name="prov" id="eprov" class="form-control"
							placeholder="Province" readonly="readonly"
							value="<?= $ed['prov'];?>" /> <span class="input-group-btn">
							<button class="btn btn-default" id="lookup_area" type="button"
								data-toggle="modal" data-target="#myModal" data-event="edit">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kota">City</label> <input
							type="text" name="kota" id="ekota" class="form-control"
							readonly="readonly" value="<?= $ed['kota'];?>" />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kec">Districts</label> <input
							type="text" name="kec" id="ekec" class="form-control"
							value="<?= $ed['kec'];?>" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kel">Village</label> <input
							type="text" name="kel" id="ekel" value="<?= $ed['kel'];?>"
							class="form-control" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kd_pos">Zip Code</label> <input
							type="text" name="kdpos" id="ekd_pos"
							value="<?= $ed['kd_pos'];?>" class="form-control"
							readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" rows="3" name="addrs" id="addrs"><?= $ed['addrs'];?></textarea>
					</div>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<button class="btn btn-success" id="goChange" type="submit">Confirm</button>
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
<script>
$("#goChange").click(function(e){
    e.preventDefault();
    var exec = $('#frmEdit').attr("action");
    var formdata = $('#frmEdit').serialize();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: exec,
            data: formdata,
            beforeSend: function(){ $("#goChange").text('Saving..');},
		}).done(function(data){

			if(data.retval == '200') {
				$('#ModalEdit').modal('hide');
				$('#tbdata tr').find('#str_cd'+data.id).text(data.store_cd);
				$('#tbdata tr').find('#str_nm'+data.id).text(data.store_nm);
				$('#tbdata tr').find('#addrs'+data.id).text(data.addrs);
				$('#tbdata tr').find('#kota'+data.id).text(data.kota);
				$('#tbdata tr').find('#kdpos'+data.id).text(data.kd_pos);
				$('#tbdata tr').find('#email'+data.id).text(data.email);
				$('#tbdata tr').find('#tlp'+data.id).text(data.tlp_no);
				$("#goChange").text('Confirm');
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				$("#goChange").text('Try Again');
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
}); 
</script>