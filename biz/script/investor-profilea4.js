var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);

function checkMessage() {
 $("#messageCheck").change(function() {
  var t = "No" == $("#messageStatus").text() ? 1 : 0,
   e = [];
  e.push({
   name: "userid",
   value: $("#accountid").val()
  }), e.push({
   name: "message_status",
   value: t
  }), e.push({
   name: "action",
   value: "Update message status"
  }), $.ajax({
   type: "POST",
   url: "controller/AccountsController.php",
   data: e,
   success: function(t) {
    "true" == jQuery.trim(t) ? 1 == ("No" == $("#messageStatus").text() ? 1 : 0) ? notify("info-notify", "You will be recieving text messages from us") : notify("info-notify", "You will not be recieving text messages from us") : notify("info-notify", t);
    getProfile()
   }
  })
 })
}

function emailCheck() {
 $("#emailCheck").change(function() {
  var t = "No" == $("#emailStatus").text() ? 1 : 0,
   e = [];
  e.push({
   name: "userid",
   value: $("#accountid").val()
  }), e.push({
   name: "email_status",
   value: t
  }), e.push({
   name: "action",
   value: "Update email status"
  }), $.ajax({
   type: "POST",
   url: "controller/AccountsController.php",
   data: e,
   success: function(t) {
    "true" == jQuery.trim(t) ? 1 == ("No" == $("#emailStatus").text() ? 1 : 0) ? notify("info-notify", "You will be recieving emails from us") : notify("info-notify", "You will not be recieving emails from us") : notify("info-notify", t);
    getProfile()
   }
  })
 })
}

function getInvestorInterest() {
 var t = [],
  e = $("#accountid").val();
 t.push({
  name: "v_id",
  value: e
 }), t.push({
  name: "action",
  value: "Get investor interest"
 }), $.ajax({
  type: "POST",
  url: "controller/InterestController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    n = "";
   if (0 != e.length)
    for (i in e) a = e[i], n += '<div class="col-sm-6 m-t-10">', n += '<div class="interest-card border-gray tras-anim">', n += "<h1>" + e[i].sub_name + "</h1>", n += "</div>", n += "</div>";
   else n += '<div class="col-sm-8 m-t-10  m-l-100">', n += '<div class="interest-card border-gray tras-anim hand-point" onclick="openInterestModal()">', n += "<h1> + Add Interest</h1>", n += "</div>", n += "</div>";
   $("#interest_").html(n)
  }
 })
}

