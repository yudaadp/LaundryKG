<?php
/*namespace Dgtl;*/

class synch extends my_db_connect {
  private $sql;
  private $where;

  public function synch_template ($param) {

    $this->where = '';

    if(!empty($param)) {
      $this->where = " WHERE temp_name NOT IN ($param)";
    }

    $this->sql = "SELECT * FROM mywebs_fake_template". $this->where;

    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_assoc()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function synch_store ($param) {
    $this->where = '';

    if(!empty($param)) {
      $this->where = " WHERE store_nm NOT IN ($param)";
    }

    $this->sql = "SELECT * FROM mywebs_fake_stores". $this->where;

    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_assoc()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function synch_items ($param) {
    $this->where = '';

    if(!empty($param)) {
      $this->where = " WHERE prod_nm NOT IN ($param)";
    }

    $this->sql = "SELECT * FROM mywebs_fake_product". $this->where;

    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_assoc()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function synch_sales ($param) {
    $this->where = '';

    if(!empty($param)) {
      $this->where = " WHERE inv_cd NOT IN ($param)";
    }

    $this->sql = "SELECT * FROM mywebs_fake_sales". $this->where;

    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_assoc()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function synch_sales_id_items ($param) {
    $this->where = '';

    if(!empty($param)) {
      $this->where = " WHERE refid NOT IN ($param)";
    }

    $this->sql = "SELECT * FROM mywebs_fake_sales_item". $this->where;

    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_assoc()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function goto_step($param) {
    $this->sql = "SELECT p2 FROM mywebs_genparameter_dtl WHERE group_cd='SYNCH_STEP' && p1='$param'";
    $exec = $this->connect()->query($this->sql);

    $data = $exec->fetch_array();

    return $data['p2'];
  }
}
?>