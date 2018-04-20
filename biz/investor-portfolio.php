<?php
    include 'includes/header-user.php';
    include 'includes/head.php';
    

    include 'common/config.php';
    include 'model/AddressDB.php'; 
?>
<style>
  body{
    background-color: #F7FAFA;
  }
 
</style>
  <link rel="stylesheet" href="css/topnavj.css"> 
 <!-- <script src='custom-select/jquery-customselect.js'></script>
  <link href='custom-select/jquery-customselect2.css' rel='stylesheet' /> -->
    <div class="container-fluid profile-nav fixed-top scrolling-navbar" hidden >
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
           <div class="profile-link" id="myTopnav">
           <img src="img/ProfilePics/vendetta.png" id="p_small_profile" class="img-circle center-bg b-2 m-t-5"> 
     <!--    <img src="img/Sari-Sari_Store_Cavite.jpg" class="b-2 m-t-5" height="40" width="70"> -->
              <a href="javascript:;" id="txt_fullname_small">Team Rocket Sari sari store</a>
              <a data-toggle="tooltip" onclick="like(this)" data-rel="prettyPhoto" href="javascript:;" class="m-r-10 animate_wobble_heart like_ _wobble_heart" data-animate="fadeInUp"><i class="ion-heart ion-size-20"></i>
              </a>
           
              <a data-toggle="tooltip" href="javascript:;"  onclick="bookmark(this)" class=" animate_wobble bookmark_ _wobble_star" data-animate="fadeInUp">
                <i class="ani ion-star ion-size-20 "></i>
              </a>
          </div> 
        </div>
        <div class="col">
           
        </div>
         <div class="col-lg-3">
           <div class="profile-link" id="myTopnav">
              <a href="search" class="border-white">Send Message</a>
              <a href="search" class="m-l-10  border-white">Invest</a>
          </div> 
        </div>

      </div>
        
    </div>
  </div>
<div class="container-fluid  h-auto  p-b font-white center-on-small-only"  style="background-color: #21b08a">
  <div class="row justify-content-md-center">
  <div class="row justify-content-md-center">
      
  </div>
  </div>
  <div class="row justify-content-md-center m-t-100">
  <div class="container">
    <div class="row">
    <div class="col-lg-2">
    <div class="img-relative">
      <div class="overlay uploadProcess no-display"> 
          <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>
      </div>
      <img src="img/ProfilePics/vendetta.png" id="p_profile2" class="img-circle2  b">
    </div>
    </div>
     <div class="col-lg-6 m-t-20">
        <div class="container ">
          <div class="row">
             <!--  <button class="btn btn-over-default-color">Edit Account</button> -->
          </div>
           
          <!-- <div class="row font-30">
            <strong>Wallet:&nbsp</strong> <h1 class="font-white" id="txt_wallet"></h1>
          </div> -->
          <div class="row">
            <h1 class="font-white font-30" id="txt_fullname"></h1>
          </div>
          <div class="row">
            <h6 class="font-white" id="txt_location"><i class="ion-location"></i> </h6>
          </div>
          <div class="row" id="likebookmark">

              <a data-toggle="tooltip" onclick="like(this)" data-rel="prettyPhoto" href="javascript:;" class="dmbutton a2 m-r-20 animate_wobble_heart like_ _wobble_heart" data-animate="fadeInUp"><i class="ion-heart ion-size-25"></i>
              </a>
           
              <a data-toggle="tooltip" href="javascript:;"  onclick="bookmark(this)" class="dmbutton a2 animate_wobble bookmark_ _wobble_star" data-animate="fadeInUp">
                <i class="ani ion-star ion-size-25 "></i>
              </a>
          </div>
        </div>
       
    </div>
    <div class="col-lg-4">
        <div class="container">
          <div class="row">
             
          </div>
   <!--        <div class="row">
            <button class="btn btn-over-default-color">Add Money to your wallet</button> 
          </div>
          <div class="row">
             <button class="btn btn-over-default-color">Withdraw Funds</button>
          </div> -->
        </div>
       
    </div>
    </div>
    </div>
  </div>
</div> 
     <input hidden name="prof_id" id="prof_id" value="<?php echo $_GET['id']?>">
  <!-- <input   name="accountid" id="accountid" value="<?php echo $_SESSION['account_id']?>"> -->
  <!-- <input   name="usertype" id="usertype" value="<?php echo $_SESSION['user_type']?>"> -->
