<?php
  include 'includes/header-user.php';
  include 'includes/head.php';
    
?>
<style>
  body{
    background-color: #F7FAFA;
  }
    /*#geomap2{width: 100%; height: 400px;}*/
    #geomap{width: 100%; height: 400px;}
    img:hover{
    }

</style>
<input type="" hidden id="msme_id" name="" value="<?php echo $_GET['id']; ?>">
<div class="container-fluid h-auto p-b-40 font-white m-t-50 center-on-small-only"  style="background-color: #21b08a">
  <div class="row m-t-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
      <div class="img-relative">
        <div id="photo">
          
        </div>
        <form class="photo-form" id="photoForm" name="photoForm" method="post">
          <input type='file' name="b_photo" id="b_photo" value="Upload File" accept="image/*" hidden>
        </form>
      </div>
      </div>
     <!--  <div class="col-2" >
      
      </div> -->
      <img id="badge" src="badge/small.png" height="130" width="70" style="position: absolute;">
     <div class="col-lg-5 col-sm-5 m-l-30">
        <div class="container">
          <div class="row m-t-20">
            <h1 class="font-white font-30" id="txtName"></h1>
          </div>
          <div class="row ">
            <h1 class="font-white font-30" id="txtCapital"></h1>
          </div>
          <div class="row">
            <h6 class="font-white" id="txtLocation"></h6>
          </div>
          <div class="row">
            <h6 class="font-white" id="txtRemainingDay"></h6>
          </div>
          <div class="row">
            <h6 class="font-white" id="txtLike"></h6>
          </div>
        </div>
       
    </div>
    </div>
    </div>
  </div>
</div> 
<div class="container-fluid" >
<div class="container-fluid  bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-5 ">
        <div class="container justify-content-md-center m-b-40">
       <a href="javascript:;" id="edit-category" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
           <h1 class="title">Category</h1>
              <div class="row">
                  <div class="col-sm-8 m-t-10 ">
                     <div class="interest-card border-gray tras-anim">
                           <h1 id="txtCategory"></h1>
                     </div>
                  </div>
              </div>
          </div>
