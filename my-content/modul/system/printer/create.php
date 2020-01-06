<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}
?>
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New :
                    Printer</h4>
            </div>
            <div class="modal-body">
              <?php if (NULL !== cekAkses(GET_MOD, $_SESSION ['mywebs_lvl'], 'create')) { ?>
                  <form
                          action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>"
                          name="mywebs_modal" method="POST" id="frmAdd">
                      <input type="hidden" name="event"
                             value="<?= GET_MOD . '/create'; ?>"/> <input
                              type="hidden" name="sid" value="<?= $sid; ?>"/>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label for="printer_nm">Printer Name</label>
                              <input
                                      type="text"
                                      name="printer_nm" id="printer_nm"
                                      class="form-control" required/>
                          </div>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="printer_type">Type</label> <input
                                  type="text"
                                  name="printer_type" id="printer_type"
                                  class="form-control" required/>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="printer_profile">Profile</label> <input
                                  type="text"
                                  name="printer_profile" id="printer_profile"
                                  class="form-control" required/>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="max_char">Max chars per line</label>
                          <input type="text"
                                 name="max_char" id="max_char" maxlength="2"
                                 class="form-control" required/>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="path">Path</label>
                          <input type="text" name="path" id="path"
                                 class="form-control" required/>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="ip">IP</label>
                          <input type="text" name="ip" id="ip"
                                 class="form-control col-md-6" required/>
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="port">Port</label>
                          <input type="text" name="port" id="port"
                                 class="form-control" required/>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-success" type="submit"
                                  id="goSave">Confirm
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
</div>