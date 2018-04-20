function notification(from_id, to_id, type){
	var from_id = from_id;
    var to_id = to_id;
    var dataFields = [];
	dataFields.push({"name":"to_id","value": to_id});
	dataFields.push({"name":"from_id","value": from_id});
	dataFields.push({"name":"type","value": type});
	dataFields.push({"name":"action","value": "Notification" });
 	$.ajax({
		type:"POST",
		url:"../../biz/controller/NotificationController.php",
		data: dataFields,
		success: function(data) {
			json = jQuery.trim(data);
 			console.log(json);
 			// if (type == 3) {
 			// 	if (json == 'exist') {
 			// 		notify('info-notify','You have pending invitation');
 			// 	}else if( json == 'true')
 			// 		notify('success-notify','Invitation sent');
 			// 	else notify('error-notify','error');
 			// }
	
		}
	});
}