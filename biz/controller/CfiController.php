<?php
include '../common/config.php';
include '../model/CfiDB.php';

$cfi = new CfiDB();
	switch ($_POST['action']) {
		case 'Add CFI':
				echo $cfi->addCfi($_POST);
			break;
		case 'Get CFI id':
				echo $cfi->getCfiId($_POST);
			break;
		case 'End Investment':
				echo $cfi->endInvestment($_POST);
			break;												
		default:
			break;
	}
?>