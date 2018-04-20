var a, b;

function popularMsme() {
	var s = [];
	s.push({
		name: "action",
		value: "Get popular msme"
	}), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: s,
		success: function (s) {
			var a = JSON.parse(jQuery.trim(s));
			// console.log(a);
			var i = "";
			for (e in a) {
				// console.log(b)
				var b = a[e];
				i += '<div class="col-sm-4 col-lg-4 col-md-4">', i += '<div class="card hovercard3 h-550 m-b-30" id='+b.msme_id+' onclick="redirectTo(this)">', i += '<div class="portfolio-item graphic-design ">', i += '<div class="he-wrap tpl6 ">', i += ' <img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">', i += '<div class="he-view">', i += '<div class="bg a0" data-animate="fadeIn">', i += '<h3 class="a1 no-border" data-animate="fadeInDown">' + (b = a[e]).sub_name + "</h3>", i += ' <a data-toggle="tooltip" title="View Portfolio" data-rel="prettyPhoto" href="msme-portfolio?id=' + b.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search ion-size-20"></i></a>', i += '<a href="message-us?to_id=' + b.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-chatbox-working ion-size-20"></i></a>', i += '<a href="company-profile" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-link ion-size-20"></i></a>', i += " </div>\x3c!-- he bg --\x3e", i += "</div>\x3c!-- he view --\x3e", i += "</div>\x3c!-- he wrap --\x3e", i += "</div>\x3c!-- end col-12 --\x3e", i += '<div class="logo-box2">', i += '<img class="rounded-circle center-div" src="../../venturepal/bizsh.admin/Entrep/' + b.msme_logo + '" alt="Card image cap">', i += "</div>", i += '<div class="container-fluid m-t-20">', i += '<div class="row">', i += '<div class="col-2"></div>', i += '<div class="col-8">', i += '<a class="minmax"> <span>₱</span> ' + (void 0 != b.msme_minInvestment ? numberWithCommas(b.msme_minInvestment) : b.msme_minInvestment) + " - <span>₱</span> " + (void 0 != b.msme_maxInvestment ? numberWithCommas(b.msme_maxInvestment) : b.msme_maxInvestment) + "</a>", i += "</div>", i += '<div class="col-lg-2"></div>', i += "</div>", i += "</div>", i += '<div class="row rate-div no-border center-div-within-div m-t-10" >', i += '<div class="center-div-within-div" id="rate-div">';
				for (var e = 1; e <= 5; e++) e <= b.rateAvarage ? i += '<i href="javascript:;" style="color: #CCCC5D" class="ion-star ion-size-25 m-3 hand-point"></i>' : i += '<i href="javascript:;" class="ion-star ion-size-25 m-3 hand-point"></i>';
				i += "</div>", i += "</div>", i += '<div class="info" >', i += '<div class="title">' + b.msme_name + "</div>", i += '<div class="title text-center"><q>' + b.msme_desc.toString().substr(0, 20) +' '+ (b.msme_desc.length > 20 ? '..' :'' ) + "</q> </div>", i += "</div>", i += '<div class="progress m-l-20 m-r-20">', i += '<div class="progress-bar" role="progressbar" style="width:25%; color: '+ (b.percent_raised == 0 ? 'black' : 'red')+' !important; background-color: #21b08a; width:' + b.percent_raised + '% !important">' + b.percent_raised + "% Complete</div>", i += "</div>", i += '<div class="container m-t-10 m-b-20">', i += '<div class="row">', i += '<div class="row-md-4">', i += '<div class="m-l-20"><img class="img-circle" src="../../venturepal/bizsh.admin/Entrep/' + b.e_photo + '"></div>', i += "</div>", i += '<div class="row-md-8">', i += '<div class="pull pull-left m-t-10">   by: <small><a href="">' + b.entrepname + "</a></small> </div>", i += "</div>", i += "</div>", i += "</div>", i += '<div class="container m-t-10 m-b-20">', i += '<table class="table" >', i += '<tbody class="">', i += "<tr>", i += '<td class="p-5"><i class="ion-size-15 m-r-5"><strong><span>₱</span> ' + (void 0 != b.remaining_neededCap ? numberWithCommas(b.remaining_neededCap) : b.remaining_neededCap) + "</strong> Remaining</td>", i += '<td class="p-5"><i class="ion-person-add ion-size-15 m-r-5"></i><strong>' + b.remaining_venturer + "</strong> Venturer Remaining</td>", i += "</tr>", i += "<tr >", i += '<td class="p-5"><i class=" ion-size-15 m-r-5"><strong><span>₱</span> ' + (void 0 != b.raised ? numberWithCommas(b.raised) : b.raised) + "</strong> Raised</td>", i += ' <td class="p-5"><i class="ion-calendar ion-size-15 m-r-5"></i><strong>' + b.rem + "</strong> days to go</td>", i += "</tr>", i += "</tbody>", i += "</table> ", i += "</div>", i += '<div class="footer-card m-b-20">', i += '<div class="container-fluid m-t-20">', i += '<div class="row">', i += '<div class="col-2"></div>', i += '<div class="col-8">', i += '<a href="contract?id=' + b.msme_id + '" class="find-more">Make Investment</a>', i += "</div>", i += '<div class="col-lg-2"></div>', i += "</div>", i += "</div>", i += "</div>", i += "</div>", i += "</div>"
			}
			$("#popularmsme").html(i), $("#div_popularmsme").removeClass("no-display"), $("#div_popularmsme").addClass("animated fadeInLeft")
		}
	})
}
$(function () {});

function redirectTo(element){
	var id = $(element).attr('id');
	// alert(id)
	window.location.href="msme-portfolio?id="+id;
}