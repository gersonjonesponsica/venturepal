var a, b, pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

function checkMsme(e) {
	var t = [],
		a = e;
	t.push({
		name: "msme_id",
		value: a
	}), t.push({
		name: "action",
		value: "Get MSME by id"
	}), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: t,
		success: function (e) {
			loadMsmeSmall(jQuery.trim(e)), $("#viewMsmeModal").modal({
				show: !0
			})
		}
	})
}

function loadMsmeSmall(e) {
	var t = JSON.parse(e),
		a = "";
	a += '<div class="col-sm-12 col-lg-12 col-md-12 m-t-30">', a += '<div class="card hovercard3 h-250 m-b-30">', a += '<div class="portfolio-item graphic-design ">', a += '<div class="he-wrap tpl6 ">', a += '<img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">', a += '<div class="he-view">', a += '<div class="bg a0" data-animate="fadeIn">', a += '<h3 class="a1 no-border" data-animate="fadeInDown">' + t.msme_name + "</h3>", a += ' <a data-toggle="tooltip" target="_blank" title="View Portfolio" data-rel="prettyPhoto" href="msme-profile?id=' + t.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-edit ion-size-15"></i> Manage MSME profile</a>', a += " </div>\x3c!-- he bg --\x3e", a += "</div>\x3c!-- he view --\x3e", a += "</div>\x3c!-- he wrap --\x3e", a += "</div>\x3c!-- end col-12 --\x3e", a += '<div class="logo-box3">', a += '<img class="rounded-circle center-div" src="../../bizsh.admin/Entrep/' + t.msme_logo + '" alt="Card image cap">', a += "</div>", a += '<div class="container-fluid m-t-20">', a += '<div class="row">', a += '<div class="col-2"></div>', a += '<div class="col-8">', a += '<a class="minmax">Raised ' + (null != t.percent_raised ? numberWithCommas(t.percent_raised) : 0) + " %, <span>₱</span> " + (null != t.total_raised ? numberWithCommas(t.total_raised) : 0) + "</a>", a += "</div>", a += '<div class="col-lg-2"></div>', a += "</div>", a += "</div>", a += '<div class="info" >', a += '<div class="title">' + t.msme_name + "</div>", a += "</div>", a += "</div>", a += "</div>", $("#viewMsmeMod").html(a)
}

function msmeProfile(e) {
	checkMsme($(e).attr("id"))
}

