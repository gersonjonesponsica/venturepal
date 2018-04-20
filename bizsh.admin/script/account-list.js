var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	accountTable();
	$(".clickrow").click(function() {
        window.location = $(this).data("href")+"?id="+$(this).data("id");
    });
});


function accountTable(){
	$("#accountList").DataTable({
		
        "iDisplayLength": 15,
        "aaSorting": [[0,'desc']],	
        
    });
}
// alert('asd')
function deleteThis(element) {
    var id = $(element).attr('id');
	swal({
	  title: "Are you sure you want to delete this?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	}).then(function () {
	  	var data = [];
        data.push({"name":"acc_id","value":id});
        data.push({"name":"action","value":"Delete account"});
   		$.post(
            'controller/AccountController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Deleted", "Your imaginary file has been deleted.", "success");
            		$("#accountList_handler").load(pageLocation +' #accountList', function(){
						accountTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}


function changeStatus(element) {
    var id = $(element).attr('id');
    var text = $(element).html();
	
	swal({
	  title: "Are you sure you want to " + text +" this?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, " + text,
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	}).then(function () {
		var stat = $(element).attr('data-stat');
	  	var data = [];

        data.push({"name":"acc_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/AccountController.php',
            data,
            function(info) {
            	// alert(info)
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#accountList_handler").load(pageLocation +' #accountList', function(){
						accountTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}