<?php
class Store extends my_db_connect {
	function show() {
		$sql = $this->connect()->query ( "SELECT * FROM mywebs_stores" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	
	function edit($id) {
		$sql = $this->connect()->query ( "SELECT * FROM mywebs_stores WHERE id=$id");
		return $data[] = $sql->fetch_array();
	}
}
?>