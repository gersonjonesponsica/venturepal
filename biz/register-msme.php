<?php
  include 'includes/header-user.php';
    include 'includes/head.php';
   

?>
<style>
  body{
    background-color: #F7FAFA;
  }
  
</style>

<link href="css/searchnavj.css" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->


<style>
body{
    background-color: #F7FAFA;
  }
  #geomap{width: 100%; height: 400px;}
</style>

<div class="container m-t-60">
  <div class="row p-15 bg-color-F7FAFA b-r-5">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">

<!--       <table id="searchEntrepList" class="table table-hover ">
        <tbody>
          <tr></tr>
        </tbody>
      </table> -->
    </div>
    <div class="col-lg-3">
    </div>
  </div>
</div>

<div class="container setupnav" style="left: 0; right: 0;">
  <div id="myTopnav">
    <a href='javascript:;' onclick="scrollen(this)" id="basics" class="bat nav-active">Company Info</a>
    <a href='javascript:;' onclick="scrollen(this)" id="story" class="bat" > Story</a>
    <a href='javascript:;' onclick="scrollen(this)" id="aboutyou" class="bat" >Documents</a>
    <!-- <a href='javascript:;' onclick="scrollen(this)" id="account" class="bat" >Contact</a> -->
    <a href='javascript:;' onclick="scrollen(this)" id="preview" class="bat"> Submit and Preview</a>
    <a class="m-l-20  arrow_box_left_auto" id="progress" style="width: 15% !important" href="javascript:;">0% complete</a>
  </div>
</div>
   <input  name="msme_id" id="msme_id" hidden value=""> 

