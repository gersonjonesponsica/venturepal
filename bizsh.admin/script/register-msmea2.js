
$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != element.value; 
}, "This field is required");

var dataForm2 = [];
var b_photo = null;
var city_name = 'asdf';

$('#entrepsearch').keyup( function(){
	var searchText = $('#entrepsearch').val();
	var data = [];
	data.push({"name": "keyword" , "value": searchText});
	data.push({"name": "action" , "value": "Search Entrep"});
	$.ajax({
		type: "POST",
		url: "controller/GlobalController.php",
		data: data,
			success: function(data){
			 	data = JSON.parse(jQuery.trim(data));
			 	if (searchText != "") {
			 		searchEntrep(data);
			 	}else{
			 		$('#searchEntrepList tbody').html(tableDatas);
			 	}
			}
	});
});
var tableDatas = '';
function searchEntrep(data){
	for(i in data){
	    a = data[i];
	    if (a.length != 0) {
	    	tableDatas += '<tr id="'+a['e_id']+'" onclick="haha(this)">';
    		fullname = a['e_lname'] +', ' + a['e_fname']+' ' + a['e_mname']+ '.';
	    	tableDatas += '<td><img height="50px" class="border-r-50" width="50px" src="Entrep/'+a['e_photo']+'"/></td>'
	    	tableDatas += '<td>'+fullname+'</td>';
	    	tableDatas += '<td><a href=""><i class="fa fa-close"></i></a></td>';
			tableDatas += '</tr>';
	    }
	}
	$('#searchEntrepList tbody').html(tableDatas);
    tableDatas = '';
}
function haha(element){
	var entrep_id = $(element).attr('id');
	$('#entrepsearch').val(entrep_id);
	$('#searchForm').attr('hidden',true);
	$('#msme_portfolio').removeAttr('hidden');
}


function getAddress(){
	var city = [];
	city.push({"name": "action" , "value": "Get address"});
	city.push({"name": "city_id" , "value": $('#city').val()});
	city.push({"name": "prob_id" , "value": $('#province').val()});
	$.ajax({
	type: "POST",
	url: "controller/GlobalController.php",
	data: city,
		success: function(data){
			data = JSON.parse(jQuery.trim(data));
			// console.log(data);
			$('#search_location').val($('#barangay').val() +', '+ data[1]+", " + data[0]+", Philippines 6000");
		}
	});
}


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
		  // console.log(data);
		  data = JSON.parse(jQuery.trim(data));
		  province += '<option value="0">City</option>';
		  for(i in data){
		    a = data[i];
		    city += '<option value="'+a.city_id+'" data-file-index="'+i+'">';
		    city += '   '+a.city_name+'';
		    city += '</option>';
		  }
		  $('#city').removeAttr('disabled');
		  $('#city').html(city);
		  getAddress();
		}
	});
}

