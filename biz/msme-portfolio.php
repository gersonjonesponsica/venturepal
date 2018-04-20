<?php
    // include 'includes/backtoindex.php';
    include 'includes/header-user.php';
    include 'includes/head.php';

    
?>
<style>
  body{
    background-color: #F7FAFA;
  }
    #geomap{width: 100%; height: 400px;}
</style>

  <div class="container-fluid prof profile-nav fixed-top scrolling-navbar" hidden >
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
           <div class="profile-link" id="myTopnav">
        <!--    <img src="img/ProfilePics/vendetta.png" class="img-circle center-bg b-2 m-t-5"> -->
          <img id="nav_logo" src="img/Sari-Sari_Store_Cavite.jpg" class="b-2 m-t-5" height="40" width="60">
              <a href="javascript:;" id="nav_name">Team Rocket Sari sari store</a>
               <a data-toggle="tooltip" data-rel="prettyPhoto" onclick="like(this)" class="animate_wobble_heart like_ _wobble_heart m-r-10" href="javascript:;"><i class="ion-heart ion-size-15"></i></a>
            
                <a data-toggle="tooltip" class="animate_wobble bookmark_ _wobble_star" onclick="bookmark(this)" href="javascript:;"><i class="ion-star ion-size-15"></i></a>
                
                  <li class="dropdown">
                    <a class="nav-item1" href="business" >Shortcut</a>
                        <div class="dropdown-content">
                        <div class="desc"> <a href='javascript:;' onclick="scrollen(this)" id="summary">Summary</a></div>
                        <div class="desc"> <a href='javascript:;' onclick="scrollen(this)" id="details">Business Details</a></div>
                        <div class="desc"> <a href='javascript:;' onclick="scrollen(this)" id="docu">Documents</a></div>
                        <div class="desc"> <a href='javascript:;' onclick="scrollen(this)" id="gallery">Gallery</a></div>
                        <div class="desc"> <a href='javascript:;' onclick="scrollen(this)" id="maploc">Map Location</a></div>
                      </div>
                  </li>
                
          
          </div> 
        </div>
        <div class="col">
           
        </div>
         <div class="col-lg-3">
           <div class="profile-link" id="myTopnav">
              <a href="message-us?to_id=<?php echo $_GET['id']; ?>" class="bg-mycolor font-white border-nice b-r-3">Send Message</a>
              <a hidden="true" id="investNav" href="contract?id=<?php echo $_GET['id']; ?>" class="m-l-10 bg-mycolor border-nice b-r-3 font-white">Invest</a>
          </div> 
        </div>
      </div>
        
    </div>
  </div>


