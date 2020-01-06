<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
$mod = 'genparameter';
$get_data = new Genparam ();
?>&nbsp;
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="30">No</th>
				<th>Group Code</th>
				<th>Description</th>
				<th>Date</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
$arr_data = $get_data->show ();
if (count ( $arr_data )) {
	foreach ( $arr_data as $r ) {
		?>
				<tr>
				<td><?php echo $no;?></td>
				<td><a
					href="home.php?menu/genparameterlist/view/<?=$sid;?>/pid/<?=$r['code'];?>"><?php echo $r['code'];?></a></td>
				<td><?php echo $r['p_desc'];?></td>
				<td align="center"><?php echo $r['createdate'];?></td>
				<td align="center"><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['id'];?>'><img src="my-content/images/icon-edit-on.png"
						border="0" width="20" height="20" /></a></td>
			</tr>
                <?php
		$no ++;
	}
}
?>
</tbody>
	</table>
</div>
<?php require_once 'create.php'; ?>
<!-- Modal edit -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"></div>