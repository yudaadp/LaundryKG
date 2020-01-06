<?php

class users extends my_db_connect {

  private $sql;
  private $param;

  private function params() {
    //$this->param = "store_id=$_SESSION[mywebs_store]";

    if(check_role_store()) {
      $this->param = '1=1';
    }

    return $this->param;
  }

  public function show() {
    $this->param = $this->params();
    $this->sql = "SELECT * FROM userslist";
    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_array()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function edit($id) {
    $this->param = $this->params();
    $this->sql = "SELECT * FROM userslist WHERE uid='$id'";
    $exec      = $this->connect()->query($this->sql);
    $data[]    = $exec->fetch_array();
    $exec->free_result();
    return $data;
  }

  public function mywebs_query_add($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }

    $this->sql = "CALL create_users ('$uid','6', '$md_level','" . md5($md_pass) . "','$md_name','$address','$md_mail','$_SESSION[mywebs_uid]', @retval)";
    return $this->sql;
  }

  public function mywebs_query_edit($data) {
    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }

    $this->sql = "CALL edit_users ('$uid', '$md_level', '6', '$md_sts','$md_name','$address','$md_mail','$_SESSION[mywebs_uid]', @retval)";
    return $this->sql;
  }

  public function mywebs_retval($event, $uid) {
    $param = "uid='$uid' && 1=1";

    if ($event == 'users/create') {
      $param = "create_by='$_SESSION[mywebs_uid]' ORDER BY create_date DESC LIMIT 1";
    }

    $this->sql = "SELECT *, 200 as retval FROM userslist WHERE $param";
    return $this->sql;
  }

  public function mywebs_delete($uid) {
    $this->sql = "CALL kill_session ('$uid', '$_SESSION[mywebs_uid]', @retval)";
    return $this->sql;
  }

  public function mywebs_change_pass($uid, $newpass) {
    $this->sql = "CALL change_pass ('$uid','$newpass','$_SESSION[mywebs_uid]', @retval)";
    return $this->sql;
  }

  public function mywebs_change_pic($uid, $file) {
    $this->sql = "CALL change_pic ('$uid','$file','$_SESSION[mywebs_uid]', @retval)";
    return $this->sql;
  }
}

?>