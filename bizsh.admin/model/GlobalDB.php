
<?php
class GlobalDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }

    public function getAccountType($id) {
        $db = $this->connectDB();
        $sql = "SELECT acc_type FROM accounts WHERE acc_id = '".$id."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['acc_type'];
    }
    public function getSenderDetailsByAccountIDandType($data) {
        $db = $this->connectDB();
        if ($data['account_type'] == 1) {
          $sql = "SELECT investor.investor_id, investor.investor_lname, investor.investor_fname, investor.investor_mname, accounts.acc_email
          FROM accounts
          INNER JOIN investor on accounts.investor_id = investor.investor_id
          WHERE accounts.acc_status = 1 and accounts.investor_id = ".$data['from_id']." ";
        }
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
    public function getAllProvince() {
        $db = $this->connectDB();
          $sql = "SELECT * from provinces";
        
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
    public function getAddress($data) {
        $db = $this->connectDB();
          $sql = "SELECT provinces.province_name, cities.city_name
          from  provinces, cities
          WHERE provinces.province_id = '".$data['prob_id']."' 
          AND cities.city_id = '".$data['city_id']."' ";
        
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
   
    public function getAllCityByProvinceID($province_id) {
        $db = $this->connectDB();
          $sql = "SELECT * from cities WHERE province_id = '".$province_id."'";
        
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
    public function getAllEntrepBySearch($data) {
        $db = $this->connectDB();
          $sql = "SELECT * from entreprenuer 
          WHERE 
          e_lname LIKE '%".$data['keyword']."%' OR 
          e_fname LIKE '%".$data['keyword']."%' OR 
          e_mname LIKE '%".$data['keyword']."%' ";
        
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