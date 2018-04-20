<?php
include '../common/config.php';
include '../model/MsmeVenturerDB.php';
include '../model/CfiDB.php';

$mv_db = new MsmeVenturerDB();
$cfi_db = new CfiDB();
	switch ($_POST['action']) {
		case 'add investment':
			$result = $mv_db->checkInvestment($_POST);
			if ($result) {
				echo "exist";
			}else{
				$result2 = $cfi_db->getCfiId($_POST);
				$_POST['cfi_id'] = $result2;
				echo ($mv_db->addInvestment($_POST) ? "true" : "false");
			}
			break;
		// case 'Check investor contract':
		// 		$result = $noti_db->checkInvestorContract($_POST);
		// 		echo ($result ? $result : "wala");
		// 	break;
		default:
		break;
	}
?>