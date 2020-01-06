<?php
define('MYWEBS', TRUE);
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';
include 'class.php';

$id       = check($_GET ['mid']);
$mod      = 'users';
$get_data = new users();
foreach ($get_data->edit($id) as $data) {
};

switch ($_GET['mod_nm']) {
  case 'edit': ?>
      <div class="modal-dialog" style="width:70%">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"
                          aria-hidden="true">×
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Edit Users
                      : <?= ucwords($data['uid']); ?></h4>
              </div>

              <div class="modal-body">
                <?php
                if (cekAkses($mod, $_SESSION ['mywebs_lvl'], 'edit')) {
                  ?>
                    <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
                          name="mywebs_modal" method="POST" id="frmEdit">
                        <input type="hidden" name="event"
                               value="<?= $mod; ?>/edit"/>
                        <input type="hidden" name="sid" value="<?= $sid; ?>"/>
                        <input type="hidden" name="uid"
                               value="<?= $data['uid']; ?>"/>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label" for="md_name">Full
                                    Name</label> <input
                                        type="text" name="md_name" id="md_name"
                                        class="form-control"
                                        value="<?= $data['full_name']; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label" for="md_phone1">Mobile
                                    Phone</label>
                                <input type="text" name="md_phone1"
                                       class="form-control"
                                       value="<?= $data['mobile_1']; ?>"
                                       required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="control-label" for="md_phone2">Phone
                                    Number</label>
                                <input type="text" name="md_phone2"
                                       value="<?= $data['mobile_2']; ?>"
                                       class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Set Active</label> <select
                                        class="form-control"
                                        name="md_sts">
                                <?= getsts($data['aktif']); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label"
                                       for="md_mail">Email</label> <input
                                        type="email" name="md_mail" id="md_mail"
                                        value="<?= $data['email']; ?>"
                                        class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Modal Name">Set Level</label>
                              <?php
                              if (!empty (checkmodsts('level'))) {
                                ?>
                                  <select class="form-control" name="md_level">
                                    <?= getlevel($data['lid']); ?>
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
                                          name="address"><?= $data['addrs']; ?></textarea>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit"
                                    id="goEdit">Confirm
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
    <?php
    break;
  case 'pwd':
    ?>
      <div class="modal-dialog">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"
                          aria-hidden="true">×
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Change Password
                      : <?= ucwords($ed['uid']); ?></h4>
              </div>

              <div class="modal-body">
                <?php
                if (cekAkses($mod, $_SESSION ['mywebs_lvl'], 'edit')) {
                  ?>
                    <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
                          name="mywebs_modal" method="POST" id="frmChange">
                        <input type="hidden" name="event"
                               value="<?= $mod; ?>/pwd"/>
                        <input type="hidden" name="sid" value="<?= $sid; ?>"/>
                        <input type="hidden" name="uid"
                               value="<?= $data['uid']; ?>"/>
                        <input type="hidden" name="md_name"
                               value="<?= $data['full_name']; ?>"/>
                        <input type="hidden" name="md_mail"
                               value="<?= $data['email']; ?>"/>
                        <input type="hidden" name="md_sent" value="Y"/>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label" for="md_name">New
                                    Password</label> <input
                                        type="text" name="new_pwd" id="new_pwd"
                                        class="form-control"/>
                            </div>
                            <p class="help-block">a new password will be sent to
                                his email too.
                            </p>
                        </div>
                        <div class="divider"></div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit"
                                    id="goChange">Update!
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
    <?php
    break;
  case 'pic':
    ?>
      <div class="modal-dialog">
          <div class="modal-content">

              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"
                          aria-hidden="true">×
                  </button>
                  <h4 class="modal-title" id="myModalLabel">View Picture
                      : <?= ucwords($ed['uid']); ?></h4>
              </div>

              <div class="modal-body">
                <?php
                if (cekAkses($mod, $_SESSION ['mywebs_lvl'], 'edit')) {
                  ?>
                    <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
                          name="mywebs_modal" method="POST" id="frmChangePic"
                          enctype="multipart/form-data">
                        <input type="hidden" name="event"
                               value="<?= $mod; ?>/pic"/>
                        <input type="hidden" name="sid" value="<?= $sid; ?>"/>
                        <input type="hidden" name="uid"
                               value="<?= $data['uid']; ?>"/>
                        <div class="col-lg-6">
                            <div class="well well-lg">
                                <img src="my-content/images/photo/thumb/<?= $data['photo']; ?>"
                                     class="img-responsive" id="thepic"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="md_name">Change
                                    Picture</label>
                                <input type="file" name="md_photo" id="md_photo"
                                       required="required"
                                       accept="image/x-png,image/jpeg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit"
                                    id="goPic">Update
                            </button>
                            <button type="reset" class="btn btn-danger"
                                    data-dismiss="modal"
                                    aria-hidden="true">Close
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
    <?php
    break;
}
?>
<script type="text/javascript" src="my-library/js/users.js"></script>
