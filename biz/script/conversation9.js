var a,b,c,d,height=0,pageLocation=location.pathname.substring(location.pathname.lastIndexOf("/")+1),title="";function getUserConvo(){var e=$("#usertype").val(),a=0;1==e?(a=$("#accountid").val(),$("#loader-div-2").removeAttr("hidden")):(a=$("#msme_id").val(),$("#loader-div-2").removeAttr("hidden"));var s=getToid(),t=[];t.push({name:"from_id",value:a}),t.push({name:"usertype",value:e}),t.push({name:"to_id",value:s}),t.push({name:"action",value:"Get all user convo"}),console.log(t),$.ajax({type:"POST",url:"controller/MessageController.php",data:t,success:function(a){json=JSON.parse(jQuery.trim(a)),console.log(json);var t="";if(0!=json)for(i in json){b=json[i];var o="";o=0==i?"border-top: 1px solid #d6d8d8;":"",1==e?b.msmeId==s?t+='<div style="border-bottom: 1px solid #d6d8d8; '+o+'" class="hand-point row side-chat-user user-active p-5" data-id='+b.msmeId+' data-file="'+b.name+'" onclick="showMessage(this)">':t+='<div style="border-bottom: 1px solid #d6d8d8; '+o+'" class="hand-point row side-chat-user p-5" data-id='+b.msmeId+" data-file="+b.name+' onclick="showMessage(this)">':b.investorId==s?t+='<div style="border-bottom: 1px solid #d6d8d8; '+o+'" class="hand-point row side-chat-user user-active p-5" data-id='+b.investorId+" data-file="+b.name+' onclick="showMessage(this)">':t+='<div style="border-bottom: 1px solid #d6d8d8; '+o+'" class="hand-point row side-chat-user p-5" data-id='+b.investorId+" data-file="+b.name+' onclick="showMessage(this)">',t+='<div class="col-lg-2">',t+=2==e?'<img class="img-circle-50" src="../../bizsh.admin/Investor/'+b.logo+'" alt="Profile image example" >':'<img class="img-circle-50" src="../../bizsh.admin/Entrep/'+b.logo+'" alt="Profile image example" >',t+="</div>",t+='<div class="col-lg-10" style="padding-left: 20px">',t+='<h6 class="m-t-10" id="name'+s+'">'+b.name+"</h6>",t+='<h6 class="chat-date m-t-5">'+b.timem+"</h6>",t+="</div>",t+="</div>"}else t+='<div class="col-sm-12 m-t-10">',t+='<div class="interest-card tras-anim">',t+="<h1>No Conversation yet ..</h1>",t+="</div>",t+="</div>";setTimeout(function(){$("#loader-div-2").attr("hidden",!0),$("#convo").html(t)},400)}})}function getHeightScroll(){return $("#messageBoard").prop("scrollHeight")}function showMessage(e){var a=$(e).attr("data-id"),s=$("#usertype").val(),t=$("#msme_id").val();$(e).attr("data-file");$(".side-chat-user").removeClass("user-active"),$(e).addClass("user-active");$("#to_id").val(a);window.location.href=1==s?"message-us?to_id="+a:"message-us?profile="+t+"&to_id="+a}function getToid(){return $("#to_id").val()}$(function(){$("#chat").click(function(){$("#usertype").val();getUserConvo()})});