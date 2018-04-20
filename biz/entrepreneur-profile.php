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

  .ext{
    height: 100px !important;
  }
  .ext.extend{

  }
</style>
  <link rel="stylesheet" href="css/topnavj.css"> 
 <!-- <script src='custom-select/jquery-customselect.js'></script>
  <link href='custom-select/jquery-customselect2.css' rel='stylesheet' /> -->
<div class="container-fluid  h-auto  p-b font-white center-on-small-only"  style="background-color: #21b08a">
  <div class="row justify-content-md-center m-t-100">
  <div class="container">
    <div class="row">
    <div class="col-lg-2">
    <div class="img-relative">
      <div class="overlay uploadProcess no-display"> 
          <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>
      </div>
      
      <img src="img/unknown.jpg" id="p_profile" class="img-circle2  b"><span><a style="font-size: 14px !important" class="editLink" id="photo_button" href="javascript:void(0);"><i class="ion-camera"></i> Update Photo</a></span>
      <form class="photo-form" id="photoForm" name="photoForm" method="post">
        <input type='file' name="profile_photo" id="profile_photo" value="Upload File" accept="image/*" hidden>
      </form>
    </div>
    </div>
     <div class="col-lg-6">
        <div class="container">
          <div class="row m-t-40">
             <!--  <button class="btn btn-over-default-color">Edit Account</button> -->
          </div>
           
    
          <div class="row">
            <h1 class="font-white font-30" id="txt_fullname"></h1>
          </div>
          <div class="row">
            <h6 class="font-white" id="txt_location"><i class="ion-location"></i> </h6>
          </div>
          <div class="row">
          </div>
        </div>
       
    </div>

    </div>
    </div>
  </div>
</div> 
<!--   <input hidden  name="accountid" id="accountid" value="<?php echo $_SESSION['account_id']?>">
  <input hidden  name="userid" id="userid" value="<?php echo $_SESSION['userid']?>">
  <input hidden  name="usertype" id="usertype" value="<?php echo $_SESSION['user_type']?>"> -->
<div class="container-fluid">
<div class="container-fluid bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-5 ">
          <div class="container justify-content-md-center" id="profile-detail">
          <a type="button" id="edit-profile-detail" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-person"></i> Profile Information</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="250">Family name</td><td id="txt_lname"></td>
                  </tr>
                   <tr>
                    <td class="titletd" width="250">Given name</td><td id="txt_fname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Middle name</td><td id="txt_mname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Barangay</td><td id="txt_brgy"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Province</td><td id="txt_state"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">City</td><td id="txt_city"></td>
                  </tr>
                </tbody>
            </table><br/>
            
      </div>
        <div class="container justify-content-md-center no-display" id="form-profile-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-profile-detail" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-profile-detail" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Profile Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="" id="addFormProfileDetail" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Family name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="lname" name="lname"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Given name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="fname" name="fname" />
               
              </div>            
            </div>
          </div>
         <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Middle name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="mname" name="mname" />
              
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Barangay</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="brgy" name="brgy" />
              
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">State</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8"><?php?>
                <select onchange="changeState(this)" name='state' id="state" class='form-control custom-select ' style="height: 25px !important; width: 83%">

                </select>
            </div>
          </div>   
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">City</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <select  name="city" id="city" class='form-control custom-select' style="height: 25px !important; width: 83%">
               
              </select>
             <!--  <select  name="city2" id="city2" class='custom-select'>
               
              </select>   -->       
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
              <a href='javascript:;' onclick="step(this)" id="steptwo" class="bat" ><i class="ion-home"></i> My MSME</a>
              <!-- <a href='javascript:;' onclick="step(this)" id="stepthree" class="bat" ><i class="ion-earth"></i> Payment History</a> -->
              
            </div>
          </div>
        </div>
      </div>
        <div class="container">
          <div class="row">
              <div class="col-lg-12 bg-white border-table-color m-b-50 p-15">
                <div class="row taba" id="row_stepone">
                <div class="col-lg-12">
                  <div class="container-fluid" id="summaryTable">

                  </div>
                  </div>
                </div> 
                <div class="row taba" hidden id="row_steptwo">
                <div class="col-lg-12">
                  <div class="container justify-content-md-center m-b-20">
                  <div class="row" style="border-bottom: 1px solid #DDDDDD; margin-bottom: 10px !important">
                    <div class="col-4">
                      <div class="circle-status success"></div><div><small class="small-text">Successful Investment</small></div>
                    </div>
                    <div class="col-4">
                      <div class="circle-status info"></div><div><small class="small-text">Parly Funded, Accepting Investment</small></div>
                    </div>
                    <div class="col-4 m-b-10">
                      <div class="circle-status endparlyfunded"></div><div><small class="small-text">Parly Funded, End of Investment</small></div>
                    </div>
                    <div class="col-4">
                      <div class="circle-status warning"></div><div><small class="small-text">No Raised, Accepting Investment</small></div>
                    </div>
                    <div class="col-4">
                      <div class="circle-status error"></div><div><small class="small-text">No Raised, End of Investment</small></div>
                    </div>
                    <div class="col-4 m-b-10">
                      <div class="circle-status pending"></div><div><small class="small-text">Pending Registration</small></div>
                    </div>
                  </div>
                  <div class="row msme m-t-20" >
                  </div>
              </div>
                  </div>
                </div>  

              <!--   <div class="row taba" hidden id="row_stepthree">

                </div>   -->   
              </div>
          </div>
        </div>

      </div>
    </div>
