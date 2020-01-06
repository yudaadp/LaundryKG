<?php
if (!defined('MYWEBS')) exit ('Now Allowed');
define('PAPER_MARGIN', TRUE);

$sql = "SELECT 
  id_kls, kd_grja, nm_grja, kk.cnt_kk, COUNT(
    CASE
      gender 
      WHEN 'P' 
      THEN 1 
    END) AS 'p', COUNT(
    CASE
      gender 
      WHEN 'W' 
      THEN 1 
    END) AS 'w' 
FROM
  mywebs_gereja g 
  LEFT JOIN mywebs_kk_dtl 
    ON alt_cd = gcd, 
  (SELECT 
    gcd, COUNT('x') AS cnt_kk 
  FROM
    mywebs_kk 
  GROUP BY gcd) AS kk 
WHERE kk.`gcd` = g.`alt_cd` 
GROUP BY id_kls, kd_grja, nm_grja, kk.`gcd`";
	?>
<style>
table, td, th {
    border: 1px solid black;
	height:20px;
}

table {
    border-collapse: collapse;
    width: 900px;
	padding: 2mm;
}

hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 
</style>

   <page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm"> 
        <page_header> 
        </page_header> 
        <page_footer> 
        </page_footer>
        <p align="center">
    		<strong style="font-size:20px"> LAPORAN JUMLAH JEMAAT/UMAT</strong>
		</p>
        <hr />
        <br/>
        <table style="width: 100%;">
        <tr>
        <th style="width: 85px; text-align:center">Kelasis</th>
        <th style="width: 95px; text-align:center">ID</th>
        <th style="width: 250px; text-align:center">Nama Gereja</th>
        <th style="width: 60px; text-align:center">KK</th>
        <th style="width: 60px; text-align:center">Pria</th>
        <th style="width: 60px; text-align:center">Wanita</th>
        <th style="width: 70px; text-align:center">Total</th>
        </tr>
<?php
$no = 1;
$stmt = $mysqli->query($sql);
	while($d = $stmt->fetch_array()) {?>
       <tr>
        <td align="center"><?= $d['id_kls'];?></td>
        <td align="center"><?= $d['kd_grja'];?></td>
        <td><?= $d['nm_grja'];?></td>
        <td align="center"><?= $d['cnt_kk'];?></td>
        <td align="center"><?= $d['p'];?></td>
        <td align="center"><?= $d['w'];?></td>
        <td align="center"><?= $d['p'] + $d['w'];?></td>
       </tr>
   <?php
	}
echo '</table>';
echo '</page>';
?>