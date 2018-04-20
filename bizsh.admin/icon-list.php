<?php
    include 'common/config.php';
    include 'model/IconDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $icon_db = new IconDB();
    $icon = $icon_db->getAllIcons();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Icons</h3>
        <div id="iconList_handler">
            <table id="iconList" class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($icon as $i) {
                    echo "<tr>";
                    $img_src = $i['icon_location'].$i['icon_name'];
                    $img_src = substr($img_src,3,strlen($img_src));
                    echo "<td> <img height='50px' width='50px' src='$img_src'/> </td>";
                 
                    echo "<td>".$i['icon_name']."</td>";
                    if($i['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='edit-question?id=".$i['icon_id']."'>Edit</a> | ".
                        "<a href='javascript:;' id='".$i['icon_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($i['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$i['icon_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$i['icon_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-icon" class="btn btn-success">Add Document/s</a>

    </div>
</div>
<script>


</script>
<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/icon-list3.js"></script>
 <?php
  include 'includes/footer.php';
 ?> 
