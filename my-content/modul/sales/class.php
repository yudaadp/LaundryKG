<?php
class Sale {
	function show() {
		global $mysqli;
		
		$sql = $mysqli->query ( "SELECT * FROM mywebs_trx" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>