<?php
if (!defined('MYWEBS')) exit ('Now Allowed');
define('PAPER_MARGIN', TRUE);

$sql = "SELECT 
  umt.umt_cd,
  umt.nm_lengkap,
  umt.tgl_lhr,
  umt.gol_drh,
  umt.t_lhr,
  kk.prov,
  kk.kota,
  kk.kec,
  kk.kel,
  kk.kd_pos,
  kk.alamat_kk,
  CASE
    gender 
    WHEN 'P' 
    THEN 'PRIA' 
    ELSE 'WANITA' 
  END AS gender,
  umt.pic AS photo,
  g.nm_grja 
FROM
  mywebs_kk_dtl umt
  INNER JOIN mywebs_kk kk
  ON umt.refcode=kk.alt_cd 
  INNER JOIN mywebs_gereja g 
    ON umt.gcd = g.alt_cd
WHERE umt.gcd='$_SESSION[mywebs_gcd]' AND CAST(umt.craetedate AS DATE) >= '$p1' AND CAST(umt.craetedate AS DATE) <= '$p2'";
	?>
<style type="text/css">
.circle1 {
width: 350px;
height: 225px;
border: 1px thin;
border-radius: 50%;
}

.line1 {cursive;font-size:20px;color:#000;margin:5px;font-weight:bold; text-align:center}
.line2 {font-size:14px;color:#000;margin:-5px 0 0 5px;font-weight:bold; text-align:center}

.circle2 {
width: 350px;
height: 225px;
margin-left:15px;
border: 1px thin;
border-radius: 50%;
}
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.5px;
} 
</style>
   <page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
        <page_header> 
        </page_header> 
        <page_footer> 
        </page_footer>
        <table>
		<tbody>
        	<tr>
<?php
$no = 1;
$stmt = $mysqli->query($sql);
	while($d = $stmt->fetch_array()) {
		$no > 2 ? $no =1 : $no;
		$no > 1 ? $html='</tr><tr>' : $html='';
	?>
	<td>
    <div class="circle<?=$no;?>">
    <p class="line1">Kartu Anggota</p>
    <p class="line2"><?= ucwords($d['nm_grja']);?></p>
    <hr>
    <table border="0" width="100%">
  <tr>
    <td>No</td>
    <td>:</td>
    <td colspan="2"><?= $d['umt_cd'];?></td>
  </tr>
    <tr>
    <td>Nama</td>
    <td>:</td>
    <td colspan="2"><?= ucwords($d['nm_lengkap']);?></td>
  </tr>
    <tr>
    <td>TTL</td>
    <td>:</td>
    <td><?= ucwords($d['t_lhr']).', '.$d['tgl_lhr'];?></td>
	<td><strong>Gol. Darah :</strong> <?= ucwords($d['gol_drh']);?></td>
  </tr>
    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td colspan="2"><?= ucwords($d['alamat_kk']);?></td>
  </tr>
    <tr>
    <td>Kec</td>
    <td>:</td>
    <td colspan="2"><?= $d['kec'];?></td>
  </tr>
    <tr>
    <td>Kel</td>
    <td>:</td>
    <td colspan="2"><?= $d['kel'];?></td>
  </tr>
  <tr>
    <td>Kota</td>
    <td>:</td>
    <td colspan="2"><?=$d['kota'];?></td>
  </tr>
</table>
</div>
</td>
<?php
echo $html;
$no++;
}
echo '</tr></tbody></table>';
echo '</page>';
?>