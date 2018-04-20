<?php
	include 'session.php';
  	if(!isset($_SESSION['islogin'])){
    	$pg = explode('/', $_SERVER['REQUEST_URI']);
    	$pg = end($pg);
        if($pg == 'index' || $pg == 'investor' || $pg == 'entrepreneurs' || $pg == 'how-it-works'
            || $pg == 'about' || $pg == 'terms' || $pg == 'testimonial' || $pg == '' || $pg == 'register-investor' || $pg == 'register-entreprenuer'|| preg_match('/\bmsme-portfolio\b/',$pg)){
        }else{
           echo "<script> window.location.href = 'login';</script>";
        }
    	include 'includes/navdefault.php';
 	}else{
    	include 'includes/nav.php';
    }
?>
