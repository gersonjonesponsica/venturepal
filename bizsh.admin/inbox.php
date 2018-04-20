<?php
    include 'common/config.php';
    include 'model/MessageDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

     $message_db = new MessageDB();
     $message = $message_db->getAllMessages();
     $todaymessage = $message_db->getAllTodayMessages();
?>
<style>
    body{
        background-color: #EEEEEE;
    }
</style>
 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div class="container-fluid m-t-100">
    <div class="row">
    <div class="col-sm-4 col-md-2 ">
        <ul class="side-inbox">
           <a href=""><li class="item">Pending Application<span class="pull-right">12</span></li></a> 
           <a href=""><li class="item">Deal Application<span class="pull-right">12</span></li></a> 
        </ul>      
    </div>
<div class="col-sm-12 col-md-7">
<div id="main-content " class=" bg-white">
    <div class="container">
        <div id="messageList_handler">
            <table id="messageList" class="table table-bordered table-condensed">
                <thead >
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                 <tbody>
                <?php foreach ($message as $m) {
                   
                    if($m['status'] == 0){
                        echo "<tr class='font-notread clickable-row' data-href='view-reply' data-id='".$m['message_id']."' data-type=''>";
                    }else
                        echo "<tr class='clickable-row'>";
                        echo "<td> ".$m['message']." </td>";
                        
                         echo "<td>".$message_db->time_ago($m['message_date'])."</td>";
           
                            echo "<td>action</td>";
                    echo "</tr>";
                  
                }?>
                </tbody>
            </table><br/>
        </div>
    </div>
</div>
</div>
    <div class="col-sm-4 col-md-3 bg-white">
       <div id="noti-item" style="height:600px !important;">
       <h5 class="text-center" style=""><small>Today</small></h5>
          <ul>
           <?php foreach ($todaymessage as $tm) :?>
            <li>
                <a href="verify-business">
                <div class="container m-r-100">
                   <div class="row">
                       <div class="col-lg-2">
                           <img src="img/ProfilePics/vendetta.png" class="border-r-50" height="30" width="30"> 
                       </div>
                       <div class="col-lg-10">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-8">
                                <div><small> <?php echo $tm['message']?></small></div>
                            </div>
                            </div>
                        </div>
                          
                       </div>
                   </div>
                </div>
                </li>
                <?php endforeach;?>
          </ul>
        </div>    
    </div>
</div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/message-list3.js"></script> 
 <?php
  include 'includes/footer.php';
 ?>




