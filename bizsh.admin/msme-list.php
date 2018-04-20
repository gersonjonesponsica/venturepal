<?php
    include 'common/config.php';
    include 'model/MSMEDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    include 'model/MessageDB.php';
    
    $msme_db = new MSMEDB();
    $message_db = new MessageDB();
    $msme = $msme_db->getAllMSME();
?>
<style >
.logo-box img{width:100px; height:100px; position:absolute; border:5px solid #fff; top: -70px; bottom: 0}
.logo-box2 img{width:100px; height:100px; position:absolute; border:5px solid #fff; top: -290px; bottom: 0}
.logo-box3 img{width:100px; height:100px; position:absolute; border:5px solid #fff; top: 20px; bottom: 0}
.logo-box4 img{width:100px; height:100px; position:absolute; border:5px solid #fff; top: -170px; bottom: 0}
    
</style>
 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of MSMED's</h3>
        <div id="msmeList_handler">
            <table id="msmeList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Business Name</th>
                    <th>Owner Name</th>
                    <th>Start Duration</th>
                    <th>Duration Left</th>
                    <th>Percent Raised</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
               <tbody>
                <!-- <tr><td><a id='send' href='javascript:sendSmsAndEmailNotification(9)'>Send</a></td></tr> -->
                <?php foreach ($msme as $e) {
                    echo "<tr> ";
                    // $fullname = $e['e_lname'] .', '. $e['e_fname'] .($e['e_fname'] == '' ? "" : ' '.$e['e_fname'].'.');
                    echo "<td><img width='40' height='30' src='Entrep/".$e['msme_logo']."' class='m-r-10'>".$e['msme_name']."</td>";
                    echo "<td><img width='40' height='30' src='Entrep/".$e['e_photo']."' class='m-r-10'>".$e['entrepname']."</td>";
                    // echo "<td>".$e['approve_date']."</td>";
                     echo "<td>" .$message_db->time_ago($e['approve_date']). ', '.date('F j, Y',strtotime($e['approve_date']))."</td>";
                    echo "<td>".$e['rem']. " Days Left</td>";
                    echo "<td>".$e['percent_raised']."%</td>"; 
                    if($e['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                    echo "<td class ='text-error'>Not Active</td>"; 

                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$e['msme_id']."' onclick='more(this)'>More |</a>".
                        "<a href='javascript:;' id='".$e['msme_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($e['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$e['msme_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$e['msme_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";

                }?>

                </tbody> 
            </table><br/>
        </div>
        <a href="add-entrep" class="btn btn-default">Add MSME</a>
    </div>
</div>

<div  class="modal fade" id="msmeModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" id="moreMod">
            <div class="container-fluid m-b-30">
              <div class="row ">
                <div class="col-lg-12" id="scrollablehere" style="height: 350px;">

                     <div class="row" id=""  style="">
                      <div class="col-lg-4">
                          <div class="container">
                           <h1 class="title">asdasdfasdf</h1>
                           
                              <div class="portfolio-item graphic-design ">

                              <div class="he-wrap tpl6 member1 p-45" id="photo">
                                             
                              </div><!-- he wrap -->
                                 <img id="badge" height="130" width="80" style="position: absolute; top: 50px;">
                              <div>
                                
                                <div class="row rate-div center-div-within-div" >
                                   <div class="center-div-within-div" id="rate-div">
                                  </div> 
                                </div>
                                <h6 class="text-center m-r-70" id="rateStar">5.0  / 5.0</h6>
                              </div>
                              <div>
                                
                              </div>

                            </div><!-- end col-12 -->
                          </div>
                        </div>
                        <div class="col-lg-5">
                         <div class="container-fluid" style="top: 0px !important;">
                          <div class="row">
                            <div class="row-lg-3 m-t-40">
                              <strong id="txtName"></strong> 
                              <div class="m-t-10" id="nameAndImage">
                              <!--   <img class="img-circle" src="img/ProfilePics/vendetta.png">
                                <a href="search"><small>by  Gerson Jones Ponsica</small></a> -->
                              </div>
                              <div class="m-t-10" id="msme_desc">
                              </div> 
                              <div class="m-t-10">
                                <a href=""><small id="txtLocation"></small></a>
                              </div>
                              <div class="progress m-t-10" id="txtRaisePercent">
                                
                              </div>

                            </div>
                          </div>
                          </div>
                            <table class="table">
                              <tbody>
                                <tr >
                                  <td ><i class=" ion-size-15 m-r-5"><small><strong id="txtTotalRaise"></strong> Raised</small></td>
                                  <td ><i class="ion-calendar ion-size-15 m-r-5"></i><small><strong id="txtRemainingDay"></strong> days to go</small></td>
                                </tr>
                                <tr>
                                  <td ><i class="ion-size-15 m-r-5"><small class="m-t-10"><strong id="txtRemainingCapitalNeeded"></strong> Remaining</small></td>
                                  <td ><i class="ion-person-add ion-size-15 m-r-5"></i><small class="m-t-10"><strong id="txtRemainingVenture"></strong> Venturer Remaining</small></td>
                                </tr>
                                <tr>
                                  <td><i class="ion-minus-circled ion-size-15 m-r-5"><small class="m-t-10">Min: <strong id="txtMin"></strong></small></td>
                                  <td><i class="ion-plus-circled ion-size-15 m-r-5"><small class="m-t-10">Max: <strong id="txtMax"></strong></small></td>
                                </tr>
                              </tbody>
                            </table>  
                        </div>
                        <div class="col-lg-3">
                          <div class="row">
                            <iframe width="90%" height="50%" id="video" allowfullscreen="true" allowscriptaccess="always">
                          </iframe>
                          </div>
                          <div class="row ion">
                            <h1 class="title" id="txtLike"></h1>
                          </div>
  <!--                         <div class="row profile-link" id="likebookmark">

                
                              <a data-toggle="tooltip" onclick="like(this)" data-rel="prettyPhoto" href="javascript:;" class="dmbutton2 a2 m-r-20 animate_wobble_heart like_ _wobble_heart" data-animate="fadeInUp"><i class="ion-heart ion-size-25"></i>
                              </a>
                           
                              <a data-toggle="tooltip" href="javascript:;"  onclick="bookmark(this)" class="dmbutton2 a2 animate_wobble bookmark_ _wobble_star" data-animate="fadeInUp">
                                <i class="ani ion-star ion-size-25 "></i>
                              </a>
                          </div> -->
                        <!-- </div> -->
                        </div>
                      </div>         
                </div>

            </div>
            </div>
            <div class="container-fluid" >
                <div class="container-fluid  bg-white  p-15 ">
                  <h1 class="title">MSME's Investors</h1>
                    <div class="container-fluid">       
                      <div class="row" id="venturers">
                      </div>
                    </div>  
                </div>
                <div class="container-fluid  bg-white m-t-10" >
                <div class="row justify-content-md-center">
                    <div class="col-lg-6 " >
                         <div class="container justify-content-md-center  m-b-10" id="div_docu"><!-- 
                       <a type="button" class="pull pull-right">Edit</a> -->
                           <h1 class="title">Certification & Permit</h1>
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
                        <div class="container justify-content-md-center m-b-10">
                           <h1 class="title">Business Documents</h1>
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
                <div class="container-fluid  bg-white m-t-10" >
                <div class="row justify-content-md-center">
                    <div class="col-lg-6">
                      <div class="container justify-content-md-center" id="div_details">
                       <!-- <a href="" class="pull pull-right">Edit</a> -->
                        <h1 class="title">Contact Details</h1>
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
                      <h1 class="title">Business Details</h1>
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
                      <div class="container justify-content-md-center m-b-10">
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

                    <div class="container-fluid  bg-white m-t-10" id="div_gallery" >
                        <h1 class="title">Gallery</h1>
                          <div class="mcs-horizontal-example" id="galleryPhotos">
                               
                          </div>

                    </div>
                </div>
          
        </div>
    </div>
</div>


<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/msme-lista1.js"></script> 
<script src="script/checksuccessmsme.js"></script> 
<script src="script/notification.js"></script> 
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
    var container2 = $('#galleryPhotos');
    // (function($){
    //     $(window).on("load",function(){
    //         $(".mcs-horizontal-example").mCustomScrollbar();
    //     });
    // })(jQuery);
    $('#galleryPhotos').mCustomScrollbar({ 
            theme:"dark-3"        
    });

</script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDat9uejdYzYvKcJTD0kUfAjeYheQP-pOU"></script> -->

 <?php
  include 'includes/footer.php';
 ?>