<?php
include '../common/config.php';
include '../model/CategoryDB.php';

$category_db = new CategoryDB();
	switch ($_POST['action']) {
		case 'Get Subcategory':	
			$result = $category_db->getSubcategoryByCatID($_POST['cat_id']);
			if($result){
				echo $result;
			}
		break;
		case 'Get All Subcategory':
				echo $category_db->getAllSubcategory();
			break;
		case 'Get Sub by id':
				echo $category_db->getSubcategoryByID($_POST['sub_id']);
				break;
		case 'Get all category':
				echo $category_db->getAllCategory2();
				break;
		case 'Get Feature':
				echo $category_db->getFeature($_POST['cat_id']);
				break;
		case 'Get Top one':
				echo $category_db->getTopOne($_POST);
				break;									
		default:
			break;
	}
?>