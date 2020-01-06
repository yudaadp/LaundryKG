<?php
class suppliers extends my_db_connect {
	private $sql;

	public function show() {

		$this->sql = "SELECT * FROM mywebs_suppliers ORDER BY sup_nm";
		
		$exec = $this->connect()->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;

		$exec->free_result();
		return $data;
	}
	public function edit($id) {

        $this->sql = "SELECT * FROM mywebs_suppliers WHERE id=$id";

        $exec = $this->connect()->query ($this->sql);
        $arr_data = $exec->fetch_array();
        $data [] = $arr_data;

        $exec->free_result();
        return $data;
    }
	public function mywebs_query_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "INSERT INTO mywebs_suppliers (sup_nm, sup_desc, addrs, email, mob_no_1, mob_no_2, createdate, createby) VALUE ('$sup_nm','$sup_desc', '$addrs','$email','$phone','$mobile', NOW(), '$_SESSION[mywebs_uid]')";
        return $this->sql;
    }
	public function mywebs_retval($pid) {
        $param = "createby='$_SESSION[mywebs_uid]' && 1=1 ORDER BY id DESC LIMIT 1";

	    if($pid) {
            $param = "id=$pid";
        }

        $this->sql = "SELECT *, 200 as retval FROM mywebs_suppliers WHERE $param";
	    return $this->sql;
    }
    public function mywebs_query_update($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "UPDATE mywebs_suppliers SET sup_nm='$sup_nm', sup_desc='$sup_desc', addrs='$addrs', email='$email', mob_no_1='$phone', mob_no_2='$mobile', last_update = NOW(), updateby='$_SESSION[mywebs_uid]' WHERE id=$pid";
        return $this->sql;
    }
}
?>