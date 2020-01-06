<?php
if (! defined ( 'MYWEBS' ))
    exit ( 'Not Allowed' );
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover"
           id="myTable">
        <thead>
        <tr>
            <th width="20">No</th>
            <th>Mod</th>
            <th>Update Notes</th>
            <th>File(S)</th>
            <th>Last Update</th>
            <th>By</th>
        </tr>
        </thead>
        <tbody id="tbdata">
        <?php
        $no = 1;
        $arr_data = $get_data->show ();
        if($arr_data)
        foreach ( $arr_data as $r ) {
            ?><tr>
            <td class="p_no" align="center"><?php echo $no;?></td>
            <td id="mod_<?=$r['id'];?>" align="center"><?php echo $r['mod_name'];?></td>
            <td id="upd_<?=$r['id'];?>"><?php echo $r['upd_note'];?></td>
            <td id="fn_<?=$r['id'];?>"><?php echo $r['upd_files'];?></td>
            <td id="lst_<?=$r['id'];?>"><?php echo $r['last_update'];?></td>
            <td id="lst_<?=$r['id'];?>"><?php echo strtoupper($r['last_updateby']);?></td>
            </tr>
            <?php
            $no ++;
        }
        ?>
        </tbody>
    </table>
</div>