function openInterestModal() {
 $("#btn_interest").click()
}
$.validator.addMethod("valueNotEquals", function(t, e, a) {
 return a != e.value
}, "This field is required"), $(function() {
 emailCheck(), checkMessage(), getPendingApplication(), getProfile(), getInvestorInvestment(),getInvestorInterest(), whosLogin(), getInvestorEarnings(), $("#save-overview").on("click", function() {
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
  submitHandler: function(t) {
   $("#loadthis").addClass("loader-show");
   var e = [];
   e.push({
    name: "userid",
    value: $("#accountid").val()
   }), e.push({
    name: "maxinve",
    value: $("#maxinve").val()
   }), e.push({
    name: "mininve",
    value: $("#mininve").val()
   }), e.push({
    name: "action",
    value: "Update Max min investment"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Updated overview details") : notify("info-notify", t), getProfile()
    }
   })
  }
 }), $("#changePasswordForm").validate({
  rules: {
   password: {
    minlength: 6,
    required: !0
   },
   repassword: {
    required: !0,
    equalTo: "#password"
   }
  },
  submitHandler: function(t) {
   var e = [],
    a = $("#userid").val();
   e.push({
    name: "acc_id",
    value: a
   }), e.push({
    name: "password",
    value: $("#password").val()
   }), e.push({
    name: "action",
    value: "Change password"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Password changed") : notify("info-notify", "Error changing password")
    }
   })
  }
 }), $("#save-account-setting").click(function() {
  $("#changePasswordForm").submit()
 }), $("#save-about-me").on("click", function() {
  $("#addAboutMeForm").submit()
 }), $("#addAboutMeForm").validate({
  rules: {
   aboutme: "required"
  },
  submitHandler: function(t) {
   $("#loadthis").addClass("loader-show");
   var e = [];
   e.push({
    name: "userid",
    value: $("#accountid").val()
   }), e.push({
    name: "aboutme",
    value: $("#aboutme").val()
   }), e.push({
    name: "action",
    value: "Update About me"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Description Updated") : notify("info-notify", t), getProfile(), $("#loadthis").removeClass("loader-show")
    }
   })
  }
 }), $("#btnWallet").click(function() {
  $("#walletModal").modal({
   show: !0
  })
 }), $("#btnSaveWallet").click(function() {
  $("#updateWallet").submit()
 }), $("#updateWallet").validate({
  rules: {
   wallet: "required"
  },
  submitHandler: function(t) {
   $("#loadthis").addClass("loader-show");
   var e = [];
   (e = $("form").serializeArray()).push({
    name: "userid",
    value: $("#accountid").val()
   }), e.push({
    name: "action",
    value: "Update Wallet"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Wallet Updated") : notify("info-notify", t), getProfile(), $("#loadthis").removeClass("loader-show")
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
  submitHandler: function(t) {
   $("#loadthis").addClass("loader-show");
   var e = [];
   (e = $("form").serializeArray()).push({
    name: "userid",
    value: $("#accountid").val()
   }), e.push({
    name: "action",
    value: "Update Profile Info"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Profile Information Updated") : notify("info-notify", t), getProfile(), $("#loadthis").removeClass("loader-show")
    }
   })
  }
 }), $("#save-profile-detail").on("click", function() {
  $("#addFormProfileDetail").submit()
 }), $("#save-contact-detail").on("click", function() {
  $("#addFormContactDetail").submit()
 }), $("#addFormContactDetail").validate({
  rules: {
   email: "required",
   facebook: "required",
   mobile: "required",
   telephone: "required"
  },
  submitHandler: function(t) {
   $("#loadthis").addClass("loader-show");
   var e = [];
   (e = $("form").serializeArray()).push({
    name: "userid",
    value: $("#accountid").val()
   }), e.push({
    name: "action",
    value: "Update Contact"
   }), $.ajax({
    type: "POST",
    url: "controller/AccountsController.php",
    data: e,
    success: function(t) {
     "true" == jQuery.trim(t) ? notify("success-notify", "Contacts Updated") : "inactive" == jQuery.trim(t) ? notify("info-notify", "Please check inbox and verify your account") : "no account" == jQuery.trim(t) ? notify("error-notify", "Please create your account") : notify("info-notify", t), verify(0), getProfile(), $("#loadthis").removeClass("loader-show")
    }
   })
  }
 })
}), $("#photo_button").on("click", function() {
 $("#profile_photo").click()
}), $("#profile_photo").on("change", function() {
 a = $(this)[0].files, 0 != a.length && $("#photoForm").submit()
}), $("#photoForm").submit(function(t) {
 data = new FormData(this), $("#loadthis").addClass("loader-show");
 var e = $("#accountid").val();
 data.append("action", "Upload Investor Photo"), data.append("investor_id", e), $.ajax({
  url: "controller/AccountsController.php",
  type: "POST",
  data: data,
  cache: !1,
  processData: !1,
  contentType: !1,
  success: function(t) {
   "upload" == jQuery.trim(t) ? notify("success-notify", "Profile photo updated") : notify("info-notify", t), getProfile(), whosLogin()
  }
 }), t.preventDefault()
});
var loader = '<div id="loadthis" class="loader-show-small"></div>';

