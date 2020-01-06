<?php
class mod_updates extends my_db_connect {

  private $sql;

  public function show() {
    $this->sql = "SELECT mu.*, m.mod_name FROM mywebs_mod_update mu INNER JOIN mywebs_modul m ON mu.`refid`=m.`id`, (SELECT MAX(id) AS id FROM mywebs_mod_update GROUP BY refid) mod_manag WHERE mod_manag.id=mu.`id` ORDER BY id DESC";
    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_array()) {
      $data [] = $arr_data;
    }

    $exec->free_result();
    return $data;
  }

  public function show_modmanaged() {

    $this->sql = "SELECT * FROM mywebs_modul WHERE sts='Y' && create_by='$_SESSION[mywebs_uid]' ORDER BY mod_name";
    $exec = $this->connect()->query($this->sql);

    while ($r = $exec->fetch_array()) {
        $mn .= "<option value=$r[id]>" . ucwords($r ['mod_name'] . ' (' . $r ['mod_detail'] . ')') . "</option>";
    }
    return $mn;
  }

  public function reArrayFiles($file) {
    $file_ary   = [];
    $file_count = count($file['name']);
    $file_key   = array_keys($file);

    for ($i = 0; $i < $file_count; $i++) {
      foreach ($file_key as $val) {
        $file_ary[$i][$val] = $file[$val][$i];
      }
    }
    return $file_ary;
  }

  public function upload_files($mod, $data, $note) {
    $this->sql = "INSERT INTO mywebs_mod_update SET refid='$mod', upd_files='$data', upd_note='$note', last_update=NOW(), last_updateby='$_SESSION[mywebs_uid]'";
    return $this->sql;
  }
}
?>