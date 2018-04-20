<?php
  include 'includes/session.php';
  include 'includes/head.php';
  include 'includes/navdefault.php';
?>
<style>
.inputText{
  width: 65% important;
}
.fa{
  font-size: 17px !important; 
  color: #2ADCAD !important;
}
</style>
<div id="main-content" style="margin-top: 100px">
  <div class="big-wrapper">
    <div id="loadthis"></div>
      <div class="big-container-content">
      <h1 id="confirm"></h1>
    <h1>Add Document/s</h1>

    <form name="uploadDocumentForm" enctype="multipart/form-data">
    <input type="text" id="admin_id" value="<?php echo $_SESSION['admin_id']?>" hidden>
     <input type="text" id="admin_username" value="<?php echo $_SESSION['username']?>" hidden>
      <div class="upload-btn-wrapper">
       <a class="nav-link upload-btn m-t-20 m-b-20 c-e" id="btn_upload">Choose PDF Document/s</a>
        <input type='file' name="files[]" value="Upload File" accept="application/pdf"  
        id="file_upload" multiple="multiple" hidden>
        <div id="document_upload_list_handler" hidden>
            <table id="document_upload_list" class="table table-bordered table-hover table-condensed ">
                <thead>
                    <th>Name</th>                    
                    <th>Size</th>
                    <th>Status</th>
                </thead>
                <tbody>
                </tbody>
            </table><br/>
          <button type="submit" class="btn btn-success pull-right" id="btnQuestion" name="btnQuestion">
          Upload</button>
         <!--  <button  class="btn btn-success pull-right" id="btnAddDocu" name="btnAddDocu">
          Upload2</button> -->
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

 <script src="script/add-document.js"></script>
<!-- <script src="script/add-document2.js"></script> -->
<?php
    include 'includes/footer.php';
?>