</div>
<div class="container-fluid  bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-7 ">
        <div class="container justify-content-md-center" id="about-me">
         <a type="button" id="edit-about-me" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
          <h1 class="title"><i class="ion-person"></i> About Me</h1>
          <p id="txt_aboutme"></p>
        </div>
              <div class="container justify-content-md-center no-display" id="form-about-me" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-about-me" class="pull pull-right m-r-10"> <i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-about-me" class=" pull pull-right m-r-10"><i class="ion-close"></i>Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA"> Contact Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="add-about-me" name="addAboutMeForm" id="addAboutMeForm" method="post">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                   
               <textarea class="form-control counted" name="aboutme" id="aboutme" placeholder="Type in your message" rows="5" style="margin-bottom:10px; height: 150px"></textarea>
      
               
              </div>            
            </div>
          </div>
          </form>

        </div>
        </div>
        </div>
      </div>
        </div>
        <div class="col-lg-5">
          <div class="container justify-content-md-center" id="noti">
          <a type="button" class="pull pull-right" id="edit-noti"><i class="ion-compose"></i> Edit</a>
             <h1 class="title"><i class="ion-email"></i> Notifications</h1>
              <table id="documentList" class="table table-bordered table-hover table-condensed">
                  <tbody>
                    <tr>
                      <td class="titletd" width="300">Receive emails from us?</td>
                      <td id="emailStatus">
                      </td>
                    </tr>
                    <tr>
                      <td class="titletd" width="300">Receive text message from us?</td>
                      <td id="messageStatus">
                         
                      </td>
                    </tr>
                  </tbody>
              </table><br/>
        </div> 
        <div class="container justify-content-md-center no-display" id="form-noti" >
          <div class="pull pull-right m-r-30 m-t-10">
            <a type="button" id="cancel-noti" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
          </div>  
          <div class="panel panel-default b-r-5">
            <div class="panel-heading bg-color-F7FAFA">Notification</div>
            <div class="panel-body">
            <div class="personal-info">
            <form class="add-form-account-setting" id="addFormAccountSetting" method="post">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <div class="col">
                  <label class=" m-t-10 m-l-30">Receive emails from us?</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="switch" for="emailCheck">
                    <input type="checkbox" id="emailCheck" />
                    <div class="slider-small round"></div>
                  </label>
                </div>            
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <div class="col">
                  <label class=" m-t-10 m-l-30">Receive text message from us?</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="switch" for="messageCheck">
                    <input type="checkbox" id="messageCheck" />
                    <div class="slider-small  round"></div>
                  </label>
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

