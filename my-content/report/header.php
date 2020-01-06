<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
//$style = file_get_contents ( '../../my-library/css/table_rpt.css' );
$pdf = '';
//$pdf .= '<font size="+5" style="text-align:center; font-weight:bold;">';
//$pdf .= $set->nama_toko;
//$pdf .= '</font><br />';
//$pdf .= $set->alamat . '<br/>' . $set->kota . '<br/>' . $set->tlp;
//$pdf .= '<hr size="4" color="#000000" />';
// echo $pdf;
//$pdf .= '<font size="4" style="text-align:center;">' . $report . '<br/> Periode : ';
//$pdf .= tgl_indo ( $start ) . ' - ' . tgl_indo ( $end ) . '</font><br/>';
//$pdf .= '<hr />';
//$pdf .= '<br/><br/>';
$pdf .= '<!--mpdf
			<htmlpagefooter name="myfooter">
			<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
			Page {PAGENO} of {nb}
			</div>
			</htmlpagefooter>

			<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
			<sethtmlpagefooter name="myfooter" value="on" />
			mpdf-->';
?>