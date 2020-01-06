<?php

class products extends my_db_connect {
  private $sql;

  function show() {
    $sql = $this->connect()->query("SELECT * FROM mywebs_products ORDER BY prod_nm");
    while ($arr_data = $sql->fetch_array())
      $data [] = $arr_data;

    return $data;
  }

  function edit($id) {
    $sql = $this->connect()->query("SELECT * FROM mywebs_products WHERE id=$id");

    return $data[] = $sql->fetch_array();
  }

  public function create($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
    $this->sql = "INSERT INTO mywebs_products SET prod_nm='$prod_nm', price=$price, satuan='$prod_satuan', createby='$_SESSION[mywebs_uid]', createdate=NOW()";

    return $this->sql;
  }

  public function update($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
    $price     = str_replace(',', '', $price);
    $this->sql = "UPDATE mywebs_products SET prod_nm='$prod_nm', price=$price WHERE id=$id";

    return $this->sql;
  }

  public function retval($id = '') {
    $param = "createby='$_SESSION[mywebs_uid]'";

    if ($id) {
      $param = "id=$id";
    }
    $this->sql = "SELECT *, 200 as retval FROM mywebs_products WHERE $param ORDER BY id DESC LIMIT 1";

    return $this->sql;
  }
}

?>