<?php

ob_start();
include(dirname(__FILE__).'/test.html');
$isi = ob_get_clean();

require_once('../../my-plugin/html2pdf/html2pdf.class.php');
try{
 $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15', array("mL", "mT", "mR", "mB")); 
 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
 $html2pdf->Output('cover.pdf');
}
catch(HTML2PDF_exception $e){
 echo $e;
 exit;
}

?>