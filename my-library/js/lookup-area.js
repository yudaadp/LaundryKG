$(document).ready(function() {
   $('#lookup').DataTable( {
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
        ajax: "get-area.php",
		createdRow: function(row, data, dataIndex) {
          var prov = $(row).find('td:eq(0)').html();
		  var kota = $(row).find('td:eq(1)').html();
		  var kec = $(row).find('td:eq(2)').html();
		  var kel = $(row).find('td:eq(3)').html();
		  var cd = $(row).find('td:eq(4)').html();
          $(row).attr('data-prov', prov).attr('data-kota',kota).attr('data-kec',kec).attr('data-kel',kel).attr('code',cd);
      }
    } );
} );

   $(document).on('click', 'tr[role="row"]', function (e) {
	   var evt = $('#lookup_area').data('event');
	   
	   if (evt) {
		   document.getElementById("eprov").value = $(this).attr('data-prov');
		   document.getElementById("ekota").value = $(this).attr('data-kota');
		   document.getElementById("ekec").value = $(this).attr('data-kec');
		   document.getElementById("ekel").value = $(this).attr('data-kel');
		   document.getElementById("ekd_pos").value = $(this).attr('code');
		   
	   } else {
		   document.getElementById("prov").value = $(this).attr('data-prov');
		   document.getElementById("kota").value = $(this).attr('data-kota');
		   document.getElementById("kec").value = $(this).attr('data-kec');
		   document.getElementById("kel").value = $(this).attr('data-kel');
		   document.getElementById("kd_pos").value = $(this).attr('code');
	   }
       $('#myModal').modal('hide');
   });