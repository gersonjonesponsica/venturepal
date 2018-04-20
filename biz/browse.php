<?php
    include 'includes/header-user.php';
    include 'common/config.php';
    include 'model/CategoryDB.php';
    include 'includes/head.php';
   


    $category_db = new CategoryDB();
    $category = $category_db->getAllCategory();

?>
<link rel="stylesheet" type="text/css" href="css/footer-carda.css">

<!-- <h1 class="line-with-text">Featured</h1> -->
<div class="container-fluid p-b-40 bg-color-F7FAFA  m-t-100">
  <div class="row ">
    <div class="col-lg-9" id="scrollablehere" style="overflow-x: hidden; overflow-y: hidden; height: 350px">
    <!--  -->
      <?php
      $i = 0;
        foreach ($category as $c):
          $i++;
          ?>
         <div class="row" id="<?php echo 'row'.$i ?>">
          <div class="col-lg-5">
              <div class="container">
               <h1 class="title"><?php echo $c['cat_name'] ?></h1>
                  <div class="portfolio-item graphic-design ">
                  <div class="he-wrap tpl6 member1 ">
                    <img class=" h-300 m-fit" id="member1" src="img/Sari-Sari_Store_Cavite.jpg" class="img-responsive" alt="">              
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                          <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                          <a data-toggle="tooltip" data-placement="top" title="Hit this if you like this Business" data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-heart ion"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="Save Bookmark" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-star ion"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="More about this" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-eye ion"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                  </div><!-- he wrap -->
                </div><!-- end col-12 -->
              </div>
            </div>
            <div class="col-lg-6">
             <div class="container-fluid" style="top: 0px !important;">
              <div class="row">
                <div class="row-lg-3 m-t-40">
                  <strong>Ang maliit na tindahan ni aling nina</strong> 
                  <div class="m-t-10">
                    <img class="img-circle" src="img/ProfilePics/vendetta.png">
                    <a href="search"><small>by  Gerson Jones Ponsica</small></a>
                  </div>
                  <div class="m-t-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices bibendum mollis. Sed aliquet, enim at vulputate porttitor, felis nunc vehicula ante, blandit lobortis mi massa non leo. </div> 
                  <div class="m-t-10">
                    <a href=""><small><i class="ion-location ion-size-15"></i> Dulfo Fatima Cebu City</small></a>
                  </div>

                  <div class="progress m-t-10">
                    <div class="progress-bar" role="progressbar" aria-valuenow="40"
                    aria-valuemin="0" aria-valuemax="100" style="width:25%; background-color: #21b08a">
                      25% Raised
                    </div>
                  </div>

                </div>
              </div>
              </div>
                <table class="table" >
                  <tbody>
                    <tr >
                      <td class="p-5"><i class=" ion-size-15 m-r-5"><small><strong>P69, 696</strong> Raised</small></td>
                      <td class="p-5"><i class="ion-calendar ion-size-15 m-r-5"></i><small><strong>30</strong> days to go</small></td>
                    </tr>
                    <tr>
                      <td class="p-5"><i class="ion-size-15 m-r-5"><small class="m-t-10"><strong>P69, 696</strong> Remaining</small></td>
                      <td class="p-5"><i class="ion-person-add ion-size-15 m-r-5"></i><small class="m-t-10"><strong>5</strong> Venturer Remaining</small></td>
                    </tr>
                    <tr>
                      <td class="p-5"><i class="ion-minus-circled ion-size-15 m-r-5"><small class="m-t-10">Min: <strong>P69, 696</strong></small></td>
                      <td class="p-5"><i class="ion-plus-circled ion-size-15 m-r-5"><small class="m-t-10"> <strong>P69, 696</strong></small></td>
                    </tr>
                  </tbody>
                </table>  
            </div>

          </div>         
        <?php endforeach; ?>
    </div>
      <div class="col-lg-3">
        <div class="container-fluid m-t-30"  style="top: 0px !important;">
             <ul class="categories ">
                <?php 
                  $i = 0;
                  foreach ($category as $c): 
                     $i++;
                ?>
                 <li>
                  <small><a  class="font-black" href='javascript:;' onclick="scrollen(this)" id="<?php echo $i; ?>" > <?php echo $c['cat_name']; ?></a></small>
                 </li> 
                
              <?php endforeach;?>
            </ul>
        </div>
      </div>
