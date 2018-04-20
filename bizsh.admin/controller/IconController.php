<?php
include '../common/config.php';
include '../model/IconDB.php';

$icon_db = new IconDB();
	switch ($_POST['action']) {
		case 'UploadIcon':
			clearstatcache();
			if(isset($_FILES['files'])) {
				$file_path ='../Icons/';
				
				$result = [];

				foreach($_FILES['files']['name'] as $i=>$filename){
					if(!empty($filename)){
						$result[$i] = [
                        'index'=>$i,
                        'status'=>'Failed',
                        'size'=>$_FILES["files"]["size"][$i]
                    	];
                    	$newfilename = str_replace(' ', '', $_FILES["files"]["name"][$i]);
						$tmp_name = $_FILES['files']['tmp_name'][$i];
						if(pathinfo($filename)['extension'] == 'png'
						|| pathinfo($filename)['extension'] == 'jpg'
						|| pathinfo($filename)['extension'] == 'jpeg'
						|| pathinfo($filename)['extension'] == 'gif' ) {
							if(!file_exists($file_path)) mkdir($file_path);
							if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
								$_POST['file_path'] = $file_path;
                                $_POST['newfilename'] = $newfilename;
                                if($icon_db->checkIconByName($_POST['newfilename']) === 2){
                                	$result[$i]['status'] = "Success";
                                }else if($icon_db->checkIconByName($_POST['newfilename']) === 1){
                                	$result[$i]['status'] = "Duplicate";
                                }else{
	                                if($icon_db->addIcon($_POST))
	                                	$result[$i]['status'] = "Success";
	                                else $result[$i]['status'] = "Failed";
                            	}
							}
						}else $result[$i]['status'] = "Not Image";
						
					}
				}
				echo json_encode($result);
			}else echo "No File/s";
			break;
		case 'Get Icons':
			$result = $icon_db->getAllIcons2();	
			if ($result) {
				echo $result;
			}else
				echo "no icon";
			break;
		case 'Delete Icon':
			if($icon_db->deleteIconByID($_POST['icon_id'])){
				unlink('../Icons/'.$icon_db->getIconByNameByID($_POST['icon_id'])); // delete also in the folder
				echo 'delete';
			}
			else echo 'error';
			break;
		case 'Change Status':
			echo ($icon_db->changeStatus($_POST) ? "true" : "false");	
			break;	
		default:
			# code...
			break;
	}
?>