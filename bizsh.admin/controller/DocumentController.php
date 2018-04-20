<?php
include '../common/config.php';
include '../model/DocumentDB.php';

$document_db = new DocumentDB();
	switch ($_POST['action']) {
		case 'UploadDocument':
			clearstatcache();
			if(isset($_FILES['files'])) {
				$folder = $_POST['admin_username'];
				$file_path ='../Documents/';
				$result = [];
				foreach($_FILES['files']['name'] as $i=>$filename){
					if(!empty($filename)){
						$result[$i] = [
                        'index'=>$i,
                        'status'=>'Failed',
                        'size'=>$_FILES["files"]["size"][$i]
                    	];
                    	$newfilename = $_FILES["files"]["name"][$i];
						if($_FILES["files"]["size"][$i] > 2000000)
							$result[$i]['status'] = "Size Limit";
						else{
							$tmp_name = $_FILES['files']['tmp_name'][$i];
							if(pathinfo($filename)['extension'] == 'pdf') {
								if(!file_exists($file_path)) mkdir($file_path);
								if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
									$_POST['file_path'] = $file_path;
	                                $_POST['newfilename'] = $newfilename;
	                                if($document_db->addDocument($_POST)) $result[$i]['status'] = "Success";
	                                else $result[$i]['status'] = "Failed";
								}
							}else $result[$i]['status'] = "Not PDF";
						}
					}
				}
				echo json_encode($result);
			}else echo "No File/s";
			break;
		case 'Delete Document':
				if($document_db->deleteDocumentByID($_POST['doc_id'])){ 
					// unlink("folder/path/".$row['file']); // delete also in the folder
					echo "delete";
				}else echo "error";
				break;	
		case 'Change Status':
					if($document_db->changeStatus($_POST)){ echo "true"; }else echo "false";
				break;		
		default:
			# code...
			break;
	}
?>