</div>
</div>
<h1 class="line-with-text">Partly Funded</h1>
<div class="container-fluid card-container m-r-50 m-l-50">
<div class="row">
  <?php for($i = 1 ; $i < 4; $i++):?>
   <div class="col-sm-4">
        <div class="card hovercard h-680">
        <div class="title-launch">
                 25% to Luaunch
              </div>
          <div class="portfolio-item graphic-design ">
          <div class="he-wrap tpl6 member1 ">
            <img class="center-bg h-250 m-fit" id="member1" src="img/Sari-Sari_Store_Cavite.jpg" class="img-responsive" alt="">              
            <div class="he-view">
                <div class="bg a0" data-animate="fadeIn">
                  <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                  <a data-toggle="tooltip" data-placement="top" title="Hit this if you like this Business" data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-heart ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="Save Bookmark" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-star ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="More about this" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-eye ion"></i></a>
                </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->
           <div class="info" >
              <div class="title">
                 Team Rocket Sari sari store
              </div>
              <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices bibendum mollis. Sed aliquet, enim at vulputate porttitor, felis nunc vehicula ante, blandit lobortis mi massa non leo. </div>
           </div>
          <div class="progress m-l-20 m-r-20">
            <div class="progress-bar" role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100" style="width:25%; background-color: #21b08a">
              25% Complete
            </div>
          </div>
          <div class="container m-t-10">
            <div class="row">
              <div class="row-md-4">
                <div class="m-l-20"><img class="img-circle" src="img/ProfilePics/vendetta.png"></div>
              </div>
              <div class="row-md-8">
                <div class="pull pull-left m-t-10"><small><a href="">&nbsp;&nbsp;by: Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>
          <table class="table" >
            <tbody>
              <tr >
                <td class="p-5"><small><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small><strong>30</strong> days to go</small></td>
              </tr>
              <tr>
                <td class="p-5"><small class="m-t-10"><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small class="m-t-10"><strong>5</strong> Venturer Remaining</small></td>
              </tr>
            </tbody>
          </table>
           <div class="container no-margin">
            <div class="row">
            <a class="minmax-entrep"> P10,000 - P50,000</a>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>
  <?php endfor ?>
</div>
</div>

<h1 class="line-with-text">Bookmarked</h1>
<div class="container-fluid card-container m-r-50 m-l-50">
<div class="row">
  <?php for($i = 1 ; $i < 4; $i++):?>
   <div class="col-sm-4">
        <div class="card hovercard h-680">
        <div class="title-launch">
                 25% to Luaunch
              </div>
          <div class="portfolio-item graphic-design ">
          <div class="he-wrap tpl6 member1 ">
            <img class="center-bg h-250 m-fit" id="member1" src="img/Sari-Sari_Store_Cavite.jpg" class="img-responsive" alt="">              
            <div class="he-view">
                <div class="bg a0" data-animate="fadeIn">
                  <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                  <a data-toggle="tooltip" data-placement="top" title="Hit this if you like this Business" data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-heart ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="Save Bookmark" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-star ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="More about this" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-eye ion"></i></a>
                </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->
           <div class="info" >
              <div class="title">
                 Team Rocket Sari sari store
              </div>
              <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices bibendum mollis. Sed aliquet, enim at vulputate porttitor, felis nunc vehicula ante, blandit lobortis mi massa non leo. </div>
           </div>
          <div class="progress m-l-20 m-r-20">
            <div class="progress-bar" role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100" style="width:25%; background-color: #21b08a">
              25% Complete
            </div>
          </div>
          <div class="container m-t-10">
            <div class="row">
              <div class="row-md-4">
                <div class="m-l-20"><img class="img-circle" src="img/ProfilePics/vendetta.png"></div>
              </div>
              <div class="row-md-8">
                <div class="pull pull-left m-t-10"><small><a href="">&nbsp;&nbsp;by: Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>
          <table class="table" >
            <tbody>
              <tr >
                <td class="p-5"><small><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small><strong>30</strong> days to go</small></td>
              </tr>
              <tr>
                <td class="p-5"><small class="m-t-10"><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small class="m-t-10"><strong>5</strong> Venturer Remaining</small></td>
              </tr>
            </tbody>
          </table>
           <div class="container no-margin">
            <div class="row">
            <a class="minmax-entrep"> P10,000 - P50,000</a>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>
  <?php endfor ?>
