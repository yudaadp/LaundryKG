<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}
if (!GET_PID) {
  return;
}
$data = $get_data->edit(GET_PID);
if (!$data) {
  return;
}
?>
<div class="row">
    <form method="post" id="frmedit"
          action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>">
        <input type="hidden" name="event" id="event"
               value="<?= GET_MOD . '/edit'; ?>"/>
        <input type="hidden" name="sid" id="sid"
               value="<?= $sid; ?>"/>
        <input type="hidden" name="id" value="<?= GET_PID; ?>"/>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="setting_desc">Title</label>
                <input type="text" name="setting_desc" id="setting_desc"
                       value="<?= $data['setting_desc']; ?>"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="site_nm">Site Name</label>
                <input type="text" name="site_nm" id="site_nm"
                       value="<?= $data['site_nm']; ?>"
                       class="form-control"/>
            </div>
            <div class="well">
                <div class="form-group">
                    <label for="mail_nm">Mail Name</label>
                    <input type="text" name="mail_nm" id="mail_nm"
                           value="<?= $data['mail_name']; ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="mail_host">Mail Host</label>
                    <input type="text" name="mail_host" id="mail_host"
                           value="<?= $data['mail_host']; ?>"
                           class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="printer">Printer</label>
                <select class="selectpicker form-control"
                        data-style="btn-primary" style="display: none;"
                        name="printer" id="printer">
                  <?php
                  $printers = $get_data->printerlist();
                  foreach ($printers as $printer) {
                    if ($printer['id'] == $data['printer_id']) {
                      echo '<option value="' . $printer ['id'] . '" selected>' . ucwords($printer ['printer_name']) . '</option>';
                    }
                    else {
                      echo '<option value="' . $printer ['id'] . '">' . ucwords($printer ['printer_name']) . '</option>';
                    }
                  }
                  ?>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="base_url">Base URL</label>
                <input type="text" name="base_url" id="base_url"
                       value="<?= $data['base_url']; ?>"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="curr_cd">Currency Code</label>
                <input type="text" name="curr_cd" id="curr_cd"
                       value="<?= $data['currency_cd']; ?>"
                       class="form-control"/>
            </div>
            <div class="well">
                <div class="form-group">
                    <label for="mail_pwd">Mail Password</label>
                    <input type="text" name="mail_pwd" id="mail_pwd"
                           value="<?= $data['mail_pwd']; ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="mail_port">Port</label>
                    <input type="text" name="mail_port" id="mail_port"
                           value="<?= $data['mail_port']; ?>"
                           class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="limit_page">Limit Page</label>
                <input type="text" name="limit_page" id="limit_page"
                       value="<?= $data['rows_per_page']; ?>"
                       class="form-control"/>
            </div>
        </div>
        <div class="divider"></div>
        <div class="col-lg-12">
            <button class="btn btn-success btn-lg col-lg-6" id="goSave"
                    type="submit"><i
                        class="fa fa-plus-circle fa-fw"></i>
                Save
            </button>
            <button class="btn btn-danger btn-lg col-lg-6" id="goBack">
                Cancel
            </button>
        </div>
    </form>
</div>