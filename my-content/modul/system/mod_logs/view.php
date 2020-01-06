<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );

$mod_inf = $get->show ();
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr id="tbl">
				<th width="30">NO</th>
				<th>MOD</th>
				<th width="20"></th>
			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
if (count ( $mod_inf )) {
	foreach ( $mod_inf as $r ) {
		?>
<tr id="data<?= $r['id'];?>">
				<td class="p_no"><?php echo $no;?></td>
				<td><?php echo ucwords($r['mod']);?></td>
				<td align="center"><a href="#" event="edit" class='mywebs_modal'
					id='<?=$r['id'];?>' mod='<?=$r['mod'];?>'><img
						src="my-content/images/delete-icon.png" border="0" width="20"
						height="20" /></a></td>
			</tr><?php
		$no ++;
	}
}
?>
</tbody>
	</table>
</div>