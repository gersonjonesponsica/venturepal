function checkTesti(){var t=[],e=$("#accountid").val();t.push({name:"entrep_id",value:e}),t.push({name:"action",value:"Check testimonials"}),$.ajax({type:"POST",url:"controller/TestimonialController.php",data:t,success:function(t){var e=JSON.parse(jQuery.trim(t));console.log(e);var s="";if(e.length>0){for(i in e)a=e[i],s+='<div class="row m-t-10 m-b-10">',s+='<div class="interest-card font-black2 border-gray tras-anim hand-point ">',s+='<div class="row ">',s+='<div class="col-lg-1">',s+='<img src="../../bizsh.admin/Entrep/'+a.msme_logo+'" class="img-circle m-t-5 m-l-5" height="40" width="40" />',s+="</div>",s+='<div class="col-lg-8">',s+='<h1 data-id="'+a.msme_id+'" onclick="redirect(this)" class="hand-point">'+a.msme_name+"</h1>",s+="</div>",s+='<div class="col-lg-2 m-t-5">',s+='<i style="position:absolute" data-id ="'+a.msme_id+'" onclick="redirect(this)" title="Rate this Msme" class="ion-clipboard pull-right ion-size-30" ></i>',s+="</div>",s+="</div>",s+="</div>",s+="</div>";setTimeout(function(){$("#testiModal").html(s),$("#testiMod").modal({show:!0})},1e3)}}})}function redirect(i){$(i).attr("data-id");window.location.href="add-testimonial"}$(function(){2==$("#usertype").val()&&checkTesti()});