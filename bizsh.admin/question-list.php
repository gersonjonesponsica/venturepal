<?php
    include 'common/config.php';
    include 'model/QuestionDB.php';
    include 'includes/session.php';
    include 'includes/head.php';
    include 'includes/navdefault.php';

    $question_db = new QuestionDB();
    $question = $question_db->getAllQuestions();
?>
 <link type="text/css" rel="stylesheet" href="plugins/datatables/datatables.css"> 
<div id="main-content" style="margin-top: 70px">

    <div class="container-fluid m-r-50 m-l-50"">
        <h3 class="title">List of Question</h3>
        <div id="questionList_handler">
            <table id="questionList" class="table table-bordered table-hover table-condensed">
                <thead>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($question as $c) {
                    echo "<tr>";
                    echo "<td>".$c['question_data']."</td>";
                    echo "<td>".$c['answer']."</td>";
                    if($c['status'] == 1){
                        echo "<td class ='text-success'>Active</td>"; 
                    }else
                        echo "<td class ='text-error'>Not Active</td>"; 
                    echo "<td class='text-center'>".
                        "<a href='edit-question?id=".$c['question_id']."'>Edit</a> | ".
                        "<a href='javascript:;' id='".$c['question_id']."' onclick='deleteThis(this)'>Delete |</a>";
                            if($c['status'] == 1){
                               echo "<a href='javascript:;' data-stat='0' id='".$c['question_id']."' 
                               onclick='changeStatus(this)'> Deactivate</a>"; 
                            }else{
                                echo "<a href='javascript:;' data-stat='1' id='".$c['question_id']."' 
                                onclick='changeStatus(this)'> Activate</a>";
                            }
                        "</td>";
                        
                    echo "</tr>";
                }?>
                </tbody>
            </table><br/>
        </div>
        <a href="add-question" class="btn btn-success">Add Qeustion</a></ABBR>

    </div>
</div>

<script type="text/javascript" src="plugins/datatables/datatables.js"></script>
<script src="script/question-list6.js"></script> 

 <?php
  include 'includes/footer.php';
 ?>