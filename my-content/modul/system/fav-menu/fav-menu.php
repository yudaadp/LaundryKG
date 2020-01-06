<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );

$get_data = new Favmenus ();

foreach ( getfiles ( GET_MOD ) as $file ) {
    if (file_exists ( CORE_PATH . GET_MOD . '/' . $file . $EXT ) && $file != 'edit')
        require_once $file . $EXT;
}
?>
<!-- Modal edit -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/x-javascript">	
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $('#form').attr("action");
	var mn_val = $('#mn_id').val().split('-');
    var mn_id = mn_val[0];
	var mn_txt = mn_val[1];
	var event = $('#event').val();
	var sid = $('#sid').val();
	var ap = 'Y';

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            beforeSend: function(){ $("#goSave").text('Processing..');},
            data: {mn_id:mn_id, event:event, sid:sid, mn_txt:mn_txt, ap:ap}
		}).done(function(data){

		if(data.retval == '200') {
			$('#MC').modal('hide');
			var	rows = '';
			var cnt_cls = $('.p_no').length;
			var no = cnt_cls + 1;
	  		rows = rows + '<tr>';
	  		rows = rows + '<td>'+no+'</td>';
	  		rows = rows + '<td>'+mn_txt+'</td>';
	  		rows = rows + '<td align="center">';
        	rows = rows + '<a href="#" event="edit" class="mywebs_modal" id="'+data.id+'" mod="'+mn_txt+'"><img src="my-content/images/delete-icon.png" border="0" width="20" height="20"/></a>';
        	rows = rows + '</td>';
	  		rows = rows + '</tr>';
			$("#tbdata").append(rows);
			$("#goSave").text('Confirm');
			toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
		} else {
			$("#goSave").text('Try Again');
			toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
		}
        });
});
</script>