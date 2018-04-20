<?php
include '../common/config.php';
include '../model/InvestorDB.php';

$investor_db = new InvestorDB();
	switch ($_POST['action']) {
		case 'Change Status':
			$result = $investor_db->updateStatus($_POST);
			if($result){
				echo "true";
			}else
				echo "false";
			break; 	
		case 'Get Investor details':
			$result = $investor_db->getInvestorDetails($_POST);
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
		case 'Update Investor Wallet':
			echo ($investor_db->updateInvestorWallet($_POST) ? "true" : "false");
			break;					
		default:
			# code...
			break;
	}
?>