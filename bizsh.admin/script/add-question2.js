$(function(){
   var form = $(".add-question-form");

    $("#addQuestionForm").validate({
        rules: {
            question : "required", 
            answer : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var question = $("#question").val();
            var answer = $("#answer").val();
            
            var dataFields = [];
            dataFields.push({"name":"question_data","value": question});
            dataFields.push({"name":"answer","value":answer});
            dataFields.push({"name":"action","value":"Add-Question"});
            $.ajax({
                type:"POST",
                url:"controller/QuestionController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'good'){
                   swal(
                      'Good job!',
                      'Question Updated',
                      'success'
                    );
                   $("#addQuestionForm")[0].reset();  
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
    });
});