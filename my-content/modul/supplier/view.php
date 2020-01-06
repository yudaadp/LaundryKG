<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover"
		id="myTable">
		<thead>
			<tr align="center">
				<th width="20">No</th>
				<th>NAME</th>
				<th>DESC</th>
				<th>EMAIL</th>
				<th>PHONE</th>
				<th>MOBILE</th>
                <th></th>
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
				<td id="nm_<?=$r['id'];?>"><?php echo $r['sup_nm'];?></td>
                <td id="desc_<?=$r['id'];?>"><?php echo $r['sup_desc'];?></td>
                <td id="mail_<?=$r['id'];?>"><?php echo $r['email'];?></td>
                <td id="phone_<?=$r['id'];?>"><?php echo $r['mob_no_1'];?></td>
                <td id="mob_<?=$r['id'];?>"><?php echo $r['mob_no_2'];?></td>
                <td align="center"><a href="#" event='edit' id="<?=$r['id'];?>" mod="edit" class='mywebs_modal' data-toggle="tooltip" data-placement="top" title="Edit Data"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a></td>
        </tr><?php
		$no ++;
	}
}
?>
</tbody>
	</table>
</div>