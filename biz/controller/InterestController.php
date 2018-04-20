<?php
include '../common/config.php';
include '../model/InterestDB.php';

$interest_db = new InterestDB();
	switch ($_POST['action']) {
		case 'Add Interest':
			$result = $interest_db->checkInterest($_POST);
			if ($result) {
				echo ($interest_db->updateInterest($_POST) ? "trues": "falses");
			}else{
				echo ($interest_db->addInterest($_POST) ? "true" : "false");
			}
		break;
		case 'Get investor interest':
			$result = $interest_db->getInvestorInterest($_POST);
			echo ($result ? $result: "wala");
			break;
		default:
		break;
	}
?>