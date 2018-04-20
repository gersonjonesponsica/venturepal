var a, b, pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/") + 1),
	iStop = "";

function getMSMEDocument() {
	var t = [],
		e = $("#msme_id").val();
	t.push({
		name: "msme_id",
		value: e
	}), t.push({
		name: "action",
		value: "Get MSME document"
	}), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: t,
		success: function (t) {
			var e = JSON.parse(jQuery.trim(t)),
				a = "";
			console.log(e);
			for (i in e) {
				var o = e[i].doc_name.substring(e[i].doc_name.lastIndexOf("/") + 1);
				a += '<div class="col-sm-6 m-t-10">', a += '<div class="interest-card border-gray tras-anim hand-point" data-file=' + e[i].doc_name + ' onclick="downloadDocument(this)">', o.length > 32 && (o = o.substring(0, 10) + " ... " + o.substring(32, o.length)), a += "<h1>" + o + "</h1>", a += "</div>", a += "</div>"
			}
			$("#document").html(a)
		}
	})
}

function download(t) {
	var e = document.createElement("a");
	$(e).click(function (e) {
		e.preventDefault(), window.open(t, "_blank")
	}), $(e).click()
}

function downloadDocument(t) {
	download("../../venturepal/bizsh.admin/Documents/Documents/" + $(t).attr("data-file"))
}

function getMSMEGallery() {
	var t = [],
		e = $("#msme_id").val();
	t.push({
		name: "msme_id",
		value: e
	}), t.push({
		name: "action",
		value: "Get MSME gallery"
	}), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: t,
		success: function (t) {
			var e = JSON.parse(jQuery.trim(t)),
				a = "";
			for (i in e) a += '<a data-toggle="tooltip" data-placement="top"  data-rel="prettyPhoto" href="../../venturepal/bizsh.admin/Documents/Gallery/' + e[i].doc_name + '" data-animate="fadeInUp"><img src="../../venturepal/bizsh.admin/Documents/Gallery/' + e[i].doc_name + '" width="300" height="300" class="img-responsive center-block item"></a>';
			$("#galleryPhotos").html(a)
		}
	})
}