<div class="container-fluid p-b-40 m-t-100" id="div_summary">
  <div class="row ">
    <div class="col-lg-12" id="scrollablehere" style="height: auto;">

         <div class="row" id=""  style="">
          <div class="col-lg-4">
              <div class="container">
               <!-- <h1 class="title">asdasdfasdf</h1> -->
               
                  <div class="portfolio-item graphic-design ">

                  <div class="he-wrap tpl6 member1 p-45" id="photo">
                                 
                  </div><!-- he wrap -->
                  <img id="badge" src="badge/small.png" height="130" width="80" style="position: absolute; top: 10px;">
                  <div>
                    <div class="row rate-div center-div-within-div m-t-10" >
                       <div class="center-div-within-div" id="rate-div">
                        
                     <!--    <i href="javascript:;"  class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                        <i href="javascript:;" class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                        <i href="javascript:;"  class="ion-star _star_ ion-size-25 m-3 hand-point"></i>
                        <i href="javascript:;" class="ion-star _star_ ion-size-25 m-3 hand-point"></i> -->
                      </div> 
                    </div>
                  </div>
                  <div>
                    <h6 class="text-center m-t-5" id="rateStar">5.0  / 5.0</h6>
                  </div>
                  <div id="rateBtn">
                    
                  </div>

                </div><!-- end col-12 -->
              </div>
            </div>
            <div class="col-lg-5">
             <div class="container-fluid" style="top: 0px !important;">
              <div class="row">
                <div class="row-lg-3 m-t-40">
                  <h2 id="txtName"></h2> 
                  <div class="m-t-10" id="nameAndImage">
                  <!--   <img class="img-circle" src="img/ProfilePics/vendetta.png">
                    <a href="search"><small>by  Gerson Jones Ponsica</small></a> -->
                  </div>
                  <div class="m-t-10" >
                    <h4 id="msme_desc"></h4>
                  </div> 
                  <div class="m-t-10">
                    <a href="javascript:;" id="txtLocation"></a>
                  </div>
                  <div class="progress m-t-10" id="txtRaisePercent">
                    
                  </div>

                </div>
              </div>
              </div>
                <table class="table" >
                  <tbody>
                    <tr >
                      <td class="p-5"><i class=" ion-size-15 m-r-5"><strong id="txtTotalRaise"></strong> Raised</td>
                      <td class="p-5"><i class="ion-calendar ion-size-15 m-r-5"></i><strong id="txtRemainingDay"></strong> days to go</td>
                    </tr>
                    <tr>
                      <td class="p-5"><i class="ion-size-15 m-r-5">#<strong id="txtRemainingCapitalNeeded"></strong> Remaining</td>
                      <td class="p-5"><i class="ion-person-add ion-size-15 m-r-5"></i><strong id="txtRemainingVenture"></strong> Venturer Remaining</td>
                    </tr>
                    <tr>
                      <td class="p-5"><i class="ion-minus-circled ion-size-15 m-r-5">Min: <strong id="txtMin"></strong></td>
                      <td class="p-5"><i class="ion-plus-circled ion-size-15 m-r-5">Max: <strong id="txtMax"></strong></td>
                    </tr>
                  </tbody>
                </table>  
            </div>
            <div class="col-lg-3">
            <!-- <div class="container-fluid" style="top: 0px !important;"> -->
              <div class="row m-t-40">
                <a class="btn btn-default" hidden="true" id="investBtn" href="contract?id=<?php echo $_GET['id']; ?>">Invest in us</a>
              <a class="btn btn-default" href="message-us?to_id=<?php echo $_GET['id']; ?>">Send Message</a>
              <a href="javascript:;" id="btnDailyModal">
                <h1 class="title"><i class="ion-calendar"></i> View Business Reports</h1>
              </a>
              </div>
            <!--   <div class="row">
                <iframe width="90%" height="40%" id="video" allowfullscreen="true" allowscriptaccess="always">
              </iframe>
              </div> -->
              <div class="row ion">
                <h1 class="title" id="txtLike"></h1>
              </div>
              <div class="row profile-link" id="likebookmark">

    
                  <a data-toggle="tooltip" onclick="like(this)" data-rel="prettyPhoto" href="javascript:;" class="dmbutton2 a2 m-r-20 animate_wobble_heart like_ _wobble_heart" data-animate="fadeInUp"><i class="ion-heart ion-size-25"></i>
                  </a>
               
                  <a data-toggle="tooltip" href="javascript:;"  onclick="bookmark(this)" class="dmbutton2 a2 animate_wobble bookmark_ _wobble_star" data-animate="fadeInUp">
                    <i class="ani ion-star ion-size-25 "></i>
                  </a>
              </div>
            <!-- </div> -->
            </div>
          </div>         
    </div>

</div>
</div>
<?php 
  if (isset($_GET['rate'])) {
    if($_GET['rate'] == 'true') {
     echo '<input type="hidden" name="rate" id="rate" value=" '.$_GET['rate'].' ">';
    }
  }
?>

<div class="container-fluid profile-nav bg-white"  style="top: 50px !important; ">
  <div class="container">
    <div class="row">

      <div class="col-lg-7">
        <div class="profile-link" id="myTopnav">
          <a href="">Business </a>
          <a href="">FAQ </a>
          <a href="">Comments </a>
        </div> 
      </div>
      <div class="col-lg-5">
       
      </div>
    </div>
      
  </div>
</div>

