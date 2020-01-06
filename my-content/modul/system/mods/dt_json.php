
<?php
// include connection file
include '../../../../my-config/connect.php';
include '../../../../my-config/config.php';

// initilize all variable
$params = $columns = $totalRecords = $data = array ();

$params = $_REQUEST;

// define index of column
$columns = array (
		0 => 'menuID',
		1 => 'menu',
		2 => 'url' 
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if (! empty ( $params ['search'] ['value'] )) {
	$where .= " WHERE ";
	$where .= " ( menu LIKE '" . $params ['search'] ['value'] . "%' ";
	$where .= " OR url LIKE '" . $params ['search'] ['value'] . "%' ";
	
	// $where .= " OR employee_age LIKE '" . $params ['search'] ['value'] . "%' )";
}

// getting total number records without any search
$sql = "SELECT mn.menu, m.* FROM mywebs_modul m INNER JOIN mywebs_menu mn ON mn_id=menuID AND mn_id !=21";
$sqlTot .= $sql;
$sqlRec .= $sql;
// concatenate search sql if value exist
if (isset ( $where ) && $where != '') {
	
	$sqlTot .= $where;
	$sqlRec .= $where;
}

$sqlRec .= " ORDER BY mod_name, " . $columns [$params ['order'] [0] ['column']] . "   " . $params ['order'] [0] ['dir'] . "  LIMIT " . $params ['start'] . " ," . $params ['length'] . " ";

$queryTot = $mysqli->query ( $sqlTot ) or die ( "database error:" . $mysqli->error );

$totalRecords = $queryTot->num_rows;

$queryRecords = $mysqli->query ( $sqlRec ) or die ( "error to fetch employees data" );

// iterate on results row and create new index array of data
while ( $row = $queryRecords->fetch_array () ) {
	$data [] = $row;
}

$json_data = array (
		"draw" => intval ( $params ['draw'] ),
		"recordsTotal" => intval ( $totalRecords ),
		"recordsFiltered" => intval ( $totalRecords ),
		"data" => $data 
); // total data array


echo json_encode ( $json_data ); // send data as json format
?>
	