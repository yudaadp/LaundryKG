<?php
function check($data) {
  @$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  @$filter_sql->$mysqli->real_escape_string;
  return $filter_sql;
}

function site_url($path) {
  return BASE_URL_WEB.'/'.$path;
}

function getid() {
  $id = '';

  if ($_POST ['id']) {
    $id = check($_POST ['id']);
  }
  return $id;
}

function check_mandatory($data) {
  if (in_array('', $data)) {
    return TRUE;
  }
}

function to_mywebs_char($str) {
  $hasil = '';
  $kunci = SALT . md5(date('Ymd') . $_SESSION ['mywebs_uid']);
  for ($i = 0; $i < strlen($str); $i++) {
    $karakter      = substr($str, $i, 1);
    $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
    $karakter      = chr(ord($karakter) + ord($kuncikarakter));
    $hasil         .= $karakter;
  }
  return urlencode(base64_encode($hasil));
}

function usr_log($usr, $ip, $p1) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $_SESSION ['mywebs_store'] != '' ? $store = $_SESSION ['mywebs_store'] : $store = NULL;
  $mysqli->query("INSERT INTO mywebs_user_login SET store_id='$store', usr_id='$usr', ip_addrs='$ip', log_date=NOW(), log_sts='$p1'");
}

function dec_mywebs_char($str) {
  $str   = base64_decode(urldecode($str));
  $hasil = '';
  $kunci = SALT . md5(date('Ymd') . $_SESSION ['mywebs_uid']);
  for ($i = 0; $i < strlen($str); $i++) {
    $karakter      = substr($str, $i, 1);
    $kuncikarakter = substr($kunci, ($i % strlen($kunci)) - 1, 1);
    $karakter      = chr(ord($karakter) - ord($kuncikarakter));
    $hasil         .= $karakter;
  }
  return $hasil;
}

function redirect($code) {
  return "<meta content='0; url=home.php?" . to_mywebs_char('msg') . "=" . to_mywebs_char($code) . "' http-equiv='refresh'/>";
}

function cek_register() {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $retval = '';

  $sql = "SELECT `status` FROM mywebs_cash_register cr INNER JOIN mywebs_users u ON cr.`store_id`=u.`store_id` 
				WHERE CAST(csh_open_dt AS DATE)=CAST(NOW() AS DATE) && u.uid='$_SESSION[mywebs_uid]'";
  $val = $mysqli->query($sql)->fetch_array();

  if ($val ['status'] != 'open') {
    $retval = "<meta content='0; url=home.php?menu/cash-register/view/" . session_id() . "/&" . to_mywebs_char('msg') . "=" . to_mywebs_char('100') . "' http-equiv='refresh'/>";
  }
  return $retval;
}

function checklogsts($mod) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql  = "SELECT 'x' FROM mywebs_logs_cnf WHERE `mod`='$mod'";
  $data = $mysqli->query($sql);

  $retval = $data->num_rows;

  return $retval;
}

function check_role_store() {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql  = "SELECT 'x' FROM mywebs_modul m 
				INNER JOIN mywebs_modul_role mr ON m.id=mr.`mid` 
				INNER JOIN mywebs_permission_group pg ON mr.`gid`=pg.`groupid`
			WHERE m.id=42 AND mr.`lid`=$_SESSION[mywebs_lvl] AND pg.groupid <= 3";
  $exec = $mysqli->query($sql);
  $res  = $exec->fetch_array();
  $exec->free_result();
  return $res['x'];
}

function checkLog_info($mod, $txt, $retval, $desc) {
  if (checklogsts($mod) > 0 OR $mod == 'LOGIN') {
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'my-logs/' . strtoupper($mod . '_' . $_SESSION ['mywebs_uid']) . '_' . date('dmY') . '.log';


    $fp   = fopen($file, 'a');
    $date = date('dmY H:i:s');

    fwrite($fp, $date . ' (' . $txt . '=>' . $desc . ' ' . $retval . ')' . "\r\n");
    fclose($fp);
  }
}

function retval($val) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  if (is_numeric($val)) {
    return [
      'retval' => $val,
    ];
  }
  else {
    $res = $mysqli->query($val);
    if(!$res) {
      return ['retval' => '401'];
    }

    return $data[] = $res->fetch_assoc();
  }
}

