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
            <th>User ID</th>
            <th>Name</th>
            <th>Level</th>
            <th>Last Seen</th>
            <th>Status</th>
            <th>On/Off</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="tbdata">
        <?php
        $no = 1;
        $arr_data = $get_data->show ();
        foreach ( $arr_data as $r ) {
            ?><tr>
            <td class="p_no"><?php echo $no;?></td>
            <td id="uid_<?=$r['uid'];?>" align="center"><?php echo strtoupper($r['uid']);?></td>
            <td id="fn_<?=$r['uid'];?>"><?php echo $r['full_name'];?></td>
            <td id="lvl_<?=$r['uid'];?>"><?php echo strtoupper($r['level_name']);?></td>
            <td id="in_<?=$r['uid'];?>"><?php echo $r['last_in'];?></td>
            <td id="act_<?=$r['uid'];?>" align="center"><?php echo $r['aktif'];?></td>
            <td id="sts_<?=$r['uid'];?>" align="center"><?php echo $r['sts'];?></td>
            <td align="center"><a href="#" event='edit' id="<?=$r['uid'];?>" mod="edit"
                                  class='mywebs_modal' data-toggle="tooltip" data-placement="top"
                                  title="Edit Data"><img src="my-content/images/icon-edit-on.png"
                                                         border="0" width="15" height="15" /></a> <a href="#"
                                                                                                     id="<?=$r['uid'];?>" event="edit" mod="pwd" class='mywebs_modal'> <i
                        class="fa fa-key fa-fw" data-toggle="tooltip"
                        data-placement="top" title="Change Password"></i>
                </a> <a href="#"
                        id="<?=$r['uid'];?>" event="kill" class='mywebs_modal_kill'> <i
                        class="fa fa-sign-out fa-fw" data-toggle="tooltip"
                        data-placement="top" title="Kill Session"></i>
                </a></td>
            </tr>
            <?php
            $no ++;
        }
        ?>
        </tbody>
    </table>
</div>