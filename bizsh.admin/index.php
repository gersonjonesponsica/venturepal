<?php
  session_start();
  if(isset($_SESSION['islogin'])){
    header('location:dashboard');
    echo $_SESSION['islogin'];
  }
  include 'includes/head.php';
?>
<link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
  <link rel="stylesheet" href="css/logina1.css">

<div class="content">   
  <div class="wrapper">
    <div id="loadthis"></div>
      <div class="login--content">
      <h1 id="confirm"></h1>
            <h1>Admin</h1>

    <form class="login-form" id="loginForm" method="post">

      <div class="email">
        <input type="text" class="inputText" id="username" name="username" placeholder="Username" autofocus="true" />
      </div>

      <div class="password">
        <input type="password" class="inputText" id="password" name="password" placeholder="Password" />
      <!--   <span class="floating-label">Your password</span> -->
      </div>

        <input type="submit" class="register-buttton btnL" id="btnLogin" value="Login" name="btnLogin">
      </form>
      </div>

  </div>

</div>


<script src="script/login4.js"></script> 
 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
 <?php
  include 'includes/footer.php';
 ?>