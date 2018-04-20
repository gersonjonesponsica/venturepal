<?php
include 'includes/header-user.php';
include 'includes/head.php';


?>
<link href="css/searchnavb2.css" rel="stylesheet">
<style>
body{
    background-color: #F7FAFA;
  }
</style>

<div class="container-fluid  m-r-50 m-l-50 m-t-50 ">
  <div class="container setupnav ">
    <div id="myTopnav">
      <a href='javascript:;' onclick="scrollen(this)" id="weekone" class="bat">Week 1</a>
      <a href='javascript:;' onclick="scrollen(this)" id="weektwo" class="bat">Week 2</a>
      <a href='javascript:;' onclick="scrollen(this)" id="weekthree" class="bat">Week 3</a>
      <a href='javascript:;' onclick="scrollen(this)" id="weekfour" class="bat">Week 4</a>

    </div>
  </div>
   <?php $fields = array("Sales", "Begin Inventory", "Purchase Inventory", "Available", "End Inventory", "Cost of Sales", "Fuel and Oil", "Wages and Salary", "Utilities", "Rental", "Deprecesion", "Investments","Miscelleneos", "Office Supply", "Proffesional Expences", "Benefits", "Total OE","Net Income"); ?>


  <div class="row m-t-100">
    <div class="col-lg-12 bg-white" id="scrollablehere" class="scrollpane" style="overflow-x: hidden; overflow-y: hidden; height: 1200px">
         <div class="row " id="row_weekone">
          <div class="col-lg-9 m-t-10">
          <div class="container-fluid">
            <div class="row">
                <div class="table-responsive">   
                  <table id="" class="table table-bordered  table-condensed">
                    <tr>
                      <th colspan="16" class="text-center bg-mycolor font-white">Daily Record for the week of <?php echo date("F", strtotime(date('2017/09/18')))?></th>
                    </tr>
                    <tr>
                      <th class="text-center bg-color-F7FAFA"></th>
                      <th class="text-center bg-color-F7FAFA">Day 1</th>
                      <th class="text-center bg-color-F7FAFA">Day 2</th>
                      <th class="text-center bg-color-F7FAFA">Day 3</th>
                      <th class="text-center bg-color-F7FAFA">Day 4</th>
                      <th class="text-center bg-color-F7FAFA">Day 5</th>
                      <th  class="text-center bg-color-F7FAFA">Day 6</th>
                      <th  class="text-center bg-color-F7FAFA">Day 7</th>
                    </tr>
                    <!-- cos of sales total oe net income  -->
                   
                    <?php 
                     $i = 1;
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                      <tr>
                        <?php 
                        $class2 = '';
                          if( $j == 5 || $j == 16 || $j == 17 || $j == 3){
                           $class2="text-center bold";
                          }

                        ?>
                        <td width="200px" class='<?php echo $class2; ?> bg-color-F7FAFA' ><?php echo $fields[$j]?></td>
                        <?php for ($i=1; $i < 2; $i++): ?>
                          <?php 

                              $string1 = strtolower($fields[$j]);
                              $string2 = str_replace(' ', '', $string1);

                              echo '<td  style="padding: 0px">';
                              $event = '';
                            if( $j == 5 || $j == 16 || $j == 17 || $j == 3){
                        
                              echo '<input  onchange="fieldChange(this)" class="text-center bold" readonly style="padding: 0px; border: none; width: 100%; margin: 0px" type="" name=""  id='.$string2.'day'.$i.'>';
                            }else{
                              echo '<input class="text-center" onchange="fieldChange(this)"  data-id ='.$i.' data-file='.'day'.$i.' style="padding: 0px; border: none; width: 100%; margin-bottom: 0px" type="" name=""  id='.$string2.'day'.$i.'>';
                            }

                            echo '</td>';
                          ?>
                          
                        <?php endfor;?>
                      </tr>
                    <?php endfor;?>
                     <tr><td colspan="16"><a href=""><i class="ion-plus"></i> Others</a> </td></tr>
                    <tr>
                      <td></td>
                      <?php for ($i=1; $i < 8; $i++): 
                        $id = 'day'.$i.'weekone_btn';
                      ?>
                         
                        <td style="padding: 0px"><input onclick="submitDayReport(this)" data-id ='<?php echo $i ?>' type="submit" id="<?php echo $id?>" style="padding: 0px; border: none; width: 100%; margin-bottom: 0px"  name=""></td>
                      <?php endfor;?>
                    </tr>
                   
                  </table>
                </div>
            </div>
         </div>
         </div>
         <div class="col-lg-3 m-t-10">
            <div class="container-fluid">
            <div class="row">
                  <table  class="table table-bordered  table-condensed">
                     <tr>
                       <th colspan="4" class="text-center bg-mycolor font-white">Weekly for the month of <?php echo date("F", strtotime(date('2017/09/18')))?></th> 
                    </tr>
                     <tbody>
                     <tr><td class="bold">Sales<h4 class="bold" id="weekly_sales" style="float: right;"></h4></td></tr>
                     <tr><td class="bold">Cost of Sales <h4 class="bold" id="weekly_cos" style="float: right;"></h4></td></tr>
                     <tr><td class="bold">Total Operation Expences <h4 class="bold" id="weekly_toe" style="float: right;"></h4></td></tr>
                     <tr><td class="bold">Total Net Income<h4 class="bold" id="weekly_tni" style="float: right;"></h4></td></tr>
                  </tbody>
                  </table>
                 
               
            </div>
         </div>
         </div>
        </div>
          <div class="row  no-display-with-space" id="row_weektwo">
          <div class="container-fluid">
            <div class="row m-b-10 b-r-5">
                <div class="table-responsive m-t-30">   
                  <table id="" class="table table-bordered  table-condensed">
                    <tr>
                      <th colspan="16" class="text-center bg-mycolor font-white">Weekly for the month of <?php echo date("F", strtotime(date('2017/09/18')))?></th>
                    </tr>
                    <tr>
                      <th class="text-center bg-color-F7FAFA"></th>
                      <th class="text-center bg-color-F7FAFA">Day 1</th>
                      <th class="text-center bg-color-F7FAFA">Day 2</th>
                      <th class="text-center bg-color-F7FAFA">Day 3</th>
                      <th class="text-center bg-color-F7FAFA">Day 4</th>
                      <th class="text-center bg-color-F7FAFA">Day 5</th>
                      <th  class="text-center bg-color-F7FAFA">Day 6</th>
                      <th  class="text-center bg-color-F7FAFA">Day 7</th>
                    </tr>

                    <?php 
                     $i = 1;
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                      <tr>
                        <td><?php echo $fields[$j]?></td>
                        <?php for ($i=1; $i < 8; $i++): ?>
                          <td style="padding: 0px"><input style="padding: 0px; border: none; width: 100%; margin-bottom: 0px" type="" name=""></td>
                        <?php endfor;?>
                      </tr>
                    <?php endfor;?>
                     <tr><td colspan="16"><a href=""><i class="ion-plus"></i> Others</a> </td></tr>
                    <tr>
                      <td></td>
                      <?php for ($i=1; $i < 8; $i++): ?>
                        <td style="padding: 0px"><input type="submit" style="padding: 0px; border: none; width: 100%; margin-bottom: 0px"  name=""></td>
                      <?php endfor;?>
                    </tr>
                   
                  </table>
                </div>
            </div>
         </div>
            </div>


        <div class="row  no-display-with-space"" id="row_weekthree" >
        
          <div class="container-fluid">
            <div class="row  m-t-10 m-b-10 b-r-5">
                <div class="table-responsive m-t-30">   
                  <table id="" class="table table-bordered  table-condensed">
                    <tr>
                      <th colspan="16" class="text-center bg-mycolor font-white">Weekly for the month of <?php echo date("F", strtotime(date('2017/09/18')))?></th>
                    </tr>
                    <tr>
                      <th class="text-center bg-color-F7FAFA"></th>
                      <th class="text-center bg-color-F7FAFA">Day 1</th>
                      <th class="text-center bg-color-F7FAFA">Day 2</th>
                      <th class="text-center bg-color-F7FAFA">Day 3</th>
                      <th class="text-center bg-color-F7FAFA">Day 4</th>
                      <th class="text-center bg-color-F7FAFA">Day 5</th>
                      <th  class="text-center bg-color-F7FAFA">Day 6</th>
                      <th  class="text-center bg-color-F7FAFA">Day 7</th>
                    </tr>

                    <?php 
                     $i = 1;
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                      <tr>
                        <td><?php echo $fields[$j]?></td>
                        <?php for ($i=1; $i < 8; $i++): ?>
                          <td style="padding: 0px"><input style="padding: 0px; border: none; width: 100%; margin-bottom: 0px" type="" name=""></td>
                        <?php endfor;?>
                      </tr>
                    <?php endfor;?>
                     <tr><td colspan="16"><a href=""><i class="ion-plus"></i> Others</a> </td></tr>
                    <tr>
                      <td></td>
                      <?php for ($i=1; $i < 8; $i++): 
                        $id = 'day'.$i.'weekone_btn';
                      ?>
                         
                        <td style="padding: 0px"><input type="submit" id="<?php echo $id?>" style="padding: 0px; border: none; width: 100%; margin-bottom: 0px"  name=""></td>
                      <?php endfor;?>
                    </tr>
                   
                  </table>
                </div>
            </div>
         </div>
  
          </div>
          <div class="row m-t-100 no-display-with-space" id="row_weekfour">
          <div class="container-fluid">
            <div class="row  m-t-10 m-b-10 b-r-5">
                <div class="table-responsive m-t-30">   
                  <table id="" class="table table-bordered  table-condensed">
                    <tr>
                      <th colspan="16" class="text-center bg-mycolor font-white">Weekly for the month of <?php echo date("F", strtotime(date('2017/09/18')))?></th>
                    </tr>
                    <tr>
                      <th class="text-center bg-color-F7FAFA"></th>
                      <th class="text-center bg-color-F7FAFA">Day 1</th>
                      <th class="text-center bg-color-F7FAFA">Day 2</th>
                      <th class="text-center bg-color-F7FAFA">Day 3</th>
                      <th class="text-center bg-color-F7FAFA">Day 4</th>
                      <th class="text-center bg-color-F7FAFA">Day 5</th>
                      <th  class="text-center bg-color-F7FAFA">Day 6</th>
                      <th  class="text-center bg-color-F7FAFA">Day 7</th>
                    </tr>

                    <?php 
                     $i = 1;
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                      <tr>
                        <td><?php echo $fields[$j]?></td>
                        <?php for ($i=1; $i < 8; $i++): ?>
                          <td style="padding: 0px"><input style="padding: 0px; border: none; width: 100%; margin-bottom: 0px" type="" name=""></td>
                        <?php endfor;?>
                      </tr>
                    <?php endfor;?>
                     <tr><td colspan="16"><a href=""><i class="ion-plus"></i> Others</a> </td></tr>
                    <tr>
                      <td></td>
                      <?php for ($i=1; $i < 8; $i++): ?>
                        <td style="padding: 0px"><input type="submit" style="padding: 0px; border: none; width: 100%; margin-bottom: 0px"  name="" value=""></td>
                      <?php endfor;?>
                    </tr>
                   
                  </table>
                </div>
            </div>
         </div>
          </div>
          <div class="row t-1000 no-display-with-space">
          </div>

    </div>

  </div>

