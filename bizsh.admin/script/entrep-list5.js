var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	entrepTable();
	$(".clickrow").click(function() {
        window.location = $(this).data("href")+"?id="+$(this).data("id");
    });
});

function viewStatistic(element){
    var id = $(element).attr('id');
    $('#entrepStatistic').modal({show: true});
    var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    width: 950,
    title: {
        text: "Entrepreneur Payment Statistics"
    },
    axisX: {
        valueFormatString: "MMM"
    },
    axisY: {
        prefix: "P",
        labelFormatter: addSymbols
    },
    toolTip: {
        shared: true
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [
    {
        type: "column",
        name: "Payment Amount",
        showInLegend: true,
        xValueFormatString: "MMMM YYYY",
        yValueFormatString: "$#,##0",
        dataPoints: [
            { x: new Date(2016, 0), y: 100 },
            { x: new Date(2016, 1), y: 200 },
            { x: new Date(2016, 2), y: 600 },
            { x: new Date(2016, 3), y: 700},
            { x: new Date(2016, 4), y: 600 },
            { x: new Date(2016, 5), y: 700 },
            { x: new Date(2016, 6), y: 900 },
            { x: new Date(2016, 7), y: 200 },
            { x: new Date(2016, 8), y: 600 },
            { x: new Date(2016, 9), y:  200},
            { x: new Date(2016, 10), y: 400 },
            { x: new Date(2016, 11), y: 600 }
        ]
    }, 
    {
        type: "line",
        name: "Expected Payment Amount",
        showInLegend: true,
        yValueFormatString: "$#,##0",
        dataPoints: [
            { x: new Date(2016, 0), y: 600 },
            { x: new Date(2016, 1), y: 600 },
            { x: new Date(2016, 2), y: 600 },
            { x: new Date(2016, 3), y: 600 },
            { x: new Date(2016, 4), y: 600 },
            { x: new Date(2016, 5), y: 600 },
            { x: new Date(2016, 6), y: 600 },
            { x: new Date(2016, 7), y: 600 },
            { x: new Date(2016, 8), y: 600 },
            { x: new Date(2016, 9), y: 600 },
            { x: new Date(2016, 10), y: 600 },
            { x: new Date(2016, 11), y: 600 }
        ]
    }]
});
chart.render();

function addSymbols(e) {
    var suffixes = ["", "K", "M", "B"];
    var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

    if(order > suffixes.length - 1)                 
        order = suffixes.length - 1;

    var suffix = suffixes[order];      
    return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    e.chart.render();
}

}
function viewEntrep(element){
    $('#loader-div').removeAttr('hidden');
    $('#entrepMod').html('');
    $('#icon').html('');
    var id = $(element).attr('id');
    $('#entrepModal').modal({show: true});
    var dataFields = [];

    dataFields.push({"name":"acc_id","value": id});
    dataFields.push({"name":"action","value":"Get Entrep By ID"});
    var datas = '';
    $.ajax({
        type:"POST",
        url:"controller/EntrepController.php",
        data: dataFields,
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            
            datas+='</div>'; 
            datas+='<h4 class="m-t-10">Profile Information</h4>';    
            datas+='<table class="table table-bordered m-t-10">';
            datas+='<tr>';
            datas+='<td>Fullname</td>';
            var fname = json['e_fname'] +' '+ (json['e_mname'] != undefined ? json['e_mname'].substring(0, 1)+'.' : "") +' '+ json['e1_lname'];
            datas+='<td>'+fname+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            // var address = json['investor_fname'] +' '+ (json['investor_mname'] != undefined ? json['investor_mname'].substring(0, 1)+'.' : "") +' '+ json['investor_lname'];
            var location = json['e_brgy'] +" "+ json['city_name']+", "+ json['province_name'];
            datas+='<td>Address</td>';
            datas+='<td>'+location+'</td>';
            datas+='</tr>';
            datas+='</table>';

            datas+='<h4 class="m-t-10">Contact Information</h4>';    
            datas+='<table class="table table-bordered m-t-10">';
            datas+='<tr>';
            datas+='<td>Phone no</td>';
            datas+='<td>'+json['e_cpnum']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Telephone no</td>';
            datas+='<td>'+json['e_telnum']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Email Address</td>';
            datas+='<td>'+json['acc_email']+'</td>';
            datas+='</tr>';
            datas+='<tr>';
            datas+='<td>Facebook Account</td>';
            datas+='<td>'+json['e_fb']+'</td>';
            datas+='</tr>';
            datas+='</table>';

            setTimeout(function (){
                $('#btn_close').removeAttr('hidden');
                $('#loader-div').attr('hidden', true);
                $('#icon').html('<img src="./Entrep/'+json['e_photo']+'" height="70" width="70" class="border-r-50 b">');
                $('#entrepMod').html(datas);
            }, 500);
        }
    });
}
function entrepTable(){
	$("#entrepList").DataTable({
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

        data.push({"name":"e_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/EntrepController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#entrepList_handler").load(pageLocation +' #entrepList', function(){
						 entrepTable();
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}
