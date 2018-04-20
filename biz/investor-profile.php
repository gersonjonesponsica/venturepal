<?php
  include 'includes/header-user.php';
  include 'common/config.php';
  include 'model/AddressDB.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>VenturePals</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <link href="css/bootstrapj8.css" rel="stylesheet">
    <link href="css/mdb.minh3.css" rel="stylesheet">
    <link href="css/styleaj1.css" rel="stylesheet">
    <!-- <link href="css/cardaj.css" rel="stylesheet"> -->
    <!-- <link href="css/searchaj.css" rel="stylesheet"> -->
    <!-- <link href="css/sectionaj.css" rel="stylesheet"> -->
    <link href="css/loader1.css" rel="stylesheet">
    <!-- <link href="css/typewritera1.css" rel="stylesheet"> -->
    <link href="css/loaderWhole.css" rel="stylesheet">
    <!-- <link href="css/view2a.css" rel="stylesheet"> -->
    <!-- <link href="css/teamj.css" rel="stylesheet"> -->
    <!-- <link href="css/fbprofilea4.css" rel="stylesheet"> -->
    <!-- <link href="css/topnavj.css" rel="styleshe8et"> -->
    <link href="css/jquery-uij.css" rel="stylesheet">
    <link href="css/mycss4.css" rel="stylesheet">
    <link href="css/inbox.css" rel="stylesheet">
    <link href="css/animate2.css" rel="stylesheet">
    <!-- <link href="css/testimonial.css" rel="stylesheet"> -->
    <link href="assets/css/ionicons3.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/jquery.mCustomScrollbarj1.css"> -->
    <link href="assets/css/stylea1.css" rel="stylesheet">
    <link href="css/chata.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/footer-carda.css"> -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
   <script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.js"></script>
    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        .navbar {
           background-color: #fff;;
        }
          .editLink{color:#fff;
    position:absolute;
    top:65% !important;
    left:20% !important;
    opacity:0;
    text-align:center;
    background:rgba(0,0,0,.6);
    transition:all .3s ease-in-out 0s;
    -mox-transition:all .3s ease-in-out 0s;
    -webkit-transition:all .3s ease-in-out 0s;
    width:110px}
  /*     
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }*/
        .top-nav-collapse-nav-item{
          color: #484848 !important;
        }
        .top-nav-collapse {
            background:rgba(255,255,255,1);
        }


        footer.footer-copyright{
          background-color: #484848;
        }
        footer.page-footer h5{
          font-size: 30px;
        }
        footer.page-footer {
            background-color: #484848;
            color : white;
            margin-top: 0;
        }
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #fff;
            }
        }

    </style>
    <script>
      
          $(window).load(function(){
       $('#loadthis').fadeOut();
  });  
    </script>
</head>
<body>



<style>
  body{
    background-color: #F7FAFA;
  }
   .side-chat-user:hover{
    background-color: #e7e7e7;
    cursor: pointer;
  }
</style>
  <!-- <link rel="stylesheet" href="css/topnavj.css">  -->
  <div id="loadthis" class="loadingDiv"></div>
<div class="container-fluid  h-auto  p-b font-white center-on-small-only"  style="background-color: #21b08a">
  <div class="row justify-content-md-center">
  <div class="row justify-content-md-center">
      
  </div>
  </div>
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
          <div class="row">
             <!--  <button class="btn btn-over-default-color">Edit Account</button> -->
          </div>
           
          <div class="row font-30">
            <strong>Investment Capability: &nbsp</strong> <h1 class="font-white" id="txt_wallet"></h1>
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
    <div class="col-lg-4">
        <div class="container">
          <div class="row">
             
          </div>
          <div class="row">
    <!--         <button class="btn btn-over-default-color" id="btnWallet"><i class="ion-compose"></i> Edit Investment Capability</button>  -->
          </div>
        </div>
       
    </div>
    </div>
    </div>
  </div>
</div> 
 <!--  <input hidden  name="userid" id="userid" value="<?php echo $_SESSION['userid']?>">
  <input hidden  name="accountid" id="accountid" value="<?php echo $_SESSION['account_id']?>">
  <input hidden  name="usertype" id="usertype" value="<?php echo $_SESSION['user_type']?>"> -->
