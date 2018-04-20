
<?php
class InvestorDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    
    public function checkAdminUsername($username) {
        $db = $this->connectDB();
        $sql = "SELECT username FROM admin WHERE username = '".$username."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result;    
    }
    public function getAllInvestor() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM investor where status = 1 OR status = 0";
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
    public function getInvestorDetails($data) {
      $db = $this->connectDB();
      $sql = "SELECT investor.investor_id, investor.investor_lname, investor.investor_fname, investor.investor_mname, investor.investor_street, investor.investor_city, investor.investor_state, investor.investor_photo, investor.investor_fb, investor.eNotify_status, investor.cpNotify_status,
              investor.max_investment, investor.min_investment,  
              investor.investor_cpNum, investor.investor_telNum, investor.investor_desc, 
              investor.investor_wallet, accounts.acc_email, cities.city_name, provinces.province_name
          FROM investor
          INNER JOIN accounts on accounts.investor_id = investor.investor_id
          LEFT JOIN cities on investor.investor_city = cities.city_id
          LEFT JOIN provinces on investor.investor_state = provinces.province_id
          WHERE investor.investor_id = ".$data['investor_id']." ";
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
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET status = '".$data['stat']."' where investor_id = '".$data['investor_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }
    public function updateInvestorWallet($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET investor_wallet = investor_wallet - '".$data['amount']."' where investor_id = '".$data['v_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }    
}