
<?php
class AccountDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addAdmin($data) {
        $db = $this->connectDB();
        $params = array(ucfirst($data['fname']),
                        ucfirst($data['lname']),
                        $data['email'],
                        $data['username'],
                        md5($data['password']),
                        date('Y-m-d H:i:s'));
        $sql = "INSERT INTO admin(fname, lname, email, username, password,date_created)
                VALUES(?,?,?,?,?,?)";
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
    public function deleteAccountByID($id) {
        $db = $this->connectDB();
        $sql = "DELETE FROM accounts WHERE acc_id = '".$id."'";
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
    public function getAllAccount() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM accounts where acc_status = 1 OR acc_status = 0";
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
    public function getAllLoginList() {
      $db = $this->connectDB();
      $sql = "SELECT l.log_id, a.acc_type, a.acc_status, a.acc_email, a.acc_id, DATE_FORMAT(l.created_date, '%r %W %M %e %Y') as logindate,
        IF(a.acc_type = 1 , CONCAT(i.investor_fname,' ', i.investor_lname), CONCAT(e.e_fname,' ', e.e_lname)) as username
        FROM accounts a, loginlogs l, investor i, entreprenuer e where l.acc_id = a.acc_id AND 
        IF(a.acc_type = 1 , i.investor_id = a.investor_id , e.e_id = a.investee_id) GROUP by l.log_id";
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
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE accounts SET acc_status = '".$data['stat']."' where acc_id = '".$data['acc_id']."'";
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