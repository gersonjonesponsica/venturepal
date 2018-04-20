$(function(){
    //reset form

    $("#resetForm").validate({
        rules: {
            repassword: { required: true, equalTo: "#password" }
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            $(".btnL").prop("disabled", true).addClass('disabledClass');
            // $("#btnSubmit").text('Logging in..');

            var dataFields = [];
            dataFields.push({"name": "id", "value": $('#idid').val()});
            dataFields.push({"name": "code", "value": $('#codecode').val()});
            dataFields.push({"name": "repassword", "value": $('#repassword').val()});
            dataFields.push({"name": "password", "value": $('#password').val()});
            dataFields.push({"name":"action","value":"Reset"});
            $.ajax({
                type:"POST",
                url:"controller/AccountsController.php",
                data: dataFields,
                success: function(data) {
                  if (jQuery.trim(data) == 'reset'){
                    $("#confirm").text("Password Changed");
                    $('#resetForm')[0].reset();
                  
                    // window.location.href = "index";
                  }
                  console.log(data);          
                    $("#loadthis").removeClass('loader-show');
                    $(".btnL").prop("disabled", true).removeClass('disabledClass');
                }
             });
        }
    });
});