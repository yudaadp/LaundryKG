$(document).ready(function () {
    $('#cust_list').DataTable({
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
        ajax: "get-customers.php",
        createdRow: function (row, data, dataIndex) {
            var cust_cd = $(row).find('td:eq(0)').html();
            var cust_nm = $(row).find('td:eq(1)').html();
            $(row).attr('data-cd', cust_cd).attr('data-name', cust_nm);
        }
    });
});

$(document).on('click', 'tr[role="row"]', function (e) {
    var cust_code = $(this).attr('data-cd');
    var cust_name = $(this).attr('data-name');
    document.getElementById("cust_nm").value = cust_code + '/'+ cust_name;
    $('#lookup_cust').modal('hide');
});