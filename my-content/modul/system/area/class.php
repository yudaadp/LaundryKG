<?php
class Area {
	function show() {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM mywebs_area WHERE 1=1 ORDER BY id" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>