<?php
class Level {
	public function showlevel() {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM mywebs_level WHERE 1=1" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
    public function mywebs_level_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "CALL create_level ('$md_name', '$md_desc', '$_SESSION[mywebs_uid]', @errno)";
        return $this->sql;
    }
    public function mywebs_retval_add() {
        $this->sql = "SELECT *, 200 as retval FROM mywebs_level WHERE create_by='$_SESSION[mywebs_uid]' ORDER BY id DESC LIMIT 1";
        return $this->sql;
    }
    public function mywebs_level_update($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "CALL upd_level ($pid, '$md_name', '$md_desc', '$_SESSION[mywebs_uid]', '$md_sts')";
        return $this->sql;
    }
    public function mywebs_retval_update($pid) {
        $this->sql = "SELECT *, 200 as retval FROM mywebs_level WHERE id=$pid";
        return $this->sql;
    }
}
?>