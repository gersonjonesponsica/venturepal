$(function(){

      $("#registerForm").validate({
        rules: {
            email : "required",
            username: "required",
            repassword: { required: true, equalTo: "#rpassword" }
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
             $('.btnR').prop("disabled", true).addClass('disabledClass');

            var dataFields = [];
            dataFields = $("form").serializeArray();
            dataFields.push({"name": "password", "value": $('#rpassword').val()});
            dataFields.push({"name":"action","value":"Register"});
            $.ajax({
                type:"POST",
                url:"controller/AccountsController.php",
                data: dataFields,
                success: function(response) {  
                if(jQuery.trim(response) == 'Send'){
                  $('#confirm').text("Check your inbox");
                  $("#registerForm")[0].reset(); 
                }else if(jQuery.trim(response) == 'Exist'){
                  $('#confirm').text("Email already Exist"); 
                }else{
                  $('#confirm').text(response); 
                }
                  $("#loadthis").removeClass('loader-show');
                  $('.btnR').prop("disabled", false).removeClass('disabledClass');

                    
                }
             });
        }
    });
});