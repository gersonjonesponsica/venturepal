var pageLocation=location.pathname.substring(location.pathname.lastIndexOf("/")+1);function getInvestorInterest(){var t=[],e=$("#prof_id").val();t.push({name:"v_id",value:e}),t.push({name:"action",value:"Get investor interest"}),$.ajax({type:"POST",url:"controller/InterestController.php",data:t,success:function(t){var e=JSON.parse(jQuery.trim(t));console.log(e);var o="";if(0!=e.length)for(i in e)a=e[i],o+='<div class="col-sm-6 m-t-10">',o+='<div class="interest-card border-gray tras-anim">',o+="<h1>"+e[i].sub_name+"</h1>",o+="</div>",o+="</div>";else o+='<div class="col-sm-8 m-t-10  m-l-100">',o+='<div class="interest-card border-gray tras-anim hand-point" onclick="openInterestModal()">',o+="<h1> + Add Interest</h1>",o+="</div>",o+="</div>";$("#interest_").html(o)}})}function checkLike(){var t=$("#prof_id").val(),e=$("#accountid").val(),a=[];a.push({name:"to_id",value:t}),a.push({name:"from_id",value:e}),a.push({name:"action",value:"Check like status"});$.ajax({type:"POST",url:"controller/LikeController.php",data:a,success:function(e){json=JSON.parse(jQuery.trim(e)),0!=json?1==json.si_status?($(".like_").attr("to_id",t),$(".like_").attr("data_status","0"),$(".like_").attr("title","Unlike :( "),$(".like_").css({"background-color":"#222222",color:"white"})):($(".like_").attr("to_id",t),$(".like_").attr("data_status","1"),$(".like_").attr("title","I Like this :)"),$(".like_").css({"background-color":"#21B08A",color:"white"})):(json,$(".like_").attr("to_id",t),$(".like_").attr("data_status","1"),$(".like_").attr("title","I Like this :)"),$(".like_").css({"background-color":"#21B08A",color:"white"}))}})}function checkBookmark(){var t=$("#prof_id").val(),e=$("#accountid").val(),a=[];a.push({name:"to_id",value:t}),a.push({name:"from_id",value:e}),a.push({name:"action",value:"Check bookmark status"});$.ajax({type:"POST",url:"controller/BookmarkController.php",data:a,success:function(e){json=JSON.parse(jQuery.trim(e)),0!=json.length?1==json.status?($(".bookmark_").attr("to_id",t),$(".bookmark_").attr("data_status","0"),$(".bookmark_").attr("title","Unbookmark"),$(".bookmark_").css({"background-color":"#222222",color:"white"})):($(".bookmark_").attr("to_id",t),$(".bookmark_").attr("data_status","1"),$(".bookmark_").attr("title","bookmark this"),$(".bookmark_").css({"background-color":"#21B08A",color:"white"})):($(".like_").attr("to_id",t),$(".like_").attr("data_status","1"),$(".like_").attr("title","I Like this :)"),$(".like_").css({"background-color":"#21B08A",color:"white"}))}})}function checkMessage(){$("#messageCheck").change(function(){var t="No"==$("#messageStatus").text()?1:0,e=[];e.push({name:"userid",value:$("#accountid").val()}),e.push({name:"message_status",value:t}),e.push({name:"action",value:"Update message status"}),$.ajax({type:"POST",url:"controller/AccountsController.php",data:e,success:function(t){console.log(jQuery.trim(t)),"true"==jQuery.trim(t)||notify("info-notify",t),getProfile()}})})}function getProfile(){var t=[],e=$("#prof_id").val();$("#usertype").val();t.push({name:"id",value:e}),t.push({name:"type",value:1}),t.push({name:"action",value:"Get profile"}),$.ajax({type:"POST",url:"controller/AccountsController.php",data:t,success:function(t){var e=JSON.parse(jQuery.trim(t));console.log(t);var a=e.investor_fname+", "+e.investor_lname,o=e.investor_street+" "+e.city_name+", "+e.province_name;$("#txt_fullname").text(a),$("#txt_fullname_small").text(a),$("#p_profile2").attr(a),$("#txt_location").html('<i class="ion-location"></i> '+o),$("#txt_fname").html(e.investor_fname),$("#fname").val(e.investor_fname),$("#txt_lname").text(e.investor_lname),$("#lname").val(e.investor_lname),$("#txt_mname").text(e.investor_mname),$("#mname").val(e.investor_mname),$("#txt_wallet").text(null!=e.investor_wallet||void 0!=e.investor_wallet?numberWithCommas(e.investor_wallet):"");$("#wallet").val(e.investor_wallet);if(null!=e.investor_wallet||void 0!=e.investor_wallet){var n="",i="";i+='<option value="'+e.max_investment+'">P '+numberWithCommas(e.max_investment)+"</option>";for(var l=e.investor_wallet;l>=1e4;l-=1e4)e.max_investment!=l&&(i+='<option value="'+l+'">P '+numberWithCommas(l)+"</option>");n+='<option value="'+e.min_investment+'">P '+numberWithCommas(l)+"</option>";for(l=1e4;l<=e.investor_wallet;l+=1e4)e.min_investment!=l&&(n+='<option value="'+l+'">P '+numberWithCommas(l)+"</option>");$("#maxinve").html(i),$("#mininve").html(n)}$("#txt_max").val(null!=e.max_investment||void 0!=e.max_investment?numberWithCommas(e.max_investment):""),$("#txt_min").val(null!=e.min_investment||void 0!=e.min_investment?numberWithCommas(e.min_investment):""),$("#txt_city").text(e.city_name),$("#city").val(e.investor_city),$("#txt_state").text(e.province_name),$("#state").val(e.investor_state),$("#txt_brgy").text(e.investor_street),$("#brgy").val(e.investor_street),getAllState(e.investor_state,e.province_name),getAllCity(e.investor_state,e.city_name,e.investor_city),$("#txt_mobile").text(e.investor_cpNum),$("#mobile").val(e.investor_cpNum),$("#txt_telephone").text(e.investor_telNum),$("#telephone").val(e.investor_telNum),$("#txt_email").text(e.acc_email),$("#email").val(e.acc_email),$("#txt_facebook").text(e.investor_fb),$("#facebook").val(e.investor_fb),$("#p_profile2").attr("src","../../bizsh.admin/Investor/"+e.investor_photo),$("#p_small_profile").attr("src","../../bizsh.admin/Investor/"+e.investor_photo),$("ul a #pp_profile_ha").attr("src","../../bizsh.admin/Investor/"+e.investor_photo),$("#txt_aboutme").text(e.investor_desc),$("#aboutme").val(e.investor_desc),$("#messageStatus").text(1==e.cpNotify_status?"Yes":"No"),$("#messageCheck").prop("checked",1==e.cpNotify_status),$("#emailCheck").prop("checked",1==e.eNotify_status),$("#emailStatus").text(1==e.eNotify_status?"Yes":"No")}})}function getAllState(t,e){var a=[];a.push({name:"action",value:"Get all state"}),$.ajax({type:"POST",url:"controller/GlobalController.php",data:a,success:function(a){var o=JSON.parse(jQuery.trim(a)),n="";n+='<option value="'+t+'">'+e+"</option>";var l="";for(i in o)(l=o[i])[0]!=t&&(n+='<option value="'+l[0]+'">'+l[1]+"</option>");$("#state").html(n)}})}function changeState(t){getAllCity(t.value)}function getAllCity(t,e,a){var o=t,n=(state,[]);n.push({name:"prov_id",value:o}),n.push({name:"action",value:"Get all city"}),void 0==a&&void 0==e?$.ajax({type:"POST",url:"controller/GlobalController.php",data:n,success:function(t){var e=JSON.parse(jQuery.trim(t)),a="",o="";for(i in e)a+='<option value="'+(o=e[i])[0]+'">'+o[1]+"</option>";console.log(e),$("#city").html(a)}}):$.ajax({type:"POST",url:"controller/GlobalController.php",data:n,success:function(t){var o=JSON.parse(jQuery.trim(t)),n="";n+='<option value="'+a+'">'+e+"</option>";var l="";for(i in o)(l=o[i])[0]!=a&&(n+='<option value="'+l[0]+'">'+l[1]+"</option>");console.log(o),$("#city").html(n)}})}$(function(){getProfile(),checkLike(),getInvestorInterest()}),$("#photo_button").on("click",function(){$("#profile_photo").click()});