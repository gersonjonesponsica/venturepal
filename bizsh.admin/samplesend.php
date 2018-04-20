<?php

		$email = "jonesponsica29@gmail.com";
		$name = "Gerson Jones";
		$message = "					
			Hello $name,
			<br /><br />
			Welcome to VenturePal<br/>
			To complete your registration  please , just click following link<br/>
			<br /><br />
			hahah
			<br /><br />
			Thanks,";
			                      // enable SMTP authentication
	
			$subject = "Confirm Registration";
	        try {
	            require_once('mailer/class.phpmailer.php');
	            $from       = "from@yourwebsite.com";
	            $mail       = new PHPMailer();
	            $mail->IsSMTP(true);            // use SMTP
	            $mail->IsHTML(true);
	            $mail->SMTPAuth   = true;                  // enable SMTP authentication
	            $mail->Host       = "tls://smtp.gmail.com"; // SMTP host
	            $mail->Port       =  465;                    // set the SMTP port
	            $mail->Username   = "jonesgerson29@gmail.com";  // SMTP  username
	            $mail->Password   = "myangelica<32014";  // SMTP password
	            $mail->SetFrom($from, 'Gerson Jones Ponsica');
	            $mail->AddReplyTo($from,'Do not reply!');
	            $mail->Subject    = $subject;
	            $mail->MsgHTML($message);
	            $address = $email;
	            $mail->AddAddress($address, $email);
	            if(!$mail->Send()) {
				   echo "Error sending: " . $mail->ErrorInfo;
				}
				else{
				   echo "E-mail sent to ".$name;
				}
	            $mail->ClearAddresses();

	        } catch (Exception $e) {
	            echo 'Caught exception: ',  $e->getMessage(), "\n";
	        }

?>

