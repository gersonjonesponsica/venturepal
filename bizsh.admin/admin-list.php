<?php
    include 'common/config.php';
    include 'model/AdminDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    

    $admin_db = new AdminDB();
    $admin = $admin_db->getAllAdmin();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Admin</h3>
        <div id="adminList_handler">
            <table id="adminList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($admin as $a) {
                    echo "<tr>";
                    echo "<td>".$a['lname'].', ' .$a['fname']."</td>";
                    echo "<td>".$a['username']."</td>";
                    echo "<td>".$a['email']."</td>";
                    if($a['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='edit-question?id=".$a['admin_id']."'>Edit</a> | ".
                        "<a href='javascript:;' id='".$a['admin_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($a['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$a['admin_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$a['admin_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-admin" class="btn btn-success">Add Admin</a>

    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/admin-list2.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>