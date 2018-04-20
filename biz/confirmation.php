
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

<!-- <link href="assets/css/ionicons.min.css" rel="stylesheet"> -->
<div class="content">   
  <div class="wrapper">
    <div id="loadthis"></div>
      <div class="login--content">
      <h1>Account comfirmed <a id="confirm" href="login"></a></h1>
      <input name="id" id="idid"  hidden value='<?php echo $id ;?>'/>
      <input name="code" id="codecode" hidden  value='<?php echo $code ;?>'/>
      </div>

  </div>
</div>

<script src="js/confirmation2.js"></script>




 