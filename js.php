<?php 
if (! in_array (GET_MOD, $get_content->just_view () ))
	$addom = 'Bfrtip';
?>

<script type="text/javascript">
	$(window).load(function() {
			$(".loader").fadeOut("slow");
		});
	window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
	}, 2000);

	 $(document).ready(function(){  
      $('#find_mn').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  {  
                $.ajax({  
                     url:"findmenu.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  {  
                          $('#result').html(data);  
                     }  
                	});  
           }  else  {  
                $('#result').html('');                 
           }  
      });  
 	});
<?php if (GET_MOD) {?>
$(document).ready(function() {
    $('#myTable').DataTable({
            responsive: true,
            dom: '<?=$addom;?>',
	<?php
	if (! in_array (GET_MOD, $get_content->just_view () )) {
		?>
        	buttons: [{
				className: "btn btn-primary",
            	text: 'Create New',
				init: function( api, node, config) {
                	$(node).removeClass('dt-button ')
              	},
                action: function ( e, dt, node, config ) {
					<?php
		if (in_array ( GET_MOD, $get_content->create_btn () )) {
			?>
				$(location).attr('href','home.php?menu/<?=GET_MOD.'/create/'.$sid;?>');
		<?php
		} else {
			?>
			   $('#MC').modal('show',{backdrop: 'true'});
		<?php }?>
                }
            }]
			<?php }?>
        });
	$('#myTable').on('click', 'a', function () {
		   var event = $(this).attr("event");
		   var id = $(this).attr("id");
		   var mod = $(this).attr("mod");
		   var p_1 = $(this).attr("p1");

		   if (event == 'kill') {
			$.ajax({
				    url: "<?=MOD_PATH.GET_MOD.'/kill.php?'.$sid;?>",
				    type: "GET",
				    data : {mid: id,},
				    success: function (ajaxData){
				    $("#ModalEdit").html(ajaxData);
				    $("#ModalEdit").modal('show',{backdrop: 'true'});
				 	}
				});
		   } else if (event == 'lookup') {
			 $.ajax({
				    url: "<?= get_dir_path($MPATH, 'lookup');?>",
				    type: "GET",
				    data : {mid: id,},
				    success: function (ajaxData){
				    $("#ModalView").html(ajaxData);
				    $("#ModalView").modal('show',{backdrop: 'true'});
				 	}
				});
		   }
		   else if (event == 'edit') {
		   	$.ajax({
				   url: "<?= get_dir_path($MPATH);?>",
    			   type: "GET",
    			   data : {mid: id, mod_nm: mod, p1: p_1},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   		}
    			});
		   } 
    });
});

function target_popup(form) {
	var left = (screen.width/2)-(900/2);
	var top = (screen.height/2)-(600/2);
    window.open('', 'formpopup', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=900, height=600, top='+top+', left='+left);
    form.target = 'formpopup';
}

$(function() {
   $('.input-daterange').datepicker({
     format: 'yyyy-mm-dd',
     autoclose: true,
     todayHighlight: true
  });
});
<?php }?>

</script>