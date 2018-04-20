<?php
    include 'common/config.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
?>
<style>
    body{
        background-color: #EEEEEE;
    }
</style>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
  <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
 <div id="main-content" class=" m-t-100">

    <div class="container bg-white m-b-50 p-15">
      <div id="loadthis"></div>
        <h3 class="title">Terms and Condition</h3>
        <form class="terms-form" id="TermsForm" >
          <div class="row">
            <div class="col-2 m-t-30">
              <label> Choose Type</label>
            </div>
            <div class="col-5">
              <select id="type" class="form-control custom-select m-t-20" style="width: 300px; height: 20px">
                <option value="1">Website Terms and condition</option>
                <option value="2">Reports Terms and condition</option>
                
              </select>
            </div>

          </div>
          
          <textarea cols="80" id="terms" name="terms" rows="10" placeholder="Reply">
          </textarea>
          <button type="submit" class="btn btn-default">Update Terms and Condition</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/terms-and-condition1.js"></script> 
<!-- <script src="script/investment2.js"></script>  -->
<!-- <script src="script/notification.js"></script>  -->
 <?php
  include 'includes/footer.php';
 ?>




