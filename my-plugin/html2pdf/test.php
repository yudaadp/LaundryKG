<?php

ob_start();
include(dirname(__FILE__).'/test.html');
$isi = ob_get_clean();

require_once(dirname(__FILE__).'/html2pdf.class.php');
try{
 $html2pdf = new HTML2PDF('P','A4','en');
 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
 $html2pdf->Output('cover.pdf');
}
catch(HTML2PDF_exception $e){
 echo $e;
 exit;
}

?>