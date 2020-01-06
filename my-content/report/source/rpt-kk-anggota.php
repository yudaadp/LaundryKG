<?php
if (!defined('MYWEBS')) exit ('Now Allowed');
define('PAPER_MARGIN', FALSE);

$sql = "SELECT kk.alt_cd, no_kk_pre, no_kk, alamat_kk, kk.kota, kk.kec, kk.kel, id_kls, g.alt_cd AS kd_grja, nm_grja, addrs FROM mywebs_kk kk INNER JOIN mywebs_gereja g
ON kk.`gcd`=g.`alt_cd` WHERE kk.`alt_cd`='$p1'";

$r = $mysqli->query($sql)->fetch_array();
?>
<table border="0" width="100%">
  <tr>
    <td width="610"><h3>Daftar Anggota Keluarga</h3></td>
    <td><h4><?= $r['no_kk_pre'].$r['no_kk'];?></h4></td>
  </tr>
  <tr>
    <td><span style="text-transform:capitalize; font-size:18px; padding: 0 0 2px -5px; margin-left:-5px; font-weight:bold">
		<?= $r['nm_grja'];?></span>
   </td>
    <td rowspan="2"><?= $r['alamat_kk'];?></td>
  </tr>
  <tr>
    <td><span style="font-size:12px"><?= $r['addrs'];?></span></td>
  </tr>
</table>
<br/>
<hr/>
<br/>
<?php
$sql = "SELECT 
  refcode,
  no_urut,
  pic,
  nm_lengkap,
  nm_baptis,
  tgl_lhr,
  t_lhr,
  no_hp,
  gender,
  occ.p2 AS profesi,
  CASE
    hub_keluarga 
    WHEN 1 
    THEN 'Kepala Keluarga' 
    WHEN 2 
    THEN 'Istri' 
    WHEN 3 
    THEN 'Anak' 
  END AS hub_keluarga,
  suku,
  gol_drh,
  edu.p2 AS edu_info 
FROM
  mywebs_kk_dtl kkd 
  INNER JOIN 
    (SELECT 
      p1,
      p2 
    FROM
      mywebs_genparameter_dtl 
    WHERE group_cd = 'EDU_CD') edu 
    ON kkd.`edu_cd` = edu.`p1` 
  LEFT JOIN 
    (SELECT 
      p1,
      p2 
    FROM
      mywebs_genparameter_dtl 
    WHERE group_cd = 'OCC_CD') occ 
    ON kkd.profesi = occ.p1
   WHERE kkd.refcode='$p1'";

$data = $mysqli->query($sql);

while($rpt = $data->fetch_array()) {?>
<table border="0" width="100%">
  <tr>
    <td width="17%" rowspan="8"><img src="../../my-content/images/photo/umat/<?= $rpt['pic'];?>" width="180" height="190"/></td>
    <td width="10%">No Urut</td>
    <td width="1%">:</td>
    <td width="150"><?= $rpt['no_urut'];?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Nama Baptis</td>
    <td>:</td>
    <td><?= ucwords($rpt['nm_baptis']);?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?= ucwords($rpt['nm_lengkap']);?></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>Hub. Keluarga</td>
    <td>:</td>
    <td><?= $rpt['hub_keluarga'];?></td>
    <td width="12%">Jenis Kelamin</td>
    <td width="1%">:</td>
    <td width="23%"><?= $rpt['gender'];?></td>
  </tr>
  <tr>
    <td>Suku</td>
    <td>:</td>
    <td><?= $rpt['suku'];?></td>
    <td>Gol. Darah</td>
    <td>:</td>
    <td><?= ucwords($rpt['gol_drh']);?></td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td><?= $rpt['t_lhr'];?></td>
    <td>Tgl Lahir</td>
    <td>:</td>
    <td><?= $rpt['tgl_lhr'];?></td>
  </tr>
  <tr>
    <td>Pekerjaan</td>
    <td>:</td>
    <td>&nbsp;</td>
    <td>Profresi</td>
    <td>:</td>
    <td><?=$rpt['profesi'];?></td>
  </tr>
  <tr>
    <td>Pendidikan</td>
    <td>:</td>
    <td><?= $rpt['edu_info'];?></td>
    <td>Handphone</td>
    <td>:</td>
    <td><?= $rpt['no_hp'];?></td>
  </tr>
</table>
<hr/>
<?php
}
?>