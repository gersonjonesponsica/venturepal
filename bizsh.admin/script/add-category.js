$(function(){
   var form = $(".add-category-form");

    $("#addCategoryForm").validate({
        rules: {
            cat_name : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var cat_name = $("#cat_name").val();
            
            var dataFields = [];
            dataFields.push({"name":"cat_name","value": cat_name});
            dataFields.push({"name":"action","value":"Add-Category"});
            $.ajax({
                type:"POST",
                url:"controller/CategoryController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'good'){
                   swal({
                   	title: 'Category Updated',
                   	type: 'success',
                   	timer: 2000
                   });
                   $("#addCategoryForm")[0].reset();  
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