function viewHistory2(t) {
 var e = $("#accountid").val();
 $("#historyModal").modal({
  show: !0
 }), $("#historyModBody").html(loader), $("#basic").html(loader), $("#contract").html(loader), $("#proof").html(loader), $("#contract_date").html(loader);
 var a = [];
 a.push({
  name: "v_id",
  value: e
 }), a.push({
  name: "msme_id",
  value: t
 }), a.push({
  name: "action",
  value: "get Investor Msme History"
 }), $.ajax({
  type: "POST",
  url: "controller/MsmeController.php",
  data: a,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    a = "",
    n = "",
    i = "";
   a += '<div class="col-sm-12 col-lg-12 col-md-12">', a += '<div class="card hovercard3 h-250 m-b-30">', a += '<div class="portfolio-item graphic-design ">', a += '<div class="he-wrap tpl6 ">', a += '<img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">', a += '<div class="he-view">', a += '<div class="bg a0" data-animate="fadeIn">', a += '<h3 class="a1 no-border" data-animate="fadeInDown">' + e.msme_name + "</h3>", a += ' <a data-toggle="tooltip" title="View MSME Portfolio" data-rel="prettyPhoto" href="msme-portfolio?id=' + e.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search ion-size-20"></i></a>', a += '<a title="Message Investor" href="message-us?to_id=' + e.msme_id + '" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-chatbox-working ion-size-20"></i></a>', a += " </div>\x3c!-- he bg --\x3e", a += "</div>\x3c!-- he view --\x3e", a += "</div>\x3c!-- he wrap --\x3e", a += "</div>\x3c!-- end col-12 --\x3e", a += '<div class="logo-box3">', a += '<img class="rounded-circle center-div" src="../../bizsh.admin/Entrep/' + e.msme_logo + '" alt="Card image cap">', a += "</div>", a += '<div class="container-fluid m-t-20">', a += '<div class="row">', a += '<div class="col-2"></div>', a += '<div class="col-8">', a += '<a class="minmax">Your investment amount <span>&#8369;</span> ' + (void 0 != e.amount ? numberWithCommas(e.amount) : e.amount) + "</a>", a += "</div>", a += '<div class="col-lg-2"></div>', a += "</div>", a += "</div>", a += '<div class="info" >', a += '<div class="title">' + e.msme_name + "</div>", a += "</div>", a += "</div>", a += "</div>", n += '<div class="col-sm-12 col-lg-12 col-md-12">', e.contract_file.includes("pdf") ? (n += '<a  style="align: right;" href="javascript:expandPdf(this)">Expand <i class="ion-chevron-left"></i><i class="ion-chevron-right"></i> </a>', n += '<a class="dmbutton a2" style="display: inline-block; width: 100%" data-rel="prettyPhoto" href="../../bizsh.admin/Contract/' + e.contract_file + '" target="_blank" data-animate="fadeInUp"><object style="pointer-events: none;" data="../../bizsh.admin/Contract/' + e.contract_file + '" src= "../../bizsh.admin/Contract/' + e.contract_file + '" width= "100%" height= "280px" id="pdfViewer"></object></a>') : n += '<a target="_blank" data-rel="prettyPhoto" href="../../bizsh.admin/Contract/' + e.contract_file + '"  data-animate="fadeInUp"><img class="dmbutton a2" src="../../bizsh.admin/Contract/' + e.contract_file + '" width="100%" height="280px"></a>', n += "</div>", i += '<div class="col-sm-12 col-lg-12 col-md-12">', e.proof_invesment.includes("pdf") ? i += '<a class="dmbutton a2" style="display: inline-block;" data-rel="prettyPhoto" href="../../bizsh.admin/Contract/' + e.proof_invesment + '" target="_blank" data-animate="fadeInUp"><object style="pointer-events: none;" data="../../bizsh.admin/Contract/' + e.proof_invesment + '" src= "../../bizsh.admin/Contract/' + e.proof_invesment + '" width= "100%" height= "280px"></object></a>' : i += '<a target="_blank" data-rel="prettyPhoto" href="../../bizsh.admin/Contract/' + e.proof_invesment + '"  data-animate="fadeInUp"><img class="dmbutton a2" src="../../bizsh.admin/Contract/' + e.proof_invesment + '" width="100%" height="280px"></a>', i += "</div>", setTimeout(function() {
    $("#basic").html(a), $("#contract").html(n), $("#proof").html(i), my_date = e.contract_date.replace(/-/g, "/"), newDate = $.timeago(new Date(my_date)) + ", " + e.contract_date, $("#contract_date").html(newDate)
   }, 500)
  }
 })
}

function expandPdf(t) {
 $("#pdfViewer").height() < 600 ? $("#pdfViewer").height(600) : $("#pdfViewer").height(280)
}
loader = '<div id="loadthis" class="loader-show-small"></div>';

