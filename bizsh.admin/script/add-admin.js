$(function(){
  
  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
   };
  })();

function triger(){
    if($('#username').val() != '' && $('#username').val().length > 4){
    $("#loadthis").addClass('loader-show');
    delay(function(){

      var username = $("#username").val();
      var dataFields = [];
      dataFields.push({"name":"username","value":username});
      dataFields.push({"name":"action","value":"Check Username"});
        $.ajax({
          type:"POST",
          url:"controller/AdminController.php",
          data: dataFields,
          success: function(data) {
            console.log(data);
            if(jQuery.trim(data) == 'wala'){
              $('#basic').fadeIn().removeAttr('hidden');
              $('#edit-username').fadeIn().removeAttr('hidden');
              $('#username').prop('disabled', true);
            }else{
                swal({
                  title: "Username already exist",
                  type: "info",
                  timer: 3000,
                  showConfirmButton: true
                });
            }
              
            
            $("#loadthis").removeClass('loader-show');
          }
        });
    }, 2000 );
  }else{
    $('#basic').fadeIn().attr('hidden');
  }
}
  $('#username').keyup(function() {
      triger();

  });
  $("#username").change(function(){
    triger();
  });


   var form = $(".add-admin-form");

    $("#addAdminForm").validate({
        rules: {
            fname : "required", 
            lname : "required", 
            email : "required", 
            username : {required : true, minlength: 5},
            password : "required",
            repassword: { required: true, equalTo: "#password" }
      
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var username = $("#username").val();
            var password = $("#password").val();
            
            var dataFields = [];
            dataFields.push({"name":"fname","value":fname});
            dataFields.push({"name":"lname","value":lname});
            dataFields.push({"name":"email","value":email});
            dataFields.push({"name":"username","value":username});
            dataFields.push({"name":"password","value":password});

            dataFields.push({"name":"action","value":"Add Admin"});
            $.ajax({
                type:"POST",
                url:"controller/AdminController.php",
                data: dataFields,
                success: function(data) {
                  console.log(data);
                  if(jQuery.trim(data) == 'true'){
                   swal(
                      'Good job!',
                      'Question Updated',
                      'success'
                    );
                   $("#addAdminForm")[0].reset();  
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