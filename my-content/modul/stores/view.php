<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr>
				<th width="20">No</th>
				<th>Code</th>
				<th>Store</th>
				<th>Address</th>
				<th>City</th>
				<th>ZIP</th>
				<th>Email</th>
                <th>Phone</th>
				<th></th>
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
				<td id="str_cd<?=$r['id'];?>"><?php echo $r['store_cd'];?></td>
				<td id="str_nm<?=$r['id'];?>"><?php echo $r['store_nm'];?></td>
				<td id="addrs<?=$r['id'];?>"><?php echo $r['addrs'];?></td>
				<td id="kota<?=$r['id'];?>"><?php echo $r['kota'];?></td>
				<td id="kdpos<?=$r['id'];?>"><?php echo $r['kd_pos'];?></td>
                <td id="email<?=$r['id'];?>"><?php echo $r['email'];?></td>
                <td id="tlp<?=$r['id'];?>"><?php echo $r['tlp_no'];?></td>
				<td align="center"><a href="#" event='edit' id="<?=$r['id'];?>" mod="edit"
					class='mywebs_modal' data-toggle="tooltip" data-placement="top"
					title="Edit Data"><img src="my-content/images/icon-edit-on.png"
						border="0" width="15" height="15" /></a></td>
                <td align="center" data-id="<?php echo $r['id'];?>" data-sid="<?= $sid;?>"><a href="#" id="set_store"><i class="fa fa-sign-in fa-lg"></i></a></td>
			</tr>
                <?php
	$no ++;
}
?>
</tbody>
	</table>
</div>