function getInvestorEarnings() {
 $("#earnTableBody").html(loader);
 var t = [],
  e = $("#accountid").val();
 t.push({
  name: "investor_id",
  value: e
 }), t.push({
  name: "action",
  value: "Investor Earnings"
 }), $.ajax({
  type: "POST",
  url: "controller/PayoutController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    a = "";
   for (i in e) b = e[i], a += "<tr>", 1 == b.call_status ? status = "On-Going" : status = "PAID", a += "<td>" + b.msmename + "</td><td><span> &#8369;</span> " + b.amount + "</td><td>" + status + "</td><td ><span> &#8369;</span> " + (null != b.interestrate ? numberWithCommas(b.interestrate) + (0 == b.call_status ? '<a id="" href="javascript:;" onclick="withdraw(' + b.interestrate + ')"> withdraw</a>' : "") : 0) + "</td>", a += "</tr>";
   $("#earnTableBody_").html(a), getInvestorTotalEarnings()
  }
 })
}

function withdraw(t) {
 var e = [],
  a = $("#accountid").val();
 e.push({
  name: "id",
  value: a
 }), e.push({
  name: "type",
  value: type
 }), e.push({
  name: "action",
  value: "Ask to withdraw"
 }), $.ajax({
  type: "POST",
  url: "controller/WithdrawController.php",
  data: e,
  success: function(t) {}
 })
}

function getInvestorTotalEarnings() {
 var t = [],
  e = $("#accountid").val();
 t.push({
  name: "investor_id",
  value: e
 }), t.push({
  name: "action",
  value: "Investor Total Earnings"
 }), $.ajax({
  type: "POST",
  url: "controller/PayoutController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    a = "";
   a += '<tr style=" font-size: 20px !important;">', a += '<td align="right" colspan="3">Interest Income </td><td class="titletd"><span> &#8369;</span> ' + (null != e.totalInterest ? numberWithCommas(e.totalInterest) : 0) + "</td>", a += "</tr>", a += '<tr style="font-size: 25px !important;">', a += '<td align="right"  colspan="3">Total Cash</td><td style="color: red;" class="titletd"><span> &#8369;</span> ' + (null != e.totalMoney ? numberWithCommas(e.totalMoney) : 0) + "</td>", a += "</tr>", $("#earnTableBody_").append(a)
  }
 })
}

function getInvestorInvestment() {
 var t = [],
  e = $("#accountid").val();
 t.push({
  name: "investor_id",
  value: e
 }), t.push({
  name: "action",
  value: "Get investor investment"
 }), $.ajax({
  type: "POST",
  url: "controller/ContractController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    n = "";
   if (0 != e.length) {
    $("#steptwo").addClass("number-badge success"), $("#steptwo").attr("data-badge", e.length + "");
    for (i in e) a = e[i], n += '<div class="col-sm-8 m-b-10  m-l-100">', n += '<div class="interest-card border-gray tras-anim">', n += '<div class="row hand-point"  onclick="viewHistory2(' + a.msme_id + ')">', n += '<div class="col-lg-2">', n += '<img src="../../bizsh.admin/Entrep/' + a.msme_logo + '" class="img-circle m-t-5 m-l-5" height="40" width="40" />', n += "</div>", n += '<div class="col-lg-8 " >', n += '<h1 id="' + a.msme_id + '" profile="' + $("#msme_id").val() + '" class="hand-point">' + a.msme_name + "</h1>", n += "</div>", n += '<div class="col-lg-1">', a.percent_raised >= 100 || a.rem <= 0 ? (stat = "success", title = "Investment Successful") : a.percent_raised <= 100 && 0 != a.percent_raised && a.rem > 0 ? (stat = "info", title = "Accepting Investment") : a.percent_raised <= 100 && a.percent_raised >= 1 ? (stat = "warning", title = "Accepting Investment") : 0 == a.percent_raised && a.rem <= 0 ? (stat = "error", title = "End of Investment, No Investment") : a.percent_raised > 0 && a.rem <= 0 ? (stat = "endparlyfunded", title = "Partly Funded, End of Investment") : (stat = "pending", title = "Pending Registration"), n += '<div title="' + title + '" class="circle-status ' + stat + ' m-t-15"></div>', n += "</div>", n += "</div>", n += "</div>", n += "</div>";
    $("#investment").html(n)
   } else n += '<div class="col-sm-8 m-t-10 m-b-20  m-l-100">', n += '<div class="interest-card tras-anim">', n += "<h1>No transaction yet</h1>", n += "</div>", n += "</div>", $("#investment").html(n)
  }
 })
}

