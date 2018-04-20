<?php
include '../common/config.php';
include '../model/ApplicationDB.php';

$app_db = new ApplicationDB();
	switch ($_POST['action']) {
		case 'Review Contract':
			$result = $app_db->getContractById($_POST);
			echo $result;
			break;
		case 'Edit Category':
			 if($category_db->editCategory($_POST)) {
	             echo 'true';
	         } else {
	             echo 'false';
	         }
	        break;
	    case 'Delete Category':
	    	if($category_db->deleteCategoryByID($_POST['cat_id'])) {
	             echo 'true';
	        } else {
	             echo 'false';
	        }
	        break;
	    case 'Change Status':
	     	$result = $app_db->updateStatus($_POST);
	     	echo ($result ? "true" : "false");
	     	break; 
		default:
			# code...
			break;
	}
?>