function getMSME() {
	var t = [],
		e = $("#msme_id").val();
	t.push({
		name: "msme_id",
		value: e
	}), t.push({
		name: "action",
		value: "Get MSME by id"
	}), console.log(t);
	var a = "",
		o = "",
		i = "";
	$.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: t,
		success: function (t) {
			var e = JSON.parse(jQuery.trim(t));
			// alert('sd')
			$("#photo").html('<img src="../../venturepal/bizsh.admin/Entrep/' + e.msme_logo + '" class="border-table-color w-fit h-500  img-responsive">'), $("#nameAndImage").html('<img class="img-circle" src="../../venturepal/bizsh.admin/Entrep/' + e.e_photo + '"><a href="javascript:;">by  ' + e.entrepname + "</a>"), $("#nav_logo").attr("src", "../../venturepal/bizsh.admin/Entrep/" + e.msme_logo), 1 == e.msme_size ? $("#badge").attr("src", "badge/micro.png") : 2 == e.msme_size ? $("#badge").attr("src", "badge/small.png") : $("#badge").attr("src", "badge/meduim.png"), $("#txtName").html(e.msme_name), $("#nav_name").html(e.msme_name), $("#txtCapital").html("Target: <span> ₱</span> " + e.neededCapital);
			var s = e.msme_brgy + ", " + e.city_name + ", " + e.province_name + ", Philippines 6000";
			$("#txtLocation").html('<i class="ion-location "></i> ' + s), $("#msme_desc").html(e.msme_desc), $("#txtPhone").html(e.e_cpnum), $("#txtTelephone").html(e.e_telnum), $("#txtWebsite").html(e.msme_website), $("#txtFacebook").html(e.e_fb), $("#txtDate").html(e.msme_dateEstablish), $("#txtProfit").html(void 0 != e.msme_netprofit ? "<span> ₱</span> " + numberWithCommas(e.msme_netprofit) : e.msme_netprofit), $("#rateStar").html(e.rateAvarage + " / 5.0");
			for (var n = "", r = 1; r <= 5; r++) r <= e.rateAvarage ? n += '<i href="javascript:;" style="color: #CCCC5D" class="ion-star ion-size-25 m-3 hand-point"></i>' : n += '<i href="javascript:;" class="ion-star ion-size-25 m-3 hand-point"></i>';
			$("#rate-div").html(n), $("#txtWorth").html(void 0 != e.msme_networth ? "<span> ₱</span> " + numberWithCommas(e.msme_networth) : e.msme_networth), $("#txtGross").html(void 0 != e.msme_grossincome ? "<span> ₱</span> " + numberWithCommas(e.msme_grossincome) : e.msme_grossincome), $("#txtLike").html('<a class="" href="javascript:;"><i class="ion-heart "></i> ' + e.totalLikes + " likes</a>"), $("#txtTotalRaise").html(void 0 != e.total_raised ? "<span> ₱</span> " + numberWithCommas(e.total_raised) + " Raised" : e.total_raised), $("#txtMin").html(void 0 != e.msme_minInvestment ? "<span> ₱</span> " + numberWithCommas(e.msme_minInvestment) : e.msme_minInvestment), $("#txtMax").html(void 0 != e.msme_maxInvestment ? "<span> ₱</span> " + numberWithCommas(e.msme_maxInvestment) : e.msme_maxInvestment), $("#txtTotalRaise").html(void 0 != e.total_raised ? "<span> ₱</span> " + numberWithCommas(e.total_raised) + " Raised" : e.total_raised), $("#txtRemainingCapitalNeeded").html(void 0 != e.total_remaining ? "<span> ₱</span> " + numberWithCommas(e.total_remaining) + " Remaining" : e.total_remaining), $("#txtRaisePercent").html((null == e.percent_raised ? 0 : e.percent_raised) + "% Raised"), $("#txtRaisePercent").html('<div class="progress-bar" role="progressbar" style="width:25%; background-color: #21b08a; width:' + (null == e.percent_raised ? 0 : e.percent_raised) + '% !important">' + (null == e.percent_raised ? 0 : e.percent_raised) + "% Complete</div>"), $("#txtCategory").html(e.sub_name), $("#txtRemainingVenture").html(e.remaining_venturer), 
			// iStop = "https://www.youtube.com/embed/Lop0VCYdpGQ?rel=0&", $("iframe#video")[0].src = iStop, 
			map(e.msme_latitude, e.msme_longitude), a += '<div class="interest-card border-gray tras-anim hand-point" data-file=' + e.biz_permit + ' onclick="downloadDocument(this)">', a += "<h1>Business Permit</h1>", a += "</div>", $("#bP").html(a), o += '<div class="interest-card border-gray tras-anim hand-point" data-file=' + e.dti_permit + ' onclick="downloadDocument(this)">', o += "<h1>DTI Certificate</h1>", o += "</div>", $("#dC").html(o), i += '<div class="interest-card border-gray tras-anim hand-point" data-file=' + e.mayor_permit + ' onclick="downloadDocument(this)">', i += "<h1>Mayor's Permit</h1>", i += "</div>", $("#mP").html(i), $("#txtRemainingDay").html(e.rem + " Days to go")
			if(e.percent_raised < 100 && e.countStatus > 0){
				$('#investBtn').removeAttr('hidden');
				$('#investNav').removeAttr('hidden');
			}
		}
	})
}