<input type="" id="msme_id" name="" value="<?php echo $_GET['id']; ?>" hidden>
<div class="container-fluid m-t-20" >
<div class="container-fluid  bg-white m-50 p-15 " >
<div class="row justify-content-md-center">
    <div class="col-lg-6 " >
         <div class="container justify-content-md-center" id="div_docu"><!-- 
       <a type="button" class="pull pull-right">Edit</a> -->
           <h1 class="title"><i class="ion-document"></i> Certification & Permit</h1>
              <div class="row">
                  <div class="col-sm-6 m-t-10" id="bP">
                    
                  </div>
                  <div class="col-sm-6 m-t-10" id="dC">

                  </div>
                  <div class="col-sm-6 m-t-10" id="mP">
                     <div class="interest-card border-gray tras-anim hand-point" id="mP">
                           <h1 >Mayor's Permit</h1>
                     </div>
                  </div>
              </div>
      </div>
    </div>
   <div class="col-lg-6">
        <div class="container justify-content-md-center">
           <h1 class="title"><i class="ion-document"></i> Business Documents</h1>
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
<div class="container-fluid  bg-white m-50 p-15 " >
<div class="row justify-content-md-center">
    <div class="col-lg-6">
      <div class="container justify-content-md-center" id="div_details">
       <!-- <a href="" class="pull pull-right">Edit</a> -->
        <h1 class="title"><i class="ion-iphone"></i> Contact Details</h1>
             <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="200">Phone No.</td><td id="txtPhone"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Telophone No.</td><td id="txtTelephone"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Website</td><td id="txtWebsite"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Facebook</td><td id="txtFacebook"></td>
                  </tr>
                </tbody>
            </table><br/>
      </div>
    </div>
   <div class="col-lg-6">
      <div class="container justify-content-md-center" id="contact-detail">
       <!-- <a type="button" id="edit-contact-detail" class="pull pull-right">Edit</a> -->
      <h1 class="title"><i class="ion-clipboard"></i> Business Details</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="200">Date Established</td><td id="txtDate"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Net Profit</td><td id="txtProfit"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Net Worth</td><td id="txtWorth"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Gross Income</td><td id="txtGross"></td>
                  </tr>
                </tbody>
            </table><br/>
        </div>
      <div class="container justify-content-md-center ">
       <!-- <a type="button" class="pull pull-right">Edit</a> -->
           <h1 class="title">Category</h1>
              <div class="row">
                  <div class="col-sm-4 m-t-10 ">
                     <div class="interest-card border-gray tras-anim">
                           <h1 id="txtCategory"></h1>
                     </div>
                  </div>
              </div>
      </div>
  </div>
</div>
</div>

<div class="container-fluid  bg-white m-50 p-15 " id="div_gallery">
<h1 class="title"><i class="ion-images"></i> Gallery</h1>
  <div class="mcs-horizontal-example" id="galleryPhotos">
       
  </div>

</div>
<div class="container-fluid  bg-white m-50 p-15 " id="div_maploc">
<h1 class="title"><i class="ion-location"></i> Map Location</h1>
 <div id="haha" >
     <div id="geomap">
      </div>
  </div>
 </div>
</div>
<div class="modal fade" id="sendMessageModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4>Send Message</h4>
            </div>
            <div class="modal-body">
              <textarea class="form-control counted" name="message" placeholder="Send Message" style="height: 150px;"></textarea>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade" id="rate_mod" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>

              <h4>Rate kung nindot unsa ka nindot or ka completo akong portfolio</h4>
            </div>
            <div class="modal-body p-15">
              <div class="container ">
                <div class="row rate-div no-border center-div-within-div">
                  <div class="center-div-within-div">
                    <i href="javascript:;" onclick="rateme(this)" data-index="1" class="ion-star star ion-size-35 m-3 hand-point"></i>
                    <i href="javascript:;" onclick="rateme(this)" data-index="2" class="ion-star star ion-size-35 m-3 hand-point"></i>
                    <i href="javascript:;" onclick="rateme(this)" data-index="3" class="ion-star star ion-size-35 m-3 hand-point"></i>
                    <i href="javascript:;" onclick="rateme(this)" data-index="4" class="ion-star star ion-size-35 m-3 hand-point"></i>
                    <i href="javascript:;" onclick="rateme(this)" data-index="5" class="ion-star star ion-size-35 m-3 hand-point"></i>
                  </div>
                </div>
                <form id="rateForm" name="rateForm" method="post">
                  <input type="text" id="rate_" name="rate_">
                  <textarea class="form-control" id="message" name="message" style="width: 100%; height: 150px"></textarea>
                </form>
              </div>


            </div>
            <div class="modal-footer">
               
                 <!-- <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button>  -->
                  <button type="button" id="btn_saveRate"class="btn btn-default pull-right">Save </button>
            </div>
        </div>
      
    </div>
</div>
<div class="modal fade" id="youtube" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Pitch Video</h4>
            </div>
            <div class="modal-body">
              
            </div>
           <!--  <div class="modal-footer">
                 <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div> -->
        </div>
      
    </div>
