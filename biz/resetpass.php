 <?php
   include 'includes/head.php';
  include 'includes/navdefault.php';

    if(empty($_GET['id']) && empty($_GET['code'])){
      echo "no id no code";
    }

    if(isset($_GET['id']) && isset($_GET['code'])){
      $id = base64_decode($_GET['id']);
      $code = $_GET['code'];
    }
 ?>

<style>
   body{
    background-color: #F7FAFA;
  }
</style>
<link rel="stylesheet" href="css/containera5.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container login-content">
      <h1 id="confirm"></h1>
        <h1 class="title">Create New password</h1>
      <form class="reset-form" id="resetForm" method="post">
        <input hidden type="text" id="idid" value=<?php echo $id;?> >
        <input hidden type="text" id="codecode" value=<?php echo $code;?> >

        <div class="password">
          <input type="password" class="inputText" id="password" name="password" placeholder="Password" />
        </div>

        <div class="password">
          <input type="password" class="inputText" id="repassword" name="repassword" placeholder="Confirm Password" />
        </div>

        <input type="submit" class="register-buttton btnL" id="btnLogin" value="Create new password" name="btnLogin">

      </form>
      </div>
  </div>
<script type="text/javascript" src="script/reset.js"></script>

<?php
    include 'includes/footer.php';
?> 