
<?php
class ReportDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addDayReport($data) {
        $db = $this->connectDB();
        $params = array($data['sales'],
                        $data["begininventory"],
                        $data["purchaseinventory"],
                        $data["available"],
                        $data["endinventory"],
                        $data["totalcostofsales"],
                        $data["fuelandoil"],
                        $data["wagesandsalary"],
                        $data["utilities"],
                        $data["rental"],
                        $data["deprecesion"],
                        $data["investments"],
                        $data["miscelleneos"],
                        $data["officesupply"],
                        $data["profexpences"],
                        $data["benefits"],
                        $data["totaloe"],
                        $data["netincome"],
                        date("Y-m-d H:i:s"),
                        $data["date_report"],
                        $data["msme_id"]);
        $sql = "INSERT INTO day_report(sales, begin_inventory, purchase_inventory, available, end_inventory, total_cost_sales , fuel_oil, wages_salary, utilities, rental, deprecesion, investments, miscellaneous, office_supply, pro_expences, benefits, total_oe, net_income, date_created, date_report, msme_id)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function addWeekReport($data) {
        $db = $this->connectDB();

        $sql = "INSERT INTO week_report ()
                VALUES()";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }

    public function getReportByDate($date_report, $msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM day_report where msme_id = '".$msme_id."' and date_report = '".$date_report."' " ;
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return json_encode($result);
    }

    public function getAnnuallReportsByMonth($year,$type, $msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT 
                    SUM(case MONTH(date_report) when '01' then ".$type." else 0 end) as 'Jan',
                    SUM(case MONTH(date_report) when '02' then ".$type." else 0 end) as 'Feb',
                    SUM(case MONTH(date_report) when '03' then ".$type." else 0 end) as 'Mar',
                    SUM(case MONTH(date_report) when '04' then ".$type." else 0 end) as 'Apr',
                    SUM(case MONTH(date_report) when '05' then ".$type." else 0 end) as 'May',
                    SUM(case MONTH(date_report) when '06' then ".$type." else 0 end) as 'June',
                    SUM(case MONTH(date_report) when '07' then ".$type." else 0 end) as 'July',
                    SUM(case MONTH(date_report) when '08' then ".$type." else 0 end) as 'Aug',
                    SUM(case MONTH(date_report) when '09' then ".$type." else 0 end) as 'Sept',
                    SUM(case MONTH(date_report) when '10' then ".$type." else 0 end) as 'Oct',
                    SUM(case MONTH(date_report) when '11' then ".$type." else 0 end) as 'Nov',
                    SUM(case MONTH(date_report) when '12' then ".$type." else 0 end) as 'Dec',
                    SUM(".$type.") as 'total_sales'
        FROM day_report 
        where msme_id = '".$msme_id."' and YEAR(date_report) = ".$year." " ;
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return json_encode($result);
    }

    public function getTotalReportsMonthly($year, $month ,$msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT  
        SUM(sales) as 'monthly_sales',
        SUM(begin_inventory) as 'monthly_begin_inventory',
        SUM(purchase_inventory) as 'monthly_purchase_inventory',
        SUM(available) as 'monthly_available',
        SUM(end_inventory) as 'monthly_end_inventory',
        SUM(total_cost_sales) as 'monthly_total_cost_sales',
        SUM(fuel_oil) as 'monthly_fuel_oil',
        SUM(wages_salary) as 'monthly_wages_salary',
        SUM(utilities) as 'monthly_utilities',
        SUM(rental) as 'monthly_rental',
        SUM(deprecesion) as 'monthly_deprecesion',
        SUM(investments) as 'monthly_investments',
        SUM(pro_expences) as 'monthly_pro_expences',
        SUM(total_oe) as 'monthly_total_oe',
        SUM(miscellaneous) as 'monthly_miscellaneous',
        SUM(net_income) as 'monthly_net_income',
        SUM(office_supply) as 'monthly_office_supply',
        SUM(benefits) as 'monthly_benefits',
        MONTHNAME(STR_TO_DATE('".$month."' , '%m')) as 'month_name'
        FROM day_report 
        where msme_id = ".$msme_id." and YEAR(date_report) = ".$year." and MONTH(date_report) = ".$month."" ;
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return json_encode($result);
    }

    public function getAllReports($date_report, $msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM day_report where msme_id = '".$msme_id."' and date_report = '".$date_report."' " ;
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function checkReportTermsStatus($msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT report_terms_status FROM msme where msme_id = '".$msme_id."' " ;
        $result = false;
        // echo $sql;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['report_terms_status'];
    }
    public function updateReportTermsStatus($msme_id) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET report_terms_status = 1 WHERE msme_id = '".$msme_id."' ";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function getLastID() {
        $db = $this->connectDB();
        $sql = "SELECT MAX(week_id) as id FROM week_report";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }

    public function getAllMonths(){
    $options = '';
    for($i=1;$i<=12;$i++)
    {
        $value = ($i < 10)?'0'.$i:$i;
        $options .= '<a onclick="select_month(this)" data-id="'.$value.'" href="javascript:;">';
        $options .= '<li class="desc-nav">';
        $options .= date("F", mktime(0, 0, 0, $i+1, 0, 0));
        $options .= '</li>';
        $options .= '</a>';
    }
    return $options;
    }
    public function getAllYears(){
    $options = '';
    $yearNow = date("Y");
    for($i = $yearNow; $i >= $yearNow - 5; $i--)
    {
        $options .= '<a onclick="select_year(this)" data-id="'.$i.'" href="javascript:;">';
        $options .= '<li class="desc-nav">';
        $options .= $i;
        $options .= '</li>';
        $options .= '</a>';
    }
    return $options;
    }    
}