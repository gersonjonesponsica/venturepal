<?php
    include 'common/config.php';
    include 'model/ApplicationDB.php';
    include 'model/MessageDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $app_db = new ApplicationDB();
    $message_db = new MessageDB();

    $type = 4;
    if (isset($_GET['type'])) {
      if ($_GET['type'] == 'all') {
        $type = 4;
      }else if($_GET['type'] == 'download'){
        $type = 0;
      }else if($_GET['type'] == 'deal'){
        $type = 1;
      }else if($_GET['type'] == 'pending'){
         $type = 2;
      }else if($_GET['type'] == 'declined'){
         $type = 3;
      }
    }
    if (isset($_GET['type'])) {
       $app = $app_db->getAllContract($type);

    }else{
      $app = $app_db->getAllContract($type);
    }
?>
<style>
   /* body{
        background-color: #EEEEEE;
    }*/
    .img-center-in-div{
       vertical-align:middle !important; 
       text-align:center !important;
  }
</style>
 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
 <div id="main-content" class=" m-t-100">

    <div class="container-fluid m-r-50 m-l-50">
        <h3 class="title">Investment Application List</h3>
        <div id="applicationList_handler">
            <table id="applicationList2" class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <th>Investment Application</th>
                    <th>From Investor</th>
                    <th>to MSME</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($app as $a) {
                    echo "<tr>";
                    echo "<td>".$a['contract_file']."</td>";
                    echo "<td>".$a['contract_file']."</td>";
                    echo "<td>".$a['contract_file']."</td>";
                    echo "<td>".$message_db->time_ago($a['contract_date']).',  '.date('j/m/Y',strtotime($a['contract_date']))."</td>";
                    if($a['status'] == 0)
                       echo "<td class ='text-success'>Download Contract</td>"; 
                    else if($a['status'] == 1)
                        echo "<td class ='text-success'>Accepted</td>"; 
                    else if($a['status'] == 2)
                        echo "<td class ='text-error'>Pending</td>";
                    else if($a['status'] == 3)
                        echo "<td class ='text-error'>Declined</td>";  
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' onclick='showApplicationModal(this)' 
                        id=".$a['contract_id'].">Review</a> ";
                        //;"<a href='javascript:;' id='".$a['contract_id']."' onclick='deleteThis(this)'>Delete</a>";
                    echo "</td>";

                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <!-- <a href="add-category" class="btn btn-default">Add Category</a> -->

    </div>
    <div class="container" style="width: 20%; position: absolute; top: 144px; left: 300px;">
      <label style="white-space: pre-line !important">Choose</label>
      <br>
      <select style="width: 200px; margin: none !important" id="type">
        <option value="all" <?php if($type == '4') echo 'selected';?>>All Investment</option>
        <option value="download" <?php if($type == '0') echo 'selected';?>>Download Contract</option>
        <option value="declined" <?php if($type == '3') echo 'selected';?>>Declined Investment</option>
        <option value="pending" <?php if($type == '2') echo 'selected';?>>Pending Investment</option>
        <option value="deal" <?php if($type == '1') echo 'selected';?>>Closed/Deal Investment</option>
      </select>
    </div>
</div>

<div  class="modal fade" id="applicationModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" id="reviewMod">
          
        </div>
    </div>
</div>
<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/application-lista6.js"></script> 
<script src="script/investment3.js"></script> 
<script src="script/notification.js"></script> 
<!-- <div class="modal-content" id="reviewMod">
            <div id="loader-div" >
                <li style="list-style-type:none" class="center-text" id="loading"><i class="ion-load-c"></i> </li>
            </div>
            <div class="modal-header">
                <h1 class="title text-center">Investment Application</h1>
            </div>

            <div class="modal-body">
                <div class="container m-t-10 m-b-10">
                  <div class="row">
                    <div class="col-lg-3 img-center-in-div">
                 
                      <img  src="img/ProfilePics/alice.png" class="img-circle2 b-4-color">
                      <p class="text-center">Gerson Jones Ponsica</p>
                      <p class="text-center">AMOUNT: P 10,000</p>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-lg-6 img-center-in-div">
                          <a data-rel="prettyPhoto" href="img/sample_dti.jpg"  data-animate="fadeInUp"><img class="dmbutton a2" src="img/contract.png" width="100%" height="300px"></a>
                          <p class="text-align">Contract</p>
                        </div>
                        <div class="col-lg-6 img-center-in-div">
                          <a data-toggle="tooltip" data-placement="top"  data-rel="prettyPhoto" href="img/sample_dti.jpg"  data-animate="fadeInUp"><img class="dmbutton a2" src="img/contract.png" width="100%" height="300px"></a>
                          <p class="text-align">Proof of Investment</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 img-center-in-div">
                      <img src="img/ProfilePics/alice.png" class="img-circle2 b-4-color">
                      <p class="text-center">Tindahan ni Sugbo</p>
                      <p class="text-center">TARGET CAPITAL: P 100,000</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button>
                 <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Decline Investment </button>
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Accept Investment </button>
            </div>
        </div> -->
 <?php
  include 'includes/footer.php';
 ?>




