<?php
require_once '../../../../my-config/connect.php';
require_once '../../../../my-config/config.php';
require_once 'class.php';

$mod      = 'printer';
$id       = check($_GET ['mid']);
$get_data = new printer();
$ed       = $get_data->edit($id);
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Printer
                : <?= ucwords($ed['printer_name']); ?></h4>
        </div>

        <div class="modal-body">
          <?php if (NULL !== cekAkses($mod, $_SESSION ['mywebs_lvl'], 'edit')) { ?>
              <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
                    id="frmEdit" name="mywebs_modal" method="POST">
                  <input type="hidden" name="event" value="printer/edit"/> <input
                          type="hidden" name="sid" value="<?= $sid; ?>"/> <input
                          type="hidden"
                          name="id" value="<?= $ed['id']; ?>"/>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="printer_nm">Printer Name</label>
                          <input
                                  type="text"
                                  name="printer_nm" id="printer_nm"
                                  class="form-control" value="<?=$ed['printer_name'];?>" required/>
                      </div>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="printer_type">Type</label> <input
                              type="text"
                              name="printer_type" id="printer_type"
                              class="form-control" value="<?=$ed['type'];?>" required/>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="printer_profile">Profile</label> <input
                              type="text"
                              name="printer_profile" id="printer_profile"
                              class="form-control" value="<?=$ed['profile'];?>" required/>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="max_char">Max chars per line</label>
                      <input type="text"
                             name="max_char" id="max_char" maxlength="2" value="<?=$ed['max_char_line'];?>"
                             class="form-control" required/>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="path">Path</label>
                      <input type="text" name="path" id="path"
                             class="form-control" value="<?=$ed['printer_path'];?>" required/>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="ip">IP</label>
                      <input type="text" name="ip" id="ip"
                             class="form-control col-md-6" value="<?=$ed['ip_addrs'];?>" required/>
                  </div>
                  <div class="form-group col-lg-6">
                      <label for="port">Port</label>
                      <input type="text" name="port" id="port" value="<?=$ed['port'];?>"
                             class="form-control" required/>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-success" type="submit"
                              id="goChange">Confirm
                      </button>
                      <button type="reset" class="btn btn-danger"
                              data-dismiss="modal"
                              aria-hidden="true">Cancel
                      </button>
                  </div>
              </form>
            <?php
          }
          else {
            echo genparam('HTTP_CODE', '401');
          }
          ?>
        </div>
    </div>
</div>
<script>
    $("#goChange").click(function (e) {
        e.preventDefault();
        var exec = $('#frmEdit').attr("action");
        var formdata = $('#frmEdit').serialize();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: exec,
            data: formdata,
            beforeSend: function () {
                $("#goChange").text('Saving..');
            },
        }).done(function (data) {

            if (data.retval == '200') {
                $('#ModalEdit').modal('hide');
                $('#tbdata tr').find('#printer_' + data.id).text(data.printer_name);
                $('#tbdata tr').find('#type_' + data.id).text(data.type);
                $('#tbdata tr').find('#profile_' + data.id).text(data.profile);
                $('#tbdata tr').find('#path_' + data.id).text(data.printer_path);
                $('#tbdata tr').find('#ip_' + data.id).text(data.ip_addrs+'/'+data.port);
                $("#goChange").text('Confirm');
                toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
            } else {
                $("#goChange").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    });
</script>