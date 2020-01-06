<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="20">No</th>
				<th>Product</th>
				<th>Price</th>
				<th>Satuan</th>
                <th></th>
			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
$arr_data = $get_data->show ();
if ($arr_data) foreach ( $arr_data as $r ) {
	?><tr align="center">
				<td class="p_no"><?php echo $no;?></td>
				<td id="prod<?=$r['id'];?>"><?php echo $r['prod_nm'];?></td>
				<td id="price<?=$r['id'];?>"><?php echo number_format($r['price'],2);?></td>
				<td id="price<?=$r['id'];?>"><?php echo strtoupper($r['satuan']);?></td>
				<td align="center"><a href="#" event='edit' id="<?=$r['id'];?>" mod="edit" class='mywebs_modal' data-toggle="tooltip" data-placement="top" title="Edit Data"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a></td>
    </tr><?php
	$no ++;
}
?>
</tbody>
	</table>
</div>