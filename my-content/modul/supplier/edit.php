<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';
require_once 'class.php';

$mod = 'supplier';
$get_data = new suppliers();

$id = check ( $_GET ['mid'] );
foreach ( $get_data->edit($id) as $data) {};
?>

<div class="modal-dialog">
	<div class="modal-content">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title" id="myModalLabel">Edit Supplier : <?= ucwords ($data['sup_nm']);?></h4>
		</div>

		<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'edit' )) {
									?>
          <form action="<?=getmods_info($mod, 'DIR_PATH');?>"
				name="mywebs_modal" method="POST" id="frmEdit">
				<input type="hidden" name="event" value="<?=$mod.'/edit';?>" /> <input
					type="hidden" name="sid" value="<?=$sid;?>" /> <input type="hidden"
					name="pid" value="<?=$data['id'];?>" />
              <div class="col-lg-12">
                  <div class="form-group">
                      <label class="control-label" for="sup_nm">Supplier Name</label> <input
                              type="text" name="sup_nm" id="sup_nm" value="<?= $data['sup_nm'];?>"
                              class="form-control" required />
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="create_cash">Description</label> <input
                              type="text" name="sup_desc" id="sup_desc" value="<?= $data['sup_desc'];?>"
                              class="form-control" required />
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="addrs">Address</label> <input
                              type="text" name="addrs" id="addrs" value="<?= $data['addrs'];?>"
                              class="form-control" required />
                  </div>
                  <div class="form-group">
                      <label class="control-label" for="email">Email</label> <input
                              type="email" name="email" id="email" value="<?= $data['email'];?>"
                              class="form-control" required />
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label class="control-label" for="phone">Phone</label> <input
                              type="text" name="phone" id="phone" value="<?= $data['mob_no_1'];?>"
                              class="form-control" required />
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label class="control-label" for="mobile">Mobile</label> <input
                              type="text" name="mobile" id="mobile" value="<?=$data['mob_no_2'];?>"
                              class="form-control" required />
                  </div>
              </div>
				<div class="divider"></div>
				<div class="modal-footer">
					<button class="btn btn-success" type="submit" id="goChange">Confirm</button>
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
                $('#tbdata tr').find('#nm_'+data.id).text(data.sup_nm);
                $('#tbdata tr').find('#desc_'+data.id).text(data.sup_desc);
                $('#tbdata tr').find('#mail_'+data.id).text(data.email);
                $('#tbdata tr').find('#phone_'+data.id).text(data.mob_no_1);
                $('#tbdata tr').find('#mob_'+data.id).text(data.mob_no_2);
                $("#goChange").text('Confirm');
                toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
            } else {
                $("#goChange").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    });
</script>