<?php
require ('my-config/connect.php');
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

$table = 'mywebs_favmenus';
$primaryKey = 'id';

$columns = array (
		array (
				'db' => 'id',
				'dt' => 0 
		),
		array (
				'db' => 'mn_id',
				'dt' => 1 
		)
);

$sql_details = array (
		'user' => USER,
		'pass' => PASSWORD,
		'db' => DATABASE,
		'host' => HOST 
);

require ('my-config/dt_class.php');
echo json_encode ( SSP::simple ( $_GET, $sql_details, $table, $primaryKey, $columns ) );
?>