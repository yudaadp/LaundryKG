<?php
error_reporting ( E_STRICT | E_ALL );

date_default_timezone_set ( 'Etc/UTC' );

require 'PHPMailerAutoload.php';

$mail = new PHPMailer ();

// $body = file_get_contents('contents.html');

$mail->isSMTP ();
$mail->Host = 'digitalisasi.com';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->Port = 26;
$mail->Username = 'ameda@sharingyuk.com';
$mail->Password = '1q2w3e4r5t';
$mail->setFrom ( 'ameda@sharingyuk.com', 'Yuda Arfian D.P' );
$mail->addReplyTo ( 'yudaadp@gmail.com', 'Yuda Arfian D.P' );

$mail->Subject = "Wedding Invitation!";

// Same body for all messages, so set this before the sending loop
// If you generate a different body for each recipient (e.g. you're using a templating system),
// set it inside the loop
// msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

// Connect to the database and select the recipients from your mailing list that have not yet been sent to
// You'll need to alter this to match your database
$mysql = mysqli_connect ( 'localhost', 'digitali_adimweb', '1q2w3e4r5t6y' );
mysqli_select_db ( $mysql, 'digitali_adima12' );
$result = mysqli_query ( $mysql, "SELECT token, nama, mail FROM mail WHERE sent='N'" );
$body = '';

foreach ( $result as $row ) { // This iterator syntax only works in PHP 5.4+
	$body .= '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wedding Invitation - Yuda & Mei</title>
</head><body>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:
  100%;">
<tbody>
<tr>
<td align="left" class="wrap100" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="wrap100" style="width: 800px;">
<tbody>
<tr>
<td align="left" class="wrap100" style="border: solid 1px #e9e9e9; background:
                #FFF;" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="wrap100" style="width: 600px;">
<tbody>
<tr align="center">
<td align="center" valign="top">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="wrap101" style="width: 540px;">
<tbody>
<tr>
<td align="left" height="36" valign="top">
</td>
</tr>
<tr>
</tr>
<tr>
<td align="left" height="100" style="font-family: Georgia, Times
                                New Roman, Times, serif; font-size: 12px;
                                color: #565656; line-height: 20px;" valign="top">
                                  <p>
                                    <strong style="font-size:24px">You Are Invited!</strong><br />
                                    <br />
                                    <img src="http://digitalisasi.com/wedding_bg.jpg" alt="Loading.." title="Loading.." />
                                    <br />
                                    <br />
                                    Dear ' . ucwords ( strtolower ( $row ['nama'] ) ) . '</p>
                                  <p>We are going to celebrate the beginning of our adventure together and invite you to come join with us as we tie the knot on <strong>Saturday, October 1, 2016 11:00 am til END</strong> at <strong>Saribumi Indah Blok D 20 no 14</strong>. </p>
                                  <p>For further information, you can visit our special invitation link for you =&gt; http://mywedding.digitalisasi.com/' . $row ['token'] . '. Please kindly check it out. </p>
<p><center><strong style="text-align:center">SAVE THE DATE!</strong></center></p>
                                  <p>Because we cant picture getting married without your presence.                                  Help us capture our moment and kindly hastag #meiyudawedding<br />
                                    <br />
                                <strong>Warm Regards</strong></p>
                                  <p>Yuda &amp; Mei<br />
                                    <br />
                              </p></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table></body>
</html>';
	
	$mail->addAddress ( $row ['mail'], $row ['nama'] );
	$mail->msgHTML ( $body );
	
	if (! $mail->send ()) {
		echo "Mailer Error (" . str_replace ( "@", "&#64;", $row ["mail"] ) . ') ' . $mail->ErrorInfo . '<br />';
		break; // Abandon sending
	} else {
		echo "Message sent to :" . $row ['nama'] . ' (' . str_replace ( "@", "&#64;", $row ['mail'] ) . ')<br />';
		// Mark it as sent in the DB
		mysqli_query ( $mysql, "UPDATE mail SET sent = 'Y' WHERE email = '" . mysqli_real_escape_string ( $mysql, $row ['mail'] ) . "'" );
	}
	// Clear all addresses and attachments for next loop
	$mail->clearAddresses ();
	$mail->clearAttachments ();
	$body = '';
}


