<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );

$get_data = new Store ();
foreach ( getfiles ( GET_MOD ) as $file ) {
	if (file_exists ( MOD_PATH . GET_MOD . '/' . $file . $EXT ) && $file != 'edit')
		require_once $file . $EXT;
}
getlookup_area ();
?>
<div id="ModalEdit" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" tabindex="-1" class="modal fade" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script type="text/javascript"
	src="my-library/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="my-library/js/lookup-area.js"></script>
<script type="text/javascript"> 
$('form').validate({
        rules: {
            'str_cd': {
                required: true,
                minlength: 3,
                maxlength: 10
            },
            'md_name': {
                    required: true,
                    minlength: 3,
                    maxlength: 35
                },
            'md_mail': {
                    required: true,
                    email: true,
                    minlength: 5,
                    maxlength: 65
                },
			'md_phone1': {
				required: true,
				digits: true,
				minlength:8,
				maxlength: 15
			},
			'md_phone2': {
				required: false,
				digits: true,
				minlength:8,
				maxlength: 15
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

function checkname() {
	$("#loaderIcon").show();
		jQuery.ajax({
			url: "checkID.php?pkey=<?=GET_MOD;?>",
			data:'id='+$("#str_cd").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
	error:function (){}
	});
}

$(".btn-success").click(function(e){
    e.preventDefault();
    var form_action = $('#form_add').attr("action");
    var str_cd = $('#str_cd').val();
	var str_nm = $('#md_name').val();
	var str_desc = $('#str_desc').val();
	var addrs = $('#addrs').val();
	var ph1 = $('#md_phone1').val();
	var ph2 = $('#md_phone2').val();
	var mail = $('#md_mail').val();
	var prov = $('#prov').val();
	var kota = $('#kota').val();
	var kec = $('#kec').val();
	var kel = $('#kel').val();
	var pos = $('#kd_pos').val();
	var event = $('#event').val();
	var sid = $('#sid').val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data: {str_cd:str_cd, str_nm:str_nm, str_desc:str_desc, addrs:addrs, ph1:ph1, ph2:ph2, mail:mail, prov:prov, kota:kota, kec:kec, kel:kel, kdpos:pos, event:event, sid:sid},
        	beforeSend: function(){ $("#goSave").text('Saving..');}
		}).done(function(data){
	        if (data.retval == '200') {
				$('#MC').modal('hide');
				var	rows = '';
				var cnt_cls = $('.p_no').length;
				var no = cnt_cls + 1;
	  			rows = rows + '<tr align="center">';
				rows = rows + '<td>'+no+'</td>';
				rows = rows + '<td>'+data.store_cd+'</td>';
				rows = rows + '<td>'+data.store_nm+'</td>';
				rows = rows + '<td>'+data.addrs+'</td>';
	  			rows = rows + '<td>'+data.kota+'</td>';
				rows = rows + '<td>'+data.kd_pos+'</td>';
				rows = rows + '<td>'+data.email+'</td>';
				rows = rows + '<td>'+data.tlp_no+'</td>';
	  			rows = rows + '<td>';
        		rows = rows + '<a href="#" event="edit" class="mywebs_modal" id="'+data.id+'" mod="edit"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a>';
        		rows = rows + '</td>';
				rows = rows + '<td data-id="'+data.id+'" data-sid="'+data.sid+'">';
        		rows = rows + '<a href="#" id="set_store"><i class="fa fa-sign-in fa-lg"></i></a>';
        		rows = rows + '</td>';
	  			rows = rows + '</tr>';
				$("#tbdata").append(rows);
				$("#goSave").text('Confirm');
				toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
	        } else {
	        	$("#goSave").text('Try Again');
	        	toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
	        }
        });
});

/* Change Store */
$("body").on("click","#set_store",function(){
    var id = $(this).parent("td").data('id');
    var event = 'stores/edit';
    var sub_event = 'set_store';
    var sid = $(this).parent("td").data('sid');
	$(".loader").show();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: 'my-content/modul/stores/exproc.php',
        data:{id:id, sid:sid, event:event, sub_event:sub_event}
    }).done(function(data){
    	$(".loader").hide();
        if (data.retval == '200') {
        	$("span#store_nm").text(data.store_nm);
        	toastr.success('Store changed Successfully.', 'Success Alert', {timeOut: 5000});
        } else {
        	toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
        }
    });

});
</script>