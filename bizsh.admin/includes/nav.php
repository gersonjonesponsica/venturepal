<?php
    $pg = explode('/', $_SERVER['REQUEST_URI']);
    $pg = end($pg);
?>

    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: #2ADCAD"></span>
            </button>
            <a class="navbar-brand logo" href="index">
                <strong><img class="img-responsive" id="nav-logo" src="img/official2.png" width="170" height="40"></strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item ">
                        <a class="nav-link nav-item1" href="investor">Join ventures<span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item ">
                        <a class="nav-link nav-item1" href="index">Start venture<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="about">About Us</a>
                    </li>
                  
                    <li class="nav-item dropdown ">
                        <a class=" nav-link nav-item1" href="business" >Help</a>
                            <div class="dropdown-content">

                            <div class="desc"> <a href="logout">Invest</a></div>
                            <div class="desc"> <a href="">Capital </a></div>
                            <div class="desc"> <a href="">Testimonial</a></div>
                            <div class="desc"> <a href="">How it works</a></div>
                            <div class="desc"> <a href="">Blog</a></div>
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-item1" href="help" >How it works</a>
                    </li>   
                    <li class="nav-item dropdown sliderDropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Instant Match
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <h3>Notifications (1) Unread</h3>
                            <div id="noti-item" style="height:300px !important; width: 500px !important">
                              <ul>
                                <li>
                                    <a href="verify-business">
                                    <div class="container m-r-100">
                                       <div class="row">
                                           <div class="col-lg-2">
                                               <img src="img/ProfilePics/vendetta.png" class="border-r-50" height="70" width="70"> 
                                           </div>
                                           <div class="col-lg-10">
                                            <div class="container">
                                                <div class="row">
                                                <div class="col-lg-8">
                                                     <div class="item-title">
                                                     Gerson Jones Ponsica
                                                    </div>
                                                    <div>New Investment Application.</div>
                                                </div>
                                                <div class="col-lg-4" style="left:0">
                                                    <div class="time">1 hour ago</div>
                                                </div>
                                                </div>
                                            </div>
                                              
                                           </div>
                                       </div>
                                    </div>
                                    </li>
                              </ul>
                            </div>
                          
                        </div>
                      </li>  
                               
                </ul>
                    <ul class="navbar-nav mr-auto" style="border-left: 1px solid #666; border-right: 1px solid #666;">
                      <li class="nav-item ">
                          <li class="nav-item ">
                          <a href="javascript:;"><i style=" padding: 1px;" class="ion-search ion-size-30"></i></a>
                          </li> 
                         <li class="nav-item" style="padding: 0px ; margin: 0px">
                          <input type="search" class="searchnav" id="search"  placeholder="keyword" />
                        </li>
                      </li> 
                    </ul>
                    <ul class="navbar-nav navbar-right">
                   
                   <li class="nav-item " id="noti_Container">
                    <a id="noti_Button" class="badge1" data-badge="2" href="javascript:;"><i style=" padding: 1px; top: 10px" class="ion-chatbox-working ion-size-25"></i></a>
                    </li> 
                    <div id="notifications">
                        <h3>Notifications (1) Unread</h3>
                        <div id="noti-item" style="height:300px;">
                            <div class="notification-item">
                                <ul>
                                <?php for($i = 1; $i < 2; $i++):?>
                                <!--     <li>
                                    <a href="verify-business">
                                    <div class="container">
                                       <div class="row">
                                           <div class="col-lg-2">
                                               <img src="img/ProfilePics/vendetta.png" class="border-r-50" height="70" width="70"> 
                                           </div>
                                           <div class="col-lg-10">
                                            <div class="container">
                                                <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="item-title">
                                                    DTI
                                                    </div>
                                                    <div>Team sari sari store is Verified.Create Portfolio Now</div>
                                                </div>
                                                <div class="col-lg-4" style="left:0">
                                                    <div class="time">1 hour ago</div>
                                                </div>
                                                </div>
                                            </div>
                                              
                                           </div>
                                       </div>
                                    </div>
                                    </li> -->
                                    <li>
                                    <a href="verify-business">
                                    <div class="container">
                                       <div class="row">
                                           <div class="col-lg-2">
                                               <img src="img/ProfilePics/vendetta.png" class="border-r-50" height="70" width="70"> 
                                           </div>
                                           <div class="col-lg-10">
                                            <div class="container">
                                                <div class="row">
                                                <div class="col-lg-8">
                                                     <div class="item-title">
                                                     Gerson Jones Ponsica
                                                    </div>
                                                    <div>New Investment Application.</div>
                                                </div>
                                                <div class="col-lg-4" style="left:0">
                                                    <div class="time">1 hour ago</div>
                                                </div>
                                                </div>
                                            </div>
                                              
                                           </div>
                                       </div>
                                    </div>
                                    </li>
                                    </a>
                                    <li class="divider"></li>
                                     <?php endfor;?>
                                </ul>

                            </div>
                        </div>
                        <div class="seeAll"><a href="#">See All</a></div>
                    </div>
                </li>
                        <li class=" dropdown img-circle">
                        <?php
                            if(isset($_SESSION['islogin'])){
                                $src = 'img/unknow.jpg';
                             }
                            
                        ?>

                        <img src="img/ProfilePics/vendetta.png" alt="Trolltunga Norway" width="100" height="50" class="img-circle">
                          <div class="dropdown-content">

                            <a href=""><img id="img-circle-2" src="img/ProfilePics/vendetta.png" alt="Trolltunga Norway" width="200" height="150" title="Edit Profile"></a>
                            <div class="desc center-text">Gerson Jones Ponsica</div>

                            <div class="desc"> <a href="logout">Logout</a></div>
                            <div class="desc"> <a href="">Notifications</a></div>
                            <div class="desc"> <a href="">Accounts</a></div>
                          </div>
                            
                    </li>
                    
                </ul>
        </div>
    </nav>
    

<!--       -->