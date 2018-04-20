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
        /*.table td , .table th{
          color: black ;
        }*/
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
  .editLink{color:#fff;
    position:absolute;
    top:25% !important;
    left:45% !important;
    opacity:0;
    text-align:center;
    background:rgba(0,0,0,.6);
    transition:all .3s ease-in-out 0s;
    -mox-transition:all .3s ease-in-out 0s;
    -webkit-transition:all .3s ease-in-out 0s;
    width:110px}
</style>
  <!-- <link rel="stylesheet" href="css/topnavj.css">  -->
<div class="container m-t-100 m-b-30" style="background: white; box-shadow: -1px 2px 5px -1px rgba(0,0,0,0.1); border-radius:.25rem" >
        <div class="span3 well mt-5" >
            <center>
                
                 <div class="img-relative">
                    
                    <img src="img/unknown.jpg" id="p_profile" class="img-circle2" style="box-shadow: -1px 2px 5px -1px rgba(0,0,0,0.4);">
                  </div>
                
                <div class="mb-3 m-t-30">
                    <h4  id="txt_wallet"></h4>
                    <h4 id="txt_fullname"></h4>
                    <p class="" id="txt_location"><i class="ion-location"></i></p>
                </div>
            </center>
          <!--   <div style=""><a href="javascript:;"> edit</a></div> -->
        </div>
        <div class="row justify-content-md-center">
      <div class="col-lg-12">
      <!-- <h1 class="title">Investment</h1> -->
      <div class="container contractnav">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div id="myTopnav">
              <a href='javascript:;' onclick="step(this)" id="stepone" class="bat nav-active"><i class="ion-clipboard"></i> Investment Summary</a>
              <a href='javascript:;' onclick="step(this)" id="steptwo" class="bat" ><i class="ion-home"></i> Make Investment</a>
    
           <a id="stepthree" href='javascript:;' onclick="step(this)" class="bat" data-badge="">Pending Application</a>
              
            </div>
          </div>
        </div>
      </div>
        <div class="container m-t-10">
          <div class="row">
              <div class="col-lg-12">
                <div class="row taba" id="row_stepone">
                <div class="col-lg-12">
                  <div class="container-fluid table-responsive">
                    <table id="documentList" class="table">
                      <thead>
                        <th class="bg-color-F7FAFA">Investment no.</th>
                        <th class="bg-color-F7FAFA">Vendor Details</th>
                        <th class="bg-color-F7FAFA">Invested Amount</th>
                        
                        <th class="bg-color-F7FAFA">Status</th>
                        <th class="bg-color-F7FAFA">Interest Income</th>
                      </thead>
                      <tbody id="earnTableBody_">
     
                      <!--   <tr>
                          <td colspan="2"></td><td  style="color: red">Total Earning </td><td class="titletd">0.00</td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div> 
                <div class="row taba" hidden id="row_steptwo">
                <div class="col-lg-12">
                  <div class="container-fluid">
                    <div class="container justify-content-md-center">
                      <!-- <div class="row" style="border-bottom: 1px solid #DDDDDD; margin-bottom: 10px !important">
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
                      </div> -->
                        <div class="row" id="investment">
                           <!--  <div class="col-sm-8 m-t-10 m-b-20  m-l-100">
                               <div class="interest-card border-gray tras-anim">
                                     <h1>Team Rocket Sari sari store</h1>
                               </div>
                            </div> -->
                        </div>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row taba" hidden id="row_stepthree">
                <div class="col-lg-12">
                  <div class="container-fluid">
                    <div class="container justify-content-md-center">
                        <div class="row" id="pending">
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
  <div id="loadthis" class="loadingDiv"></div>
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

<script src="script/dashboard2.js"></script>
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
