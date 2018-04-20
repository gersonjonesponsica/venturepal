$(function () {
 
    $("#loadthis").addClass('loader-show');
    var cat_id = $("#cat_id").val();
    var data = [];
    data.push({"name":"action","value":"Get Category By ID"});
    data.push({"name":"cat_id","value":cat_id});
    $.post(
        'controller/CategoryController.php',
        data,
        function(info) {
            showFeature(jQuery.trim(info));
            $("#loadthis").removeClass('loader-show');
        }
    );
   var form = $(".edit-question-form");
    $("#editCategoryForm").validate({
        rules: {
            cat_name: "required"
        },
        submitHandler: function(form) {
            $("#loadthis").addClass('loader-show');
            var cat_name = $("#cat_name").val();
            var cat_id = $("#cat_id").val();
            var data = [];
            data.push({"name":"cat_name","value":cat_name});
            data.push({"name":"cat_id","value":cat_id});
            data.push({"name":"action","value":"Edit Category"});
            $.ajax({
                type:"POST",
                url:"controller/CategoryController.php",
                data: data,
                success: function(data) {
                    if(jQuery.trim(data) == "true"){
                        swal(
                          'Good job!',
                          'Question Added',
                          'success'
                        );
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
    })
});

function showFeature(cat) {

    var cat_info = JSON.parse(cat);
    console.log(cat_info);
    $("#cat_name").val(cat_info[1]);
}