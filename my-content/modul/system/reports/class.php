<?php
class RPT {
	function show() {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM mywebs_reports  WHERE 1=1 ORDER BY rpt_name" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>