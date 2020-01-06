<?php
class Logs extends my_db_connect {
    private $sql;

	public function show() {
	    $this->sql = "SELECT * FROM mywebs_logs_cnf";
		$exec = $this->connect()->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;
		$exec->free_result();
		return $data;
	}
	public function showmods() {
	    $this->sql = "SELECT id, `mod`, mod_name FROM mywebs_modul 
				WHERE mod_name NOT IN (SELECT `mod` FROM mywebs_logs_cnf) && sts='Y' ORDER BY `mod`";
        $exec = $this->connect()->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;
        $exec->free_result();
		return $data;
	}
	public function mywebs_query_add($p1) {
        $this->sql = "INSERT INTO mywebs_logs_cnf SET `mod`='$p1',  createby='$_SESSION[mywebs_uid]', createdate=NOW()";
        return $this->sql;
    }
    public function mywebs_query_del($pid) {
	    $this->sql = "DELETE FROM mywebs_logs_cnf WHERE id=$pid";
	    return $this->sql;
    }
    public function mywebs_retval() {
        $this->sql = "SELECT *, 200 as retval FROM mywebs_logs_cnf ORDER BY id DESC LIMIT 1";
        return $this->sql;
    }
}
?>