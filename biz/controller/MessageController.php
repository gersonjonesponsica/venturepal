<?php
include '../common/config.php';
include '../model/MessageDB.php';
include '../model/AccountsDB.php';

$message_db = new MessageDB();
	switch ($_POST['action']) {
		case 'Send message not login':
			 $result = $message_db->sendMesageToAdminNotLogin($_POST);
			 if($result){
			 	echo 'success';
			 }else
			 	echo 'error';
			 break;
		case 'Send message login':
			 $result = $message_db->sendMesageToAdminLogin($_POST);
			  if($result){
			  	echo 'success';
			  }else
			  	echo 'error';
			 	break;
		case 'Send Message all':
				 echo($message_db->sendMessage($_POST) ? "true" : "false");
				 $result = $message_db->getInvestorEmailById($_POST);

				 require '../../ventureMobile/sendSinglePush.php?title=New message&message='.$_POST['message'].'&email='.$result['investor_email'].'&senderId='.$_POST['from_id'].'&receiverId='.$_POST['to_id'].'&usertype=2&messageType=1';
			 break;	 
		case 'Get all user convo':
 		 		 $result = $message_db->getUserConvo($_POST);
 		 		 echo ($result ? $result : "false");
 		 	break;
 		 case 'Get name current convo':
 		 		 $result = $message_db->getNameCurrentConvo($_POST);
 		 		 echo $result;
 		 	break;
 		 case 'Get choosen convo':
 		 		$result = $message_db->getChoosenConvo($_POST);
 		 		 echo ($result ? $result : "false");
 		 		break;
 		 	case 'get last message':
 		 		$result = $message_db->getLastMessage($_POST);
 		 		echo ($result ? $result : "false"); 		 	
 		 		break;		 		 	
		default:
			break;
	}
?>