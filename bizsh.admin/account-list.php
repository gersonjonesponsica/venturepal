<?php
    include 'common/config.php';
    include 'model/AccountDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    

    $account_db = new AccountDB();
    $account = $account_db->getAllAccount();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid  m-r-50 m-l-50">
        <h3 class="title">List of Account</h3>
        <div id="accountList_handler">
            <table id="accountList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Acc Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($account as $a) {
                    $user = ($a['acc_type'] == 1 ? " data-id='".$a['investor_id']."' " : " data-id='".$a['investee_id']."' " );
                    $href = ($a['acc_type'] == 1 ? " data-href='add-investor' " : " data-href='add-entrep' " );
                    // echo "<tr class='clickrow' ".$href."' '".$user."'>";
                    echo "<tr>";
                    echo "<td>".$a['acc_username']."</td>";
                    echo "<td>".md5($a['acc_password'])."</td>";
                    echo "<td>".$a['acc_email']."</td>";
                    $type = ($a['acc_type'] == 1 ? "Investor" : "Entrep");
                    echo "<td>".$type."</td>";
                    if($a['acc_status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
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
        <a href="add-account" class="btn btn-success">Add Account</a>

    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/account-list.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>