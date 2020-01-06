<?php

class printer extends my_db_connect {

  private $sql;

  public function showprinter() {
    $this->sql = "SELECT * FROM mywebs_printer";
    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_array()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function edit($id) {
    $this->sql = "SELECT * FROM mywebs_printer WHERE id=$id";
    $exec      = $this->connect()->query($this->sql);

    return $data[] = $exec->fetch_array();
  }

  public function mywebs_create($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }

    $this->sql = "INSERT INTO mywebs_printer SET printer_name='$printer_nm', type='$printer_type', profile='$printer_profile', max_char_line='$max_char', printer_path='$path', ip_addrs='$ip', port='$port'";
    return $this->sql;
  }

  public function mywebs_retval($id) {
    $param = '1=1';
      if($id) {
        $param = "id=$id";
      }
    $this->sql = "SELECT *, 200 as retval FROM mywebs_printer WHERE $param ORDER BY id DESC LIMIT 1";
    return $this->sql;
  }

  public function mywebs_update($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }

    $this->sql = "UPDATE mywebs_printer SET printer_name='$printer_nm', type='$printer_type', profile='$printer_profile', max_char_line='$max_char', printer_path='$path', ip_addrs='$ip', port='$port' WHERE id=$id";
    return $this->sql;
  }
}

?>