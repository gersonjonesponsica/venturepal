var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	investorTable();
	$(".clickrow").click(function() {
        window.location = $(this).data("href")+"?id="+$(this).data("id");
    });
});

function viewInvestor(element){
    $('#loader-div').removeAttr('hidden');
    $('#investorMod').html('');
    $('#icon').html('');
    var id = $(element).attr('id');
    $('#investorModal').modal({show: true});
    var dataFields = [];

    dataFields.push({"name":"investor_id","value": id});
    dataFields.push({"name":"action","value":"Get Investor details"});
    var datas = '';
    $.ajax({
        type:"POST",
        url:"controller/InvestorController.php",
        data: dataFields,
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            
            datas+='<h4 class="m-t-10">Overview</h4>';   
             datas+='<div class="table-responsive">'; 
            datas+='<table class="table table-bordered m-t-10">';
            datas+='<tr>';
            datas+='<td>Minimum Investment</td>';
            datas+='<td>'+(json['min_investment'] != undefined ? numberWithCommas(json['min_investment'])+' PHP' : json['min_investment'])+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Maximum Investment</td>';
            datas+='<td>'+(json['max_investment'] != undefined ? numberWithCommas(json['max_investment'])+' PHP' : json['max_investment'])+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Wallet</td>';
            datas+='<td>'+(json['investor_wallet'] != undefined ? numberWithCommas(json['investor_wallet'])+' PHP' : json['investor_wallet'])+'</td>';
            datas+='</tr>';
            // datas+='<tr>';
            // datas+='<td>Interested In</td>';
            // datas+='<td>Ponsica, Gerson Jones L.</td>';
            // datas+='</tr>';
            datas+='</table>';
            datas+='</div>'; 
            datas+='<h4 class="m-t-10">Profile Information</h4>';    
            datas+='<table class="table table-bordered m-t-10">';
            datas+='<tr>';
            datas+='<td>Fullname</td>';
            var fname = json['investor_fname'] +' '+ (json['investor_mname'] != undefined ? json['investor_mname'].substring(0, 1)+'.' : "") +' '+ json['investor_lname'];
            datas+='<td>'+fname+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            // var address = json['investor_fname'] +' '+ (json['investor_mname'] != undefined ? json['investor_mname'].substring(0, 1)+'.' : "") +' '+ json['investor_lname'];
            var location = json['investor_street'] +" "+ json['city_name']+", "+ json['province_name'];
            datas+='<td>Address</td>';
            datas+='<td>'+location+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>About me</td>';
            datas+='<td>'+json['investor_desc']+'</td>';
            datas+='</tr>';
            // datas+='<tr>';
            // datas+='<td>Interested In</td>';
            // datas+='<td>Ponsica, Gerson Jones L.</td>';
            // datas+='</tr>';
            datas+='</table>';

            datas+='<h4 class="m-t-10">Contact Information</h4>';    
            datas+='<table class="table table-bordered m-t-10">';
            datas+='<tr>';
            datas+='<td>Phone no</td>';
            datas+='<td>'+json['investor_cpNum']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Telephone no</td>';
            datas+='<td>'+json['investor_telNum']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Email Address</td>';
            datas+='<td>'+json['acc_email']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Facebook Account</td>';
            datas+='<td>'+json['investor_fb']+'</td>';
            datas+='</tr>';
            datas+='</table>';

            setTimeout(function (){
                $('#btn_close').removeAttr('hidden');
                $('#loader-div').attr('hidden', true);
                $('#icon').html('<img src="./Investor/'+json['investor_photo']+'" height="70" width="70" class="border-r-50 border-r-50 b">');
                $('#investorMod').html(datas);
            }, 500);
        }
    });
}

function investorTable(){
	$("#investorList").DataTable({
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
        data.push({"name":"investor_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/InvestorController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#investorList_handler").load(pageLocation +' #investorList', function(){
						 investorTable();
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}
