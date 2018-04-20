<?php
    include 'includes/header-user.php';
    include 'common/config.php';
    include 'model/CategoryDB.php';
    include 'includes/head.php';
    
    $category_db = new CategoryDB();
    $category = $category_db->getAllCategory();
?>
<link rel="stylesheet" href="css/containerj.css">
    <div class="investor-view">
        <div class="half-bg-img flex-center">
            <ul class="animated fadeInUp">
                <li class="bg-black-light p-20 b-r-10 m-t-50"><h1 class="h1-responsive">Investors</h1>
                <p class="font-white">Helping MSME businesses and earn</p></li>
            </ul>
        </div>
    </div>
  <section id="services" class="sec-services">
    <div class="container-fluid m-r-50 m-l-50">
      <div class="row">
        <div class="col-sm-4">
          <img src="img/icons/investor-browse.png " class="img-responsive"  width="170" height="170">
          <h2 class="h3">Financial Status</h2>
          <p>Keep account of the current financial status of your invested business.</p>
        </div>
        <div class="col-sm-4">
          <img src="img/icons/investor-invest.png " class="img-responsive" width="170" height="170">
          <h2 class="h3">Invest</h2>
          <p>Choose your preferred MSME and be one of the investors.</p>
        </div>
        <div class="col-sm-4">
          <img src="img/icons/investor-earn.png " class="img-responsive"  width="170" height="170">
          <h2 class="h3">Earn</h2>
          <p>Earn while saving and helping Philippine MSME grow.</p>
        </div>
      </div>
      <div class="row m-t-100">
        <div class="getstarted p-20"><a class="btn_getstarted" id="btn-noti-success" href="register-investor">Get Started</a></div>

      </div>
      </div>
    </div>
  </section>
<h1 class="line-with-text">129,176 investment opportunities this year.</h1>
<div class="container-fluid card-container m-r-50 m-l-50">
<div class="row">
   <div class="col-sm-4">
        <div class="card hovercard h-650">
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
                <div class="pull pull-left m-t-10">by: <small><a href="">Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>
          <div class="container m-l-20">
            <div class="row">
              <div class="col">
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Raised</small>
                </div>
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Remaining</small>
                </div>
                <div class="row">

                    <small class="m-t-10"><strong>30</strong> days to go</small>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong class="">Minimum Invesment</strong> P10,000</small>
                  </div>
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong>Maximum Invesment</strong> P40,000</small>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col">
                    <small class="pull-left"><strong>5 </strong> Venturer Remaining</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>
   <div class="col-sm-4">
        <div class="card hovercard h-650">
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
                <div class="pull pull-left m-t-10">by: <small><a href="">Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>
          <div class="container m-l-20">
            <div class="row">
              <div class="col">
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Raised</small>
                </div>
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Remaining</small>
                </div>
                <div class="row">

                    <small class="m-t-10"><strong>30</strong> days to go</small>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong class="">Minimum Invesment</strong> P10,000</small>
                  </div>
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong>Maximum Invesment</strong> P40,000</small>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col">
                    <small class="pull-left"><strong>5 </strong> Venturer Remaining</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>

   <div class="col-sm-4">
        <div class="card hovercard h-650">
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
              <div class="row-4">
                <div class="m-l-20"><img class="img-circle" src="img/ProfilePics/vendetta.png"></div>
              </div>
              <div class="row-8">
                <div class="pull pull-left m-t-10">by: <small><a href="">Gerson Jones Ponsica</a></small> </div>
              </div>
            </div>
          </div>         
         <div class="container m-l-20">
            <div class="row">
              <div class="col">
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Raised</small>
                </div>
                <div class="row">
                    <small class="m-t-10"><strong>P69, 696</strong> Remaining</small>
                </div>
                <div class="row">
                    <small class="m-t-10"><strong>30</strong> days to go</small>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong class="">Minimum Invesment</strong> P10,000</small>
                  </div>
                  <div class="col-lg-5">
                    <small class="m-t-10"><strong>Maximum Invesment</strong> P40,000</small>
                  </div>
                </div>
                <div class="row m-t-10">
                  <div class="col">
                    <small class="pull-left"><strong>5 </strong> Venturer Remaining</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-card">

           </div>
        </div>
    </div>

</div>



 <div class="row">
        <div class="m-auto m-t-50 "><h6><a class="font-default-dark text-underline" href="" >View more Business</a></h6></div>
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


<div class="container-fluid p-15 register-container">
  <div class="row">
      <div class="container login-content" style="z-index: 10">
      <h1 id="confirm"></h1>
      <p class="text-center"><img class="img-responsive" id="nav-logo" src="img/official2.png" width="240" height="60"></p>

    <form class="register-form" id="registerForm" method="post">
      <div class="via-email">
        <span> Investor registration</span>
      </div>
      <div class="email">
        <input type="text" hidden class="inputText" name="type"  value="1" />
      </div>
      <div class="email">
        <input type="text" class="inputText" id="username" name="username" placeholder="Username" />
      </div>
      <div class="email">
        <input type="email" class="inputText" id="email" name="email" placeholder="Email" />
      </div>
      <div class="email">
        <input type="password"  class="inputText" id="rpassword" name="rpassword" placeholder="Password" />
      </div>

      <div class="password">
        <input type="password"  class="inputText" id="repassword" name="repassword" placeholder="Repeat your password" />
      </div>

        <input type="submit" class="register-buttton btnR btn_common" id="btnLogin" value="Sign up" name="btnLogin">
        <p>By signing up, you certify that you are of Philippines legal age (18 years old and above) and agree to our <a href="" data-toggle="modal" data-target="#termsModal">terms & conditions.</a></p>
        <span>
          <div class="via-email">
            <span>Already have an account? <a href="login">Log in</a></span>
          </div>
        </span>
         
      </form>
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
<?php
    include 'includes/footer.php';
?>