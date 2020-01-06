<div class="form-group">
 <div class="col-lg-12">
   <div class="radio">
      <label>
         <input type="radio" name="p_ops" id="p_ops" value="p_kk"><strong>Keluarga Jemaat</strong>
      </label>
   </div>
  </div>
   <div class="col-lg-3">
  <label class="control-label" for="p1">SID</label>
	<div class="form-group input-group col-lg-12">
	<input type="text" name="p1" id="p1" class="form-control" readonly="readonly" />
     <span class="input-group-btn"> 
	<button class="btn btn-default" id="btn_lookup" type="button" disabled="disabled" data-toggle="modal" data-target="#lookup">
     <i class="fa fa-search"></i>
	</button>
	</span>
   </div>
   </div>
   <div class="col-lg-3">
	<div class="form-group">
	<label class="control-label" for="p2">No.KK</label>
    <input type="text" name="p2" id="p2" class="form-control" readonly/>
	</div>
   </div>
   <div class="col-lg-3">
	<div class="form-group">
	<label class="control-label" for="p3">Nama KK</label>
    <input type="text" name="p3" id="p3" class="form-control" readonly/>
	</div>
   </div>
</div>

<div class="form-group">
 <div class="col-lg-12">
   <div class="radio">
      <label>
         <input type="radio" name="p_ops" id="p_ops" value="p_tgl"><strong>Periode Tanggal Buat</strong>
      </label>
   </div>
  </div>
<div class="col-lg-3">
	<div class="form-group">
    <div class="input-daterange">
	<label class="control-label" for="p1">Start Date</label>
    <input type="text" name="p1" id="str_dt" class="form-control" required="required" disabled="disabled"/>
    </div>
	</div>
   </div>
   <div class="col-lg-3">
	<div class="form-group">
        <div class="input-daterange">
	<label class="control-label" for="p2">End Date</label>
    <input type="text" name="p2" id="end_dt" class="form-control" required="required" disabled="disabled"/>
	</div>
    </div>
   </div>
</div>
<!-- Modal -->
        <div class="modal fade" id="lookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content col-xs-12 col-sm-12 col-md-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data KK</h4>
                    </div>
                    <div class="modal-body">
                        <table id="datakk" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                        	<th>SID</th>
                            <th>No.KK</th>
                            <th>Nama KK</th>
                            </tr>
                            </thead>
                            <tbody>
							 <?php
							 include '../../my-content/modul/print/class.php';
							 $getdata = new RPT ();
								$arr_umt =  $getdata->kk();
                                if (count($arr_umt)) {
									foreach ($arr_umt as $umat) {?>
                                    <tr class="pilih" data-id="<?=$umat['alt_cd'];?>" data-kk="<?=$umat['no_kk_pre'].$umat['no_kk'];?>" data-nm="<?=$umat['nm_kk'];?>">
                                    <td><?=ucwords($umat['alt_cd']);?></td>
                                    <td><?=$umat['no_kk_pre'].$umat['no_kk'];?></td>
                                    <td><?=$umat['nm_kk'];?></td>
                                    </tr>
             					<?php
									}
                                }
                                ?>

                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
<!-- lookup -->
<script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
	   document.getElementById("p1").value = $(this).attr('data-id');
	   document.getElementById("p2").value = $(this).attr('data-kk');
	   document.getElementById("p3").value = $(this).attr('data-nm');
       $('#lookup').modal('hide');
   });
   
   $(function () {
       $("#datakk").dataTable({
		   "dom": "lfrti",
		"language": {
            "lengthMenu": "",
			"info": "",
			"sSearch": ""
		}
	   });
   });
   $("input[name='p_ops']").click(function() {
    if ($(this).val() === 'p_kk') {
      $('#str_dt').attr("disabled","disabled");
	  $('#end_dt').attr("disabled","disabled");
	  $('#btn_lookup').removeAttr("disabled","disabled");
    } else {
      $('#str_dt').removeAttr("disabled","disabled");
	  $('#end_dt').removeAttr("disabled","disabled");
	  $('#btn_lookup').attr("disabled","disabled");
    } 
  });
</script>