<?php
include '../common/config.php';
include '../model/IconDB.php';

$icon_db = new IconDB();
	switch ($_POST['action']) {
		case 'Get Icon':	
			$result = $icon_db->getAllIcons();
			if($result){
				echo $result;
			}
		default:
			break;
	}
?>