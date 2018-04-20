$(function(){
   var form = $(".login-form");
    $("#loginForm").validate({
        rules: {
            email : "required", 
            password : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            $(".btnL").prop("disabled", true).addClass('disabledClass');
            var email = $("#email").val();
            var password = $("#password").val();
            
            var dataFields = [];
            dataFields.push({"name":"email","value": email});
            dataFields.push({"name":"password","value":password});
            dataFields.push({"name":"action","value":"Login"});
            $.ajax({
                type:"POST",
                url:"controller/AccountsController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'true'){
                    window.location.href = "index";
                  }else if(jQuery.trim(data) == 'inactive'){
                    $("#confirm").text("inactive");
                  }else if(jQuery.trim(data) == 'no account'){
                    $("#confirm").text("no account");
                  }else
                    $("#confirm").text(data);
                    
                  $("#loadthis").removeClass('loader-show');
                  $(".btnL").prop("disabled", false).addClass('disabledClass');
                }
             });
        }
    });
});