<?php
require_once '../../../my-config/connect.php';
require_once '../../../my-config/config.php';
require_once 'class.php';

$id = check ( $_GET ['mid'] );
$mod = 'customers';
$get_data = new customers();
$ed = $get_data->edit ( $id );
?>
<div class="modal-sm modal-lg modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Customer : <?= $ed['cust_name'];?></h4>
		</div>
		<div class="modal-body">
		<?php if (NULL !== cekAkses ($mod, $_SESSION ['mywebs_lvl'], 'edit' )) { ?>
          <form action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST" id="frmEdit">
				<input type="hidden" name="id" id="id" value="<?=$id;?>" />
                <input type="hidden" name="event" id="event" value="<?=$mod.'/edit';?>" />
				<input type="hidden" name="sid" id="sid" value="<?=$sid;?>" />
              <div class="col-lg-6">
                  <div class="form-group">
                      <label class="control-label" for="md_name">Nama</label>
                      <input type="text" name="str_nm" id="str_nm"
                             class="form-control" value="<?= $ed['cust_name'];?>"/>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label class="control-label" for="tlp">Phone
                          Number</label>
                      <input type="text" name="tlp" id="tlp"
                             class="form-control" value="<?= $ed['tlp'];?>"/>

                  </div>
              </div>
              <div class="col-lg-12">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="3"
                                name="addrs" id="addrs"><?= $ed['addrs'];?></textarea>
                  </div>
              </div>
				<div class="divider"></div>
				<div class="modal-footer">
					<button class="btn btn-success" id="goChange" type="submit">Save</button>
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
				$('#tbdata tr').find('#str_nm'+data.id).text(data.store_nm);
				$('#tbdata tr').find('#addrs'+data.id).text(data.addrs);
				$('#tbdata tr').find('#kota'+data.id).text(data.city);
				$('#tbdata tr').find('#tlp'+data.id).text(data.tlp);
				$('#tbdata tr').find('#email'+data.id).text(data.temp_name);
				$("#goChange").text('Save');
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				$("#goChange").text('Try Again');
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
}); 
</script>