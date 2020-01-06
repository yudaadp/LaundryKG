<?php
class Cash extends my_db_connect {
	
	private $param;
	private $sql;
	
	public function show() {
		
		$this->param = "cr.`csh_open_dt` >= SUBDATE(NOW(), 7) && cr.store_id=$_SESSION[mywebs_store] && 1=1";
		
		if (check_role_store ()) {
			$this->param = "cr.`csh_open_dt` >= SUBDATE(NOW(), 7) && 1=1";
		}
		$sql = "SELECT st.store_cd, st.store_nm, cr.* 
					FROM mywebs_cash_register cr 
						INNER JOIN mywebs_stores st ON cr.`store_id`=st.`id`
					WHERE $this->param
				GROUP BY cr.`id`
				ORDER BY cr.id DESC";
		
		$sql = $this->connect()->query ( $sql );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	public function getstore_id() {
		
		$store = $_SESSION ['mywebs_store'];
		
		if (check_role_store ()) {
			$sql = "SELECT store_id FROM mywebs_users WHERE uid='$_SESSION[mywebs_uid]'";
			$exec = $this->connect()->query ( $sql );
			$res = $exec->fetch_array ();
			$exec->free_result();
			$store = $res ['store_id'];
		}
		
		return $store;
	}
	public function mywebs_query_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }
        $store_id = $this->getstore_id();
        $this->sql = "CALL create_handcash($store_id, $create_cash, '$_SESSION[mywebs_uid]')";
        return $this->sql;
    }
    public function mywebs_retval() {
        $store_id = $this->getstore_id();
        $this->sql = "SELECT st.store_nm, cr.*, 200 as retval FROM mywebs_cash_register cr INNER JOIN mywebs_stores st ON cr.`store_id`=st.`id` INNER JOIN mywebs_users u ON st.`id`=u.`store_id` WHERE cr.store_id=$store_id ORDER BY id DESC LIMIT 1";
        return $this->sql;
	}
}
?>