function download(e) {
	var t = document.createElement("a");
	$(t).click(function (t) {
		t.preventDefault(), window.open(e, "_blank")
	}), $(t).click()
}
$.validator.addMethod("valueNotEquals", function (e, t, a) {
	return a != t.value
}, "This field is required"), $(function () {
	$("#emailCheck").change(function () {
		var e = "No" == $("#emailStatus").text() ? 1 : 0,
			t = [];
		t.push({
			name: "userid",
			value: $("#accountid").val()
		}), t.push({
			name: "email_status",
			value: e
		}), t.push({
			name: "action",
			value: "Update email status Entrep"
		}), $.ajax({
			type: "POST",
			url: "controller/AccountsController.php",
			data: t,
			success: function (e) {
				(console.log(jQuery.trim(e)), "true" == jQuery.trim(e)) ? 1 == ("No" == $("#emailStatus").text() ? 1 : 0) ? notify("info-notify", "You will be recieving emails from us") : notify("info-notify", "You will not be recieving emails from us"): notify("info-notify", e);
				getProfile()
			}
		})
	}), $("#messageCheck").change(function () {
		var e = "No" == $("#messageStatus").text() ? 1 : 0,
			t = [];
		t.push({
			name: "userid",
			value: $("#accountid").val()
		}), t.push({
			name: "message_status",
			value: e
		}), t.push({
			name: "action",
			value: "Update message status Entrep"
		}), $.ajax({
			type: "POST",
			url: "controller/AccountsController.php",
			data: t,
			success: function (e) {
				(console.log(jQuery.trim(e)), "true" == jQuery.trim(e)) ? 1 == ("No" == $("#messageStatus").text() ? 1 : 0) ? notify("info-notify", "You will be recieving text messages from us") : notify("info-notify", "You will not be recieving text messages from us"): notify("info-notify", e);
				getProfile()
			}
		})
	}), getProfile(), getEntrepMSME(), checkEntrepPayout(), $("#save-overview").on("click", function () {
		$("#addOverviewForm").submit()
	}), $("#addOverviewForm").validate({
		rules: {
			mininve: {
				valueNotEquals: "0"
			},
			maxinve: {
				valueNotEquals: "0"
			}
		},
		submitHandler: function (e) {
			$("#loadthis").addClass("loader-show");
			var t = [];
			t.push({
				name: "userid",
				value: $("#userid").val()
			}), t.push({
				name: "maxinve",
				value: $("#maxinve").val()
			}), t.push({
				name: "mininve",
				value: $("#mininve").val()
			}), t.push({
				name: "action",
				value: "Update Max min investment"
			}), $.ajax({
				type: "POST",
				url: "controller/AccountsController.php",
				data: t,
				success: function (e) {
					console.log(jQuery.trim(e)), "true" == jQuery.trim(e) ? notify("success-notify", "Updated overview details") : notify("info-notify", e), getProfile()
				}
			})
		}
	}), $("#save-about-me").on("click", function () {
		$("#addAboutMeForm").submit()
	}), $("#addAboutMeForm").validate({
		rules: {
			aboutme: {
				required: !0,
				minlength: 20
			}
		},
		submitHandler: function (e) {
			$("#loadthis").addClass("loader-show");
			var t = [];
			t.push({
				name: "userid",
				value: $("#accountid").val()
			}), t.push({
				name: "aboutme",
				value: $("#aboutme").val()
			}), t.push({
				name: "action",
				value: "Update About me Entrep"
			}), $.ajax({
				type: "POST",
				url: "controller/AccountsController.php",
				data: t,
				success: function (e) {
					console.log(jQuery.trim(e)), "true" == jQuery.trim(e) ? notify("success-notify", "Description Updated") : notify("info-notify", e), getProfile(), $("#loadthis").removeClass("loader-show")
				}
			})
		}
	}), $("#addFormProfileDetail").validate({
		rules: {
			lname: "required",
			fname: "required",
			mname: "required",
			brgy: "required",
			state: {
				valueNotEquals: "0"
			},
			city: {
				valueNotEquals: "0"
			}
		},
		submitHandler: function (e) {
			$("#loadthis").addClass("loader-show");
			var t = [];
			(t = $("form").serializeArray()).push({
				name: "userid",
				value: $("#accountid").val()
			}), t.push({
				name: "action",
				value: "Update Profile Info Entrep"
			}), $.ajax({
				type: "POST",
				url: "controller/AccountsController.php",
				data: t,
				success: function (e) {
					console.log(jQuery.trim(e)), "true" == jQuery.trim(e) ? notify("success-notify", "Profile Information Updated") : notify("info-notify", e), getProfile(), $("#loadthis").removeClass("loader-show")
				}
			})
		}
	}), $("#save-profile-detail").on("click", function () {
		$("#addFormProfileDetail").submit()
	}), $("#save-contact-detail").on("click", function () {
		$("#addFormContactDetail").submit()
	}), $("#addFormContactDetail").validate({
		rules: {
			email: "required",
			facebook: {
				required: !0,
				url: !0
			},
			mobile: "required",
			telephone: "required"
		},
		submitHandler: function (e) {
			$("#loadthis").addClass("loader-show");
			var t = [];
			(t = $("form").serializeArray()).push({
				name: "userid",
				value: $("#accountid").val()
			}), t.push({
				name: "action",
				value: "Update Contact Entrep"
			}), $.ajax({
				type: "POST",
				url: "controller/AccountsController.php",
				data: t,
				success: function (e) {
					"true" == jQuery.trim(e) ? notify("success-notify", "Contacts Updated") : "inactive" == jQuery.trim(e) ? notify("info-notify", "Please check inbox and verify your account") : "no account" == jQuery.trim(e) ? notify("error-notify", "Please create your account") : notify("info-notify", e), getProfile(), $("#loadthis").removeClass("loader-show")
				}
			})
		}
	})
}), $("#photo_button").on("click", function () {
	$("#profile_photo").click()
}), $("#profile_photo").on("change", function () {
	0 != (a = $(this)[0].files).length && $("#photoForm").submit()
}), $("#photoForm").submit(function (e) {
	data = new FormData(this), $("#loadthis").addClass("loader-show");
	var t = $("#accountid").val();
	data.append("action", "Upload Entrep Photo"), data.append("e_id", t), $.ajax({
		url: "controller/AccountsController.php",
		type: "POST",
		data: data,
		cache: !1,
		processData: !1,
		contentType: !1,
		success: function (e) {
			"upload" == jQuery.trim(e) ? notify("success-notify", "Profile photo updated") : notify("info-notify", e), getProfile(), whosLogin()
		}
	}), e.preventDefault()
});
var endmsme = [];

