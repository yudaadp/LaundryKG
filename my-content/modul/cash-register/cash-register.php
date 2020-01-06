<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$get_data = new Cash ();

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
<script type="text/javascript" src="my-library/js/lookup-area.js"></script>
<script type="text/javascript"> 
$(function(){
	$('#create_cash').number( true, 2 );
});

$('form').validate({
        rules: {
			'create_cash': {
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
	        	var store_id = $('#store_'+data.id).text();
	        	var cash_open = $.number(data.csh_open, 2);
                var cash_total = $.number(data.csh_total, 2);
                var cash_dt =data.csh_open_dt.split(' ')[0];
				$('#MC').modal('hide');

				if (store_id) {
					$('#tbdata tr').find('#csh_adjust_'+data.id).text(data.csh_adjust).number( true, 2 );
					$('#tbdata tr').find('#csh_total_'+data.id).text(data.csh_total).number( true, 2 );
				} else {
					var	rows = '';
					var cnt_cls = $('.p_no').length;
					var no = cnt_cls + 1;
	  				rows = rows + '<tr>';
					rows = rows + '<td align="center">'+no+'</td>';
					rows = rows + '<td>'+data.store_nm+'</td>';
					rows = rows + '<td align="right">'+cash_open+'</td>';
	  				rows = rows + '<td align="right">'+data.csh_sale+'</td>';
	  				rows = rows + '<td align="right">'+data.csh_adjust+'</td>';
					rows = rows + '<td align="right">'+data.csh_close+'</td>';
					rows = rows + '<td align="right">'+cash_total+'</td>';
					rows = rows + '<td align="center">'+cash_dt+'</td>';
					rows = rows + '<td align="center">'+data.status+'</td>';
	  				rows = rows + '</tr>';
				}
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