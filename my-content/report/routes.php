<?php
include '../../my-config/connect.php';
include '../../my-config/config.php';

if (cekRpt($_POST['rpt_name']) == 1) {?>
<link href="../../../my-library/css/datepicker.css" rel="stylesheet">
<div class="col-lg-12">
	<h4 class="page-header" style="margin-top:-10px">Parameter</h4>
</div>
<form method="post" onSubmit="target_popup(this)" action="<?= BASE_URL_WEB;?>/my-content/report/view.php?rpt=<?=to_mywebs_char($_POST['rpt_name']);?>">
<input type="hidden" name="rpt_name" value="<?=to_mywebs_char($_POST['rpt_name']);?>"/>
<input type="hidden" name="sid" value="<?=md5(SALT.$sid);?>" />
<?php
require_once '../../my-content/report/parameter/'.$_POST['rpt_name'].$EXT.'';
?>
<div class="divider"></div>
<div class="col-lg-12">
<button class="btn btn-success" type="submit">Generate</button>
</div>
</form>
<script src="../../my-plugin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../my-plugin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../my-library/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
$(function() {
   $('.input-daterange').datepicker({
     format: 'yyyy-mm-dd',
     autoclose: true,
     todayHighlight: true
  });
});
$.validator.messages.required = '';

function target_popup(form) {
	var left = (screen.width/2)-(900/2);
	var top = (screen.height/2)-(600/2);
    window.open('', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=900, height=600, top='+top+', left='+left);
    form.target = 'formpopup';
}
</script>
<?php }?>