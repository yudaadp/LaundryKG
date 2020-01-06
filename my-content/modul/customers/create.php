<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-sm modal-lg modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New :
                Customer</h4>
            </div>
            <div class="modal-body">
              <?php if (NULL !== cekAkses(GET_MOD, $_SESSION ['mywebs_lvl'], 'create')) { ?>
                  <form action="<?= getmods_info(GET_MOD, 'DIR_PATH'); ?>"
                        name="mywebs_modal" method="POST" id="form_add">
                      <input type="hidden" name="event" id="event"
                             value="<?= GET_MOD . '/create'; ?>"/> <input
                              type="hidden" name="sid"
                              id="sid" value="<?= $sid; ?>"/>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label class="control-label" for="md_name">NAMA</label>
                              <input type="text" name="str_nm" id="str_nm"
                                     class="form-control" required/>
                          </div>
                          <div class="form-group">
                              <label class="control-label" for="tlp">Phone
                                  Number</label>
                              <input type="text" name="tlp" id="tlp"
                                     class="form-control"/>

                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" rows="3"
                                        name="addrs" id="addrs"></textarea>
                          </div>
                      </div>
                      <div class="divider"></div>
                      <div class="modal-footer">
                          <button class="btn btn-success" id="goSave"
                                  type="submit">Submit
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
</div>
<!-- Modal -->