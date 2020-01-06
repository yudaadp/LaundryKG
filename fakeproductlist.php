<?php
include 'my-config/connect.php';
include 'my-config/config.php';
include 'my-content/modul/laundry/class.php';

$execute = new laundry();
$mysqli  = $execute->connect();

$q = strtolower($_GET["term"]);
if (!$q) {
  return;
}
$sql    = $mysqli->query($execute->product_list($q));
$cekBrg = $sql->num_rows;
if ($cekBrg > 0) {
  while ($brg = $sql->fetch_array()) {
    $products[] = $brg['id'] . ' - ' . $brg['prod_nm'] . ' (Rp : ' . number_format($brg['price'],2) . ' /'. $brg['satuan'].')';
  }
}
echo json_encode($products);
?>