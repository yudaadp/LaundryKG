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
				<th width="300">MENU</th>
				<th width="300">URL</th>
				<th width="300">ICON</th>
				<th width="20">SEQ</th>
				<th width="20">STATUS</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
$arr_data = $get_menu->showmenu ();
foreach ( $arr_data as $r ) {
	?>
<tr align="center">
				<td class="p_no"><?php echo $no;?></td>
				<td id="menu<?= $r['0'];?>"><?php echo ucwords($r['1']);?></td>
				<td id="url<?= $r['0'];?>"><?php echo $r['2'];?></td>
				<td id="icon<?= $r['0'];?>"><?php echo $r['3'];?></td>
				<td id="seq<?= $r['0'];?>"><?php echo $r['5'];?></td>
				<td id="sts<?= $r['0'];?>"><?php echo $r['4'];?></td>
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