<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$get_menu = new Menu ();

foreach(getfiles(GET_MOD) as $file) {
	if (file_exists(CORE_PATH.GET_MOD.'/'.$file.$EXT) && $file != 'edit')
		require_once $file.$EXT;
}
?>

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>
	
<script type="text/x-javascript">	
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

			if(data.retval == '200') {
				$('#MC').modal('hide');
				var	rows = '';
				var cnt_cls = $('.p_no').length;
				var no = cnt_cls + 1;
	  			rows = rows + '<tr align="center">';
	  			rows = rows + '<td>'+no+'</td>';
	  			rows = rows + '<td>'+data.menu+'</td>';
	  			rows = rows + '<td>'+data.url+'</td>';
	  			rows = rows + '<td>'+data.class+'</td>';
	  			rows = rows + '<td>'+data.set_order+'</td>';
	  			rows = rows + '<td>'+data.aktif+'</td>';
	  			rows = rows + '<td align="center">';
        		rows = rows + '<a href="#" event="edit" class="mywebs_modal" id="'+data.menuID+'"><img src="my-content/images/icon-edit-on.png" border="0" width="20" height="20"/></a>';
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