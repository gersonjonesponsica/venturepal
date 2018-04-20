<?php
include '../common/config.php';
include '../model/WithdrawDB.php';

$db = new WithdrawDB();
	switch ($_POST['action']) {

		case 'Add like':
			$result = $db->checkWithdraw($_POST);
			if (!$result) {
				 echo ($db->addWithdraw($_POST) ? "true" : "false");
			}
		break;
		case 'Check like status':
			$result = $like_db->checkLike($_POST);
			echo json_encode($result);
			break;
		case 'Get Like Investor':
			$result = $like_db->getLikeInvestor($_POST);
			echo $result ? $result :"wala" ;
			break;	
		default:
		break;
	}
?>