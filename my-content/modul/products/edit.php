<?php
require_once '../../../my-config/connect.php';
require_once '../../../my-config/config.php';
require_once 'class.php';

$id       = check($_GET ['mid']);
$mod      = 'products';
$get_data = new products();
$ed       = $get_data->edit($id);
?>
<div class="modal-sm modal-lg modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Product
                : <?= $ed['prod_nm']; ?></h4>
        </div>
        <div class="modal-body">
          <?php if (NULL !== cekAkses($mod, $_SESSION ['mywebs_lvl'], 'edit')) { ?>
              <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
                    name="mywebs_modal" method="POST" id="frmEdit">
                  <input type="hidden" name="id" id="id" value="<?= $id; ?>"/>
                  <input type="hidden" name="event" id="event"
                         value="<?= $mod . '/edit'; ?>"/>
                  <input type="hidden" name="sid" id="sid"
                         value="<?= $sid; ?>"/>
                  <input type="hidden" name="id" value="<?= $ed['id']; ?>"/>
                  <div class="form-group">
                      <label class="control-label" for="md_name">Product
                          Information</label>
                      <input type="text" name="prod_nm" id="prod_nm"
                             class="form-control"
                             value="<?= $ed['prod_nm']; ?>"/>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Satuan</label> <select class="form-control" name="prod_satuan">
                              <option value="gr" selected="selected">Gram</option>
                              <option value="pcs">Pcs</option>
                              <option value="kg">Kilogram</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label>Harga dalam satuan</label>
                          <input type="text" name="price" id="price_"
                                 class="form-control"
                                 value="<?= number_format($ed['price'], 2); ?>"/>
                      </div>
                  </div>
                  <div class="divider"></div>
                  <div class="modal-footer">
                      <button class="btn btn-success" id="goChange"
                              type="submit">Save
                      </button>
                      <button type="reset" class="btn btn-danger"
                              data-dismiss="modal"
                              aria-hidden="true">Cancel
                      </button>
                  </div>
              </form>
            <?php
          } else {
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
                $('#tbdata tr').find('#prod' + data.id).text(data.prod_nm);
                $('#tbdata tr').find('#price' + data.id).text(data.price).number(true, 2);
                $("#goChange").text('Save');
                toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
            } else {
                $("#goChange").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    });
</script>