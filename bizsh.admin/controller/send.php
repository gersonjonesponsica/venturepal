<?php
	include "../smsGateway.php";
	$_POST['investor_number'] = "09225830606";
	$_POST['msme_name'] = "MSME NAME";
	$_POST['investor_name'] = "gerson";
	$smsGateway = new SmsGateway('jonesgerson29@gmail.com', 'myangelica');

	$deviceID = 71308;
	$number = '+' . $_POST['investor_number'];
	$message = 'Hello '.$_POST['investor_name'].', New Investment '. $_POST['msme_name'];

	$options = [
	'send_at' => strtotime('+3 seconds'), // Send the message in 10 minutes
	'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
	];

	//Please note options is no required and can be left out
	$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID, $options);
	echo json_encode($result);
?>