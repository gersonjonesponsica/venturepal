$(function () {
 
    $("#loadthis").addClass('loader-show');
    var question_id = $("#question_id").val();
    var data = [];
    data.push({"name":"action","value":"Get Question By ID"});
    data.push({"name":"question_id","value":question_id});
    $.post(
        'controller/QuestionController.php',
        data,
        function(info) {
            showFeature(jQuery.trim(info));
            $("#loadthis").removeClass('loader-show');
        }
    );
   var form = $(".edit-question-form");
    $("#editQuestionForm").validate({
        rules: {
            question: "required",
            answer: "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var question = $("#question").val();
            var answer = $("#answer").val();
            var question_id = $("#question_id").val();
            var data = [];
            data.push({"name":"question","value":question});
            data.push({"name":"answer","value":answer});
            data.push({"name":"question_id","value":question_id});
            data.push({"name":"action","value":"Edit Question"});
            $.ajax({
                type:"POST",
                url:"controller/QuestionController.php",
                data: data,
                success: function(data) {
                    if(jQuery.trim(data) == "true"){
                        swal(
                          'Good job!',
                          'Question Added',
                          'success'
                        );
                    }else{
                        swal(
                          'Oops...',
                          'Something went wrong!',
                          'error'
                        );
                    }
                    $("#loadthis").removeClass('loader-show');
                }
            });
        }
    })
});

function showFeature(question) {

    var question_info = JSON.parse(question);
     $("#question").val(question_info[1]);
     $("#answer").val(question_info[2]);
}