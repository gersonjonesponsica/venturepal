<?php
include 'includes/header-user.php';
include 'common/config.php';
include 'model/InvestorDB.php';
include 'model/CategoryDB.php';
// include 'includes/head.php';

  $category_db = new CategoryDB();
  $category = $category_db->getAllCategory();
  $investor = new InvestorDB();

  if (isset($_SESSION['userid']) && (!empty($_SESSION['userid']))) {
    $userid = $_SESSION['userid'];
  }

  if (isset($_SESSION['user_type']) && (!empty($_SESSION['user_type']))) {
    $usertype = $_SESSION['user_type'];
  }
?>
<style>
  .join{
    width: 100%;
    border: 4px solid white;
    color: white;
    font-size: 30px;
    border-radius: 10px;
    color: white !important;
  }
  
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>VenturePal: Saving while earning</title>
  <!--   <link rel="icon" href="img/favi2on.png"> -->
    <!-- <link rel="shortcut icon" href="img/favicon.png"/> -->

<!-- <link rel="icon" type="image/gif/png" href="img/favicon.png"> -->
<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg" /> -->
<link rel="shortcut icon" href="[favicon.ico](http://www.sitepoint.com/forums/view-source:http://www.pmob.co.uk/favicon.ico)" type="image/x-icon" />
    <link href="css/bootstrapj8.css" rel="stylesheet">
    <link href="css/mdb.minh3.css" rel="stylesheet">
    <link href="css/styleaj1.css" rel="stylesheet">
    <link href="css/cardaj.css" rel="stylesheet">
    <link href="css/loader1.css" rel="stylesheet">
    <link href="css/typewritera1.css" rel="stylesheet">
    <link href="css/loaderWhole.css" rel="stylesheet">
    <!-- <link href="css/view2a.css" rel="stylesheet"> -->
    <link href="css/jquery-uij.css" rel="stylesheet">
    <link href="css/mycss4.css" rel="stylesheet">
    <link href="css/inbox.css" rel="stylesheet">
    <link href="css/animate2.css" rel="stylesheet">
    <link href="css/testimonial.css" rel="stylesheet">
    <link href="assets/css/ionicons3.css" rel="stylesheet">
    <link href="assets/css/stylea1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/footer-carda.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<!--  -->
   <script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1631023163635973';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

      .my-container {
          position: relative;
          background: #000;
          overflow: hidden;
      }
      .my-container:before {
          content: ' ';
          display: block;
          position: absolute;
          left: 0;
          top: 0;
          /*width: 100%;*/
          /*height: 100%;*/
          z-index: 1;
          opacity: 1;
          background-image: url('img/galaxy2.jpg');
          background-repeat: no-repeat;
          background-position: 10% 0;
 /*         -ms-background-size: cover;
          -o-background-size: cover;
          -moz-background-size: cover;
          -webkit-background-size: cover;
          background-size: cover;*/
      }

        html,
        body,
        .view {
            height: 100%;
            width: 100%;
        }
        /* Navigation*/
        .car1 {
            background: url('img/manilla-market-philippines.jpg')no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .car2 {
            background: url('img/entrepnanay.jpg')no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .car3 {
            background: url('img/bg.jpg')no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .car4 {
            background: url('img/values_wall_makati.jpg')no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .car5 {
            background: url('img/business.jpg')no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .navbar {
           background-color: #fff;;
        }
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
        /* Carousel*/
        
        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        
        .flex-center {
            color: #fff;
        }
        
        .carousel-caption {
            height: 80%;
            padding-top: 7rem;
        }


    </style>

</head>
<body>
 
    <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->

        <ol class="carousel-indicators">
            <li data-target="#video-carousel-example1" data-slide-to="0" class="active"></li>
            <li data-target="#video-carousel-example2" data-slide-to="1"></li>
            <li data-target="#video-carousel-example2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">
 
            <div class="carousel-item active">
              <div class="view car2 hm-black-strong"><!-- hm-black-strong -->
                  <div class="full-bg-img flex-center">
                  </div>
              </div>
                              <!--Caption-->
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <li>
                                <div class="typewriter">
                                  <h1 class="h1-responsive">Creating connections for further mutual growth.</h1>
                                </div>
                            </li>
                            <li>
                                <p class="font-white"> Great things come from small beginnings.</p>
                            </li>
                             <?php if(!isset($_SESSION['islogin'])): ?>
                              <li class="dropdown">
                                <a class="nav-link dropdown-toggle join" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 I'm looking to..
                                </a>
                                <div style="width: 100%; font-size: 25px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                   <a href="investor" class="dropdown-item">Invest</a>
                                   <a href="entrepreneurs" class="dropdown-item">Fundraise</a>
                                </div>
                              </li>
                              <?php endif; ?>
                          <li class="flex-center no-margin" style="height: auto !important;">
                            <div style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid white; align-self: center;"><i style="font-size: 60px;" class="fa fa-angle-down m-t-5 animated flash"></i></div>
                            
                          </li>
                        </ul>
                    </div>
                </div>
            </div>  
            <div class="carousel-item ">
              <div class="view hm-black-strong car1 ">
                  <div class="full-bg-img">
                      
                  </div>
              </div>
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <li>
                                <div class="typewriter">
                                  <h1 class="h1-responsive">Creating connections for further mutual growth.</h1>
                                </div>
                            </li>
                            <li>
                                <p class="font-white"> Great things come from small beginnings.</p>
                            </li>
                             <?php if(!isset($_SESSION['islogin'])): ?>
                              <li class="dropdown">
                                <a class="nav-link dropdown-toggle join" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 I'm looking to..
                                </a>
                                <div style="width: 100%; font-size: 25px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                   <a href="investor" class="dropdown-item">Invest</a>
                                   <a href="entrepreneurs" class="dropdown-item">Fundraise</a>
                                </div>
                              </li>
                              <?php endif; ?>
                          <li class="flex-center no-margin" style="height: auto !important;">
                            <div style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid white; align-self: center;"><i style="font-size: 60px;" class="fa fa-angle-down m-t-5 animated flash"></i></div>
                            
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
              <div class="view car3 hm-black-strong"><!-- hm-black-strong -->
                  <div class="full-bg-img flex-center">
                  </div>
              </div>
                              <!--Caption-->
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <li>
                                <div class="typewriter">
                                  <h1 class="h1-responsive">Creating connections for further mutual growth.</h1>
                                </div>
                            </li>
                            <li>
                                <p class="font-white"> Great things come from small beginnings.</p>
                            </li>
                             <?php if(!isset($_SESSION['islogin'])): ?>
                              <li class="dropdown">
                                <a class="nav-link dropdown-toggle join" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 I'm looking to..
                                </a>
                                <div style="width: 100%; font-size: 25px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                   <a href="investor" class="dropdown-item">Invest</a>
                                   <a href="entrepreneurs" class="dropdown-item">Fundraise</a>
                                </div>
                              </li>
                              <?php endif; ?>
                          <li class="flex-center no-margin" style="height: auto !important;">
                            <div style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid white; align-self: center;"><i style="font-size: 60px;" class="fa fa-angle-down m-t-5 animated flash"></i></div>
                            
                          </li>
                        </ul>
                    </div>
                </div>
            </div> 
       
        </div>

        <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
   <input type="text" name="" id="userid" value="<?php echo $userid ?>" hidden>
    <input type="text" name="" id="usertype" value="<?php echo $usertype ?>" hidden>
      <div class="container-fluid p-15 my-container">
        <div class="row">
          <div class="col-lg-2 w-fit p-15">
            <h1 class="text-center font-white" id="totalInvestor"></h1>
            <h6 class="text-center font-white"><i class="ion-person"></i> Total Investors </h6>
          </div>
          <div class="col-lg-3 w-fit p-15">
            <h1 class="text-center font-white" id="totalInvestment"></h1>
            <h6 class="text-center font-white">Funds Raised</h6>
          </div>
          <div class="col-lg-3 w-fit p-15" >
            <h1 class="text-center font-white" id="totalDeployed"></h1>
            <h6 class="text-center font-white">Funds Invested</h6>
          </div>
          <div class="col-lg-2 w-fit p-15">
            <h1 class="text-center font-white" id="income">12</h1>
            <h6 class="text-center font-white"> Return of Income</h6>
          </div>
          <div class="col-lg-2 w-fit p-15">
            <h1 class="text-center font-white" id="totalMsmeFunded"></h1>
            <h6 class="text-center font-white"><i class="ion-person"></i> Total Micro Vendors Funded </h6>
          </div>
        </div>
      </div>

<div id="div_featured" class="container-fluid p-b-40 bg-color-F7FAFA no-display">
  <div class="row ">
    <div class="col-lg-9" id="scrollablehere" style="overflow-x: hidden; overflow-y: hidden; height: 450px">

         <div class="row" id="feature">
          <div class="col-lg-5 m-t-40">
              <div class="container">
               <h1 class="title" id="title_feature"></h1>
                  <div class="portfolio-item graphic-design ">
                  <div class="he-wrap tpl6 member1 ">
                    <div id="image"> </div>
                                 
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                          <h3 class="a1" data-animate="fadeInDown" id="txtBusinessType"></h3>
                          <a id="profile" target="_blank" data-toggle="tooltip" data-placement="top" title="View MSME Portfolio" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search ion-size-20"></i></a>
                          <a id="message" target="_blank" data-toggle="tooltip" data-placement="top" title="Send Message" href="" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-chatbox-working ion-size-20"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                  </div><!-- he wrap -->
                </div><!-- end col-12 -->
              </div>
            </div>
            <div class="col-lg-6  m-t-40">
             <div class="container-fluid" style="top: 0px !important;">
              <div class="row">
                <div class="row-lg-3 m-t-40">
                  <h2 id="txtMsmeName"></h2> 
                  <div class="m-t-10" id="txtEntrep">
                    
                  </div>
                  <div class="rate-div no-border  m-t-10" >
                     <div style="width: 140%" class="" id="rate-div">
                      
                   <!--    <i href="javascript:;"  class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                      <i href="javascript:;" class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                      <i href="javascript:;"  class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                      <i href="javascript:;" class="ion-star _star_ ion-size-25 m-3 hand-point"></i> -->
                    </div> 
                    </div>
                  <div class="m-t-10" id="txtDesc">
                  </div> 
                  <div class="m-t-10">
                    <div id="txtLocation"></div>
                  </div>
                </div>
              </div>
              </div>
               <div class="progress m-t-10 m-b-10" id="txtProgress">
                    
                  </div>
                <table class="table" >
                  <tbody>
                    <tr >
                      <td class="p-5"><i class=" ion-size-15 m-r-5"><strong id="txtRaised"></strong> Raised</td>
                      <td class="p-5"><i class="ion-calendar ion-size-15 m-r-5"></i><strong id="txtRemainingDays">30</strong> days to go</td>
                    </tr>
                    <tr>
                      <td class="p-5"><i class="ion-size-15 m-r-5"><strong id="txtCapRemaining">P69, 696</strong> Remaining</td>
                      <td class="p-5"><i class="ion-person-add ion-size-15 m-r-5"></i>#<strong id="txtVentureRemaining">5</strong> Venturer Remaining</td>
                    </tr>
                <tr>
                      <td class="p-5"><i class="ion-minus-circled ion-size-15 m-r-5"> <strong id="min">P69, 696</strong></td>
                      <td class="p-5"><i class="ion-plus-circled ion-size-15 m-r-5"> <strong id="max">P69, 696</strong></td>
                    </tr>
                  </tbody>
                </table>  

            </div>
          </div>
         <div class="row" id="feature2" hidden>
          <div class="col-lg-5 m-t-40">
              <div class="container">
               <h1 class="title" id="title_feature"></h1>
                  <div class="portfolio-item graphic-design ">
                  <div class="he-wrap tpl6 member1 ">
                    <div id="image " class="h-300" style="background-color: #F4F4F4"> </div>
                  </div><!-- he wrap -->
                </div><!-- end col-12 -->
              </div>
            </div>
            <div class="col-lg-6 m-t-40" style="background-color: #F4F4F4; width: 100%; height: 100%; margin: 0 auto;">

            </div>
          </div>                    
    </div>
      <div class="col-lg-3">
        <div class="container-fluid m-t-30"  style="top: 0px !important;">
             <ul class="categories">
               <!-- list of categories here -->
            </ul>
        </div>
      </div>
</div>
</div>

<div id="div_popularmsme" class="container-fluid m-r-50 m-l-50 no-display">
  <h1 class="line-with-text">Investment Opportunity</h1>
  <div class="row" id="popularmsme">  
  <!-- popular msme datas here    -->
  </div>
</div>
<div id="div_partlyfunded" class="container-fluid m-r-50 m-l-50 no-display">
  <h1 class="line-with-text" >Micro Vendors Funded</h1>
  <div class="row" id="partlyfunded">  
  <!-- popular msme datas here    -->
  </div>
</div>

<!-- <h1 class="line-with-text">What our clients say</h1> -->
<div id="div_testimonial" class="container-fluid h-300 no-pad no-display" >
    <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-pause="hover" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner" role="listbox" id="testi">
          
        </div>
        <a class="left carousel-control" href="#testimonial4" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#testimonial4" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>
<div id="loadthis" class="loadingDiv"></div>
  <div class="modal fade" id="mymodal" tabindex="2" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active ">
                  <img width="100%" class="d-block img-fluid" src="" alt="First slide">
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <div class="typewriter">
                                 <h1>Gerson Jones Ponsica</h1>
                                </div>
                            <li>
                                <a target="_blank" href="http://mdbootstrap.com/forums/forum/support/" class="btn btn-default btn-lg" rel="nofollow">Support forum</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                  <img width="100%" class="d-block img-fluid" src="" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img width="100%" class="d-block img-fluid" src="" alt="Third slide">
                </div>
              </div>

              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> 
            </div>
      </div>
    </div>
</div>
<div class="container-fluid p-15 supported">
  <h1 class="line-with-text">Supported by</h1>
  <div class="row" >
    <div class="col-lg-3 w-fit p-15 department" align="center">
    </div>
    <div class="col-lg-3 w-fit p-15 department" align="center">
      <h1 class="text-center font-white">Depra</h1>
      <img src="img/nego.png" class="tras-anim" width="150" height="150">
    </div>
    <div class="col-lg-3 w-fit p-15 department" align="center">
      <h1 class="text-center font-white">Depra</h1>
      <img src="img/dti.png" class="tras-anim" width="150" height="150">
    </div>
    <div class="col-lg-3 w-fit p-15 department" align="center">
    </div>

  </div>
</div>
<div class="modal fade" id="rateMod" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="text-center">Below are the list of all your investment that successfully raised.</h4>
            </div>
            <div class="modal-body" >
              <div class="row m-t-10" id="rateModal"></div>
            </div>
         <!--    <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>

<div class="modal fade" id="testiMod" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="text-center">Below are the list of all your investment that successfully raised.</h4>
            </div>
            <div class="modal-body">
              <div class="container" id="testiModal">
                
              </div>
            </div>
           <!--  <div class="modal-footer">
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
              <h4 class="text-center">You need to pay this month</h4>
            </div>
            <div class="modal-body">
              <div class="container" id="payoutMod">
                
              </div>
            </div>
          <!--   <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>

<div class="modal fade" id="cycleDetailsModal" role="dialog">
    <div class="modal-dialog  modal-md">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="text-center">Investment Details</h4>
            </div>
            <div class="modal-body" id="modalBodyCycle">
               
            </div>
        </div>
      
    </div>
</div>

</div>
<script type="text/javascript" src="script/summary.js"></script>
<script type="text/javascript" src="script/partly-funded.js"></script>
<script type="text/javascript" src="script/popularmsme1.js"></script>
<script type="text/javascript" src="script/side-category.js"></script>
<script type="text/javascript" src="script/testimonial-index.js"></script>
<!-- <script type="text/javascript" src="script/checkTesti.js"></script> -->
<!-- <script type="text/javascript" src="script/checkPayout2.js"></script> -->

<script>
$(window).load(function(){
     $('#loadthis').fadeOut();
});  
  
  var isScroll1 = false;
  var isScroll2 = false;
  var isScroll3 = false;
  var isScroll4 = false;
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop() ;
    if (scroll >= 500 && !isScroll1) {
      getTopOne();
      getCategoryWithMsme();

      isScroll1 = true;
    }else if(scroll >= 1000 && !isScroll2){
      popularMsme();

      isScroll2 = true;
    }else if(scroll >= 1500 && !isScroll3){
      
      partlyFunded();
      isScroll3 = true;
      // div_testimonial
    }else if(scroll >= 2500 && !isScroll4){
      $('#div_testimonial').removeClass('no-display');
      $('#div_testimonial').addClass('animated fadeInUp');
      isScroll3 = true;
    }
    // console.log(scroll); 
  });
</script>
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
    <script type="text/javascript" src="js/tether.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap1.js"></script> 
    <script type="text/javascript" src="js/mdb5.js"></script>
    <script src="js/jquery-uia2.js"></script> 
    
  
    <script src="assets/js/jquery.hoverdir.js"></script> 
    <script src="assets/js/jquery.hoverex.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script> 
    <script src="assets/js/jquery.isotope.min.js"></script> 
    <!-- <script src="js/custom8.js"></script>  -->
    <!-- <script src="js/timeago.js"></script>  -->
    <!-- <script src="js/compareDate.js"></script>  -->

    <!-- <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> -->
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



</body>

</html>