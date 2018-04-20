<?php
    include 'common/config.php';
    include 'model/CategoryDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

     $category_db = new CategoryDB();
     $category = $category_db->getAllCategory();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">Category List</h3>
        <div id="categoryList_handler">
            <table id="categoryList" class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <th>Category name</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($category as $c) {
                  
                    echo "<tr>";
                    echo "<td>".$c['cat_name']."</td>";
                    if($c['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='edit-category?id=".$c['cat_id']."'>Edit</a> | ".
                        "<a href='javascript:;' id='".$c['cat_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($c['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$c['cat_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$c['cat_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-category" class="btn btn-default">Add Category</a>

    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/category-list1.js"></script> 
 <?php
  include 'includes/footer.php';
 ?>