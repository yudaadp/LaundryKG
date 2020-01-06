<?php
include 'my-config/connect.php';
include 'my-config/config.php';

$get_content = new mywebs_();
$arr = $get_content->get_menu_right ( check ( $_POST ['search'] ) );
$output = '';

if (count ( $arr )) {
	foreach ( $arr as $mn ) {
		$output .= "<li>
   					<a href='home.php?menu/$mn[mod_name]/view/$sid'>
					<i class='fa fa-angle-right fa-fw'></i>" . ucwords ( $mn ['mod'] ) . "</a>
					</li>";
	}
}
echo $output;
?>