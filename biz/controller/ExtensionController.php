<?php
include '../common/config.php';
include '../model/ExtensionDB.php';

$extension_db = new ExtensionDB();
	switch ($_POST['action']) {
		case 'Ask 1 week Extension':
			$result = $extension_db->checkExtension($_POST);
			echo ($result ? "true" : "false");
		break;
	}
?>