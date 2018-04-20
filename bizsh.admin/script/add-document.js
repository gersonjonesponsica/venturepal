var tableDatas;
var a,b,c,d;

$('#btn_upload').on('click', function(){
	$('#file_upload').click();
});

$('#file_upload').on('change', function(){
	$("#loadthis").addClass('loader-show');
	a = $(this)[0].files;
	if(a.length != 0){
		$('#document_upload_list_handler').fadeIn().removeAttr('hidden');
		$("#loadthis").removeClass('loader-show');

		tableDatas = '';
		var size=0;

		for(i in a){
			b = a[i];
			if(typeof(b) == 'object'){
				tableDatas += '<tr data-file-index="'+i+'">';
		        tableDatas += '    <td class="">'+b.name+'</td>';
		        tableDatas += '    <td class="">'+fileSize(b.size)+'</td>';
		        size+=b.size;

		        if(b.type != 'application/pdf'){
		        	tableDatas += '    <td class="">Not PDF</td>';
		        }else{
		        	tableDatas += '    <td class="" id="upload_stat" >Ready for upload</td>';
		        }

		        tableDatas += '</tr>';
			}
		}
        tableDatas += '<tr class="">';
        tableDatas += '    <td class="pull pull-right text-error">TOTAL FILE SIZE</td>';
		if(size > 8000000)
        	tableDatas += '    <td class="text-error">'+fileSize(size)+'</td>';
        else
        	tableDatas += '    <td class="text-error">'+fileSize(size)+'</td>';

        tableDatas += '    <td class="text-error"></td>';
        tableDatas += '</tr>';
		$("#document_upload_list tbody").html(tableDatas);
	}
});



$('form[name=uploadDocumentForm]').on('submit', function(e){
	e.preventDefault();
	var admin_id = $('#admin_id').val();
	var admin_username = $('#admin_username').val();
	$('#btn-file').html("Uploading . . .");
	$('#document_upload_list #upload_stat').html('<i class="fa fa-pulse fa-spinner"></i>');

    data = new FormData(this);
    data.append("action",'UploadDocument');
    data.append("admin_id", admin_id +'');
	data.append("admin_username", admin_username +'');

	$.ajax({
		url: 'controller/DocumentController.php',
		type: 'POST',
		data: data,
		cache: false,
		processData: false, // Don't process the files
		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data){
			data = JSON.parse(jQuery.trim(data));
			c = 0;
			for(i in data){
				a = data[i];
				b = $("#document_upload_list tbody tr[data-file-index='"+a.index+"']");
				if(b.length != 0){
					if(a.status == 'Success'){
						c++;
						$(b).find('#upload_stat').addClass('text-success');
						$(b).find('#upload_stat').html('<i class="fa fa-check"></i> Uploaded');
						$(b).find('#upload_stat').attr('title', 'File Upload Success');
					} else if(a.status == 'Size Limit'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times"></i> Exceeds Size Limit');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. File Size Limit is 2MB.');
					} else if(a.status == 'File Exist'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times"></i> Duplicate file');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. Duplicate File.');
					} else if(a.status == 'Not PDF'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times"></i> Not PDF');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. PDF Files Only.');
					}else{
						$(b).find('#upload_stat').addClass('text-red');
						$(b).find('#upload_stat').html('<i class="fa fa-times"></i>');
						$(b).find('#upload_stat').attr('title', 'File Upload Error.');
					}
				}
			}
			if(c!=0){
				swal(c+" File/s Uploaded");
			}
		}
	});
});





function fileSize(size){
	var s1 = size * .000001;
	if(parseInt(s1) > 0){
		s1 = s1.toFixed(2);
		s1 = s1.toString();

		var display = '';
		if(s1.search('.') != -1) {
			display = s1.split('.')[1];
			s1 = s1.split('.')[0];
		}

		s1 = s1.replace(/\d(?=(?:\d{3})+$)/g, '$&,');
		if(display!='') s1 = s1+'.'+display;
		s1 = s1+' MB';
	} else{
		s1 = size * .001;
		s1 = s1.toFixed(2);
		s1 = s1.toString();

		var display = '';
		if(s1.search('.') != -1) {
			display = s1.split('.')[1];
			s1 = s1.split('.')[0];
		}

		s1 = s1.replace(/\d(?=(?:\d{3})+$)/g, '$&,');
		if(display!='') s1 = s1+'.'+display;
		s1 = s1+' KB';
	}

	return s1;
}