<div class="container-fluid  bg-white m-50 p-15 ">
<div class="row justify-content-md-center ">
    <div class="col-lg-6">
     <div class="container justify-content-md-center" id="account-setting">
       <a type="button" class="pull pull-right" id="edit-account-setting"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-gear-b"></i>  Account Settings</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="250">Email</td><td>teamrocket@gmail.com</td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Password</td><td>xxxxxxxxxxx</td>
                  </tr>
                </tbody>
            </table><br/>
      </div>
      <div class="container justify-content-md-center no-display" id="form-account-setting" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-account-setting" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-account-setting" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Account Setting</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="add-form-account-setting" id="addFormAccountSetting" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Email</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="" name="" placeholder="09934534537"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Password</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="" name="" placeholder="123-5678"/>
               
              </div>            
            </div>
          </div>
         <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Re-Type Password</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="email" class="inputText no-margin" id="" name="" placeholder="teamrocket@gmail.com"/>
              
              </div>            
            </div>
          </div>      
          </form>
        </div>
        </div>
        </div>
      </div>
    </div>
   <div class="col-lg-6">
      <div class="container justify-content-md-center">
        <div class="container justify-content-md-center" id="contact-detail">
       <a type="button" id="edit-contact-detail" class="pull pull-right">Edit</a> 
       <h1 class="title"><i class="ion-iphone"></i>  Contact Details</h1>
          <div id="contact-handler">
            <table id="documentList1" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="250">Phone </td><td id="txt_mobile"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Telophone </td><td id="txt_telephone"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Email</td><td id="txt_email"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Facebook</td><td id="txt_facebook"></td>
                  </tr>
                </tbody>
            </table><br/>
          </div>
      </div>
      </div>

      <div class="container justify-content-md-center no-display" id="form-contact-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
      
          <a type="button" id="save-contact-detail" class="pull pull-right m-r-10">Save</a>
          <a type="button" id="cancel-contact-detail" class=" pull pull-right m-r-10">Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Contact Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="add-form-contact-detail" name="addFormContactDetail" id="addFormContactDetail" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Phone</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="mobile" name="mobile" placeholder="09934534537"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Telephone</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="telephone" name="telephone" placeholder="123-5678"/>
               
              </div>            
            </div>
          </div>
         <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Email</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="email" class="inputText no-margin" id="email" name="email" placeholder="teamrocket@gmail.com"/>
              
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
                  <input type="text" class="inputText no-margin" id="facebook" name="facebook" placeholder="www.teamrocket.com"/>
              </div>            
            </div>
          </div>      
          </form>
          <form class="add-form-xcontact" name="addFormxContact" id="addFormxContact" method="post">  
          <div class="row">
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
<input id="msmeid" type="" name="" hidden="true">
<div class="chatbox">
    <div class="container p-15">
      <div id="choose_account" >
        <h5 class="text-center">Choose Account</h5>
        <div id="loader-div-2" >
          <li class="center-text" style="list-style: none" id="loading"><i class="ion-load-c"></i> </li>
        </div>
        <div class="" id="account_msme"></div>
      </div>

      <div id="choose_conversation">
        <div><h5 class="text-center"><a href="javascript:;" id="cancelConvo"><i class="ion-arrow-left-c"></i> </a>  Choose Conversation</h5> 
          <div id="loader-div-2" hidden>
            <li class="center-text" style="list-style: none" id="loading"><i class="ion-load-c"></i> </li>
          </div>
        </div>
        <input hidden id="msme_id" type="" name="">
        <div class="" id="convo"></div>
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

