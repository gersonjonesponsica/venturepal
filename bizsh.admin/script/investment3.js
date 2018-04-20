function investment(msme_id, v_id, amount){
	var msme_id = msme_id;
    var v_id = v_id;
    var amount = amount;
    var dataFields = [];
	dataFields.push({"name":"msme_id","value": msme_id});
	dataFields.push({"name":"v_id","value": v_id});
	dataFields.push({"name":"amount","value": amount});
	dataFields.push({"name":"action","value": "add investment" });
	console.log(dataFields)
 	$.ajax({
		type:"POST",
		url:"../../biz/controller/MsmeVenturerController.php",
		data: dataFields,
		success: function(data) {
 			console.log(jQuery.trim(data));
 			updateInvestorWallet(amount,v_id);
 			// alert(jQuery.trim(data))
		}
	});
}