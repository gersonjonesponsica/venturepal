$(function(){$(".login-form");$("#loginForm").validate({rules:{email:"required",password:"required"},submitHandler:function(o){$("#loadthis").addClass("loader-show"),$(o).find("input").attr("disabled",!0),$("#btnLogin").val("Loading..");var e=$("#email").val(),i=$("#password").val(),n=[];n.push({name:"email",value:e}),n.push({name:"password",value:i}),n.push({name:"action",value:"Login"}),$.ajax({type:"POST",url:"controller/AccountsController.php",data:n,success:function(e){"true1"==jQuery.trim(e)?window.location.href="dashboard":"true2"==jQuery.trim(e)?window.location.href="entrepreneur-profile":"inactive"==jQuery.trim(e)?notify("info-notify","Please check inbox and verify your account"):"no account"==jQuery.trim(e)?notify("error-notify","Please create your account"):notify("info-notify",e),$("#loadthis").removeClass("loader-show"),$("#btnLogin").val("Login"),$(o).find("input").removeAttr("disabled")}})}})});