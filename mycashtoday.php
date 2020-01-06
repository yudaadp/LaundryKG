<?php
if (! defined ( 'MYWEBS' ))
  exit ( 'Now Allowed' );
$cash = $get_content->mycash();
?>
<div class="modal fade" id="cash-register-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">My Cash Today</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-12 col-md-6">
                  <label for="csh_open">Cash Open</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <p class="text-right">
                <?php echo number_format($cash['csh_open'],2);?>
                  </p>
              </div>
              <div class="col-sm-12 col-md-6">
                  <label for="csh_open">Cash Sale</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <p class="text-right">
                    <?php echo number_format($cash['csh_sale'],2);?>
                  </p>
              </div>
              <div class="col-sm-12 col-md-6">
                  <label for="csh_open">Cash Adjust</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <p class="text-right">
                    <?php echo number_format($cash['csh_adjust'],2);?>
                  </p>
              </div>
              <div class="divider"></div>
              <div class="col-sm-12 col-md-6">
                  <label for="csh_open">Cash Total</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <p class="text-right">
                    <?php echo number_format($cash['csh_total'],2);?>
                  </p>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
