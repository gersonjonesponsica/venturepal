<?php
include '../common/config.php';
include '../model/AddressDB.php';

$address_db = new AddressDB();
	switch ($_POST['action']) {
		case 'Get all state':	
			$result = $address_db->getAllState();
			if($result){
				echo $result;
			}
		break;
		case 'Get all city':	
			$result = $address_db->getAllCities($_POST['prov_id']);
			if ($result) {
				echo $result;
			}
		break;
		case 'Get address':
			$result = $address_db->getAddress($_POST);
			echo $result;
			break;
		default:
		break;
	}
?>