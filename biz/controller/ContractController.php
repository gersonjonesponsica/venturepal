<?php
include '../common/config.php';
include '../model/ContractDB.php';

$contract_db = new ContractDB();
	switch ($_POST['action']) {
		case 'Upload Contract':
			echo ($contract_db->UploadContract($_POST) ? "true" : "false");
			break;
		// case 'Get Contract Details':
		// 		$result = $contract_db->getInvestorPendingApplication($_POST);
		// 	 	echo ($result ? $result : "wala");
		// 		break;	
		case 'Upload proof of investment':
			clearstatcache();
			if(!empty(($_FILES['investment']))) {
				$file_path ='../../bizsh.admin/Contract/';
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["investment"]["name"]);
				$tmp_name = $_FILES['investment']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $newfilename;
                    echo ($contract_db->UploadProofofInvestment($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
		break;
		case 'Upload Contract with sign':
			clearstatcache();
			if(!empty(($_FILES['contract']))) {
				$file_path ='../../bizsh.admin/Contract/';
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["contract"]["name"]);
				$tmp_name = $_FILES['contract']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $newfilename;
                    echo ($contract_db->UploadSignedContract($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
		break;
		case 'Total Pending application':
			$result = $contract_db->getInvestorPendingApplication($_POST);
			echo ($result ? $result : "wala");
			break;	
		case 'Get investor investment':
				$result = $contract_db->getInvestorInvestment($_POST);
				echo ($result ? $result : "wala");
				break;	
		case 'Check investor contract':
				$result = $contract_db->checkInvestorContract($_POST);
				echo ($result ? $result : "wala");
			break;
		case 'check contract duration':
			$now = new DateTime();
            $cur =  $now->format('Y-m-d H:i:s'); 

            $then = $_POST['contract_date'];
            
            $then = new DateTime($then);
            $now = new DateTime();
            $sinceThen = $then->diff($now);
            $arrayName = array('day' => $sinceThen->d, 
            				   'hour' => $sinceThen->h,
            				   'minute' => $sinceThen->i,
            				   'seconds' => $sinceThen->s);
            echo json_encode( $arrayName);
			break;	
		default:
		break;
	}
?>