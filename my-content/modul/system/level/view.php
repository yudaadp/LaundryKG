<?php 
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="30" rowspan="2">No</th>
				<th rowspan="2">Level Name</th>
				<th rowspan="2">Description</th>
				<th colspan="2">Role & Permissions</th>
				<th width="25" rowspan="2">Sts</th>
				<th width="50" rowspan="2"></th>
			</tr>
            <tr>
    			<th>Mods</th>
    			<th>Report</th>
  			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
$arr_data = $get_level->showlevel ();
foreach ( $arr_data as $r ) {
	?>
<tr>
				<td class="p_no"><?php echo $no;?></td>
				<td id="lvl<?= $r['id']; ?>"><?php echo $r['level_name'];?></td>
				<td id="desc<?= $r['id']; ?>"><?php echo $r['level_desc'];?></td>
				<td><a
					href="home.php?menu/role/view/<?=$sid;?>/pid/<?=$r['id'].'/&lvl_name='.$r['level_name'];?>"
					id='<?=$r['id'];?>' lvl='<?=$r['level_name'];?>'>SET</a></td>
                <td><a
					href="home.php?menu/rpt_access/view/<?=$sid;?>/pid/<?=$r['id'].'/&lvl_name='.$r['level_name'];?>"
					id='<?=$r['id'];?>' lvl='<?=$r['level_name'];?>'>SET</a></td>
				<td id="sts<?= $r['id']; ?>" align="center"><?php echo $r['sts'];?></td>
				<td align="center"><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['id'];?>'><img src="my-content/images/icon-edit-on.png"
						border="0" width="20" height="20" /></a></td>
			</tr>
<?php
	$no ++;
}
?>
</tbody>
	</table>
</div>