</div>
<div  class="modal fade" id="dailyModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" id="reviewMod">
          <div class="container m-b-50">
            <div id="loadthis"></div>

           <?php $fields = array("Sales", "Cost of Sales","Begin Inventory", "Purchase Inventory", "Available", "End Inventory" ,"Total Cost of sales","Operating Expences", "Fuel and Oil", "Wages and Salary", "Utilities", "Rental", "Deprecesion", "Investments","Miscelleneos", "Office Supply", "Prof Expences", "Benefits", "Total OE","Net Income"); ?>

            <div class="row m-t-20">
              <div class="col-lg-12 bg-white">
                <div class='top_calendar_label m-t-20 m-b-10'>
                <div class="text-center" style="margin: 0px auto;"> 
                  <div class="dropdown">
                  <a  id="report_title" href="javascript:;" 
                  data-id="<?php echo '0'; ?>" data-file="<?php echo 'Sales'; ?>">Sales </a>
                    <div class="dropdown-content month"  style="height: 300px !important; overflow-y: auto;">
                      <ul>
                        <?php for ($i=0; $i < sizeof($fields); $i++): ?>
                          <?php 
                          if($i == 1 || $i == 7){
                            }else{
                              echo '<a href="javascript:;" data-file="'.$fields[$i].'" onclick="select_report(this)" data-id="'.$i.'" >
                                  <li class="desc-nav" class"report_value"> '.$fields[$i].'</li>
                                </a>';
                            }
                            ?>
                        <?php endfor ?>
                    </ul>
                  </div>
                  </div>
                  <div class="dropdown">
                  <a id="txtYear" href="javascript:;" > of Year <?php echo date("Y")?></a>
                    <div class="dropdown-content month"  style="height: 200px !important; overflow-y: auto;">
                      <ul>
                        <a id="year2_" data-id="<?php echo date("Y")?>" href="javascript:;"></a>
                        <?php
                         $options = '';
                            $yearNow = date("Y");
                            for($i = $yearNow; $i >= $yearNow - 5; $i--){
                                $options .= '<a id="year_" onclick="select_year(this)" data-id="'.$i.'" href="javascript:;">';
                                $options .= '<li class="desc-nav">';
                                $options .= $i;
                                $options .= '</li>';
                                $options .= '</a>';
                            }
                            echo $options;
                         ?>
                    </ul>
                  </div>
                  </div>
                </div> 

                </div>

              </div>
              
            </div> 
            <div class="container bg-white">
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
              </div>
          </div>
        <!--   <div class="modal-footer">
            <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
          </div> -->
        </div>
    </div>
</div>
<div  class="modal fade" id="subcribeModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="header_">
             <button style="right: 20px; top: 10px; position: absolute;" type="button" class="close" data-dismiss="modal">&times;</button>
            <h1 class="title">Pay $5 to View Business Progress Reports</h1>
          </div>
          <div class="modal-body">
              <div id="loadthissmall"></div>
              <div class="row " style="align-items: center; display:flex; justify-content:center; margin:10px 0 10px ;">
              <!--   <form name="paypalForm" action="paypal" method="post">
                  <input type="hidden" name="userid" value="<?php $_SESSION['userid']?>">
                  <input type="hidden" name="payment" value="5">  
                    <input type="" name="cc" value="USD" />
                    <input type="" name="key" value="<?php //echo md5(date("Y-m-d:").rand()); ?>">
                           
                                    
                  
                </form> -->
                <form name="paypalForm" action="paypal-subscribe" method="post">
                  <input type="" name="id" value="<?php echo $_SESSION['userid']?>" hidden>
                  <input type="" name="id2" value="<?php echo $_GET['id']?>" hidden>
                  <input type="hidden" name="Description" value="<?php echo $_GET['id']?>" hidden>
                  <input type="hidden" name="payment" value="5" hidden>  
                    <input type="" hidden name="cc" value="USD" />
                    <input type="" hidden name="key" value="<?php echo md5(date("Y-m-d:").rand()); ?>">
                           
                                    
                  <button class="btn btn-default" type="submit"> $5 Subscribe</button>
                </form>
                
              </div>
          </div>
         <!--  <div class="modal-footer">
            <button type="button" id="pauseClose" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
          </div> -->
        </div>
    </div>
</div>
<script>
    $(window).scroll(function () {
  if ($(".navbar").offset()) {
      if ($(".navbar").offset().top > 300) {
        $(' .prof.profile-nav').addClass('animated slideInUp')
        $('.prof.profile-nav').removeAttr("hidden ");
      } else {
        $('.prof.profile-nav').removeClass('animated slideInUp')
         $('.prof.profile-nav').addClass('animated fadeOutDown')
        // $(".profile-nav").attr("hidden","true");
      }
  }
});
</script>
<script type="text/javascript" src="script/business-progress1.js"></script>
<script src="js/canvasjs2.min.js"></script>
<script src="script/msme-portfolio7.js">
</script>
<script src="script/rateandreview.js">
</script>
<script type="text/javascript" src="script/bookmark3.js"></script>
<script type="text/javascript" src="script/like7.js"></script>

<!-- <script type="text/javascript" src="script/locatormap7.js"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDat9uejdYzYvKcJTD0kUfAjeYheQP-pOU"></script>
<script>

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

<?php
    include 'includes/footer.php';
?>