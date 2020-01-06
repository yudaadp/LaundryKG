<?php
class Laporan {
	function show() {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT rpt.* FROM mywebs_reports rpt INNER JOIN mywebs_report_roles rr
ON rpt.id=rr.rpt WHERE rptType='R' AND rr.lid='$_SESSION[mywebs_lvl]'" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}

class RPT {
	function kk() {
		global $mysqli;
		$sql = $mysqli->query ("SELECT * FROM mywebs_kk WHERE gcd='$_SESSION[mywebs_gcd]'");
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>