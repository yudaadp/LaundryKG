<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Not Allowed' );
	define('PAPER_MARGIN', TRUE);
?>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
	padding: 2mm;
}
</style>

   <page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
        <page_header>
        </page_header>
        <page_footer>     
        </page_footer> 
<p align="center">
    <strong style="font-size:20px"> SURAT KETERANGAN PINDAH (ATESTASI)</strong>
</p>
<p align="center">
    <strong style="font-size:20px">SURAT KETERANGAN PINDAH</strong>
</p>
<p align="center">
   <span style="font-size:14px"> No: <b><?= $docid;?></b></span>
</p>
<p style="font-size:14px">
    Yang bertanda tangan dibawah ini Badan Pengurus Jemaat <b><?= ucwords($data['grja_from']);?></b> dan pendeta GJRP selaku Ketua Majelis Jemaat, <?= ucwords($data['grja_from']);?>
    Klasis <?= $data['id_kls'];?> menerangkan bahwa :<br/><br/>
    <table style="width: 100%;">
  <tr>
    <th style="width: 200px; text-align:center">Nama Lengkap</th>
    <th style="width: 200px; text-align:center">Nama Baptis</th>
    <th style="width: 120px; text-align:center">Tgl Lahir</th>
    <th style="width: 120px; text-align:center">Tgl Baptis</th>
    <th style="width: 50px; text-align:center">P/W</th>
  </tr>
  <?php
  $no = 1;
  $arr_data = $get_data->getmtsdatadtl($docid);
	if ($arr_data)
		foreach ( $arr_data as $r ) {?>
  <tr>
    <td style="padding-left:5px"><?= ucwords($r['nm_lengkap']);?></td>
    <td style="padding-left:5px"><?= ucwords($r['nm_baptis']);?></td>
    <td style="text-align:center"><?= to_date_ID($r['tgl_lhr']);?></td>
    <td style="text-align:center"><?= to_date_ID($r['tgl_baptis']);?></td>
    <td style="text-align:center"><?= $r['gender'];?></td>
  </tr>
  <?php }?>
</table>
<br/><br/>
Keluarga tersebut adalah anggota Jemaat :    <strong><?= ucwords($data['grja_from']);?>, Klasis : <?= ucwords($data['grja_kls_from']);?></strong> , dan selama ini tinggal di <?= ucwords($data['addrs_jmt']);?>
<br/><br/>
    Keanggotaannya dalam Gereja adalah: <strong><?= ucwords($data['attd_jmt']);?>.</strong><br/><br/>
    Diberikan surat Keterangan Anggota Jemaat ini kepada yang bersangkutan, karena mereka pindah ke :<br/>
    <strong><?= ucwords($data['grja_dstn']);?>, Klasis : <?= $data['gcd_dstn'];?></strong>
</p>
<p align="right">
    <strong>Landikma, <b><?= to_date_ID($data['tgl']);?></b></strong>
</p>
<br/>
<br/>
<p align="center">
    Badan Pengurus Jemaat
</p>
<p>
    <strong style="margin-left:100px">
        Ketua Jemaat, </strong><?= ucwords(tambah_spasi($data['ketua_jmt'], 100));?>
    <strong style="margin-left:50px">
    	Sekretaris Jemaat, </strong> <?= ucwords(tambah_spasi($data['sekre_jmt'], 100));?>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>Mengetahui:</strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>Pendeta GJRP Klasis, <?= ucwords($data['gjrp_kls']);?></strong>
</p>
<p>
    <strong> </strong>
</p>
<p>
    <strong> </strong>
</p>
<p align="center">
    <strong>Pdt :  <?= ucwords($data['pdt_ketua']);?></strong>
</p>
<p align="center">
    <strong>Selaku Ketua Majelis</strong>
</p>
</page>
