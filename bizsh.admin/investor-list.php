<?php
    include 'common/config.php';
    include 'model/InvestorDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    
    $investor_db = new InvestorDB();
    $investor = $investor_db->getAllInvestor();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
 <style type="text/css">

</style>
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Investors</h3>
        <div id="investorList_handler">
            <table id="investorList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
               <tbody>
                <?php foreach ($investor as $e) {
                $fullname = $e['investor_lname'] .', '. $e['investor_fname'] .($e['investor_mname'] == '' ? "" : ' '.$e['investor_mname'].'.');
                    echo "<tr> ";
                    echo "<td><img width='40' height='30' src='Investor/".$e['investor_photo']."' class='m-r-10'>".$fullname."</td>";
                    echo "<td>".$e['investor_email']."</td>";
                    if($e['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                    echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$e['investor_id']."' onclick='viewInvestor(this)'>View |</a>".
                        "<a href='javascript:;' id='".$e['investor_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($e['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$e['investor_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$e['investor_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    
                    echo "</tr>";
                }?>
                </tbody> 
            </table><br/>
        </div>
        <a href="add-entrep" class="btn btn-success">Add Investor</a>

    </div>
</div>

<div  class="modal fade" id="investorModal" role="dialog">
    <div class="modal-dialog "  style="width: 1000px !important">
        <!-- Modal content-->
        <div class="modal-content">
            <button id="btn_close" type="button" hidden class="close pull-right" data-dismiss="modal">&times;</button>
            <div id="loader-div" >
                <li style="list-style-type:none" class="center-text" id="loading"><i class="ion-load-c"></i> </li>
                </div>
            <div class="modal-header bg-mycolor" id="icon">
                

            </div>
            <div class="modal-body" id="investorMod">
                <!-- <div></div> -->
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
      
    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/investor-list4.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>