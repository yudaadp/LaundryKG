<?php
class Mods {
	function showmods($p1 = '') {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT mn.menu, m.* FROM mywebs_modul m, mywebs_menu mn 
									WHERE mn_id=menuID AND mn_id !=21 AND 1 = 1 
								ORDER BY mod_name" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
}
?>