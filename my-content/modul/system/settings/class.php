<?php
class settings extends my_db_connect {
  private $sql;
  private $param;

  private function sql_show() {
    $this->sql = "SELECT p.printer_name, s.* FROM mywebs_printer p INNER JOIN mywebs_settings s ON p.id=s.printer_id";
    return $this->sql;
  }
	public function show() {
		$this->sql = $this->sql_show();
    $this->param = ' ORDER BY s.setting_desc';
		$this->sql .= $this->param;
    $exec = $this->connect()->query($this->sql);
		while ( $arr_data = $exec->fetch_array () )
			$data [] = $arr_data;

		$exec->free_result();
		return $data;
	}
  public function edit($id) {
    $this->sql = $this->sql_show();
    $this->param = " WHERE s.setting_id=$id";
    $this->sql .= $this->param;
    $exec = $this->connect()->query($this->sql);

    return $data[] = $exec->fetch_array();
  }
  public function printerlist() {
    $this->sql = "SELECT * FROM mywebs_printer";
    $exec = $this->connect()->query($this->sql);
    while($arr_data = $exec->fetch_array()) {
      $data[] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }
  public function save($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
    //$mail_pwd = md5($mail_pwd);
    $this->sql = "UPDATE mywebs_settings SET setting_desc='$setting_desc', site_nm='$site_nm', base_url='$base_url', currency_cd='$curr_cd', rows_per_page='$limit_page', printer_id='$printer', mail_name='$mail_nm', mail_pwd='$mail_pwd', mail_port='$mail_port', mail_host='$mail_host' WHERE setting_id=$id";
    return $this->sql;

  }
  public function retval($id) {
    $this->sql = "SELECT *, 200 as retval FROM mywebs_settings WHERE setting_id=$id";
    return $this->sql;
  }
}
?>