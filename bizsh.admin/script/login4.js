
$(function(){
   var form = $(".login-form");

    $("#loginForm").validate({
        rules: {
            username : "required", 
            password : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            $(".btnL").prop("disabled", true).addClass('disabledClass');
            var username = $("#username").val();
            var password = $("#password").val();
            
            var dataFields = [];
            dataFields.push({"name":"username","value": username});
            dataFields.push({"name":"password","value":password});
            dataFields.push({"name":"action","value":"Login"});
            $.ajax({
                type:"POST",
                url:"controller/AdminController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'true'){
                    window.location.href = "dashboard";
                  }else {
                    alert('error logging in');
                  }
                  $("#confirm").text(data);
                  $("#loadthis").removeClass('loader-show');
                  $(".btnL").prop("disabled", false).addClass('disabledClass');
                }
             });
        }
    });
});