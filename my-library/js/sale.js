/**
 * Created by yudaadp on 9/5/2017.
 */
$(function () {
    $("#prod_nm").autocomplete({
        source: 'fakeproductlist.php'
    });
});
$("#addtocart").click(function (e) {
    e.preventDefault();
    var form_action = $('#frmsale').attr("action");
    var exec = $('#frmsale').serialize();
    var ssid = $('#ssid').val();
    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: form_action,
        data: exec,
        beforeSend: function () {
            $("#addtocart").text('adding..');
        }
    }).done(function (data) {
        if (data.retval == '200') {
            $('#gt').text(data.total).number(true, 2);
            var subttl = $.number(data.sub_ttl, 2);
            var price = $.number(data.price, 2);
            var rows = '';
            rows = rows + '<tr>';
            rows = rows + '<td>' + data.prod_nm + '</td>';
            rows = rows + '<td align="center">' + data.qty + '</td>';
            rows = rows + '<td align="center">' + data.satuan + '</td>';
            rows = rows + '<td align="right">' + subttl + '</td>';
            rows = rows + '<td align="center">';
            rows = rows + '<a href="#" class="del-item" id="' + data.id + '" ssid="'+ ssid +'" url="my-content/modul/laundry/exproc.php" sid="'+ data.sid +'"><i class="fa fa-trash-o fa-lg"></i></a>';
            rows = rows + '</td>';
            rows = rows + '</tr>';
            $("#tbdata").append(rows);
            $("#addtocart").text('add to cart');
            $("#qty").val('');
            $("#prod_nm").val('');
            toastr.success('Berhasil', 'Success Alert', {timeOut: 5000});
        } else {
            $("#addtocart").text('Try Again');
            toastr.error('Gagal menambahkan.', 'Error:', {timeOut: 5000});
        }
    });
});

$("#checkout").click(function (e) {
    e.preventDefault();
    var form_action = $('#frmcheckout').attr("action");
    var exec = $('#frmcheckout').serialize();
    var ssid = $('#ssid').val();
    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: form_action,
        data: exec,
        beforeSend: function () {
            $("#checkout").text('processing..');
        }
    }).done(function (data) {
        if(data.retval === '200'){
            location.reload();
        } else {
            $("#checkout").text('Try Again');
            toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
        }
    });
});

$("#print_label").click(function (e) {
    e.preventDefault();
    var ssid = $('#ssid').val();
    var sid = $('#sid').val();
    var evt = 'laundry/print_label';

    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: 'my-content/modul/laundry/exproc.php',
        data:{'ssid':ssid, 'sid':sid, 'event':evt},
        beforeSend: function () {
            toastr.info('Printing...', 'Info:', {timeOut: 1000});
        }
    }).done(function (data) {
        if(data.retval === '200'){
            toastr.success('Done!', 'Print:', {timeOut: 5000});
        } else {
            toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
        }
    });
});

$(function(){
    $(document).on('click','.del-item',function(){
        var item = $(this).attr('id');
        var ssid = $(this).attr('ssid');
        var url = $(this).attr('url');
        var sid =  $(this).attr('sid');
        var evt = 'laundry/delete'
        var $ele = $(this).parent().parent();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url,
            data:{'id':item, 'ssid':ssid, 'sid':sid, 'event':evt},
            success: function(data){
                if(data.retval == '200'){
                    toastr.success('Item deleted', 'Success Alert', {timeOut: 5000});
                    $('#gt').text(data.total).number(true, 2);
                    $ele.fadeOut().remove();
                }else{
                    toastr.error('Something wrong, please try again.', 'Error:', {timeOut: 5000});
                }
            }
        });
    });
});
