<?php
    include 'common/config.php';
    include 'model/SubcategoryDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

     $subcategory_db = new SubcategoryDB();
     $subcategory = $subcategory_db->getAllSubcategory2();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">
    <div class="container-fluid m-r-50 m-l-50""> 
        <h3 class="title">Sub-Category List</h3>
        <div id="subcategoryList_handler">
            <table id="subcategoryList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Icon</th>
                    <th>Subcategory name</th>
                    <th>Category name</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($subcategory as $c) {
                  
                    echo "<tr>";
                    $img_src = $c['icon_location'].$c['icon_name'];
                    $img_src = substr($img_src,3,strlen($img_src));
                    echo "<td> <img height='50px' width='50px' src='$img_src'/> </td>";
                    echo "<td>".$c['sub_name']."</td>";
                    echo "<td>".$c['cat_name']."</td>";
                    if($c['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='edit-category?id=".$c['sub_id']."'>Edit</a> | ".
                        "<a href='javascript:;' id='".$c['sub_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($c['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$c['sub_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$c['sub_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-subcategory" class="btn btn-default">Add Subcategory</a>

    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/subcategory-list3.js"></script> 
 <?php
  include 'includes/footer.php';
 ?>