function getPendingApplication() {
 var t = [],
  e = $("#accountid").val();
 t.push({
  name: "investor_id",
  value: e
 }), t.push({
  name: "action",
  value: "Total Pending application"
 }), $.ajax({
  type: "POST",
  url: "controller/ContractController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    n = "";
   if (0 != e.length) {
    $("#stepthree").addClass("number-badge danger"), $("#stepthree").attr("data-badge", e.length + "");
    for (i in e) a = e[i], n += '<div class="col-sm-8 m-t-10 m-l-100">', n += '<div data-id="' + a.msme_id + '" onclick="viewPending(this)" class="interest-card border-gray tras-anim hand-point">', n += "<h1>" + a.msme_name + "</h1>", n += "</div>", n += "</div>";
    $("#pending").html(n)
   } else n += '<div class="col-sm-8 m-t-10 m-b-20  m-l-100">', n += '<div class="interest-card tras-anim">', n += "<h1>No transaction yet</h1>", n += "</div>", n += "</div>", $("#pending").html(n), $("#stepthree").removeClass("number-badge")
  }
 })
}

function viewPending(t) {
 window.location.href = "contract?id=" + $(t).attr("data-id")
}

function getProfile() {
 var t = [],
  e = $("#accountid").val(),
  a = $("#usertype").val();
 t.push({
  name: "id",
  value: e
 }), t.push({
  name: "type",
  value: a
 }), t.push({
  name: "action",
  value: "Get profile"
 }), $.ajax({
  type: "POST",
  url: "controller/AccountsController.php",
  data: t,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    a = e.investor_fname + " " + e.investor_lname,
    n = e.investor_street + " " + e.city_name + ", " + e.province_name;
   "" != e.investor_fname && "" != e.investor_lname || $("#profileMod").modal({
    show: !0
   }), $("#txt_fullname").text(a), $("#txt_location").html('<i class="ion-location"></i> ' + n), $("#txt_fname").html(e.investor_fname), $("#fname").val(e.investor_fname), $("#txt_lname").text(e.investor_lname), $("#lname").val(e.investor_lname), $("#txt_mname").text(e.investor_mname), $("#mname").val(e.investor_mname), $("#txt_wallet").html(null != e.investor_wallet || void 0 != e.investor_wallet || e.investor_wallet > 0 ? "<span> &#8369;</span>" + numberWithCommas(e.investor_wallet) : "0.00");
   $("#wallet").val(e.investor_wallet);
   if (e.investor_wallet <= 0 && ($("#capMod").modal({
     show: !0
    }), alert), null != e.investor_wallet || void 0 != e.investor_wallet) {
    var i = "",
     o = "";
    o += '<option value="' + e.max_investment + '"><span> &#8369;</span> ' + numberWithCommas(e.max_investment) + "</option>";
    for (var s = e.investor_wallet; s >= 1e3; s -= 1e3) e.max_investment != s && (o += '<option value="' + s + '"><span> &#8369;</span> ' + numberWithCommas(s) + "</option>");
    i += '<option value="' + e.min_investment + '"><span> &#8369;</span> ' + numberWithCommas(e.min_investment) + "</option>";
    for (s = 1e3; s <= e.investor_wallet; s += 1e3) e.min_investment != s && (i += '<option value="' + s + '"><span> &#8369;</span> ' + numberWithCommas(s) + "</option>");
    1 == e.phone_verify_status ? ($("#phone_").removeClass("no-display"), $("#phone__").addClass("no-display")) : 2 == e.phone_verify_status ? ($("#phone_").addClass("no-display"), $("#phone__").removeClass("no-display"), $("#phone__").html('<a class="btn btn-default" onclick="verify2(this)">Verify2</a>')) : ($("#phone_").addClass("no-display"), $("#phone__").removeClass("no-display"), $("#phone__").html('<a class="btn btn-default" onclick="verify(2)">Verify</a>')), $("#maxinve").html(o), $("#mininve").html(i)
   }
   $("#txt_max").html(null != e.max_investment || void 0 != e.max_investment ? "<span> &#8369;</span> " + numberWithCommas(e.max_investment) : ""), $("#txt_min").html(null != e.min_investment || void 0 != e.min_investment ? "<span> &#8369;</span> " + numberWithCommas(e.min_investment) : ""), $("#txt_city").text(e.city_name), $("#city").val(e.investor_city), $("#txt_state").text(e.province_name), $("#state").val(e.investor_state), $("#txt_brgy").text(e.investor_street), $("#brgy").val(e.investor_street), getAllState(e.investor_state, e.province_name), getAllCity(e.investor_state, e.city_name, e.investor_city), $("#txt_mobile").text(e.investor_cpNum), $("#mobile").val(e.investor_cpNum), $("#txt_telephone").text(e.investor_telNum), $("#telephone").val(e.investor_telNum), $("#txt_email").text(e.acc_email), $("#email").val(e.acc_email), $("#txt_facebook").text(e.investor_fb), $("#facebook").val(e.investor_fb);
   $("#txt_aboutme").text(e.investor_desc), $("#aboutme").val(e.investor_desc), $("#messageStatus").text(1 == e.cpNotify_status ? "Yes" : "No"), $("#messageCheck").prop("checked", 1 == e.cpNotify_status), $("#emailCheck").prop("checked", 1 == e.eNotify_status), $("#emailStatus").text(1 == e.eNotify_status ? "Yes" : "No")
  }
 })
}