<!--           <div class="container justify-content-md-center m-b-40">
     
           <h1 class="title">Business Reports</h1>
              <div class="row img-center-in-div">

        
              </div>
          </div> -->
        <div class="container justify-content-md-center" id="about-me">
           <a href="javascript:;" id="edit-about-me" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
        <h1 class="title">  Description</h1>
        <p class="fontcolnice" id="msme_desc"> </p>
         <a href="javascript:;" id="btnYoutube">Watch my video</a>
        </div>


        <div class="container justify-content-md-center no-display" id="form-about-me">
          <div class="panel panel-default b-r-5">
            <div class="pull pull-right m-r-30 m-t-10">
                          <a type="button" id="save-about-me" class="pull pull-right"><i class="ion-checkmark"></i> Save</a>
              <a type="button" id="cancel-about-me" class="pull pull-right m-r-10"> <i class="ion-close"></i> Cancel</a>
        </div>  
          <div class="panel-heading bg-color-F7FAFA">Description</div>
          <div class="panel-body">
          <div class="personal-info">
          <form name="msmeDescForm" id="msmeDescForm" method="post">
          <div class="row">
            <div class="col-sm-12">


              <!-- <form class="" id="msmeDescForm" method="post"> -->
              <textarea class="form-control counted" id="desc" name="desc" placeholder="Type in your message" rows="5" style="margin-bottom:10px; height: 150px"></textarea>
              <!-- </form>            -->
            </div>
          </div>
          </form>

        </div>
        </div>
        </div>
         </div>
      </div>
      <div class="col-lg-7">


          <div class="container contractnav">
            <div class="row">
              <div class="col-lg-12 col-sm-12">
                <div id="myTopnav">
                  <a href='javascript:;' onclick="step(this)" id="stepone" class="bat nav-active"><i class="ion-clipboard"></i> Summary</a>
                  <a href='javascript:;' onclick="step(this)" id="steptwo" class="bat" ><i class="ion-calendar"></i> Business Details</a>
                  <a id="stepthree" href='javascript:;' onclick="step(this)" class="bat" data-badge=""> <i class="ion-iphone"></i> Contact Details</a>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="container">
          <div class="row">
              <div class="col-lg-12 bg-white border-table-color p-15">
                <div class="row taba" id="row_stepone">

                    <!-- <h1>Summary</h1> -->
                      <div class="container">  
                      <div class="col-lg-12"> 
                        <table id="documentList" class="table table-bordered table-hover table-condensed">
                          <tbody>
                            <tr>
                              <td class="titletd" width="200"><i class="ion-minus-circled ion-size-15"> </i>Min Investment :</td><td id="txtMin"></td>
                            </tr>
                            <tr>
                              <td class="titletd"><i class="ion-plus-circled ion-size-15"></i> Max Investment</td><td id="txtMax"></td>
                            </tr>
                            <tr>
                              <td class="titletd">Remaining Venture</td><td id="txtRemainingVenture"></td>
                            </tr>
                            <tr>
                              <td class="titletd">Total Raise</td><td id="txtTotalRaise"></td>
                            </tr>
                            <tr>
                              <td class="titletd">Remaining</td><td id="txtRemainingCapitalNeeded"></td>
                            </tr>
                            <tr>
                              <td class="titletd">Percent Raised</td><td id="txtRaisePercent"></td>
                            </tr>
                          </tbody>
                      </table><br/>
                      </div>
                    </div>

                </div> 
                <div class="row taba" hidden id="row_steptwo">
                <div class="col-lg-12">
                  <div class="container " id="business-detail">
                    <div class="img-center-in-div">
                    <a href="javascript:;" id="btnDailyModal">
          <img src="img/add-msme.png" width="100px" height="100px">
          <h1 class="title"><i class="ion-calendar"></i> Add Daily reports</h1>
        </a></div>
            <a type="button" id="edit-business-detail" class="pull pull-right"> <i class="ion-compose"></i> Edit</a>
      <!-- <h1 class="title">Business Details</h1> -->
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="200px">Date Established</td><td id="txtDate"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Net Profit</td><td id="txtProfit"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Net Worth</td><td id="txtWorth"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Gross Income</td><td id="txtGross"></td>
                  </tr>
                </tbody>
            </table><br/>
        </div>
        <div class="container justify-content-md-center no-display" id="form-business-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-business-detail" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-business-detail" class=" pull pull-right m-r-10"><i class="ion-close"></i>  Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Business Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="" id="addFormBusinesDetail" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Date Established</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="date_es" name="date_es"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Net Profit</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="net_profit" name="net_profit" />
               
              </div>            
            </div>
          </div>
         <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Net Worth</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="net_worth" name="net_worth" />
              
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Gross Income</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="gross_income" name="gross_income" />
              </div>            
            </div>
          </div>  
          </form>
        </div>
        </div>
        </div>
      </div>
                  </div>
                </div>
                <div class="row taba" hidden id="row_stepthree">
                <div class="col-lg-12">
                  <div class="container-fluid">
                          <div class="container justify-content-md-center" id="contact-detail">
       <a href="javascript:;" id="edit-contact-detail" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
        <!-- <h1 class="title">Contact Details</h1> -->
             <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd">Phone No.</td><td id="txtPhone"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Telophone No.</td><td id="txtTelephone"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Website</td><td id="txtWebsite"></td>
                  </tr>
                  <tr>
                    <td class="titletd">Facebook</td><td id="txtFacebook"></td>
                  </tr>
                </tbody>
            </table><br/>
      </div>
      <div class="container justify-content-md-center no-display" id="form-contact-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-contact-detail" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-contact-detail" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Contact Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="" id="addFormContactDetail" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Website</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="website" name="website"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Facebook</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="facebook" name="facebook" />
               
              </div>            
            </div>
          </div>
          </form>
        </div>
        </div>
        </div>
      </div>
                  </div>
                  </div>
                </div>       
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid  bg-white m-50 p-15 " id="div_details">
<div class="row justify-content-md-center">
    <div class="col-lg-6 " >
         <div class="container justify-content-md-center" id="div_docu">
         <a type="button" href="javascript:;" id="edit-certificate" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-document"></i> Certification & Permit</h1>
              <div class="row">
                  <div class="col-sm-6 m-t-10" id="bP">
                    
                  </div>
                  <div class="col-sm-6 m-t-10" id="dC">

                  </div>
                  <div class="col-sm-6 m-t-10" id="mP">
                    <!--  <div class="interest-card border-gray tras-anim hand-point" id="mP">
                           <h1 >Mayor's Permit</h1>
                     </div> -->
                  </div>
              </div>
      </div>
    </div>
   <div class="col-lg-6">
        <div class="container justify-content-md-center">
          <a href="javascript:;" id="btn_edit_docu" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-document"></i> Business Documents </h1>
              <div class="row" id="document">
                 
                 <!--  <div class="col-sm-6 m-t-10 m-b-20 ">
                     <div class="interest-card border-gray tras-anim">
                           <img style="position: absolute;" src="../../bizsh.admin/images/PDFLogo.png" width="30" height="30" class="m-l-20 m-t-10"><h1>Gerson Jones Ponsica</h1>
                     </div>
                  </div> -->
              </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="container-fluid  bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
    <div class="col-lg-6">

    </div>
   <div class="col-lg-6">
 


  </div>
