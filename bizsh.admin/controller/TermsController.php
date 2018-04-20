<?php
include '../common/config.php';
include '../model/TermsDB.php';

$terms_db = new TermsDB();
	switch ($_POST['action']) {
		case 'Add Terms':
			$result = $terms_db->checkTerms($_POST);
			if ($result) {
				echo ($terms_db->updateTerms($_POST) ? "trues": "false");
			}else{
				echo ($terms_db->addTerms($_POST) ? "true" : "false");
			}
		break;
		case 'Get Terms':
			$result = $terms_db->checkTerms($_POST);
			echo ($result ? json_encode($result) : "false");
			break;
		default:
		break;
	}
?>