<?php

session_start();
if(isset($_SESSION['islogin']))
  if($_SESSION['islogin'])
    echo "<script> window.location.href = 'index';</script>";

 include 'includes/navdefault.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>VenturePals</title>
  <!--   <link rel="icon" href="img/favi2on.png"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <link href="css/bootstrapj8.css" rel="stylesheet">
    <link href="css/mdb.minh3.css" rel="stylesheet">
    <link href="css/styleaj1.css" rel="stylesheet">
    <link href="css/topnavj.css" rel="styleshe8et">
    <!-- <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css"> -->
    <link href="css/mycss4.css" rel="stylesheet">
    <link href="assets/css/stylea1.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

   <script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1631023163635973';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        .navbar {
           background-color: #fff;;
        }
        .top-nav-collapse-nav-item{
          color: #484848 !important;
        }
        .top-nav-collapse {
            background:rgba(255,255,255,1);
        }


        footer.footer-copyright{
          background-color: #484848;
        }
        footer.page-footer h5{
          font-size: 30px;
        }
        footer.page-footer {
            background-color: #484848;
            color : white;
            margin-top: 0;
        }
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #fff;
            }
        }
        body{
          background-color: #F7FAFA;
        }
    </style>

</head>
<body>
<link rel="stylesheet" href="css/containerj.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container login-content">
        <p class="text-center"><img class="img-responsive" id="nav-logo" src="img/official2.png" width="240" height="60"></p>
        
      <h1 id="confirm"></h1>
        <!-- <h1 class="title">Login </h1> -->
       <?php
      //require_once 'controller/facebook.php';
      ?> 
    <form class="login-form" id="loginForm" method="post">
      <div class="via-email">
        <span>Use your email to login</span>
      </div>
        <input type="text" autofocus="true" class="m-b-20" id="email" name="email" placeholder="Email" />
        
        <input type="password" class="" id="password" name="password" placeholder="Password" />
      
        <span><a href="forget">  
          <div class="via-email">
            <span>Forget Password?</span>
          </div></a>
        </span>

        <input type="submit" class="register-buttton btnL btn_common icon"  id="btnLogin" value="Login" name="btnLogin">
          <span> 
          <div class="via-email">
             <span>New to VenturePal?<!--  <a href="register-investor">Create Account</a>  -->
            
            <li class="nav-item dropdown">
                  <a class="dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" >Create Account
                  </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <a href="register-investor" class="dropdown-item">as investor</a>
                 <a href="register-entreprenuer" class="dropdown-item">as Entreprenuer</a>
              </div>
            </li> 
            </span> 
          </div>
        </span>
      </form>
      </div>
</div>

<?php
    include 'includes/footer.php';
?> 

<script src="script/login2.js"></script> 
