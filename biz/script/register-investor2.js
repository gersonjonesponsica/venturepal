var email;$(function(){$("#registerForm").validate({rules:{email:"required",username:"required",repassword:{required:!0,equalTo:"#rpassword"}},submitHandler:function(e){$("#loadthis").addClass("loader-show"),$(".btnR").prop("disabled",!0).addClass("disabledClass"),email=$("#email").val();var r=[];(r=$("form").serializeArray()).push({name:"password",value:$("#rpassword").val()}),r.push({name:"action",value:"Register"}),$.ajax({type:"POST",url:"controller/AccountsController.php",data:r,success:function(e){"Send"==jQuery.trim(e)?(notify("success-notify","We sent an email to "+email+"Please verify."),$("#registerForm")[0].reset()):"Exist"==jQuery.trim(e)?notify("info-notify","Email already Exist"):notify("error-notify","Error"),$("#loadthis").removeClass("loader-show"),$(".btnR").prop("disabled",!1).removeClass("disabledClass")}})}})});