<div class="container-fluid">
<div class="container-fluid bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-7 ">
          <div class="container justify-content-md-center" id="profile-detail">
          <a type="button" id="edit-profile-detail" class="pull pull-right"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-person"></i> Profile Information</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td  class="titletd" width="200">Family name</td><td id="txt_lname"></td>
                  </tr>
                   <tr>
                    <td class="titletd" width="200">Given name</td><td id="txt_fname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Middle name</td><td id="txt_mname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Barangay</td><td id="txt_brgy"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Province</td><td id="txt_state"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">City</td><td id="txt_city"></td>
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
                <select onchange="changeState(this)" name='state' id="state" class=' form-control custom-select ' style="height: 25px !important; width: 83%">

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
      <div class="col-lg-5">
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

<!--         <div class="container justify-content-md-center no-display" id="form-about-me" >
        <a type="button" id="save-about-me" class="pull pull-right">Save</a>
        <a type="button" id="cancel-about-me" class="pull pull-right m-r-10">Cancel</a>

       
        </div> -->
        <div class="container justify-content-md-center no-display" id="form-about-me" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-about-me" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-about-me" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Contact Details</div>
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
        <div class="container justify-content-md-center ">
         <a type="button" class="pull pull-right" id="btn_interest"><i class="ion-compose"></i> Edit</a>
             <h1 class="title"><i class="ion-heart"></i> Interested In</h1>
                <div class="row" id="interest_">
                <!--     <div class="col-sm-6 m-t-10 ">
                       <div class="interest-card border-gray tras-anim">
                             <h1>Transporation</h1>
                       </div>
                    </div> -->
                </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid  bg-white m-50 p-15">
<div class="row justify-content-md-center">
    <div class="col-lg-7" >
      <div class="container justify-content-md-center" id="contact-detail">
       <a type="button" id="edit-contact-detail" class="pull pull-right"><i class="ion-compose"></i> Edit</a> 
       <h1 class="title"><i class="ion-iphone"></i> Contact Details</h1>
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
      <div class="container justify-content-md-center no-display" id="form-contact-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
        <a type="button" id="add-contact-detail" class=" pull pull-right" data-toggle="tooltip"  title="Add another contact"><i class="ion-plus"></i></a>
          <a type="button" id="save-contact-detail" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-contact-detail" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
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
    <!--      <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Email</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group"> -->
                  <input type="email" hidden class="inputText no-margin" id="email" name="email" placeholder="teamrocket@gmail.com"/>
              
            <!--   </div>            
            </div>
          </div> -->
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
   
   <div class="col-lg-5 ">
      <div class="container justify-content-md-center" id="overview">
       <a type="button" class="pull pull-right" id="edit-overview"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-calendar"></i> Overview</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="200">Minimum Investment</td><td id="txt_min"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Maximum Investment</td><td id="txt_max"></td>
                  </tr>
                   <tr>
                    <td class="titletd" width="200">Date Register</td><td>November 1, 2014</td>
                  </tr>
                </tbody>
            </table><br/>
      </div>
      <div class="container justify-content-md-center no-display" id="form-overview">
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-overview" class="pull pull-right m-r-10"><i class="ion-checkmark"></i> Save</a>
          <a type="button" id="cancel-overview" class=" pull pull-right m-r-10"><i class="ion-close"></i> Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Overview</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="add-form-account-setting" id="addOverviewForm" name="addOverviewForm" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Min Investment</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <select  name="mininve" id="mininve" class='form-control custom-select' style="height: 25px !important;  width: 70%;">
               
                </select>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Max Investment</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <select  name="maxinve" id="maxinve" class='form-control custom-select' style="height: 25px !important;  width: 70%;">
               
                </select>
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
    <div class="col-lg-7">
     <div class="container justify-content-md-center" id="account-setting">
       <a type="button" class="pull pull-right" id="edit-account-setting"><i class="ion-compose"></i> Edit</a>
           <h1 class="title"><i class="ion-gear-b"></i> Change Password</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <!-- <tr>
                    <td class="titletd" width="200">Email</td><td id="txtEmail_"></td>
                  </tr> -->
               <!--    <tr>
                    <td class="titletd" width="200">Password</td><td>xxxxxxxxxxx</td>
                  </tr> -->
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
          <form id="changePasswordForm" method="post">
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
                  <input type="password" class="inputText no-margin" id="password" name="password" placeholder="Type your password "/>
               
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
                  <input type="password" class="inputText no-margin" id="repassword" name="repassword" placeholder="Re-type your password" />
              </div>            
            </div>
          </div>      
          </form>
        </div>
        </div>
        </div>
      </div>
    </div>
   <div class="col-lg-5 ">
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
              <div class="form-group" id="phone_">
                <label class="switch" for="messageCheck">
                  <input type="checkbox" id="messageCheck" />
                  <div class="slider-small round"></div>
                </label>
              </div>
              <div class="form-group" id="phone__">
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
<div class="modal fade" id="interest" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
             <!--  <h2>Online Terms and Conditions</h2> -->
             <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <h6 class="title">What business are you interested in?</h6>
              <div class="container justify-content-md-center ">
                  <div class="row" id="interested">
                  </div>
                  <div class="row" id="interest_mod">
                  </div>
                </div>
            </div>
           <!--  <div class="modal-footer">
           <button type="button" class="btn btn-default pull-right" id="btnSave">Save </button> 
                 <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div> -->
        </div>
      
    </div>
