<?php
include '../common/config.php';
include '../model/PayoutDB.php';

$payout_db = new PayoutDB();
	switch ($_POST['action']) {
		case 'Check payout':
			$result = $payout_db->checkPayout($_POST);
			echo ($result ? $result: "wala");
			break;
		case 'Check payout by id':
			$result = $payout_db->checkPayoutById($_POST);
			echo ($result ? $result: "wala");
			break;
		case 'get payment history':
		$array = array();
			for ($i=$_POST['from']; $i <= $_POST['to']; $i++) { 
				# code...
				$_POST['month'] = $i;
				$result2 = $payout_db->getPaymentHistory($_POST);
				array_push($array, $result2);
			}
			
			echo ($array ? json_encode($array): "wala");
			break;
		case 'Add Payout':
			clearstatcache();
			if(!empty(($_FILES['p_payout']))) {
				$msme_folder = md5($_POST['entrepid']);
				// $entrep_folder = md5($_POST['entrep_id']);
				$file_path ='../../bizsh.admin/Proof of Payment/'.$msme_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["p_payout"]["name"]);
				$tmp_name = $_FILES['p_payout']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path .'/'. $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $msme_folder.'/'.$newfilename;
                    echo ($payout_db->addPayout($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;
		case 'Investor Earnings':
				$result = $payout_db->InvestorEarning($_POST);
				echo ($result ? $result: "wala");
				break;		
		case 'Investor Total Earnings':
				$result = $payout_db->InvestorTotalEarning($_POST);
				echo ($result ? $result: "wala");
				break;			
		default:
		break;
	}
?>