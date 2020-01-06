<?php
class Role {
	function modlists($id) {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT mods.id AS `mid`, mods.`mod_name`, mods.`mod_detail`, pg.role, mr.lid
						FROM mywebs_modul mods, mywebs_permission_group pg 
							LEFT JOIN mywebs_permission ON pg.role & mywebs_permission.bit
							INNER JOIN mywebs_modul_role mr ON pg.groupid=mr.gid
						WHERE mods.`id`=mr.`mid` && mods.mn_id !=21 && mr.lid= '$id' && mods.`sts`='Y' 
						GROUP BY mods.id , mods.mod_name, mr.id 
					ORDER BY mods.mod_name" );
		while ( $arr_data = $sql->fetch_array () )
			$r [] = $arr_data;
		return $r;
	}
	function showrole($role = NULL, $mod, $no) {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM permission_group" );
		$data .= '<div class="form-group">';
		
		while ( $p = $sql->fetch_array () ) {
			
			if ($p ['role_desc'] == '') {
				$role_desc = 'Disabled Access';
			} else {
				$role_desc = $p ['role_desc'];
			}
			
			if ($role == $p ['role']) {
				$data .= '<label class="radio-inline">
                 <input type="radio" name="perm_group' . $no . '" class="opt_role" id="optionsRadios' . $no . '" value="' . $p ['groupid'] . '" checked>' . ucwords ( $role_desc ) . '
                 </label>';
			} else {
				$data .= '<label class="radio-inline">
                 <input type="radio" name="perm_group' . $no . '" class="opt_role" id="optionsRadios' . $no . '" value="' . $p ['groupid'] . '">' . ucwords ( $role_desc ) . '
                 </label>';
			}
		}
		$data .= '</div>';
		return $data;
	}
}
?>