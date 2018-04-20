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
          <a href="testimonial" class="testi-active" id="nav_name">Testimonials</a>
          <?php if($_SESSION['user_type'] == 2 ): ?>
          <a href="add-testimonial"  id="nav_name">Add a Testimonial</a>
          <?php endif; ?>
          
      </div> 
    </div>
  </div>
</div>
</div>

<h1 class="text-center m-t-120">Testimonials</h1>
<!-- <h1 class="line-with-text">Testimonials</h1> -->

  <section id="services" class="sec-services bg-white">

    <div class="container">
      <div class="row" id="testimonial">
      </div>
      </div>
    </div>
  </section>

<script type="text/javascript" src="script/testimoniala2.js"></script>

<?php
    include 'includes/footer.php';
?>