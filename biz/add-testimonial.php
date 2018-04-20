<?php
    include 'includes/header-user.php';
    include 'common/config.php';
    include 'model/CategoryDB.php';
    include 'includes/head.php';
    


    $category_db = new CategoryDB();
    $category = $category_db->getAllCategory();
?>

<div class="container-fluid profile-nav" >
<div class="container">
  <div class="row">
    <div class="col-lg-12">
       <div class="profile-link" id="myTopnav">
          <a href="testimonial" id="nav_name">Testimonials</a>
          <a href="add-testimonial" class="testi-active" id="nav_name">Add a Testimonial</a>
      </div> 
    </div>
  </div>
</div>
</div>
<h1 class="text-center m-t-120">VenturePal Philippines</h1>
  <section id="services" class="sec-services bg-white">

    <div class="container">
      <div class="row">
        <div class="col-sm-8">
         <div class="container">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
       <!--        <div id="msmeAccount"  class="container dropdown" style="width: auto;">
                <a class="nav-item1" href="javascript:;" id="choosenMsme">Choose msme</a>
                <div class="dropdown-content">
                  <ul id="msmeAcc">
                  </ul>
                </div>
              </div> -->
                <!-- <h5 >Message us</h5> -->
                <div id="loadthis"></div>
                <form method="post" class="testi-form" id="testiForm">
                <div class="row">
                  <div class="col-lg-3 m-t-10">
                    Choose Msme
                  </div>
                  <div class="col-lg-9">
                    <select style="height: 25px; background-color: white; width: 88%" name="msmeAcc" id="msmeAcc" class="form-control custom-select">
                  </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <textarea class="form-control counted" name="testi" id="testi" placeholder="Your testimonial*" rows="5" style="margin-bottom:10px; height: 200px"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-default">Submit Testimonial</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4" id="test2">
        </div>
      </div>
      </div>
    </div>
  </section>


<!--  <div class="row">
        <div class="m-auto m-t-50 font-20"><a class="font-default text-underline" href="" >View more Business</a></div>
</div> -->
<!-- <script type="text/javascript" src="script/add-testimonial.js"></script> -->
<script type="text/javascript" src="script/add-testimonials3.js"></script>
</div>
<?php
    include 'includes/footer.php';
?>