var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	applicationTable();
});
// 
function showApplicationModal(element){
	$('#reviewMod').html('<div id="loader-div" ><li style="list-style-type:none" class="center-text" id="loading"><i class="ion-load-c"></i> </li></div>');
	var id = $(element).attr('id');
    $('#applicationModal').modal({show: true});
    var dataFields = [];
    dataFields.push({"name":"contract_id","value": id});
    dataFields.push({"name":"action","value":"Review Contract"});
    var datas = '';
    $.ajax({
        type:"POST",
        url:"controller/ApplicationController.php",
        data: dataFields,
        success: function(data) {
        	 // console.log(data);
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            datas += '<div class="modal-header">';
            datas += '<h1 class="title text-center">Investment Application</h1>';
            datas += '</div>';
            datas += '<div class="modal-body">';
            datas += '<div class="container m-t-10 m-b-10">';
            datas += '<div class="row">';
            datas += '<div class="col-lg-3 img-center-in-div">';
            datas += '<img  src="./Investor/'+json['investor_photo']+'" class="img-circle2 b-4-color">';
            datas += '<p class="text-center">'+json['investorname']+'</p>';
            datas += '<p class="text-center"><strong>INVESTMENT AMOUNT</strong> </br>'+(json['contract_amount'] != undefined ? numberWithCommas(json['contract_amount'])+' PHP' : json['contract_amount'])+'</p>';
            datas += '</div>';
            datas += '<div class="col-lg-6">';
            datas += '<div class="row">';
            datas += '<div class="col-lg-6 img-center-in-div">';
            if (json['contract_file'].includes("pdf")) {
                datas += '<a class="dmbutton a2" style="display: inline-block;" data-rel="prettyPhoto" href="./Contract/'+json['contract_file']+'" target="_blank" data-animate="fadeInUp"><object style="pointer-events: none;" data="./Contract/'+json['contract_file']+'" src= "./Contract/'+json['contract_file']+'" width= "100%" height= "280px"></object></a>';
            }else{
                datas += '<a target="_blank" data-rel="prettyPhoto" href="./Contract/'+json['contract_file']+'"  data-animate="fadeInUp"><img class="dmbutton a2" src="./Contract/'+json['contract_file']+'" width="100%" height="300px"></a>';
            }
            
            datas += '<p class="text-align">Contract</p>';
            datas += '</div>';
            datas += '<div class="col-lg-6 img-center-in-div">';
            if (json['proof_invesment'].includes("pdf")) {
                datas += '<a class="dmbutton a2" style="display: inline-block;" data-rel="prettyPhoto" href="./Contract/'+json['proof_invesment']+'" target="_blank" data-animate="fadeInUp"><object style="pointer-events: none;" data="./Contract/'+json['proof_invesment']+'" src= "./Contract/'+json['proof_invesment']+'" width= "100%" height= "270px"></object></a>';
            }else{
                datas += '<a target="_blank" data-rel="prettyPhoto" href="./Contract/'+json['proof_invesment']+'"  data-animate="fadeInUp"><img class="dmbutton a2" src="./Contract/'+json['proof_invesment']+'" width="100%" height="300px"></a>';
            }
            // datas += '<a target="_blank" data-rel="prettyPhoto" href="./Contract/'+json['proof_invesment']+'"  data-animate="fadeInUp"><img class="dmbutton a2" src="./Contract/'+json['proof_invesment']+'" width="100%" height="300px"></a>';
            datas += '<p class="text-align">Proof of Investment</p>';
            datas += '</div>';
            datas += '</div>';
            datas += '</div>';
            datas += '<div class="col-lg-3 img-center-in-div">';
            datas += '<img src="./Entrep/'+json['msme_logo']+'" class="img-circle2 b-4-color">';
            datas += '<p class="text-center">'+json['msme_name']+'</p>';
            datas += '<p class="text-center"><strong>TARGET CAPITAL </strong> </br>'+(json['neededCapital'] != undefined ? numberWithCommas(json['neededCapital'])+' PHP' : json['neededCapital'])+'</p>';
            datas += '</div>';
            datas += '</div>';
            datas += '</div>';
            datas += '</div>';
            datas += '<div class="modal-footer">';
            datas += '<a type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </a>';
            // console.log(json['status'])
            if (json['status'] == 2) {
                datas += '<a type="button" class="btn btn-default pull-right" href="javascript:;" onclick="changeStatus(this)" data-id="'+json['contract_amount']+'" msme_id="'+json['msme_id']+'" v_id="'+json['v_id']+'"id="'+json['contract_id']+'" data-stat="1">Accept Investment </a>';               
                datas += '<a type="button" class="btn btn-danger pull-right" href="javascript:;" onclick="changeStatus(this)" id="'+json['contract_id']+'" data-stat="3">Decline Investment </a>';
            }
            if (json['status'] == 1 ) {
                datas += '<a type="button" class="btn btn-danger pull-right" href="javascript:;" onclick="changeStatus(this)" data-id="'+json['contract_amount']+'" msme_id="'+json['msme_id']+'" v_id="'+json['v_id']+'"id="'+json['contract_id']+'" data-stat="1">Cancel Investment </a>';               
            }
            // else
                // datas += '<a type="button" class="btn btn-danger pull-right" href="javascript:;" onclick="changeStatus(this)" id="'+json['contract_id']+'" data-stat="3">Decline Investment </a>';

            datas += '</div>';

            setTimeout(function (){
                $('#reviewMod').html(datas);
            }, 500);
        }
    });
} 
            
            
                 
                 
                 
            
$('#type').bind('change', function(){
	var type = $(this).val();
	window.location.href = 'application?type='+type;
});

