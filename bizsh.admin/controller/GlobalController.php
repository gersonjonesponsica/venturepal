<?php
include '../common/config.php';
include '../model/GlobalDB.php';

$global_db = new GlobalDB();
	switch ($_POST['action']) {
		case 'Get all province':	
			$result = $global_db->getAllProvince($_POST);
			echo $result;
			break;
		case 'Get all city by province':
			$result = $global_db->getAllCityByProvinceID($_POST['province_id']);
			echo $result;
			break;	
		case 'Get address':
			$result = $global_db->getAddress($_POST);
			echo $result;
			break;
		// case 'Get city by id':
		// 	$result = $global_db->getCityById($_POST['city_id']);
		// 	echo $result;
		// 	break;			
		case 'Search Entrep':
				echo $global_db->getAllEntrepBySearch($_POST);
				break;	
		default:
			# code...
			break;
	}
?>