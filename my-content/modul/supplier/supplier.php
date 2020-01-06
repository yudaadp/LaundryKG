<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$get_data = new suppliers ();

foreach ( getfiles ( GET_MOD ) as $file ) {
	if (file_exists ( MOD_PATH . GET_MOD . '/' . $file . $EXT ) && $file != 'edit')
		require_once $file . $EXT;
}
?>
<!-- Modal edit -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript"
	src="my-library/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$('form').validate({
        rules: {
			'phone': {
				required: true,
				digits: true
			},
            'mobile': {
                required: false,
                digits: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

$("#goSave").click(function(e){
    e.preventDefault();
    var exec = $('#frmAdd').attr("action");
    var formdata = $('#frmAdd').serialize();
	
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: exec,
            data: formdata,
            beforeSend: function(){ $("#goSave").text('Processing..');},
		}).done(function(data){
	        if (data.retval == '200') {
                $('#MC').modal('hide');
                var	rows = '';
                var cnt_cls = $('.p_no').length;
                var no = cnt_cls + 1;
                rows = rows + '<tr>';
                rows = rows + '<td align="center">'+no+'</td>';
                rows = rows + '<td>'+data.sup_nm+'</td>';
                rows = rows + '<td>'+data.sup_desc+'</td>';
                rows = rows + '<td>'+data.email+'</td>';
                rows = rows + '<td>'+data.mob_no_1+'</td>';
                rows = rows + '<td>'+data.mob_no_2+'</td>';
                rows = rows + '<td align="center"><a href="#" event="edit" class="mywebs_modal" id="'+data.id+'" mod="edit"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a></td>';
                rows = rows + '</tr>';
				$("#tbdata").append(rows);
				$("#goSave").text('Confirm');
				toastr.success('Cash added Successfully', 'Success Alert', {timeOut: 5000});
	        } else {
	        	$("#goSave").text('Try Again');
	        	toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
	        }
        });
});
</script>