$(function(){
	  var datafields = [];
	  bodyDatas = '';
	  datafields.push({"name": "action" , "value": "Get All Subcategory"});
	  $.ajax({
	    type: "POST",
	    url: "controller/SubcategoryController.php",
	    data: datafields,
	    success: function(data){
	      //console.log(data);
	      data = JSON.parse(jQuery.trim(data));
	      bodyDatas += '<option value="0">Category</option>';
	      for(i in data){
	        a = data[i];
	        bodyDatas += '<option  value="'+a.sub_id+'"data-file-index="'+i+'">';
	        bodyDatas += '   '+a.sub_name+'';
	        bodyDatas += '</option>';
	      }
	      $('#categories').html(bodyDatas);
	    }
	  });

	  var dataprovince = [];
	  province = '';
	  dataprovince.push({"name": "action" , "value": "Get all province"});
	  $.ajax({
	    type: "POST",
	    url: "controller/GlobalController.php",
	    data: dataprovince,
	    success: function(data){
	      //console.log(data);
	      data = JSON.parse(jQuery.trim(data));
	      province += '<option value="0">Province</option>';
	      for(i in data){
	        a = data[i];
	        province += '<option value="'+a.province_id+'"data-file-index="'+i+'">';
	        province += '   '+a.province_name+'';
	        province += '</option>';
	      }
	      $('#province').html(province);
	    }
	  });

 	$('.business_permit').on('click', function(){
		$('#biz_permit').click();
	});
	$('#biz_permit').on('change', function(){
		a = $(this)[0].files;
		if(a.length != 0){
			dataAll.push(a);
			dataAll.push({"biz_permit": a});
			console.log(dataAll);
			$('.business_permit').html(a[0].name);
			if (a[0].type == 'application/pdf') {
				$('#uploaded_file_business').html('<img width="100" height="100" src="./images/PDFLogo.png"/>');
			}else $('#uploaded_file_business').html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>');
			 console.log(a[0].type);
		}
	});
	$( "#bizPermit" ).submit(function( event ) {
	    data = new FormData(this);
	    var dataFields = [];
	    var msme_id = $("#msme_id").val();
	    var searchText = $('#entrepsearch').val();
	    data.append("action",'Upload MSME business permit');
	    data.append("msme_id", msme_id);
	    data.append("entrep_id", searchText);
	    $.ajax({
			url: 'controller/MSMEController.php',
			type: 'POST',
			data: data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data){
				alert(jQuery.trim(data));
			}
		});
		 event.preventDefault();
	});

	$('.mayors_permit').on('click', function(){
		$('#may_permit').click();
	});
	$('#may_permit').on('change', function(){
		a = $(this)[0].files;
		if(a.length != 0){
			$('.mayors_permit').html(a[0].name);
			if (a[0].type == 'application/pdf') {
				$('#uploaded_file_mayors').html('<img width="100" height="100" src="./images/PDFLogo.png"/>');
			}else $('#uploaded_file_mayors').html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>');
			 console.log(a[0].type);
		}
	});
	$( "#mayPermit" ).submit(function( event ) {
	    data = new FormData(this);
	    var dataFields = [];
	    var msme_id = $("#msme_id").val();
	    var searchText = $('#entrepsearch').val();
	    data.append("action",'Upload MSME mayor permit');
	    data.append("msme_id", msme_id);
	    data.append("entrep_id", searchText);
	    $.ajax({
			url: 'controller/MSMEController.php',
			type: 'POST',
			data: data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data){
				alert(jQuery.trim(data));
			}
		});
		 event.preventDefault();
	});
	$('.dti_permit').on('click', function(){
		$('#d_permit').click();
	});
	$('#d_permit').on('change', function(){
		a = $(this)[0].files;
		if(a.length != 0){
			$('.dti_permit').html(a[0].name);
			if (a[0].type == 'application/pdf') {
				$('#uploaded_file_dti').html('<img width="100" height="100" src="./images/PDFLogo.png"/>');
			}else $('#uploaded_file_dti').html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>');
			 console.log(a[0].type);
		}
		console.log(dataForm2);
	});
	$( "#dPermit" ).submit(function( event ) {
	    data = new FormData(this);
	    var dataFields = [];
	    var msme_id = $("#msme_id").val();
	    var searchText = $('#entrepsearch').val();
	    data.append("action",'Upload MSME DTI');
	    data.append("msme_id", msme_id);
	    data.append("entrep_id", searchText);
	    $.ajax({
			url: 'controller/MSMEController.php',
			type: 'POST',
			data: data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data){
				alert(jQuery.trim(data));
			}
		});
		 event.preventDefault();
	});

	$('.b_photo').on('click', function(){
		$('#b_photo').click();
	});
	$('#b_photo').on('change', function(){
		a = $(this)[0].files;
		if(a.length != 0){
			$('.b_photo').html(a[0].name);
			if (a[0].type == 'application/pdf') {
				alert('error type of file');
			}else $('#uploaded_file_b_photo').html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>');
			 console.log(a[0].type);

		}
	});
	$("#save_story").click(function(){
    	nextScrollen("aboutyou");
    });
	$("#save_document").click(function(){
    	nextScrollen("preview");
    });
    $("#submitAll").click(function(){
    	$("#storyForm").submit();
    	$( "#bizPermit" ).submit();
    	$( "#mayPermit" ).submit();
    	$( "#dPermit" ).submit();
    	$( "#bPhoto" ).submit();
	    $( "#bGallery" ).submit();
    });
	$( "#bPhoto" ).submit(function( event ) {
	    data = new FormData(this);
	    var dataFields = [];
	    var msme_id = $("#msme_id").val();
	    var searchText = $('#entrepsearch').val();
	    data.append("action",'Upload MSME Photo');
	    data.append("msme_id", msme_id);
	    data.append("entrep_id", searchText);
	    $.ajax({
			url: 'controller/MSMEController.php',
			type: 'POST',
			data: data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data){
				alert(jQuery.trim(data));
			}
		});
		 event.preventDefault();
	});
	$('.b_gallery').on('click', function(){
		$('#b_gallery').click();
	});
	$('#b_gallery').on('change', function(){
		a = $(this)[0].files;
		if(a.length != 0){
			$('.b_gallery').html(a.length+" file/s");
			if (a[0].type == 'application/pdf') {
				alert('error type of file');
			}  //else $('#uploaded_file_b_photo').html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>');
			 console.log(a[0].type);
		}
	});
	$( "#bGallery" ).submit(function( event ) {
	    data = new FormData(this);
	    var dataFields = [];
	    var msme_id = $("#msme_id").val();
	    var searchText = $('#entrepsearch').val();
	    data.append("action",'Upload MSME Gallery');
	    data.append("msme_id", msme_id);
	    data.append("entrep_id", searchText);
	    $.ajax({
			url: 'controller/MSMEController.php',
			type: 'POST',
			data: data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data){
				alert(jQuery.trim(data));
			}
		});
		 event.preventDefault();
	});	
	$('.b_documents').on('click', function(){
		$('#b_documents').click();
	});
	$('#b_documents').on('change', function(){
		a = $(this)[0].files;		
		if(a.length != 0){
			$('.b_documents').html(a.length+" file/s");
			// $('#uploaded_file_b_documents').html('');
			var file = '';
		    for(i in a){
				b = a[i];
				console.log(b);
				if (b.type == "image/png" || b.type == 'image/jpg' 
		        	|| b.type == 'image/jpeg' || b.type == 'image/gif') {
					file += '<img width="40" height="40" class="m-r-5" src="'+window.URL.createObjectURL(b)+'"/>';
				}else if(b.type == "application/pdf")
					file += '<img width="40" height="40" class="m-r-5" src="./images/PDFLogo.png"/>';
				}	
		    $('#uploaded_file_b_documents').html(file);
		    file = '';
			// console.log(a[0].type);
		}
	});

    $("#basicForm").validate({
        rules: {
        	badge :{valueNotEquals: "0"},
            categories :{valueNotEquals: "0"},
            barangay : "required", 
            province :{valueNotEquals: "0"},
            city :{valueNotEquals: "0"},
            establishdate : "required", 
            capneeded : "required",
            bname : "required",
            profit : "required",
            worth : "required",
            gross:  "required",
            website: {url: true},
        },
        submitHandler: function(form) {
            dataForm2.push({"name":"action","value":"Add Temporary MSMEa"});
            dataForm2.push({"name":"msme_id","value": $('#msme_id').val()});
            dataForm2.push({"name":"e_id","value": $('#entrepsearch').val()});
            if ($('#entrepsearch').val() != '') {
            	if ((!$('#lat').val()) || (!$('#long').val())) {
	            	$('#myModal').modal({show:true});
	            	getAddress();
            	}else{
            		$.ajax({
		                type:"POST",
		                url:"controller/MSMEController.php",
		                data: dataForm2, 
		                success: function(data) {
		                  console.log(data);
		                  $( "#msme_id" ).val(jQuery.trim(data));
		                  nextScrollen('story');
		                }
	            	});
            	}
            }else{
	        	alert('please select entrep');
	        }
        }
    });
         	     


    $("#storyForm").validate({
        rules: {
            b_video : {url: true}, 
            b_desc : "required", 
            g_desc : "required",
        },
        submitHandler: function(form) {
        	dataForm2 = $("form").serializeArray();
        	dataForm2.push({"name":"msme_id","value": $('#msme_id').val()});
            dataForm2.push({"name":"action","value":"Update"});
        	$.ajax({
                type:"POST",
                url:"controller/MSMEController.php",
                data: dataForm2, 
                success: function(data) {
                  console.log(data);
                  $( "#msme_id" ).val(jQuery.trim(data));
                  nextScrollen('story');
                }
        	});
        }
    });
});

// $("#storyForm").submit(function(form){
// 	dataForm2 = $("form").serializeArray();
//     dataForm2.push({"name":"action","value":"Update"});
//     console.log(dataForm2);
// 	$.ajax({
//         type:"POST",
//         url:"controller/MSMEController.php",
//         data: dataForm2, 
//         success: function(data) {
//           console.log(data);
//         }
// 	});
// });