var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);
var isClickFile = false;
$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != element.value; 
}, "This field is required");

$('#photoLayout').on('click',function(){
	$('#photos').click();
});
$('#photos').on('change',function(){
	a = $(this)[0].files;
	console.log(a[0]);
	if (a.length != 0) {
		$('#img-icon').remove();
		$('#photoLayout').html('<img id="img-icon" class="m-b-10 m-r-40p m-l-40p border-r-50" width="150" height="150" src="'+window.URL.createObjectURL(a[0])+'"/>');
		isClickFile = true;
	} 
});


$(function(){
	// getProvinces();
	getEntrep();
    $("#addEntrepForm").validate({
        rules: {
            lname : "required", 
            fname : "required",
            desc : "required",
            street : "required",
            barangay : "required",
            province :{valueNotEquals: "0"},
            city :{valueNotEquals: "0"},
            email : "required",
            fb : "required",
            mobile : "required",
            telephone : "required",
        },
        submitHandler: function(form) {
        	var dataFields = [];
    		dataFields = $("form").serializeArray();
    		var entrep_id = $("#entrep_id").val();
			dataFields.push({"name":"entrep_id","value":entrep_id});
			dataFields.push({"name":"action","value":"Update Entrep"});
            $.ajax({
                type:"POST",
                url:"controller/EntrepController.php",
                data: dataFields,
                success: function(data) {
                  if(jQuery.trim(data) == 'true'){
                   swal(
                      'Good job!',
                      'Question Updated',
                      'success'
                    );
                   if (isClickFile) {
                   	$("#photoForm").submit();
                   }
                  }else{
                    swal(
                      'Oops...',
                      'Something went wrong!',
                      'error'
                    );
                  }
                  $("#loadthis").removeClass('loader-show');
                }
             });
 
        }
    });
});

$( "#photoForm" ).submit(function( event ) {
    data = new FormData(this);
    $("#loadthis").addClass('loader-show');
         
    var dataFields = [];
    var entrep_id = $("#entrep_id").val();
    data.append("action",'Upload Entrep Photo');
    data.append("entrep_id", entrep_id);
    $.ajax({
		url: 'controller/EntrepController.php',
		type: 'POST',
		data: data,
		cache: false,
		processData: false, // Don't process the files
		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data){
			alert(jQuery.trim(data))
			if (jQuery.trim(data) == "upload") {

			}
		}
	});
	 event.preventDefault();
});
function changeCity(element){
	var datacity = [];
	city = '';
	datacity.push({"name": "action" , "value": "Get all city by province"});
	datacity.push({"name": "province_id" , "value": element.value});
	$.ajax({
	type: "POST",
	url: "controller/GlobalController.php",
	data: datacity,
		success: function(data){
		  console.log(data);
		  data = JSON.parse(jQuery.trim(data));
		  province += '<option value="0">City</option>';
		  for(i in data){
		    a = data[i];
		    city += '<option value="'+a.city_id+'"data-file-index="'+i+'">';
		    city += '   '+a.city_name+'';
		    city += '</option>';
		  }
		  $('#city').removeAttr('disabled');
		  $('#city').html(city);
		}
	});
}

function getProvinces(pro, city) {
	var dataprovince = [];
	console.log(pro[0]);
	province = '';
	dataprovince.push({"name": "action" , "value": "Get all province"});
	$.ajax({
	  type: "POST",
	  url: "controller/GlobalController.php",
	  data: dataprovince,
	  success: function(data){
	    //console.log(data);
	    data = JSON.parse(jQuery.trim(data));
	    province += '<option value="'+pro[0]['value']+'" >'+pro[0]['text']+'</option>';
	    for(i in data){
	      a = data[i];
	      if(pro[0]['value'] != a.province_id){
	      	province += '<option value="'+a.province_id+'"data-file-index="'+i+'">';
	      	province += '   '+a.province_name+'';
	      	province += '</option>';
	      }
	    }
	  //  console.log(province);
	    $('#province').html(province);
	  }
    });
}

function getEntrep(){
	$("#loadthis").addClass('loader-show');
    var acc_id = $("#acc_id").val();
    var data = [];
    data.push({"name":"action","value":"Get Entrep By ID"});
    data.push({"name":"acc_id","value":acc_id});
    $.post(
        'controller/EntrepController.php',
        data,
        function(info) {
        	data = JSON.parse(jQuery.trim(info));
        	console.log(info);
        	var scr1 = "./Entrep/"+data['e_photo'];
        	$('#img-icon').attr("src", scr1);
        	$('#entrep_id').val(data['e_id']);
        	$('#lname').val(data['e_lname']);
        	$('#fname').val(data['e_fname']);
        	$('#mname').val(data['e_mname']);
        	$('#desc').val(data['e_desc']);
        	$('#street').val(data['e_street']);
        	$('#barangay').val(data['e_brgy']);
        	if (data['e_state'] != null || data['e_state'] != undefined || data['e_state'] != '') {
         	 	$('#city').removeAttr('disabled');
				$("#city").prepend("<option value="+data['e_city']+" selected='selected'>"+data['city_name']+"</option>");
				$("#city")[0].options[0].selected = true;
				var pro = [], city = [];
				pro.push({"value" : data['e_state'] , "text": data['province_name']});
				city.push({"value" : data['e_city'] , "text": data['city_name']});
				getProvinces(pro, city);
        	 }
        	$('#email').val(data['e_email']);
        	$('#fb').val(data['e_fb']);
        	$('#mobile').val(data['e_cpnum']);
        	$('#telephone').val(data['e_telnum']);
            $("#loadthis").removeClass('loader-show');
        }
    );
}