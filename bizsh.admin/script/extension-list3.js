var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	extensionTable();
});
// alert('asd')
function extensionTable(){
	$("#extensionList").DataTable({
        "iDisplayLength": 15,
        "aaSorting": [[0,'desc']]
    });
}

function changeStatus(element) {
    var msme_id = $(element).attr('id');
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
        // data.push({"name":"extension_id","value":extension_id});
        data.push({"name":"msme_id","value":msme_id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});

        console.log(data)
   		$.post(
            'controller/ExtensionController.php',
            data,
            function(info) {
                // json = JSON.parse(jQuery.trim(info))
                // console.log(info)
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#extensionList_handler").load(pageLocation +' #extensionList', function(){
						 extensionTable();
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}
