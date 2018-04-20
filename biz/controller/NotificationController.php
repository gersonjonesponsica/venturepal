<?php
include '../common/config.php';
include '../model/NotificationDB.php';
include '../model/TimeDateDB.php';
$td = new TimeDateDB();
$noti_db = new NotificationDB();
	switch ($_POST['action']) {
		case 'Notification':
			if ($_POST['type'] == '3') {
				if ($noti_db->checkUserNotification($_POST)) {
					echo "exist";
				}else{
					echo ($noti_db->notification($_POST) ? "true" : "false");
				}
			}else{
				echo ($noti_db->notification($_POST) ? "true" : "false");	
			}
			break;
		case 'Check user notification':
				$result = $noti_db->checkUserNotification($_POST);
				echo ($result ? $result : "wala");
			break;
		case 'Get user notification':
				$result = $noti_db->getUserNotification($_POST);
				echo ($result ? $result : "wala");
			break;
		case 'Get user unread notification':
				$result = $noti_db->getUserNotificationCountUnread($_POST);
				echo ($result ? $result : "wala");
			break;	
		case 'Get user read notification':
				$result = $noti_db->getUserNotificationCountRead($_POST);
				echo ($result ? $result : "wala");
			break;	
		case 'Get time ago notification':
				echo $td->time_ago($_POST['noti_date']);
			break;
		case 'Update notification status':
				echo ($noti_db->updateNotification($_POST) ? "true" : "false");				
			break;				
		default:
		break;
	}
?>