<?php
include '../common/config.php';
include '../model/QuestionDB.php';

$question_db = new QuestionDB();
	switch ($_POST['action']) {
		case 'Add-Question':	
			$result = $question_db->addQuestion($_POST);
			if($result){
				echo "good";
			}else
				echo "error";
			break;
		case 'Get Question By ID':
			$result = $question_db->getQuestionByID($_POST['question_id']);
			echo $result;
			break;
		case 'Edit Question':
			 if($question_db->editQuestion($_POST)) {
	             echo 'true';
	         } else {
	             echo 'false';
	         }
	        break;
	    case 'Delete Question':
	    	if($question_db->deleteQuestionByID($_POST['question_id'])) {
	             echo 'true';
	        } else {
	             echo 'false';
	        }
	        break;
	    case 'Change Status':
	        echo ($question_db->changeStatus($_POST) ? "true" : "false");
	        break;    
		default:
			# code...
			break;
	}
?>