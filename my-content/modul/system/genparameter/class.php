<?php
class Genparam {
    private $sql;

	public function show() {
		global $mysqli;
		$this->sql = "SELECT * FROM mywebs_genparameter ORDER BY code";
		$exec = $mysqli->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;

		$exec->free_result();
		return $data;
	}
	public function edit($id) {
		global $mysqli;
		$this->sql = "SELECT * FROM mywebs_genparameter WHERE id=$id";
		$exec = $mysqli->query ($this->sql);
		return $data[] = $exec->fetch_array();
	}
    public function mywebs_genparam_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "INSERT INTO mywebs_genparameter (`code`, `p_desc`, `createdate`, `createby`) VALUES ('$md_code', '$md_desc', NOW(),'$_SESSION[mywebs_uid]')";
        return $this->sql;
    }
    public function mywebs_genparam_update($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "UPDATE mywebs_genparameter SET `code`='$md_code', `p_desc`='$md_desc' WHERE id=$pid";
        return $this->sql;
    }
}