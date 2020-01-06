<?php

class laundry extends my_db_connect {
  private $sql;
  private $ssid;

  public function transaction_data($id) {
    $this->sql = "SELECT * FROM mywebs_transaction WHERE scd='$id'";
    return $this->sql;
  }

  public function count_items_grp($id) {
    $this->sql = "SELECT COUNT(si.id) AS num_items FROM mywebs_transaction s INNER JOIN mywebs_trx_products si ON s.id=si.refid 
	                  WHERE s.scd='$id'";

    return $this->sql;
  }

  public function show() {
    $param = '1=1';

    if ($_SESSION['mywebs_lvl'] > 1) {
      $param = "s.createby='$_SESSION[mywebs_uid]' && 1=1";
    }

    $this->sql = "SELECT st.tlp, s.* FROM mywebs_transaction s INNER JOIN mywebs_customers st ON s.cust_id=st.id WHERE $param";
    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_array())
      $data [] = $arr_data;

    $exec->free_result();

    return $data;
  }

  public function sql_items($id) {
    $this->sql = "SELECT p.prod_nm, p.satuan, s.qty, s.sub_ttl FROM mywebs_products p 
	  INNER JOIN mywebs_trx_products s ON p.id=s.prod_id INNER JOIN mywebs_transaction fs ON s.refid=fs.id
	  WHERE fs.scd='$id' ORDER BY prod_nm";

    return $this->sql;
  }

  public function sql_count_items($id) {
    $this->sql = "SELECT SUM(qty) AS ttl_items FROM mywebs_products p 
	                  INNER JOIN mywebs_trx_products s ON p.id=s.prod_id INNER JOIN mywebs_transaction fs ON s.refid=fs.id
	                WHERE fs.scd='$id' ORDER BY prod_nm";

    return $this->sql;
  }

  public function showitems($id) {

    $this->sql = "SELECT p.prod_nm, s.* FROM mywebs_products p INNER JOIN mywebs_trx_products s ON p.id=s.prod_id WHERE s.refid='$id'";
    $exec      = $this->connect()->query($this->sql);
    while ($arr_data = $exec->fetch_array())
      $data [] = $arr_data;

    $exec->free_result();

    return $data;
  }

  public function ssid() {
    $this->ssid = strtoupper($_SESSION['mywebs_uid'] . date('jnyHi'));

    return $this->ssid;
  }

  public function product_list($id) {
    $this->sql = "SELECT * FROM mywebs_products WHERE id LIKE '%$id%' OR prod_nm LIKE '%$id%'";

    return $this->sql;
  }

  public function addtocart($data, $trx_paid=0) {

    foreach ($data as $param => $val) {
      ${$param} = check($val);
    }
    $prod_nm = explode(' - ', $prod_nm);
    $prod_id = $prod_nm['0'];

    if($trx_paid == '') {
      $trx_paid = 0;
    }

    $inv_code = gencode('inv_cd', 'transaction', 'T', '5');

    $this->sql = "CALL addtocart ('$ssid', '$inv_code', '$end_date', '$_SESSION[mywebs_uid]', $cust_id, '$custname', $prod_id, $qty, $trx_paid, '$trx_note', @retval)";

    return $this->sql;
  }

  public function del_item($item, $ssid) {
    $this->sql = "CALL delfromcart ('$ssid', $item, @retval)";

    return $this->sql;
  }

  public function retval($id) {
    $cek_query = $this->connect()->query("SELECT 'x' FROM mywebs_trx_products WHERE refid=$id");
    $cek       = $cek_query->num_rows;

    if ($cek > 0) {
      $this->sql = "SELECT p.prod_nm, p.satuan, si.*, s.total AS total, 200 AS retval, " . "'" . $_SESSION['mywebs_sid'] . "'" . " as sid 
                      FROM mywebs_products p 
                      INNER JOIN mywebs_trx_products si ON p.id=si.prod_id 
                      INNER JOIN mywebs_transaction s ON si.refid=s.id 
                    WHERE si.refid=$id ORDER BY si.id DESC LIMIT 1";
    } else {
      $this->sql = "SELECT total, 200 AS retval, " . "'" . $_SESSION['mywebs_sid'] . "'" . " as sid FROM mywebs_transaction WHERE id=$id";
    }

    return $this->sql;
  }
}

class item {
  private $name;
  private $price;
  private $dollarSign;

  public function __construct($name = '', $price = '', $dollarSign = false) {
    $this->name       = $name;
    $this->price      = $price;
    $this->dollarSign = $dollarSign;
  }

  public function __toString() {
    $rightCols = 20;
    $leftCols  = 33;
    if ($this->dollarSign) {
      $leftCols = $leftCols / 2 - $rightCols / 2;
    }
    $left = str_pad($this->name, $leftCols); //. str_pad($sign . $this -> price, $rightCols, ' ', STR_PAD_LEFT) ;

    $sign  = ($this->dollarSign ? 'Rp ' : '');
    $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);

    return "$left$right\n";
  }
}

?>