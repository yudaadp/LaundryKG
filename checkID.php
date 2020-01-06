<?php
include 'my-config/connect.php';
include 'my-config/config.php';

if (! empty ( $_POST ["id"] )) {
	switch ($_GET ['pkey']) {
		case 'users' :
			$sql = "SELECT 'x' FROM mywebs_users WHERE uid='" . $_POST ["id"] . "'";
			break;
		case 'stores' :
			$sql = "SELECT 'x' FROM mywebs_stores WHERE store_cd='" . $_POST ["id"] . "'";
			break;
    case 'products':
      $sql = "SELECT 'x' FROM mywebs_products WHERE prod_cd='" . $_POST ["id"] . "'";
	}
	$result = $mysqli->query ( $sql );
	$row = $result->num_rows;
	
	if ($row > 0)
		echo "<span class='status-not-available' style='color:red'>Error! Please pick another.</span>";
}
?>