function getEntrepMSME() {
	var e = [],
		t = $("#accountid").val();
	e.push({
		name: "entrep_id",
		value: t
	}), e.push({
		name: "action",
		value: "Get Entrep MSME"
	}), console.log(t), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: e,
		success: function (e) {
			var t = JSON.parse(jQuery.trim(e)),
				a = "";
			for (i in t) {
				var o = "",
					n = "";
				a += '<div class="m-l-100  col-sm-8 m-t-10  hand-point"  onclick="msmeProfile(this)" id="' + (b = t[i]).msme_id + '">', a += '<div class="interest-card font-black2 border-gray tras-anim hand-point ">', a += '<div class="row ">', a += '<div class="col-lg-1">', a += '<img src="../../bizsh.admin/Entrep/' + b.msme_logo + '" class="img-circle m-t-5 m-l-5" height="40" width="40" />', a += "</div>", a += '<div class="col-lg-9">', a += "<h1 >" + b.msme_name + "</h1>", a += "</div>", a += '<div class="col-lg-1">', 0 == b.status ? (o = "pending", n = "Pending Registration") : b.percent_raised >= 100 || b.rem <= 0 ? (o = "success", n = "Investment Successful") : b.percent_raised <= 100 && 0 != b.percent_raised && b.rem > 0 ? (o = "info", n = "Accepting Investment") : b.percent_raised <= 100 && b.percent_raised >= 0 && b.rem > 0 ? (o = "warning", n = "Accepting Investment") : 0 == b.percent_raised && b.rem <= 0 ? (o = "error", n = "End of Investment, No Investment", endmsme.push(b.msme_id)) : b.percent_raised > 0 && b.rem <= 0 && (o = "endparlyfunded", n = "Partly Funded, End of Investment", endmsme.push(b.msme_id)), a += '<div title="' + n + '" class="circle-status ' + o + ' m-t-15"></div>', a += "</div>", a += "</div>", a += "</div>", a += "</div>"
			}
			$(".row.msme").html(a), endmsme.length >= 1 && setTimeout(function () {
				loadMsmeStatus(endmsme), $("#extendMod").modal({
					show: !0
				})
			}, 100)
		}
	})
}
var loader = '<div id="loadthis" class="loader-show-small"></div>';

