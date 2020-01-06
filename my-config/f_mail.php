<?php
require_once (dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'my-plugin/mail/PHPMailerAutoload.php');
function sentMail($uid, $name, $email, $pass) {
	$body = '';
	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'digitalisasi.com';
	$mail->SMTPAuth = true;
	$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
	$mail->Port = 26;
	$mail->Username = 'ameda@sharingyuk.com';
	$mail->Password = '1q2w3e4r5t';
	$mail->setFrom ( 'ameda@sharingyuk.com', 'myTrading : Administrator' );
	
	$mail->Subject = "Welcome to myWebs - myTrading";
	$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
	$body .= 'Hello ' . $name;
	$body .= '<br/><br/> Berikut ini adalah informasi login anda :<br/>
				UserID : ' . $uid . '<br/>
				Password : ' . $pass . '<br/>
				Login    : ' . $pass . '<br/>
				<br/>
				Segera lakukan update password ketika berhasil login. Terima kasih';
	
	$mail->addAddress ( $email, $name );
	$mail->msgHTML ( $body );
	
	if (! $mail->send ()) {
		echo "Mailer Error (" . str_replace ( "@", "&#64;", $email ) . ') ' . $mail->ErrorInfo . '<br />';
		$m_retval = '1';
		// break; //Abandon sending
	} else {
		echo "Message sent to :" . $name . ' (' . str_replace ( "@", "&#64;", $email ) . ')<br />';
		$m_retval = '0';
		// Mark it as sent in the DB
	}
	// Clear all addresses and attachments for next loop */
	$mail->clearAddresses ();
	$mail->clearAttachments ();
	$body = '';
	return $m_retval;
}

//echo sentMail('test','yuda','yudaadp@gmail.com','2432432');

