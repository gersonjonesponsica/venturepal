<?php
include '../common/config.php';
include '../model/AccountDB.php';

$account_db = new AccountDB();
	switch ($_POST['action']) {
		case 'Get all accounts':
			echo json_encode($account_db->getAllAccount());
			break;
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
		case 'Delete account':
			$result = $account_db->deleteAccountByID($_POST['acc_id']);
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
			$result = $account_db->updateStatus($_POST);
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