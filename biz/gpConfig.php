<?php


session_start();
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';
/*
 * Configuration and setup Google API
 */
$clientId = '474211081817-pnk51fmjmqjs2337hoievom7u72ohcb6.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'V-nSemw6JyydaTEDoafivC76'; //Google client secret
$redirectURL = 'http://localhost:8080/Biz/login.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('iBizsh');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>