function checkBookmark() {
	var t = $("#msme_id").val(),
		e = $("#accountid").val(),
		a = [];
	a.push({
		name: "to_id",
		value: t
	}), a.push({
		name: "from_id",
		value: e
	}), a.push({
		name: "action",
		value: "Check bookmark status"
	});
	$.ajax({
		type: "POST",
		url: "controller/BookmarkController.php",
		data: a,
		success: function (e) {
			json = JSON.parse(jQuery.trim(e)), 0 != json.length ? 1 == json.status ? ($(".bookmark_").attr("to_id", t), $(".bookmark_").attr("data_status", "0"), $(".bookmark_").attr("title", "Saved"), $(".bookmark_").css({
				"background-color": "white",
				color: "#cccc5d"
			})) : ($(".bookmark_").attr("to_id", t), $(".bookmark_").attr("data_status", "1"), $(".bookmark_").attr("title", "Remind me"), $(".bookmark_").css({
				"background-color": "#F7FAFA",
				color: "#A6C0B9"
			})) : ($(".like_").attr("to_id", t), $(".like_").attr("data_status", "1"), $(".like_").attr("title", "I Like this :)"), $(".like_").css({
				"background-color": "#21B08A",
				color: "white"
			}))
		}
	})
}

function checkRate() {
	var t = $("#msme_id").val(),
		e = $("#accountid").val(),
		a = [];
	a.push({
		name: "msme_id",
		value: t
	}), a.push({
		name: "v_id",
		value: e
	}), a.push({
		name: "action",
		value: "Check rate and review"
	}), $.ajax({
		type: "POST",
		url: "controller/RateController.php",
		data: a,
		success: function (t) {
			json = JSON.parse(jQuery.trim(t)), console.log(json), "wala" == json ? $("#rateBtn").html('<h6 class="text-center"><a class="btn btn-default" href="javascript:;">Rate me</a> </h6>') : $("#rateBtn").addClass("no-display")
		}
	})
}

function checkLike() {
	var t = $("#msme_id").val(),
		e = $("#accountid").val(),
		a = [];
	a.push({
		name: "to_id",
		value: t
	}), a.push({
		name: "from_id",
		value: e
	}), a.push({
		name: "action",
		value: "Check like status"
	});
	$.ajax({
		type: "POST",
		url: "controller/LikeController.php",
		data: a,
		success: function (e) {
			json = JSON.parse(jQuery.trim(e)), 0 != json ? 1 == json.si_status ? ($(".like_").attr("to_id", t), $(".like_").attr("data_status", "0"), $(".like_").attr("title", "Unlike :( "), $(".like_").css({
				"background-color": "white",
				color: "#E54444"
			})) : ($(".like_").attr("to_id", t), $(".like_").attr("data_status", "1"), $(".like_").attr("title", "I Like this :)"), $(".like_").css({
				"background-color": "#F7FAFA",
				color: "#A6C0B9"
			})) : 0 == json ? ($(".like_").attr("to_id", t), $(".like_").attr("data_status", "1"), $(".like_").attr("title", "I Like this :)"), $(".like_").css({
				"background-color": "#F7FAFA",
				color: "A6C0B9"
			})) : ($(".like_").attr("to_id", t), $(".like_").attr("data_status", "1"), $(".like_").attr("title", "I Like this :)"), $(".like_").css({
				"background-color": "#21B08A",
				color: "white"
			}))
		}
	})
}

function map(t, e) {
	var a;
	new google.maps.Geocoder;
	var o = new google.maps.LatLng(t, e),
		i = {
			zoom: 16,
			center: o,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
	a = new google.maps.Map(document.getElementById("geomap"), i), new google.maps.Geocoder, new google.maps.Marker({
		map: a,
		draggable: !0,
		position: o
	})
}
$(function () {
	var t;
	$("#btnYoutube").click(function () {
		$("#youtube").modal({
			show: !0
		}), $("iframe#video")[0].src = iStop
	}), $("#pauseClose").on("click", function () {}), (t = jQuery)(window).on("load", function () {
		t(".mcs-horizontal-example").mCustomScrollbar({
			axis: "x",
			theme: "dark-3"
		})
	}), getMSME(), getMSMEGallery(), getMSMEDocument(), checkBookmark(), checkLike(), checkRate()
}), $("#rateBtn").click(function () {
	$("#rate_mod").modal({
		show: !0
	})
});