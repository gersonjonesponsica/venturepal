<?php
    include 'includes/head.php';
    include 'includes/navdefault.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<style>
    body {
      background-color: #EEEEEE;
      color: #3C4858;
    }
</style>
<link rel="stylesheet" href="css/containera4.css">
<div class="container m-t-100 m-b-50">   
    <div id="loadthis"></div>
    <div class="container content-80">
        <h1 id="confirm"></h1>
        <h1 class="title">Add Question</h1>
        <div class="container">
            <div id="loadthis"></div>
            <form class="edit-question-form" id="editQuestionForm">
            <input type="text" hidden name="question_id" id="question_id" value="<?php echo $id;?>">
            <div class="text-center">Question</span></div>
            <textarea class="form-control" id="question" name="question"></textarea>
            <div class="text-center">Answer</div>
            <textarea id="answer" class="form-control" name="answer"></textarea>
            </br>
            <button type="submit" class="btn btn-default" id="btnQuestion" name="btnQuestion">Add Question</button>
            </form>

        </div>
    </div>
</div>
<script src="script/edit-question3.js">
</script>
<script src="dist/sweetalert.min.js"></script>
 <?php
  include 'includes/footer.php';
 ?>