</div>
<!-- <div class="container save-bottom">
    <div class="container-fluid m-r-50">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4">
                <a href='javascript:;' class="m-t-10 btn btn-default pull-right" 
                  onclick="nextScrollen(this)" id="btn_story">Save and Continue</a>
                  <a href="" class="m-t-20 m-r-10  pull-right">Discard Changes</a>
            </div>
        </div>
    </div>
</div> -->
<script>

function fieldChange(element){
   var id = $(element).attr('data-id');
   var day = $(element).attr('data-file');

  changeData(day,id);
}
function changeData(day, id){
  var list = <?php echo json_encode($fields); ?>;
  var begininventory = +removeCommas($('#begininventory'+day).val());
  var purchaseinventory = +removeCommas($('#purchaseinventory'+day).val());
  var endinventory = +removeCommas($('#endinventory'+day).val());

  var available = begininventory+purchaseinventory;
  $('#available'+day).val(numberWithCommas(available));

  var cos = available - endinventory;
  $('#costofsales'+day).val(numberWithCommas(cos));

  var totaloe = 0;
  for (var i = 6; i < list.length-2; i++) {
    var lowerStr = list[i].toString().toLowerCase();
    var nospaceStr = lowerStr.replace(/\s+/g, '');
    console.log(nospaceStr);
    // var num = +removeCommas($('#'+nospaceStr+day).val());
    // totaloe += parseInt(num);
  }
 // $('#totaloe'+day).val(numberWithCommas(totaloe));
 // var sales = +removeCommas($('#sales'+day).val());
 // $('#netincome'+day).val(numberWithCommas(sales - cos - totaloe));

}

 function removeCommas(num) {
   return num.toString().replace(/,/g , "");
 }
 function numberWithCommas(x) {
   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
 }

