<?php
class RPT {
	function show($p1 = '') {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT r.*, rr.lid FROM mywebs_reports r INNER JOIN mywebs_report_roles rr ON r.id=rr.rpt WHERE r.rpt_sts='Y' && rr.lid='$p1'" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	function show_rpt($p1 = '') {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT 
                  id,
                  rpt_name 
                FROM
                  mywebs_reports 
                WHERE id NOT IN 
                  (SELECT 
                    rpt 
                  FROM
                    mywebs_report_roles 
                  WHERE lid = '$p1') && rpt_sts = 'Y' " );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>