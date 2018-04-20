$(function(){
  //login form
   var form = $(".forget-form");
    $("#forgetForm").validate({
        rules: {
            email : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            $(".btnL").prop("disabled", true).addClass('disabledClass');
            var email = $("#email").val();
            
            var dataFields = [];
            dataFields.push({"name":"email","value": email});
            dataFields.push({"name":"action","value":"Forget"});
            $.ajax({
                type:"POST",
                url:"controller/AccountsController.php",
                data: dataFields,
                success: function(data) {
                       if(jQuery.trim(data) == 'send') {
                        $("#confirm").text("Check you inbox");
                        $('#forgetForm')[0].reset();
                       } else if("not found"){
                        $("#confirm").text("Email not valid");
                      }else
                        alert(data);

                       $("#loadthis").removeClass('loader-show');
                       $(".btnL").prop("disabled", true).removeClass('disabledClass');
                }
             });
        }
    });
  });