
$(function(){
	checkSuccessMsme();
})

function checkSuccessMsme(){
    var data = [];
    data.push({"name":"action", "value":"Get all msme"});
        $.ajax({
            type:"POST",
            url:"controller/MSMEController.php",
            data: data,
            success: function(data) {
                json = JSON.parse(jQuery.trim(data));
                // console.log(json)
                for(i in json){
                    b = json[i];
                    console.log(b.rem);
                    // if (b.rem >= 0 || b.percent_raised == 100) {}
                     // notification(v_id, msme_id, 5);
                    // notification(msme_id, v_id, 4);
                }
            }
    });
}