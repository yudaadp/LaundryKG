<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );

$role = new Role ();

foreach(getfiles(GET_MOD) as $file) {
	if (file_exists(CORE_PATH.GET_MOD.'/'.$file.$EXT) && $file != 'edit')
		require_once $file.$EXT;
}
?>

<script type="text/javascript">
$(document).ready(function() {
	$('#goSave').click(function(){
	var formdata = $('#frmRole').serialize();
	var exec = $('#frmRole').attr('action');

        $.ajax({
        	dataType: 'json',
            type:'POST',
            url:  exec,
            data: formdata,
			beforeSend: function(){ $("#goSave").text('Processing..');},
		}).done(function(data){
			//console.log(data);
			$("#goSave").text('Save');

			if(data.retval == '200') {
				toastr.success('Ok, done!', 'Success:', {timeOut: 5000});
			} else {
				toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
			}
        });
	return false;
	});
});
</script>