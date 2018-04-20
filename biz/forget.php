 <?php
   include 'includes/head.php';
  include 'includes/navdefault.php';

 ?>

<style>
   body{
    background-color: #F7FAFA;
  }
</style>
<link rel="stylesheet" href="css/containerj.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container login-content">
        <p class="text-center"><img class="img-responsive" id="nav-logo" src="img/official2.png" width="240" height="60"></p>
      <h1 class="title"></h1>
  
      <form class="forget-form" id="forgetForm" method="post">
        <div class="via-email">
          <span> Retrieve account</span>
        </div>
        <div class="email">
          <input type="text" class="inputText" id="email" name="email" placeholder="Email" />
        </div>
        <input type="submit" class="register-buttton btnL" id="btnLogin" value="Reset Password" name="btnLogin">

      </form>
    </div>
</div>

<script type="text/javascript" src="script/forget.js"></script>
<?php
    include 'includes/footer.php';
?>