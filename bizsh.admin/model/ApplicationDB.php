
<?php
class ApplicationDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getAllContract($data_) {
      $db = $this->connectDB();
      $sql = 'SELECT c.contract_id, c.contract_file, c.proof_invesment, c.v_id, c.msme_id, c.contract_date, c.status
      FROM contract c, entreprenuer e, investor i
      WHERE IF('.$data_.' = 4 ,(c.status = 0 Or c.status = 1 or c.status = 2 or c.status = 3), c.status = "'.$data_.'" )
      GROUP BY c.contract_id';
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
    public function getContractById($data) {
      $db = $this->connectDB();
      $sql = 'SELECT i.investor_photo, CONCAT(i.investor_fname," ", i.investor_mname," ", i.investor_lname) as investorname,
        m.msme_logo, m.msme_name, m.neededCapital,
        c.contract_file, c.contract_amount, c.proof_invesment ,c.contract_id ,c.v_id, c.msme_id, c.status
        FROM contract c, investor i, msme m
        WHERE c.v_id = i.investor_id AND m.msme_id = c.msme_id 
        AND c.contract_id = "'.$data['contract_id'].'" ';
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
       return json_encode($result);
    }    
    public function deleteCategoryByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE category set status = '2' WHERE cat_id = '".$id."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE contract set status = '".$data['stat']."' WHERE contract_id = '".$data['contract_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
}
?>