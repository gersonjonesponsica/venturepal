
<?php
class RateDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addRate($data) {
        $db = $this->connectDB();
        $params = array( $data['msme_id'],$data['v_id'], $data['rate_'],$data['message'], date('Y-m-d H:i:s'));

        $sql = "INSERT INTO rateandreview (rr_to, rr_from, rr_rate, rr_message, rr_Date) VALUES (?,?,?,?,?)";
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
    public function checkRate($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from rateandreview WHERE rr_to = '".$data['msme_id']."' AND rr_from = '".$data['v_id']."' ";
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
    public function checkRate2($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from rateandreview WHERE rr_to = '".$data['v_id']."' AND rr_from = '".$data['msme_id']."' ";
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
    public function getInvestorInterest($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from interest WHERE v_id = '".$data['v_id']."' ";
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