
<?php
class MsmeVenturerDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }  
    public function addInvestment($data){
        $db = $this->connectDB();
        $params = array($data['msme_id'],$data['v_id'], $data['amount'], $data['cfi_id'], date('Y-m-d H:i:s'));

        $sql = "INSERT INTO msme_venturer (msme_id, v_id, amount, cfi_id ,create_date) VALUES (?,?,?,?, ?)";
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
    public function checkInvestment($data){
        $db = $this->connectDB();

        $sql = "SELECT * FROM msme_venturer WHERE msme_id = ".$data['msme_id']." AND v_id = ".$data['v_id']." AND status = 0";
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
}