function fake_retval($val) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  if (is_numeric($val)) {
    return [
      'retval' => $val,
    ];
  }
  else {
    $res = $mysqli->query($val);
    return $data[] = $res->fetch_assoc();
  }
}

function genparam($p1, $p2 = '404.0') {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $msg = '';
  $sql = "SELECT p1, p2, p3 FROM mywebs_genparameter p1 INNER JOIN mywebs_genparameter_dtl p2 ON p1.`code`=p2.`group_cd` WHERE p1.`code`= '$p1' AND p2.`p1`= '$p2'";
  $p   = $mysqli->query($sql)->fetch_array();
  $msg .= $p ['p1'] . ' - ' . $p ['p2'] . ' ' . $p ['p3'];
  return $msg;
}

function getparam($code, $val) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql  = "SELECT p2 FROM mywebs_genparameter_dtl WHERE group_cd='$code' AND p1='$val'";
  $data = $mysqli->query($sql)->fetch_array();
  return $data ['p2'];
}

function get_alert($p1, $p2 = '404.0') {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = "SELECT p1, p2, p3 FROM mywebs_genparameter p1 INNER JOIN mywebs_genparameter_dtl p2 ON p1.`code`=p2.`group_cd` WHERE p1.`code`= '$p1' AND p2.`p1`= '$p2'";
  $p   = $mysqli->query($sql)->fetch_array();

  switch ($p ['p3']) {
    case '0' :
      $style = 'alert-success';
      break;
    case '1' :
      $style = 'alert-danger';
      break;
  }
  $msg .= '<br/><div class="alert ' . $style . ' alert-dismissable">';
  $msg .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $p ['p1'] . ' - ' . $p ['p2'] . '</div>';
  return $msg;
}

function getmods_info ($mod, $inf = '') {
  $db     = new my_db_connect();
  $mysqli = $db->connect();
  $results = '';
  $param   = "mod_name='$mod'";
  if (is_numeric($mod)) {
    $param = "id=$mod";
  }
  $sql  = $mysqli->query("SELECT `mod`, mod_detail as md, mod_location as mpath, parent FROM mywebs_modul WHERE $param");
  $exec = $sql->fetch_array();
  $sql->free_result();
  switch ($inf) {
    default :
      $results = MOD_PATH . $exec['mpath'];
      break;
    case 'PAGE' :
      $results = $exec;
      break;
    case 'DIR' :
      $results = MOD_PATH . $exec ['mpath'] . '/' . $mod . '.php';
      break;
    case 'DIR_PATH' :
      $results = MOD_PATH . $exec ['mpath'] . '/exproc.php';
      break;
    case 'PARENT' :
      $results = $exec ['parent'];
      break;
  }
  return $results;
}

function checkmodsts($mod) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql    = $mysqli->query("SELECT 'x' FROM mywebs_modul WHERE mod_name='$mod' && sts='Y'");
  $cekrow = $sql->num_rows;
  $sql->free_result();
  return $cekrow;
}

function cekAkses($mod_name, $level = NULL, $act = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  if ($act == NULL) {
    $act = getURL($_SERVER ['QUERY_STRING'], 'GET_ACT');
  }

  $sql = "SELECT GROUP_CONCAT(p.bit_name) AS role
				FROM mywebs_modul mods, mywebs_permission_group pg LEFT JOIN mywebs_permission p ON pg.role & p.bit
				INNER JOIN mywebs_modul_role mr ON pg.groupid=mr.gid
 				WHERE mr.lid = '$level' && mods.`id`=mr.`mid` && mods.mod_name='$mod_name' && mods.`sts`='Y'
 			GROUP BY mods.mod, mods.mod_name, mods.mod_detail
 			ORDER BY mods.`mod`";

  $get_role = $mysqli->query($sql)->fetch_array();
  $to_array = explode(',', $get_role ['role']);
  if (in_array($act, $to_array)) {
    $acs = 'x';
  }
  return $acs;
}

function getfiles($mod) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = " SELECT GROUP_CONCAT(p.bit_name) AS role
				FROM mywebs_modul mods, mywebs_permission_group pg LEFT JOIN mywebs_permission p ON pg.role & p.bit
				INNER JOIN mywebs_modul_role mr ON pg.groupid=mr.gid
 				WHERE mr.lid = '$_SESSION[mywebs_lvl]' && mods.`id`=mr.`mid` && mods.mod_name='$mod' && mods.`sts`='Y'
 			GROUP BY mods.`mod`, mods.mod_name, mods.mod_detail
 			ORDER BY mods.`mod`";

  $get_role = $mysqli->query($sql)->fetch_array();
  return $to_array [] = explode(',', $get_role ['role']);
}

