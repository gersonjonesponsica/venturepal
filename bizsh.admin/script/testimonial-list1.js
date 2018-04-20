var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	testiTable();
	$(".clickrow").click(function() {
        window.location = $(this).data("href")+"?id="+$(this).data("id");
    });
});


function testiTable(){
	$("#testiList").DataTable({
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
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, " + text,
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	}).then(function () {
		var stat = $(element).attr('data-stat');
	  	var data = [];

        data.push({"name":"testi_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/TestimonialController.php',
            data,
            function(info) {
                console.log(jQuery.trim(info))
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#testiList_handler").load(pageLocation +' #testiList', function(){
						 testiTable();
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}
