<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$mod = 'laporan';
$get_data = new Laporan();
?>
<div class="row">
<form method="POST" id="myReport">
<input type="hidden" name="event" id="event" value="<?=$mod;?>/view" />
<input type="hidden" name="sid" id="sid" value="<?=$sid;?>" />
<div class="col-lg-6">
<div class="form-group">
<label for="rpt_name">Report Name </label>
     <select class="selectpicker form-control" data-style="btn-primary" style="display: none;" name="rpt_name" id="rpt_name">
     <?php
	 $arr_data = $get_data->show();
	 foreach($arr_data as $rpt) {
		 echo '<option role="row" val="'. ucwords ( $rpt ['rpt_desc'] ) .'" value="' . $rpt ['rpt_fn'] . '">' . ucwords ( $rpt ['rpt_name'] ) . '</option>';
	 }?>
      </select>
</div>
</div>
<div class="col-lg-6">
<label>&nbsp;</label>
<span class="input-group-btn">
<input type="button" class="btn btn-success" id="submitFormData" onclick="SubmitFormData();" value="Confirm" />
</span>
<label><img id="loadingimg" src="my-content/images/loading48.gif" style="display:none"/></label>
</div>
</form>
</div>
<div class="row">
<div id="show_rptparam"></div>
</div>
<script type="text/javascript" src="my-library/js/showRPT.js"/></script>