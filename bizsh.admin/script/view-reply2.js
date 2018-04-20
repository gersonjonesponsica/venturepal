$(function() {
	$("#loadthis").addClass('loader-show');
			CKEDITOR.replace('emailreply', {           
			extraPlugins: 'htmlwriter',
	        toolbarLocation: 'bottom',
	        height: 200,
	        width: '100%',
	        toolbar: [
	            ['Bold', 'Italic', 'Underline', '-', 'BulletedList', '-', 'Link', 'Unlink'],
	            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
	            ['TextColor'],['Styles','Format'],['Source']

	        ]
    	});
	$('#message_id').val();
	var data = [];
	data.push({"name": "message_id", "value":$('#message_id').val()});
	data.push({"name": "action", "value":"Get message by id"});
	$.ajax({
		type: "POST",
		url: "controller/MessageController.php",
		data: data,
		success: function(data){
			json = JSON.parse(jQuery.trim(data));
			// console.log(json);
			var data2 = [];
			if(json['type'] == 1){
				data2.push({"name": "from_id", "value":json['from_id']});
				data2.push({"name": "action", "value":"Get sender details by account id and type"});
				$.ajax({
					type: "POST",
					url: "controller/MessageController.php",
					data: data2,
					success: function(data){
					 	sender = JSON.parse(jQuery.trim(data));
					 	console.log(sender);
						$('#from').html(sender[2]+' '+(sender[3] != undefined ?sender[3]+"." :"" )+' '+sender[1]);
						$('#message_date').html(json['message_date']);
						$('#message_time').html(json['message_time']);
						$('#subject').html(json['subject']);
						$('#message').html(json['message']);
						$('#to_email').html(sender[4]);
					}
				});
			}else{
				console.log('account not log in');
			}
			$('#from').val(json['name']);
			$('#message_date').html(json['message_date']);
			$('#message_time').html(json['message_time']);
			$('#subject').html(json['subject']);
			$('#message').html(json['message']);
			$('#to_email').html(json['email']);
			$("#loadthis").removeClass('loader-show');
		}
	});

    $("#replyMessage").validate({
        rules: {
            emailreply: "required"
        },
        submitHandler: function(form) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $("#loadthis").addClass('loader-show');
            var datafields = [];
            datafields.push({"name":"to", "value": $('#to_email').html()});
            datafields.push({"name":"message", "value": $('#emailreply').val()});
            datafields.push({"name":"subject", "value": $('#subject').html()});
            datafields.push({"name":"action", "value": "Reply message"});

            $.ajax({
                type:"POST",
                url:"controller/MessageController.php",
                data: datafields,
                success: function(data) {
                    if (jQuery.trim(data) == "sent") {
                    	swal({
		                  title: "Send Successfully",
		                  type: "success",
		                  timer: 2000,
		                  showConfirmButton: true
		                });
                    }
                    $("#loadthis").removeClass('loader-show');
                }
            });
        }
    })
});

