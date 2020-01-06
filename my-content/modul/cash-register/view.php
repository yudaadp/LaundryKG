<?php
if (! defined ( 'MYWEBS' ))
    exit ( 'Not Allowed' );
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr align="center">
				<th width="20">No</th>
				<th>STORE</th>
				<th>OPEN</th>
				<th>SALES</th>
				<th>ADJUSTS</th>
				<th>CLOSE</th>
				<th>TOTAL</th>
				<th>DATE</th>
				<th>STS</th>
			</tr>
		</thead>
		<tbody id="tbdata">
<?php
$no = 1;
$arr_data = $get_data->show ();
if (count ( $arr_data )) {
	foreach ( $arr_data as $r ) {
		?><tr>
				<td class="p_no" align="center"><?php echo $no;?></td>
				<td id="store_<?=$r['id'];?>"><?php echo $r['store_nm'];?></td>
				<td align="right"><?php echo number_format($r['csh_open'],2);?></td>
				<td align="right"><?php echo number_format($r['csh_sale'],2);?></td>
				<td align="right" id="csh_adjust_<?=$r['id'];?>"><?php echo number_format($r['csh_adjust'],2);?></td>
				<td align="right"><?php echo number_format($r['csh_close'],2);?></td>
				<td align="right" id="csh_total_<?=$r['id'];?>"><?php echo number_format($r['csh_total'],2);?></td>
				<td align="center"><?php echo date_format(date_create($r['csh_open_dt']), 'M, d Y');?></td>
				<td align="center"><?php echo strtoupper($r['status']);?></td>
			</tr>
                <?php
		$no ++;
	}
}
?>
</tbody>
	</table>
</div>