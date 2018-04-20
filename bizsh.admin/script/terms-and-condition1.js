$(function(){
	$("#loadthis").addClass('loader-show');
		CKEDITOR.replace('terms', {           
		extraPlugins: 'htmlwriter',
        toolbarLocation: 'top',
        height: 1000,
        width: '100%',
        toolbar: [
            ['Bold', 'Italic', 'Underline', '-', 'BulletedList', '-', 'Link', 'Unlink'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['TextColor'],['Styles','Format'],['Source']

        ]
	});

	var form = $(".terms-form");
    $("#TermsForm").validate({
        rules: {
            terms : "required" 
        },
        submitHandler: function(form) {
        	for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $("#loadthis").addClass('loader-show');
            var terms = $("#terms").val();
            var type = $('#type').val();
            var dataFields = [];
            dataFields.push({"name":"terms","value": terms});
            dataFields.push({"name":"type","value": type});
            dataFields.push({"name":"action","value":"Add Terms"});
            $.ajax({
                type:"POST",
                url:"controller/TermsController.php",
                data: dataFields,
                success: function(data) {
                	console.log(data);
                  if(jQuery.trim(data) == 'true'){
                   swal(
                      'Good job!',
                      'Terms Added Successfully',
                      'success'
                    );
                   // $("#addQuestionForm")[0].reset();  
                  }else if (jQuery.trim(data) == 'trues'){
                    swal(
                      'Good job!',
                      'Terms Updated Successfully',
                      'success'
                    );
                  }else{
                  	swal(
                      'Eng.. Eng..',
                      'Something went wrong ',
                      'error'
                    )
                  }
                  $("#loadthis").removeClass('loader-show');
                }
             });
        }
    });
    terms2();
});

$('#type').on('change', function(){
  terms2();
});
function terms2(){

  var dataFields = [];
  var type = $('#type').val();
    dataFields.push({"name":"terms","value": terms});
    dataFields.push({"name":"type","value": type});
    dataFields.push({"name":"action","value":"Get Terms"});
    console.log(dataFields)
    $.ajax({
        type:"POST",
        url:"controller/TermsController.php",
        data: dataFields,
        success: function(data) {
          console.log(data);
          var json = JSON.parse(jQuery.trim(data));
          // console.log(data);
          if (json == false) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            CKEDITOR.instances[instance].setData('No Terms for this type');
            // $('#terms').val('No Terms for this type');
          }else{
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            CKEDITOR.instances[instance].setData(json['terms']);
          }
          $("#loadthis").removeClass('loader-show');
        }
     });
}
