<?php
    include 'common/config.php';
    include 'model/DocumentDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $doc_db = new DocumentDB();
    $document = $doc_db->getAllDocuments();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Document</h3>
        <div id="documentList_handler">
            <table id="documentList" class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <th>Name</th>
                    <th>Uploaded By</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($document as $d) {
                    echo "<tr>";
                    echo "<td><a  data-id=".$d['doc_id']." href='javascript:;' onclick='view(this)'>".$d['doc_name']."</a>";
                    echo "<td>".$d['username']."</td>";
                    if($d['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='javascript:;'data-id='".$d['doc_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($d['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$d['doc_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$d['doc_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
                        }
                    echo "</td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-document" class="btn btn-success">Add Document/s</a>

    </div>
</div>
<script>


</script>
<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/document-list5.js"></script> 
 <?php
  include 'includes/footer.php';
 ?>