</div>
<div class="modal fade" id="verifyPhoneModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>

             <h6 class="title">Verify Phone number</h6>
            </div>
            <div class="modal-body">
              <p>We sent a code to your number, please take a look</p>
              <div class="container justify-content-md-center m-t-30 m-b-30">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="col">
                      <label class=" m-t-10">Code</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <form  id="verifyPhoneForm" method="post">
                        <input type="text" autofocus="true" class="inputText no-margin" id="p_code" name="p_code" placeholder="xxxxxx" />
                      </form>
                    </div>            
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <div class="col">
                        <a href=""><label class=" m-t-10">Re-send code</label></a>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default pull-right" id="btnVerify">Save </button> 
                 <!-- <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
                
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade" id="walletModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
             <!--  <h2>Online Terms and Conditions</h2> -->
             <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <h6 class="title">Update your Vitual Money</h6>
              <div class="container justify-content-md-center m-b-20">
                <form  id="updateWallet" method="post">
                  <input type="text" class="inputText no-margin" id="wallet" name="wallet" />
                </form>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveWallet" class="btn btn-default pull-right">Save </button> 
                 <!-- <button type="button" id="btn_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
                
            </div>
        </div>
      
    </div>
</div>
<div class="chatbox">
    <div class="container p-15">
      <h5 class="text-center">Your Conversation</h5>
        <div id="loader-div-2" hidden>
          <li class="center-text" style="list-style: none" id="loading"><i class="ion-load-c"></i> </li>
        </div>
        <div class="" id="convo"></div>
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
          <!--   <div class="modal-footer">
              <button type="button" id="btnReportTerms_close" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div> -->
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
          <!--   <div class="modal-body" id="profileModal">
              
            </div> -->
        <!--     <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>

<div class="modal fade" id="capMod" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="text-center"> Please Update your Investment Capacity. It must not be 0.</h4>
          </div>
        </div>
      
    </div>
</div>
<a class="contact-button" id="chat"><i id="chat-icon"></i></a>