function getmenuls($id = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = $mysqli->query("SELECT menuID, menu FROM mywebs_menu WHERE aktif='Y' ORDER BY set_order");
  while ($r = $sql->fetch_array()) {
    if ($r ['menuID'] == $id) {
      $mn .= "<option value=$r[menuID] selected=selected>" . ucwords($r ['menu']) . "</option>";
    }
    else {
      $mn .= "<option value=$r[menuID]>" . ucwords($r ['menu']) . "</option>";
    }
  }
  return $mn;
}

function getlevel($id = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $_SESSION ['mywebs_lvl'] != 1 ? $p1 = 'id != 1 && ' : $p1 = '';

  $sql = $mysqli->query("SELECT id, level_name, level_desc FROM mywebs_level WHERE $p1 sts='Y' ORDER BY level_name");
  while ($r = $sql->fetch_array()) {
    if ($r ['id'] == $id) {
      $mn .= "<option value=$r[id] selected=selected>" . ucwords($r ['level_name'] . ' (' . $r ['level_desc'] . ')') . "</option>";
    }
    else {
      $mn .= "<option value=$r[id]>" . ucwords($r ['level_name'] . ' (' . $r ['level_desc'] . ')') . "</option>";
    }
  }
  return $mn;
}

function getstore($id = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $param = "id=$_SESSION[mywebs_store]";

  if (check_role_store()) {
    $param = '1=1';
  }

  $sql = $mysqli->query("SELECT * FROM mywebs_stores WHERE $param ORDER BY store_nm");
  while ($r = $sql->fetch_array()) {
    if ($r ['id'] == $id) {
      $mn .= "<option value=$r[id] selected=selected>" . ucwords($r ['store_nm'] . ' (' . $r ['addrs'] . ')') . "</option>";
    }
    else {
      $mn .= "<option value=$r[id]>" . ucwords($r ['store_nm'] . ' (' . $r ['addrs'] . ')') . "</option>";
    }
  }
  return $mn;
}

function storests($data='') {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql   = $mysqli->query("SELECT s.id, s.store_nm FROM mywebs_users u INNER JOIN mywebs_stores s ON u.`store_id`=s.`id` 
								WHERE uid='$_SESSION[mywebs_uid]'");
  $store = $sql->fetch_array();

  @$data == 'id' ? $f_nm = 'id' : $f_nm = 'store_nm';

  $store ['store_nm'] == $_SESSION ['mywebs_store'] ? $store = $_SESSION ['mywebs_store'] : $store = $store [$f_nm];
  return $store;
}

function getcate($id = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql    = $mysqli->query("SELECT id, cat_name, cat_desc FROM mywebs_kategori ORDER BY cat_name");
  $cekrow = $sql->num_rows;

  if ($cekrow > 0) {
    $mn = '<select class="form-control" name="nts_cat">';
    while ($r = $sql->fetch_array()) {
      if ($r ['id'] == $id) {

        $mn .= "<option value=$r[id] selected=selected>" . ucwords($r ['cat_name'] . ' (' . $r ['cat_desc'] . ')') . "</option>";
      }
      else {
        $mn .= "<option value=$r[id]>" . ucwords($r ['cat_name'] . ' (' . $r ['cat_desc'] . ')') . "</option>";
      }
    }
    $mn .= '</select>';
  }
  else {
    $mn = 'Category is not available, create it before!';
  }
  return $mn;
}

function getsts($sts) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $ds = $mysqli->query("SELECT p1, p2 FROM mywebs_genparameter_dtl WHERE group_cd='STD_CH'");
  $r  = '';
  while ($chz = $ds->fetch_array()) {
    if ($chz ['p1'] == $sts) {
      $r .= "<option value=$chz[p1] selected=selected>$chz[p2]</option>";
    }
    else {
      $r .= "<option value=$chz[p1]>$chz[p2]</option>";
    }
  }
  return $r;
}