</div>
</div> -->

<div class="container-fluid  bg-white m-50 p-15 ">
  <h1 class="title"><i class="ion-person-stalker"></i> My Ventures</h1>
    <div class="container-fluid">       
      <div class="row" id="venturers">
      </div>
    </div>  
</div>


<div class="container-fluid mcs-horizontal-example bg-white m-50 p-15 " id="div_gallery">
<h1 class="title hand-point m-r-50" id="btn_delete_gal" hidden ><i  class="ion-trash-a ion-size-35 hand-point" style="color: #E54444; "></i> Delete</h1>
<h1 class="title"><i class="ion-images"></i> Gallery</h1>

  <div class="" id="galleryPhotos">
       
  </div>
<form id="updateGallery" name="updateGallery" enctype="multipart/form-data">
  <input type='file' name="b_gallery[]" id="b_gallery" value="Upload File" accept="image/*" multiple="multiple" hidden > 
</form>
</div>
<div class="container-fluid  bg-white m-50 p-15 " id="div_maploc">
<a type="button" id="edit-map-detail" class="pull pull-right"><i class="ion-comepose"></i> Edit</a>
<div class="pull pull-right m-r-30 m-t-10 no-display" id="saveCancel">
  <a type="button" id="save-map-detail" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
  <a type="button" id="cancel-map-detail" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
</div> 
<h1 class="title"><i class="ion-location"></i> Map Location</h1>
  <div id="map-detail">
     <div id="geomap">
      </div>
      <div class="form-map no-display">
        <form name="mapForm" id="mapForm" method="post">
          <div class="row">
            <div class="col-lg-6">
              <p>Address: <input readonly type="text" class="search_addr" id="" size="45"></p>
            </div>
            <div class="col-lg-3">
              <p>Latitude: <input readonly type="text" class="search_latitude" name="lat" id="lat" size="30"></p>
            </div>
            <div class="col-lg-3">
              <p>Longitude: <input readonly id="long" name="long" type="text" class="search_longitude" size="30"></p>
            </div>
          </div>
        </form>
      </div>
  </div>
 </div>
<div class="modal fade" id="sendMessageModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Send Message</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control counted" name="message" placeholder="Send Message" style="height: 150px"></textarea>
            </div>
          <!--   <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>

<div class="modal fade" id="youtube" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Pitch Video</h4>
            </div>
            <div class="modal-body">
              <iframe width="100%" height="400px" id="video" allowfullscreen="true" allowscriptaccess="always">
              </iframe>
            </div>
            <!-- <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>

<div class="modal fade" id="deleteview" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Update Documents</h4>
            </div>
            <div class="modal-body" id="updateDocument">
           <!--    <div class="row" id="">
              </div> -->
              
            </div>
            <div class="m-t-10" id="uploaded_file"></div>
            
            <form id="UpdateDocument" name="UpdateDocument">
              <input type='file' name="b_documents[]" id="b_documents" value="Upload File" 
              multiple="multiple" hidden> 
            </form>
            <div class="modal-footer">
              <button type="button" id="btn_update_doc" class="btn btn-default pull-right" hidden >Update Documents </button> 
                 <!-- <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
            </div>
        </div>
      
    </div>
</div>

