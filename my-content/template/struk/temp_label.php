<?php
include (dirname(__FILE__) . "/../../../my-plugin/escpos_1.4/autoload.php");

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

if($store_info['type'] == 'windows') {
  $connector = new WindowsPrintConnector($store_info['printer_name']);
} else {
  $connector = new NetworkPrintConnector($store_info['ip_addrs'], $store_info['port']);
}

$printer   = new Printer($connector);
$data      = $execute->transaction_data($ssid);
$sale_data = $mysqli->query($data)->fetch_array();
$items     = $mysqli->query($execute->sql_items($ssid));

$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer -> text($sale_data['inv_cd']. ' / '. strtoupper($sale_data['cust_nm']) . "\n");
$printer -> text('TGL '. date_format(date_create($sale_data['trx_date']), "j-M-y") .' / '. date_format(date_create($sale_data['grab_date']), "j-M-y")  ."\n");
$printer->text("\n--------------------------------\n");
while ($r = $items->fetch_array()) {
  $printer->text(sprintf('%-31.31s', "\n$r[prod_nm]"));
  $printer->text(sprintf('%-10.10s %21s', "\n ", $r['qty'] . $r['satuan']));
}
$printer->text("\n");
$printer->text("--------------------------------");
$printer->setJustification();
$printer->text("Catatan : \n");
$printer->text($sale_data['remarks']);
$printer->text("\n\n\n\n");
?>