
<?php
class ContractDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function UploadProofofInvestment($data) {
        $db = $this->connectDB();
        $sql ="UPDATE contract SET proof_invesment = '".$data['newfilename']."', status = '2'
        WHERE v_id = '".$data['investor_id']."' AND msme_id = '".$data['msme_id']."' AND status = 0";
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
    public function UploadSignedContract($data) {
        $db = $this->connectDB();
        $sql ="UPDATE contract SET contract_file = '".$data['newfilename']."', status = '2'
        WHERE v_id = '".$data['investor_id']."' AND msme_id = '".$data['msme_id']."' AND status = 2";
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
    public function UploadContract($data) {
        $db = $this->connectDB();
        $params = array($data['v_id'],$data['msme_id'], date('Y-m-d H:i:s'),$data['amount']);

        $sql = "INSERT INTO contract ( v_id, msme_id, contract_date, contract_amount) VALUES (?,?,?,?)";
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
    public function updateLike($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE likes SET si_status = '".$data['status']."' 
        WHERE  like_to = '".$data['to_id']."' AND 
        like_from = '".$data['from_id']."' AND 
        like_type = '".$data['type']."'";
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


    public function checkContract($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from contract WHERE v_id = '".$data['investor_id']."' AND msme_id = '".$data['msme_id']."' ";
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

    public function getInvestorPendingApplication($data){
        $db = $this->connectDB();
        $sql = "SELECT c.contract_id, c.contract_file, c.v_id, c.contract_date, c.status, c.contract_date, m.msme_name, c.msme_id
            from contract c 
            Inner join msme m on c.msme_id = m.msme_id
            WHERE c.v_id = '".$data['investor_id']."' AND (c.status = 2 OR c.status = 0)";
        $result = false;
        // echo $sql;
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
    public function checkInvestorContract($data){
        $db = $this->connectDB();
        $sql = "SELECT *  from contract
            WHERE v_id = '".$data['v_id']."' and msme_id = '".$data['msme_id']."'";
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

    public function getInvestorInvestment($data){
        $db = $this->connectDB();
        $sql = 'SELECT DISTINCT m.msme_id, m.msme_name, m.msme_logo, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, IFNULL((Select ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) from msme_venturer mv where m.msme_id = mv.msme_id),0)  as percent_raised
          FROM msme m, contract c  
           WHERE c.v_id = '.$data['investor_id'].' AND c.status = 1 AND m.msme_id = c.msme_id ORDER BY percent_raised DESC';
        $result = false;
        // echo $sql;
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

    // public function getInvestorInvestment($data){
    //     $db = $this->connectDB();
    //     $sql = "SELECT c.contract_id, c.contract_file, c.v_id, c.contract_date, c.status, m.msme_name, m.msme_logo
    //         from contract c 
    //         Inner join msme m on c.msme_id = m.msme_id
    //         WHERE c.v_id = '".$data['investor_id']."' AND c.status = 1";
    //     $result = false;
    //     // echo $sql;
    //     try {
    //         $stmt = $db->prepare($sql);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll();
    //         $db = null;
    //     } catch(PDOException $ex) {
    //         echo "DB Error:", $ex->getMessage();
    //     }
    //     return json_encode($result);
    // }    
}