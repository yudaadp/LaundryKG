<?php
class Menu {
    private $sql;
			
	public function showmenu() {
		global $mysqli;
		$this->sql = "SELECT * FROM mywebs_menu WHERE menuID != 21 && 1=1 ORDER BY menu";
		$exec = $mysqli->query ($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;

		$exec->free_result();
		return $data;
	}
	public function edit($id) {
		global $mysqli;
		$this->sql = "SELECT * FROM mywebs_menu WHERE menuID=$id";
		$exec = $mysqli->query ($this->sql);

		return $data[] = $exec->fetch_array();
	}
	public function mywebs_menu_add($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

	    $this->sql = "INSERT INTO mywebs_menu SET menu='$mn_name', url='$mn_url', class='$mn_icon', aktif='Y', set_order=$mn_order";
        return $this->sql;
    }
    public function mywebs_retval_add() {
        $this->sql = "SELECT *, 200 as retval FROM mywebs_menu ORDER BY menuID DESC LIMIT 1";
        return $this->sql;
    }
    public function mywebs_menu_update($data) {
        foreach ($data as $param => $val) {
            ${$param} = check($val);
        }

        $this->sql = "UPDATE mywebs_menu SET menu='$mn_name', url='$mn_url', class='$mn_icon', aktif='$mn_sts', set_order=$mn_order WHERE menuID=$pid";
        return $this->sql;
    }
    public function mywebs_retval_update($pid) {
        $this->sql = "SELECT *, 200 as retval FROM mywebs_menu WHERE menuID=$pid";
        return $this->sql;
    }
}
?>