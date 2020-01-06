<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-sm modal-lg modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Create New : Store</h4>
			</div>
			<div class="modal-body">
        <?php if (NULL !== cekAkses (GET_MOD, $_SESSION ['mywebs_lvl'], 'create' )) { ?>
          <form action="<?=getmods_info(GET_MOD, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST" id="form_add">
					<input type="hidden" name="event" id="event"
						value="<?=GET_MOD.'/create';?>" /> <input type="hidden" name="sid"
						id="sid" value="<?=$sid;?>" />
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label" for="str_cd">Store Code</label> <input
								type="text" name="str_cd" id="str_cd" class="form-control"
								maxlength="10" onblur="checkname()" required /><span
								id="user-availability-status" class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label" for="md_phone1">Mobile Phone</label>
							<input type="text" name="md_phone1" id="md_phone1"
								class="form-control" required />
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label" for="md_name">Name of Store</label>
							<input type="text" name="md_name" id="md_name"
								class="form-control" required />
						</div>
						<div class="form-group">
							<label class="control-label" for="md_phone2">Phone Number</label>
							<input type="text" name="md_phone2" id="md_phone2"
								class="form-control" />

						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label" for="inputError">Store Description</label>
							<input type="text" name="str_desc" id="str_desc"
								class="form-control" required />
						</div>
						<div class="form-group">
							<label class="control-label" for="md_mail">Email</label> <input
								type="email" name="md_mail" id="md_mail" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group input-group col-lg-4">
							<input type="text" name="prov" id="prov" class="form-control"
								placeholder="Province" readonly="readonly" /> <span
								class="input-group-btn">
								<button class="btn btn-default" type="button"
									data-toggle="modal" data-target="#myModal">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="kota">City</label> <input
								type="text" name="kota" id="kota" class="form-control"
								readonly="readonly" />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="kec">Districts</label> <input
								type="text" name="kec" id="kec" class="form-control"
								readonly="readonly" required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="kel">Village</label> <input
								type="text" name="kel" id="kel" class="form-control"
								readonly="readonly" required />
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="control-label" for="kd_pos">Zip Code</label> <input
								type="text" name="kd_pos" id="kd_pos" class="form-control"
								readonly="readonly" required />
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" rows="3" name="address" id="addrs"></textarea>
						</div>
					</div>
					<div class="divider"></div>
					<div class="modal-footer">
						<button class="btn btn-success" id="goSave" type="submit">Confirm</button>
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
<!-- Modal -->