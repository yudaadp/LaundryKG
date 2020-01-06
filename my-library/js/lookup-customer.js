$(document).ready(function () {
    $('#lookup').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        pageLength: 7,
        dom: "lfrtip",
        language: {
            lengthMenu: "",
            info: "",
            sSearch: ""
        },
        ajax: "get-fakestore.php",
        createdRow: function (row, data, dataIndex) {
            var str_id = $(row).find('td:eq(0)').html();
            var cust_name = $(row).find('td:eq(1)').html();
            var addrs = $(row).find('td:eq(2)').html();
            var tlp = $(row).find('td:eq(3)').html();
            $(row).attr('data-custname', cust_name).attr('data-addrs', addrs).attr('data-phone', tlp).attr('data-cust_id', str_id);
        }
    });
});

$(document).on('click', 'tr[role="row"]', function (e) {
    document.getElementById("cust_id").value = $(this).attr('data-cust_id');
    document.getElementById("custname").value = $(this).attr('data-custname');
    document.getElementById("addrs").value = $(this).attr('data-addrs');
    document.getElementById("phone").value = $(this).attr('data-phone');
    $('#myModal').modal('hide');
});