<div class="modal fade" id="extendMod" role="dialog">
    <div class="modal-dialog">
      <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <!-- <h6 class="title" id="title_m">Payment </h6> -->
            </div>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" id="extendModal">
              
            </div>
         <!--    <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>


<div class="modal fade" id="payoutModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h6 class="title" id="title_mm"></h6>
            </div>
            <div class="modal-body">
               
              <div class="container justify-content-md-center m-b-20 m-t-20">
                <form id="paymentForm" method="post" enctype="multipart/form-data">
                  <input type="text" id="cfiid" name="cfiid" placeholder="" hidden="true" />
                    <table id="documentList" class="table table-bordered table-hover table-condensed">
                      <tbody>
                        <tr>
                          <td class="titletd" >Balance</td><td id="balance"></td>
                        </tr>
                        <tr>
                          <td class="titletd" >Total Paid</td><td id="totalPaid"></td>
                        </tr>
                      </tbody>
                    </table>
                  <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                    <div class="col-lg-3 m-t-10">
                      Amount <span>&#8369;</span>
                    </div>
                    <div class="col-lg-9">
                     <input type="text" autofocus="true" class="inputText no-margin" id="amount" name="amount" placeholder="Payment Amount " />
                    </div>
                  </div>
                  <div class="row p-15 bg-color-F7FAFA m-t-10 m-b-10 b-r-5">
                    <div class="col-lg-3 m-t-10">
                       Proof of Payment
                      <div id="uploaded_file_p_payout"></div>
                    </div>
                    <div class="col-lg-9">
                      <div class="email">
                      <div class="file_drag_area p_payout">  
                           Drop or select Proof of Payment
                      </div> 
                        <input type='file' name="p_payout" id="p_payout" value="Upload File" accept="image/*" hidden>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnPay" class="btn btn-default pull-right">Save </button> 
                 <!-- <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
                
            </div>
        </div>
      
    </div>
</div>

<div class="modal fade" id="profileMod" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="text-center">Please create or update your portfolio before making a transaction.</h4>
          </div>
        </div>
      
    </div>
</div>

<div class="modal fade" id="paymentHistory" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button style="right: 25px; top: 20px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <!-- <h4 class="text-center">Please create or update your portfolio before making a transaction.</h4> -->
          </div>
          <div class="modal-body">
            <!-- <div id="chartContainer" style="height: 370px"></div> -->
            <input type="" id="msme_id_p" hidden="true">
                  <div id="chartContainer" style="height: 370px"></div>
                   
                    <div class="container-fluid" style=" left: 75%;">
                        <ul class="pagination mycolor m-t-50">
                          <li class="page-item"><a class="page-link" href="javascript:;" id="yearss">1/5 Years</a> </li>
                          <li class="page-item active" onclick="changeData(this)"><a class="page-link" href="javascript:;">1</a> </li>
                          <li class="page-item" onclick="changeData(this)"><a class="page-link" href="javascript:;">2</a></li>
                          <li class="page-item" onclick="changeData(this)"><a class="page-link" href="javascript:;">3</a></li>
                          <li class="page-item" onclick="changeData(this)"><a class="page-link" href="javascript:;">4</a></li>
                          <li class="page-item" onclick="changeData(this)"><a class="page-link" href="javascript:;">5</a></li>
                        </ul>
                    </div>
          </div>
        </div>
      
    </div>
</div>
<form name="paypalFormExtension" id="paypalFormExtension" action="paypal-extension" method="post" hidden="true">
  <!-- <input type="" name="id" value="<?php echo $_SESSION['userid']?>"> -->
  <!-- <input type="" name="msme_id" id="msme_id" > -->
  <input type="hidden" name="Description" id="Description">
  <input type="hidden" name="payment" value="5">  
    <input type="" name="cc" value="USD" />
                    
  <button class="btn btn-default" type="submit"> $5 Subscribe</button>
