<?php
include '../common/config.php';
include '../model/ExtensionDB.php';
include '../model/MSMEDB.php';
$extension_db = new ExtensionDB();
$msme_db = new MSMEDB();
	switch ($_POST['action']) {
		case 'Ask 1 week Extension':
			$result = $extension_db->checkExtension($_POST);
			if ($result) {
				echo "exist";
			}else{
				echo ($extension_db->addExtension($_POST) ? "true" : "false");
			}
		case 'Change Status':
			$result = $extension_db->getExcessDays($_POST['msme_id']);
			$days = $result['days'];

			$ext = 7;
			$cnt = 0;
			if($days < 0 ){
				for ($i = $days; $i < 0 ; $i++) { 
					$cnt = $cnt + 1;;
				}
				$ext += $cnt;
			}else{
				$ext += $cnt;
			}
			$result2 = $extension_db->getMsmeApproveDate($_POST['msme_id'], $ext);
			$extension_date = $result2['extension_date'];
			
			$_POST['extension_date'] = $extension_date; 

			$result3 = $extension_db->updateMSMEApproveDate($_POST);
			// echo json_encode($result3);
			if ($result3) {
				$result = $extension_db->updateStatus($_POST);
				if($result){
					echo "true";
				}else
					echo "false";
			}
			
			break;
		break;
	}
?>