<div class="container " >
  <div class="row m-r-50 m-l-50">
    <div class="center-text m-b-30 m-t-40">
        <h1 class="font-black">Let's get started.</h1> 
        <h5 class="font-black">Make a great first impression with your project's title and image, and set your funding goal, campaign duration, and project category.</h5>
    </div>

    <div class="col-lg-12 bg-white scrollpane p-15" id="scrollablehere" style="overflow-x: hidden; overflow-y: hidden; margin-bottom: 50px">
         <div class="row taba" id="row_basics">
         <div class="col-lg-1">
         </div>
          <div class="col-lg-10">
              <div class="container">
                <form class="basic-form" id="basicForm" method="post">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Business name
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="bname" name="bname" placeholder="Business name" />
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4">
                      Categories
                      </div>
                      <div class="col-lg-8">
                        <select  id="categories" name="categories" class="form-control custom-select" style="height: 25px !important; width: 70%">
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="row">
                      <div class="col-lg-4">
                      Size
                      </div>
                      <div class="col-lg-8">
                        <select  id="badge" name="badge" class="form-control custom-select" style="height: 25px !important; width: 70%">
                          <option value="0">Badge</option>
                          <option value="1">Micro Enterprise</option>
                          <option value="2">Small Enterprise</option>
                          <option value="3">Meduim Enterprise</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-2">
                    Location
                  </div>
                  <div class="col-lg-3">
                     <input type="text" hidden class="inputText" id="e_id" 
                     value="<?php echo $id ?>" placeholder="Barangay" /> 

                     <input type="text" class="inputText" id="barangay" name="barangay" placeholder="Barangay" /> 
                     
                  </div>
                  <div class="col-lg-3">
                    <select  id="province" name="province" onchange="changeCity(this)" class="form-control custom-select" style="height: 25px !important; width: 70%">
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select  id="city" name="city" onchange="getAddress()" class="form-control custom-select" disabled style="height: 25px !important; width: 70%">
                    </select>
                  </div>
                  <div class="col-lg-1">
                    <a data-toggle="tooltip" onclick="openModalLocator(this)" id="locator_modal" title="Locator"><i class="ion-location ion m-t-10"></i></a>
                  </div>
                  <div class="col-lg-2">
                  
                  </div>
                  <div class="col-lg-8">
                    <input type="text" id="search_location" class="inputText" placeholder="Search location" >
                  </div>
                  <div class="col-lg-2">
                   
                  </div>
                  
                  
                </div>
              <!--   <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Date Establish
                  </div>
                  <div class="col-lg-9">
                      <input type="date"  class="inputText" id="establishdate" name="establishdate" placeholder="Capital Needed" />
                  </div>
                </div> -->
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4">
                      Date Establish
                      </div>
                      <div class="col-lg-8">
                        <input type="date"  class="inputText" id="establishdate" name="establishdate" />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="row">
                      <div class="col-lg-3">
                      Website
                      </div>
                      <div class="col-lg-9">
                        <input type="text"  class="inputText" id="website" name="website" placeholder="Website" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Capital Goal
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="capneeded" name="capneeded" placeholder="Capital Needed" />
                  </div>
                </div>

                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-4">
                      Net Profit
                      </div>
                      <div class="col-lg-8">
                        <input type="text"  class="inputText" id="profit" name="profit" placeholder="Net Profit" />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="row">
                      <div class="col-lg-4">
                      Net Worth
                      </div>
                      <div class="col-lg-8">
                        <input type="text"  class="inputText" id="worth" name="worth" placeholder="Net Worth" />
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Gross Income
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="gross" name="gross" placeholder="Gross Income" />
                  </div>
                </div>
              </div>
              <div class="container-fluid m-r-50">
                <div class="row">
                  <button type="submit" class="m-t-10 btn btn-default pull-right">
                  Save and Continue</button>
                </div>
            </div>

            </div>
            <div class="col-1">
              <div class="container">
               <!--  <div class="row bg-color-F7FAFA">asdfasdf</div> -->
              </div>
            </div>
          </div> 
          </form>
          <div class="row m-t-100 taba no-display-with-space" id="row_story">
          <div class="col-lg-1">
          </div>
            <div class="col-lg-10">
              <div class="container">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                     Business Photo
                    <div id="uploaded_file_b_photo"></div>
                  </div>
                  <div class="col-lg-9">
                    <div class="email">
                    <div class="file_drag_area b_photo">  
                         Drop or select Business Photo 
                    </div> 
                    <form class="b-photo" id="bPhoto" name="bPhoto">
                      <input type='file' name="b_photo" id="b_photo" value="Upload File" accept="image/*" hidden> 
                    </form>
                    </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                     Business Gallery
                    <div id="uploaded_file_b_gallery"></div>
                  </div>
                  <div class="col-lg-9">
                    <div class="email">
                    <div class="file_drag_area b_gallery">  
                         Drop or select Business Gallery
                    </div> 
                    <form class="b-gallery" id="bGallery" name="bGallery" enctype="multipart/form-data">
                      <input type='file' name="b_gallery[]" id="b_gallery" value="Upload File" accept="image/*" multiple="multiple" hidden > 
                    </form>
                    </div>
                  </div>
                </div>
                <form class="story-form" id="storyForm" method="post">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Short Gallery Description
                  </div>
                  <div class="col-lg-9">
                    <textarea class="form-control counted" id="g_desc" name="g_desc" placeholder="Type in your message" rows="5" style="margin-bottom:10px; height: 100px"></textarea>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Business Description
                  </div>
                  <div class="col-lg-9">
                    <textarea class="form-control counted" name="b_desc" placeholder="Business Description" rows="5" style="margin-bottom:10px; height: 150px"></textarea>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Business Video
                  </div>
                  <div class="col-lg-9">
                    <input type="text"  class="inputText" id="b_video" name="b_video" placeholder="Video ex. https://www.youtube.com/watch?v=rz3VGO7tGu0" />
                  </div>
                </div>
                <div class="container-fluid m-r-50">
                <div class="row">
                  <a href='javascript:;' class="btn btn-default pull-right" 
                 id="save_story" >Save and Continue</a>
                </div>
              </form>
            </div>
              </div>
            </div>
            <div class="col-lg-1">
             <div class="container">
 
            </div>
          </div>
          </div>
        <div class="row no-display-with-space taba" id="row_aboutyou" >
          <div class="col-lg-1">
             <div class="container">
 
            </div>
          </div>
          <div class="col-lg-10">
            <div class="container">
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    Business Permit
                    <div id="uploaded_file_business">
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="email">
                      <div class="file_drag_area business_permit">  
                        Drop or select Business Permit  
                      </div>
                      <form class="biz-permit" id="bizPermit" name="bizPermit">
                        <input type='file' name="biz_permit" id="biz_permit" value="Upload File" accept="application/pdf, image/*" hidden>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                     Mayor's Permit
                     <div id="uploaded_file_mayors"></div>
                  </div>
                  <div class="col-lg-9">
                    <div class="email">
                    <div class="file_drag_area mayors_permit">  
                         Drop or select Mayors Permit  
                    </div>
                    <form class="may-permit" id="mayPermit" name="mayPermit">
                      <input type='file' name="may_permit" id="may_permit" value="Upload File" accept="application/pdf, image/*" hidden>
                    </form>
                  </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                    DTI Certificate
                    <div id="uploaded_file_dti"></div>
                  </div>
                  <div class="col-lg-9">
                    <div class="email">

                    <div class="file_drag_area dti_permit">  
                          Drop or select DTI certificate 
                    </div> 
                    <form class="d-permit" id="dPermit" name="dPermit">
                      <input type='file' name="d_permit" id="d_permit" value="Upload File" accept="application/pdf, image/*" hidden> 
                    </form>
                    </div>
                  </div>
                </div>
                <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                  <div class="col-lg-3">
                     Business Documents
                  </div>
                  <div class="col-lg-9">
                    <div class="email">

                    <div class="file_drag_area b_documents">  
                         Drop or select files for business documents
                    </div> 
                    <form class="b-documents" id="bDocuments" name="bDocuments" enctype="multipart/form-data">
                      <input type='file' name="b_documents[]" id="b_documents" value="Upload File" accept="application/pdf, image/*" multiple="multiple" hidden> 
                    </form>
                    <div id="uploaded_file_b_documents"></div>
                    </div>
                  </div>
                </div>
              </div>

             <a href='javascript:;' class="btn btn-default pull-right" 
                 id="save_document" >Save and Continue</a>
            </div>
            <div class="col-lg-1">
             <div class="container">
 
            </div>
          </div>
          </div>
         <div class="row no-display-with-space taba" id="row_preview">
          <div class="row" id="" >
          <div class="col-lg-5">
              <div class="container">
               <h1 class="title" > <strong id="txtTitle"></strong> </h1>
                  <div class="portfolio-item graphic-design ">
                  <div class="he-wrap tpl6 member1 " >
                    <img class=" h-300 m-fit" id="msme_photo_temp" src="" class="img-responsive" alt="">
                  </div><!-- he wrap -->
                </div><!-- end col-12 -->
              </div>
            </div>
            <div class="col-lg-5">
             <div class="container-fluid" style="top: 0px !important;">
              <div class="row">
                <div class="row-lg-3 m-t-50" >
                  
                  <div class="m-t-10">
                    <img class="img-circle" src="img/ProfilePics/vendetta.png">
                    <a href="search"><small>by  Gerson Jones Ponsica</small></a>
                  </div>
                  <div class="m-t-10" id="desc_temp">
                   </div> 
                  <div class="m-t-10">
                    <a href=""><small id="temp_location"><i class="ion-location ion-size-15"></i> Dulfo Fatima Cebu City</small></a>
                  </div>

                </div>
              </div>
              </div>
                <table class="table">
                  <tbody>
                    <tr >
                      <td class=""><i class=" ion-size-15 m-r-5"><small><strong>P69, 696</strong> Raised</small></td>
                      <td class=""><i class="ion-calendar ion-size-15 m-r-5"></i><small><strong>30</strong> days to go</small></td>
                    </tr>
                    <tr>
                      <td class=""><i class="ion-size-15 m-r-5"><small class="m-t-10"><strong>P69, 696</strong> Remaining</small></td>
                      <td class=""><i class="ion-person-add ion-size-15 m-r-5"></i><small class="m-t-10"><strong>5</strong> Venturer Remaining</small></td>
                    </tr>
                    <tr>
                      <td class=""><i class="ion-minus-circled ion-size-15 m-r-5"><small class="m-t-10"> <strong>P69, 696</strong></small></td>
                      <td class=""><i class="ion-plus-circled ion-size-15 m-r-5"><small class="m-t-10"> <strong>P69, 696</strong></small></td>
                    </tr>
                  </tbody>
                </table>  
                <button type="submit" class="m-t-10 btn btn-default pull-right" id="submitAll">
                  Create your MSME portfolio </button>
            </div>
          </div> 
        </div>
    </div>
  </div>

</div>
<div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
              Location
            </div>
            <div class="modal-body">

            <div class="container" id="icon_list">
              <div id="geomap">
              </div>
               <form name="mapForm" id="mapForm" method="post">
                <p>Address: <input type="text" class="search_addr" id="" size="45"></p>
                <p>Latitude: <input type="text" class="search_latitude" name="lat" id="lat" size="30"></p>
                <p>Longitude: <input id="long" name="long" type="text" class="search_longitude" size="30"></p>
              </form>
            </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade " id="discardMod" role="dialog" >
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header">
              Save this?
            </div>
            <div class="modal-body">
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Discard </button>
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Continue </button>
            </div>
            <div class="modal-footer">
                 
            </div>
        </div>
      
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDat9uejdYzYvKcJTD0kUfAjeYheQP-pOU"></script>
<script src="script/locatormap7.js"></script>
<script src="script/register-msme.js"></script> 
<script src="script/register-msme-scroll4.js"></script> 

<?php
    include 'includes/footer.php';
?>