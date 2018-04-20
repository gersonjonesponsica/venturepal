<?php

switch ($_POST['action']) {
	case 'GoogleSession':	
		session_start(); 
		$_SESSION['socialtype'] = 'google';
		echo $_SESSION['socialtype'];
	break;

	case 'FacebookSession':	
		session_start(); 
		$_SESSION['socialtype'] = 'facebook';
		echo $_SESSION['socialtype'];
	break;
}