function show_lists($code, $nm, $id, $retval, $style = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = $mysqli->query("SELECT * FROM mywebs_genparameter_dtl WHERE group_cd='$code'");
  if ($retval == 1) {
    $retval = 'p1';
  }
  else {
    $retval = 'p2';
  }

  $r = '';
  $r .= '<select class="' . $style . ' form-control" data-style="btn-primary" style="display: none;" name="' . $nm . '" id="' . $id . '">';
  $r .= '<option value=""> -- Pilih -- </option>';
  while ($arr = $sql->fetch_array()) {
    $r .= '<option value="' . $arr [$retval] . '">' . ucwords($arr ['p2']) . '</option>';
  }
  $r .= '</select>';
  return $r;
}

function gencode($field, $tbl, $char = '', $length = 3) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $p1 = '1=1';
  /*
   * if ($char == 'KK') {
   * $p1 = "gcd='$_SESSION[mywebs_gcd]'";
   * }
   */
  $sql     = $mysqli->query("SELECT MAX(RIGHT($field, $length)) as maxID FROM mywebs_$tbl WHERE $p1 ORDER BY $field");
  $code    = $sql->fetch_array();
  $genKode = $code ['maxID'];
  $getCode = ( int ) substr($genKode, 1, $length);
  $getCode++;
  $theCode = $char . sprintf("%0" . $length . "s", $getCode);
  $sql->free_result();
  return $theCode;
}

function genseq($id) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql     = $mysqli->query("SELECT MAX(RIGHT(no_urut, 3)) as maxID FROM mywebs_kk_dtl WHERE refcode='$id' && 1=1");
  $code    = $sql->fetch_array();
  $genKode = $code ['maxID'];
  $getCode = ( int ) substr($genKode, 1, 3);
  $getCode++;
  $theCode = '' . sprintf("%03s", $getCode);
  $sql->free_result();
  return $theCode;
}

function getlookup_area() {
  require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data-area-id.php';
}

/*function getlookup_customers() {
  require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'customers.php';
}*/

function getlookup_customer() {
  require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'customers.php';
}

function saveerrno($errcode, $sql, $txt) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $mysqli->query('INSERT INTO mywebs_logs SET errcode=' . '"' . $errcode . '", p1=' . '"' . $sql . '", p2=' . '"' . $txt . '", createdate=' . '"' . date('Y-m-d H:i:s') . '", createby=' . '"' . $_SESSION ['mywebs_uid'] . "'");
}

function genLogs($sql) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $mysqli->query('INSERT INTO mywebs_logs SET thedate=' . '"' . date('Y-m-d H:i:s') . '", txt=' . '"' . $sql . '", userid=' . '"' . $_SESSION ['mywebs_uid'] . '"');
}

function saveLogs($txt, $logType) {
  if ($logType == 'DT') {
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'my-logs/dtfeed_logs_' . date('dmY_H') . '.txt';
  }
  else if ($logType == 'SQL') {
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'my-logs/sql_logs_' . $_SESSION ['mywebs_uid'] . '_' . date('dmY') . '.txt';
  }
  else {
    $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'my-logs/logs_' . date('dmY') . '.txt';
  }

  $fp   = fopen($file, 'a');
  $date = date('dmY h:i:s');

  fwrite($fp, $date . ' : ' . $txt . "\r\n");
  fclose($fp);
}

function check_accsts() {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql  = "SELECT 'x' FROM mywebs_users WHERE uid='$_SESSION[mywebs_uid]' && lid='$_SESSION[mywebs_lvl]' && sid='" . $_SESSION ['mywebs_sid'] . "'" . " && aktif='Y'";
  $res  = $mysqli->query($sql);
  $page = '';

  if ($res->num_rows < 1) {
    $page = LOGIN_PAGE;
  }

  // saveLogs($sql,'SQL');
  echo $page;
}

