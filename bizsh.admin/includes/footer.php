
<!--     <footer class="page-footer center-on-small-only">
  
  
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-lg-6 offset-lg-1" class="about-footer">
                <img class="img-responsive" id="nav-logo" src="img/venturelogowhite.png" width="170" height="40">
                &copy; 2017
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices bibendum mollis. Sed aliquet, enim at vulputate porttitor, felis nunc vehicula ante, blandit lobortis mi massa non leo. Sed dui enim, interdum non rhoncus vitae, blandit eu eros. Nulla facilisi. </p>
                </div>
       

               <div class="col-lg-4 offset-lg-1" class="about-footer">
                    <div class="call-to-action">
                        <h4>Follow us</h4>
                        <ul>
                            <li><a href=""><img src="img/twitter.png"></a></li>
                            <li><a href=""><img src="img/facebook.png"></a></li>
                            <li><a href=""><img src="img/instagram.png"></a></li>
                            <li><a href=""><img src="img/pinterest.png"></a></li>
                            <li><a href=""><img src="img/google-plus.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="hr-footer m-l-100 m-r-100">
        <div class="container-fluid footer">
            <div class="row p-15 m-r-30 m-l-30">
                <div class="col-lg-3 offset-lg-1 hidden-lg-down" class="about-footer">
                    <h6> About us</h6>
                    <ul>
                        <li><a href="">What is VenturePal</a></li>
                        <li><a href="">Who we we are</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-1 hidden-lg-down" class="about-footer">
                    <h6>Learn</h6>
                    <ul>
                        <li><a href=""> How it works</a></a></li>
                        <li><a href="">How we manage risks</a></li>
                        <li><a href="">How you can contribute</a></li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-1 hidden-lg-down" class="about-footer">
                    <h6>Help</h6>
                    <ul>
                        <li><a href="">Help Center</a></li>
                        <li><a href="">Contact-us</a></li>
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
    </footer> -->

     <script type="text/javascript" src="js/tether.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap1.js"></script> 
    <script type="text/javascript" src="js/mdb4.js"></script>
    <!--  -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/prism.js"></script> 
     <script src="js/jquery-uia2.js"></script> 
     <script src="js/pdfobject.js"></script>
     <script src="js/investment-range1.js"></script>

<!--     <script src="js/jquery.mobile-1.4.5.min.js"></script>  -->
  
    <script src="assets/js/jquery.hoverdir.js"></script> 
    <script src="assets/js/jquery.hoverex.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script> 
    <script src="assets/js/jquery.isotope.min.js"></script> 
    <script src="assets/js/custom.js"></script> 
     <script src="js/comma.js"></script> 
<!--     <script src="js/lazyload.min.js"></script> -->
    <script>
            $(document).ready(function(){
                 $('[data-toggle="tooltip"]').tooltip(); 
             });
    $(document).ready(function () {
         
        $('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    // $('#noti_Button').css('background-color', '#2E467C');
                }
                else $('#noti_Button').css('background-color', '#FFF');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                // $('#noti_Button').css('background-color', '#2E467C');
            }
        });

        // $('#notifications').click(function () {
        //     return false;      
        // });
    });
</script>
</body>

</html>