var a,b;function partlyFunded(){var s=[];s.push({name:"action",value:"Get partly funded msme"}),$.ajax({type:"POST",url:"controller/MsmeController.php",data:s,success:function(s){var a=JSON.parse(jQuery.trim(s)),l="";for(i in a)l+='<div class="col-sm-4 col-lg-4 col-md-4">',l+='<div class="card hovercard3 h-550 m-b-30" >',l+='<div class="portfolio-item graphic-design ">',l+='<div class="he-wrap tpl6 ">',l+=' <img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">',l+='<div class="he-view">',l+='<div class="bg a0" data-animate="fadeIn">',l+='<h3 class="a1 no-border" data-animate="fadeInDown">'+(b=a[i]).sub_name+"</h3>",l+=' <a data-toggle="tooltip" title="View Portfolio" data-rel="prettyPhoto" href="msme-portfolio?id='+b.msme_id+'" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search ion-size-20"></i></a>',l+='<a href="message-us?to_id='+b.msme_id+'" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-chatbox-working ion-size-20"></i></a>',l+='<a href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link ion-size-20"></i></a>',l+=" </div>\x3c!-- he bg --\x3e",l+="</div>\x3c!-- he view --\x3e",l+="</div>\x3c!-- he wrap --\x3e",l+="</div>\x3c!-- end col-12 --\x3e",l+='<div class="logo-box2">',l+='<img class="rounded-circle center-div" src="../../venturepal/bizsh.admin/Entrep/'+b.msme_logo+'" alt="Card image cap">',l+="</div>",l+='<div class="container-fluid m-t-20">',l+='<div class="row">',l+='<div class="col-2"></div>',l+='<div class="col-8">',l+='<a class="minmax" style="font-size: 18px !important"> Raised up to <span>&#8369;</span> '+(void 0!=b.raised?numberWithCommas(b.raised):b.raised)+"</a>",l+="</div>",l+='<div class="col-lg-2"></div>',l+="</div>",l+="</div>",l+='<div class="info" >',l+='<div class="title">'+b.msme_name+"</div>",l+='<div class="title text-center"><q>'+b.msme_desc.substr(0,140) +' '+ (b.msme_desc.length > 140 ? '<a style="font-size: 15px;" href="msme-portfolio?id='+b.msme_id+'" >Read more..</a>' :'' ) +"</q> </div>",l+="</div>",l+='<div class="container m-t-10 m-b-20">',l+='<div class="row">',l+='<div class="row-md-8">',l+='<div class="pull pull-left m-t-10">&nbsp &nbspby: <a href="">'+b.entrepname+"</a> </div>",l+="</div>",l+="</div>",l+="</div>",l+='<div class="container m-t-10 m-b-20">',l+='<table class="table" >',l+='<tbody class="">',l+="<tr>",l+='<td class="p-5"><i class="ion-size-15 m-r-5"><a href="javascript:;" id="'+b.msme_id+'" data-id="1" onclick="cycleDetailsModal(this)"><strong>On-going cycle: </strong>'+b.ongoingRoll+"</a></td>",l+='<td class="p-5"><a href="javascript:;" id="'+b.msme_id+'" data-id="0" onclick="cycleDetailsModal(this)">Done cycle: '+b.doneRoll+"</a></td>",l+='<td class="p-5"><i class="ion-size-15 m-r-5"><a href="javascript:;" id="'+b.msme_id+'" data-id="2" onclick="cycleDetailsModal(this)"><strong>Total cycle: </strong>'+b.roll+"</a></td>",l+="</tr>",l+="<tr >",l+="</tbody>",l+="</table> ",l+="</div>",l+='<div class="footer-card m-b-20">',l+='<div class="container-fluid m-t-20">',l+='<div class="row">',l+='<div class="col-2"></div>',l+='<div class="col-8">',l+='<a href="msme-portfolio?id='+b.msme_id+'" class="find-more">View Portfolio ..</a>',l+="</div>",l+='<div class="col-lg-2"></div>',l+="</div>",l+="</div>",l+="</div>",l+="</div>",l+="</div>";$("#partlyfunded").html(l),$("#div_partlyfunded").removeClass("no-display"),$("#div_partlyfunded").addClass("animated fadeInRight")}})}$(function(){});

function redirectTo(element){
	var id = $(element).attr('id');
	window.location.href="msme-portfolio?id="+id;
}

function cycleDetailsModal(element){
	
	var msmeid = $(element).attr('id');
	var type = $(element).attr('data-id');

	$.ajax({
		type:'POST',
		url: 'controller/MsmeController.php',
		data: [{"name":"msmeid","value": msmeid},{"name":"type","value": type},{"name":"action","value": "Cycle Details"}],
		success: function(data){
			var json = JSON.parse(jQuery.trim(data));	
			console.log(data);
			var datas = '';
				datas +='<table class="table">';
                datas +='<thead>';
                datas +='<th>Cycle no.</th>';
                datas +='<th>No. of investor </th>';
                datas +='<th>Duration </th>';
                datas +='<th>Amount </th>';
                datas +='<th>Status </th>';
                datas +='</thead>';
                datas +='<tbody>';

				for(i in json){
					b = json[i];
					// console.log(b);
					datas +='<tr>';
					datas+='<td>'+b.cycle+'</td><td>'+b.numOfInvestor+'</td><td>'+b.duration+'</td><td>'+b.status+'</td><td>'+b.amount+'</td>';
					datas +='</tr>';
				}                  
            	datas +='</tbody>';
            	datas +='</table>';
            $('#modalBodyCycle').html(datas);
			$('#cycleDetailsModal').modal({show: true});
		}  
	});
// 	SELECT cfi.call_id, COUNT(mv.mv_id) as numOfInvestor,CONCAT(cfi.launch_date,'-',TIMESTAMPADD(DAY,cfi.numOfdays,cfi.launch_date)) as duration,if(cfi.status = 0, 'PAID','ONGOING') as status,cfi.numOfdays,cfi.interestrate,cfi.amount
// FROM callforinvestment cfi, msme_venturer mv
// WHERE cfi.msme_id = "3" and mv.cfi_id = cfi.call_id AND if(@d <> 2 , IF(@d = 0 , cfi.status = 0, cfi.status = 1), cfi.status = 1 or cfi.status = 0)
// GROUP BY cfi.call_id
}