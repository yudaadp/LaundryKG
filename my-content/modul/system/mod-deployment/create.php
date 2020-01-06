<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}
?>
<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">Apply & Update</h4>
            </div>
            <div class="modal-body">
              <?php
              if (cekAkses(GET_MOD, $_SESSION ['mywebs_lvl'], 'create')) {
                ?>
                  <form action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>"
                        name="mywebs_modal" method="POST" id="formUpdate"
                        enctype="multipart/form-data">
                      <input type="hidden" name="event"
                             value="<?= GET_MOD . '/create'; ?>"/> <input
                              type="hidden" name="sid" value="<?= $sid; ?>"/>
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label for="Modal Name">Mod Name</label>

                                <select class="form-control" name="mod_nm">
                                  <?= $get_data->show_modmanaged();?>
                                </select>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <label class="control-label"
                                 for="fileupload">File(s)</label>
                      </div>
                      <div class="col-lg-6">
    							<input id="upd_files" type="file" class="upload"
                                       name="fileupload[]" accept=".php" multiple/>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label>Update Notes</label>
                              <textarea class="form-control" rows="3"
                                        name="upd_note" id="upd_note"></textarea>
                          </div>
                      </div>
                      <div class="divider"></div>
                      <div class="modal-footer">
                          <button class="btn btn-success" type="submit"
                                  id="goSave">Apply Update
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