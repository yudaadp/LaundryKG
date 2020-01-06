<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );

$modlists = $get_mods->showmods ();
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="30">No</th>
				<th>MOD</th>
				<th>ALIAS</th>
				<th>PATH</th>
				<th>SET IN MENU</th>
				<th width="20">SEQ/STS/SHOW</th>
				<th width="20"></th>
			</tr>
		</thead>
		<tbody>
<?php
$no = 1;
foreach ( $modlists as $r ) {
	?>
<tr>
				<td><?php echo $no;?></td>
				<td><?php echo ucwords($r['mod_name']);?></td>
				<td><?php echo ucwords($r['mod']);?></td>
				<td><?php echo ucwords($r['mod_location']);?></td>
				<td><?php echo ucwords($r['menu']);?></td>
				<td align="center"><?php echo $r['set_order'] .'/'. $r['sts'] .'/'.$r['show'];?></td>
				<td align="center"><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['id'];?>'><img src="my-content/images/icon-edit-on.png"
						border="0" width="20" height="20" /></a></td>
			</tr><?php
	$no ++;
}
?>
</tbody>
	</table>
</div>