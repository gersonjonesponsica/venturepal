$(function(){$(".message-form");$("#messageForm").validate({rules:{name:"required",email:"required",subject:"required",message:"required"},submitHandler:function(e){var s=$("#email").val(),a=$("#name").val(),r=$("#message").val(),n=$("#subject").val(),t=[];t.push({name:"email",value:s}),t.push({name:"name",value:a}),t.push({name:"message",value:r}),t.push({name:"subject",value:n}),t.push({name:"action",value:"Send message not login"}),$.ajax({type:"POST",url:"controller/MessageController.php",data:t,success:function(e){"success"==jQuery.trim(e)?(notify("success-notify","Message sent"),$("#messageForm")[0].reset()):"error"==jQuery.trim(e)?notify("error-notify","Message not sent"):notify("error-notify",jQuery.trim(e))}})}}),$("#messageForm2").validate({rules:{message2:"required"},submitHandler:function(e){var s=$("#sender_id").val(),a=($("#sender_type").val(),$("#message2").val()),r=[];r.push({name:"message",value:a}),r.push({name:"sender_id",value:s}),r.push({name:"action",value:"Send message login"}),$.ajax({type:"POST",url:"controller/MessageController.php",data:r,success:function(e){"success"==jQuery.trim(e)?(notify("success-notify","Message sent"),$("#messageForm2")[0].reset()):"error"==jQuery.trim(e)?notify("error-notify","Message not sent"):notify("error-notify",jQuery.trim(e))}})}})});