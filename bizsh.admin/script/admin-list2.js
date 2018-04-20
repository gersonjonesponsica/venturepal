var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	adminTable();
});

function adminTable(){
	$("#adminList").DataTable({
        "iDisplayLength": 15,
        "aaSorting": [[0,'desc']]
    });
}

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
	},
	function(isConfirm) {
	  if (isConfirm) {
	  	var data = [];
        data.push({"name":"admin_id","value":id});
        data.push({"name":"action","value":"Delete Admin"});
   		$.post(
            'controller/AdminController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Deleted", "Your imaginary file has been deleted.", "success");
            		$("#adminList_handler").load(pageLocation +' #adminList', function(){
						adminTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	   
	  } else {
	    swal("Cancelled", "Your imaginary file is safe :)", "error");
	  }
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

        data.push({"name":"admin_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/AdminController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#adminList_handler").load(pageLocation +' #adminList', function(){
						adminTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}