</div>
</div>



<h1 class="line-with-text">Interested</h1>
<div class="container-fluid card-container m-r-50 m-l-50">
<div class="row">
  <?php for($i = 1 ; $i < 4; $i++):?>
   <div class="col-sm-4">
        <div class="card hovercard h-680">
        <div class="title-launch">
                 25% to Luaunch
              </div>
          <div class="portfolio-item graphic-design ">
          <div class="he-wrap tpl6 member1 ">
            <img class="center-bg h-250 m-fit" id="member1" src="img/Sari-Sari_Store_Cavite.jpg" class="img-responsive" alt="">              
            <div class="he-view">
                <div class="bg a0" data-animate="fadeIn">
                  <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                  <a data-toggle="tooltip" data-placement="top" title="Hit this if you like this Business" data-rel="prettyPhoto" href="assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-heart ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="Save Bookmark" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-star ion"></i></a>
                  <a data-toggle="tooltip" data-placement="top" title="More about this" href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-eye ion"></i></a>
                </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->
           <div class="info" >
              <div class="title">
                 Team Rocket Sari sari store
              </div>
              <div class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices bibendum mollis. Sed aliquet, enim at vulputate porttitor, felis nunc vehicula ante, blandit lobortis mi massa non leo. </div>
           </div>
          <div class="progress m-l-20 m-r-20">
            <div class="progress-bar" role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100" style="width:25%; background-color: #21b08a">
              25% Complete
            </div>
          </div>
          <div class="container m-t-10">
            <div class="row">
              <div class="row-md-4">
                <div class="m-l-20"><img class="img-circle" src="img/ProfilePics/vendetta.png"></div>
              </div>
              <div class="row-md-8">
                <div class="pull pull-left m-t-10"><small><a href="">&nbsp;&nbsp;by: Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>
          <table class="table" >
            <tbody>
              <tr >
                <td class="p-5"><small><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small><strong>30</strong> days to go</small></td>
              </tr>
              <tr>
                <td class="p-5"><small class="m-t-10"><strong>P69, 696</strong> Raised</small></td>
                <td class="p-5"><small class="m-t-10"><strong>5</strong> Venturer Remaining</small></td>
              </tr>
            </tbody>
          </table>
           <div class="container no-margin">
            <div class="row">
            <a class="minmax-entrep"> P10,000 - P50,000</a>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>
  <?php endfor ?>
</div>
</div>
<h1 class="line-with-text">Discover More</h1>
<div class="container-fluid bg-color-F7FAFA p-15 ">
<div class="container">
<div class="row">
  <?php foreach($category as $c): ?>
    <div class="col-sm-4 m-t-10 ">
      <a href="javascript:void(0);" class="openPopup" cat_name='<?php echo $c['cat_name']?>' data-id='<?php echo $c['cat_id'];?>'>
       <div class="discover-card border-gray tras-anim">
             <h1><?php echo $c['cat_name']?></h1>
       </div>
       </a>
    </div>
  <?php endforeach; ?>
</div>
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="cat_title">adsfsdadsfasdfasdfasfdasdfafasdf</h4>
            </div>
            <div class="modal-body">
            <table id="subcategory_list" class="table table-condensed">
              <tbody>
              </tbody>
            </table>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
      
    </div>
</div>
<script type="text/javascript" src="script/sub-category.js"></script>
<script>
    function scrollen(element){
      var id = $(element).attr('id');

      var elem = document.getElementById('row'+id);
     
      var topPos = elem.offsetTop
      scrollTo(document.getElementById('scrollablehere'), topPos, 300);  
    }
     
    function scrollTo(element, to, duration) {
        var start = element.scrollTop,
            change = to - start,
            currentTime = 0,
            increment = 10;
            
        var animateScroll = function(){        
            currentTime += increment;
            var val = Math.easeInOutQuad(currentTime, start, change, duration);
            element.scrollTop = val;
            if(currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };
        animateScroll();
    }

  
    Math.easeInOutQuad = function (t, b, c, d) {
      t /= d/2;
      if (t < 1) return c/2*t*t + b;
      t--;
      return -c/2 * (t*(t-2) - 1) + b;
    };
  //t = current time
    //b = start value
    //c = change in value
    //d = duration
</script> 
<?php
    include 'includes/footer.php';
?>

