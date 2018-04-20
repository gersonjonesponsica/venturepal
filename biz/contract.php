<?php
include 'includes/header-user.php';
    include 'includes/head.php';
    
  include 'model/TimeDateDB.php';

  $td = new TimeDateDB();

?>
<style>
  body{
    background-color: #F7FAFA;
  }
  .contractnav{
  border-radius: 10px !important;
}

.contractnav a {
  background-color: white;
  float: left;
  display: block;
  text-align: center;
  padding: 15px 15px;
  text-decoration: none;
  font-size: 17px;
  cursor: pointer;
  transition: .35s;
  border: 1px solid #f2f2f2;
  width: 33%;
}

.nav-active{
  background-color: white !important;
  color: #21b08a !important;
  border-color: #21b08a !important; 
}
.file-error{
    border:2px dashed #E54444 !important;
    color:#E54444 !important;
}

</style>

<link href="css/searchnavj.css" rel="stylesheet">
<style>
body{
    background-color: #F7FAFA;
  }
  .disabledAnchor {
       pointer-events: none !important;
       cursor:not-allowed !important;
  }

</style>
<!-- <link href="css/searchnavb2.css" rel="stylesheet"> -->

<div class="container contractnav m-t-100">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-sm-10">
      <div id="myTopnav" class="contract_step">
        <a href='javascript:;' onclick="step(this)" id="stepone" class="bat ">Step 1</a>
        <a href='javascript:;' onclick="step(this)" id="steptwo"  class="bat" > Step 2</a>
        <a href='javascript:;' onclick="step(this)" id="stepthree"  class="bat" >Step 3</a>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>

<input  name="msme_id" id="msme_id" value="<?php echo $_GET['id']?>" hidden> 

<div class="container m-t-50 p-15 ">
  <div class="row m-r-50 m-l-50 ">
    <div class="center-text m-b-30">
    <h1 class="font-black">Let's get started.</h1> 
    <h5 class="font-black">We will wait your contract, together with your proof of investment for 2 days. Not able to upload the following documents dissolve your contract. <a class="text-underline" href="javascript: viewMsme();">Check Portfolio</a></h5>
    <h5 id="demo"></h5>
    
    </div>

      <div class="col-lg-12 bg-white  m-b-50 p-15">
        <div class="row taba" id="row_stepone" hidden>
        <div class="col-lg-12">
          <div id="loadthis"></div>
          <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
              <div class="col-lg-3">
                 Investment Amount
                <div id="amount"></div>
                <input type="" name="" hidden id="amount-3" value="">
              </div>
              <div class="col-lg-9">
                <div class="section  slider-content">
                  <div class="row">
                    <div class="col-lg-12 slider">
                      <div id="slider-1" class=""></div>
                    </div>
                  </div>
                </div>
                <form class="invesmentForm" id="invesmentForm" name="invesmentForm" enctype="multipart/form-data">
                  <input type='file' name="investment" id="investment" value="Upload File" accept="image/*" hidden >
                </form>
                </div>
              </div>
          <h4 class="title center-text">  Contract of Agreement</h4>
           <p style="font-size: 15px" class="center-text">Contract Date: ________________ Contract Validity:________________</p>
          <div class="container-fluid" id="content" style="padding: 50px !important">
     
                  <div class="container justify-content-md-center">
                    <p style="font-size: 15px" hidden>;</p>
                    <p style="font-size: 15px">This is to certify that 
                      ___________________________________ a venturer has invested a total amount of <p style="font-size: 15px" id="amount-2"></p> pesos only to _________________________________(MSME NAME) with DTI reference number _______________________ owned by _________________________________ an entrepreneur and both agrees to the following terms:</p>
                    </br>
                    <p>  For both entrepreneur & venturer:</p>
                    </br>
       
                    <p style="font-size: 15px">1. The interest rate is 1% of the pooled amount.</p>
                    <p style="font-size: 15px">2. The contract is good for 5 years.</p>
                    <p style="font-size: 15px">3. Payment of interest and/or principal amount will start after the venture is launched. </p>
                    <p style="font-size: 15px">4. Payment of interest by the entrepreneur is to be made every three months starting from the exact date of the launch. </p>
                    <p style="font-size: 15px">5.  If the entrepreneur is not able to pay the principal amount within 5 years the venturer is entitled to </p>
                    <p style="font-size: 15px">6. The entrepreneur has the option to pay partial or whole of the principal amount before 5 years.</p>
                  </div>

                   <div class="row">
                    <div class="getstarted p-20"><button id="cmd" onclick="genPDF()" class=" btn btn_getstarted">Download Contract</button></div>
                  </div>
                </div>
          </div>
        </div> 
        <div class="row taba" hidden id="row_steptwo">
          <input type="" name="" id="duration_" hidden>
          
        <div class="col-lg-12">
          <div class="container-fluid">
            <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
              <div class="col-lg-3">
                 Proof of Invesment
                <div id="uploaded_file_investment"></div>
              </div>
              <div class="col-lg-9">
                <div class="investment_">
                <div class="file_drag_area investment">  
                     Drop or select Proof of Invesment
                </div> 
                
            <!--     <form class="invesmentForm" id="invesmentForm" name="invesmentForm" enctype="multipart/form-data">
                  <input type='file' name="investment" id="investment" value="Upload File" accept="application/pdf, image/*" hidden >
                </form> -->
                </div>
              </div>
            </div>
            <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
              <div class="col-lg-3">
                 Signed Contract
                <div id="uploaded_file_contract"></div>
              </div>
              <div class="col-lg-9">
                <div class="contract_">
                <div class="file_drag_area contract">  
                     Drop or select Signed Contract
                </div> 
                
                <form id="contractForm" name="contractForm" method="post">
                  <input type='file' name="contract" id="contract" value="Upload File" accept="application/pdf, image/*" hidden >
                </form>
                </div>
              </div>
            </div>
              <button class="btn btn-default pull-right" id="btn_upload_inve">Apply for investment</button>
         
           </div>
          </div>
        </div>
        <div class="row taba" hidden id="row_stepthree">
        <div class="col-lg-12">
          <div class="container-fluid">
                  <div class="container justify-content-md-center" id="about-me" style="opacity: 1 !important ">
                    <p id="result">Processing of Investment application is almost done. Please wait for the confirmation until 24 hours. </p>
                    
                     <?php //echo $td->time_ago('2017-12-06 14:57:49')?> 
                  </div>
                </div>
             
          </div>
        </div>       
      </div>
  </div>
</div>

<div class="modal fade" id="viewMsmeModal" role="dialog">
    <div class="modal-dialog">
    
         <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 15px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="text-center">MSME Status</h4>
            </div>
            <div class="modal-body">
              <div class="container" id="viewMsmeMod">
                
              </div>
            </div>
      <!--        <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>
<script src="js/jsPDF.js"></script> 
<script src="script/contract6.js"></script>  
<script src="script/notification2.js"></script>  
<script src="script/investment1.js"></script>  
<!-- <script src="script/contract-temp.js"></script>  -->
<script src="script/contract-scroll4.js"></script> 

<?php
    include 'includes/footer.php';
?>