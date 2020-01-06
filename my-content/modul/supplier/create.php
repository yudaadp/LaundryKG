<div id="MC" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Create New : Suplier</h4>
			</div>
			<div class="modal-body">
        <?php
        if (NULL !== cekAkses ( GET_MOD, $_SESSION ['mywebs_lvl'], 'create' )) { ?>
          <form action="<?=getmods_info(GET_MOD, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST" id="frmAdd">
					<input type="hidden" name="event" value="<?= GET_MOD.'/create';?>" /> <input
						type="hidden" name="sid" value="<?=$sid;?>" />
              <div class="col-lg-12">
					<div class="form-group">
                        <label class="control-label" for="sup_nm">Supplier Name</label> <input
                                type="text" name="sup_nm" id="sup_nm"
                                class="form-control" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="create_cash">Description</label> <input
							type="text" name="sup_desc" id="sup_desc"
							class="form-control" required />
					</div>
                    <div class="form-group">
                        <label class="control-label" for="addrs">Address</label> <input
                          type="text" name="addrs" id="addrs"
                          class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label> <input
                          type="email" name="email" id="email"
                          class="form-control" required />
                    </div>
              </div>
              <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">Phone</label> <input
                          type="text" name="phone" id="phone"
                          class="form-control" required />
                    </div>
              </div>
              <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label" for="mobile">Mobile</label> <input
                          type="text" name="mobile" id="mobile"
                          class="form-control" required />
                    </div>
              </div>
					<div class="divider"></div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit" id="goSave">Confirm</button>
						<button type="reset" class="btn btn-danger" data-dismiss="modal"
							aria-hidden="true">Cancel</button>
					</div>
				</form>
              <?php
								} else {
									echo genparam ( 'HTTP_CODE', '401' );
								}
								?>
            </div>
		</div>
	</div>
</div>