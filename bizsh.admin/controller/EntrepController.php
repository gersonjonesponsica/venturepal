<?php
include '../common/config.php';
include '../model/EntrepDB.php';

$entrep_db = new EntrepDB();
	switch ($_POST['action']) {

		case 'Delete Admin':
			$result = $admin_db->deleteAdminByID($_POST['admin_id']);
			if($result){
				echo "true";
			}else
				echo "false";
			break;
		case 'Check Username':
			$result = $admin_db->checkAdminUsername($_POST['username']);
			if($result){
				echo "naa";
			}else
				echo "wala";
			break; 
		case 'Change Status':
			$result = $entrep_db->updateStatus($_POST);
			if($result){
				echo "true";
			}else
				echo "false";
			break;
	 	
		case 'Get Entrep By ID':
			$result = $entrep_db->getEntrepByAccountID($_POST['acc_id']);
			echo ($result ? $result : "false" );
			break;		
		case 'Upload Entrep Photo':
			clearstatcache();
			if(!empty(($_FILES['photos']))) {
				$file_path ='../Entrep/';
				if(!file_exists($file_path)) mkdir($file_path);
				$newfilename = str_replace(' ', '', $_FILES["photos"]["name"]);
				$tmp_name = $_FILES['photos']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $newfilename;
                    echo ($entrep_db->UploadEtrepImage($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;
		case 'Update Entrep':
			echo ($entrep_db->UploadEtrepDetails($_POST) ? "true" : "false");
			break;				
		default:
			# code...
			break;
	}
?>