<?php
	include 'session.php';
  	if(!isset($_SESSION['islogin'])){
    	header('location: index');
 	}else{
    }
?>
