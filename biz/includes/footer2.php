
        <!--  -->
   <!--  <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/prism.js"></script>  -->
<!--     <script src="js/jquery.mobile-1.4.5.min.js"></script>  -->
<!--     <script src="js/lazyload.min.js"></script> -->


    <script type="text/javascript" src="js/tether.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap1.js"></script> 
    <script type="text/javascript" src="js/mdb5.js"></script>
    <script src="js/jquery-uia2.js"></script> 
    <script src="js/investment-range1.js"></script>
  
    <script src="assets/js/jquery.hoverdir.js"></script> 
    <script src="assets/js/jquery.hoverex.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script> 
    <script src="assets/js/jquery.isotope.min.js"></script> 
    <script src="js/custom8.js"></script> 
    <script src="js/timeago.js"></script> 

    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="script/login-profilea1.js"></script>
    <script type="text/javascript" src="script/comma1.js"></script>

    <script>
        function notify(type, message){
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
            }, 5000);
        }
    </script>



</body>

</html>