var a,b;function getSummary(){var t=[];t.push({name:"action",value:"Get summary"}),$.ajax({type:"POST",url:"controller/MsmeController.php",data:t,success:function(t){var e=JSON.parse(jQuery.trim(t));console.log(e),$("#totalInvestor").html(numberWithCommas(e[0].investors)),$("#totalInvestment").html("<span>&#8369;</span> "+numberWithCommas(e[0].investment)),$("#totalDeployed").html("<span>&#8369;</span> "+numberWithCommas(e[0].deployed)),$("#totalMsmeFunded").html(numberWithCommas(e[0].funded), $("#income").html(numberWithCommas(e[0].income))}})}$(function(){getSummary()});