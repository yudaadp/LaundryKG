<?php
class Users {
	function show() {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM userslist" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>