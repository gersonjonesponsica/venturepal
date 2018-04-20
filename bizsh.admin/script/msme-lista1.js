    var pageLocation = location.pathname.substring(location.pathname.lastIndexOf("/")+1);

$(function () {
	msmeTable();
	$(".clickrow").click(function() {
        window.location = $(this).data("href")+"?id="+$(this).data("id");
    });
});


function msmeTable(){
	$("#msmeList").DataTable({
        "iDisplayLength": 10,
        "aaSorting": [[4,'desc']]
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

        data.push({"name":"msme_id","value":id});
        data.push({"name":"stat","value":stat});
        data.push({"name":"action","value":"Change Status"});
   		$.post(
            'controller/MSMEController.php',
            data,
            function(info) {
            	if(jQuery.trim(info) == 'true'){
            		swal("Successfully Updated", "success");
            		$("#msmeList_handler").load(pageLocation +' #msmeList', function(){
						 msmeTable();
                         if(stat == 1){
                            sendSmsAndEmailNotification(id);
                        }
		         	});
            	}else{
            		swal("Cancelled", "Error while deleting the data. Refresh the page", "error");
            	}
            }
        );
	});
}

function sendSmsAndEmailNotification(msme_id){
    var data = [];
    data.push({"name":"msme_id", "value": msme_id});
    data.push({"name":"action", "value":"Get all match investor"});
        $.ajax({
            type:"POST",
            url:"controller/NotificationController.php",
            data: data,
            success: function(data) {
                json = JSON.parse(jQuery.trim(data));
                console.log(json)
                for(i in json){
                    b = json[i];
                    if (b.cpNotify_status == 1) {
                        var smsdata = [];
                         smsdata.push({"name":"action", "value":"Send sms Notification"});
                         smsdata.push({"name":"investor_number", "value": b.investor_cpNum});
                         smsdata.push({"name":"investor_name", "value": b.name});
                         smsdata.push({"name":"msme_name", "value": b.msme_name});
                         // console.log(emaildata)
                        $.ajax({
                            type:"POST",
                            url:"controller/NotificationController.php",
                            data: smsdata,
                            success: function(data) {
                                console.log(jQuery.trim(data));
                            }
                        });
                    }
                    if(b.eNotify_status == 1){
                         var emaildata = [];
                         emaildata.push({"name":"action", "value":"Send Email Notification"});
                         emaildata.push({"name":"email", "value": b.investor_email});
                         emaildata.push({"name":"name", "value": b.name});
                         emaildata.push({"name":"msme_name", "value": b.msme_name});
                         // console.log(emaildata)
                            $.ajax({
                                type:"POST",
                                url:"controller/NotificationController.php",
                                data: emaildata,
                                success: function(data) {
                                    console.log(jQuery.trim(data));
                                }
                        });                    
                    }

                    // console.log( + " " + b.investor_cpNum);
                }
            }
    });
}

