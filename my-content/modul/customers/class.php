<?php
class customers extends my_db_connect {
  private $sql;

	function show() {
		$sql = $this->connect()->query ( "SELECT * FROM mywebs_customers" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	
	function edit($id) {
		$sql = $this->connect()->query ( "SELECT * FROM mywebs_customers WHERE id=$id");
		return $data[] = $sql->fetch_array();
	}

	public function create_store($data){
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
	  $this->sql = "INSERT INTO mywebs_customers (cust_name, addrs, tlp, createby, createdate) VALUE ('$str_nm','$addrs','$tlp', '$_SESSION[mywebs_uid]', NOW())";
    return $this->sql;
  }
  public function edit_store($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
	  $this->sql = "UPDATE mywebs_customers SET cust_name='$str_nm', addrs='$addrs', tlp='$tlp', last_update=NOW(), last_updateby='$_SESSION[mywebs_uid]' WHERE id=$id";
	  return $this->sql;
  }
  public function retval($id='') {
	  $param = "s.createby='$_SESSION[mywebs_uid]'";

	  if($id) {
	    $param = "s.id=$id";
    }
	  $this->sql = "SELECT s.*, 200 AS retval FROM mywebs_customers s WHERE $param ORDER BY id DESC LIMIT 1";
	  return $this->sql;
  }
}
?>