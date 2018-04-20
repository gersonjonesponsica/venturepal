
<?php
class DashboardDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getTotalRaisedAmount() {
        $db = $this->connectDB();
        $sql = "SELECT SUM(cfi.amount)  as amount FROM callforinvestment cfi where status = 1";
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

    public function getCountClose() {
        $db = $this->connectDB();
        $sql = "SELECT IFNULL(COUNT(cfi.call_id), 0) as countclose FROM callforinvestment cfi where DATEDIFF(CURRENT_DATE, cfi.approve_date) < 7";
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

    public function getTotalPending() {
        $db = $this->connectDB();
        $sql = "SELECT IFNULL(COUNT(c.contract_id), 0)  as totalPending FROM contract c WHERE c.status = 2 or c.status = 3";
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
    public function getTotalnvestment() {
        $db = $this->connectDB();
        $sql = "SELECT IFNULL(COUNT(c.contract_id),0) as totalnvestment FROM contract c WHERE c.status = 1";
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
    public function getTotalEntrep() {
        $db = $this->connectDB();
        $sql = "SELECT IFNULL(COUNT(e.e_id),0) as totalEntrep FROM entreprenuer e";
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
    public function getTotalInvestor() {
        $db = $this->connectDB();
        $sql = "SELECT IFNULL(COUNT(i.investor_id),0) as totalInvestor FROM investor i";
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
    public function getTotalMsme() {
        $db = $this->connectDB();
        $sql = "SELECT  IFNULL(COUNT(m.msme_id),0) as totalMsme FROM msme m";
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
    public function getMsmeRaised100() {
        $db = $this->connectDB();
        $sql = "SELECT COUNT(cfi.call_id) FROM callforinvestment cfi WHERE cfi.raised = cfi.amount";
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
}