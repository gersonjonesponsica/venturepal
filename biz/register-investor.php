<?php
include 'includes/header-user.php';
include 'includes/head.php';


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
      <h1 id="confirm"></h1>
      <p class="text-center"><img class="img-responsive" id="nav-logo" src="img/official2.png" width="240" height="60"></p>

    <form class="register-form" id="registerForm" method="post">
      <div class="via-email">
        <span> Investor registration</span>
      </div>
      <div class="email">
        <input type="text" hidden class="inputText" name="type"  value="1" />
      </div>
      <div class="email">
        <input type="text" class="inputText" id="username" name="username" placeholder="Username" />
      </div>
      <div class="email">
        <input type="email" class="inputText" id="email" name="email" placeholder="Email" />
      </div>
      <div class="email">
        <input type="password"  class="inputText" id="rpassword" name="rpassword" placeholder="Password" />
      </div>

      <div class="password">
        <input type="password"  class="inputText" id="repassword" name="repassword" placeholder="Repeat your password" />
      </div>

        <input type="submit" class="register-buttton btnR btn_common" id="btnLogin" value="Sign up" name="btnLogin">
        <p>By signing up, you certify that you are of Philippines legal age (18 years old and above) and agree to our <a href="" data-toggle="modal" data-target="#termsModal">terms & conditions.</a></p>
        <span>
          <div class="via-email">
            <span>Already have an account? <a href="login">Log in</a></span>
          </div>
        </span>
         
      </form>
      </div>
</div>
  <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="termandcond">
                <h2>Online Terms and Conditions</h2>
                <ol>
                    <li>You and your agents agree not to disclose in any form: verbal or any recording or print or via the internet of any confidential information. You agree to keep the information in absolute confidence.</li>
                    <li>You user ID and Login must be kept safe at all times. You must not disclose to anyone. Any misuse and any loss by you or your representative is your sole responsibility and we will not entertain your loss.</li>
                    <li>You warrant that all the information you provide to us are correct and complete.</li>
                    <li>You warrant that your computer system is adequate and indemnify us of any loss due to your system failure.</li>
                    <li>Any information we gather can be used to do direct marketing and we can retain those information on our database.</li>
                    <li>By using our system, you agree to all our terms and conditions.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
  <script src="script/register-investor2.js"></script> 

  <?php
     include 'includes/footer.php';
?>

