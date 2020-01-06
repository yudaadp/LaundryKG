<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr id="tbl">
				<th width="20">NO</th>
				<th>PRINTER</th>
				<th>TYPE</th>
				<th>PROFILE</th>
				<th>PATH</th>
				<th>IP/PORT</th>
				<th width="20"></th>
			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
$arr_data = $get_data->showprinter();
if($arr_data)
foreach ( $arr_data as $r ) {
	?>
<tr align="center">
				<td class="p_no"><?php echo $no;?></td>
				<td id="printer_<?= $r['id'];?>"><?php echo ucwords($r['printer_name']);?></td>
				<td id="type_<?= $r['id'];?>"><?php echo $r['type'];?></td>
				<td id="profile_<?= $r['id'];?>"><?php echo $r['profile'];?></td>
				<td id="path_<?= $r['id'];?>"><?php echo $r['printer_path'];?></td>
				<td id="ip_<?= $r['id'];?>"><?php echo $r['ip_addrs'].'/'.$r['port'];?></td>
				<td><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['0'];?>'><img src="my-content/images/icon-edit-on.png"
						border="0" width="20" height="20" /></a></td>
			</tr>
<?php
	$no ++;
}
?>
</tbody>
	</table>
</div>