<div class="notification" id="notification" hidden>
     <div class="container">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <ul class="noti">
                    <li><h2><i id="notification-icon" class=" ion-size-35 m-r-10 "></i></h2></li>
                    <li><h2 id="notification-text" ></h2></li>
                </ul>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>
  <footer class="page-footer center-on-small-only">
  
        <!--Footer Links  hidden-lg-down-->
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-lg-6 offset-lg-1" class="about-footer">
                <img class="img-responsive" id="nav-logo" src="img/officialwhite.png" width="170" height="40">
                <p>&copy; 2018 VenturePal. All Rights Reserved.</p>
                    <p>VenturePal is an online investment pooling platform for Philippine MSME's.</p>
                    <small>By using this site, you agree to the <a href="terms" class="text-underline">Terms and Conditions.</a></small>
                </div>
                <!--/.First column-->

               <div class="col-lg-4 offset-lg-1" class="about-footer">
                    <div class="call-to-action">
                        <h4>Follow us</h4>
                        <ul>
                            <li class="social-icons"><a href="https://www.facebook.com/VenturePal.ph/"><i class="ion-social-facebook ion-size-30"></i></a></li>
                            <li class="social-icons"><a href="https://www.facebook.com/groups/1513524005423660/"><i class="ion-social-instagram ion-size-30"></i></a></li>
                            <li class="social-icons"><a href="https://www.facebook.com/VenturePal.ph/"><i class="ion-social-googleplus ion-size-30"></i></a></li>
                            <li class="social-icons"><a href="https://www.facebook.com/VenturePal.ph/"><i class="ion-social-twitter ion-size-30"></i></a></li>
                        </ul>
                    </div>
                    <div>

                        <div style="color: white !important; " class="fb-like" data-href="https://www.facebook.com/VenturePal-1652615591425388/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true" data-colorscheme="light"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="hr-footer m-l-100 m-r-100">
        <div class="container-fluid">
            <div class="row p-15 m-r-30 m-l-30">
                <div class="col-lg-3 offset-lg-1" class="about-footer"> <!--  hidden-lg-down -->
                    <h6> About us</h6>
                    <ul>
                        <li><a href="about">Who we are</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-1" class="about-footer">
                    <h6>Learn</h6>
                    <ul>
                        <li><a href="how-it-works"> How it works</a></a></li>
                        <li><a href="">How we manage risks</a></li>
                        <li><a href="">How you can contribute</a></li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-1" class="about-footer">
                    <h6>Help</h6>
                    <ul>
                        <li><a href="help">Help Center</a></li>
                        <li><a href="contact-us">Contact-us</a></li>
                        <li><a href="">Need help? Email us at support@venturepal.com</a>?</li>
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-1 hidden-lg-down" class="about-footer">
                </div>
               <div class="col-lg-3 offset-lg-1 hidden-lg-down" class="about-footer">
                </div>
            </div>
        </div>
        <hr>
    </footer>
<!--   <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1631023163635973';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script> -->
  <script src="script/conversation9.js"></script>

<script src="script/investor-profilea4.js"></script>
<script src="script/interest2.js"></script>
<script src="script/contract-scroll4.js"></script> 

<script src="script/formTransition1.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script> 
<script type="text/javascript" src="js/bootstrap1.js"></script> 
<script type="text/javascript" src="js/mdb5.js"></script>
<script src="js/jquery-uia2.js"></script> 
<script src="js/custom8.js"></script> 
<script src="js/timeago.js"></script> 
<script type="text/javascript" src="script/login-profile6.js"></script>
<script type="text/javascript" src="script/comma1.js"></script>

<script>
    function notify(type, message){
        var delay = 5000;
        $('#notification').addClass(type +' animated fadeIn').removeAttr('hidden');

        if(type == 'success-notify'){
            $('#notification-icon').addClass('ion-checkmark-circled');
        }else if(type == 'error-notify'){
            $('#notification-icon').addClass('ion-close-circled');
        }else if(type == 'info-notify'){
            $('#notification-icon').addClass('ion-information-circled');
        }
        
        $('#notification-text').text(message);
        // alert(message);

        setTimeout(function(){
            $('#notification').attr('hidden','true');
            
            if(type == 'success-notify'){
                $('#notification-icon').removeClass('ion-checkmark-circled');
                $('#notification').removeClass('success-notify');
            }else if(type == 'error-notify'){
                $('#notification-icon').removeClass('ion-close-circled');
                $('#notification').removeClass('error-notify');
            }else if(type == 'info-notify'){
                $('#notification-icon').removeClass('ion-information-circled');
                $('#notification').removeClass('info-notify');
            }
            $('#notification-text').html('');
        }, delay);
    }


</script>
