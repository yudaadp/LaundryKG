   <div class="col-lg-3">
  <label class="control-label" for="p1">SID</label>
	<div class="form-group input-group col-lg-12">
	<input type="text" name="p1" id="p1" class="form-control" readonly="readonly" />
     <span class="input-group-btn"> 
	<button class="btn btn-default" type="button" data-toggle="modal" data-target="#lookup">
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
	<label class="control-label" for="sid">Nama KK</label>
    <input type="text" name="p3" id="p3" class="form-control" readonly/>
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
<!-- lookup gereja -->
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
</script>