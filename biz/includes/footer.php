<?php 
    $pg = explode('/', $_SERVER['REQUEST_URI']);
    $pg = end($pg);
    // echo preg_match('/message-us/',$pg);
?>
<?php if(preg_match('/message-us/',$pg) === 0): ?>

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
<?php endif; ?>
    <script type="text/javascript" src="js/tether.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap1.js"></script> 
    <script type="text/javascript" src="js/mdb5.js"></script>
    <script src="js/jquery-uia2.js"></script> 
    
  
    <script src="assets/js/jquery.hoverdir.js"></script> 
    <script src="assets/js/jquery.hoverex.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script> 
    <script src="assets/js/jquery.isotope.min.js"></script> 
    <script src="js/custom8.js"></script> 
    <script src="js/timeago.js"></script> 
    <script src="js/compareDate.js"></script> 

    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
     <script type="text/javascript" src="script/login-profile6.js"></script>
    <script type="text/javascript" src="script/comma1.js"></script>

    <script>
        function notify(type, message){
            var delay = 8000;
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