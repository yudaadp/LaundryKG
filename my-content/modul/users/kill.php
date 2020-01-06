<?php
include '../../../my-config/connect.php';
include '../../../my-config/config.php';

$id  = check($_GET ['mid']);
$mod = 'users';
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;
            </button>
            <h4 class="modal-title" id="myModalLabel">Kill Session
                : <?= $id; ?></h4>
        </div>
        <form action="<?= getmods_info($mod, 'DIR_PATH'); ?>"
              name="mywebs_modal" method="POST" id="frmKill">
            <div class="modal-body">
              <?php
              if (NULL !== cekAkses($mod, $_SESSION ['mywebs_lvl'], 'delete')) {
                ?>
                  <input type="hidden" name="event"
                         value="<?= $mod; ?>/delete"/>
                  <input type="hidden" name="sid" value="<?= $sid; ?>"/> <input
                          type="hidden" name="uid" value="<?= $id; ?>"/>
                <input type="hidden" name="userid" id="userid" value="<?= $_SESSION['mywebs_uid'];?>"/>
                  Are you sure?
                <?php

              }
              else {
                echo genparam('HTTP_CODE', '401');
              }
              ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Close
                </button>
                <button type="submit" class="btn btn-primary" id="goKill">Yes!
                    I'm Sure!
                </button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="my-library/js/users.js"></script>