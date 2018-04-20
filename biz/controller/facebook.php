<?php
require_once 'vendor/autoload.php';
include 'model/AccountsDB.php';
include 'common/config.php';

$accounts_db = new AccountsDB();

$fb = new Facebook\Facebook([
  'app_id' => '1631023163635973',
  'app_secret' => 'a050a01031390a030b0c205732d4f9eb',
  'default_graph_version' => 'v2.5',
]);
$redirect = 'http://localhost:8080/biz/login.php';

    $helper = $fb->getRedirectLoginHelper();
    if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }
    #Get the access token and catch the exceptions if any
    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
 # If the 
  if (isset($accessToken)) {

    $fb->setDefaultAccessToken($accessToken);

    try {
      $response = $fb->get('/me?fields=email,name');
      $userNode = $response->getGraphUser();
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }


    // Print the user Details
    $_POST['fb_name'] =  $userNode->getName();
    $_POST['fb_id']  =  $userNode->getId();
    $_POST['fb_email'] = $userNode->getProperty('email');

    $_POST['fb_prof']  = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';


    if($accounts_db->createAccountWithFb($_POST)){      
      $_SESSION['islogin'] = true;
      $_SESSION['isFacebookLogin'] = true;
      $_SESSION['fb_prof'] = $_POST['fb_prof'];
      $_SESSION['fb_name'] = $_POST['fb_name'];
      echo "<script> window.location.href = 'index';</script>";
    }

  }else{
    $permissions  = ['email'];
    $loginUrl = $helper->getLoginUrl($redirect,$permissions);
    echo '<div class="facebook">
      <a class="btnfacebook" href="'.$loginUrl.'"> <span> <i class="icon ion-social-facebook "></i></span> Login with Facebook</a>
    </div>';
  }

?>