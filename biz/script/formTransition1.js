var cou=0,fieldHTML="";function remove(t){$(t).parents(".remove").remove()}$("#add-contact-detail").on("click",function(){fieldHTML+='<div class="copyfield">',fieldHTML+='<div class="row remove">',fieldHTML+='<div class="col-sm-4">',fieldHTML+='<div class="form-group">',fieldHTML+='<input type="text" class="inputText no-margin" id="xtitle'+ ++cou+'" name="xtitle'+cou+'" placeholder="Title"/>',fieldHTML+=" </div>",fieldHTML+="</div>",fieldHTML+='<div class="col-sm-7">',fieldHTML+='<div class="form-group">',fieldHTML+='<input type="text" class="inputText no-margin" id="xvalue'+cou+'" name="xvalue'+cou+'" placeholder=""/>',fieldHTML+="</div>",fieldHTML+="</div>",fieldHTML+='<div class="col-sm-1 m-t-10">',fieldHTML+=' <a onclick="remove(this)" type="button" title="Remove" class="btn_remove"><i class="ion-close"></i></a>',fieldHTML+="</div>",fieldHTML+=" </div> ",fieldHTML+="</div>",$("form[name=addFormxContact]").find(".row:last").after(fieldHTML),fieldHTML=""}),$("#edit-profile-detail").on("click",function(){$("#profile-detail").toggle("fast","linear",function(){$("#profile-detail").attr("hidden")}),$("#form-profile-detail").toggle("fast","linear",function(){$("#form-profile-detail").removeAttr("hidden")})}),$("#cancel-profile-detail").on("click",function(){$("#form-profile-detail").toggle("fast","linear",function(){$("#form-profile-detail").attr("hidden")}),$("#profile-detail").toggle("fast","linear",function(){$("#profile-detail").removeAttr("hidden")})}),$("#edit-contact-detail").on("click",function(){$("#contact-detail").toggle("fast","linear",function(){$("#contact-detail").attr("hidden")}),$("#form-contact-detail").toggle("fast","linear",function(){$("#form-contact-detail").removeAttr("hidden")})}),$("#cancel-contact-detail").on("click",function(){$("#form-contact-detail").toggle("fast","linear",function(){$("#form-contact-detail").attr("hidden")}),$("#contact-detail").toggle("fast","linear",function(){$("#contact-detail").removeAttr("hidden")})}),$("#edit-about-me").on("click",function(){$("#about-me").toggle("fast","linear",function(){$("#about-me").attr("hidden")}),$("#form-about-me").toggle("fast","linear",function(){$("#form-about-me").removeAttr("hidden")})}),$("#cancel-account-setting").on("click",function(){$("#form-account-setting").toggle("fast","linear",function(){$("#form-account-setting").attr("hidden")}),$("#account-setting").toggle("fast","linear",function(){$("#account-setting").removeAttr("hidden")})}),$("#edit-account-setting").on("click",function(){$("#account-setting").toggle("fast","linear",function(){$("#account-setting").attr("hidden")}),$("#form-account-setting").toggle("fast","linear",function(){$("#form-account-setting").removeAttr("hidden")})}),$("#cancel-about-me").on("click",function(){$("#form-about-me").toggle("fast","linear",function(){$("#form-about-me").attr("hidden")}),$("#about-me").toggle("fast","linear",function(){$("#about-me").removeAttr("hidden")})}),$("#edit-noti").on("click",function(){$("#noti").toggle("fast","linear",function(){$("#noti").attr("hidden")}),$("#form-noti").toggle("fast","linear",function(){$("#form-noti").removeAttr("hidden")})}),$("#cancel-noti").on("click",function(){$("#form-noti").toggle("fast","linear",function(){$("#form-noti").attr("hidden")}),$("#noti").toggle("fast","linear",function(){$("#noti").removeAttr("hidden")})}),$("#edit-overview").on("click",function(){$("#overview").toggle("fast","linear",function(){$("#overview").attr("hidden")}),$("#form-overview").toggle("fast","linear",function(){$("#form-overview").removeAttr("hidden")})}),$("#cancel-overview").on("click",function(){$("#form-overview").toggle("fast","linear",function(){$("#form-overview").attr("hidden")}),$("#overview").toggle("fast","linear",function(){$("#overview").removeAttr("hidden")})});