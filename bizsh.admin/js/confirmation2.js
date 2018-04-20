$(function(){
	var idid = $("#idid").val();
	var codecode = $("#codecode").val();

	if(idid && codecode){
		var dataFields = [];
		dataFields.push({"name": "idid", "value": idid });
		dataFields.push({"name": "codecode", "value": codecode });
		dataFields.push({"name":"action","value":"Confirm"});
		$.ajax({
	        type:"POST",
	        url:"controller/AccountsController.php",
	        data: dataFields,
	        success: function(data) {
	        	if(jQuery.trim(data) == 'confirm'){
	              window.location.href = "login";
	            }else
	            	alert('error in confirmation');
	        }
	     });
	}else{
		  window.location.href = "login";
	}
});