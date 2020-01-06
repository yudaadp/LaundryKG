<?php
class Favmenus extends my_db_connect {
    private $sql;

	public function show_fav() {
	    $this->sql = "SELECT f.id, m.mod FROM mywebs_favmenus f INNER JOIN
									mywebs_modul m ON f.mn_id=m.id
									WHERE f.userid='$_SESSION[mywebs_uid]'";
		$exec = $this->connect()->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	public function show_mods() {
	    $this->sql = "SELECT mods.id, mods.mod, p.bit_name
									FROM mywebs_modul mods, mywebs_permission_group pg 
										LEFT JOIN mywebs_permission p ON pg.role & p.bit
										INNER JOIN mywebs_modul_role mr ON pg.groupid=mr.gid
 								WHERE mr.lid = '$_SESSION[mywebs_lvl]' && mods.`id`=mr.`mid` && p.bit_name='view'
 									&& mods.id NOT IN (SELECT mn_id FROM mywebs_favmenus WHERE userid='$_SESSION[mywebs_uid]')
 									&& mods.mod_type='P' && mods.`sts`='Y'
 								ORDER BY mods.`mod`";
		$exec = $this->connect()->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
    public function mywebs_query_add($p1) {
        $this->sql = "INSERT INTO mywebs_favmenus SET mn_id='$p1', createdate=NOW(), userid='$_SESSION[mywebs_uid]'";
        return $this->sql;
    }
    public function mywebs_query_del($pid) {
	    $this->sql = "DELETE FROM mywebs_favmenus WHERE id=$pid && userid='$_SESSION[mywebs_uid]'";
	    return $this->sql;
    }
}
?>