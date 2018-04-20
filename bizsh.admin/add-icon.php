<?php
    
  include 'common/config.php';
  include 'includes/session.php';
  include 'includes/head.php';
  include 'includes/navdefault.php';

?>

<link rel="stylesheet" href="css/containera4.css">

<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
      <div class="container content-80">
      <h1 id="confirm"></h1>
        <h1 class="title">Add Icons</h1>

      <form  name="uploadIconForm" enctype="multipart/form-data">
        <a id="btn_upload">
          <div class="file_drag_area">  
            Select Icon/s
          </div>  
        </a>
       <input type='file' name="files[]" value="Upload File" accept="image/*"  
        id="file_upload" multiple="multiple" hidden>
          <div id="icon_upload_list_handler" hidden>
            <table id="icon_upload_list" class="table table-bordered table-condensed ">
                  <thead>
                    <th>Icon</th>
                    <th>Name</th>                    
                    <th>Size</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                  </tbody>
              </table><br/>
            <button type="submit" class="btn btn-success pull-right" id="btnQuestion" name="btnQuestion">
            Upload Icons</button>
           <!--  <button  class="btn btn-success pull-right" id="btnAddDocu" name="btnAddDocu">
            Upload2</button> -->
          </div>
       
          <span> 
          <div class="via-email">
          <!--   <span>New to VenturePals? <a href="register-investor">Create Account</a> </span> -->
            </div>
          </span>
      </form>
      </div>
</div>


  <script src="script/add-icon.js"></script>  
  <?php
    include 'includes/footer.php';
?>
