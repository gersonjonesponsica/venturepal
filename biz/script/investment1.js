function investment(msme_id, v_id, amount){
	var msme_id = msme_id;
    var v_id = v_id;
    var amount = amount;
    var dataFields = [];
	dataFields.push({"name":"msme_id","value": msme_id});
	dataFields.push({"name":"v_id","value": v_id});
	dataFields.push({"name":"amount","value": amount});
	dataFields.push({"name":"action","value": "add investment" });
 	$.ajax({
		type:"POST",
		url:"controller/MsmeVenturerController.php",
		data: dataFields,
		success: function(data) {
		 
			// json = JSON.parse(jQuery.trim(data));
 			console.log(jQuery.trim(data));
		  // checkInvestorContract();
		  // $("#loadthis").removeClass('loader-show');
		}
	});
}