</form>
<a class="contact-button" data-toggle="tooltip" title="Messaging" id="chat"><i id="chat-icon"></i></a>
<script src="js/canvasjs2.min.js"></script>
<script src="script/getMsmeForConversation1.js"></script>
<script src="script/conversation9.js"></script>
<script src="script/entreprenuer-profile8.js"></script>
<script src="script/formTransition1.js"></script>
<script src="script/notification2.js"></script>
<script src="script/contract-scroll4.js"></script> 
<script type="text/javascript">
  function showHistoryModal(msme_id){
    $('#msme_id_p').val(msme_id);
     $('#paymentHistory').modal({show: true});
     getHistory(1, 12);
  }

    function getHistory(from, to){
      // for (var i = from; i <= to; i++) {
        var data = [];
                  var expected = [];
              var payment = [];
        data.push({"name":"from", "value": from });
        data.push({"name":"to", "value": to });
        data.push({"name":"msme_id", "value":$('#msme_id_p').val()});
        data.push({"name":"action", "value":"get payment history"});
        console.log(data);
        $.ajax({
          type:"POST",
          url:"controller/PayoutController.php",
          data: data,
          success: function(datae) {
            // console.log(data)
              var res = JSON.parse(jQuery.trim(datae));
              // console.log(res['expected'])
              // console.log(JSON.parse(res[0]));  
    

              for(i in res){
                b = res[i];
                console.log(b);
                 expected.push({x: new Date(b[0]['year'], b[0]['month'] ), y: parseInt(b[0]['expected'])})
                 payment.push({x: new Date(b[0]['year'], b[0]['month'] ), y: parseInt(b[0]['dif'])})
                // { x: new Date(2016, 0), y: 100 },
              }
                var chart = new CanvasJS.Chart("chartContainer", {
                  animationEnabled: true,
                  theme: "light2",
                  width: 1150,
                  title: {
                    text: "Entrepreneur Payment Scheme And History"
                  },
                  axisX: {
                    valueFormatString: "MMM"
                  },
                  axisY: {
                    prefix: "$",
                    labelFormatter: addSymbols
                  },
                  toolTip: {
                    shared: true
                  },
                  legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                  },
                  data: [
                  {
                    type: "column",
                    name: "Total Payment Amount",
                    showInLegend: true,
                    xValueFormatString: "MMMM YYYY",
                    yValueFormatString: "$#,##0",
                    dataPoints: payment
                  }, 
                  // {
                  //   type: "line",
                  //   name: "Expected Sales",
                  //   showInLegend: true,
                  //   yValueFormatString: "$#,##0",
                  //   dataPoints: expected
                  // },
                  {
                    type: "area",
                    name: "Expected Payment Amount",
                    markerBorderColor: "white",
                    markerBorderThickness: 2,
                    showInLegend: true,
                    yValueFormatString: "$#,##0",
                    dataPoints: expected
                  }]
                });
                chart.render(); 
              console.log(expected)
              // console.log(payment)
          }
        });
      // }
    }
    function changeData(element){
      $('.mycolor li').removeClass('active');
      $(element).addClass('active');
      var a = $(element).find('a').text();
      $('#yearss').html(a+'/5 Years');
      var from = 0;
      var to = 0 ;
      if (a == 1) {
        from = 1;
        to = 12;
      }else if(a == 2){
        from = 13;
        to = 24;
      }else if(a == 3){
        from = 25;
        to = 36;
      }else if(a == 4){
        from = 37;
        to = 48;
      }else if(a == 5){
        from = 48;
        to = 60;
      }
      getHistory(from, to);
    }

function addSymbols(e) {
    var suffixes = ["", "K", "M", "B"];
    var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

    if(order > suffixes.length - 1)                 
        order = suffixes.length - 1;

    var suffix = suffixes[order];      
    return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    e.chart.render();
}
</script>
<?php
    include 'includes/footer.php';
?>