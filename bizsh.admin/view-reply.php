
<?php
    include 'common/config.php';
    include 'model/AdminDB.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }

?>
 <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>

 <input type="text" id="message_id" name="message_id" value="<?php echo $id ?>" hidden>
<div class="container-fluid">
  <div id="loadthis"></div>
    <div class="container-fluid" style="margin-top: 70px">
           <div class="container-fluid" style="top: 0px !important;">
              <div class="row">
                 <div class="col-lg-2">
                 
                </div>
                <div class="col-lg-8">
                  <div class="m-t-10">
                    <img class="img-circle" src="img/ProfilePics/vendetta.png">
                    <small id="from"> </small> 
                    <small id="message_date" value="asdf"></small>
                    <small id="message_time"></small>
                  </div>
                  <div class="m-t-20" >
                    <div id="subject">

                    </div>
                  </div>
                  <div class="m-t-20 ">
                    <small>to </small><small id="to_email"></small > 
                  </div>
                   <div class="m-t-20">
                  Dear VenturePal,
              	</div>

              	 <div class="m-t-20">
              	 	<small id="message">
					       </small>
              	</div>
                <div  class="m-t-30" >
                  <form class="reply-message" id="replyMessage">
                    <textarea cols="80" id="emailreply" name="emailreply" rows="10" placeholder="Reply">
                    </textarea>
                    <button type="submit" class="btn btn-default">Send Message</button>
                  </form>
                </div>
                </div>
                <div class="col-lg-2">
                 
                </div>
              </div>
              </div>
          
	        
    </div>
</div>
<script type="text/javascript" src="script/view-reply2.js"></script>

 <?php
  include 'includes/footer.php';
 ?>