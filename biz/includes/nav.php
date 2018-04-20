<?php
    $pg = explode('/', $_SERVER['REQUEST_URI']);
    $pg = end($pg);
    // date_default_timezone_set('Asia/Manila');
?>  
  <input hidden  name="accountid" id="accountid" value="<?php echo $_SESSION['account_id']?>"> <!-- investor or investee -->
  <input hidden  name="userid" id="userid" value="<?php echo $_SESSION['userid']?>"> <!-- account id from account table -->
  <input hidden  name="usertype" id="usertype" value="<?php echo $_SESSION['user_type']?>">
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #21b08a"></span>
            </button>
            <a class="navbar-brand logo" href="index">
                <strong><img class="img-responsive" id="nav-logo" src="img/official2.png" width="160" height="40"></strong>
            </a>

            <div class="collapse navbar-collapse" id="navbarNav1">
            <?php if($_SESSION['user_type'] == 1 ): ?>
              <!-- <?php //if($pg != 'investor-profile' ): ?> -->
              <ul class="navbar-nav mr-auto" >
                 <!--     <li class="nav-item ">
                        <a class="nav-link nav-item1" href="investor">For Investors<span class="sr-only">(current)</span></a>
                    </li> -->
                  <!--    <li class="nav-item ">
                        <a class="nav-link nav-item1" href="search-msme">Search Investment<span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="about">About us</a>
                    </li>
                  
                    <li class="nav-item dropdown ">
                        <a class="nav-link nav-item1" >Help</a>
                          <div class="dropdown-content">
                            <ul>
                           <a href="help">
                            <li class="desc-nav">Help Center</li>
                            </a>
                            <a href="how-it-works">
                            <li class="desc-nav">How it works</li>
                            </a>
                            <a href="contact-us">
                            <li class="desc-nav">Contact-us</li>
                            </a>
                            <a href="logout">
                            <li class="desc-nav">Blog</li>
                            </a>
                            <a href="logout">
                            <li class="desc-nav">FAQs</li>
                            </a>
           <!--                  <a href="help-center">
                            <li class="desc-nav">Help Center</li>
                            </a> -->
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="how-it-works" >How it works</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="testimonial" >Testimonials</a>
                    </li>        
                </ul>

            <!-- <?php //endif; ?> -->
            <?php if($pg == 'investor-profile' ): ?>
              <ul class="navbar-nav mr-auto" >
              </ul>
              <?php endif; ?>
            <?php endif; ?>

            <?php if($_SESSION['user_type'] == 2 ): ?>
              <ul class="navbar-nav mr-auto" >
                    <li class="nav-item ">
                        <a class="nav-link nav-item1" href="entrepreneurs">For Entrepreneurs<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="about">About us</a>
                    </li>
                  
                    <li class="nav-item dropdown ">
                        <a class="nav-link nav-item1" href="help" >Help</a>
                          <div class="dropdown-content">
                            <ul>
                            <a href="help">
                            <li class="desc-nav">Help Center</li>
                            </a>
                            <a href="how-it-works">
                            <li class="desc-nav">How it works</li>
                            </a>
                            <a href="contact-us">
                            <li class="desc-nav">Contact-us</li>
                            </a>
                            <a href="#">
                            <li class="desc-nav">Blog</li>
                            </a>
                            <a href="#">
                            <li class="desc-nav">FAQs</li>
                            </a>
                            
                          </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="how-it-works" >How it works</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="testimonial" >Testimonials</a>
                    </li>      
                </ul>
            <?php endif; ?>
                    <ul class="navbar-nav navbar-right">
                      <?php if($_SESSION['user_type'] == 1 && $pg != 'dashboard'): ?>
                      <li class="nav-item ">
                        <a class="nav-link nav-item1 btn-signup" href="dashboard"><i class="fa fa-dashboard"></i> Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                        <?php endif; ?>
                  <!--  <li class="nav-item" id="noti_Container">
                      <a id="noti_Button" href="javascript:;"><i style=" padding: 1px; top: 10px; font-size: 20px !important;" class="fa fa-bell ion p-t-10 "></i></a>
                    </li>  -->
                    <div id="notifications">
                        <h3 id="totalUnread"> (<span id="unread"></span> / <span id="total"></span>) Unread Notifications</h3>
                        <div id="noti-item" class="noti-item">
                          <div id="loader-div" hidden>
                            <li class="center-text" id="loading"><i class="ion-load-c"></i> </li>
                          </div>
                          <div class="notification-item container" id="notifi">
                          </div>
                        </div>
                        <div class="seeAll"><a href="#">See All</a></div>
                    </div>
                <!-- </li> -->
                        <li class=" dropdown img-circle">
                        <img src="img/unknown.jpg" id="p_profile_c" alt="Trolltunga Norway" width="100" height="50" class="img-circle">
                            <div class="dropdown-content">

                              <ul>
                              <a href=""><img id="pp_profile_ha" src="img/unknown.jpg" alt="" width="100%" height="150" title="Edit Profile"></a>
                            <div class="desc center-text"><?php echo $_SESSION['useremail'] ?></div>
                              <a href="<?php echo ($_SESSION['user_type'] == 1 ? "investor-profile" : "entrepreneur-profile" )?>">
                              <li class="desc-nav"><i class="ion-person"></i> My Profile</li>
                              </a>
                               <?php if($_SESSION['user_type'] == 2 ): ?>
                              <a href="my-msme">
                                <li class="desc-nav"><i class="ion-home"></i> My Msme</li>
                              </a>
                                <?php endif; ?>
    
                              <a href="logout">
                              <li class="desc-nav"><i class="ion-gear-b"></i> Logout</li>
                              </a>
                            </ul>
                          </div>
                          
                            
                    </li>
                    
                </ul>
        </div>

    </nav>

    
<!--       -->