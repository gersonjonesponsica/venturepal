$(function(){

   var form = $(".add-subcategory-form");

    $("#addSubcategoryForm").validate({
        rules: {
            sub_name : "required",
            category : "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var sub_name = $("#sub_name").val();
            var category = $("#category").val();
            var icon_id = $("#icon").val();
            
            var dataFields = [];
            dataFields.push({"name":"icon_id","value": icon_id});
            dataFields.push({"name":"sub_name","value": sub_name});
            dataFields.push({"name":"category","value": category});
            dataFields.push({"name":"action","value":"Add-Subcategory"});
            $.ajax({
                type:"POST",
                url:"controller/SubcategoryController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'good'){
                   swal({
                   	title: 'Subcategory Updated',
                   	type: 'success',
                   	timer: 2000
                   });
                   $("#addSubcategoryForm")[0].reset();  
                  }else{
                    swal(
                      'Oops...',
                      'Something went wrong!',
                      'error'
                    );
                  }
                  $("#loadthis").removeClass('loader-show');
                  $('#img-icon').attr('src', 'img/default.png');
                }
             });
        }
    });
});