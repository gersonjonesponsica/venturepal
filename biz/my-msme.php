<?php
    include 'includes/header-user.php';
    include 'includes/head.php';
    
    include 'common/config.php';
    include 'model/AddressDB.php'; 
?>
<style>
  body{
    background-color: #F7FAFA;
  }

</style>
<link rel="stylesheet" href="css/topnavj.css"> 
 <!-- <script src='custom-select/jquery-customselect.js'></script>
  <link href='custom-select/jquery-customselect2.css' rel='stylesheet' /> -->
<div class="container-fluid bg-white m-t-100" style="padding: 60px">
  <div class="container-fluid">
    <h1 class="title" id="title_">My MSME</h1>
    <div class="row" id="msme_">
            
    </div>
  </div>
</div>


<script src="script/mymsme.js"></script>
<!-- <script src="script/getMsmeForConversation1.js"></script> -->
<!-- <script src="script/conversation7.js"></script> -->
<!-- <script src="script/entreprenuer-profile9.js"></script>
 --><!-- <script src="script/formTransition1.js"></script> -->


<?php
    include 'includes/footer.php';
?>