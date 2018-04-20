<?php
include '../common/config.php';
include '../model/AdminDB.php';

$admin_db = new AdminDB();
	switch ($_POST['action']) {
		case 'Login':	 
		$result = $admin_db->loginAdmin($_POST);
	         if($result) {
          		session_start();
	             $_SESSION['islogin'] = true;
	             $_SESSION['admin_id'] = $result['admin_id'];
	             $_SESSION['username'] = $result['username'];
	             echo 'true';
	         } else {
	             echo 'no account';
	         }
			break;
		case 'Add Admin':
			$result = $admin_db->addAdmin($_POST);
			if($result){
				echo "true";
			}else
				echo "false";
			break;
		case 'Delete Admin':
			$result = $admin_db->deleteAdminByID($_POST['admin_id']);
			if($result){
				echo "true";
			}else
				echo "false";
			break;
		case 'Check Username':
			$result = $admin_db->checkAdminUsername($_POST['username']);
			if($result){
				echo "naa";
			}else
				echo "wala";
			break; 
		case 'Change Status':
			$result = $admin_db->updateStatus($_POST);
			if($result){
				echo "true";
			}else
				echo "false";
			break; 			
		default:
			# code...
			break;
	}
?>