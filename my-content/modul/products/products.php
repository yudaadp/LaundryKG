<?php
if (!defined('MYWEBS')) {
  exit ('Not Allowed');
}

$get_data = new products();
foreach (getfiles(GET_MOD) as $file) {
  if (file_exists(MOD_PATH . GET_MOD . '/' . $file . $EXT) && $file != 'edit') {
    require_once $file . $EXT;
  }
}
?>
<div id="ModalEdit" data-backdrop="false"
     style="background-color: rgba(0, 0, 0, 0.5);" tabindex="-1"
     class="modal fade" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
    $(function () {
        $('#price').number(true, 2);
    });

    $(".btn-success").click(function (e) {
        e.preventDefault();
        var form_action = $('#form_add').attr("action");
        var exec = $('#form_add').serialize();

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data: exec,
            beforeSend: function () {
                $("#goSave").text('Creating..');
            }
        }).done(function (data) {
            if (data.retval == '200') {
                $('#MC').modal('hide');
                var rows = '';
                var cnt_cls = $('.p_no').length;
                var no = cnt_cls + 1;
                rows = rows + '<tr align="center">';
                rows = rows + '<td>' + no + '</td>';
                rows = rows + '<td>' + data.prod_nm + '</td>';
                rows = rows + '<td>' + data.price + '</td>';
                rows = rows + '<td>';
                rows = rows + '<a href="#" event="edit" class="mywebs_modal" id="' + data.id + '" mod="edit"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
                $("#tbdata").append(rows);
                $("#goSave").text('Confirm');
                toastr.success('Store created', 'Success Alert', {timeOut: 5000});
            } else {
                $("#goSave").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    });
</script>