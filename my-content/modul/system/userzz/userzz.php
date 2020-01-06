<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
$mod = 'userzz';
$get_data = new Users ();
?>
&nbsp;
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="20">No</th>
				<th>User ID</th>
				<th>Nama</th>
				<th>Level</th>
				<th>Email</th>
				<th>Status</th>
				<th>On/Off</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
$arr_data = $get_data->show ();
foreach ( $arr_data as $r ) {
	?><tr align="center">
				<td><?php echo $no;?></td>
				<td><?php echo $r['uid'];?></td>
				<td><?php echo $r['full_name'];?></td>
				<td><?php echo $r['level_name'];?></td>
				<td><?php echo $r['email'];?></td>
				<td><?php echo $r['aktif'];?></td>
				<td><?php echo $r['sts'];?></td>
				<td align="center"><a href="#" event='edit' id="<?=$r['uid'];?>" mod="edit"
					class='mywebs_modal' data-toggle="tooltip" data-placement="top"
					title="Edit Data"><img src="my-content/images/icon-edit-on.png"
						border="0" width="15" height="15" /></a> <a href="#"
					id="<?=$r['uid'];?>" event="edit" mod="pwd" class='mywebs_modal'> <i
						class="fa fa-key fa-fw" data-toggle="tooltip"
						data-placement="top" title="Change Password"></i>
				</a> <a href="#"
					id="<?=$r['uid'];?>" event="edit" mod="pic" class='mywebs_modal'> <i
						class="fa fa-camera-retro fa-fw" data-toggle="tooltip"
						data-placement="top" title="Profile Picture"></i>
				</a> <a href="#"
					id="<?=$r['uid'];?>" event="kill" class='mywebs_modal_kill'> <i
						class="fa fa-sign-out fa-fw" data-toggle="tooltip"
						data-placement="top" title="Kill Session"></i>
				</a></td>
			</tr>
                <?php
	$no ++;
}
?>
</tbody>
	</table>
</div>
<!-- Modal Create-->
<div id="MC" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:70%">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Create New : Users</h4>
			</div>
			<div class="modal-body">
        <?php
								if (NULL !== cekAkses ( $mod, $_SESSION ['mywebs_lvl'], 'create' )) {
									?>
          <form action="<?=$DIR_PATH.$mod.'/exproc.php?'.$sid;?>"
					name="mywebs_modal" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="event" value="<?=$mod.'/create';?>" /> <input
						type="hidden" name="sid" value="<?=$sid;?>" />
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label" for="md_name">Full Name</label> <input
								type="text" name="md_name" id="md_name" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label" for="inputError">User ID</label> <input
								type="text" name="uid" id="uid" class="form-control"
								onblur="checkname()" required /> <span
								id="user-availability-status"></span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label" for="md_phone1">Mobile Phone</label>
							<input type="text" name="md_phone1" id="md_phone1" class="form-control" required />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label" for="md_phone2">Phone Number</label>
							<input type="text" name="md_phone2" id="md_phone2" class="form-control" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="control-label" for="md_mail">Email</label> <input
								type="email" name="md_mail" id="md_mail" class="form-control"
								required />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="Modal Name">Set Level</label>
                  <?php
									if (! empty ( checkmodsts ( 'level' ) )) {
										?>
                  <select class="form-control" name="md_level">
                  <?= getlevel();?>
                  </select>
                  <?php
									
} else {
										echo '<strong>' . genparam ( 'HTTP_CODE', '403.1' ) . '</strong>';
									}
									?>
                </div>
					</div>
					<div class="col-lg-12">
						<label class="control-label" for="md_phone2">Password</label>
					</div>
					<div class="col-lg-12">
						<div class="form-group input-group">
							<input type="text" name="md_pass" id="md_pass"
								class="form-control" rel="gp" data-size="12"
								data-character-set="a-z,0-9" required /><span
								class="input-group-btn"><button type="button"
									class="btn btn-default getNewPass">
									<span class="fa fa-refresh"></span>
								</button></span>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" rows="3" name="address" id="addrs"></textarea>
						</div>
					</div>
<div class="col-lg-12">
					<div class="form-group input-group col-lg-4">
						<input type="text" name="prov" id="prov" class="form-control"
							placeholder="Province" readonly="readonly"
							value="" /> <span class="input-group-btn">
							<button class="btn btn-default" type="button" data-toggle="modal"
								data-target="#myModal">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kota">City</label> <input
							type="text" name="kota" id="kota" class="form-control"
							readonly="readonly" value="" />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kec">Districts</label> <input
							type="text" name="kec" id="kec" class="form-control"
							value="" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kel">Village</label> <input
							type="text" name="kel" id="kel" value=">"
							class="form-control" readonly="readonly" required />
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<label class="control-label" for="kd_pos">Zip Code</label> <input
							type="text" name="kd_pos" id="kd_pos"
							value="" class="form-control"
							readonly="readonly" required />
					</div>
				</div>
                    <div class="col-lg-12">
						<label class="control-label" for="md_photo">Photo</label>
					</div>
                    <div class="col-lg-12">
						<div class="form-group input-group">
                            <input id="uploadFile" placeholder="Choose File" readonly="readonly" class="form-control" />
                            <span class="input-group-btn">
                            <div class="fileUpload btn btn-primary">
    						<span>Browse File</span>
    							<input id="uploadBtn" type="file" class="upload" name="md_photo" accept="image/x-png,image/jpeg"/>
							</div>
                            </span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Sent password to email?</label> <label
								class="checkbox-inline"> <input type="checkbox" name="md_sent"
								checked="checked" value="0">Yes
							</label>
						</div>
					</div>
					<div class="divider"></div>
					<div class="modal-footer">
						<button class="btn btn-success" type="submit">Confirm</button>
						<button type="reset" class="btn btn-danger" data-dismiss="modal"
							aria-hidden="true">Cancel</button>
					</div>
				</form>
              <?php
								
} else {
									echo genparam ( 'HTTP_CODE', '401' );
								}
								?>
            </div>
		</div>
	</div>
