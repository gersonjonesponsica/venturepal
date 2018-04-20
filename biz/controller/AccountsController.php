<?php
include '../common/config.php';
include '../model/AccountsDB.php';
include '../model/InvestorDB.php';
include '../model/EntrepDB.php';
include '../model/NotificationDB.php';

$noti_db = new NotificationDB();
$investor_db = new InvestorDB();
$entrep_db = new EntrepDB();
$accounts_db = new AccountsDB();
	switch ($_POST['action']) {
		case 'Login':	
		$result = $accounts_db->loginUser($_POST);
	         if($result) {
	          	if($result['acc_status'] == 1){
	          		session_start();
		            $_SESSION['islogin'] = true;
		            $_SESSION['userid'] = $result['acc_id'];
                 	$_SESSION['useremail'] = $result['acc_email'];
                 	$_SESSION['username'] = $result['acc_username'];	
                 	$_SESSION['user_type'] = $result['acc_type'];

                 	$_SESSION['account_id'] = ($result['acc_type'] == 1 ? $result['investor_id'] : $result['investee_id']);
                 	$accounts_db->createLoginLog($result['acc_id']);
		            echo "true".$result['acc_type'];
	          	}else if($result['acc_status'] == 0){
	          		echo "inactive";
		         }
	         } else {
	             echo "no account";
	         }
			break;
		case 'Register':
			if($accounts_db->checkEmail($_POST['email']) == ''){
				if($_POST['type']  == 1){
					if($investor_db->addInvestor($_POST['email'])){
						$_POST['investor_id'] = 
						$investor_db->getInvestorIdByEmail($_POST['email']);
							$code = md5(uniqid(rand()));
							$_POST['code'] = $code;
							$result = $accounts_db->createAccount($_POST);
							if($result){ 
								$id = $accounts_db->getUserIDbyEmail($_POST['email']);
								$username = $_POST['username'];
								$key = base64_encode($id);
								$id = $key;
								$message = "					
									Hello $username,
									<br /><br />
									Welcome to VenturePal<br/>
									To complete your registration  please , just click following link<br/>
									<br /><br />
									<a href='http://localhost:8080/Biz/confirmation.php?id=$id&code=$code'>Click HERE to Activate :)</a>
									<br /><br />
									Thanks,";
									
								$subject = "Confirm Registration";

								$accounts_db->send_mail($_POST['email'],$message,$subject);
			          			echo "Send";			
							}else{
								echo "Error";
								}
							}
						}else{
						if($entrep_db->addEntrep($_POST['email'], date("Y-m-d H:i:s"))){
							$_POST['investor_id'] = 
							$entrep_db->getEntrepIdByEmail($_POST['email']);
								$code = md5(uniqid(rand()));
								$_POST['code'] = $code;
								$result = $accounts_db->createAccount($_POST);
								if($result){
									$id = $accounts_db->getUserIDbyEmail($_POST['email']);
									$username = $_POST['username'];
									$key = base64_encode($id);
									$id = $key;
									$message = "					
										Hello $username,
										<br /><br />
										Welcome to VenturePal<br/>
										To complete your registration  please , just click following link<br/>
										<br /><br />
										<a href='http://localhost:8080/Biz/confirmation.php?id=$id&code=$code'>Click HERE to Activate :)</a>
										<br /><br />
										Thanks,";
									$subject = "Confirm Registration";
									$accounts_db->send_mail($_POST['email'],$message,$subject);
				          			echo "Send";			
								}else{
									echo "Error";
									}
								}
							}
					}else
						echo "Exist";
			break;
		case 'Confirm':
			if($accounts_db->confirmRegistration($_POST)){
				echo "confirm";
			}else
				echo "error";
			break;
		case 'Change password':
			if($accounts_db->changePassword($_POST)){
				echo "true";
			}else
				echo "error";
			break;

		case 'Forget':
			$id = $accounts_db->getUserIDbyEmail($_POST['email']);
			 if(count($id) == 1){
			 	$id = base64_encode($id);
			 	$code = md5(uniqid(rand()));
			 	$_POST['token'] =$code; 
			 	if($accounts_db->updateUserToken($_POST)){
				$email = $_POST['email'];
				$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
				   <br />
						<a href='http://localhost:8080/Biz/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
				   <br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				
				   <br /><br />
				   thank you :)
				   ";
					$subject = "Password Reset";
					
					$accounts_db->send_mail($email,$message,$subject);
					echo "send";
				}
			}else
				echo "not found";
			break;	
		case 'Reset':
			if($accounts_db->resetUserPassword($_POST)){
				echo "reset";
			}else
				echo "no reset";
			break;	
		case 'Get sender details by id':
				$result = $accounts_db->getUserDetailsByIdAndType($_POST['sender_type'], $_POST['sender_id']);
				echo $result;
				break;	

		case 'Get profile':
				$result = $accounts_db->getAccountDetailsByIDandType($_POST);
				if ($result) {
					echo $result;
				}
				break;	
		case 'Update Wallet':
				echo ($accounts_db->updateInvestorWallet($_POST) ? "true" : "false" );
				break;
		case 'Send phone verification code':
				$code = mt_rand(100000,999999);;
			 	$_POST['phone_code'] = $code;
				$result = $accounts_db->saveVerificationCode($_POST);
				$result2 = $noti_db->sendSms($_POST);
				echo $result2;
				// /echo ($result ? "true" : "false");
				break;		
		case 'Verify phone':
			$result = $accounts_db->getVerificationCode($_POST);
				if ($result == $_POST['p_code']) {
					$result2 = $accounts_db->updateVerificationCode($_POST);
					echo ( $result2 ? "true" : "false" );
				}else{
					echo "false";
				}
				break;

		case 'Update Contact':
				echo ($accounts_db->updateInvestorContact($_POST) ? "true" : "false" );
				break;	
		case 'Update Contact Entrep':
				echo ($accounts_db->updateEntrepContact($_POST) ? "true" : "false" );
				break;		
		case 'Update Profile Info':
				echo ($accounts_db->updateInvestorProfile($_POST) ? "true" : "false" );
				break;
		case 'Update Profile Info Entrep':
				echo ($accounts_db->updateEntrepProfile($_POST) ? "true" : "false" );
				break;			
		case 'Update About me':
				echo ($accounts_db->updateInvestorAboutme($_POST) ? "true" :"false" );
				break;
		case 'Update About me Entrep':
				echo ($accounts_db->updateEntrepAboutme($_POST) ? "true" :"false" );
				break;		
		case 'Upload Investor Photo':
			clearstatcache();
			if(!empty(($_FILES['profile_photo']))) {
				$file_path ='../../bizsh.admin/Investor/';
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["profile_photo"]["name"]);
				$tmp_name = $_FILES['profile_photo']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path . $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $newfilename;
                    echo ($accounts_db->UploadInvestorImage($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;
		case 'Upload Entrep Photo':
			clearstatcache();
			if(!empty(($_FILES['profile_photo']))) {
				$account_folder = md5($_POST['e_id']);
				$file_path ='../../bizsh.admin/Entrep/'.$account_folder;
				if(!file_exists($file_path)) mkdir($file_path, 0777, true);
				$newfilename = str_replace(' ', '', $_FILES["profile_photo"]["name"]);
				$tmp_name = $_FILES['profile_photo']['tmp_name'];
				if(move_uploaded_file($tmp_name, $file_path ."/". $newfilename)){
					$_POST['file_path'] = $file_path;
                    $_POST['newfilename'] = $account_folder.'/'.$newfilename;
                    echo ($accounts_db->UploadEntrepImage($_POST) ? "upload" : "false");
				}else echo "false";
			}else echo "false";
			break;		
		case 'Update email status':
			echo ($accounts_db->updateInvestorEmailStatus($_POST) ? "true" : "false");
			break;
		case 'Update email status Entrep':
			echo ($accounts_db->updateEntrepEmailStatus($_POST) ? "true" : "false");
			break;	
		case 'Update message status':
			echo ($accounts_db->updateInvestorMessageStatus($_POST) ? "true" : "false");
			break;
		case 'Update message status Entrep':
			echo ($accounts_db->updateEntrepMessageStatus($_POST) ? "true" : "false");
			break;	
		case 'Update Max min investment':
			echo ($accounts_db->updateInvestorMinMaxInvestment($_POST) ? "true" : "false");
			break;									
		default:
			# code...
			break;
	}
?>