function more(element) {
    var id = $(element).attr('id');
    // $('#moreMod').html('<div id="loadthis" class="loader-show-small"></div>');
    $('#msmeModal').modal({show: true});
    // alert(id);
    var data = [];
    data.push({"name":"msme_id", "value": id});
    data.push({"name":"action", "value":"Get msme by id"});
    $.ajax({
        type:"POST",
        url:"controller/MSMEController.php",
        data: data,
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json)
                var bP = '';
    var dC = '';
    var mP = '';
            $('#photo').html('<img src="'+'../bizsh.admin/Entrep/'+json['msme_logo']+'" class="border-table-color h-270  img-responsive" style="height: 270px !important">');
            // $('#nav_logo').html('<img src="'+''" class="center-bg b b-r-50" height="40" width="60">');
            
            $('#nameAndImage').html('<img class="img-circle" src="'+'../bizsh.admin/Entrep/'+json['e_photo']+'">'+
                   '<a href="search"><small> by  '+json['entrepname']+'</small></a>');
            // alert()
            // $('#nav_logo').attr('src','../bizsh.admin//Entrep/'+json['msme_logo']);
            if (json['msme_size'] == 1) 
                $('#badge').attr('src', '../biz/badge/micro.png');
            else if(json['msme_size'] == 2)
                $('#badge').attr('src','badge/small.png');
            else $('#badge').attr('src','badge/meduim.png');
            $('#txtName').html(json['msme_name']);
            $('#nav_name').html(json['msme_name']);
            $('#txtCapital').html('Target: <span> &#8369;</span> '+json['neededCapital']);
            var location = json['msme_brgy']+", "+json['city_name']+", "+ json['province_name']+ ', Philippines 6000';
            $('#txtLocation').html('<i class="ion-location "></i> '+location);
            $('#msme_desc').html(json['msme_desc']);
            $('#txtPhone').html(json['e_cpnum']);
            $('#txtTelephone').html(json['e_telnum']);
            $('#txtWebsite').html(json['msme_website']);
            $('#txtFacebook').html(json['e_fb']);
            $('#txtDate').html(json['msme_dateEstablish']);
            $('#txtProfit').html(json['msme_netprofit'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['msme_netprofit']) : json['msme_netprofit']);
            $('#rateStar').html(json['rateAvarage'] + ' / 5.0');
            var rateS = '';
    
                for(var i = 1; i <= 5; i++){
                    if (i <= json['rateAvarage']) {
                        rateS +='<i href="javascript:;" style="color: #CCCC5D" class="ion-star ion-size-25 m-3 hand-point"></i>';
                    }else{
                        rateS +='<i href="javascript:;" class="ion-star ion-size-25 m-3 hand-point"></i>';
                    }
                }

            $('#rate-div').html(rateS);
            $('#txtWorth').html(json['msme_networth'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['msme_networth']) : json['msme_networth']);
            // $('#txtGross').html('P '+json['msme_grossincome']);
            $('#txtGross').html(json['msme_grossincome'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['msme_grossincome']) : json['msme_grossincome']);
            // $('#txtRemainingDay').html('soon');
            // $('#txtLike').html(json['totalLikes']);
            $('#txtLike').html('<a class="" href="javascript:;"><i class="ion-heart "></i> '+json['totalLikes']+' likes</a>');
            $('#txtTotalRaise').html(json['total_raised'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['total_raised']) +' Raised' : json['total_raised']);
            // $('#txtRemainingCapitalNeeded').html(json['total_remaining']);
            $('#txtMin').html(json['msme_minInvestment'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['msme_minInvestment']) : json['msme_minInvestment']);
            $('#txtMax').html(json['msme_maxInvestment'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['msme_maxInvestment']) : json['msme_maxInvestment']);
            $('#txtTotalRaise').html(json['total_raised'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['total_raised']) +' Raised' : json['total_raised']);
            $('#txtRemainingCapitalNeeded').html(json['total_remaining'] != undefined ? '<span> &#8369;</span> '+numberWithCommas(json['total_remaining']) +' Remaining' : json['total_remaining']);
            $('#txtRaisePercent').html((json['percent_raised'] == "null" ? 0 : json['percent_raised'])+"% Raised");
            $('#txtRaisePercent').html('<div class="progress-bar" role="progressbar" style="width:25%; background-color: #21b08a; width:'+json['percent_raised']+'%'+' !important">'+json['percent_raised']+'%'+' Complete'+'</div>');
            
            $('#txtCategory').html(json['sub_name']);
            $('#txtRemainingVenture').html(json['remaining_venturer']);
            iStop = 'https://www.youtube.com/embed/Lop0VCYdpGQ?rel=0&amp';
            $("iframe#video")[0].src = iStop;
            
            // map(json['msme_latitude'],json['msme_longitude']);
            // var bPermit = json['biz_permit'].substring(json['biz_permit'].lastIndexOf("/")+1);
            bP += '<div class="interest-card border-gray tras-anim hand-point" data-file='+json['biz_permit']+' onclick="downloadDocument(this)">';
                bP +=  '<h1>Business Permit</h1>';      
            bP +=  '</div>';
            $('#bP').html(bP);

            // var dCer = json['dti_permit'].substring(json['dti_permit'].lastIndexOf("/")+1);
            dC += '<div class="interest-card border-gray tras-anim hand-point" data-file='+json['dti_permit']+' onclick="downloadDocument(this)">';
                dC +=  '<h1>DTI Certificate</h1>';      
            dC +=  '</div>';
            $('#dC').html(dC);

            // var bPermit = json['biz_permit'].substring(json['biz_permit'].lastIndexOf("/")+1);
            mP += '<div class="interest-card border-gray tras-anim hand-point" data-file='+json['mayor_permit']+' onclick="downloadDocument(this)">';
                mP +=  '<h1>Mayor'+"'s"+' Permit</h1>';      
            mP +=  '</div>';
            $('#mP').html(mP);
            // var daysPass = compareDate(json['approve_date']);
            $('#txtRemainingDay').html(json['rem']+" Days to go");
            getMSMEDocument(id)
            getMSMEGallery(id);
            getMsmeInvestor(id);
        }
    });
}

