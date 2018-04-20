<?php
include '../common/config.php';
include '../model/DashboardDB.php';

$dashboard_db = new DashboardDB();
	switch ($_POST['action']) {
		case 'Total raised amount':
			$result = $dashboard_db->getTotalRaisedAmount();
			echo $result;
			break;
		case 'msme that will close in 7 days':
			$result = $dashboard_db->getCountClose();
			echo $result;
			break;
		case 'total pending investment':
			$result = $dashboard_db->getTotalPending();
			echo $result;
			break;
		case 'total deal investment':
			$result = $dashboard_db->getTotalnvestment();
			echo $result;
			break;	
		case 'registered entrepreneur':
			$result = $dashboard_db->getTotalEntrep();
			echo $result;
			break;
		case 'registered investor':
			$result = $dashboard_db->getTotalInvestor();
			echo $result;
			break;
		case 'total msme':
			$result = $dashboard_db->getTotalMsme();
			echo $result;
			break;
		case 'msmes raised 100%':
			$result = $dashboard_db->getMsmeRaised100();
			echo $result;
			break;				
		default:
			# code...
			break;
	}
?>