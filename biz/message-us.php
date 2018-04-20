<?php
  include 'includes/header-user.php';
  include 'includes/head.php';
  include 'common/config.php';

    if (isset($_GET['profile'])) {
      $msmeid = $_GET['profile'];
    }
?>
<style type="text/css">
  
  body{
    background-color: #f6f7f7;
  }
  .mcs-vertical-example{
    overflow-y: auto;
  }
  .side-chat-user:hover{
    background-color: #e7e7e7;
    cursor: pointer;
  }
  .user-active{
    background-color: #e7e7e7;
  }

</style>
<script src="js/fancywebsocket.js"></script>
<div class="container-fluid">

<div class="row">
  <div class="col-lg-3" style="background-color: white;   border-right: 1px solid #c0c2c2; overflow-y: auto; ">
    
    <div class="container-fluid no-pad" style="margin-top: 90px" id="userContainer" >
      <!-- data from javascript here  -->
    </div>
  </div>
  <div class="col-lg-9 no-pad" style="margin-top: 70px ">

    <div id="ctitle" class="container"></div>
     <div id="msmeAccount" style="position: absolute; left: 0%; top: 7%; width: auto;" class="container dropdown">
        <a class="nav-item1" href="javascript:;" id="choosenMsme"></a>
          <div class="dropdown-content">
            <ul  id="msmeAcc">
            
    
          </ul>
        </div>

    </div>   
  
    <input hidden name="to_id" id="to_id" value="<?php echo $_GET['to_id']?>">
    <input hidden name="msme_id" id="msme_id" value="<?php echo $msmeid?>">

    <div class="container-fluid message-board"  id="messageBoard">
      <!-- convo here  -->
      <div id="loadthis" class="loader-show-small"></div>

    </div> 
<!-- <div id="loadthis" class="loader-show-small"><p>laoding</p></div> -->
<div class="container justify-content-md-center m-t-10 bg-white" style="border-top: 1px solid #d6d8d8;">
  <div class="row justify-content-md-center">
    <div class="col-lg-12 p-15">
      <div class="row">
        <div class="col-lg-8">
          <form id="messageForm" name="messageForm" method="POST" class="hay">
            <textarea class="form-control counted  bg-white" id="message" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px; resize: none; overflow: hidden; height:20px; border: 1px solid #d6d8d8; border-radius: 30px"></textarea>
            <!-- <h6 class="pull-right" id="counter">320 characters remaining</h6> -->
          </form>
        </div>
        <div class="col-lg-2 m-t-10">
            <a href="javascript:;" id="btnSend"><i class="ion-android-send m-b-100" style="color: #5b5b5b; font-size: 40px !important"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
</div>

<script src="script/messaged.js">
</script>
<script>
    $('.hay').on( 'change keyup keydown paste cut', 'textarea', function (){
        $(this).height(0).height(this.scrollHeight - 25);
    }).find( 'textarea' ).change();

    function send( text ) {
      Server.send( 'message', text );
    }

    $(document).ready(function() {
      console.log('Connecting...');
      $('#typing').text("");
      Server = new FancyWebSocket('ws://127.0.0.1:9300');

      $('#message').keyup(function(e) {
        if (this.value) {
          send('1');
        }else{
          send('0');
        }
      });
      $('#message').click(function(e) {
        send('seen');
      });
      //Let the user know we're connected
      Server.bind('open', function() {
        console.log( "Connected." );
      });

      //OH NOES! Disconnection occurred.
      Server.bind('close', function( data ) {
        console.log( "Disconnected." );
      });

      //Log any messages sent from server
      Server.bind('message', function( payload ) {
        console.log( payload );
        if (payload.includes('said "1"')) {
           $('#typing').text("Typing . .");
        }
        if (payload.includes('said "0"')) {
           $('#typing').text("");
        }
        if (payload.includes('said "send"')) {
          getChoosenConvo();
        }
      });

      Server.connect();
    });
</script>
<?php
    include 'includes/footer.php';
?>