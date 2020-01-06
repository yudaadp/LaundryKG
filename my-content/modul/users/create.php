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
                <h4 class="modal-title" id="myModalLabel">Create New :
                    Users</h4>
            </div>
            <div class="modal-body">
              <?php
              if (NULL !== cekAkses(GET_MOD, $_SESSION ['mywebs_lvl'], 'create')) {
                ?>
                  <form action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>"
                        name="mywebs_modal" method="POST" id="frmAdd"
                        enctype="multipart/form-data">
                      <input type="hidden" name="event"
                             value="<?= GET_MOD . '/create'; ?>"/> <input
                              type="hidden" name="sid" value="<?= $sid; ?>"/>
                      <div class="col-lg-8">
                          <div class="form-group">
                              <label class="control-label" for="md_name">Full
                                  Name</label> <input
                                      type="text" name="md_name" id="md_name"
                                      class="form-control"
                                      required/>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label class="control-label" for="inputError">User
                                  ID</label> <input
                                      type="text" name="uid" id="uid"
                                      class="form-control"
                                      onblur="checkname()" required/> <span
                                      id="user-availability-status"></span>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label class="control-label"
                                     for="md_mail">Email</label> <input
                                      type="email" name="md_mail" id="md_mail"
                                      class="form-control"
                                      required/>
                          </div>
                      </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="control-label"
                               for="password">Password</label>
                        <input type="text" name="md_pass" id="md_pass"
                               class="form-control" rel="gp"
                               data-size="12" required/>
                      </div>
                    </div>
                      <div class="col-lg-4">
                          <div class="form-group">
                              <label for="Modal Name">Set Level</label>
                            <?php
                            if (!empty (checkmodsts('level'))) {
                              ?>
                                <select class="form-control" name="md_level">
                                  <?= getlevel(); ?>
                                </select>
                              <?php

                            }
                            else {
                              echo '<strong>' . genparam('HTTP_CODE', '403.1') . '</strong>';
                            }
                            ?>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" rows="3"
                                        name="address" id="addrs"></textarea>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Sent password to email?</label> <label
                                      class="checkbox-inline"> <input
                                          type="checkbox" name="md_sent"
                                          checked="checked" value="0">Yes
                              </label>
                          </div>
                      </div>
                      <div class="divider"></div>
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