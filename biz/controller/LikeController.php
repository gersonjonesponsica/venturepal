<?php
include '../common/config.php';
include '../model/LikeDB.php';

$like_db = new LikeDB();
	switch ($_POST['action']) {

		case 'Add like':
			$result = $like_db->checkLike($_POST);
			if ($result) {
				 echo ($like_db->updateLike($_POST) ? "trues": "falses");
			}else{
				echo ($like_db->addLike($_POST) ? "true" : "false");
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