<div class="container-fluid">
<div class="container-fluid bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-7">
          <div class="container justify-content-md-center" id="profile-detail">
          <!-- <a type="button" id="edit-profile-detail" class="pull pull-right">Edit</a> -->
           <h1 class="title">Profile Information</h1>
            <table id="documentList" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="250">Family name</td><td id="txt_lname"></td>
                  </tr>
                   <tr>
                    <td class="titletd" width="250">Given name</td><td id="txt_fname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Middle name</td><td id="txt_mname"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Barangay</td><td id="txt_brgy"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">Province</td><td id="txt_state"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="250">City</td><td id="txt_city"></td>
                  </tr>
                </tbody>
            </table><br/>
            
      </div>
        <div class="container justify-content-md-center no-display" id="form-profile-detail" >
        <div class="pull pull-right m-r-30 m-t-10">
          <a type="button" id="save-profile-detail" class="pull pull-right m-r-10">Save</a>
          <a type="button" id="cancel-profile-detail" class=" pull pull-right m-r-10">Cancel</a> 
        </div>  
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">Profile Details</div>
          <div class="panel-body">
          <div class="personal-info">
          <form class="" id="addFormProfileDetail" method="post">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Wallet</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="wallet" name="wallet"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Family name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <input type="text" class="inputText no-margin" id="lname" name="lname"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Given name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="fname" name="fname" />
               
              </div>            
            </div>
          </div>
         <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Middle name</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="mname" name="mname" />
              
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Barangay</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input type="text" class="inputText no-margin" id="brgy" name="brgy" />
              
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">State</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8"><?php?>
                <select onchange="changeState(this)" name='state' id="state" class='form-control custom-select ' style="height: 25px !important">

                </select>
            </div>
          </div>   
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">City</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <select  name="city" id="city" class='form-control custom-select' style="height: 25px !important">
              </select>      
            </div>
          </div>
    
          </form>
        </div>
        </div>
        </div>
      </div>
      </div>
        <div class="col-lg-5">
        <div class="container justify-content-md-center" id="form-contact-detail" > 
        <h1 class="title">Overview</h1>
        <div class="panel panel-default b-r-5">
          <div class="panel-heading bg-color-F7FAFA">
          <a class="btn btn-default" href="message-us?profile=<?php echo $_GET['profile']; ?>&to_id=<?php echo $_GET['id']; ?>">Send Message</a>
          <a class="btn btn-default" href="contract?id=<?php echo $_GET['id']; ?>">Invite</a>
          </div>
          <div class="panel-body">
          <div class="personal-info">

          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Minimum Investment</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <!-- <td id="txt_min"></td> -->
             <!--    <label class="m-t-10 m-l-30" id="txt_min"></label> -->
                <input readonly type="text" class="inputText no-margin" id="txt_min" name="txt_min" placeholder="09934534537"/>
              </div>            
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <div class="col">
                <label class=" m-t-10 m-l-30">Maximum Investment</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                  <input readonly type="text" class="inputText no-margin" id="txt_max" name="txt_max" placeholder="123-5678"/>
               
              </div>            
            </div>
          </div>  
        </div>
        </div>
        </div>
      </div>
      </div>

    </div>
</div>
<div class="container-fluid  bg-white m-50 p-15 ">
<div class="row justify-content-md-center">
      <div class="col-lg-7 ">
        <div class="container justify-content-md-center" id="about-me">
         <!-- <a type="button" id="edit-about-me" class="pull pull-right">Edit</a> -->
          <h1 class="title">About Me</h1>
          <p class="fontcolnice" id="txt_aboutme"></p>
        </div>

      </div>
      <div class="col-lg-5">
        <div class="container justify-content-md-center ">
         <!-- <a type="button" class="pull pull-right" id="btn_interest">Edit</a> -->
             <h1 class="title">Interested In</h1>
                <div class="row" id="interest_">
                <!--     <div class="col-sm-6 m-t-10 ">
                       <div class="interest-card border-gray tras-anim">
                             <h1>Transporation</h1>
                       </div>
                    </div> -->
                </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid  bg-white m-50 p-15">
<div class="row justify-content-md-center">
    <div class="col-lg-7" >
      <div class="container justify-content-md-center" id="contact-detail">
       <!-- <a type="button" id="edit-contact-detail" class="pull pull-right">Edit</a>  -->
       <h1 class="title"> Contact Details</h1>
          <div id="contact-handler">
            <table id="documentList1" class="table table-bordered table-hover table-condensed">
                <tbody>
                  <tr>
                    <td class="titletd" width="200">Phone </td><td id="txt_mobile"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Telophone </td><td id="txt_telephone"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Email</td><td id="txt_email"></td>
                  </tr>
                  <tr>
                    <td class="titletd" width="200">Facebook</td><td id="txt_facebook"></td>
                  </tr>
                </tbody>
            </table><br/>
          </div>
      </div>
    </div>
   
   <div class="col-lg-5 ">
  </div>
</div>
</div>
</div>

<script>




</script>
<!-- <script type="text/javascript" src="script/bookmark1.js"></script> -->
<script>

$(window).scroll(function () {
  if ($(".navbar").offset()) {
      if ($(".navbar").offset().top > 300) {
        $('.profile-nav').addClass('animated slideInUp')
        $('.profile-nav').removeAttr("hidden ");
      } else {
        $('.profile-nav').removeClass('animated slideInUp')
         $('.profile-nav').addClass('animated fadeOutDown')
        // $(".profile-nav").attr("hidden","true");
      }
  }
});
</script>
<script src="script/investor-portfolio6.js">
</script>
<!-- <script src="script/interest2.js"></script> -->
<script type="text/javascript" src="script/bookmark3.js"></script>
<script type="text/javascript" src="script/like7.js"></script>
<script src="script/contract-scroll4.js"></script> 
<script src="script/formTransition1.js"></script>
<?php
    include 'includes/footer.php';
?>