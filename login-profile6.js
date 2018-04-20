var read, unread, a = "";

function whosLogin() {
	var t = [],
		i = $("#accountid").val(),
		o = $("#usertype").val();
	t.push({
		name: "id",
		value: i
	}), t.push({
		name: "type",
		value: o
	}), t.push({
		name: "action",
		value: "Get profile"
	}), $.ajax({
		type: "POST",
		url: "controller/AccountsController.php",
		data: t,
		success: function (t) {
			var i = JSON.parse(jQuery.trim(t));
			// console.log(i)
			var a = '';
			if (1 == o) {
				a = void 0 != i.investor_photo && null != i.investor_photo && "" != i.investor_photo ? "../../venturepal/bizsh.admin/Investor/" + i.investor_photo : "img/unknown.jpg";
				$("#p_profile").attr("src", a), $("#p_profile_c").attr("src", a), $("ul a #pp_profile_ha").attr("src", a), console.log(a)
			} else {
				a = void 0 != i.e_photo ? "../../venturepal/bizsh.admin/Entrep/" + i.e_photo : "img/unknown.jpg";

				$("#p_profile_c").attr("src", a), $("#p_profile").attr("src", a), $("ul a #pp_profile_ha").attr("src", a)
			}
							// alert(a)
		}
	})
}

function checkUserReadNotification() {
	var t = [],
		i = $("#accountid").val(),
		o = $("#usertype").val();
	t.push({
		name: "account_id",
		value: i
	}), t.push({
		name: "type",
		value: o
	}), t.push({
		name: "action",
		value: "Get user read notification"
	}), $.ajax({
		type: "POST",
		url: "controller/NotificationController.php",
		data: t,
		success: function (t) {
			var i = JSON.parse(jQuery.trim(t));
			i.length > 0 ? $("#total").html(i.length) : $("#noti_Button").removeClass("badge1")
		}
	})
}

function checkUserUnreadNotification() {
	var t = [],
		i = $("#accountid").val(),
		o = $("#usertype").val();
	t.push({
		name: "account_id",
		value: i
	}), t.push({
		name: "type",
		value: o
	}), t.push({
		name: "action",
		value: "Get user unread notification"
	}), $.ajax({
		type: "POST",
		url: "controller/NotificationController.php",
		data: t,
		success: function (t) {
			var i = JSON.parse(jQuery.trim(t));
			i.length > 0 ? ($("#noti_Button").addClass("badge1"), $("#noti_Button").attr("data-badge", i.length), $("#unread").html(i.length)) : $("#noti_Button").removeClass("badge1")
		}
	})
}