</div>
<div id="ModalEdit" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" class="modal fade" tabindex="-2" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>
<!-- lookup gereja -->
<?php
require_once 'data-area-id.php';
?>
<!-- Javascript untuk popup modal Edit-->
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
$(document).on('click', '.check_grja', function (e) {
	   document.getElementById("id_kls2").value = $(this).attr('data-id');
	   document.getElementById("gcd2").value = $(this).attr('data-code');
	   document.getElementById("nm_grja2").value = $(this).attr('data-nm');
       $('#lookup_grja').modal('hide');
});
/*
   $(document).on('click', '.pilih', function (e) {
	   document.getElementById("refcode").value = $(this).attr('data-id');
	   document.getElementById("uid").value = $(this).attr('data-id');
	   document.getElementById("md_name").value = $(this).attr('data-nm');
	   document.getElementById("md_mail").value = $(this).attr('data-mail');
	   document.getElementById("addrs").value = $(this).attr('data-addrs');
	   document.getElementById("md_phone1").value = $(this).attr('data-hp');
	   document.getElementById("md_phone2").value = $(this).attr('data-hp2')
       $('#modal2').modal('hide');
   });
   
   $(function () {
       $("#lookup").dataTable({
		   "dom": "lfrti",
		"language": {
            "lengthMenu": "",
			"info": "",
			"sSearch": ""
		}
	   });
   }); */
   
// Generate a password string
function randString(id){
  var dataSet = $(id).attr('data-character-set').split(',');  
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  var text = '';
  for(var i=0; i < $(id).attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}

// Create a new password on page load
$('input[rel="gp"]').each(function(){
  $(this).val(randString($(this)));
});

// Create a new password
$(".getNewPass").click(function(){
  var field = $(this).closest('div').find('input[rel="gp"]');
  field.val(randString(field));
});

// Auto Select Pass On Focus
$('input[rel="gp"]').on("click", function () {
   $(this).select();
});


function checkname() {
	$("#loaderIcon").show();
		jQuery.ajax({
			url: "checkID.php?pkey=<?=$mod;?>",
			data:'id='+$("#uid").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
	error:function (){}
	});
}

$('form').validate({
        rules: {
            'md_name': {
                    required: true,
                    minlength: 3,
                    maxlength: 35
                },
            'md_mail': {
                    required: true,
                    email: true,
                    minlength: 5,
                    maxlength: 65
                },
            'md_pass': {
                    required: true,
                    minlength: 6,
                    maxlength: 12
            },
			'md_phone1': {
				required: true,
				digits: true,
				minlength:8,
				maxlength: 15
			},
			'md_phone2': {
				required: false,
				digits: true,
				minlength:8,
				maxlength: 15
			},
			'id_kls': {
				required: true
			},
			'gcd': {
				required: true
			},
			'nm_grja': {
				required: true
			}
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>