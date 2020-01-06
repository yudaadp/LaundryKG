<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Create New : My Favorite
					Menu</h4>
			</div>
			<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( GET_MOD, $_SESSION ['mywebs_lvl'], 'create' )) {
									$myMenu = $get_data->show_mods ();
									?>
          <form
					action="<?=getmods_info(GET_MOD, 'DIR_PATH');?>"
					name="mywebs_modal" method="POST" id="form">
					<input type="hidden" name="event" id="event" value="<?=GET_MOD.'/create';?>" /> <input
						type="hidden" name="sid" id="sid" value="<?=$sid;?>" />
					<div class="col-lg-12">
						<div class="form-group">
							<label for="Modal Name">Menu</label>
                            <select class="selectpicker form-control" data-style="btn-primary" style="display: none;" name="mn_id" id="mn_id">
                  <?php
									foreach ( $myMenu as $mn ) {
										echo '<option value="' . $mn ['id'].'-'. ucwords($mn['mod']).'">' . ucwords ( $mn ['mod'] ) . '</option>';
									}
									?>
                  </select>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success crud-submit" type="submit" id="goSave">Confirm</button>
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
<!-- end modal create -->