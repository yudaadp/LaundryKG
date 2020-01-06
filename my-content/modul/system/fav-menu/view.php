<?php
if (! defined ( 'MYWEBS' ))
    exit ( 'Now Allowed' );
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover"
           id="myTable">
        <thead>
        <tr id="tbl">
            <th width="30">No</th>
            <th>Menu</th>
            <th width="20"></th>
        </tr>
        </thead>
        <tbody id="tbdata">
        <?php
        $myFav = $get_data->show_fav ();
        $no = 1;
        if (count ( $myFav )) {
            foreach ( $myFav as $r ) {
                ?>
                <tr>
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