<?php
class Genparamlists {
	public function get_paramlists($id) {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT p1.code, p2.* 
									FROM mywebs_genparameter p1 
									INNER JOIN mywebs_genparameter_dtl p2 ON p1.`code`=p2.`group_cd` 
								WHERE p1.`code`='$id'" );
		while ( $arr_data = $sql->fetch_array () )
			$data [] = $arr_data;
		return $data;
	}
	
	public function edit($id) {
		global $mysqli;
		$sql = $mysqli->query ( "SELECT * FROM mywebs_genparameter_dtl WHERE id=$id" );
		return $data[] = $sql->fetch_array ();
	}
    public function mywebs_genparam_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "INSERT INTO mywebs_genparameter_dtl (`group_cd`, `p1`, `p2`, `p3`, `createdate`, `createby`) VALUES ('$code', '$p1', '$p2', '$p3', NOW(), '$_SESSION[mywebs_uid]')";
        return $this->sql;
    }
    public function mywebs_genparam_update($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "UPDATE mywebs_genparameter_dtl SET `p1`='$p1', `p2`='$p2', `p3`='$p3' WHERE id=$pid";
        return $this->sql;
    }
}
?>