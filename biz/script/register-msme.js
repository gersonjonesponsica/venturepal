$.validator.addMethod("valueNotEquals",function(e,a,t){return t!=a.value},"This field is required");var bPhoto=!1,bGallery=!1,bPermit=!1,mPermit=!1,dPermit=!1,bDocu=!1,dataForm2=[];function goodbye(e){e||(e=window.event),e.returnValue="You sure you want to leave?",e.stopPropagation&&(e.stopPropagation(),e.preventDefault())}window.onbeforeunload=goodbye;var b_photo=null,city_name="asdf",tableDatas="";function searchEntrep(e){for(i in e)a=e[i],0!=a.length&&(tableDatas+='<tr id="'+a.e_id+'" onclick="haha(this)">',fullname=a.e_lname+", "+a.e_fname+" "+a.e_mname+".",tableDatas+='<td><img height="50px" class="border-r-50" width="50px" src="Entrep/'+a.e_photo+'"/></td>',tableDatas+="<td>"+fullname+"</td>",tableDatas+='<td><a href=""><i class="fa fa-close"></i></a></td>',tableDatas+="</tr>");$("#searchEntrepList tbody").html(tableDatas),tableDatas=""}function haha(e){var a=$(e).attr("id");$("#accountid").val(a),$("#searchForm").attr("hidden",!0),$("#msme_portfolio").removeAttr("hidden")}function getAddress(){var e=[];e.push({name:"action",value:"Get address"}),e.push({name:"city_id",value:$("#city").val()}),e.push({name:"prob_id",value:$("#province").val()}),$.ajax({type:"POST",url:"controller/GlobalController.php",data:e,success:function(e){e=JSON.parse(jQuery.trim(e)),$("#search_location").val($("#barangay").val()+", "+e[1]+", "+e[0]+", Philippines 6000")}})}function changeCity(e){var t=[];city="",t.push({name:"action",value:"Get all city"}),t.push({name:"prov_id",value:e.value}),$.ajax({type:"POST",url:"controller/GlobalController.php",data:t,success:function(e){json=JSON.parse(jQuery.trim(e)),province+='<option value="0">City</option>';for(i in json)a=json[i],city+='<option value="'+a.city_id+'" data-file-index="'+i+'">',city+="   "+a.city_name,city+="</option>";$("#city").removeAttr("disabled"),$("#city").html(city),getAddress()}})}$("#city").on("change",function(){getAddress()}),$("#province").on("change",function(){getAddress()}),$(function(){var e=[];bodyDatas="",e.push({name:"action",value:"Get All Subcategory"}),$.ajax({type:"POST",url:"controller/CategoryController.php",data:e,success:function(e){e=JSON.parse(jQuery.trim(e)),bodyDatas+='<option value="0">Category</option>';for(i in e)a=e[i],bodyDatas+='<option  value="'+a.sub_id+'"data-file-index="'+i+'">',bodyDatas+="   "+a.sub_name,bodyDatas+="</option>";$("#categories").html(bodyDatas)}});var t=[];province="",t.push({name:"action",value:"Get all state"}),$.ajax({type:"POST",url:"controller/GlobalController.php",data:t,success:function(e){e=JSON.parse(jQuery.trim(e)),province+='<option value="0">Province</option>';for(i in e)a=e[i],province+='<option value="'+a.province_id+'"data-file-index="'+i+'">',province+="   "+a.province_name,province+="</option>";$("#province").html(province)}}),$(".business_permit").on("click",function(){$("#biz_permit").click()}),$("#biz_permit").on("change",function(){a=$(this)[0].files,0!=a.length&&($(".business_permit").html(a[0].name),"application/pdf"==a[0].type?$("#uploaded_file_business").html('<img width="100" height="100" src="../../bizsh.admin/images/PDFLogo.png"/>'):$("#uploaded_file_business").html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>'),console.log(a[0].type))}),$("#bizPermit").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload MSME business permit"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#aboutyou").css("border","1px solid red"),$(".business_permit").css("border","2px dashed red")):bPermit=!0}}),e.preventDefault()}),$(".mayors_permit").on("click",function(){$("#may_permit").click()}),$("#may_permit").on("change",function(){a=$(this)[0].files,0!=a.length&&($(".mayors_permit").html(a[0].name),"application/pdf"==a[0].type?$("#uploaded_file_mayors").html('<img width="100" height="100" src="../../bizsh.admin/images/PDFLogo.png"/>'):$("#uploaded_file_mayors").html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>'),console.log(a[0].type))}),$("#mayPermit").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload MSME mayor permit"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#aboutyou").css("border","1px solid red"),$(".mayors_permit").css("border","2px dashed red")):mPermit=!0}}),e.preventDefault()}),$(".dti_permit").on("click",function(){$("#d_permit").click()}),$("#d_permit").on("change",function(){a=$(this)[0].files,0!=a.length&&($(".dti_permit").html(a[0].name),"application/pdf"==a[0].type?$("#uploaded_file_dti").html('<img width="100" height="100" src="../../bizsh.admin/images/PDFLogo.png"/>'):$("#uploaded_file_dti").html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>'),console.log(a[0].type)),console.log(dataForm2)}),$("#dPermit").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload MSME DTI"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#aboutyou").css("border","1px solid red"),$(".dti_permit").css("border","2px dashed red")):dPermit=!0}}),e.preventDefault()}),$(".b_photo").on("click",function(){$("#b_photo").click()}),$("#b_photo").on("change",function(){a=$(this)[0].files,0!=a.length&&($(".b_photo").html(a[0].name),"application/pdf"==a[0].type?alert("error type of file"):$("#uploaded_file_b_photo").html('<img width="100" height="100" src="'+window.URL.createObjectURL(a[0])+'"/>'),console.log(a[0].type))}),$("#save_story").click(function(){nextScrollen("aboutyou")}),$("#save_document").click(function(){nextScrollen("preview"),$("#txtTitle").html($("#bname").val());var e=$("#uploaded_file_b_photo").find("img").attr("src");$("#msme_photo_temp").attr("src",e)}),$("#submitAll").click(function(){$("#storyForm").submit(),$("#bPhoto").submit(),$("#bGallery").submit(),$("#bDocuments").submit(),$("#bizPermit").submit(),$("#mayPermit").submit(),$("#dPermit").submit(),bPhoto||bGallery||bPermit||mPermit||dPermit||bDocu||(notify("success-notify","Porfolio Created Successfully."),nextScrollen("basics"),$("#storyForm")[0].reset(),$("#bPhoto")[0].reset(),$("#bGallery")[0].reset(),$("#bDocuments")[0].reset(),$("#bizPermit")[0].reset(),$("#mayPermit")[0].reset(),$("#dPermit")[0].reset(),window.location.href="register-msme")}),$("#bPhoto").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload MSME Photo"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#story").css("border","1px solid red"),$(".b_photo").css("border","2px dashed red")):bPhoto=!0}}),e.preventDefault()}),$(".b_gallery").on("click",function(){$("#b_gallery").click()}),$("#b_gallery").on("change",function(){a=$(this)[0].files,0!=a.length&&($(".b_gallery").html(a.length+" file/s"),"application/pdf"==a[0].type&&alert("error type of file"),console.log(a[0].type))}),$("#bGallery").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload MSME Gallery"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#story").css("border","1px solid red"),$(".b_gallery").css("border","2px dashed red")):bGallery=!0}}),e.preventDefault()}),$(".b_documents").on("click",function(){$("#b_documents").click()}),$("#b_documents").on("change",function(){if(a=$(this)[0].files,0!=a.length){$(".b_documents").html(a.length+" file/s");var e="";for(i in a)b=a[i],console.log(b),"image/png"==b.type||"image/jpg"==b.type||"image/jpeg"==b.type||"image/gif"==b.type?e+='<img width="40" height="40" class="m-r-5" src="'+window.URL.createObjectURL(b)+'"/>':"application/pdf"==b.type&&(e+='<img width="40" height="40" class="m-r-5" src="../../bizsh.admin/images/PDFLogo.png"/>');$("#uploaded_file_b_documents").html(e),e=""}}),$("#bDocuments").submit(function(e){data=new FormData(this);var a=$("#msme_id").val(),t=$("#accountid").val();data.append("action","Upload Business Documents"),data.append("msme_id",a),data.append("entrep_id",t),$.ajax({url:"controller/MsmeController.php",type:"POST",data:data,cache:!1,processData:!1,contentType:!1,success:function(e){"false"==jQuery.trim(e)?($("#aboutyou").css("border","1px solid red"),$(".b_documents").css("border","2px dashed red")):bDocu=!0}}),e.preventDefault()}),$("#basicForm").validate({rules:{badge:{valueNotEquals:"0"},categories:{valueNotEquals:"0"},barangay:"required",province:{valueNotEquals:"0"},city:{valueNotEquals:"0"},establishdate:"required",capneeded:"required",bname:"required",profit:"required",worth:"required",gross:"required",website:{url:!0}},submitHandler:function(e){(dataForm2=$("form").serializeArray()).push({name:"action",value:"Add Temporary MSMEa"}),dataForm2.push({name:"msme_id",value:$("#msme_id").val()}),dataForm2.push({name:"e_id",value:$("#accountid").val()}),""!=$("#accountid").val()?$("#lat").val()&&$("#long").val()?$.ajax({type:"POST",url:"controller/MsmeController.php",data:dataForm2,success:function(e){$("#msme_id").val(jQuery.trim(e));var a=[];(a=dataForm2).push({name:"msme_id",value:$("#msme_id").val()}),a.push({name:"action",value:"Add CFI"}),$.ajax({type:"POST",url:"controller/CfiController.php",data:a,success:function(e){}}),nextScrollen("story")}}):($("#myModal").modal({show:!0}),getAddress()):alert("please select entrep")}}),$("#storyForm").validate({rules:{b_video:{url:!0},b_desc:"required",g_desc:"required"},submitHandler:function(e){(dataForm2=$("form").serializeArray()).push({name:"long",value:$(".search_longitude").val()}),dataForm2.push({name:"lat",value:$(".search_latitude").val()}),dataForm2.push({name:"msme_id",value:$("#msme_id").val()}),dataForm2.push({name:"action",value:"Update"}),$.ajax({type:"POST",url:"controller/MsmeController.php",data:dataForm2,success:function(e){$("#msme_id").val(jQuery.trim(e))}})}})});