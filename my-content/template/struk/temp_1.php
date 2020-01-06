<?php
include (dirname(__FILE__) . "/../../../my-plugin/escpos_1.4/autoload.php");

use Mike42\Escpos\Printer;
//use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\CapabilityProfile;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

if($store_info['type'] == 'windows') {
  //$connector = new WindowsPrintConnector($getThePrinter['printer_path']);
  $connector = new WindowsPrintConnector($store_info['printer_name']);
} else {
  $connector = new NetworkPrintConnector($store_info['ip_addrs'], $store_info['port']);
}

$printer   = new Printer($connector);
$data      = $execute->transaction_data($ssid);
$sale_data = $mysqli->query($data)->fetch_array();
$items     = $mysqli->query($execute->sql_items($ssid));
$total     = number_format($sale_data['total']);
$total     = new item('Total', $total, TRUE);

$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
$printer->text(strtoupper($store_info['store_name']) . "\n");
$printer->selectPrintMode();
$printer->text($store_info['store_addrs'] . "\n");
$printer->text($store_info['store_phone'] . "\n");
$printer->text("================================\n");
$printer->feed();
$printer -> text($sale_data['inv_cd']. ' / '. strtoupper($sale_data['cust_nm']) . "\n");
$printer -> text('TGL '. $sale_data['trx_date'] . "\n");
$printer -> text('TGL SELESAI ' . date_format(date_create($sale_data['grab_date']), "j-M-y")  ."\n");
//$printer -> text('NAMA :' . strtoupper($sale_data['cust_nm'])."\n");
$printer->text("\n--------------------------------\n");
while ($r = $items->fetch_array()) {
  $printer->text(sprintf('%-31.31s', "\n$r[prod_nm]"));
  $printer->text(sprintf('%-10.10s %10s %11s', "\n ", $r['qty'] . $r['satuan'], number_format($r['sub_ttl'])));
}
$printer->text("\n");
$printer->text("--------------------------------");
//$printer->text(sprintf('%-23.23s %8s', 'Subtotal', number_format($sale_data['total'])) . "\n");
//$printer->text("--------------------------------");
$printer->feed();
$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer->text($total);
$printer->selectPrintMode();
$printer->text(sprintf('%-19.19s %12s', 'Bayar', number_format($sale_data['paid'])) . "\n");
$printer->feed();
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("\n================================\n");
$printer->text("Terima kasih.\n");
$printer->text("Malas nyuci?\n Call/WA kami aja, siap antar jemput!!");
$printer->text("\n\n");
?>