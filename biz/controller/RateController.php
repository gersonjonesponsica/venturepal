<?php
include '../common/config.php';
include '../model/RateDB.php';

$rate_db = new RateDB();
	switch ($_POST['action']) {
		case 'Add rate':
			echo ($rate_db->addRate($_POST) ? "true" : "false");
		break;
		case 'Check rate and review':
			$result = $rate_db->checkRate($_POST);
			echo json_encode(($result ? $result: "wala"));
			break;
		default:
		break;
	}
?>