<?php

class mywebs_ extends my_db_connect {

  private $sql;

  protected function getpagedesc() {
    return getmods_info(GET_MOD, 'PAGE');
  }

  public function get_menu() {
    return $this->sql = "SELECT menuID, menu, url, class FROM mywebs_menu WHERE aktif='Y' && 1=1 ORDER BY set_order";
  }

  public function get_submenu($menu) {
    $this->sql = "SELECT mods.`mod`, mods.`mod_name`, mods.`mod_detail`, mods.`mod_location`
					FROM mywebs_modul mods INNER JOIN mywebs_modul_role mr ON mods.`id`=mr.`mid`
 				WHERE mods.`mn_id`= $menu && mods.sts='Y' && mods.show='Y' && mr.`lid`=$_SESSION[mywebs_lvl] && mr.sts='0' 
 				ORDER BY mods.`set_order`";
    return $this->sql;
  }

  public function get_third_menu() {
    $this->sql = "SELECT GROUP_CONCAT(bit_name) AS act FROM mywebs_permission
								WHERE bit_name IN ('create','edit')";
    $exec      = $this->connect()->query($this->sql);
    $getObj    = $exec->fetch_object();
    $data      = explode(',', $getObj->act);
    $exec->free_result();
    return $data;
  }

  public function get_menu_right($q) {
    $this->sql = "SELECT mods.`mod`, mods.`mod_name`, mods.`mod_detail`, mods.`mod_location`
					FROM mywebs_modul mods INNER JOIN mywebs_modul_role mr ON mods.`id`=mr.`mid`
 				WHERE (mods.mod LIKE '%$q%' OR mods.mod_detail LIKE'%$q%') && mods.show='Y' && mr.`lid`=$_SESSION[mywebs_lvl] && mr.sts='0'
 				ORDER BY mods.`set_order`";
    $exec      = $this->connect()->query($this->sql);
    while ($r = $exec->fetch_array()) {
      $arr_data [] = $r;
    }

    $exec->free_result();
    return $arr_data;
  }

  public function get_myfav_menu() {
    $this->sql = "SELECT `mod`, mod_name FROM mywebs_favmenus f, mywebs_modul m
								WHERE f.mn_id=m.id && f.userid='$_SESSION[mywebs_uid]'";
    $exec      = $this->connect()->query($this->sql);
    while ($r = $exec->fetch_array()) {
      $arr_data [] = $r;
    }

    $exec->free_result();
    return $arr_data;
  }

  public function create_btn() {
    $this->sql = "SELECT GROUP_CONCAT(p2) AS menu FROM
									mywebs_genparameter_dtl WHERE group_cd='NOT_MODAL'";
    $exec      = $this->connect()->query($this->sql);
    $data      = $exec->fetch_object();
    $arr_data  = $data->menu;
    $exec->free_result();
    $arr = explode(',', $arr_data);
    return $arr;
  }

  public function just_view() {
    $sql = $this->connect()
                ->query("SELECT GROUP_CONCAT(p1) AS mods FROM
									mywebs_genparameter_dtl WHERE group_cd='JUST_VIEW'")
                ->fetch_object();
    return explode(',', $arr_data = $sql->mods);
  }

  public function get_library() {
    return include 'mylibrary.php';
  }

  public function menu() {
    return 'menu.php';
  }

  public function content() {
    return 'load.php';
  }

  public function mycashtoday() {
    return 'mycashtoday.php';
  }

  public function jscontent() {
    return 'js.php';
  }
  protected function store_id() {
    $this->sql = "SELECT store_id FROM mywebs_users WHERE uid='$_SESSION[mywebs_uid]'";
    $exec = $this->connect()->query($this->sql);
    $data = $exec->fetch_array();

    return $data['store_id'];
  }
  public  function mycash() {

    $store = $_SESSION['mywebs_store'];

    if(check_role_store()) {
      $store = $this->store_id();
    }

    $this->sql = "SELECT csh_open, csh_sale, csh_adjust, csh_total FROM mywebs_cash_register WHERE CAST(csh_open_dt AS DATE)=CAST(NOW() AS DATE)";
    $exec = $this->connect()->query($this->sql);
    return $data[] = $exec->fetch_array();
  }

  public function breadcrumb($sid) {
    $page      = $this->getpagedesc();
    $page_mod  = GET_MOD;
    $page_desc = $page['mod'];

    if ($page['parent']) {
      $page_mod  = $page['parent'];
      $page_desc = $page['parent'];
    }

    $val = '<ol class="breadcrumb" style="margin-top: -10px">
                    <li><a href="' . BASE_URL_WEB . '/home.php"><i class="fa fa-windows fa-fw"></i> Home</a></li>
                    <li><a href="' . BASE_URL_WEB . '/home.php?menu/' . $page_mod . '/view/' . $sid . '">' . ucwords($page_desc) . '</a></li>';

    if ($page['parent']) {
      $val .= '<li class="active">' . ucwords($page['mod']) . '</li>';
    }
    if (GET_ACT == 'create') {
      $val .= '<li class="active">Create</li>';
    }
    $val .= '</ol>';

    return $val;
  }

  public function header($val, $subval) {
    $title = $this->getpagedesc();
    return '<h3 class="page-header">' . $val . ucwords($title['md']) . $subval . '</h3>';
  }

  public function destoy_all() {
    $this->sql = "UPDATE mywebs_users SET sid='', sts='OFF', last_out=NOW() WHERE uid='$_SESSION[mywebs_uid]'";
    $this->connect()->query($this->sql);
    session_destroy();
  }

  public function my_setting($data) {
    $this->sql = "SELECT * FROM mywebs_settings WHERE setting_id=1";
    $exec = $this->connect()->query($this->sql);
    $arr_data = $exec->fetch_array();

    $exec->free_result();

    if($data) {
      return $arr_data[$data];
    }

    return $arr_data;
  }
}

?>