<?php
ob_start();
define ( 'MYWEBS', true );
include 'my-config/connect.php';
include 'my-config/config.php';

@$modname = $_GET ['refdoc'];
@$docid = check (dec_mywebs_char($_GET ['docid'] ));
@$token = $_GET ['sid'];

if (isset ( $_SESSION ['mywebs_lvl'] )) {
	if ($sid == $token) {

			if (! empty ( $modname )) {
				require_once ($DIR_PATH.$modname.'/class.php');
				include ($DIR_PATH.$modname.'/print.php');
				$isi = ob_get_clean();
				
				require_once(dirname(__FILE__).'/my-plugin/html2pdf/html2pdf.class.php');
					try{
 						$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15', array(mL, mT, mR, mB));
 						$html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
 						$html2pdf->Output($docid.'.pdf');
					}
					catch(HTML2PDF_exception $e){
 						echo $e;
 						exit;
					}
			}
	} else {
		echo 'Invalid token!';
	};
} else {
	echo genparam ( 'HTTP_CODE', '401' );
}
?>