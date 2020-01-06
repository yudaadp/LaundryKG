<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}

$get_data = new settings();

foreach ($page_arr as $page) {
  switch (GET_ACT) {
    case $page :
      require_once $page . $EXT;
      break;
  }
}
?>
<script type="text/javascript">
    $("#goBack").click(function(e) {
        e.preventDefault();
        var sid = $('#sid').val();
        var url = $('#base_url').val();
        $(location).attr('href', url+'/home.php?menu/settings/view/'+sid);
    });

    $("#goSave").click(function (e) {
        e.preventDefault();
        var form_action = $('#frmedit').attr("action");
        var exec = $('#frmedit').serialize();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data: exec,
            beforeSend: function () {
                $("#goSave").text('Saving..');
            }
        }).done(function (data) {
            if (data.retval == '200') {
                $("#goSave").text('Save');
                toastr.success('Saved', 'Success Alert', {timeOut: 5000});
            } else {
                $("#goSave").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    });
</script>