function checkEntrepPayout() {
	$("#summaryTable").html(loader);
	var e = [],
		t = "",
		a = $("#accountid").val();
	e.push({
		name: "account_id",
		value: a
	}), e.push({
		name: "action",
		value: "Check payout"
	}), $.ajax({
		type: "POST",
		url: "controller/PayoutController.php",
		data: e,
		success: function (e) {
			var a = JSON.parse(jQuery.trim(e));
			console.log(a);
			for (i in a) {
				b = a[i], t += '<table class="table table-bordered table-hover table-condensed">', t += "<thead>", t += '<th class="titletd">Msme Name</th>', t += '<th class="titletd">Loan Duration</th>', t += '<th class="titletd">Option</th>', t += '<th class="titletd">Payment History</th>', t += "</thead>", t += "<tbody>", t += "<tr>";
				var o;
				o = 'href="javascript:showPayoutModal(' + b.msme_id + "," + b.balance + ", " + b.totalPaid + ')"', label = '<i class="ion-card ion-size-15"><i/> Pay ', $("#title_mm").html("Payment for " + b.msme_name), t += '<td id="msmename">' + b.msme_name + '</td><td id="expected">' + b.duration + "</td><td><a " + o + '  class=""> ' + label + "</a></td>", t += '<td><a href="javascript:endInvestment(' + b.msme_id + ')"> End Investment</a></td>', t += "</tr>", t += "</tbody>", t += "</table>"
			}
			$("#summaryTable").html(t), $("#title_m").html("Payment for " + b.msmename)
		}
	})
}

function endInvestment(e) {
	var t = [];
	t.push({
		name: "msme_id",
		value: e
	}), t.push({
		name: "action",
		value: "End Investment"
	}), $.ajax({
		type: "POST",
		url: "controller/CfiController.php",
		data: t,
		success: function (e) {}
	})
}

function no() {
	alert("no payment")
}

function getCfiId(e) {
	$("#msmeid").val(e);
	var t = [],
		a = e;
	t.push({
		name: "msme_id",
		value: a
	}), t.push({
		name: "action",
		value: "Get CFI id"
	}), $.ajax({
		type: "POST",
		url: "controller/CfiController.php",
		data: t,
		success: function (e) {
			$("#cfiid").val(jQuery.trim(e))
		}
	})
}

function showPayoutModal(e, t, a) {
	$("#balance").html(void 0 != t ? "<span>₱</span> " + numberWithCommas(t) : 0), $("#totalPaid").html(void 0 != a ? "<span>₱</span> " + numberWithCommas(a) : 0), $("#payoutModal").modal({
		show: !0
	}), getCfiId(e)
}

function getMsmeInvestorNotify(e) {
	var t = [];
	e = e;
	t.push({
		name: "msme_id",
		value: e
	}), t.push({
		name: "action",
		value: "Get msme investor"
	}), $.ajax({
		type: "POST",
		url: "controller/MsmeController.php",
		data: t,
		success: function (t) {
			var a = JSON.parse(jQuery.trim(t));
			if (console.log(a), a.length > 0)
				for (i in a) b = a[i], notification(e, b.v_id, 6)
		}
	})
}

