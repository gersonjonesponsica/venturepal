<?php
include '../common/config.php';
include '../model/NotificationDB.php';
include "../smsGateway.php";
$noti_db = new NotificationDB();
	switch ($_POST['action']) {
		case 'Send Email Notification':	 
			$email = $_POST['email'];
			$name = $_POST['name'];
			$msme = $_POST['msme_name'];
			$message = "					
				Hello $name,
				<br /><br />
			    $msme is looking for investors. Investment Oppurtunity is fit to you.";
				
			$subject = "Confirm Registration";
	        try {
	            require_once('../mailer/class.phpmailer.php');
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
				   echo "E-mail sent to ".$email;
				}
	            $mail->ClearAddresses();

	        } catch (Exception $e) {
	            echo 'Caught exception: ',  $e->getMessage(), "\n";
	        }
			break;
		case 'Send sms Notification':
				echo $noti_db->sendSms($_POST);
				break;	
		case 'Get all match investor':
				echo $noti_db->getAllMatchInvestors($_POST['msme_id']);
				break;
		case 'Get notification for logs':
				echo $noti_db->getAllNotificationLogs();
				break;			
		default:
			# code...
			break;
	}
?>