// tanggal indo
function to_date_ID($tgl) {
  $tanggal = substr($tgl, 8, 2);
  $bulan   = getBulan(substr($tgl, 5, 2));
  $tahun   = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function dayID($today) {
  $day     = date('D', strtotime($today));
  $dayList = [
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu',
  ];
  return $dayList [$day] . ', ' . date('d M Y');
}

function getBulan($bln) {
  switch ($bln) {
    case 1 :
      return "Januari";
      break;
    case 2 :
      return "Februari";
      break;
    case 3 :
      return "Maret";
      break;
    case 4 :
      return "April";
      break;
    case 5 :
      return "Mei";
      break;
    case 6 :
      return "Juni";
      break;
    case 7 :
      return "Juli";
      break;
    case 8 :
      return "Agustus";
      break;
    case 9 :
      return "September";
      break;
    case 10 :
      return "Oktober";
      break;
    case 11 :
      return "November";
      break;
    case 12 :
      return "Desember";
      break;
  }
}

function get_version() {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = $mysqli->query("SELECT v_dtl FROM mywebs_version ORDER BY id DESC LIMIT 1")
                ->fetch_array();
  return $sql ['v_dtl'];
}

function cekData($table, $where = '1=1', $field = NULL) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  if ($field == NULL) {
    $cek = $mysqli->query("SELECT 'x' FROM $table WHERE $where")->fetch_array();
  }
  else {
    $cek = $mysqli->query("SELECT $field FROM $table WHERE $where")
                  ->fetch_array();
  }
  return $cek;
}

function toNormal($str) { // 1.000.000.00
  @$q = preg_replace("/[^0-9]/", "", $str);
  @$numVal = strlen($nVal);
  @$nVal = substr($q, 0, $numVal - 2);
  return $nVal;
}

function cekRpt($rpt) {
  $db     = new my_db_connect();
  $mysqli = $db->connect();
  $sql    = "SELECT 'x' FROM mywebs_reports rpt INNER JOIN mywebs_report_roles rr ON rpt.id=rr.rpt 
				WHERE rpt_fn='$rpt' AND rr.lid=$_SESSION[mywebs_lvl]";
  return $mysqli->query($sql)->num_rows;
}

function create_thumb($file_ext, $fileName, $upload_image) {
  $thumb_path  = dirname(__FILE__) . '/../my-content/images/photo/thumb/';
  $thumb_width = 200;
  $thumbnail   = $thumb_path . $fileName;

  list($width, $height) = getimagesize($upload_image);
  $thumb_height = floor($height * ($thumb_width / $width));
  $thumb_create = imagecreatetruecolor($thumb_width, $thumb_height);
  switch ($file_ext) {
    case 'jpg':
      $source = imagecreatefromjpeg($upload_image);
      break;
    case 'jpeg':
      $source = imagecreatefromjpeg($upload_image);
      break;
    case 'png':
      $source = imagecreatefrompng($upload_image);
      break;
    case 'gif':
      $source = imagecreatefromgif($upload_image);
      break;
    default:
      $source = imagecreatefromjpeg($upload_image);
  }

  imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
  switch ($file_ext) {
    case 'jpg' || 'jpeg':
      imagejpeg($thumb_create, $thumbnail, 100);
      break;
    case 'png':
      imagepng($thumb_create, $thumbnail, 100);
      break;
    case 'gif':
      imagegif($thumb_create, $thumbnail, 100);
      break;
    default:
      imagejpeg($thumb_create, $thumbnail, 100);
  }
}

function this_upload($field_name) {

  if (!$_SESSION['mywebs_uid'] && !$_SESSION['mywebs_lvl']) {
    return FALSE;
  }
  @$path = dirname(__FILE__) . '/../my-content/images/photo/';
  @$target_path = $path;
  @$upd_sess = $_SESSION['mywebs_sid'] . '_';
  @$format_accept = ["jpg", "png", "jpeg"];
  @$upload_session = $upd_sess . date(YmdHis) . '_';

  $fileName = $upload_session . $_FILES[$field_name]['name'];
  list($txt, $ext) = explode(".", $fileName);

  if (!in_array($ext, $format_accept)) {
    return FALSE;
  }

  $upload_image = $target_path . basename($fileName);

  if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_image)) {
    create_thumb($ext, $fileName, $upload_image);
    return $fileName;
  }
  else {
    return FALSE;
  }
}

function getStoreInfo() {
  $db     = new my_db_connect();
  $mysqli = $db->connect();

  $sql = "SELECT p.*, s.store_name, s.store_addrs, s.store_phone FROM mywebs_printer p INNER JOIN mywebs_settings s ON p.id=s.printer_id AND s.setting_id=1";
  $exec = $mysqli->query($sql);

  $data = $exec->fetch_array();

  return $data;
}

?>