function loadMsmeStatus(e) {
	for (var t = "", a = 0; a < e.length; a++) {
		var i = [];
		i.push({
			name: "msme_id",
			value: e[a]
		}), i.push({
			name: "action",
			value: "Get MSME by id"
		}), $.ajax({
			type: "POST",
			url: "controller/MsmeController.php",
			data: i,
			success: function (e) {
				var a = JSON.parse(jQuery.trim(e));
				t += '<div class="container" >', a.percent_raised <= 0 && a.rem <= 0 ? t += '<div title="Partly Funded, End of Investment" class="circle-status error m-t-15"></div><h4 class="text-center">End of Investment. No Money Raised. </h4>' : a.percent_raised > 0 && a.rem <= 0 && (t += '<div title="Partly Funded, End of Investment" class="circle-status endparlyfunded m-t-15"></div><h4 class="text-center">End of Investment. Partly Raised. </h4>'), t += '<div class="col-sm-12 col-lg-12 col-md-12 m-t-30">', t += '<div class="card hovercard3 h-250 m-b-10">', t += '<div class="portfolio-item graphic-design ">', t += '<div class="he-wrap tpl6 ">', t += '<img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">', t += '<div class="he-view">', t += '<div class="bg a0" data-animate="fadeIn">', t += '<h3 class="a1 no-border" data-animate="fadeInDown">' + a.msme_name + "</h3>", t += ' <a data-toggle="tooltip" target="_blank" title="View Portfolio" data-rel="prettyPhoto" href="msme-profile?id=' + a.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search ion-size-20"></i> View Profile</a>', t += " </div>\x3c!-- he bg --\x3e", t += "</div>\x3c!-- he view --\x3e", t += "</div>\x3c!-- he wrap --\x3e", t += "</div>\x3c!-- end col-12 --\x3e", t += '<div class="logo-box3">', t += '<img class="rounded-circle center-div" src="../../bizsh.admin/Entrep/' + a.msme_logo + '" alt="Card image cap">', t += "</div>", t += '<div class="container-fluid m-t-20">', t += '<div class="row">', t += '<div class="col-2"></div>', t += '<div class="col-8">', t += '<a class="minmax"> <span>₱</span> ' + (void 0 != a.total_raised ? numberWithCommas(a.total_raised) : 0) + "</a>", t += "</div>", t += '<div class="col-lg-2"></div>', t += "</div>", t += "</div>", t += '<div class="info" >', t += '<div class="title">' + a.msme_name + "</div>", t += "</div>", t += "</div>", t += "</div>", t += '<div class="row m-r-10 m-l-10 m-b-30" >', t += '<div class="col-lg-6 ">', t += '<a href="javascript:;" onclick="AskExtension(this)" id="' + a.msme_id + '" class="text-center ">', t += '<div class="card interest-card "><i class="ion-calendar text-success"></i> Pay $5 for 1 Week Extension </div>', t += "</a>", t += "</div>", t += '<div class="col-lg-6"> ', t += '<a href="" class="text-center">', t += '<div class="card interest-card"><i class="ion-close text-error"></i> Cancel Call for Investment</div>', t += "</a>", t += "</div>", t += "</div> ", t += "</div>", $("#extendModal").html(t)
			}
		})
	}
}

function AskExtension(e) {
	var t = $(e).attr("id");
	$("#Description").val(t);
	var a = [];
	a.push({
		name: "msme_id",
		value: t
	}), a.push({
		name: "action",
		value: "Ask 1 week Extension"
	}), $.ajax({
		type: "POST",
		url: "controller/ExtensionController.php",
		data: a,
		success: function (e) {
			"true" == jQuery.trim(e) ? notify("info-notify", "Admin is verifying for extension.") : $("#paypalFormExtension").submit()
		}
	})
}

function getProfile() {
	var e = [],
		t = $("#accountid").val(),
		a = $("#usertype").val();
	e.push({
		name: "id",
		value: t
	}), e.push({
		name: "type",
		value: a
	}), e.push({
		name: "action",
		value: "Get profile"
	}), $.ajax({
		type: "POST",
		url: "controller/AccountsController.php",
		data: e,
		success: function (e) {
			var t = JSON.parse(jQuery.trim(e));
			console.log(t);
			var a = (void 0 == t.e_fname ? "no name" : t.e_fname) + " " + t.e_lname,
				i = t.e_street + " " + t.city_name + ", " + t.province_name;
			$("#txt_fullname").text(a), $("#txt_location").html('<i class="ion-location"></i> ' + i), $("#txt_fname").html(t.e_fname), $("#fname").val(t.e_fname), $("#txt_lname").text(t.e_lname), $("#lname").val(t.e_lname), $("#txt_mname").text(t.e_mname), $("#mname").val(t.e_mname), $("#txt_city").text(t.city_name), $("#city").val(t.e_city), $("#txt_state").text(t.province_name), $("#state").val(t.e_state), $("#txt_brgy").text(t.e_street), $("#brgy").val(t.e_street), getAllState(t.e_state, t.province_name), getAllCity(t.e_state, t.city_name, t.e_city), $("#txt_mobile").text(t.e_cpnum), $("#mobile").val(t.e_cpnum), $("#txt_telephone").text(t.e_telnum), $("#telephone").val(t.e_telnum), $("#txt_email").text(t.acc_email), $("#email").val(t.acc_email), $("#txt_facebook").text(t.e_fb), $("#facebook").val(t.e_fb);
			var o = void 0 != t.e_photo ? "../../venturepal/bizsh.admin/Entrep/" + t.e_photo : "img/unknown.jpg";
			// alert(o)
			$("#p_profile").attr("src", o), $("#txt_aboutme").text(t.e_desc), $("#aboutme").val(t.e_desc), $("#messageStatus").text(1 == t.cp_notify_status ? "Yes" : "No"), $("#messageCheck").prop("checked", 1 == t.cp_notify_status), $("#emailCheck").prop("checked", 1 == t.e_notify_status), $("#emailStatus").text(1 == t.e_notify_status ? "Yes" : "No"), void 0 != t.e_lname && void 0 != t.e_fname && void 0 != t.e_mname || $("#profileMod").modal({
				show: !0
			})
		}
	})
}

