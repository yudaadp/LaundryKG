<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New :
                    Product</h4>
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
                          <label class="control-label"
                                 for="md_name">Product Information</label>
                          <input type="text" name="prod_nm" id="prod_nm"
                                 class="form-control" maxlength="30" placeholder="Type your product name. Max 30 chars"
                                 required/>
                      </div>
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
                              <label>Harga</label>
                              <input type="text" name="price" id="price" class="form-control"
                                     placeholder="Input your price" required/>
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
              } else {
                echo genparam('HTTP_CODE', '401');
              }
              ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->