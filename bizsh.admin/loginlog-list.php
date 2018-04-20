<?php
    include 'common/config.php';
    include 'model/AccountDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    
    $account_db = new AccountDB();
    $log = $account_db->getAllLoginList();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid  m-r-50 m-l-50">
        <h3 class="title">List of Login List</h3>
        <div id="logList_handler">
            <table id="logList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Acc Type</th>
                    <th>Status</th>
                    <th>Login Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($log as $a) {
                    echo "<tr>";
                    echo "<td>".$a['username']."</td>";
                    echo "<td>".$a['acc_email']."</td>";
                    $type = ($a['acc_type'] == 1 ? "Investor" : "Entrep");
                    echo "<td>".$type."</td>";
                    if($a['acc_status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 

                    echo "<td>".$a['logindate']."</td>";    
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$a['acc_id']."' onclick='deleteThis(this)'>Delete |</a>";

                        if($a['acc_status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$a['acc_id']."' 
                           onclick='changeStatus(this)'> Deactivate </a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$a['acc_id']."' 
                            onclick='changeStatus(this)'> Activate </a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/loginlog-list.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>