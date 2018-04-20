var tableDatas;
var a,b,c,d;

$('#btn_upload').on('click', function(){
	$('#file_upload').click();
});

$('#file_upload').on('change', function(){
	$("#loadthis").addClass('loader-show');
	a = $(this)[0].files;
	if(a.length != 0){
		$('#icon_upload_list_handler').fadeIn().removeAttr('hidden');
		$("#loadthis").removeClass('loader-show');

		tableDatas = '';
		var size=0;
		console.log(a);
		for(i in a){
			b = a[i];
			if(typeof(b) == 'object'){
				tableDatas += '<tr data-file-index="'+i+'">';
				tableDatas += '    <td class=""><img style="margin 0px auto"  width="50" height="50" src="'+window.URL.createObjectURL(a[i])+'"/></td>';
		        tableDatas += '    <td class="">'+b.name+'</td>';
		        tableDatas += '    <td class="">'+fileSize(b.size)+'</td>';
		        size+=b.size;
		        if(b.type == "image/png" || b.type == 'image/jpg' 
		        	|| b.type == 'image/jpeg' || b.type == 'image/gif'){
		        	
		        tableDatas += '    <td class="" id="upload_stat" >Ready for upload</td>';
		        }else{
		        	tableDatas += '    <td class="">Not Image</td>';
		        }

		        tableDatas += '</tr>';
			}
		}
        tableDatas += '<tr class="">';
        tableDatas += '    <td class=""></td>';
        tableDatas += '    <td class="pull pull-right text-error">TOTAL FILE SIZE</td>';
		if(size > 8000000)
        	tableDatas += '    <td class="text-error">'+fileSize(size)+'</td>';
        else
        	tableDatas += '    <td class="text-error">'+fileSize(size)+'</td>';

        tableDatas += '    <td class="text-error"></td>';
        tableDatas += '</tr>';
		$("#icon_upload_list tbody").html(tableDatas);
	}
});

$('form[name=uploadIconForm]').on('submit', function(e){
	e.preventDefault();
	$('#btn-file').html("Uploading . . .");
	$('#icon_upload_list #upload_stat').html('<i class="fa fa-pulse fa-spinner fa-load-process"></i>');

    data = new FormData(this);
    data.append("action",'UploadIcon');
	$.ajax({
		url: 'controller/IconController.php',
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
				b = $("#icon_upload_list tbody tr[data-file-index='"+a.index+"']");
				if(b.length != 0){
					if(a.status == 'Success'){
						c++;
						$(b).find('#upload_stat').addClass('text-success');
						$(b).find('#upload_stat').html('<i class="fa fa-check fa-load-process"></i> Uploaded');
						$(b).find('#upload_stat').attr('title', 'File Upload Success');
					} else if(a.status == 'Size Limit'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times fa-load-process"></i> Exceeds Size Limit');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. File Size Limit is 2MB.');
					} else if(a.status == 'Duplicate'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times fa-load-process"></i> Duplicate file');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. Duplicate File.');
					} else if(a.status == 'Not PDF'){
						$(b).find('#upload_stat').addClass('text-orange');
						$(b).find('#upload_stat').html('<i class="fa fa-times fa-load-process"></i> Not PDF');
						$(b).find('#upload_stat').attr('title', 'File Upload Error. PDF Files Only.');
					}else{
						$(b).find('#upload_stat').addClass('text-red');
						$(b).find('#upload_stat').html('<i class="fa fa-times fa-load-process"></i>');
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

function handleImage(e){
    var reader = new FileReader();
    reader.onload = function(event){
        var img = new Image();
        img.onload = function(){
            document.body.appendChild(img);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);     
}

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




