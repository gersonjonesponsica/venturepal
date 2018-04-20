<?php
include 'includes/header-user.php';
include 'includes/head.php';

// date_default_timezone_set("America/New_York");
?>
<!-- <link href="css/calendar.css" rel="stylesheet"> -->
<style>
body{
    background-color: #F7FAFA;
  }
  .calendar_table td{
    height: 100px;
    cursor: pointer;
  }
  .calendar_table th{
    font-weight: 700;
    width: 100px !important;
    background-color: #21b08a;
    color: white;
  }
.calendar_table .today .reported{
  color: white;
}
  .calendar_table .today{
    background-color: #21b08a;
    color: white;
  }
  .reported{
   text-align: center !important;
  }
  a.reported{
      display: table;
      height: 100%;
      width: 100%;
      color: #21b08a;
  }
  .top_calendar_label{
    background-color: #21b08a;
    color: white;
  }

  .top_calendar_label{
   text-align: center;
  }

  .top_calendar_label a{
   font-size: 40px;
   color: white;
  }

  .top_calendar_label .next{
    float: right;
    padding-right: 5px;
  }

  .top_calendar_label .prev{
    float:left;
     padding-left: 5px;
  }


</style>

<div class="container  m-t-100 m-b-50">
  <div id="loadthis"></div>
  <div class="row">
    <div class="col-lg-12 bg-white calendar_table">
      
    </div>
  </div>

 <?php $fields = array("Sales", "Cost of Sales","Begin Inventory", "Purchase Inventory", "Available", "End Inventory" ,"Total Cost of sales","Operating Expences", "Fuel and Oil", "Wages and Salary", "Utilities", "Rental", "Deprecesion", "Investments","Miscelleneos", "Office Supply", "Prof Expences", "Benefits", "Total OE","Net Income"); ?>

  <div class="row m-t-20">
    <div class="col-lg-12 bg-white " >
      <table class="table table-bordered m-t-20 table_view">
      <tbody>
        
      </tbody>   
      </table>
    </div>
  </div> 

  <div class="row m-t-20">
    <div class="col-lg-12 bg-white">
      <div class='top_calendar_label m-t-20 m-b-10'>
      <div class="text-center" style="margin: 0px auto;"> 
        <div class="dropdown">
        <a class="" href="business" id="report_title">Sales</a>
          <div class="dropdown-content month"  style="height: 200px !important; overflow-y: auto;">
            <ul>
              <?php for ($i=0; $i < sizeof($fields); $i++): ?>
                <?php 
                if($i == 1 || $i == 7){
                  }else{
                    echo '<a href="javascript:;" data-file="'.$fields[$i].'" onclick="chart(this)" data-id="'.$i.'" >
                        <li class="desc-nav" class"report_value"> '.$fields[$i].'</li>
                      </a>';
                  }
                  ?>
              <?php endfor ?>
          </ul>
        </div>
        </div>
      </div> 

      </div>
      
      <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    </div>
  </div> 
</div>


<div class="modal fade top-5 " id="myModal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="date"></h4>
            </div>
            <div class="modal-body">
              <div class="add-edit">
                  <?php 
                    for ($j=0; $j < sizeof($fields); $j++): ?>
                        <?php 
                        $class2 = '';
                          if( $j == 0 || $j == 1 || $j == 7 || $j == 19  ){
                           $class2 = "bold m-t-10 ";
                          }else
                            $class2="p-l-20 m-t-10";
                        ?>
      
                          <?php 
                              $string1 = strtolower($fields[$j]);
                              $string2 = str_replace(' ', '', $string1);
                          ?>
                             <div class="row " >
                              <div class="col-lg-5 bg-color-F7FAFA" >
                                <h6 class="<?php echo $class2; ?>"> <?php echo $fields[$j]?></h6>
                              </div>
                              <div class="col-lg-7 no-pad no-margin w-fit" >
                                <?php 
                                  if( $j == 1 || $j == 4 || $j == 7 ||$j == 6 || $j == 18 || $j == 19){
                                    echo '<input onchange="changeData(this)" class="bg-color-F7FAFA text-center bold no-pad no-margin w-fit b-b no-left-border" readonly  type="" name=""  id='.$string2.'>';
                                  }else{
                                    echo '<input class="text-center no-pad no-margin w-fit b-b" onchange="changeData(this)"  type="" name=""  id='.$string2.'>';
                                  }
                                ?>
                              </div>
                            </div>                   
                    <?php endfor;?>
            </div>
            <div class="modal-footer">
                <button type="button" id="save_report" class="btn btn-default pull-right">Save report</button> 
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close </button> 
            </div>
        </div>
        </div>
      
    </div>
</div>


<script type="text/javascript" src="script/business-report3.js"></script>
<script src="js/canvasjs2.min.js"></script>
<script>

      //SELECT * FROM Project WHERE MONTH(DueDate) = 1 AND YEAR(DueDate) = YEAR(NOW())
      //SELECT create_date FROM table WHERE MONTH(create_date) = 5
      //https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_month
  
</script>
<?php
    include 'includes/footer.php';
?>
