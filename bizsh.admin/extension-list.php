<?php
    include 'common/config.php';
    include 'model/ExtensionDB.php';
     include 'model/MessageDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    
    $entension_db = new ExtensionDB();
    $message_db = new MessageDB();
    $entension = $entension_db->getAllExtension();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of MSME Asking Extension</h3>
        <div id="extensionList_handler">
            <table id="extensionList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Msme Info</th>
                    <th>Date ask</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
               <tbody>
                <?php foreach ($entension as $e) {
                    echo "<tr> ";
                    echo "<td><img width='40' height='30' src='Entrep/".$e['msme_logo']."' class='m-r-10'>".$e['msme_name']."</td>";
                    echo "<td>" .$message_db->time_ago($e['extension_date']). ', '.date('F j, Y',strtotime($e['extension_date']))."</td>";
                    if($e['status'] == 1){
                       echo "<td class ='text-success'>Extenstion Accepted</td>"; 
                    }else
                    echo "<td class ='text-error'>Not Active '".$e['extension_id']."'</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$e['msme_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($e['status'] == 1){
                           echo "<a href='javascript:;' > Accepted </a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$e['msme_id']."' 
                            onclick='changeStatus(this)'> Accept</a>";
                        }
                    echo "</td>";
                    echo "</tr>";

                }?>
                </tbody> 
            </table><br/>
        </div>
        <!-- <a href="add-entrep" class="btn btn-success">Add Entreprenuer</a> -->

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
<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/extension-list3.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>