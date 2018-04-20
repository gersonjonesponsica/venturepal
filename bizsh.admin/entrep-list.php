<?php
    include 'common/config.php';
    include 'model/EntrepDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    
    $entrep_db = new EntrepDB();
    $entrep = $entrep_db->getAllEntrep();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Entreprenuer</h3>
        <div id="entrepList_handler">
            <table id="entrepList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
               <tbody>
                <?php foreach ($entrep as $e) {
                $fullname = $e['e_lname'] .', '. $e['e_fname'] .($e['e_fname'] == '' ? "" : ' '.$e['e_fname'].'.');
                    echo "<tr> ";
                    echo "<td><img width='40' height='30' src='Entrep/".$e['e_photo']."' class='m-r-10'>".$fullname."</td>";
                    echo "<td>".$e['e_email']."</td>";
                    if($e['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                    echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$e['e_id']."' onclick='viewStatistic(this)'>Paying statistics |</a>".
                        "<a href='javascript:;' id='".$e['e_id']."' onclick='viewEntrep(this)'>View |</a>".
                        "<a href='javascript:;' id='".$e['e_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($e['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$e['e_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$e['e_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    
                    echo "</tr>";
                }?>
                </tbody> 
            </table><br/>
        </div>
        <a href="add-entrep" class="btn btn-default">Add Entreprenuer</a>

    </div>
</div>
<div  class="modal fade" id="entrepModal" role="dialog">
    <div class="modal-dialog "  style="width: 1000px !important">
        <!-- Modal content-->
        <div class="modal-content">
            <button id="btn_close" type="button" hidden class="close pull-right" data-dismiss="modal">&times;</button>
            <div id="loader-div" >
                <li style="list-style-type:none" class="center-text" id="loading"><i class="ion-load-c"></i> </li>
                </div>
            <div class="modal-header bg-mycolor" style="margin: 0 !important" id="icon">
                

            </div>
            <div class="modal-body" id="entrepMod">
                <!-- <div></div> -->
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
      
    </div>
</div>

<div  class="modal fade" id="entrepStatistic" role="dialog">
    <div class="modal-dialog modal-lg"  style="width: 1000px !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div id="chartContainer" style="height: 370px">
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
                
            </div>
        </div>
      
    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/entrep-list5.js"></script> 
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

 <?php
  include 'includes/footer.php';
 ?>