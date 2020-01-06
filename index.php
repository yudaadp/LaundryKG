<?php
define ( 'MYWEBS', TRUE );
include 'my-config/connect.php';
include 'my-config/config.php';

check_accsts ();

if ($_SESSION ['mywebs_uid'])
	echo HOME_PAGE;