$('input').keyup(function (event) {
    // skip for arrow keys
    if (event.which >= 37 && event.which <= 40) {
        event.preventDefault();
    }

    var currentVal = $(this).val();
    var testDecimal = testDecimals(currentVal);
    if (testDecimal.length > 1) {
        console.log("You cannot enter more than one decimal point");
        currentVal = currentVal.slice(0, -1);
    }
    $(this).val(replaceCommas(currentVal));

});

function testDecimals(currentVal) {
    var count;
    currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
    return count;
}


function replaceCommas(yourNumber) {
    var components = yourNumber.toString().split(".");
    if (components.length === 1) 
        components[0] = yourNumber;
    components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if (components.length === 2)
        components[1] = components[1].replace(/\D/g, "");
    return components.join(".");
}

function submitDayReport(element){
   var list = <?php echo json_encode($fields); ?>;
   var id = $(element).attr('data-id');

   if(id == 7){
      var weeklyData = [];
      var tot_sales = 0, tot_cos = 0, tot_toe = 0, tot_tni = 0;

      weeklyData.push({"name": "action", "value": "Get Weekly Reports"});
      $.ajax({
         type:"POST",
         url:"controller/ReportsController.php",
         data: weeklyData,
         success: function(data) {
            var json = JSON.parse(jQuery.trim(data));
            for(var i in json){
               var a = json[i];
               tot_sales += parseFloat(json[i]['sales']);
               tot_cos += parseFloat(json[i]['cost_sales']);
               tot_toe += parseFloat(json[i]['total_oe']);
               tot_tni += parseFloat(json[i]['net_income']);
            }

            $('#weekly_sales').html(numberWithCommas(tot_sales));
            $('#weekly_cos').html(numberWithCommas(tot_cos));
            $('#weekly_toe').html(numberWithCommas(tot_toe));
            $('#weekly_tni').html(numberWithCommas(tot_tni));      

         }
      }); 
   }else{
      var data = [];
      for (var i = 0; i < list.length ; i++) {
         var lowerStr = list[i].toString().toLowerCase();
         var nospaceStr = lowerStr.replace(/\s+/g, '');
         data.push({"name": nospaceStr, "value": removeCommas($('#'+nospaceStr+'day'+id).val())});
         console.log(nospaceStr);
      }
      // data.push({"name": "day_no", "value": id});
      // data.push({"name": "action", "value": "Add day report"});
      //  $.ajax({
      //    type:"POST",
      //    url:"controller/ReportsController.php",
      //    data: data,
      //    success: function(data) {
      //       // alert(data);
      //        if(jQuery.trim(data) == 'success') {
      //          notify('success-notify', 'Day Report Added');
      //        }else{
      //          notify('error-notify', 'Error');
      //        }
      //    }
      //  });    
    }       
}

