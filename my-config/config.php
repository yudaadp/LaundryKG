<?php
date_default_timezone_set ( "Asia/Jakarta" );
define ( 'URI_STRING', $_SERVER ['QUERY_STRING'] );
define ( 'SALT', '1q2w3e4r5t6y7u8i9o0p' . date ( 'Ymd' ) );
define ( 'GET_HOST', gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] ) );
define ( 'GET_IP', $_SERVER ['REMOTE_ADDR'] );
define ( 'CUR_TIME', date ( 'H:i:s' ) );
define ( 'CUR_DATE', date ( 'Y-m-d' ) );
define ( 'MOD_PATH', 'my-content/modul/' );
define ( 'CORE_PATH', 'my-content/modul/system/' );
define ( 'ROOTPATH', $_SERVER ['DOCUMENT_ROOT'] . '/source/myoffice' );
define ( 'ENVIRONMENT', 'dev' );

switch (ENVIRONMENT) {
	case 'development' :
		error_reporting ( - 1 );
		ini_set ( 'display_errors', 1 );
		break;
  case 'dev':
    ini_set('display_errors', 1);
    error_reporting( E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED );
    break;
	case 'testing' :
	case 'production' :
		ini_set ( 'display_errors', 0 );
		if (version_compare ( PHP_VERSION, '5.3', '>=' )) {
			error_reporting ( E_ALL & ~ E_NOTICE & ~ E_DEPRECATED & ~ E_STRICT & ~ E_USER_NOTICE & ~ E_USER_DEPRECATED );
		} else {
			error_reporting ( E_ALL & ~ E_NOTICE & ~ E_STRICT & ~ E_USER_NOTICE );
		}
		break;

	default :
		header ( 'HTTP/1.1 503 Service Unavailable.', TRUE, 503 );
		echo 'The application environment is not set correctly.';
		exit ( 1 ); // EXIT_ERROR
}

// set session config
$sid = session_id ();

// datateble dom config
$addom = 'frtip';

// set file extension, default id .php
$EXT = '.php';

// set error variable
$errno = '';
$errinfo = '-';

// default set for return value
$retval = '';

// for numbering
$no = 1;

$back_btn = '';
$subhead = '';
$arrow = '';

$dashboard = '<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
            </div>';

// set array for page event
$page_arr = array (
		'create',
		'edit',
		'view',
		'delete'
);

include dirname ( __FILE__ ) . '/../my-core/routes.php';
include dirname ( __FILE__ ) . '/../my-plugin/mail/PHPMailerAutoload.php';
include dirname ( __FILE__ ) . '/../my-core/global_func.php';
include dirname ( __FILE__ ) . '/../my-core/class.php';

define ( 'GET_PID', getURL ( URI_STRING, 'GET_PID' ) );
define ( 'GET_MOD', getURL ( URI_STRING, 'GET_MOD' ) );
define ( 'GET_ACT', getURL ( URI_STRING, 'GET_ACT' ) );
define ( 'LOGIN_PAGE', '<meta content="0; url=login.php" http-equiv="refresh"/>' );
define ( 'HOME_PAGE', '<meta content="0; url=home.php" http-equiv="refresh"/>' );
define ( 'DASHBOARD', $dashboard);
define ( 'LI_START', '<li>' );
define ( 'LI_END', '</li>' );
define ( 'UL_END', '</ul>' );

// message, warning, return value
@$e_msg = to_mywebs_char ( 'msg' );
@$G_MSG = check ( $_GET [$e_msg] );

if (GET_PID) {
	$back_btn = '<a href="home.php?menu/' . getmods_info ( GET_MOD, 'PARENT' ) . '/view/' . $sid . '">
	<i class="fa fa-arrow-left fa-fw" data-toggle="tooltip" data-placement="top" title="Kembali"></i></a>';

	is_numeric(GET_PID) ? $subhead_data ='' : $subhead_data = GET_PID;

	$subhead = ': <small>' . $subhead_data . '</small>';
}

$get_content = new mywebs_();
$mysqli      = $get_content->connect();

define ( 'BASE_URL_WEB', $get_content->my_setting('base_url'));
?>