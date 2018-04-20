<?php
include '../common/config.php';
include '../model/MsmeDB.php';

$msme_db = new MsmeDB();
	switch ($_POST['action']) {
		case 'Get all investor msme match sort by percent raised':	 
			echo ($msme_db->getAllMsmeMatchByInvestor($_POST));
		break;
		case 'Get summary':	 
			echo ($msme_db->getSummary());
		break;
		case 'Cycle Details':	 
			echo ($msme_db->getCycleDetails($_POST));
		break;
		case 'Extension duration':	 
			echo ($msme_db->extendMsmeDuration($_POST));
		break;
		case 'Get msme investor':	 
			echo ($msme_db->getMsmeInvestor($_POST['msme_id']));
		break;
		case 'Get msme investor who subscribe':	 
			echo ($msme_db->getMsmeInvestorSubscribe($_POST['msme_id']));
		break;
		case 'get Investor Msme History':	 
			echo ($msme_db->getInvestorMsmeHistory($_POST['msme_id'], $_POST['v_id']));
		break;
		case 'Get msme investor 2':	 
			echo ($msme_db->getMsmeInvestor2($_POST['msme_id'], $_POST['v_id']));
		break;
		case 'Get Entrep MSME 2':	 
			echo ($msme_db->getAllEntrepMSMEbyID2($_POST['entrep_id']));
		break;
		case 'Get Entrep MSME':	 
			echo ($msme_db->getAllEntrepMSMEbyID($_POST['entrep_id']));
		break;
		// case 'Get Approve date msme':	 
		// 	echo ($msme_db->getMsmeApproveDate($_POST));
		// break;	
		case 'Add Temporary MSMEa':
			// session_start();
			// $_SESSION['msme_portfolio'] = $_POST;
			$_POST['datenow'] = date('Y-m-d H:i:s');
			if ($msme_db->addTemporaryMSME($_POST)) {
			$msme_id = $msme_db->getMSMEbyCreateDate($_POST['datenow'], $_POST['e_id']);
			echo $msme_id;
			}
			break;	
		case 'Upload MSME business permit':
			clearstatcache();
			if(!empty(($_FILES['biz_permit']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["biz_permit"]["name"]);
				$tmp_name = $_FILES['biz_permit']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                    echo ($msme_db->UploadBizPermit($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;
		case 'Upload MSME mayor permit':
			clearstatcache();
			if(!empty(($_FILES['may_permit']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["may_permit"]["name"]);
				$tmp_name = $_FILES['may_permit']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                    echo ($msme_db->UploadMayorPermit($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;	
		case 'Upload MSME DTI':
			clearstatcache();
			if(!empty(($_FILES['d_permit']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["d_permit"]["name"]);
				$tmp_name = $_FILES['d_permit']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                    echo ($msme_db->UploadDTICertificate($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;				
		case 'Upload MSME Photo':
			clearstatcache();
			if(!empty(($_FILES['b_photo']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Entrep/'.$entrep_folder.'/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["b_photo"]["name"]);
				$tmp_name = $_FILES['b_photo']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                    echo ($msme_db->UploadMSMEPhoto($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;			
		case 'Upload MSME Gallery':
			clearstatcache();
			if(!empty(($_FILES['b_gallery']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Documents/Gallery/'.$entrep_folder.'/'.$msme_folder;
				$result = [];
				foreach($_FILES['b_gallery']['name'] as $i=>$filename){
					if(!empty($filename)){
						$result[$i] = [
                        'index'=>$i,
                        'status'=>'Failed',
                        'size'=>$_FILES["b_gallery"]["size"][$i]
                    	];
                    	$newfilename = str_replace(' ', '', $_FILES["b_gallery"]["name"][$i]);
						$tmp_name = $_FILES['b_gallery']['tmp_name'][$i];
						if(pathinfo($filename)['extension'] == 'png'
						|| pathinfo($filename)['extension'] == 'jpg'
						|| pathinfo($filename)['extension'] == 'jpeg'
						|| pathinfo($filename)['extension'] == 'gif' ) {
							if(!file_exists($file_path)) mkdir($file_path, 0777, true);
	
							if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
								$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                                if($msme_db->UploadMSMEGallery($_POST))
                                	$result[$i]['status'] = "Success";
                                else $result[$i]['status'] = "Failed";
							}
						}else $result[$i]['status'] = "Not Image";
					}
				}
				echo json_encode($result);
			}else echo "No File/s";
			break;
		case 'Upload Business Documents':
			clearstatcache();
			if(!empty(($_FILES['b_documents']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
				$result = [];
				foreach($_FILES['b_documents']['name'] as $i=>$filename){
					if(!empty($filename)){
						$result[$i] = [
                        'index'=>$i,
                        'status'=>'Failed',
                        'size'=>$_FILES["b_documents"]["size"][$i]
                    	];
                    	$newfilename = str_replace(' ', '', $_FILES["b_documents"]["name"][$i]);
						$tmp_name = $_FILES['b_documents']['tmp_name'][$i];
						// if(pathinfo($filename)['extension'] == 'png'
						// || pathinfo($filename)['extension'] == 'jpg'
						// || pathinfo($filename)['extension'] == 'jpeg'
						// || pathinfo($filename)['extension'] == 'gif' ) {

							if(!file_exists($file_path)) mkdir($file_path, 0777, true);
	
							if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
								$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $entrep_folder.'/'.$msme_folder.'/'.$newfilename;
                                if($msme_db->UploadMSMEDocument($_POST))
                                	$result[$i]['status'] = "Success";
                                else $result[$i]['status'] = "Failed";
							}
						// }else $result[$i]['status'] = "Not Image";
					}
				}
				echo json_encode($result);
			}else echo "No File/s";
			break;
		case 'Update':
				 echo ($msme_db->addMSME($_POST) ? "true":"false");
		case 'Get MSME by id':
				$result = $msme_db->getMsmeById($_POST);
				echo ($result ? $result : "wala");
			break;
		case 'Get MSME gallery':
			$result = $msme_db->getMsmeGallery($_POST);
				echo ($result ? $result : "wala");
			break;	
		case 'Get MSME document':
			$result = $msme_db->getMsmeDocument($_POST);
				echo ($result ? $result : "wala");
			break;
		case 'Update msme desc':
				echo ($msme_db->updateMsmeDesc($_POST) ? "true":"false");
			break;
		case 'Delete document':
			echo ($msme_db->deleteDocumentByID($_POST) ? "true":"false");
			break;
		case 'Delete Gallery':
			echo ($msme_db->deleteDocumentByID($_POST) ? "true":"false");
			break;
		case 'Update Coordinate':
			echo ($msme_db->updateCoordinate($_POST) ? "true":"false");
			break;		
		case 'Update Coordinate':
			echo ($msme_db->updateCoordinate($_POST) ? "true":"false");
			break;				
		case 'Update business details':
			echo ($msme_db->updateBusinessDetails($_POST) ? "true":"false");
			break;
		case 'Update contact details':
			echo ($msme_db->updateContactDetails($_POST) ? "true":"false");
			break;	
		case 'Update msme category':
			echo ($msme_db->updateMsmeCategory($_POST) ? "true":"false");
			break;		
		case 'Get partly funded msme':
				$result = $msme_db->getPartlyFunded($_POST);
				echo ($result ? $result : "false");
			break;		
		case 'Get popular msme':
			$result = $msme_db->getPopularMSME($_POST); 
			echo ($result ? $result : "false"); 
			break;			
		case 'Search msme': 
			$result = $msme_db->searchMsme($_POST); 
			echo ($result ? $result : "false"); 
			break;	
	}
?>

