<?php
include '../common/config.php';
include '../model/CategoryDB.php';

$category_db = new CategoryDB();
	switch ($_POST['action']) {
		case 'Add-Category':	
			$result = $category_db->addCategory($_POST);
			if($result){
				echo "good";
			}else
				echo "error";
			break;
		case 'Get Category By ID':
			$result = $category_db->getCategoryByID($_POST['cat_id']);
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
	     	$result = $category_db->updateStatus($_POST);
	     	echo ($result ? "true" : "false");
	     	break; 
		default:
			# code...
			break;
	}
?>