function checkname() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "checkID.php?pkey=users",
        data: 'id=' + $("#uid").val(),
        type: "POST",
        success: function (data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function () {
        }
    });
}

$(document).ready(function (e) {
    $("#frmAdd").on('submit', (function (e) {
        e.preventDefault();
        var exec = $('#frmAdd').attr("action");
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: exec,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#goSave").text('Processing..');
            },
        }).done(function (data) {
            if (data.retval == '200') {
                $('#MC').modal('hide');
                var rows = '';
                var cnt_cls = $('.p_no').length;
                var no = cnt_cls + 1;
                rows = rows + '<tr>';
                rows = rows + '<td align="center">' + no + '</td>';
                rows = rows + '<td align="center>' + data.uid + '</td>';
                rows = rows + '<td>' + data.full_name + '</td>';
                rows = rows + '<td align="right">' + data.level_name + '</td>';
                rows = rows + '<td>' + data.last_in + '</td>';
                rows = rows + '<td align="center">' + data.aktif + '</td>';
                rows = rows + '<td align="center">' + data.sts + '</td>';
                rows = rows + '<td align="center">';
                rows = rows + '<a href="#" event="edit" id="' + data.uid + '" mod="edit" class="mywebs_modal" data-toggle="tooltip" data-placement="top" title="Edit Data"><img src="my-content/images/icon-edit-on.png"border="0" width="15" height="15" /></a>';
                rows = rows + '<a href="#" id="' + data.uid + '" event="edit" mod="pwd" class="mywebs_modal"> <i class="fa fa-key fa-fw" data-toggle="tooltip" data-placement="top" title="Change Password"></i></a>';
                rows = rows + '<a href="#" id="' + data.uid + '" event="kill" class="mywebs_modal_kill"> <i class="fa fa-sign-out fa-fw" data-toggle="tooltip" data-placement="top" title="Kill Session"></i></a></td>';
                rows = rows + '</td>';
                rows = rows + '</tr>';
                $("#tbdata").append(rows);
                $("#goSave").text('Confirm');
                toastr.success('Successfully', 'Success Alert', {timeOut: 5000});
            } else {
                $("#goSave").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    }));
});

$("#goEdit").click(function (e) {
    e.preventDefault();
    var exec = $('#frmEdit').attr("action");
    var formdata = $('#frmEdit').serialize();
    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: exec,
        data: formdata,
        beforeSend: function () {
            $("#goEdit").text('Processing..');
        },
    }).done(function (data) {
        if (data.retval == '200') {
            $('#ModalEdit').modal('hide');
            $('#tbdata tr').find('#fn_' + data.uid).text(data.full_name);
            $('#tbdata tr').find('#lvl_' + data.uid).text(data.level_name);
            $('#tbdata tr').find('#eml_' + data.uid).text(data.email);
            $('#tbdata tr').find('#str_' + data.uid).text(data.store_nm);
            $('#tbdata tr').find('#sts_' + data.uid).text(data.sts);
            $('#tbdata tr').find('#act_' + data.uid).text(data.aktif);
            $("#goEdit").text('Confirm');
            toastr.success('Successfully', 'Success Alert', {timeOut: 5000});
        } else {
            $("#goEdit").text('Try Again');
            toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
        }
    });
});

$("#goChange").click(function (e) {
    e.preventDefault();
    var exec = $('#frmChange').attr("action");
    var formdata = $('#frmChange').serialize();
    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: exec,
        data: formdata,
        beforeSend: function () {
            $("#goChange").text('Processing..');
        },
    }).done(function (data) {
        if (data.retval == '200') {
            $('#ModalEdit').modal('hide');
            $("#goChange").text('Update!');
            toastr.success('Successfully', 'Success Alert', {timeOut: 5000});
        } else {
            $("#goChange").text('Try Again');
            toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
        }
    });
});

$(document).ready(function (e) {
    $("#frmKill").on('submit', (function (e) {
        e.preventDefault();
        var exec = $('#frmKill').attr("action");
        var userid = $('#userid').val();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: exec,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#goKill").text('Killing..');
            },
        }).done(function (data) {
            if (data.retval == '200') {
                if (data.uid == userid) {
                    location.reload();
                } else {
                    $('#ModalEdit').modal('hide');
                    $("#goKill").text("Yes! I'm Sure!");
                    $('#tbdata tr').find('#sts_' + data.uid).text(data.sts);
                    toastr.success('Session has been killed', {timeOut: 5000});
                }
            } else {
                $("#goKill").text('Try Again');
                toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
            }
        });
    }));
});