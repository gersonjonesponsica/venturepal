
<?php
class PayoutDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addPayout($data) {
        $db = $this->connectDB();
        $params = array(date('Y-m-d H:i:s'), $data['amount'],$data['cfiid'],  $data['msme_id'], $data['newfilename']);

        $sql = "INSERT INTO payout (pay_date, pay_amount, cfi_id, msme_id, proof_payment) VALUES (?,?,?,?,?)";
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

    public function updateInterest($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE interest SET status = '".$data['stat']."'
        WHERE v_id = '".$data['v_id']."'  AND sub_id = '".$data['interest']."'";
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

    public function checkPayoutById($data) {
        $db = $this->connectDB();
        $sql = 'SELECT IFNULL(m.msme_id,0) msmeid, msme_logo, IFNULL(m.msme_name,"") msmename, ROUND(IFNULL(cfi.amount,""),2) amount, ROUND(cfi.amount * 0.02,2) as interest, IFNULL((SUM(mv.amount) - (SELECT SUM(IFNULL(p.pay_amount,0)) FROM payout p where p.cfi_id = cfi.call_id)),cfi.amount) as balance, TIMESTAMPDIFF(MONTH,cfi.launch_date, NOW()) as month, ROUND(IFNULL((SELECT SUM(IFNULL(p.pay_amount,0)) FROM payout p where p.cfi_id = cfi.call_id),0),2) as totalpaid, ROUND((cfi.amount * 0.02) * (TIMESTAMPDIFF(MONTH,cfi.launch_date, NOW())),2) as expectedamountpaid, ROUND(((cfi.amount * 0.02) * (TIMESTAMPDIFF(MONTH,cfi.launch_date, NOW())) - IFNULL((SELECT SUM(IFNULL(p.pay_amount,0)) FROM payout p where p.cfi_id = cfi.call_id),0)),2) as paymentthismonth
            FROM msme m, callforinvestment cfi, msme_venturer mv, payout p
            WHERE mv.status = 1 and m.msme_id = cfi.msme_id and mv.msme_id = "'.$data['msme_id'].'" AND m.e_id = "'.$data['account_id'].'" ';

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
    public function getPaymentHistory($data) {
        $db = $this->connectDB();
        $sql = 'SELECT sakto.expected, sakto.dif, YEAR(sakto.date_) as year, MONTH(sakto.date_) as month FROM (SELECT DATE_ADD(cfi.launch_date,INTERVAL '.$data['month'].' MONTH) as date_,(TIMESTAMPDIFF(MONTH,cfi.launch_date,DATE_ADD(NOW(),INTERVAL '.$data['month'].' MONTH)))*p.pay_amount as expected, ROUND(((SELECT COUNT(pp.pay_id) from payout pp where pp.msme_id = mv.msme_id)/TIMESTAMPDIFF(MONTH,cfi.launch_date,NOW()))*p.pay_amount, 2) as dif, cfi.msme_id FROM payout p, callforinvestment cfi,msme_venturer mv WHERE p.cfi_id = cfi.call_id and mv.msme_id = cfi.msme_id and mv.cfi_id = cfi.call_id GROUP by cfi.call_id) as sakto WHERE sakto.msme_id = '.$data['msme_id'].' ';

        // echo $sql;

        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function checkPayout($data) {
        $db = $this->connectDB();
        $sql = 'SELECT e.e_id, vendor.msme_id, vendor.msme_name, CONCAT(DATE_FORMAT(vendor.launch_date, "%M %d %Y") ," to ",  DATE_FORMAT(vendor.endDate, "%M %d %Y") ) as duration,vendor.totalPaid, ROUND(vendor.amount - IFNULL(vendor.totalPaid, 0), 2) as balance
            FROM entreprenuer e, 
            (SELECT m.msme_id,m.msme_name,cfi.launch_date,(cfi.amount*(cfi.interestrate/100))+cfi.amount as amount , (SELECT SUM(p.pay_amount) FROM payout p WHERE cfi.call_id = p.cfi_id) as totalPaid,TIMESTAMPADD(DAY,cfi.numOfdays, cfi.launch_date) as endDate
                FROM msme m,callforinvestment cfi
                WHERE m.e_id = '.$data['account_id'].' AND cfi.msme_id = m.msme_id and cfi.status = 1) as vendor
            WHERE e.e_id = '.$data['account_id'].' ';
            // echo $sql;
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
    public function InvestorEarning($data) {
        $db = $this->connectDB();
        $sql = 'SELECT invested.name as msmename, invested.msme_id, invested.cycle, ROUND(invested.pay*(invested.amount/invested.sums),2) as earned, invested.amount,invested.sums, invested.pay , invested.call_status, ROUND((invested.amount * invested.interestrate),2) as interestrate, (SELECT CONCAT(e.e_fname," ", e.e_lname) FROM entreprenuer e, msme m WHERE e.e_id = m.e_id AND m.msme_id = invested.msme_id) as entrepname
            FROM
            (SELECT (SELECT m.msme_name FROM msme m WHERE m.msme_id = mv.msme_id) as name, mv.cfi_id, mv.msme_id, mv.amount,(SELECT SUM(cfi.amount) FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as sums,
            (SELECT cfi.interestrate / 100 FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as interestrate,
             (SELECT cfi.status FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as call_status,
             (SELECT cfi.cycle FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as cycle,
             (SELECT SUM(p.pay_amount) FROM payout p WHERE p.msme_id = mv.msme_id and mv.cfi_id = p.cfi_id) as pay
             FROM msme_venturer mv
             WHERE mv.v_id = "'.$data['investor_id'].'") as invested ';

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
    public function InvestorTotalEarning($data) {
        $db = $this->connectDB();
        $sql = 'SELECT ROUND(MAX(invested.amount)+SUM(invested.amount * invested.interestrate),2) as totalMoney, 
        ROUND(SUM(invested.amount)+SUM(invested.amount * invested.interestrate),2) as totalPayout,
         ROUND(SUM(invested.amount * invested.interestrate),2) as totalInterest
            FROM
            (SELECT mv.cfi_id, mv.msme_id, mv.amount,(SELECT SUM(cfi.amount) FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as sums,
            (SELECT cfi.interestrate / 100 FROM callforinvestment cfi WHERE cfi.call_id = mv.cfi_id) as interestrate
             FROM msme_venturer mv
             WHERE mv.v_id = "'.$data['investor_id'].'") as invested ';

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
    public function getInvestorInterest($data) {
        $db = $this->connectDB();
        $sql = "SELECT i.status, i.v_id, s.sub_name, i.sub_id
        from interest i
        INNER JOIN subcategory s on i.sub_id = s.sub_id
        WHERE i.v_id = '".$data['v_id']."' AND i.status = '1' ";
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
}