function verify2() {
 $("#verifyPhoneModal").modal({
  show: !0
 })
}

function verify(t) {
 var e = [];
 e.push({
  name: "userid",
  value: $("#accountid").val()
 }), e.push({
  name: "stat",
  value: t
 }), e.push({
  name: "number",
  value: $("#mobile").val()
 }), e.push({
  name: "action",
  value: "Send phone verification code"
 }), $.ajax({
  type: "POST",
  url: "controller/AccountsController.php",
  data: e,
  success: function(t) {
   "false" != JSON.parse(jQuery.trim(t)) ? $("#verifyPhoneModal").modal({
    show: !0
   }) : alert("error")
  }
 })
}

function getAllState(t, e) {
 var a = [];
 a.push({
  name: "action",
  value: "Get all state"
 }), $.ajax({
  type: "POST",
  url: "controller/GlobalController.php",
  data: a,
  success: function(a) {
   var n = JSON.parse(jQuery.trim(a)),
    o = "";
   o += '<option value="' + t + '">' + e + "</option>";
   var s = "";
   for (i in n)(s = n[i])[0] != t && (o += '<option value="' + s[0] + '">' + s[1] + "</option>");
   $("#state").html(o)
  }
 })
}

function changeState(t) {
 getAllCity(t.value)
}

function getAllCity(t, e, a) {
 var n = t,
  o = (state, []);
 o.push({
  name: "prov_id",
  value: n
 }), o.push({
  name: "action",
  value: "Get all city"
 }), void 0 == a && void 0 == e ? $.ajax({
  type: "POST",
  url: "controller/GlobalController.php",
  data: o,
  success: function(t) {
   var e = JSON.parse(jQuery.trim(t)),
    a = "",
    n = "";
   for (i in e) a += '<option value="' + (n = e[i])[0] + '">' + n[1] + "</option>";
   $("#city").html(a)
  }
 }) : $.ajax({
  type: "POST",
  url: "controller/GlobalController.php",
  data: o,
  success: function(t) {
   var n = JSON.parse(jQuery.trim(t)),
    o = "";
   o += '<option value="' + a + '">' + e + "</option>";
   var s = "";
   for (i in n)(s = n[i])[0] != a && (o += '<option value="' + s[0] + '">' + s[1] + "</option>");
   $("#city").html(o)
  }
 })
}
$("#btnVerify").click(function() {
 $("#verifyPhoneForm").submit()
}), $("#verifyPhoneForm").validate({
 rules: {
  p_code: "required"
 },
 submitHandler: function(t) {
  var e = [];
  e.push({
   name: "userid",
   value: $("#accountid").val()
  }), e.push({
   name: "p_code",
   value: $("#p_code").val()
  }), e.push({
   name: "action",
   value: "Verify phone"
  }), $.ajax({
   type: "POST",
   url: "controller/AccountsController.php",
   data: e,
   success: function(t) {
    "true" == jQuery.trim(t) ? notify("success-notify", "Phone number verified") : notify("info-notify", "Wrong code"), getProfile()
   }
  })
 }
});