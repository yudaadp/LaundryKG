<?php
if (! defined ( 'MYWEBS' ))
  exit ( 'Not Allowed' );
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover"
           id="myTable">
        <thead>
        <tr>
            <th width="20">NO</th>
            <th>TITLE</th>
            <th>SITE NAME</th>
            <th>BASE URL</th>
            <th>CURRENCY</th>
            <th>PRINTER</th>
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
            <td id="title_<?=$r['setting_id'];?>"><?php echo $r['setting_desc'];?></td>
            <td id="name_<?=$r['setting_id'];?>"><?php echo $r['site_nm'];?></td>
            <td id="url_<?=$r['setting_id'];?>"><?php echo $r['base_url'];?></td>
            <td id="curr_<?=$r['setting_id'];?>"><?php echo $r['currency_cd'];?></td>
            <td id="printer_<?=$r['setting_id'];?>"><?php echo $r['printer_name'];?></td>
            <td align="center"><a href="home.php?menu/<?= GET_MOD;?>/edit/<?= $sid;?>/pid/<?= $r['setting_id'];?>"><img src="my-content/images/icon-edit-on.png" border="0" width="15" height="15" /></a></td>
            </tr><?php
          $no ++;
        }
        ?>
        </tbody>
    </table>
</div>