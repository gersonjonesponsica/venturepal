
<?php
class InvestorDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getInvestorIdByEmail($email){
        $db = $this->connectDB();
        $sql = "SELECT investor_id FROM investor WHERE investor_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['investor_id']; 
    }

    public function getInvestorById($id){
        $db = $this->connectDB();
        $sql = "SELECT * FROM investor WHERE investor_id = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return json_encode($result); 
    }
    public function checkSetupStatus($email){
        $db = $this->connectDB();
        $sql = "SELECT acc_setup FROM investor WHERE investor_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['acc_setup']; 
    }

    public function addInvestor($email) {
        $db = $this->connectDB();
        $sql = "INSERT INTO investor(investor_email)
                VALUES('$email')";
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
}