function checkUserNotificationClick() {
	$("#loader-div").removeAttr("hidden");
	var t = [],
		o = $("#accountid").val(),
		a = $("#usertype").val();
	t.push({
		name: "account_id",
		value: o
	}), t.push({
		name: "type",
		value: a
	}), t.push({
		name: "action",
		value: "Get user notification"
	}), $.ajax({
		type: "POST",
		url: "controller/NotificationController.php",
		data: t,
		success: function (t) {
			var o = JSON.parse(jQuery.trim(t)),
				a = "";
			if (o.length > 0)
				for (i in o) {
					b = o[i], 2 == b.status ? a += '<li style="background: white !important">' : a += "<li>", a += '<div class="container">', a += '<div class="row">', a += '<div class="col-lg-2">';
					var e = "";
					e = 9 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.photo : "img/unknown.jpg" : 8 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.msme_photo : "img/unknown.jpg" : 7 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.photo : "img/unknown.jpg" : 6 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.photo : "img/unknown.jpg" : 5 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Investor/" + b.photo : "img/unknown.jpg" : 4 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.photo : "img/unknown.jpg" : 3 == b.noti_type ? void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Entrep/" + b.photo : "img/unknown.jpg" : void 0 != b.photo || null != b.photo ? "../../bizsh.admin/Investor/" + b.photo : "img/unknown.jpg", a += '<img src="' + e + '" class="img-circle">', a += "</div>", a += '<div class="col-lg-10">', a += '<div class="container">', a += ' <div class="row">', a += '<div class="col-lg-12">';
					var n = "";
					9 == b.noti_type ? a += '<div> <small> <a class="text-underline" href="msme-portfolio?id=' + b.idofnotifier + '"> ' + b.name + ' </a> has successfully launch. End of call of investment. You can now start paying next month."</small></div>' : 8 == b.noti_type ? a += '<div> <small> Your MSME  <a class="text-underline" href="msme-profile?id=' + b.msme_id + '"> ' + b.msme_name + ' </a> has successfully launch. End of call of investment."</small></div>' : 7 == b.noti_type ? (n = void 0 != b.msme_photo ? "../../bizsh.admin/Entrep/" + b.msme_photo : "img/unknown.jpg", a += '<div> <small> <a class="text-underline" href="msme-portfolio?id=' + b.idofnotifier + '"> ' + b.name + ' </a> has added daily financial progress. "</small></div>') : 6 == b.noti_type ? (n = void 0 != b.msme_photo ? "../../bizsh.admin/Entrep/" + b.msme_photo : "img/unknown.jpg", a += "<div> <small>Your recieved <span>₱</span> " + b.paidAmount + ' from <a class="text-underline" href="msme-portfolio?id=' + b.idofnotifier + '">' + b.name + '".</a></small></div>') : 5 == b.noti_type ? (n = void 0 != b.msme_photo ? "../../bizsh.admin/Entrep/" + b.msme_photo : "img/unknown.jpg", a += "<div> <small>" + b.name + " sucessfully invested <span>₱</span> " + b.amount + ' to YOUR MSME <img src="' + n + '" class="b-r-50" height="20" width="20"> <a class="text-underline" href="msme-profile?id=' + b.msme_id + '"> ' + b.msme_name + "</a>.</small></div>") : 4 == b.noti_type ? a += "<div> <small>Your investment of <span>₱</span> " + b.amount + ' in </small><a class="text-underline" href="msme-portfolio?id=' + b.msme_id + '"><small>' + b.msme_name + "</a> has been added.</small></div>" : 3 == b.noti_type ? (n = void 0 != b.e_photo ? "../../bizsh.admin/Entrep/" + b.e_photo : "img/unknown.jpg", a += '<div><a href="#"><img src="' + n + '" class="b-r-50" height="20" width="20"><small> ' + b.username + '</a> has Invited you to invest to his/her Business "<a class="text-underline" href="msme-portfolio?id=' + b.idofnotifier + '">' + b.name + '".</a></small></div>') : (n = void 0 != b.msme_photo ? "../../bizsh.admin/Entrep/" + b.msme_photo : "img/unknown.jpg", 1 == b.noti_type ? a += '<div><a href="investor-portfolio?id=' + b.idofnotifier + '"><small> ' + b.username + '</a> has Downloaded a  Contract to  "<a class="text-underline" href="msme-profile?id=' + b.msme_id + '"><img src="' + n + '" class="b-r-50" height="20" width="20"> ' + b.msme_name + '".</a></small></div>' : 2 == b.noti_type && (a += '<div><a href="investor-portfolio?id=' + b.idofnotifier + '"><small> ' + b.username + '</a> has Uploaded a <a target="_blank" href="../../bizsh.admin/Contract/' + b.contractfile + '"><img title="Click to Download" width="20" height="20" src="../../bizsh.admin/images/PDFLogo.png"/></a> Contract and <a target="_blank" href="../../bizsh.admin/Contract/' + b.proof + '"><img title="Click to Download" width="20" height="20" src="../../bizsh.admin/Contract/' + b.proof + '"/></a> Proof of Investment to  "<a class="text-underline" href="msme-profile?id=' + b.msme_id + '"><img src="' + n + '" class="b-r-50" height="20" width="20"> ' + b.msme_name + '".</a></small></div>')), my_date = b.noti_date.replace(/-/g, "/"), a += "<div>", 1 == b.status ? a += '<i onclick="statusNotification(this)" title="mark as read"  id="' + b.noti_id + '" data-stat="2" class="fa fa-dot-circle-o pull-right hand-point tras-anim noti_read"></i>' : a += '<i onclick="statusNotification(this)" title="mark as unread" id="' + b.noti_id + '" data-stat="1" class="fa fa-circle pull-right hand-point tras-anim noti_read"></i>', a += '<small class="chat-date pull-right m-r-10">' + $.timeago(new Date(my_date)) + " </small>", a += "</div>", a += "</div>", a += "</div>", a += "</div>", a += "</div>", a += "</div>", a += "</div>", a += "</li>"
				}
			setTimeout(function () {
				$("#loader-div").attr("hidden", !0), $("#notifi").html(a)
			}, 200)
		}
	})
}

function statusNotification(t) {
	var i = $(t).attr("id"),
		o = $(t).attr("data-stat"),
		a = [];
	a.push({
		name: "noti_id",
		value: i
	}), a.push({
		name: "stat",
		value: o
	}), a.push({
		name: "action",
		value: "Update notification status"
	}), $.ajax({
		type: "POST",
		url: "controller/NotificationController.php",
		data: a,
		success: function (t) {
			var i = jQuery.trim(t);
			console.log(i), "true" == i && (checkUserNotificationClick(), checkUserReadNotification(), checkUserUnreadNotification())
		}
	})
}
$(function () {
	whosLogin()
}), $("#noti_Button").click(function () {
	return $("#notifications").toggle("fast", "linear", function () {
		$("#notifications").is(":hidden") ? $(".fa-bell").css("color", "#484848") : ($(".fa-bell").css("color", "#21b08a"), checkUserNotificationClick())
	}), $("#noti_Button").removeClass("badge1"), !1
});