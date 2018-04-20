var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	
	questionTable();
});

function deleteThis(element) {
    var id = $(element).attr('id');
	swal({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  // confirmButtonColor: '#3085d6',
	  // cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!',
	  cancelButtonText: 'No, cancel!',
	  confirmButtonClass: 'btn btn-default',
	  cancelButtonClass: 'btn btn-danger',
	  buttonsStyling: false
	}).then(function () {
		var data = [];
        data.push({"name":"question_id","value":id});
        data.push({"name":"action","value":"Delete Question"});
   		$.post(
            'controller/QuestionController.php',
            data,
            function(info) {
            	//alert(jQuery.trim(info));
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Deleted", "Your imaginary file has been deleted.", "success");
            		$("#questionList_handler").load(pageLocation +' #questionList', function(){
						questionTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	
	}, function (dismiss) {
	  // dismiss can be 'cancel', 'overlay',
	  // 'close', and 'timer'
	  // if (dismiss === 'cancel') {
	  //   swal(
	  //     'Cancelled',
	  //     'Your imaginary file is safe :)',
	  //     'error'
	  //   )
	  // }
	})
	
}
function questionTable(){
	$("#questionList").DataTable({
        "iDisplayLength": 15,
        "aaSorting": [[0,'desc']]
    });
}

function changeStatus(element) {
    var id = $(element).attr('id');
    var text = $(element).html();
	
	swal({
	  title: "Are you sure you want to " + text +" this?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6', // edit the color of the ok button
	  confirmButtonText: "Yes, " + text,
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	}).then(function () {
		var stat = $(element).attr('data-stat');
	  	var data = [];

        data.push({"name":"question_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/QuestionController.php',
            data,
            function(info) {
            	// alert(jQuery.trim(info));
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#questionList_handler").load(pageLocation +' #questionList', function(){
						 questionTable();
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}
