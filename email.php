<?php

// Gmail email configuration.

/*

Note that: if you are using non secure connection not https,
you have to turn on less secure app from your email setting using below link.

https://myaccount.google.com/lesssecureapps


I am not responsible for any misuse of any of my examples ~ Habib AlMawali.

*/

require 'PHPMailer/PHPMailerAutoload.php';

Class Email {

	public function initMail() {

		$senderName = "Habib Dev.";
		$emailAddress = "";
		$emailPassword = "";

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $emailAddress;
		$mail->Password = $emailPassword;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom($emailAddress, $senderName);
		$mail->addReplyTo($emailAddress, $senderName);
		$mail->smtpConnect([
		    'ssl' => [
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    ]
		]);

		if ($emailAddress == "" || $emailPassword == "") {
			die('Both email address and password required, check email.php line 24, and line 25');
		} else {
			return $mail;
		}
		
	}

	public function send($emailParameters) {
		$mail = $this->initMail();
		$mail->addAddress($emailParameters['email']);
		$mail->isHTML(true);

		$mail->Subject = $emailParameters['subject'];
		$mail->Body = $emailParameters['message'];

		if (isset($emailParameters['attach'])) {
			$mail->AddAttachment($emailParameters['attach']['tmp_name'], $emailParameters['attach']['name']);
		}

		if(!$mail->send()) {
		    return $mail->ErrorInfo;
		} else {
		    return 'true';
		}
	}

}

$email = new Email;