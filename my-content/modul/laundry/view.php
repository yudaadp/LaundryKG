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
            <th>KODE</th>
            <th>TRX DATE</th>
            <th>TGL <br/>PENGAMBILAN</th>
            <th>NAMA</th>
            <th>TLP</th>
            <th>TOTAL</th>
            <th>BAYAR</th>
            <th>STATUS</th>
        </tr>
        </thead>
        <tbody id="tbdata">
        <?php
        $no = 1;
        $arr_data = $get_data->show ();
        if ($arr_data) foreach ( $arr_data as $r ) {
          ?><tr align="center">
            <td class="p_no"><?php echo $no;?></td>
            <td id="inv<?=$r['id'];?>"><?php echo $r['inv_cd'];?></td>
            <td id="trx_date<?=$r['id'];?>"><?php echo dayID($r['trx_date']);?></td>
            <td id="grab_date<?=$r['id'];?>"><?php echo dayID($r['grab_date']);?></td>
            <td id="cust<?=$r['id'];?>"><?php echo $r['cust_nm'];?></td>
            <td id="tlp<?=$r['id'];?>"><?php echo $r['tlp'];?></td>
            <td id="total<?=$r['id'];?>"><?php echo number_format($r['total'],2);?></td>
            <td id="paid<?=$r['id'];?>"><?php echo number_format($r['paid'],2);?></td>
            <td id="prog_sts<?=$r['id'];?>"><?php echo $r['prog_sts'];?></td>
            </tr><?php
          $no ++;
        }
        ?>
        </tbody>
    </table>
</div>