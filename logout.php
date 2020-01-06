<?php
include 'my-config/connect.php';
include 'my-config/config.php';

$mysqli->query ( "UPDATE mywebs_users SET sid='', sts='OFF', last_out=NOW() WHERE uid='$_SESSION[mywebs_uid]'" );
session_destroy ();
echo '<div class="loader">Please wait ..</div>';
?>
<link href="my-library/css/sb-admin-2.css" rel="stylesheet">
<script src="my-plugin/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
		$(window).load(function() {
		$(".loader").fadeOut("slow");
	})
</script>
<?= LOGIN_PAGE; ?>