// function changeType(element){
	
// }
function applicationTable(){
	$("#applicationList2").DataTable({
        "iDisplayLength": 15,
        "aaSorting": [[0,'desc']]
    });
}

function deleteThis(element) {
    var id = $(element).attr('id');
	swal({
	  title: "Are you sure you want to delete this?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm) {
	  if (isConfirm) {
	  	// var data = [];
    //     data.push({"name":"admin_id","value":id});
    //     data.push({"name":"action","value":"Delete Admin"});
   	// 	$.post(
    //         'controller/AdminController.php',
    //         data,
    //         function(info) {
    //         	if(jQuery.trim(info) == 'true'){
    //         		swal("Successfully Deleted", "Your imaginary file has been deleted.", "success");
    //         		$("#adminList_handler").load(pageLocation +' #adminList', function(){
				// 		adminTable();
		  //       	});
    //         	}else{
    //         		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
    //         	}
    //         }
    //     );
	   
	  } else {
	    swal("Cancelled", "Your imaginary file is safe :)", "error");
	  }
	});
}


function changeStatus(element) {    
    var id = $(element).attr('id');
    var text = $(element).html();
	var msme_id = $(element).attr('msme_id');
    var amount = $(element).attr('data-id');
    var v_id = $(element).attr('v_id');
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

        data.push({"name":"contract_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/ApplicationController.php',
            data,
            function(info) {
            	// console.log(info)
            	if(jQuery.trim(info) == 'true'){
            		
            		investment(msme_id, v_id, amount);
                    // alert(msme_id)
                    // alert(v_id)
                    // notification(v_id, msme_id, 5);
                    // notification(msme_id, v_id, 4);
                    
            		$("#applicationList_handler").load(pageLocation +' #applicationList2', function(){
						applicationTable();
		        	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}

function updateInvestorWallet(amount, v_id){
    var data = [];

    data.push({"name":"v_id","value":v_id});
    data.push({"name":"amount","value":amount});
    data.push({"name":"action","value":"Update Investor Wallet"});
    $.post(
        'controller/InvestorController.php',
        data,
        function(info) {
             console.log(info)
             swal("Investment ", "success");
        }
    );
}