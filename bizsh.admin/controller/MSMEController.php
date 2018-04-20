<?php
include '../common/config.php';
include '../model/MSMEDB.php';

$msme_db = new MSMEDB();
	switch ($_POST['action']) {
		case 'Add Temporary MSMEa':
				$_POST['datenow'] = date('Y-m-d H:i:s');
				if ($msme_db->addTemporaryMSME($_POST)) {
				$msme_id = $msme_db->getMSMEbyCreateDate($_POST['datenow'], $_POST['e_id']);
				echo $msme_id;
				}
			break;	
		case 'Get msme investor':	 
			echo ($msme_db->getMsmeInvestor($_POST['msme_id']));
		break;	
		case 'Update':
				echo ($msme_db->addMSME($_POST) ? "true":"false");
			break;
		case 'Get all msme':
				$result = $msme_db->getAllMSME();
				echo ($result ? json_encode($result) : "wala");
			break;
		case 'launch msme':
				echo ($msme_db->updateLaunchMsme($_POST) ? "true":"false");
			break;			
		case 'Get all launch msme':
				$result = $msme_db->getAllLaunchMsme();
				echo json_encode($result);
			break;	
		case 'Get MSME gallery':
			$result = $msme_db->getMsmeGallery($_POST);
				echo ($result ? $result : "wala");
			break;	
		case 'Get MSME document':
			$result = $msme_db->getMsmeDocument($_POST);
				echo ($result ? $result : "wala");
			break;		
		case 'Change Status':
				if($msme_db->updateStatus($_POST)){
					echo ($msme_db->updateCfi($_POST) ? "true":"false");	
				}
				break;		
		case 'Get msme by id':
				$result = $msme_db->getMSMEbyId($_POST);
				echo ($result ? $result :"false");	
				break;	
		case 'Upload MSME business permit':
			clearstatcache();
			if(!empty(($_FILES['biz_permit']))) {
				$msme_folder = md5($_POST['msme_id']);
				$entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
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
				$file_path ='../Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
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
				$file_path ='../Documents/Documents/'.$entrep_folder.'/'.$msme_folder;
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
				$file_path ='../Entrep/'.$entrep_folder.'/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path);
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
				$file_path ='../Documents/Gallery/'.$entrep_folder.'/'.$msme_folder;
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
                                if($msme_db->UploadMSMEDocumentGallery($_POST))
                                	$result[$i]['status'] = "Success";
                                else $result[$i]['status'] = "Failed";
							}
						}else $result[$i]['status'] = "Not Image";
					}
				}
				echo json_encode($result);
			}else echo "No File/s";
			break;	
	}
?>