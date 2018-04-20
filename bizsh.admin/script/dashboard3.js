var loader = '<div id="loadthis" class="loader-show-small"></div>';
$(function(){
    activityLogs();
    getTotalRaisedAmount();
    countClose();
    getTotalPending();
    getTotalnvestment();
    getTotalEntrep();
    getTotalnvestor();
    getTotalMsme();
    getMsmeRaised100();
     
});
 setInterval(function() {
   getLaunchMsme();
 }, 5000);


 setInterval(function() {
   activityLogs();
 }, 15000);

function getLaunchMsme(){
    // $('#total_raised_amount').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/MSMEController.php",
        data: [{"name":"action","value":"Get all launch msme"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json)
            if (json.length > 0) {
                for(i in json){
                    b = json[i];
                    $.ajax({
                        type:"POST",
                        url:"controller/MSMEController.php",
                        data: [{"name":"action","value":"launch msme"}, {"name":"msme_id","value": b['msme_id']}],
                        success: function(data) {
                            // json = JSON.parse();
                            console.log(jQuery.trim(data));
                            //   
                            if (jQuery.trim(data) == "true") {
                                notificationInvestorLaunch(b['msme_id']);
                            }
                        }
                    });
                }
            }
       

        }
    });
}
function notificationInvestorLaunch(msme_id){
    // alert(msme_id)
    var data = [];
    data.push({"name":"msme_id", "value": msme_id});
    data.push({"name":"action", "value":"Get msme investor"});
        $.ajax({
            type:"POST",
            url:"controller/MSMEController.php",
            data: data,
            success: function(data) {
                json = JSON.parse(jQuery.trim(data));
                console.log(json)
                for(i in json){
                    b = json[i];
                    if (i == 0) {
                        notification(b['v_id'], msme_id, 8);
                    }
                    notification(msme_id, b['v_id'], 9);              
                }
            }
    });
}

function getTotalRaisedAmount(){
    $('#total_raised_amount').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"Total raised amount"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            // console.log(json);
            $('#total_raised_amount').html('<span> &#8369;</span>'+json['amount']);
            
        }
    });
}
function countClose(){
    $('#countClose').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"msme that will close in 7 days"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#countClose').html(''+json['countclose']);
            
        }
    });
}

function getTotalPending(){
    $('#totalPending').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"total pending investment"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#totalPending').html(''+json['totalPending']);
            
        }
    });
}

function getTotalnvestment(){
    $('#totalnvestment').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"total deal investment"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#totalnvestment').html(''+json['totalnvestment']);
            
        }
    });
}

function getTotalEntrep(){
    $('#totalEntrep').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"registered entrepreneur"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#totalEntrep').html(''+json['totalEntrep']);
            
        }
    });
}

function getTotalnvestor(){
    $('#totalInvestor').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"registered investor"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#totalInvestor').html(''+json['totalInvestor']);
            
        }
    });
}

function getTotalMsme(){
    $('#totalmsme').html(loader);
    var dataFields = [];
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"total msme"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            $('#totalmsme').html(''+json['totalMsme']);
            
        }
    });
}

