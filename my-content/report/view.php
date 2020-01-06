<?php
define ( 'MYWEBS', true );
ob_start();
include '../../my-config/connect.php';
include '../../my-config/config.php';

@$rpt = check (dec_mywebs_char( $_POST ['rpt_name'] ));
@$p1 = check ( $_POST ['p1'] );
@$p2 = check ( $_POST ['p2'] );
@$p3 = check ( $_POST ['p3'] );
@$token = $_POST ['sid'];

if (isset ( $_SESSION ['mywebs_lvl'] )) {
	if (md5(SALT.$sid) == $token) {
		if (NULL !== cekRpt ($rpt, $_SESSION['mywebs_lvl'])) {
			
			if (! empty ( $rpt )) {
				$sql = "SELECT rpt.* FROM mywebs_reports rpt INNER JOIN mywebs_report_roles rr
ON rpt.id=rr.rpt WHERE rpt.rpt_fn='$rpt' && rr.lid='$_SESSION[mywebs_lvl]'";

				$rpt = $mysqli->query ($sql)->fetch_object ();
				if (! file_exists ( "$rpt->rpt_path" )) {
					echo 'Not found, contact your administrator';
				} else {
					
					include (dirname(__FILE__).'/'.$rpt->rpt_path.'/'.$rpt->rpt_fn.$EXT);
					$isi = ob_get_clean();

					require_once(dirname(__FILE__).'/../../my-plugin/html2pdf/html2pdf.class.php');
					try{
						if (PAPER_MARGIN) {
							$html2pdf = new HTML2PDF($rpt->ppr_orts,$rpt->paper,'en', false, 'ISO-8859-15', array($rpt->ml, $rpt->mt, $rpt->mr, $rpt->mb)); 
						} else {
							$html2pdf = new HTML2PDF('P','A4','en');
						}
						//$html2pdf->setTestTdInOnePage(false);
 						$html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
 						$html2pdf->Output($rpt->rpt_fn.'.pdf');
					}
					catch(HTML2PDF_exception $e){
 						echo $e;
 						exit;
					}
				}
			}
		} else {
			echo genparam ( 'HTTP_CODE', '401' );
		} // en cek akses rpt
	} else {
		echo genparam ( 'HTTP_CODE', '403' );
	};
}
?>