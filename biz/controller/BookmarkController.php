<?php
include '../common/config.php';
include '../model/BookmarkDB.php';

$bookmark_db = new BookmarkDB();
	switch ($_POST['action']) {
		case 'Add Bookmark':
			$result = $bookmark_db->checkBookmark($_POST);
			if ($result) {
				echo ($bookmark_db->updateBookmark($_POST) ? "trues": "false");
			}else{
				echo ($bookmark_db->addBookmark($_POST) ? "true" : "false");
			}
		break;
		case 'Check bookmark status':
			$result = $bookmark_db->checkBookmark($_POST);
			echo json_encode($result);
			break;
		default:
		break;
	}
?>