function getMSMEDocument(id){
    var data = [];
    var msme_id = id;
    data.push({"name":"msme_id", "value":msme_id});
    data.push({"name":"action", "value":"Get MSME document"});  
        $.ajax({
        type:"POST",
        url:"controller/MsmeController.php",
        data: data,
        success: function(data) {
            var json = JSON.parse(jQuery.trim(data));
            var doc = '';
            console.log(json);
            for(i in json){
                var filename = json[i].doc_name.substring(json[i].doc_name.lastIndexOf("/")+1);
                doc +=  '<div class="col-sm-6 m-t-10">';
                    doc += '<div class="interest-card border-gray tras-anim hand-point" data-file='+json[i].doc_name+' onclick="downloadDocument(this)">';
                        if (filename.length > 32) {
                            filename = filename.substring(0, 10) +' ... '+ filename.substring(32, filename.length);
                        }
                        doc +=  '<h1>'+filename+'</h1>';
                        // <img style="position: absolute;" src="../../bizsh.admin/images/PDFLogo.png" width="30" height="30" class="m-l-20 m-t-10">
                    doc +=  '</div>';
                doc +=   '</div>';
            }
            $('#document').html(doc);
      } 
    });
}

function download(url) {
  var link = document.createElement("a");
  $(link).click(function(e) {
    e.preventDefault();
    // $(link).attr('target', '_blank');
    // window.location.href = url;
    window.open(url,'_blank');
  });
  // alert('asdf');
  
   $(link).click();
}
function downloadDocument(element){
    var file = $(element).attr('data-file');
    download('../../bizsh.admin/Documents/Documents/'+file);
}
function getMSMEGallery(id){
    var data = [];
    var msme_id = id;
    data.push({"name":"msme_id", "value":msme_id});
    data.push({"name":"action", "value":"Get MSME gallery"});   
        $.ajax({
        type:"POST",
        url:"controller/MsmeController.php",
        data: data,
        success: function(data) {
            var json = JSON.parse(jQuery.trim(data));
            var gallery = '';
            for(i in json){
                // console.log(json[i].doc_name)
                gallery += '<a data-toggle="tooltip" data-placement="top"  data-rel="prettyPhoto" href="../../bizsh.admin/Documents/Gallery/'+json[i].doc_name+'" data-animate="fadeInUp"><img src="../../bizsh.admin/Documents/Gallery/'+json[i].doc_name+'" width="300" height="300" class="img-responsive center-block item"></a>'
            }
            // gallery += ' <img src="img/plus.png" width="300" height="300" class="img-responsive center-block item hand-point hover-opacity">'
            $('#galleryPhotos').html(gallery);
      } 
    });
}

function getMsmeInvestor(id){
    // alert(id)
  var data = [];
  var msme_id = id
  data.push({"name":"msme_id", "value":msme_id});
  data.push({"name":"action", "value":"Get msme investor"});
 
  $.ajax({
    type:"POST",
    url:"controller/MsmeController.php",
    data: data,
    success: function(data) {
      var json = JSON.parse(jQuery.trim(data));
      var sub = '';
       console.log(json);
      if (json.length > 0) {
        for(i in json){
          b = json[i];
          sub+='<div class="col-sm-4 col-lg-4 col-md-4">';
          sub+='<div class="card hovercard3 h-250 m-b-30">';
          sub+='<div class="portfolio-item graphic-design ">';
          sub+='<div class="he-wrap tpl6 ">';
          sub+='<img class="center-bg h-150 m-fit " id="member1" src="img/business-cover2.png" class="img-responsive" alt="">';
          sub+='<div class="he-view">';
         
          sub+='</div><!-- he view -->';
          sub+='</div><!-- he wrap -->';
          sub+='</div><!-- end col-12 -->';
          sub+='<div class="logo-box3">';
          sub+='<img class="rounded-circle center-div" src="../../bizsh.admin/Investor/'+b.investor_photo+'" alt="Card image cap">';
          sub+='</div>';
          sub+='<div class="container-fluid m-t-20">';
          sub+='<div class="row">';

          sub+='<div class="col-12">';
          sub+='<a class="minmax">Investment amount <span>&#8369;</span> '+(b.amount != undefined ?numberWithCommas(b.amount) : b.amount )+'</a>';
          sub+='</div>';
          sub+='</div>';
          sub+='</div>';
          sub+='<div class="info" >';
          sub+='<div class="title">'+b.investorName+'</div>';
          sub+='</div>';
          sub+='</div>';
          sub+='</div>';
        }
      }else{
        sub += '<div class="col-sm-12 m-t-10 m-b-10 hand-point" id="'+b.msme_id+'">';
            sub += '<div class="interest-card border-gray tras-anim">';
              sub +=  '<h1>No Investor Yet</h1>';
            sub +=  '</div>';
          sub +=  '</div>';
      }
      setTimeout(function (){
          $('#venturers').html(sub);
      }, 400);
      
    }
  });
}