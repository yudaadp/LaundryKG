<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
$footer = "$rpt &copy; 2016 ADIMA " . $set->nama_toko;
include ("../../my-plugin/pdf/mpdf.php");
$mpdf = new mPDF ( 'utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '' );
$mpdf->WriteHTML ( $style, 1 );
$mpdf->useOnlyCoreFonts = true; // false is default
$mpdf->SetTitle ( $footer );
$mpdf->showWatermarkText = true;
$mpdf->SetAuthor ( 'MYWEBS' );
$mpdf->SetCreator ( 'MYWEBS ENGINE' );
$mpdf->AddPage ( 'P' );
$mpdf->WriteHTML ( $pdf, 2 );
$mpdf->Output ( "$rpt.pdf", 'I' );
?>