function getAllState(e, t) {
	var a = [];
	a.push({
		name: "action",
		value: "Get all state"
	}), $.ajax({
		type: "POST",
		url: "controller/GlobalController.php",
		data: a,
		success: function (a) {
			var o = JSON.parse(jQuery.trim(a)),
				n = "";
			n += void 0 == t ? '<option value="' + e + '">Select Province</option>' : '<option value="' + e + '">' + t + "</option>";
			var s = "";
			for (i in o)(s = o[i])[0] != e && (n += '<option value="' + s[0] + '">' + s[1] + "</option>");
			$("#state").html(n)
		}
	})
}

function changeState(e) {
	getAllCity(e.value)
}

function getAllCity(e, t, a) {
	var o = e,
		n = (state, []);
	n.push({
		name: "prov_id",
		value: o
	}), n.push({
		name: "action",
		value: "Get all city"
	}), void 0 == a && void 0 == t ? $.ajax({
		type: "POST",
		url: "controller/GlobalController.php",
		data: n,
		success: function (e) {
			var t = JSON.parse(jQuery.trim(e)),
				a = "",
				o = "";
			for (i in t) a += '<option value="' + (o = t[i])[0] + '">' + o[1] + "</option>";
			console.log(t), $("#city").html(a)
		}
	}) : $.ajax({
		type: "POST",
		url: "controller/GlobalController.php",
		data: n,
		success: function (e) {
			var o = JSON.parse(jQuery.trim(e)),
				n = "";
			n += '<option value="' + a + '">' + t + "</option>";
			var s = "";
			for (i in o)(s = o[i])[0] != a && (n += '<option value="' + s[0] + '">' + s[1] + "</option>");
			$("#city").html(n)
		}
	})
}
$(".p_payout").on("click", function () {
	$("#p_payout").click()
}), $("#p_payout").on("change", function () {
	0 != (a = $(this)[0].files).length && ($(".p_payout").html(a[0].name), "application/pdf" == a[0].type ? $("#uploaded_file_p_payout").html('<img width="100" height="100" src="../../bizsh.admin/images/PDFLogo.png"/>') : $("#uploaded_file_p_payout").html('<img width="100" height="100" src="' + window.URL.createObjectURL(a[0]) + '"/>'))
}), $("#paymentForm").submit(function (e) {
	data = new FormData(this);
	var t = $("#msmeid").val(),
		a = $("#cfiid").val(),
		i = $("#amount").val(),
		o = $("#accountid").val();
	data.append("action", "Add Payout"), data.append("msme_id", t), data.append("amount", i), data.append("cfiid", a), data.append("entrepid", o), $.ajax({
		url: "controller/PayoutController.php",
		type: "POST",
		data: data,
		cache: !1,
		processData: !1,
		contentType: !1,
		success: function (e) {
			console.log(e + " asdf"), "upload" == jQuery.trim(e) ? (notify("success-notify", "Your payment will be verifying"), getMsmeInvestorNotify(t), checkEntrepPayout()) : notify("error-notify", "Error in paying")
		}
	}), e.preventDefault()
}), $("#btnPay").click(function () {
	$("#paymentForm").submit()
});