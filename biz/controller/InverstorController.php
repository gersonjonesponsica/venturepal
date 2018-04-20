<?php
include '../common/config.php';
include '../model/AccountsDB.php';
include '../model/InvestorDB.php';

$investor_db = new InvestorDB();
	switch ($_POST['action']) {
		case 'addInvestor':	 
		echo "addInvestor";
		break;
		case 'Investor Profile':	 
		$result = $investor_db->getInvestorById($_POST['investor_id']);
		break;
		case 'Update wallet':
			break;	
	}
?>