function getMsmeRaised100(){
    $('#msmsComplete').html(loader);
    $.ajax({
        type:"POST",
        url:"controller/DashboardController.php",
        data: [{"name":"action","value":"msmes raised 100%"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            // console.log(json);
            $('#msmsComplete').html(''+json['totalMsme']);
            
        }
    });
}

function activityLogs(){
    $('#logs').html(loader);
    $.ajax({
        type:"POST",
        url:"controller/NotificationController.php",
        data: [{"name":"action","value":"Get notification for logs"}],
        success: function(data) {
            json = JSON.parse(jQuery.trim(data));
            console.log(json);
            var datas = '';
            for(i in json){
                b = json[i];
                var user_logo = '';
    
              if(b['noti_type'] == 9){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Entrep/'+b['photo'] : 'img/unknown.jpg');
              }else if(b['noti_type'] == 8){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Investor/'+b['photo'] : 'img/unknown.jpg');
              }else if(b['noti_type'] == 7){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Entrep/'+b['photo'] : 'img/unknown.jpg');
              }else if(b['noti_type'] == 6){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Entrep/'+b['photo'] : 'img/unknown.jpg');
                user_photo = (b['msme_photo'] != undefined ? '../bizsh.admin/Entrep/'+b['msme_photo'] : 'img/unknown.jpg');
              }else if(b['noti_type'] == 5){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Investor/'+b['photo'] : 'img/unknown.jpg');
                 user_photo = (b['msme_photo'] != undefined ? '../bizsh.admin/Entrep/'+b['msme_photo'] : 'img/unknown.jpg');
              }else if(b['noti_type'] == 4){
                user_logo = (b['photo'] != undefined ? '../bizsh.admin/Entrep/'+b['photo'] : 'img/unknown.jpg');
                 user_photo = (b['e_photo'] != undefined ? '../bizsh.admin/Entrep/'+b['e_photo'] : 'img/unknown.jpg');
              }else if (b['noti_type'] == 3) {
                 user_photo = (b['e_photo'] != undefined ? '../bizsh.admin/Entrep/'+b['e_photo'] : 'img/unknown.jpg');
              }else{
                
                user_photo = (b['msme_photo'] != undefined ? '../bizsh.admin/Entrep/'+b['msme_photo'] : 'img/unknown.jpg');
                if (b['noti_type'] == 1) {
                      user_logo = (b['photo'] != undefined ? '../bizsh.admin/Investor/'+b['photo'] : 'img/unknown.jpg');
                }else if (b['noti_type'] == 2) {
                  user_logo = (b['photo'] != undefined ? '../bizsh.admin/Investor/'+b['photo'] : 'img/unknown.jpg');
                }
              }
                if (i == 0) {
                     datas+=' <div class="row act" style=" padding: 5px; border-bottom: 1px solid #EEEEEE; border-top: 1px solid #EEEEEE; ">';
                 }else{
                    datas+=' <div class="row act" style=" padding: 5px; border-bottom: 1px solid #EEEEEE;  ">';
                 }
                
                  datas+='<div class="col-3"><img style="border-radius: 50%"src="'+user_logo+'" width="60" height="60"></div>';
                  datas+='<div class="col-9">';
                    datas+='<div class="row m-r-10">';
                    if (b['noti_type'] == 1) {
                      datas +='<div class="c"> '+b['username']+' has Downloaded a  Contract to  " <img src="'+user_photo+'" class="b-r-50" height="20" width="20"> '+b['msme_name']+'".</div>';

                    }else if (b['noti_type'] == 2) {
                      datas+='<div class="c"> '+b['username']+'  has Uploaded a <a target="_blank" href="'+'../../bizsh.admin/Contract/'+b['contractfile']+'"><img title="Click to Download" width="20" height="20" src="../../bizsh.admin/images/PDFLogo.png"/></a> Contract and <a target="_blank" href="'+'../../bizsh.admin/Contract/'+b['proof']+'"><img title="Click to Download" width="20" height="20" src="'+'../../bizsh.admin/Contract/'+b['proof']+'"/></a> Proof of Investment to  "<a class="text-underline" href="msme-profile?id='+b['msme_id']+'"><img src="'+user_photo+'" class="b-r-50" height="20" width="20"> '+b['msme_name']+'".</a></div>';
                    }else if (b['noti_type'] == 3) {
                      datas+='<div class="c"><img src="'+user_photo+'" class="b-r-50" height="20" width="20"><small> '+b['username']+' has Invited '+b['name']+' to invest to his/her Business "<a class="text-underline" href="msme-portfolio?id='+b['idofnotifier']+'">'+b['name']+'".</a></small></div>';
                    }else if (b['noti_type'] == 4) {
                       datas+='<div class="c"> Investment amounting of <span>&#8369;</span> '+numberWithCommas(b['amount'])+' in '+b['msme_name']+' has been added.</div>';
                    }else if (b['noti_type'] == 5) {
                      datas+='<div class="c">'+b['name']+' sent sucessfully added <span>&#8369;</span> '+numberWithCommas(b['amount'])+' to MSME <img src="'+user_photo+'" class="b-r-50" height="20" width="20"> <a class="text-underline" href="msme-profile?id='+b['msme_id']+'"> '+b['msme_name']+'</a></div>';
                    }else if (b['noti_type'] == 6) {
                      datas+='<div class="c">'+b['name']+'  sent <span>&#8369;</span> '+numberWithCommas(b['paidAmount'])+' to '+b['username']+'".</div>';
                    }else if (b['noti_type'] == 7) {
                      datas+='<div class="c"> '+b['msme_name']+'  has been added financial progress to MSME Proof of Investment to ' +b['msme_name']+'"</div>';
                    }else if (b['noti_type'] == 8) {
                      datas+='<div class="c"> '+b['msme_name']+'  has Successfully launch. End of Investment</div>';
                    }else if (b['noti_type'] == 9) {
                        datas+='<div class="c"> '+b['msme_name']+'  has Successfully launch. End of Investment</div>';
                    }
                    datas+='</div>';
                    datas+='<div class="row" style="position: absolute; bottom: 0;">';
                            datas+='<small style="color: #999999">'+b['noti_date']+' </small>';
                    datas+='</div>';
                  datas+='</div>';
                datas+='</div>';
            }
            $('#logs').html(datas);
        }
    });
}