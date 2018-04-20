<?php
include '../common/config.php';
include '../model/MessageDB.php';
include '../model/GlobalDB.php';

$message_db = new MessageDB();
$global_db = new GlobalDB();
	switch ($_POST['action']) {
		case 'Get message by id':
			$result = $message_db->getMessageByID($_POST['message_id']);
			echo $result;
			break;
		case 'Get sender details by account id and type':
			$type = $global_db->getAccountType($_POST['from_id']);
			$_POST['account_type'] = $type;
			$result = $global_db->getSenderDetailsByAccountIDandType($_POST);
	        if ($result) {
	        	echo $result;
	        } 
	        break;
	    case 'Delete Question':
	    	if($question_db->deleteQuestionByID($_POST['question_id'])) {
	             echo 'true';
	        } else {
	             echo 'false';
	        }
	        break;
	    case 'Reply message':
	    	$result = $message_db->send_mail($_POST['to'],$_POST['message'],$_POST['subject']);
	    	if ($result) {
	    		echo $result;
	    	}
	    	break;
		default:
			# code...
			break;
	}
?>