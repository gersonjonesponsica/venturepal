<?php
    include 'includes/header-user.php';
    include 'common/config.php';
    include 'model/MessageDB.php';
    include 'includes/head.php';
    


?>

  <section id="services" class="sec-services m-t-50">
    <div class="container-fluid m-l-10 m-r-10">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="h3">Contact Us</h2>
          <h6>Hello there! If you need assistance with VenturePal, kindly visit our Help Center. It's the quickest way to get instant answers to most common questions.</h6>
          <h6 class="m-t-50"><a href="help" class="visit border-gray p-10"><i class="ion-search ion-size-20 m-r-10"></i>Visit help center</a></h6>
        </div>
      </div>
    </div>
  </section>
  <?php if(!isset($_SESSION['islogin'])) { ?>
  <section id="services" class=" m-t-50">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-lg-7">
          <h5 >Message us</h5>
          <div id="loadthis"></div>
          <form method="post" class="message-form" id="messageForm">
          
          <div class="row">
            <div class="col-lg-5">
              <input type="text"  class="" id="name" name="name" placeholder="Name" />
            </div>
            <div class="col-lg-7">
              <input type="email"  class="" id="email" name="email" placeholder="Email" />
            </div>
          </div>
          <div class="row">
          <div class="col-sm-12">
            <input type="text"  class="" id="subject" name="subject" placeholder="Subject" />
          </div>
            
          </div>
          <div class="row">
            <div class="col-sm-12">
              <textarea class="form-control counted" name="message" id="message" placeholder="Your Message" rows="5" style="margin-bottom:10px; height: 150px"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-default">Send Message</button>
          </form>
        </div>
        <div class="col-sm-5 col-lg-5">

          <h5 >Address</h5>
          <h6 >Address Address Addres AddresAddresAddres</h6>
          <hr>
          <h2 class="h3">Connect with us</h2>
        </div>
      </div>
    </div>
  </section>
<?php } else { ?>
<section id="services">
<h1 class="line-with-text">VenturePal Support</h1>
<!-- <?//foreach()?> -->
<!--  <div class="container justify-content-md-center">
  <div class="row justify-content-md-center">
    <div class="col-lg-2">
      <div class="container justify-content-md-center">
          <img class="img-circle-100" src="img/ProfilePics/agent smith.png" alt="Profile image example" >
   
      </div>
    </div>
    <div class="col-lg-10">
      <div class="container arrow_box_left">
          <h1 class="title text-center">Hi, I am Inviting you pool in my business.</h1>
      </div>
    </div>
  </div>
</div>  -->
<div class="container justify-content-md-center m-t-50">
  <div class="row justify-content-md-center">
    <div class="col-lg-12">
      <form method="post" class="message-form2" id="messageForm2">
        <input type="text"   id="sender_id" name="sender_id" value="<?php echo $_SESSION['userid'];?>" hidden/>
        <input type="text"   id="sender_type" name="sender_type" value="<?php echo $_SESSION['user_type'];?>" hidden/>
        <textarea class="form-control counted" name="message2" id="message2" placeholder="Type in your message" rows="5" style="margin-bottom:10px; height: 150px"></textarea>
        <h6 class="pull-right" id="counter">320 characters remaining</h6>
        <button class="btn btn-default" type="submit">Send Message</button>
      </form>
    </div>
  </div>
</div>
</section>
<?php } ?>
<div class="container-fluid">
    
    <div id="haha" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2472.94850457058!2d123.89399929186096!3d10.296863325736732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99bfd54c152e5%3A0xf9b2f3f4bd996da0!2sUniversity+Of+Cebu!5e0!3m2!1sen!2sph!4v1483683715607" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>


<?php
    include 'includes/footer.php';
?>

<script src="script/message2.js"></script> 