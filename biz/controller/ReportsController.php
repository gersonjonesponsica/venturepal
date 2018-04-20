<?php
include '../common/config.php';
include '../model/ReportsDB.php';
include '../model/AccountsDB.php';
$report_db = new ReportDB();
$acc_db = new AccountsDB();
	switch ($_POST['action']) {
		case 'Check investor subscription':
			$result = $acc_db->checkInvestorSubscription($_POST);
			echo json_encode($result);
			break;
		case 'Get annual report':
		$type = '';
			if($_POST['type'] == 0) $type = 'sales';
			else if($_POST['type'] == 2) $type = 'begin_inventory';
			else if($_POST['type'] == 3) $type = 'purchase_inventory';
			else if($_POST['type'] == 4) $type = 'available';
			else if($_POST['type'] == 5) $type = 'end_inventory';
			else if($_POST['type'] == 6) $type = 'total_cost_sales';
			else if($_POST['type'] == 8) $type = 'fuel_oil';
			else if($_POST['type'] == 9) $type = 'wages_salary';
			else if($_POST['type'] == 10) $type = 'utilities';
			else if($_POST['type'] == 11) $type = 'rental';
			else if($_POST['type'] == 12) $type = 'deprecesion';//depreciation
			else if($_POST['type'] == 13) $type = 'investments';
			else if($_POST['type'] == 14) $type = 'miscellaneous';
			else if($_POST['type'] == 15) $type = 'office_supply';
			else if($_POST['type'] == 16) $type = 'pro_expences';
			else if($_POST['type'] == 17) $type = 'benefits';
			else if($_POST['type'] == 18) $type = 'total_oe';
			else if($_POST['type'] == 19) $type = 'net_income';

			
			$result = $report_db->getAnnuallReportsByMonth($_POST['year'],$type, $_POST['msme_id']);
			if ($result) {
				echo $result;
			}
			break;
		case 'Check Date':	
				$result = $report_db->getReportByDate($_POST['date_report'], $_POST['msme_id']);
				if ($result) {
					echo $result;
				}
			break;	
		case 'Add day report':
			 $result = $report_db->addDayReport($_POST);
			  if ($result) {
			  	echo "success";
			  }else echo "error";
			 // echo $result;
			break;	
		case 'Get Calendar':
			if(isset($_POST['ym'])){
			  $ym = $_POST['ym'];
			}
			else{
			  $ym = date('Y-m');
			}

			$timestamp = strtotime($ym, "-01");

			if($timestamp === false){
			  $timestamp = time();
			}

			$today = date('Y-m-d', time());

			$html_title_year = date("Y", $timestamp);
			$html_title_month = date("F", $timestamp);
			$html_title = date("F Y", $timestamp);

			$prev = date('Y-m', mktime(0,0,0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));

			$now = date('Y-m', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));

			$now_month = date('m', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));
			$now_year = date('Y', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));

			$next = date('Y-m', mktime(0,0,0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
			$day_count = date('t', $timestamp);

			$str = date('w', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));


			$weeks = array();
			$week = '';
			$week .= str_repeat('<td></td>', $str);

			for ($day=1; $day <= $day_count; $day++, $str++) { 
				if ($day < 10) {
					$day = '0'.$day;
				}
			  // $date2 = $ym.'-'.$day;
			  $date = $ym.'-'.$day;

			  $result = $report_db->getAllReports($date, $_POST['msme_id']);
			  $reported = '';

			  if($result ){
			  	$reported = '<a href="javascript:;" class="reported"><i class="ion-document-text ion-size-50"></i></a>';
			  }else{
			  	 $reported = '';
			  }

			  if($today == $date){

			    $week .= '<td class="today clickable" onclick="dateclick(this)"  data-id ="'.$date.'" data-file ="'.date("M j, Y", strtotime($date)).'">'.$day;
			  }else{
			    $week .= '<td class="clickable" onclick="dateclick(this)" data-id ="'.$date.'" data-file ="'.date("M j, Y", strtotime($date)).'">'.$day;
			  }
				// $week .= '<div id="pop_over_'.$date.'" class="arrow_box_bottom no-display">asdfasdfsdf</div>';
			  $week .= $reported;
			  $week .= '</td>';


			  if ($str % 7 == 6 || $day == $day_count) {
			    if ($day == $day_count) {
			      $week .= str_repeat('<td></td>', 6 - ($str % 7));
			    }

			    $weeks[] = '<tr>' .$week. '</tr>';
			    $week = '';
			  }
			}
			echo "<div class='top_calendar_label m-t-10'>";
			echo '<a class="prev" onclick="nextprev(this)" href="javascript:;" data-id='.$prev.'> 
			<i class="ion-arrow-left-a ion-size-50"></i> </a>';


			echo "<div class='dropdown'>";
			echo '<a id="month_" data-id="'.$now_month.'" " href="javascript:;">'.$html_title_month.' </a>';

			echo '<div class="dropdown-content month">
                    <ul>';
                    	echo $report_db->getAllMonths();
            echo '  </ul>
                </div>';

			echo "</div> &nbsp&nbsp&nbsp";

			echo "<div class='dropdown'>";
			echo '<a id="year_" data-id="'.$now_year.'" " href="javascript:;">'.$html_title_year.' </a>';
			echo '<div class="dropdown-content month" style="height: 200px !important; overflow-y: auto;">
                    <ul>';
                    	echo $report_db->getAllYears();
            echo '  </ul>
                 </div>';

			echo "</div>";


			
			echo '<a hidden id="current_ym"  data-id="'.$now.'" " href="javascript:;">'.$html_title.' </a>';
			echo '<a  class="next" onclick="nextprev(this)" href="javascript:;" data-id='.$next.' ">
			<i class="ion-arrow-right-a ion-size-50"></i> </a><br>';
			echo "</div>";
			echo "<div class='table-responsive' id='calendar_handler'>";
           	echo '<table class="table table-bordered m-t-10 table-calendar" id="calendar_list">
			        <tr>
			          <th class="text-center">Sunday</th>
			          <th class="text-center">Monday</th>
			          <th class="text-center">Tuesday</th>
			          <th class="text-center">Wednesday</th>
			          <th class="text-center">Thursday</th>
			          <th class="text-center">Friday</th>
			          <th class="text-center">Saturday</th>
			        </tr>';
			      
					foreach ($weeks as $week) {
		              echo $week;
		            }
			echo '</table>';
			echo "</div>";
			break;
			case 'Get Calendar for investor':
			if(isset($_POST['ym'])){
			  $ym = $_POST['ym'];
			}
			else{
			  $ym = date('Y-m');
			}

			$timestamp = strtotime($ym, "-01");

			if($timestamp === false){
			  $timestamp = time();
			}

			$today = date('Y-m-d', time());

			$html_title_year = date("Y", $timestamp);
			$html_title_month = date("F", $timestamp);
			$html_title = date("F Y", $timestamp);

			$prev = date('Y-m', mktime(0,0,0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));

			$now = date('Y-m', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));

			$now_month = date('m', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));
			$now_year = date('Y', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));

			$next = date('Y-m', mktime(0,0,0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
			$day_count = date('t', $timestamp);

			$str = date('w', mktime(0,0,0, date('m', $timestamp), 1, date('Y', $timestamp)));


			$weeks = array();
			$week = '';
			$week .= str_repeat('<td></td>', $str);

			for ($day=1; $day <= $day_count; $day++, $str++) { 
				if ($day < 10) {
					$day = '0'.$day;
				}
			  // $date = $ym.'-'.$day2;
			  $date = $ym.'-'.$day;

			  $result = $report_db->getAllReports($date, $_POST['msme_id']);
			  $reported = '';

			  if($result ){
			  	$reported = '<a href="javascript:;" class="reported"><i class="ion-document-text ion-size-50"></i></a>';
			  }else{
			  	 $reported = '';
			  }

			  if($today == $date){

			    $week .= '<td class="today clickable" onclick="dateclick(this)"  data-id ="'.$date.'" data-file ="'.date("M j, Y", strtotime($date)).'">'.$day;
			  }else{
			    $week .= '<td class="clickable" onclick="dateclick(this)" data-id ="'.$date.'" data-file ="'.date("M j, Y", strtotime($date)).'">'.$day;
			  }
				// $week .= '<div id="pop_over_'.$date.'" class="arrow_box_bottom no-display">asdfasdfsdf</div>';
			  $week .= $reported;
			  $week .= '</td>';


			  if ($str % 7 == 6 || $day == $day_count) {
			    if ($day == $day_count) {
			      $week .= str_repeat('<td></td>', 6 - ($str % 7));
			    }

			    $weeks[] = '<tr>' .$week. '</tr>';
			    $week = '';
			  }
			}
			echo "<div class='top_calendar_label m-t-10'>";
			echo '<a class="prev" onclick="nextprev(this)" href="javascript:;" data-id='.$prev.'> 
			<i class="ion-arrow-left-a ion-size-50"></i> </a>';


			echo "<div class='dropdown'>";
			echo '<a id="month_" data-id="'.$now_month.'" " href="javascript:;">'.$html_title_month.' </a>';

			echo '<div class="dropdown-content month" style="height: 200px !important; overflow-y: auto;">
                    <ul>';
                    	echo $report_db->getAllMonths();
            echo '  </ul>
                 </div>';

			echo "</div> &nbsp&nbsp&nbsp";

			echo "<div class='dropdown'>";
			echo '<a id="year_" data-id="'.$now_year.'" " href="javascript:;">'.$html_title_year.' </a>';
			echo '<div class="dropdown-content month" style="height: 200px !important; overflow-y: auto;">
                    <ul>';
                    	echo $report_db->getAllYears();
            echo '  </ul>
                 </div>';

			echo "</div>";

			echo '<a hidden id="current_ym"  data-id="'.$now.'" " href="javascript:;">'.$html_title.' </a>';
			echo '<a  class="next" onclick="nextprev(this)" href="javascript:;" data-id='.$next.' ">
			<i class="ion-arrow-right-a ion-size-50"></i> </a><br>';
			echo "</div>";
				break;
			case 'Get current month and year':
				$ym = array( date('Y'), date('m') );
				echo json_encode($ym);
			break;
			case 'Table view':
				$m = date('m');
				$y = date('Y');


				if(isset($_POST['year'])){
				  	$y = $_POST['year'];
				}
				if(isset($_POST['month'])){
				  	$m = $_POST['month'];
				}
				  $result = $report_db->getTotalReportsMonthly($y,$m,$_POST['msme_id']);
				  if($result){
				  	echo $result;
				  }
			break;
			case 'Check report terms status':
					$result = $report_db->checkReportTermsStatus($_POST['msme_id']);
					echo $result;
				break;
			case 'Update report terms status':
					$result = $report_db->updateReportTermsStatus($_POST['msme_id']);
					echo $result;
				break;		
		default:
			break;
	}
?>