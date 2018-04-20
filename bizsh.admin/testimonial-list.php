<?php
    include 'common/config.php';
    include 'model/TestimonialDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';
    
    $test_db = new TestimonialDB();
    $test = $test_db->getAllTestimonials();
?>

 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Entreprenuer</h3>
        <div id="testiList_handler">
            <table id="testiList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Business Name</th>
                    <th>Owner Name</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
               <tbody>
                <?php foreach ($test as $e) {
                    echo "<tr> ";
                    echo "<td><img width='40' height='30' src='Entrep/".$e['msme_logo']."' class='m-r-10'>".$e['msme_name']."</td>";
                    echo "<td><img width='40' height='30' src='Entrep/".$e['e_photo']."' class='m-r-10'>".$e['entrepname']."</td>";
                    echo "<td class='hay'><textarea readonly data-file='".$e['message']."' onclick='changeText(this)' style='font-size: 13px !important; width: 300px;  resize: none; overflow: hidden; padding: 5px' class=''>".substr($e['message'],0, 40).'...'."</textarea></td>";
                    if($e['status'] == 1){
                       echo "<td class ='text-success'>Active</td>"; 
                    }else
                    echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='javascript:;' id='".$e['testi_id']."' onclick='deleteThis(this)'>Delete |</a>";
                        if($e['status'] == 1){
                           echo "<a href='javascript:;' data-stat='0' id='".$e['testi_id']."' 
                           onclick='changeStatus(this)'> Deactivate</a>"; 
                        }else{
                            echo "<a href='javascript:;' data-stat='1' id='".$e['testi_id']."' 
                            onclick='changeStatus(this)'> Activate</a>";
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

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/testimonial-list1.js">
    // $("textarea").resizable();

</script> 
<script>
    function changeText(element){
        var text = $(element).attr('data-file');
        $(element).val(text);
        $(element).height(0).height(element.scrollHeight);
    }
    $('.hay').on( 'change keyup keydown paste cut', 'textarea', function (){
        $(this).height(0).height(this.scrollHeight);
    }).find( 'textarea' ).change();
</script>

 <?php
  include 'includes/footer.php';
 ?>