$('.bat').click(function(){
  $('.bat').removeClass('nav-active');
  $(this).addClass('nav-active');
});

function nextScrollen(element){
  $('.bat a').removeClass('nav-active');
  $(this).addClass('nav-active');

  var duration = 500;
  var options = { direction: 'right' };
  var effect = 'slide';
  var id = $(element).attr('id');

  var newId = id.substring(4, id.length);
   var elem = document.getElementById('row_'+newId);
   $('#row_'+newId).removeClass('no-display-with-space'); 
   $('#'+newId).fadeIn().removeAttr('hidden',true);

   if(newId == 'story'){
     $('#progress').html('25% Complete');
   }else if(newId == 'aboutyou'){
     $('#progress').html('50% Complete');
   }else if(newId == 'account'){
     $('#progress').html('75% Complete');
   }else if(newId == 'preview'){
     $('#progress').html('100% Complete');
   }
   
   var topPos = elem.offsetTop;

   scrollTo(document.getElementById('scrollablehere'), topPos, 400);  
}


function scrollen(element){

  var id = $(element).attr('id');
 
   $('#row_weekone').addClass('no-display-with-space');
   $('#row_weektwo').addClass('no-display-with-space');
   $('#row_weekthree').addClass('no-display-with-space');
   $('#row_weekfour').addClass('no-display-with-space');
  var elem = document.getElementById('row_'+id); 
  $('#row_'+id).removeClass('no-display-with-space');
  var topPos = elem.offsetTop;
  scrollTo(document.getElementById('scrollablehere'), topPos, 200);  
}
 
function scrollTo(element, to, duration) {
    var start = element.scrollTop,
        change = to - start,
        currentTime = 0,
        increment = 10;
        
    var animateScroll = function(){        
        currentTime += increment;
        var val = Math.easeInOutQuad(currentTime, start, change, duration);
        element.scrollTop = val;
        if(currentTime < duration) {
            setTimeout(animateScroll, increment);
        }
    };
    animateScroll();
}

//t = current time
//b = start value
//c = change in value
//d = duration
Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) return c/2*t*t + b;
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};

</script> 
<?php
    include 'includes/footer.php';
?>