<div class="modal fade" id="updateCertificate" role="dialog">
    <div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Update Certificates and Permit</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-10 m-t-10">
                  <div class="interest-card border-gray tras-anim hand-point" onclick="updateBpermit()">
                      <h1 class="b_Permit"><i class="ion-edit "></i> Update Business Permit</h1>
                  </div>
                </div>
                <div class="col-lg-2 ">
                    <div id="uploaded_bPermit" class="m-t-10"></div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-10 m-t-10">
                  <div class="interest-card border-gray tras-anim hand-point" onclick="updateDpermit()">
                      <h1 class="dti_Permit"><i class="ion-edit "></i> Update DTI Certificate</h1>
                  </div>
                </div>
                <div class="col-lg-2 m-t-10">
                    <div id="uploaded_dPermit"></div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-10 m-t-10">
                  <div class="interest-card border-gray tras-anim hand-point" onclick="updateMpermit()">
                      <h1 class="may_Permit"><i class="ion-edit "></i> Update Mayor's Permit</h1>
                  </div>
                </div>
                <div class="col-lg-2 m-t-10">
                    <div id="uploaded_mayPermit"></div>
                </div>
              </div>
              
            </div>
            <form id="updateFormBpermit" name="updateFormBpermit">
              <input type='file' name="biz_permit" id="biz_permit" value="Upload File"  hidden>
            </form>
             <form id="updateFormDpermit" name="updateFormDpermit">
                <input type='file' name="d_permit" id="d_permit" value="Upload File"  hidden> 
            </form>
             <form id="updateFormMpermit" name="updateFormMpermit">
              <input type='file' name="may_permit" id="may_permit" value="Upload File" hidden>
            </form>
            
              
            <div class="modal-footer">
              <button type="button" id="btn_update_cert" class="btn btn-default pull-right"  hidden>Update Documents </button> 
                 <!-- <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade " id="mapModal" role="dialog" >
    <div class="modal-dialog  ">
        <!-- Modal content-->
        <div class="modal-content modal-lg">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              Location
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade" id="category" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
             <!--  <h2>Online Terms and Conditions</h2> -->
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
               <h6 class="title">What type of business?</h6>
            </div>
            <div class="modal-body">
           
              <div class="container justify-content-md-center ">
                <input type="" hidden id="sub_id" name="">
                  <div class="row" id="category_mod">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
            <!--    <button type="button" class="btn btn-default pull-right" id="btnSave">Save </button> --> 
                 <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="like_investor" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h6 class="title center-text">liked investor</h6>
            </div>
            <div class="modal-body">
            
              <div class="container justify-content-md-center " id="like_mod">
                  
              </div>
            </div>
            <div class="modal-footer">
            <!--    <button type="button" class="btn btn-default pull-right" id="btnSave">Save </button> --> 
                 <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
    </div>
</div>

<div  class="modal fade" id="dailyModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" id="reviewMod">
          <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 id="date"></h4>
            </div>
          <div class="container m-b-50">
            <div id="loadthis"></div>
            <div class="row">
              <div class="col-lg-12 bg-white calendar_table">
                
              </div>
            </div>

           <?php $fields = array("Sales", "Cost of Sales","Begin Inventory", "Purchase Inventory", "Available", "End Inventory" ,"Total Cost of sales","Operating Expences", "Fuel and Oil", "Wages and Salary", "Utilities", "Rental", "Deprecesion", "Investments","Miscelleneos", "Office Supply", "Prof Expences", "Benefits", "Total OE","Net Income"); ?>

            <div class="row m-t-20">
              <div class="col-lg-12 bg-white " >
                <table class="table table-bordered m-t-20 table_view">
                <tbody>
                  
                </tbody>   
                </table>
              </div>
            </div> 

            <div class="row m-t-20">
              <div class="col-lg-12 bg-white">
                <div class='top_calendar_label m-t-20 m-b-10'>
                <div class="text-center" style="margin: 0px auto;"> 
                  <div class="dropdown">
                  <a class="" href="business" id="report_title">Sales</a>
                    <div class="dropdown-content month"  style="height: 300px !important; overflow-y: auto;">
                      <ul>
                        <?php for ($i=0; $i < sizeof($fields); $i++): ?>
                          <?php 
                          if($i == 1 || $i == 7){
                            }else{
                              echo '<a href="javascript:;" data-file="'.$fields[$i].'" onclick="chart(this)" data-id="'.$i.'" >
                                  <li class="desc-nav" class"report_value"> '.$fields[$i].'</li>
                                </a>';
                            }
                            ?>
                        <?php endfor ?>
                    </ul>
                  </div>
                  </div>
                </div> 

                </div>
                

              </div>
              <div class="col-lg-12 bg-white">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
              </div>
            </div> 
          </div>

          
        </div>
    </div>
