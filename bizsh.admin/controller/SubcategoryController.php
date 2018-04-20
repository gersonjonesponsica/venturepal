<?php
include '../common/config.php';
include '../model/SubcategoryDB.php';

$subcategory_db = new SubcategoryDB();
	switch ($_POST['action']) {
		case 'Add-Subcategory':	
			$result = $subcategory_db->addSubcategory($_POST);
			if($result){
				echo "good";
			}else
				echo "error";
			break;
		case 'Get Category By ID':
			$result = $subcategory_db->getCategoryByID($_POST['cat_id']);
			echo $result;
			break;
		case 'Edit Category':
			 if($subcategory_db->editQuestion($_POST)) {
	             echo 'true';
	         } else {
	             echo 'false';
	         }
	        break;
	    case 'Delete Subcategory':
	    	if($subcategory_db->deleteSubCategoryByID($_POST['cat_id'])) {
	             echo 'true';
	        } else {
	             echo 'false';
	        }
	        break;
	    case 'Get All Subcategory':
	    	 $result = $subcategory_db->getAllSubcategory();
	    	 echo $result;
	     	break;
		case 'Change Status':
			$result = $subcategory_db->updateStatus($_POST);
			if($result){
				echo "true";
			}else
				echo "false";
			break;	 
		default:
			# code...
			break;
	}
?>