</div>
<div class="modal fade top-5 " id="myModal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 id="date"></h4>
            </div>
            <div class="modal-body">
              <div class="add-edit">
                  <?php 
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                        <?php 
                        $class2 = '';
                          if( $j == 0 || $j == 1 || $j == 7 || $j == 19  ){
                           $class2 = "bold m-t-10 ";
                          }else
                            $class2="p-l-20 m-t-10";
                        ?>
      
                          <?php 
                              $string1 = strtolower($fields[$j]);
                              $string2 = str_replace(' ', '', $string1);
                          ?>
                             <div class="row " >
                              <div class="col-lg-5 bg-color-F7FAFA" >
                                <h6 class="<?php echo $class2; ?>"> <?php echo $fields[$j]?></h6>
                              </div>
                              <div class="col-lg-7 no-pad no-margin w-fit" >
                                <?php 
                                  if( $j == 1 || $j == 4 || $j == 7 ||$j == 6 || $j == 18 || $j == 19){
                                    echo '<input onchange="changeData(this)" class="bg-color-F7FAFA text-center bold no-pad no-margin w-fit b-b no-left-border" readonly  type="" name=""  id='.$string2.'>';
                                  }else{
                                    echo '<input class="text-center no-pad no-margin w-fit b-b haha" onchange="changeData(this)"  type="" name=""  id='.$string2.'>';
                                  }
                                ?>
                              </div>
                            </div>                   
                    <?php endfor;?>
            </div>
            <div class="modal-footer">
                <button type="button" id="save_report" class="btn btn-default pull-right">Save report</button> 
                <!-- <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
            </div>
        </div>
        </div>
      
    </div>
</div>
<div class="modal fade" id="termsReportModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h6 class="title center-text">Report Terms and condition</h6>
            </div>
            <div class="modal-body">
              
              <div class="container justify-content-md-center ">
                <div class="row"  id="report_terms_mod">

                </div>
                <div class="row">
                  <div class="col-1">
                    <input type="checkbox" name="dontshow" id="dontshow">
                  </div>
                  <div class="col-4">
                    <label class="m-t-10">Do not show again</label>
                  </div>
                </div>
                  
              </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default pull-right" id="btnReportTerms">Ok </button> 
                 <!-- <button type="button" id="btnReportTerms_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="historyModal" role="dialog">
    <div class="modal-dialog  modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h6 class="title center-text">Investment History & Documents </h6>
            </div>
            <div class="modal-body" >
              <div class="row">
               <table id="documentList" class="table table-bordered table-hover table-condensed " style="margin: 30px;">
                  <tbody>
                    <tr>
                      <td class="titletd">Date of Investment</td><td id="contract_date"></td>
                    </tr>
                    <tr>
                      <td class="titletd" width="250px">Basic Information</td><td id="basic"></td>
                    </tr>
                    <tr>
                      <td class="titletd">Net Profit</td><td id="contract"></td>
                    </tr>
                    <tr>
                      <td class="titletd">Proof of Investment</td><td id="proof"></td>
                    </tr>
                  </tbody>
              </table><br/>
              </div>
            </div>
         <!--    <div class="modal-footer">
              <button type="button" id="btnReportTerms_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div> -->
        </div>
    </div>
</div>
</div>
<div class="chatbox">
    <div class="container p-15">
      <div id="choose_conversation">
        <div><h5 class="text-center">  Choose Conversation</h5> 
          <div id="loader-div-2" hidden>
            <li class="center-text" style="list-style: none" id="loading"><i class="ion-load-c"></i> </li>
          </div>
        </div>
        <!-- <input id="msme_id" hidden type="" name=""> -->
        <div class="" id="convo"></div>
      </div>
    </div>
</div>
<a class="contact-button" data-toggle="tooltip" title="Messaging" id="chat"><i id="chat-icon"></i></a>


<script src="script/formTransition-msme.js"></script>
<script src="script/msme-profile2.js"></script>
<script src="script/notification2.js"></script>
<script type="text/javascript" src="script/business-report.js"></script>
<script src="js/canvasjs2.min.js"></script>
<script src="script/conversation9.js"></script>
<script src="script/contract-scroll4.js"></script> 
<!-- <script src="js/compareDate.js"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDat9uejdYzYvKcJTD0kUfAjeYheQP-pOU"></script>
<!-- <script src="script/locatormap7.js"></script> -->
<script>
$('#btnReportTerms').click(function(){
  var check = $('#dontshow').prop('checked') ? 1 : 0;
  if (check == 1) {
    updateReportTermsStatus();
  }else{
    $('#btnReportTerms_close').click();
  }
});
$('#btnDailyModal').click(function(){
  checkReportTermsStatus();
});
$('#btnYoutube').click(function(){
  $('#youtube').modal({show:true});
});
function scrollen(element){
  var id = $(element).attr('id');
  var elem = document.getElementById('div_'+id); 

  $('html, body').animate({
      scrollTop: ($(elem).offset().top - 200)
  },500);
}

</script>
<!-- <script type="text/javascript" src="script/bookmark1.js"></script>
<script type="text/javascript" src="script/interest.js"></script> -->
<?php
    include 'includes/footer.php';
?>